@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-4 g-3 px-md-0 px-3">
            <div class="col-xxl-4 col-xl-5 col-lg-6">
                @include('layouts.dashboard.include.elements.tree')
            </div>
            <div class="col">
                <div class="out-kod"></div>
                <form class="pt-4 col-xl-10" id="search_form" onsubmit="searchWorks();return false">
                    <div class="row g-4">
                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">ФИО обучающегося</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="student" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder="">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">Тип работы</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="work_type" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder="">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="fs-14 mb-2 text-grey">Статус работы</p>
                            <div id="bg-white" class="bg-white">
                                <select class="js-example-basic-single w-100" name="state">
                                    <option value="0">Ожидает одобрения</option>
                                    <option value="1">Одобрена</option>
                                    <option value="2">Отклонена (отправлена на доработку)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">Название работы</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="name" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder=""
                                       id="work_name_input">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="fs-14 mb-2 text-grey">УГНП</p>
                            <div id="bg-white_1">
                                <select class="js-example-basic-single w-100" name="specialty_id">
                                    @if(isset($specialties) and is_iterable($specialties))
                                        @foreach($specialties as $specialty)
                                            <option value="{{$specialty->id}}">{{$specialty->code}}
                                                | {{$specialty->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="fs-14 mb-2 text-grey">Период загрузки работ</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form pe-2">
                                <button class="btn pe-3 py-0 fs-14" disabled>
                                    <img src="/images/Calendar.svg" alt="">
                                </button>
                                <input type="text" name="date_rang" value="01/01/2023 - 01/15/2023"
                                       class=" fs-14 text-grey p-date w-75"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <p class="fs-14 mb-2 text-grey">Отображение работ</p>
                        <div id="bg-white_1">
                            <select class="js-example-basic-single w-100" name="delete_type" id="delete_type">
                                <option value="2" selected>Отображать все работы</option>
                                <option value="0">Отображать только активные</option>
                                <option value="1">Отображать только удаленные</option>
                            </select>
                        </div>
                    </div>
                    <div class="row pt-4 d-flex align-items-end">
                        <div class="col">
                            <div class="mt-auto">
                                <button class="btn btn-secondary br-100 br-none text-grey fs-14 py-1 me-3">применить
                                </button>
                                <button class="btn br-green-light-2 br-100 text-grey fs-14 py-1 me-3"
                                        onclick="works();resetSearch()">сбросить
                                </button>
                                <button class="btn bg-green br-100 text-grey fs-14 py-1" onclick="exportWorks()">
                                    выгрузить<img
                                        src="/images/File_Download_green.svg" alt="" class="ps-2"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.dashboard.include.modal.update.work')
        <span class="text-grey">Работ: <span id="works_count"></span></span>
        <div class="px-md-0 px-3 position-relative">
            <div class="big-table">
                <table class="table fs-14">
                    <thead class="brt-green-light-2 brb-green-light-2 lh-17">
                    <tr class="text-grey">
                        <th scope="col">Направление подготовки</th>
                        <th scope="col">Обучающийся</th>
                        <th scope="col">Группа</th>
                        <th scope="col">Дата защиты</th>
                        <th scope="col">Наименование<br> работы - тип работы</th>
                        <th scope="col">Оценка</th>
                        <th scope="col">Самопроверка по другим системам</th>
                        <th scope="col">Проверка<br> ВКР-ВУЗка</th>
                        <th scope="col"><img src="/images/nine_dots.svg" alt="" class="pb-2"></th>
                    </tr>
                    </thead>
                    <tbody class="lh-17 brb-green-light-2" id="works_table">
                    </tbody>
                    @include('layouts.dashboard.include.menu.work.student')
                </table>
            </div>
            @include('layouts.dashboard.include.menu.work.employee')

            <div id="about_work">
            </div>
            <nav aria-label="Page navigation example" class="custom_pagination" id="pagination">
                <ul class="pagination m-0" id="pages">

                </ul>
            </nav>
        </div>
        @include('layouts.dashboard.include.modal.add.work')
        @include('layouts.dashboard.include.modal.update.work_specialty')
        @include('layouts.dashboard.include.modal.other.additional_file')
        @include('layouts.dashboard.include.modal.add.import-work')
        @endsection

        @section('scripts')
            <script src="/js/dashboard/works/employees.js"></script>
            <script src="/js/dashboard/works/students.js"></script>
            <script id="work_info_student_tmpl" type="text/x-jquery-tmpl">
            <div id="work_info_student" class="modal" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3>Информация о работе</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#main-information" aria-controls="main-information" role="tab" data-toggle="tab">Основная информация</a></li>
                            <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Комментарии</a></li>
                        </ul>
                        <div class="tab-content">
                            <h3 class="bc-post-title bc-post-title-sm">Информация о работе</h3>
                            <form class="form form-horizontal" id="infoWorkForm" onsubmit="workInfo(); return false;">
                                <div class="form-group">
                                    <label class="col-sm-4">Год выпуска</label>
                                    <div class="col-sm-8" id="value_year_id">${year.year}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Факультет</label>
                                    <div class="col-sm-8" id="faculty_id">${faculty.name}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Кафедра</label>
                                    <div class="col-sm-8" id="value_department_id">${department.name}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Образовательная программа (специальность)</label>
                                    <div class="col-sm-8">${specialty.name}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Кто загрузил работу</label>
                                    <div class="col-sm-8">${user.name}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">ФИО обучающегося</label>
                                    <div class="col-sm-8" >${student}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Группа обучающегося</label>
                                    <div class="col-sm-8">${group}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Наименование работы</label>
                                    <div class="col-sm-8" id="value_name">${name}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Тип работы</label>
                                    <div class="col-sm-8" id="value_worktype">${work_type}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Научный руководитель</label>
                                    <div class="col-sm-8" id="value_scientific_adviser">${scientific_supervisor}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Дата защиты</label>
                                    <div class="col-sm-8" id="value_protectdate">${protect_date}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Дата загрузки работы</label>
                                    <div class="col-sm-8" id="value_createdon">${created_at}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Оценка</label>
                                    <div class="col-sm-8" id="value_assessment">${getAssessmentDescription(assessment)}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Согласие на размещение работы</label>
                                    <div class="col-sm-8" id="value_agreement">${getAgreementDescription(agreement)}</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Файл работы</label>
                                    <div class="col-sm-8" id="value_workfile"><a onclick="downloadWork(); return false;" href="#"><span class="glyphicon glyphicon-save-file"></span> Скачать файл работы</a></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Самопроверка работы студентом</label>
                                    <div class="col-sm-8" id="self_check_value">
                                        <a href="#" onclick="updateSelfCheckStatus()" class="btn btn-warning btn-sm"> ${getSelfCheckDescription(self_check)}
                                            <span class="glyphicon glyphicon-refresh">
                                </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Справка о самопроверке работы обучающимся по системе заимствований</label>
                                    @{{if certificate}}
                                    <a class="col-sm-8" onclick="downloadCertificate()">Скачать файл самопроверки </a>
                                    @{{else}}
                                    <div class="col-sm-8" id="value_certificate">Файл справки не загружен</div>
                                    @{{/if}}
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Отчет о заимствованиях по базам ВКР-ВУЗ</label>
                                    @{{if borrowings_percent}}
                                    <div class="col-sm-8" id="value_percent_person">Фактических некорректных заимствований: ${borrowings_percent}</div>
                                    @{{/if}}
                                </div>
                                <div id="works-add-alert"></div>
                            </form>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="comments">
                            <form class="form form-horizontal" id="add_comment_form" onsubmit="addComment(); return false;">
                                <div class="form-group">
                                    <label class="col-sm-4">Заголовок</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="title" placeholder="Укажите заголовок комментария" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Текст комментария</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-success">Добавить</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3>Комментарии к работе:</h3>
                            <div class="row work-comment-pagination pagination pagination-sm" id="comments_list"></div>

                            <div class="work-comment-pagination pagination pagination-sm"></div>
                        </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="closeTmplModal('work_info_student')">Закрыть окно</button>
                    </div>
                </div>
            </div>
        </div>


            </script>

            <script id="comment_tmpl" type="text/x-jquery-tmpl">
                <div id="comment_${id}" class="mb-3" style="border-bottom: 1px solid #ccc">
                <div class="row row-comment">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-2">
								<span class="comment_date">${created_at}</span>
							</div>
							<div class="col-sm-8">
								<span class="sender_name">${sender.name}</span>
							</div>
							<div class="col-sm-2">
								<a href="#" onclick="deleteComment(${id}); return false;">Удалить</a>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="comment_content">
									<h5 class="comment_title">${title}</h5>
									<p>${text}</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</div>

            </script>
    @include('layouts.dashboard.include.tmpls.works_page')
@endsection



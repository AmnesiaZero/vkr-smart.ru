@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-4 g-3 px-md-0 px-3">
            <div class="col-xxl-4 col-xl-5 col-lg-6">
                <div id="tree" class="br-green-light-2 br-15 p-3">
                    <ul class="ui-fancytree fancytree-container fancytree-plain" tabindex="0">
                        @if(is_iterable($years))
                            @foreach($years as $year)
                                <li class="">
		    						<span
                                        class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    							<span class="fancytree-title" id="year_{{$year->id}}">{{$year->year}}</span>
		    						</span>
                                    <ul>
                                        @if(is_iterable($year->faculties))
                                            @foreach($year->faculties as $faculty)
                                                <li class="fancytree-lastsib">
		    								<span
                                                class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    									<span class="fancytree-title"
                                                      id="faculty_{{$faculty->id}}">{{$faculty->name}}</span>
                                            </span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="out-kod"></div>
                <form class="pt-4 col-xl-10" id="search_form" onsubmit="searchWorks();return false">
                    <div class="row g-4">
                        <div class="col-xl-6">
                            <p class="fs-14 mb-2 text-grey">Сотрудник</p>
                            <div id="bg-white" class="bg-white">
                                <select class="js-example-basic-single w-100" name="scientific_supervisor" id="scientific_supervisors_list">
                                    <option value="">Выбрать</option>
                                    @if(isset($scientific_supervisors) and is_iterable($scientific_supervisors))
                                        )
                                        @foreach($scientific_supervisors as $scientific_supervisor)
                                            <option
                                                value="{{$scientific_supervisor->name}}">{{$scientific_supervisor->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">ФИО обучающегося</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="student" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder=""
                                       id="student_input">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
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
                            <p class="text-grey mb-2 fs-14">Группа</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="group" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder=""
                                       id="group_input">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">Тип работы</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="work_type" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder=""
                                       id="work_type_input">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="fs-14 mb-2 text-grey">УГНП</p>
                            <div id="bg-white_1">
                                <select class="js-example-basic-single w-100" name="specialty_id" id="specialties_list">
                                    <option value="" id="default_specialty">Выбрать</option>
                                    @if(isset($program_specialties) and is_iterable($program_specialties))
                                        @foreach($program_specialties as $program_specialty)
                                            <option
                                                value="{{$program_specialty->id}}">{{$program_specialty->name}}</option>
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
                                <input type="text" name="daterange" value="01/01/2023 - 01/15/2023"
                                       class=" fs-14 text-grey p-date w-75"/>
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

                    </div>
                    <div class="row pt-4 d-flex align-items-end">
                        <div class="col">
                            <div class="mt-auto">
                                <button type="submit"
                                        class="btn btn-secondary br-100 br-none text-grey fs-14 py-1 me-3">применить
                                </button>
                                <button class="btn br-green-light-2 br-100 text-grey fs-14 py-1 me-3"
                                        onclick="works();resetSearch()">сбросить
                                </button>
                                <button class="btn bg-green br-100 text-grey fs-14 py-1">выгрузить<img
                                        src="/images/File_Download_green.svg" alt="" class="ps-2"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex mt-5">
            <button class="btn btn-secondary br-100 br-none text-grey fs-14 py-1 w-75 me-3"
                    onclick="openModal('add_work_modal')">добавить<img
                    src="/images/pl-green.svg" alt="" class="ps-2"></button>
            <button class="btn br-green-light-2 br-100 text-grey fs-14 py-1 w-25">импорт из файла<img
                    src="/images/File_Download_green.svg" alt="" class="ps-2"></button>
        </div>

        @include('layouts.dashboard.include.modal.update.work')

        <p class="fs-14 pt-3">
            <span class="text-grey">Работ: <span id="works_count"></span></span>
        </p>
        <div class="pt-3 px-md-0 px-3 position-relative">
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
                </table>
            </div>
            @include('layouts.dashboard.include.menu.work_info')

            <div id="about_work">
            </div>
            <nav aria-label="Page navigation example" class="custom_pagination" id="pagination">
                <ul class="pagination m-0" id="pages">

                </ul>
            </nav>
        </div>
        @include('layouts.dashboard.include.modal.add.work')
        @include('layouts.dashboard.include.modal.update.work')
        @endsection

        @section('scripts')
            <script src="/js/dashboard/works/employees.js"></script>
            <script type="text/javascript" src="/js/jquery/moment.min.js"></script>
            <script type="text/javascript"
                    src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

            <script id="faculty_tmpl" type="text/x-jquery-tmpl">
        <option value="${id}">${name}</option>

            </script>

            <script id="department_tmpl" type="text/x-jquery-tmpl">
     <option value="${id}">${name}</option>


            </script>

            <script id="specialty_tmpl" type="text/x-jquery-tmpl">
     <option value="${id}">${name}</option>


            </script>

            <script id="work_tmpl" type="text/x-jquery-tmpl">
     <tr id="work_${id}" @{{if deleted_at!=null}} class="deleted" @{{/if}}>
    <th scope="row">${specialty.name}</th>
    <td>${student}</td>
    <td>${group}</td>
    <td>${protect_date}</td>
    <td>${name}</td>
    <td>${getAssessmentDescription(assessment)}</td>
    <td>${getSelfCheckDescription(self_check)}</td>
        <td>
            <div class="mt-2"><span class="bg-active px-2 d-flex align-items-center"><div
                        class="me-2 green-c"></div>Отчет</span></div>
        </td>
        <td>
            <img src="/images/three_dots.svg" alt="" class="btn-info-box cursor-p" onclick="openInfoBox(${id})">
        </td>
    </tr>

    </script>

    <script id="work_info_tmpl" type="text/x-jquery-tmpl">
        <div id="work_info_modal" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="deleteElement('work_info_modal');return false"><span aria-hidden="true">×</span></button>
                        <h3>Информация о работе</h3>
                    </div>
                    <div class="modal-body">
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
                                <div class="col-sm-8"></div>
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
                                <div class="col-sm-8" id="value_workfile"><a onclick="workDownload(); return false;" href="#"><span class="glyphicon glyphicon-save-file"></span> Скачать файл работы</a></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Самопроверка работы студентом</label>
                                <div class="col-sm-8" id="value_selfcheck"><a href="#" onclick="workSelfCheck(159128); return false;" class="btn btn-warning btn-sm" id="info-selfcheck159128">Не пройдена <span class="glyphicon glyphicon-refresh"></span></a></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Справка о самопроверке работы обучающимся по системе заимствований</label>
                                <div class="col-sm-8" id="value_certificate">Файл справки не загружен</div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Отчет о заимствованиях по базам ВКР-ВУЗ</label>
                                <div class="col-sm-8" id="value_percent_person">Фактических некорректных заимствований: 70.11%</div>
                            </div>
                            <div id="works-add-alert"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="deleteElement('work_info_modal');return false">Закрыть окно</button>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script id="deleted_menu_tmpl" type="text/x-jquery-tmpl">
     <div class="d-flex cursor-p mb-2">
        <img src="/images/Trash_Full.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="restore()">Восстановить работу</p>
    </div>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/Trash_Full.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="destroyWork()">Стереть запись и удалить прикрепленные файлы</p>
    </div>
    </script>
    <script id="undeleted_menu_tmpl" type="text/x-jquery-tmpl">
        <div class="d-flex cursor-p mb-2">
        <img src="/images/copy.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="copyWork()">Сделать копию записи без создания файлов</p>
    </div>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/Trash_Full.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="deleteWork()">Поместить работу на удаление</p>
    </div>
    </script>

@endsection

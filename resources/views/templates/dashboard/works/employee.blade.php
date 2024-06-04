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
		    						<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    							<span class="fancytree-title" id="year_{{$year->id}}">{{$year->year}}</span>
		    						</span>
                                    <ul>
                                        @if(is_iterable($year->faculties))
                                            @foreach($year->faculties as $faculty)
                                                <li class="fancytree-lastsib">
		    								<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    									<span class="fancytree-title" id="faculty_{{$faculty->id}}">{{$faculty->name}}</span>
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
                <form action="" method="" class="pt-4 col-xl-10">
                    <div class="row g-4">
                        <div class="col-xl-6">
                            <p class="fs-14 mb-2 text-grey">Сотрудник</p>
                            <div id="bg-white" class="bg-white">
                                <select class="js-example-basic-single w-100" name="state">
                                    <option value="0">Иванов Иван Иванович</option>
                                    <option value="1">Козлова Олеся Алексеевна</option>
                                    <option value="2">Кошелев Александр Анатольевич</option>
                                    <option value="3">Менделеев Дмитрий Иванович</option>
                                    <option value="4">Назарова Светлана Анатольевна</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">ФИО обучающегося</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="q" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder="">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">Группа</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="q" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder="">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="text-grey mb-2 fs-14">Тип работы</p>
                            <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                <input type="text" name="q" value=""
                                       class="form-control search br-none fs-14 form-small-p" placeholder="">
                                <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                    <img src="/images/Search.svg" alt="search">
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <p class="fs-14 mb-2 text-grey">УГНП</p>
                            <div id="bg-white_1">
                                <select class="js-example-basic-single w-100" name="state">
                                    <option value="0">01 Математика и механика</option>
                                    <option value="1">02 Компьютерные и информационные науки</option>
                                    <option value="2">03 Физика и астрономия</option>
                                    <option value="3">04 Химия</option>
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
                    </div>
                    <div class="row pt-4 d-flex align-items-end">
                        <div class="col">
                            <div class="mt-auto">
                                <button class="btn btn-secondary br-100 br-none text-grey fs-14 py-1 me-3">применить
                                </button>
                                <button class="btn br-green-light-2 br-100 text-grey fs-14 py-1 me-3">сбросить</button>
                                <button class="btn bg-green br-100 text-grey fs-14 py-1">выгрузить<img
                                        src="/images/File_Download_green.svg" alt="" class="ps-2"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex mt-5">
            <button class="btn btn-secondary br-100 br-none text-grey fs-14 py-1 w-75 me-3"  onclick="openModal('add_work_modal')">добавить<img
                    src="/images/pl-green.svg" alt="" class="ps-2"></button>
            <button class="btn br-green-light-2 br-100 text-grey fs-14 py-1 w-25">импорт из файла<img
                    src="/images/File_Download_green.svg" alt="" class="ps-2"></button>
        </div>
        <p class="fs-14 pt-3"><span class="text-grey">Пользователей:</span> 8</p>
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
                    <tbody class="lh-17 brb-green-light-2">
                    <tr>
                        <th scope="row">38.03.02 |Менеджмент</th>
                        <td>Козлова Олеся Алексеевна</td>
                        <td>123</td>
                        <td>18.06.2020</td>
                        <td>Экономика (Дипломная работа)</td>
                        <td>Не проставлена</td>
                        <td>Пройдена</td>
                        <td>
                            <div class="mt-2"><span class="bg-active px-2 d-flex align-items-center"><div
                                        class="me-2 green-c"></div>Отчет</span></div>
                        </td>
                        <td><img src="/images/three_dots.svg" alt="" class="btn-info-box cursor-p"></td>
                    </tr>
                    <tr>
                        <th scope="row">38.03.02 |Менеджмент</th>
                        <td>Кузьмичев Николай Валерьевич</td>
                        <td>522</td>
                        <td>20.06.2008</td>
                        <td>Теория решения задачи квадратуры круга</td>
                        <td>Хорошо</td>
                        <td>Не пройдена</td>
                        <td><span class="bg-warning-c px-2 d-flex align-items-center"><div class="me-2"><div
                                        class="orange-c"></div></div>Файл не загружен</span></td>
                        <td><img src="/images/three_dots.svg" alt="" class="btn-info-box cursor-p"></td>
                    </tr>
                    <tr>
                        <th scope="row">38.03.02 |Менеджмент</th>
                        <td>Козлова Олеся Алексеевна</td>
                        <td>123</td>
                        <td>18.06.2020</td>
                        <td>Экономика (Дипломная работа)</td>
                        <td>Не проставлена</td>
                        <td>Пройдена</td>
                        <td>
                            <div class="mt-2"><span class="bg-block px-2 d-flex align-items-center"><div
                                        class="me-2 red-c"></div>не выполняется</span></div>
                        </td>
                        <td><img src="/images/three_dots.svg" alt="" class="btn-info-box cursor-p"></td>
                    </tr>
                    <tr>
                        <th scope="row">38.03.02 |Менеджмент</th>
                        <td>Кузьмичев Николай Валерьевич</td>
                        <td>522</td>
                        <td>20.06.2008</td>
                        <td>Теория решения задачи квадратуры круга</td>
                        <td>Хорошо</td>
                        <td>Не пройдена</td>
                        <td><span class="bg-warning-c px-2 d-flex align-items-center"><div class="me-2"><div
                                        class="orange-c"></div></div>Файл не загружен</span></td>
                        <td><img src="/images/three_dots.svg" alt="" class="btn-info-box cursor-p"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="info-box" id="info_box">
                <p class="fs-14 lh-17">Направление подготовки обучающегося</p>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Edit_Pencil.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Изменить направление подготовки</p>
                </div>
                <p class="fs-14 lh-17">Операции над работой</p>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/info.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Просмотр информации о работе</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/down-arr.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Скачать файл работы</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/download.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Загрузить или заменить файл работы</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Edit_Pencil.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Изменить информацию о работе</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/copy.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Сделать копию записи без создания файлов</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Trash_Full.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Поместить работу на удаление</p>
                </div>
                <p class="fs-14 lh-17">Самопроверка</p>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Edit_Pencil.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Изменить статус самопроверки</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/download.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Загрузить или заменить справку<br> о самопроверке по другим
                        системам</p>
                </div>
                <p class="fs-14 lh-17">Дополнительные файлы</p>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/href_light.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Открыть окно управления<br> дополнительными файлами</p>
                </div>
            </div>
        </div>
        <nav class="mt-3 mb-5">
            <ul class="pagination m-0">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><img src="/images/Chevron_Left.svg" alt=""></span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><img src="/images/Chevron_Right.svg" alt=""></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    @include('layouts.dashboard.include.modal.add.work')
@endsection

@section('scripts')
    <script src="/js/dashboard/works/employees.js"></script>
    <script type="text/javascript" src="/js/jquery/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script id="faculty_tmpl" type="text/x-jquery-tmpl">
        <option value="${id}">${name}</option>


    </script>

    <script id="department_tmpl" type="text/x-jquery-tmpl">
     <option value="${id}">${name}</option>
    </script>

    <script id="specialty_tmpl" type="text/x-jquery-tmpl">
     <option value="${id}">${name}</option>
    </script>
@endsection

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
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title"
                                                      id="faculty_{{$faculty->id}}">{{$faculty->name}}</span>
                                            </span>
                                                    <ul style="">
                                                        @if(is_iterable($faculty->departments))
                                                            @foreach($faculty->departments as $department)
                                                                <li class="fancytree-lastsib">
		    										               <span
                                                                       class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
                                                                       <span class="fancytree-expander"></span>
		    											              <span class="fancytree-title"
                                                                            id="department_{{$department->id}}">{{$department->name}}</span>
		    										                </span>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
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
                            <p class="fs-14 mb-2 text-grey">УГНП</p>
                            <div id="bg-white_1">
                                <select class="js-example-basic-single w-100" name="state">
                                    @if(is_iterable($specialties))
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
        <p class="fs-14 pt-5"><span class="text-grey">Пользователей:</span> 8</p>
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
                    <tbody class="lh-17 brb-green-light-2" id="works_list">
                    @if(is_iterable($works))
                        @foreach($works as $work)
                            <tr>
                                {{$specialty = $work->specialty}}
                                <th scope="row"> {{$specialty->code}} |{{$specialty->name}}</th>
                                <td>{{$student}}</td>
                                <td>{{$group}}</td>
                                <td></td>
                                <td>Экономика (Дипломная работа)</td>
                                <td>Не проставлена</td>
                                <td>Пройдена</td>
                                <td>
                                    <div class="mt-2"><span class="bg-active px-2 d-flex align-items-center"><div
                                                class="me-2 green-c"></div>Отчет</span></div>
                                </td>
                                <td><img src="/images/three_dots.svg" alt="" class="btn-info-box cursor-p"></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="info-box" id="info_box">
                <p class="fs-14 lh-17">Операции над работой</p>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/info.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Просмотр информации о работе</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Edit_Pencil.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Изменить информацию о работе</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Chat.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Оставить комментарий</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Trash_Full.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Безвозвратно удалить работу<br> обучающего и все файлы</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/Trash_Full.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Поместить работу на удаление</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/down-arr.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Скачать файл работы</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/copy.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Сделать копию записи без создания файлов</p>
                </div>
                <div class="d-flex cursor-p mb-2 pt-2 brt-black-grey">
                    <img src="/images/download.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Заменить файл работы</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/File_Remove.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Отклонить работу (отправить на доработку)</p>
                </div>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/clock_grey.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Перевести статус работы в режим ожидания</p>
                </div>
                <p class="fs-14 lh-17">Самопроверка</p>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/close_grey.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Файл справки не загружен</p>
                </div>
                <p class="fs-14 lh-17">Согласие на размещение</p>
                <div class="d-flex cursor-p mb-2">
                    <img src="/images/close_grey.svg" alt="" class="pe-2">
                    <p class="fs-14 lh-17 text-grey m-0">Файл согласия не загружен</p>
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
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
        $('.btn-info-box').click(function () {
            $("#info_box").fadeToggle(100);
        });
    </script>
    <script>
        $(function () {
            let start = moment();
            let end = moment().add(29, 'days');
            $('input[name="daterange"]').daterangepicker({
                startDate: start,
                endDate: end,
                "locale": {
                    "format": "DD MMM. YYYY",
                    "separator": " - ",
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "Вс",
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб"
                    ],
                    "monthNames": [
                        "Январь",
                        "Февраль",
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ],
                    "firstDay": 1
                },
                opens: 'left'
            }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".fancytree-title").on('click', function () {
                addBadge($(this).text());
            })
        })
        var addBadge = function (e) {
            let text = e;
            document.querySelector('.out-kod').style.display = "block";
            var elemOutKod = document.querySelector('.out-kod');
            elemOutKod.innerHTML += '<div class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2">' + text + '</div>';
        }
    </script>

    <script id="work_tmpl" type="text/x-jquery-tmpl">
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

    </script>
@endsection

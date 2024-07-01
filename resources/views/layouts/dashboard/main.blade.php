<!DOCTYPE html>
<html lang="ru">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ВКР Смарт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

{{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{'/css/bootstrap-select.css'}}">
    <link rel="stylesheet" type="text/css" href="{{'/css/dashboard.css'}}">
    <link rel="stylesheet" type="text/css" href="{{'/css/fancy_style.css'}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @yield('styles')
</head>
<body>
<header style="margin-bottom: 88px;">
    <nav class="desktop navbar navbar-expand-lg fixed-top header-nav bg-white brb-green-light-2 py-2 px-5">
        <button class="navbar-toggler collapsed box-shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
            </svg>
        </button>
        <a class="navbar-brand brandName" href="#">
            <img src="/images/VKR.svg" alt="">
        </a>
        <div class="navbar-collapse collapse justify-content-end" id="bdNavbar">
            <ul class="navbar-nav" style="align-items: baseline;">
                <li><a class="nav-link text-black-black" href="/home">Главная</a></li>
                <li><a class="nav-link text-black-black" href="/about/product">Хранение&nbsp;работ</a></li>

                <li><a class="nav-link text-black-black" href="/search/borrowings">Поиск&nbsp;заимствований</a></li>
                <li><a class="nav-link text-black-black" href="/portfolio">Портфолио</a></li>
                <li><a class="nav-link text-black-black" href="/check-reference">Проверка&nbsp;справки</a></li>
                <li><a class="nav-link text-black-black" href="https://api.vkr-vuz.ru" target="_blank">API</a></li>

                <li class="user-menu col-sm-5 text-right">
                    <a href="admin-office/" class="btn btn-default btn-testaccess"><span class="glyphicon glyphicon-user"></span> Личный кабинет</a>

                    <a href="#" class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                    </a>

                    <ul class="header dropdown-menu" aria-labelledby="dropdownMenu">
                        <li><a class="dropdown-item" href="/organization-settings">Настройки</a></li>
                        <li><a class="dropdown-item" href="/organization-works">Работы</a></li>
                        <li><a class="dropdown-item" href="/org-users">Электронное портфолио</a></li>
                        <li><a class="dropdown-item" href="/organization-reports">Отчеты</a></li>
                        <li><a class="dropdown-item" href="/organization-documents">Документация</a></li>
                        <li><a class="dropdown-item" href="/dashboard/users/logout">Выйти</a></li>
                        <li class="dropdown-item organization-info"></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="position-relative">
    <div class="row me-md-1 me-0">
        <div class="col-xl-3 col-lg-4 col-md-5 col-12 pe-md-3 pe-0">
            <div class="bg-grey-light p-5 menu">
                <div class="list-custom-1 accordion" id="accordionTwo">
                    <div class="accordion-item">
                        <p class="accordion-header setting" id="headingOne">
                            <button class="accordion-button fs-16 fw-600 box-shadow-none px-0 py-2 m-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne"><span style="width: 40px; height: 24px;"
                                                                      class="pe-3"></span>Настройки
                            </button>
                        </p>
                        <div id="collapseOne"
                             class="accordion-collapse collapse @if(request()->is('dashboard/settings/*')) show @endif"
                             aria-labelledby="headingOne" data-bs-parent="#collapseOne" style="">
                            <div class="accordion-body p-0">
                                <ul class="list-custom-1 m-0">
                                    <li class="list-select"><a href="/dashboard/settings/organizations-structure"
                                                               class="select-a @if(request()->is('*/organizations-structure')) nav-link-active @endif">Структура
                                            <br>организации</a></li>
                                    <li class="list-select"><a href="/dashboard/settings/access"
                                                               class="select-a @if(request()->is('*/access')) nav-link-active @endif">Настройка
                                            <br>доступа</a></li>
                                    <li class="list-select"><a href="/dashboard/settings/invite-codes"
                                                               class="select-a @if(request()->is('*/invite-codes')) nav-link-active @endif">Генерация
                                            <br>кодов приглашений</a></li>
                                    <li class="list-select"><a href="/dashboard/settings/user-management"
                                                               class="select-a @if(request()->is('*/user-management')) nav-link-active @endif">Управление
                                            <br>пользователями</a></li>
                                    <li class="list-select"><a href="/dashboard/settings/handbook-management"
                                                               class="select-a @if(request()->is('*/handbook-management')) nav-link-active @endif">Управление
                                            <br>справочниками</a></li>
                                    <li class="list-select"><a href="/dashboard/settings/"
                                                               class="select-a @if(request()->is('*/view')) nav-link-active @endif">Оформление</a>
                                    </li>
                                    <li class="list-select"><a href="/dashboard/settings/integration"
                                                               class="select-a @if(request()->is('*/integration')) nav-link-active @endif">Интеграция</a>
                                    </li>
                                    <li class="list-select"><a href="/dashboard/settings/api"
                                                               class="select-a @if(request()->is('*/api')) nav-link-active @endif">API
                                            ключ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header work" id="headingTwo">
                            <button class="accordion-button fs-16 fw-600 box-shadow-none px-0 py-2 m-0 collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo"><span
                                    style="width: 40px; height: 24px;" class="pe-3"></span>Работы
                            </button>
                        </p>
                        <div id="collapseTwo"
                             class="accordion-collapse collapse @if(request()->is('dashboard/works/*')) show @endif"
                             aria-labelledby="headingTwo" data-bs-parent="#accordionTwo" style="">
                            <div class="accordion-body p-0">
                                <ul class="list-custom-1 m-0">
                                    <li class="list-select"><a href="/dashboard/works/employees"
                                                               class="select-a @if(request()->is('*/works/employee')) nav-link-active @endif">Загруженные
                                            <br>сотрудниками</a></li>
                                    <li class="list-select"><a href="/dashboard/works/students"
                                                               class="select-a  @if(request()->is('*/works/student')) nav-link-active @endif">Загруженные
                                            <br>студентами</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header portfolio" id="headingThree">
                            <button class="accordion-button fs-16 fw-600 box-shadow-none px-0 py-2 m-0 collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree"><span
                                    style="width: 40px; height: 24px;" class="pe-3"></span>Электронное <br>портфолио
                            </button>
                        </p>
                        <div id="collapseThree"
                             class="accordion-collapse collapse @if(request()->is('dashboard/portfolio/*')) show @endif"
                             aria-labelledby="headingThree" data-bs-parent="#collapseThree" style="">
                            <div class="accordion-body p-0">
                                <ul class="list-custom-1 m-0">
                                    <li class="list-select"><a href="/dashboard/portfolio/teachers"
                                                               class="select-a @if(request()->is('*/portfolio/teachers')) nav-link-active @endif">портфолио<br>преподавателей</a>
                                    </li>
                                    <li class="list-select"><a href="/dashboard/portfolio/students"
                                                               class="select-a @if(request()->is('*/portfolio/students')) nav-link-active @endif">портфолио<br>обучающихся</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p class="text-grey fw-600"><img src="/images/Chart_Line.svg" alt="" class="pe-3"><a
                            href="/dashboard/report"
                            class="text-grey text-grey-hover fw-600 td-none @if(request()->is('dashboard/report')) nav-link-active @endif">Отчеты</a>
                    </p>
                    <p class="text-grey fw-600"><img src="/images/File_Document.svg" alt="" class="pe-3"><a
                            href="/dashboard/documentation"
                            class="text-grey text-grey-hover fw-600 td-none @if(request()->is('dashboard/documentation')) nav-link-active @endif">Документация</a>
                    </p>
                </div>
            </div>
        </div>



        @yield('content')

    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="http://www.vkr-vuz.ru/assets/templates/c/js/jquery.fancytree.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

<script src="/js/bootstrap-select.js"></script>

<script src="/js/app.js"></script>

<script src="/js/jquery/jquery.tmpl.min.js"></script>

<script src="/js/jquery/jquery.simplePagination.js"></script>



@yield('scripts')
</body>
</html>

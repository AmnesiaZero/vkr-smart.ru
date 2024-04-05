<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ВКР Смарт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ '/css/app.css' }}">
    @yield('styles')
</head>
<body>
<header style="margin-bottom: 120px;">
    <nav class="desktop navbar navbar-expand-lg fixed-top header-nav bg-white brb-green-light-2 py-4">
        <div class="container align-items-center">
            <button class="navbar-toggler collapsed box-shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                </svg>
            </button>
            <a class="navbar-brand brandName" href="/">
                <img src="/images/VKR.svg" alt="">
            </a>
            <div class="navbar-collapse collapse justify-content-end" id="bdNavbar">
                <ul class="navbar-nav" style="align-items: baseline;">
                    <li><a class="nav-link @if(request()->is('/') or request()->is('home')) nav-link-active @endif" href="/">Главная</a></li>
                    <!--
                    <li class="position-relative">
                           <a class="nav-link dropdown-toggle dropdown-toggle-arr" href="#" id="navbarDropdownCatalog" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            Каталоги
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCatalog" data-bs-popper="none">
                            <li><a class="dropdown-item" href="#">Цифровая библиотека</a></li>
                            <li><a class="dropdown-item" href="#">Онлайн-курсы</a></li>
                            <li><a class="dropdown-item" href="#">Лекторий</a></li>
                        </ul>
                    </li>
                    -->
                    <li>
                        <a class="nav-link @if(request()->is('about/*')) nav-link-active @endif" href="/about/product">
                            Хранение работ</a>
                    </li>

                    <li>
                        <a class="nav-link @if(request()->is('search/*')) nav-link-active @endif" href="/search/borrowings">
                            Поиск заимствований
                        </a>
                    </li>
                    <li>
                        <a class="nav-link @if(request()->is('portfolio')) nav-link-active @endif" href="/portfolio">
                            Портфолио</a>
                    </li>
                    <li>
                        <a class="nav-link @if(request()->is('check-reference')) nav-link-active @endif" href="/check-reference">
                            Проверка справки
                        </a>
                    </li>
                    <li><a class="nav-link" href="https://api.vkr-vuz.ru" target="_blank">API</a></li>
                    <li>
                        <a href="/login" class="nav-link">
		                        		<span class="badge br-40 br-green-1"  style="padding-top: 7px; padding-bottom: 7px;">
		                        			<span class="fs-16 text-black ps-1 pe-1"> вход </span>
		                        		</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="navbar-collapse collapse justify-content-end" id="navbar">

            </div>
        </div>
    </nav>
</header>
@yield('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<footer>
    <div class="bg-green py-5">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-lg-3 align-items-center">
                    <img src="/images/VKR.svg" alt="">
                    <p class="pt-1">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#vkrBtnsSetup">Установка кнопки на ваш сайт</a>
                    <div id="vkrBtnsSetup" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="vkrBtnsSetupLabel">Инструкция по установке кнопок системы хранения ВКР СМАРТ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Для установки одной из кнопок системы «ВКР-ВУЗ» на свой сайт, скопируйте код из соответствующего поля и поместите его в необходимом месте на вашем сайте</p><hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="/images/vkr.png" class="img-responsive">
                                        </div>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" onclick="$(this).select(); return false;">&lt;a href="http://www.vkr-vuz.ru"&gt;&lt;img src="http://www.vkr-vuz.ru/assets/templates/c/img/footer/vkr.png" /&gt;&lt;/a&gt;</textarea>
                                        </div>
                                    </div>
                                    <hr class="hr-xs">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="/images/vkr-sm.png" class="img-responsive">
                                        </div>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" onclick="$(this).select(); return false;">&lt;a href="http://www.vkr-vuz.ru"&gt;&lt;img src="http://www.vkr-vuz.ru/assets/templates/c/img/footer/vkr-sm.png" /&gt;&lt;/a&gt;</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть окно</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                    <p class="fs-24 fw-700 mb-2">8 (8452) 24-77-96</p>
                    <p class="m-0 fs-14">Звонок по России бесплатный</p>
                </div>
                <div class="col-xxl-7 col-lg-6 col-sm-8 col-12">
                    <p class="lh-18 fs-12">Программа для ЭВМ «ВКР -СМАРТ» — «умная» система проверки на заимствования и хранения ВКР», зарегистрирована Федеральной службой по интеллектуальной собственности 01.09.2021 г. свидетельство о государственной регистрации программы для ЭВМ № 2 021 664 219</p>
                    <p class="lh-18 fs-12 m-0">ООО «Профобразование» включено в Реестр аккредитованных IT компаний, на основании РЕШЕНИЯ о предоставлении государственной аккредитации организации, осуществляющей деятельность в области информационных технологий от 17.03.2022 № АО-20 220 316-3 829 208 820-3, выданного МИНИСТЕРСТВОМ ЦИФРОВОГО РАЗВИТИЯ, СВЯЗИ И МАССОВЫХ КОММУНИКАЦИЙ РОССИЙСКОЙ ФЕДЕРАЦИИ.</p>
                </div>
                <div class="col-xxl-2 col-lg-3 col-sm-4 col-12 d-flex flex-column align-items-sm-end justify-content-center">
                    <p class="fw-700">Мы в социальных сетях</p>
                    <div>
                       <a href="https://vk.com/vkrvuz" target="_blank"> <img src="/images/vk.svg" alt="Вконтакте"> </a>
                        <a href="https://www.youtube.com/watch?v=jYH8MoxSoP0&list=PLRzHZiF2tgd5RN7sxyGP-5BO55dOvsVIS" target="_blank"> <img src="/images/youtube.svg" alt="YouTube"> </a>
                        <a href="https://t.me/ipredu_online" target="_blank"> <img src="/images/tg.svg" alt="Telegram"> </a>
                    </div>
                    <div class="pt-3">
                        <img src="/images/16.svg" alt="16+">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

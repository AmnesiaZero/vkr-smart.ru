<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ВКР Смарт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    @yield('styles')
</head>
<body>
<header style="margin-bottom: 88px;">
    <nav class="desktop navbar navbar-expand-lg fixed-top header-nav bg-white brb-green-light-2 py-2 px-5">
        <button class="navbar-toggler collapsed box-shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
            </svg>
        </button>
        <a class="navbar-brand brandName" href="#">
            <img src="img/VKR.svg" alt="">
        </a>
        <div class="navbar-collapse collapse justify-content-end" id="bdNavbar">
            <ul class="navbar-nav" style="align-items: baseline;">
                <li><a class="nav-link text-black-black" href="#">Главная</a></li>
                <li><a class="nav-link text-black-black" href="#">Хранение работ</a></li>

                <li><a class="nav-link text-black-black" href="#">Поиск заимствований</a></li>
                <li><a class="nav-link text-black-black" href="#">Портфолио</a></li>
                <li><a class="nav-link text-black-black" href="#">Проверка справки</a></li>
                <li><a class="nav-link text-black-black" href="#">API</a></li>
                <li>
                    <a href="#" class="nav-link">
		                        		<span class="badge br-40 br-green-1"  style="padding-top: 7px; padding-bottom: 7px;">
		                        			<span class="fs-16 ps-1 pe-1 text-black-black">вход</span>
		                        		</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="http://www.vkr-vuz.ru/assets/templates/c/js/jquery.fancytree.min.js"></script>
</body>
</html>

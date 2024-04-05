<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ВКР Смарт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="fancy_style.css">
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
<main class="position-relative">
    <div class="row me-md-1 me-0">
        <div class="col-xl-3 col-lg-4 col-md-5 col-12 pe-md-3 pe-0">
            <div class="bg-grey-light p-5 menu h-100">
                <div class="list-custom-1 accordion" id="accordionTwo">
                    <div class="accordion-item">
                        <p class="accordion-header setting" id="headingOne">
                            <button class="accordion-button fs-16 fw-600 box-shadow-none px-0 py-2 m-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span style="width: 40px; height: 24px;" class="pe-3"></span>Настройки</button>
                        </p>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#collapseOne" style="">
                            <div class="accordion-body p-0">
                                <ul class="list-custom-1 m-0">
                                    <li class="list-select"><a href="#" class="select-a">Структура <br>организации</a></li>
                                    <li class="list-select"><a href="#" class="select-a">Настройка <br>доступа</a></li>
                                    <li class="list-select"><a href="#" class="select-a">Генерация <br>кодов приглашений</a></li>
                                    <li class="list-select"><a href="#" class="select-a">Управление <br>пользователями</a></li>
                                    <li class="list-select"><a href="#" class="select-a">Управление <br>справочниками</a></li>
                                    <li class="list-select"><a href="#" class="select-a">Оформление</a></li>
                                    <li class="list-select"><a href="#" class="select-a">Интеграция</a></li>
                                    <li class="list-select"><a href="#" class="select-a">API ключ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header work" id="headingTwo">
                            <button class="accordion-button fs-16 fw-600 box-shadow-none px-0 py-2 m-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span style="width: 40px; height: 24px;" class="pe-3"></span>Работы</button>
                        </p>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo" style="">
                            <div class="accordion-body p-0">
                                <ul class="list-custom-1 m-0">
                                    <li class="list-select"><a href="#" class="select-a">Загруженные <br>сотрудниками</a></li>
                                    <li class="list-select"><a href="#" class="select-a">Загруженные <br>студентами</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <p class="accordion-header portfolio" id="headingThree">
                            <button class="accordion-button fs-16 fw-600 box-shadow-none px-0 py-2 m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><span style="width: 40px; height: 24px;" class="pe-3"></span>Электронное <br>портфолио</button>
                        </p>
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#collapseThree" style="">
                            <div class="accordion-body p-0">
                                <ul class="list-custom-1 m-0">
                                    <li class="list-select"><a href="#" class="select-a">портфолио<br>преподавателей</a></li>
                                    <li class="list-select"><a href="#" class="select-a list-select-active">портфолио<br>обучающихся</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p class="text-grey fw-600"><img src="img/Chart_Line.svg" alt="" class="pe-3"><a href="#" class="text-grey text-grey-hover fw-600 td-none">Отчеты</a></p>
                    <p class="text-grey fw-600"><img src="img/File_Document.svg" alt="" class="pe-3"><a href="#" class="text-grey text-grey-hover fw-600 td-none">Документация</a></p>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7 col-12">
            <div class="row pt-4 g-3 px-md-0 px-3">
                <div class="col-xxl-4 col-xl-5 col-lg-6">
                    <div id="tree" class="br-green-light-2 br-15 p-3">
                        <ul class="ui-fancytree fancytree-container fancytree-plain" tabindex="0">
                            <li class="">
		    							<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    								<span class="fancytree-title">2018</span>
		    							</span>
                                <ul>
                                    <li class="fancytree-lastsib">
		    									<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-ef">
		    										<span class="fancytree-expander"></span>
		    										<span class="fancytree-title">Экономический факультет</span>
		    									</span>
                                        <ul style="display: block;">
                                            <li class="fancytree-lastsib">
		    											<span class="fancytree-node fancytree-active fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
		    												<span class="fancytree-expander"></span>
		    												<span class="fancytree-title">Кафедра экономической теории и национальной экономики</span>
		    											</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
		    							<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    								<span class="fancytree-title">2019</span>
		    							</span>
                                <ul>
                                    <li class="fancytree-lastsib">
		    									<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-ef">
		    										<span class="fancytree-expander"></span>
		    										<span class="fancytree-title">Юридический факультет</span>
		    									</span>
                                        <ul style="">
                                            <li class="fancytree-lastsib">
		    											<span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c"><span class="fancytree-expander"></span>
		    											<span class="fancytree-title">Кафедра политических наук</span>
		    										</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
		    						<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">	<span class="fancytree-title">2020</span>
		    						</span>
                                <ul>
                                    <li class="fancytree-lastsib">
		    								<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-ef">
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title">Факультет финансов и учета</span>
		    								</span>
                                        <ul style="">
                                            <li class="fancytree-lastsib">
		    										<span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
		    											<span class="fancytree-expander"></span>
		    											<span class="fancytree-title">Кафедра налогов и налогообложения</span>
		    										</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
		    						<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-exp-n fancytree-ico-ef">
		    							<span class="fancytree-title">2018</span>
		    						</span>
                            </li>
                            <li class="">
		    						<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    							<span class="fancytree-title">2032</span>
		    						</span>
                                <ul>
                                    <li class="fancytree-lastsib">
		    								<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-ef">
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title">Факультет финансов и учета</span>
		    								</span>
                                        <ul style="">
                                            <li class="fancytree-lastsib">
		    										<span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
		    											<span class="fancytree-expander"></span>
		    											<span class="fancytree-title">Кафедра налогов и налогообложения</span>
		    										</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
		    						<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    							<span class="fancytree-title">2029</span>
		    						</span>
                                <ul>
                                    <li class="fancytree-lastsib">
		    								<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-ef">
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title">Факультет экономики и управления</span>
		    								</span>
                                        <ul style="">
                                            <li class="fancytree-lastsib">
		    										<span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
		    											<span class="fancytree-expander"></span>
		    											<span class="fancytree-title">кафедра экономики</span>
		    										</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
		    						<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    							<span class="fancytree-title">2021</span>
		    						</span>
                                <ul>
                                    <li class="fancytree-lastsib">
		    								<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title">Факультет финансов и учета</span>
		    								</span>
                                        <ul style="">
                                            <li class="fancytree-lastsib">
		    										<span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
		    											<span class="fancytree-expander"></span>
		    											<span class="fancytree-title">Кафедра налогов и налогообложения</span>
		    										</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="fancytree-lastsib">
		    								<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title">Факультет менеджмента</span>
		    								</span>
                                        <ul style="">
                                            <li class="">
		    										<span class="fancytree-node fancytree-exp-n fancytree-ico-c">
		    											<span class="fancytree-expander"></span>
		    											<span class="fancytree-title">менеджмента</span>
		    										</span>
                                            </li>
                                            <li class="fancytree-lastsib">
		    										<span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
		    											<span class="fancytree-expander"></span>
		    											<span class="fancytree-title">Реклама и связи с общественностью</span>
		    										</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="fancytree-lastsib">
		    								<span class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-lastsib fancytree-exp-el fancytree-ico-ef">
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title">Факультет энергетики</span>
		    								</span>
                                        <ul style="">
                                            <li class="fancytree-lastsib">
		    										<span class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
		    											<span class="fancytree-expander"></span>
		    											<span class="fancytree-title">Кафедра физики твердого тела</span>
		    										</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="out-kod"></div>
                    <form action="" method="" class="pt-4 col-xl-10">
                        <div class="row g-3">
                            <div class="col-xl-6">
                                <p class="text-grey mb-2 fs-14">ФИО обучающегося</p>
                                <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                    <input type="text" name="q" value="" class="form-control search br-none fs-14 form-small-p" placeholder="">
                                    <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                        <img src="img/Search.svg" alt="search">
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <p class="text-grey mb-2 fs-14">Группа</p>
                                <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                    <input type="text" name="q" value="" class="form-control search br-none fs-14 form-small-p" placeholder="">
                                    <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                        <img src="img/Search.svg" alt="search">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 pt-3 d-flex align-items-end">
                            <div class="col-xl-6">
                                <p class="text-grey mb-2 fs-14">Поиск по email</p>
                                <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                                    <input type="text" name="q" value="" class="form-control search br-none fs-14 form-small-p" placeholder="">
                                    <button class="btn pe-3 py-0 fs-14" type="submit" id="search">
                                        <img src="img/Search.svg" alt="search">
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mt-auto">
                                    <button class="btn btn-secondary br-100 br-none text-grey fs-14 py-1">применить</button>
                                    <button class="btn br-green-light-2 br-100 text-grey fs-14 py-1">сбросить</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pt-5 px-md-0 px-3">
                <p class="text-grey fs-14">Пользователей: <span class="text-black">8</span></p>
                <div class="row g-3">
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-active br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/green_active.svg" alt="" class="pe-2"></span>Активен</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-block br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/red.svg" alt="" class="pe-2"></span>Заблокирован</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-active br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/green_active.svg" alt="" class="pe-2"></span>Активен</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-active br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/green_active.svg" alt="" class="pe-2"></span>Активен</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-active br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/green_active.svg" alt="" class="pe-2"></span>Активен</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-active br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/green_active.svg" alt="" class="pe-2"></span>Активен</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-block br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/red.svg" alt="" class="pe-2"></span>Заблокирован</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="br-green-light-1 p-3 br-15">
                            <div class="d-flex pb-4">
                                <div class="bg-active br-100">
                                    <p class="text-grey fs-14 m-0 px-3"><span><img src="img/green_active.svg" alt="" class="pe-2"></span>Активен</p>
                                </div>
                            </div>
                            <p>Васин<br> Петр Михайлович</p>
                            <div class="border-left ps-3 mb-3">
                                <p class="text-grey fs-14 mb-1">Группа: 156а</p>
                                <p class="text-grey fs-14 mb-1">13.03.2020</p>
                                <p class="text-grey fs-14 mb-1">koshelev76@mail.ru</p>
                            </div>
                            <p class="mb-1"><img src="img/doc_grey_img.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">работы</a></p>
                            <p class="mb-1"><img src="img/User_Card_Id_Grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">портфолио</a></p>
                            <p class="mb-1"><img src="img/setting_grey.svg" alt=""><a href="#" class="text-grey ps-2 fs-14 link-active-hover">управление портфолио</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="mt-3 mb-5">
                <ul class="pagination m-0">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true"><img src="img/Chevron_Left.svg" alt=""></span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><img src="img/Chevron_Right.svg" alt=""></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="http://www.vkr-vuz.ru/assets/templates/c/js/jquery.fancytree.min.js"></script>
<script>

    $(document).ready(function(){
        getReport(0);
    });
    $(function(){
        $("#tree").fancytree({
            checkbox: false,
            cache: false,
            source: [{"title":"2018","folder":true,"select":false,"key":"y_1092","children":[{"title":"\u042d\u043a\u043e\u043d\u043e\u043c\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0444\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442","folder":true,"select":false,"key":"f_3202","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u044d\u043a\u043e\u043d\u043e\u043c\u0438\u0447\u0435\u0441\u043a\u043e\u0439 \u0442\u0435\u043e\u0440\u0438\u0438 \u0438 \u043d\u0430\u0446\u0438\u043e\u043d\u0430\u043b\u044c\u043d\u043e\u0439 \u044d\u043a\u043e\u043d\u043e\u043c\u0438\u043a\u0438","select":false,"key":"d_8720"}]}]},{"title":"2019","folder":true,"select":false,"key":"y_1093","children":[{"title":"\u042e\u0440\u0438\u0434\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0444\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442","folder":true,"select":false,"key":"f_3203","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u043f\u043e\u043b\u0438\u0442\u0438\u0447\u0435\u0441\u043a\u0438\u0445 \u043d\u0430\u0443\u043a","select":false,"key":"d_8721"}]}]},{"title":"2020","folder":true,"select":false,"key":"y_1154","children":[{"title":"\u0424\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442 \u0444\u0438\u043d\u0430\u043d\u0441\u043e\u0432 \u0438 \u0443\u0447\u0435\u0442\u0430","folder":true,"select":false,"key":"f_3405","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u043d\u0430\u043b\u043e\u0433\u043e\u0432 \u0438 \u043d\u0430\u043b\u043e\u0433\u043e\u043e\u0431\u043b\u043e\u0436\u0435\u043d\u0438\u044f","select":false,"key":"d_9332"}]}]},{"title":"2018","folder":true,"select":false,"key":"y_1204","children":null},{"title":"2032","folder":true,"select":false,"key":"y_1295","children":[{"title":"\u0424\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442 \u0444\u0438\u043d\u0430\u043d\u0441\u043e\u0432 \u0438 \u0443\u0447\u0435\u0442\u0430","folder":true,"select":false,"key":"f_3937","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u043d\u0430\u043b\u043e\u0433\u043e\u0432 \u0438 \u043d\u0430\u043b\u043e\u0433\u043e\u043e\u0431\u043b\u043e\u0436\u0435\u043d\u0438\u044f","select":false,"key":"d_11426"}]}]},{"title":"2029","folder":true,"select":false,"key":"y_1344","children":[{"title":"\u0424\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442 \u044d\u043a\u043e\u043d\u043e\u043c\u0438\u043a\u0438 \u0438 \u0443\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u044f","folder":true,"select":false,"key":"f_4045","children":[{"title":"\u043a\u0430\u0444\u0435\u0434\u0440\u0430 \u044d\u043a\u043e\u043d\u043e\u043c\u0438\u043a\u0438","select":false,"key":"d_11792"}]}]},{"title":"2022","folder":true,"select":false,"key":"y_1386","children":[{"title":"\u0424\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442 \u044d\u043a\u043e\u043d\u043e\u043c\u0438\u043a\u0438 \u0438 \u0443\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u044f","folder":true,"select":false,"key":"f_4125","children":[{"title":"\u042d\u043a\u043e\u043d\u043e\u043c\u0438\u043a\u0430 \u0438 \u0443\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u0435","select":false,"key":"d_11961"}]}]},{"title":"2019","folder":true,"select":false,"key":"y_1425","children":null},{"title":"2019","folder":true,"select":false,"key":"y_1426","children":[{"title":"\u0421\u043e\u0446\u0438\u043e\u043b\u043e\u0433\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0444\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442","folder":true,"select":false,"key":"f_4752","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u0441\u043e\u0446\u0438\u043e\u043b\u043e\u0433\u0438\u0438","select":false,"key":"d_14571"}]}]},{"title":"2021","folder":true,"select":false,"key":"y_1646","children":[{"title":"\u0424\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442 \u0444\u0438\u043d\u0430\u043d\u0441\u043e\u0432 \u0438 \u0443\u0447\u0435\u0442\u0430","folder":true,"select":false,"key":"f_4921","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u043d\u0430\u043b\u043e\u0433\u043e\u0432 \u0438 \u043d\u0430\u043b\u043e\u0433\u043e\u043e\u0431\u043b\u043e\u0436\u0435\u043d\u0438\u044f","select":false,"key":"d_15176"}]},{"title":"\u0424\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442 \u043c\u0435\u043d\u0435\u0434\u0436\u043c\u0435\u043d\u0442\u0430","folder":true,"select":false,"key":"f_4947","children":[{"title":"\u043c\u0435\u043d\u0435\u0434\u0436\u043c\u0435\u043d\u0442\u0430","select":false,"key":"d_15223"},{"title":"\u0420\u0435\u043a\u043b\u0430\u043c\u0430 \u0438 \u0441\u0432\u044f\u0437\u0438 \u0441 \u043e\u0431\u0449\u0435\u0441\u0442\u0432\u0435\u043d\u043d\u043e\u0441\u0442\u044c\u044e","select":false,"key":"d_17015"}]},{"title":"\u0424\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442 \u044d\u043d\u0435\u0440\u0433\u0435\u0442\u0438\u043a\u0438","folder":true,"select":false,"key":"f_5043","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u0444\u0438\u0437\u0438\u043a\u0438 \u0442\u0432\u0435\u0440\u0434\u043e\u0433\u043e \u0442\u0435\u043b\u0430","select":false,"key":"d_15558"}]}]},{"title":"2018 - \u043a\u043e\u043f\u0438\u044f","folder":true,"select":false,"key":"y_2168","children":[{"title":"\u042d\u043a\u043e\u043d\u043e\u043c\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0444\u0430\u043a\u0443\u043b\u044c\u0442\u0435\u0442","folder":true,"select":false,"key":"f_6744","children":[{"title":"\u041a\u0430\u0444\u0435\u0434\u0440\u0430 \u044d\u043a\u043e\u043d\u043e\u043c\u0438\u0447\u0435\u0441\u043a\u043e\u0439 \u0442\u0435\u043e\u0440\u0438\u0438 \u0438 \u043d\u0430\u0446\u0438\u043e\u043d\u0430\u043b\u044c\u043d\u043e\u0439 \u044d\u043a\u043e\u043d\u043e\u043c\u0438\u043a\u0438","select":false,"key":"d_21607"}]}]}],
            debugLevel: 0,
            icon: false,
            minExpandLevel: 2,
            activate: function(event, data){
                getReport(data.node.key)
            }
        });
    });
    function getReport(key){
        $.ajax({
            url : "/report-actions",
            data : "key="+key,
            type : "post",
            dataType : "json",
            success : function(response){
                if(response.success){
                    $.each( response.data, function( key, val ) {
                        $("#"+key).html(val);
                    });
                }
            }
        });
    }
</script>
<script>
    $(document).ready(function(){
        $(".fancytree-title").on('click',function(){
            addBadge($(this).text());
        })
    })
    var addBadge = function(e) {
        let text = e;
        document.querySelector('.out-kod').style.display = "block";
        var elemOutKod = document.querySelector('.out-kod');
        elemOutKod.innerHTML += '<div class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2">' + text + '</div>';
    }
</script>
</body>
</html>

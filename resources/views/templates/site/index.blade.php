@extends('layouts.main')

@section('content')
    <main class="position-relative">
        <img src="/images/8.svg" alt="" class="position-absolute t-0 r-0 z-1">
        <div class="container py-5">
            <div class="row pt-5">
                <div class="col-lg-5">
                    <h2 class="pt-5 mt-3">ВКР СМАРТ – создаем культуру академической честности</h2>
                    <p class="w-75 py-4">Обеспечивайте оригинальность работ студентов, комплексно храните работы
                        учебного заведения, создавайте банк электронных портфолио обучающихся</p>
                    <button type="button" class="btn text-green br-green-light-2 br-15 px-4">получить тестовый доступ
                    </button>
                </div>
                <div class="col-lg-3 pt-lg-0 pt-4">
                    <div class="row g-3">
                        <div class="col">
                            <div class="bg-lin-green br-20 p-4 shadow-1">
                                <img src="/images/icon-25.svg" alt="" class="pb-2">
                                <h6>Электронное портфолио достижений в ЭИОС вуза</h6>
                                <p class="fs-14 m-0">ведение собственного архива работ на протяжении всего срока
                                    обучения/работы в образовательном учреждении</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="bg-lin-green br-20 p-4 shadow-1">
                                <img src="/images/icon-22.svg" alt="" class="pb-2">
                                <h6>Соответствие законодательству</h6>
                                <p class="fs-14 m-0">выполнение всех требований ФГОС ВО и СПО, а также соответствие
                                    ГОСТам</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row pt-lg-0 pt-4 g-3">
                        <div class="col">
                            <div class="bg-lin-green br-20 p-4 shadow-1">
                                <img src="/images/icon-26.svg" alt="" class="pb-2">
                                <h6>Современные уникальные методы поиска заимствований и формирования отчетов</h6>
                                <p class="fs-14 m-0">работы проходят полный анализ не только на заимствование, но и на
                                    цитирование, что позволяет формировать детальный отчет и направлять текст для
                                    доработки обучающемуся</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="bg-lin-green br-20 p-4 shadow-1">
                                <img src="/images/icon-25.svg" alt="" class="pb-2">
                                <h6>Безопасность хранения</h6>
                                <p class="fs-14 m-0">все работы хранятся в специальном зашифрованном формате в течении 5
                                    лет. Доступ к работам возможен только для администраторов и только в разрезе
                                    учебного заведения</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5 my-5">
                <div class="row bg-green br-62 p-5 mt-5 position-relative">
                    <div class="col-xl-5 list-custom">
                        <h3 class="pb-4">Возможности <br>платформы ВКР СМАРТ</h3>
                        <ul class="lh-19 ps-0">
                            <li class="pb-4">Использование всех функций системы в комплексе или выбор одного из
                                решений
                            </li>
                            <li class="pb-4">Оптимизация финансовых, трудовых и временных затрат</li>
                            <li class="pb-4">Быстрая интеграция в ЭИОС вуза</li>
                            <li class="pb-4">Полная защита от копирования размещенных  на платформе материалов</li>
                            <li class="pb-4">Повышение цифровизации учебного заведения</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 d-none d-xl-block">
                        <div class="position-absolute b-0 r-0">
                            <img src="/images/1.png" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="bg-black-light py-5 position-relative">
            <img src="/images/bubble-1.png" alt="" class="position-absolute b-0 l-0">
            <img src="/images/bubble-2.png" alt="" class="position-absolute t-0 r-0">
            <h2 class="text-center text-white pt-5 mt-5">ВКР СМАРТ для каждого</h2>
            <p class="text-center text-white fs-20">Выберите свою роль на платформе</p>
            <div class="container">
                <div class="row d-flex align-items-end py-5 px-xxl-5 px-0 my-5 g-4">
                    <div class="col-xl-4 col-lg-6 position-relative">
                        <div class="card br-none br-10 mx-auto position-relative card-weight">
                            <div class="br-10 position-absolute shadow-card-badge">
                                <span
                                    class="badge bg-white br-100 text-black fs-20 fw-700 position-absolute card-badge">Администратор</span>
                            </div>
                            <img class="card-img-top" src="/images/2.png" alt="">
                            <div class="card-body">
                                <p>управление полным функционалом системы и доступ к настройкам структуры организации,
                                    доступ ко всем архивам по вузу и годам, к текстам работ, блокировке сотрудников</p>
                            </div>
                        </div>
                        <img src="/images/6.svg" alt="" style="right: 64px;bottom: -43px;"
                             class="d-none d-xl-block position-absolute">
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card br-none br-10 mx-auto position-relative card-weight">
                            <div class="br-10 position-absolute shadow-card-badge">
                                <span
                                    class="badge bg-white br-100 text-black fs-20 fw-700 position-absolute card-badge">Сотрудник подразделения</span>
                            </div>
                            <img class="card-img-top" src="/images/3.png" alt="">
                            <div class="card-body">
                                <p>загрузка, одобрение или отклонение работ обучающихся, проверка работ на
                                    заимствования</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 position-relative">
                        <div class="card br-none br-10 mx-auto position-relative card-weight">
                            <div class="br-10 position-absolute shadow-card-badge">
                                <span
                                    class="badge bg-white br-100 text-black fs-20 fw-700 position-absolute card-badge">Обучающийся</span>
                            </div>
                            <img class="card-img-top" src="/images/4.png" alt="">
                            <div class="card-body">
                                <p>загрузка и проверка на объем заимствований своих работ, отправка текста на одобрение
                                    ответственному за размещение ВКР в системе, ведение портфолио собственных
                                    достижений</p>
                            </div>
                        </div>
                        <img src="/images.svg" alt="" style="left: 34%; top: -114px;"
                             class="d-none d-xl-block position-absolute">
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row p-5 my-5">
                <div class="col-lg-6">
                    <div class="bg-green br-20 p-5 h-100">
                        <div class="list-custom px-xxl-4 px-0">
                            <h3 class="pb-4">Комфортная работа <br>с платформой</h3>
                            <ul class="lh-26 ps-0">
                                <li class="pb-4">Бесплатные обновления индексной базы, по которой ведётся проверка на
                                    заимствования
                                </li>
                                <li class="pb-4">Использование только российского ПО в российских data-центрах</li>
                                <li class="pb-4">Бесплатное хранение работ в течение 5 лет</li>
                                <li class="pb-4">Возможность генерировать любое количество учетных записей
                                    пользователей
                                </li>
                                <li class="pb-4">Передача полного архива работ в случае смены репозитория</li>
                                <li class="pb-4">Брендирование страниц платформы фирменным стилем учебного заведения
                                </li>
                                <li class="pb-4">Безлимитное количество проверок</li>
                                <li class="pb-4">Индивидуальные настройки структуры под потребности учебного заведения
                                </li>
                            </ul>
                            <button class="btn btn-primary fs-20 w-100">получить тестовый доступ</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/images/7.png" alt="" class="w-100">
                    <div class="bg-green br-20 px-xxl-5 px-0 pt-5 pb-4 mt-4">
                        <div class="list-custom px-4">
                            <h3 class="pb-4">ВКР СМАРТ<br> лучшее решение для</h3>
                            <ul class="lh-19 ps-0">
                                <li class="pb-4">высших учебных заведений</li>
                                <li class="pb-4">учреждений среднего профессионального образования</li>
                                <li class="pb-4">организаций, осуществляющих программы дополнительного профессионального
                                    образования
                                </li>
                                <li class="pb-4">НИИ</li>
                                <li class="pb-4">любых учебных заведений и учреждений, которым необходим сервис для
                                    распознавания заимствований
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-black py-5 position-relative">
            <img src="/images/bubble-4.png" alt="" class="position-absolute b-0 r-0">
            <img src="/images/bubble-5.png" alt="" class="position-absolute t-0" style="left:11%;">
            <div class="container pb-5 pt-2">
                <div class="row">
                    <div class="col-lg-4 ps-xxl-5 ps-3 ms-xxl-5 ms-0">
                        <h2 class="text-white pb-3">Всё проще, <br>чем кажется</h2>
                        <p class="text-white fs-20 pb-4 lh-24">Презентация и инструкция помогут быстро и легко освоиться
                            на платформе</p>
                        <div class="row">
                            <div class="col-6">
                                <img src="/images/instrution.png" alt="">
                                <div><a href="#" class="text-white">Скачать инструкцию</a></div>
                            </div>
                            <div class="col-6">
                                <img src="/images/presentation.png" alt="">
                                <div><a href="#" class="text-white">Скачать презентацию</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 ps-lg-5 ms-lg-5 ps-3 ms-0 mt-lg-auto mt-5">
                        <img src="/images/default-video.png" class="/imagesluid" alt="">
                        <div><a href="#" class="text-white">Видеоинструкция платформы</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5 my-5">
            <div class="d-flex align-items-center justify-content-between pt-5 pb-4">
                <h2>Отзывы о нас</h2>
                <span class="br-green-1 br-100 text-green badge fs-14">смотреть все<img src="/images/arrow-green.svg"
                                                                                        alt="" class="ps-2"></span>
            </div>
            <div class="row py-5 g-4">
                <div class="col-lg-4">
                    <div class="card br-none shadow-1 br-15 p-4 h-100">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-1 col-2">
                                <img src="/images/logo-1.png" alt="">
                            </div>
                            <div class="col ps-3">
                                <p class="fw-700 mb-1">ФГБОУ ВО АГПУ</p>
                                <p class="fs-14">г. Армавир</p>
                            </div>
                        </div>
                        <div class="card-body brt-green-light-1 p-0 pt-3">
                            <p class="fs-14 lh-18 ellipsis-8">Выражаю благодарность разработчикам системы хранения работ
                                учебного заведения и проверок на объем заимствований ВКР-ВУЗ.РФ. Мы используем эту
                                платформу с 2016 года и очень довольны достигнутыми результатами. Первоначально перед
                                нами стояла задача хранения выпускных квалификационных работ, потом проверки на объем
                                заимствований. Пересмотрели разные варианты, но некоторые ресурсы были со слабым
                                функционалом, другие очень дороги. А ВКР-ВУЗ.РФ максимально устроила нас оптимальным
                                соотношением цены, качества и функционала. Система производительна, надежна,
                                преподаватели быстро осваивают ее веб-интерфейс. За год сотрудничества сколько-нибудь
                                серьезных претензий к ее работе не возникло, она ни разу не отказывала и не выдавала
                                ошибок. Разработчики очень отзывчивы к любым пожеланиям пользователей. С помощью этой
                                системы мы смогли значительно упростить контроль за ВКР. Система ВКР-ВУЗ.РФ полностью
                                оправдала наши ожидания.</p>
                            <div class="row pt-2">
                                <div class="col-1 pe-4">
                                    <img src="/images/profile.svg" alt="">
                                </div>
                                <div class="col ps-4">
                                    <p class="fw-700 mb-1">Андрусенко Евгений Юрьевич</p>
                                    <p class="fs-14 lh-18 m-0">Старший менеджер по вопросам мониторинга качества и
                                        информационного сопровождения образовательного процесса</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card br-none shadow-1 br-15 p-4 h-100">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-1 col-2">
                                <img src="/images/logo-1.png" alt="">
                            </div>
                            <div class="col ps-3">
                                <p class="fw-700 mb-1">Южно-Российский гуманитарный институт</p>
                                <p class="fs-14">г. Ростов-на-Дону</p>
                            </div>
                        </div>
                        <div class="card-body brt-green-light-1 p-0 pt-3">
                            <p class="fs-14 lh-18 ellipsis-8">Работу нашего института с платформой ВКР-ВУЗ.РФ можно
                                назвать стабильной и благополучной. Благодаря этому сотрудничеству многие вопросы,
                                касающиеся нормативно-правовой регламентации организации образовательного процесса и его
                                соответствия действующим нормам законодательства в сфере образования, решены в полном
                                объеме. Введенное в действие с 1 января 2016 года требование приказа № 636 поставило
                                вопрос о модернизации, технической поддержке ЭБС вузов. Система обязана обеспечить:
                                загрузку и хранение выпускных квалификационных работ; доступ обучающегося к ним через
                                Интернет; проверку текстов на объём заимствований; выполнение законодательства об
                                авторском праве для выпускных квалификационных работ. При этом четкие технические
                                требования к ЭБС отсутствуют, так же как и нет указания на то, что это должна быть
                                непременно собственная ЭБС. Так стоят ли того усилия вуза по созданию подобного
                                программного обеспечения? ВКР-ВУЗ.РФ дает ответы на все вопросы. Благодаря простоте
                                алгоритма работы на платформе и предлагаемым шаблонам документов нам не пришлось долго
                                искать способ оформления отношений с обучающимися на получение прав для размещения работ
                                в ЭБС и их проверке на заимствования. Словом, подключение к платформе ВКР-ВУЗ.РФ
                                позволило снять многие вопросы в обеспечении качества подготовки выпускников.</p>
                            <div class="row pt-2">
                                <div class="col-1 pe-4">
                                    <img src="/images/profile.svg" alt="">
                                </div>
                                <div class="col ps-4">
                                    <p class="fw-700 mb-1">Вартанян Надежда Арутюновна</p>
                                    <p class="fs-14 lh-18 m-0">Проректор по учебной работе</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card br-none shadow-1 br-15 p-4 h-100">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-1 col-2">
                                <img src="/images/logo-1.png" alt="">
                            </div>
                            <div class="col ps-3">
                                <p class="fw-700 mb-1">ЯрГУ им. П.Г. Демидова</p>
                                <p class="fs-14">г. Ярославль</p>
                            </div>
                        </div>
                        <div class="card-body brt-green-light-1 p-0 pt-3">
                            <p class="fs-14 lh-18 ellipsis-8">В целях выполнения приказа Министерства образования и
                                науки РФ № 636 сотрудники научной библиотеки ЯрГУ в 2016 году протестировали шесть
                                платформ для размещения ВКР. В начале было принято решение создавать собственную базу на
                                платформе ЭБС вуза «БУКИ-NEXT». Работа оказалась неоправданно трудоемкой, создание базы
                                ВКР за 2016 год заняло много времени. Поэтому после рассмотрения протестированных
                                платформ решили приобрести ВКР-ВУЗ.РФ. Этот ресурс очень удобен в использовании, с
                                дружественным интерфейсом. Активная работа по размещению ВКР началась в феврале 2017-го,
                                т.к. защиты проходят постоянно в течение года. На первом этапе был разработан внутренний
                                регламент занесения ВКР в базу, обучены ответственные сотрудники от каждой кафедры. В
                                2017 году принято решение, что ВКР заносят сотрудники, а не сами студенты. Одним из
                                определяющих факторов при выборе платформы стал встроенный модуль проверки работ на
                                заимствования. Это важно для нашего университета, так как специальной программы для
                                проверки мы не приобретали. Хорошо и то, что в программе не установлены никакие
                                ограничения процента заимствований, университет сам устанавливает допустимый уровень. Ни
                                у одной кафедры не возникло технических проблем при размещении выпускных
                                квалификационных работ в базе. Если говорить коротко, то ВКР-ВУЗ.РФ можно
                                охарактеризовать тремя словами: удобно, доступно, профессионально!</p>
                            <div class="row pt-2">
                                <div class="col-1 pe-4">
                                    <img src="/images/profile.svg" alt="">
                                </div>
                                <div class="col ps-4">
                                    <p class="fw-700 mb-1">Шаматонова Галина Леонидовна</p>
                                    <p class="fs-14 lh-18 m-0">Директор научной библиотеки</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    <footer>
        <div class="bg-green py-5">
            <div class="container py-4">
                <div class="row g-4">
                    <div class="col-lg-3 align-items-center">
                        <img src="/images/VKR.svg" alt="">
                        <p class="pt-1"><a href="#">Установка кнопки на ваш сайт</a></p>
                        <p class="fs-24 fw-700 mb-2">8 (8452) 24-77-96</p>
                        <p class="m-0 fs-14">Звонок по России бесплатный</p>
                    </div>
                    <div class="col-xxl-7 col-lg-6 col-sm-8 col-12">
                        <p class="lh-18 fs-12">Программа для ЭВМ «ВКР -СМАРТ» — «умная» система проверки на
                            заимствования и хранения ВКР», зарегистрирована Федеральной службой по интеллектуальной
                            собственности 01.09.2021 г. свидетельство о государственной регистрации программы для ЭВМ
                            № 2 021 664 219</p>
                        <p class="lh-18 fs-12 m-0">ООО «Профобразование» включено в Реестр аккредитованных IT компаний,
                            на основании РЕШЕНИЯ о предоставлении государственной аккредитации организации,
                            осуществляющей деятельность в области информационных технологий от 17.03.2022 №
                            АО-20 220 316-3 829 208 820-3, выданного МИНИСТЕРСТВОМ ЦИФРОВОГО РАЗВИТИЯ, СВЯЗИ И МАССОВЫХ
                            КОММУНИКАЦИЙ РОССИЙСКОЙ ФЕДЕРАЦИИ.</p>
                    </div>
                    <div
                        class="col-xxl-2 col-lg-3 col-sm-4 col-12 d-flex flex-column align-items-sm-end justify-content-center">
                        <p class="fw-700">Мы в социальных сетях</p>
                        <div>
                            <img src="/images/vk.svg" alt="Вконтакте">
                            <img src="/images/youtube.svg" alt="YouTube">
                            <img src="/images/tg.svg" alt="Telegram">
                        </div>
                        <div class="pt-3">
                            <img src="/images/16.svg" alt="16+">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

@endsection


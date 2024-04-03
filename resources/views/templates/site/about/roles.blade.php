@extends('layouts.main')

@section('content')
    <main>
        <div class="container py-5">
            <div class="row">
                @include('layouts.include.menu.about')
                <div class="col-lg-9 px-lg-0 px-4">
                    <div class="block-75">
                        <p class="text-black-black mb-5">Для работы в системе ВКР-ВУЗ.РФ <br>предусмотрено четыре типа
                            пользователей:</p>
                        <div class="accordion mb-5" id="accordionFlushExample">
                            <div class="accordion-item bg-green br-20 mb-3 br-none">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                        <img src="/images/admin.svg" alt="" class="pb-2"><span class="ps-4 fs-16">Администратор</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p class="fs-14 lh-17">Администратор системы — лицо, ответственное за размещение
                                            ВКР в целом по учебному заведению.</p>
                                        <p class="fs-14 lh-17 mb-1">Набор прав администратора:
                                        <ul class="text-black fs-14">
                                            <li>настройка структуры организации;</li>
                                            <li>управление полным функционалом системы;</li>
                                            <li>доступ ко всем загружаемым материалам;</li>
                                            <li>доступ к электронному портфолио;</li>
                                            <li>администрирование;</li>
                                            <li>настройка доступа для других пользователей.</li>
                                        </ul>
                                        </p>
                                        <p class="fs-14 lh-17">Администратор системы обладает возможностью получать
                                            полные отчеты по всем подразделениям в разрезе созданной структуры
                                            (институты, факультеты, подразделения, кафедры, отделения) с указанием
                                            количества загруженных работ, ответственных за загрузку, статуса работ
                                            (допущены к защите или нет), итоговых оценок, соотношения количества
                                            выпускаемых и размещенных ВКР в разрезе факультета, кафедры или других
                                            подразделений.</p>
                                        <p class="fs-14 lh-17 mb-1">
                                            Специальные возможности администратора:
                                        <ul class="text-black fs-14">
                                            <li>доступ ко всем архивам по вузу и по всем годам;</li>
                                            <li>доступ к текстам работ;</li>
                                            <li>блокировка сотрудников.</li>
                                        </ul>
                                        </p>
                                        <p class="fs-14 lh-17">Администратор может не создавать профили сотрудников и
                                            осуществлять загрузку самостоятельно из своего личного кабинета.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-green br-20 mb-3 br-none">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <img src="/images/setting.svg" alt="" class="pb-2"><span class="ps-4 fs-16">Сотрудники подразделений</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p class="fs-14 lh-17">Сотрудники — пользователи системы (деканы факультетов
                                            и/или представители кафедр, дургие подразделения учебного заведения),
                                            которых администратор наделяет правами доступа для загрузки работ и
                                            портфолио в рамках закрепленных за ними подразделений. Одна из функций
                                            сотрудников — одобрение или отклонение работ, загруженных обучающимися.</p>
                                        <p class="fs-14 lh-17 mb-1">
                                            Сотрудники в системе:
                                        <ul class="text-black fs-14">
                                            <li>загружают работы по созданным годам выпуска и по определенным
                                                структурным подразделениям организации (в рамках прав, делегированных
                                                администратором);
                                            </li>
                                            <li>проверяют на заимствования по базе ВКР всех партнеров платформы
                                                ВКР-ВУЗ.РФ без доступа к каким-либо текстам и по базе всех изданий ЭБС
                                                IPRbooks;
                                            </li>
                                            <li>одобряют или отклоняют работы, загруженные обучающимися.</li>
                                        </ul>
                                        </p>
                                        <p class="fs-14 lh-17 mb-1">
                                            Ответственные сотрудники учебного заведения видят и модерируют все работы по
                                            закрепленным за ними подразделениям:
                                        <ul class="text-black fs-14">
                                            <li>работы, загруженные сотрудниками;</li>
                                            <li>работы, загруженные обучающимися.</li>
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-green br-20 mb-3 br-none">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                                            aria-controls="flush-collapseThree">
                                        <img src="/images/teacher.svg" alt="" class="pb-2"><span class="ps-3 fs-16">Преподаватель</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="text-black fs-14">
                                            <li>возможность загрузки и проверки собственных работ;</li>
                                            <li>просмотр списков работ и портфолио обучающихся в рамках своего
                                                структурного подразделения;
                                            </li>
                                            <li>самостоятельное ведение портфолио собственных достижений.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-green br-20 mb-3 br-none">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                        <img src="/images/student.png" alt="" class="pb-2"><span class="ps-4 fs-16">Студент</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="text-black fs-14">
                                            <li>загрузка и проверка на объем заимствований своих работ для их
                                                дальнейшего размещения в директории соответствующего подразделения
                                                учебного заведения на платформе ВКР-ВУЗ.РФ;
                                            </li>
                                            <li>отправка текста на одобрение сотруднику, ответственному за размещение
                                                ВКР в системе;
                                            </li>
                                            <li>ведение портфолио собственных достижений с возможностью отображения этих
                                                материалов в общем электронном портфолио учебного заведения.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection



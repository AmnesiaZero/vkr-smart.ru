@extends('layouts.site.main');

@section('content')
    <main>
        <div class="container py-5">
            <div class="row">
                @include('layouts.site.include.menu.about')
                <div class="col-lg-9 px-lg-0 px-4">
                    <div class="block-75">
                        <p class="fs-14 lh-17">Для работы в системе ВКР-ВУЗ.РФ необходимо авторизоваться под учетными
                            данными, полученными от администрации ресурса.</p>
                        <p class="fs-14 lh-17">Указанные учетные данные предназначены для администратора платформы
                            ВКР-ВУЗ.РФ*, лица, ответственного за размещение ВКР и электронных портфолио в целом по
                            учебному заведению.</p>
                        <div class="row py-5 g-4">
                            <div class="col-lg-7">
                                <div class="bg-green br-20 p-4">
                                    <div class="d-flex align-items-end mb-3">
                                        <img src="/images/admin.svg" alt="" class="pb-1">
                                        <p class="m-0 ps-3">Администратор платформы ВКР</p>
                                    </div>
                                    <p class="fs-14 lh-17">ответственный сотрудник (его помощник), располагающий общими
                                        знаниями работы с программами, порталами, сайтами и являющийся должностным
                                        лицом, ответственным за ВКР и электронные портфолио по учебному заведению и за
                                        их размещение на платформе, а также обладающий сведениями об организационной
                                        структуре вуза.</p>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="bg-green br-20 p-4">
                                    <div class="d-flex align-items-end mb-3">
                                        <img src="/images/setting.svg" alt="" class="pb-1">
                                        <p class="m-0 ps-3">Права администратора</p>
                                    </div>
                                    <p class="fs-14 lh-17">организация загрузки материалов на платформу, создание
                                        организационной структуры вуза (настройка года архива, факультеты (отделения),
                                        кафедры, специальности, количество выпускников)</p>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 lh-17">Для организации загрузки ВКР после настройки структуры необходимо создать
                            профили сотрудников учебного заведения и наделить их правами для загрузки.</p>
                        <p class="fs-14 lh-17">Администратор может не создавать профили сотрудников и осуществлять
                            загрузку самостоятельно в зависимости от размера учебного заведения.</p>
                        <p class="fs-14 lh-17">Создание подразделений, настройка количества планируемых выпускников
                            является рекомендуемым сервисом, который позволит грамотно распределять доступ сотрудников,
                            загружающих работы, получать детализированные отчеты, вести статистику.</p>
                        <p class="fs-14 lh-17">Если не создается полная структура, то факультет может быть обозначен как
                            основное подразделение.</p>
                        <div class="col-lg-9 bg-green br-20 p-4 my-5">
                            <p>Если вам потребуется помощь по настройке доступа и создания профилей сотрудников, вы
                                можете обратиться за помощью к нам:</p>
                            <p class="fs-32 text-green fw-700"><a href="mailto:support@iprmedia.ru"
                                                                  class="text-green fs-32 fw-700">support@iprmedia.ru</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
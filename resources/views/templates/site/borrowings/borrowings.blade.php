@extends('layouts.site.main');

@section('content')
    <main>
        <div class="container py-5">
            <div class="row">
                @include('layouts.site.include.menu.borrowings')
                <div class="col-lg-9 px-lg-0 px-4">
                    <div class="block-75">
                        <h6 class="mb-4">Сервис проверок на заимствования — детализированные отчеты на лету!</h6>
                        <ul class="fs-14 lh-17 text-black">
                            <li class="mb-2">Эксклюзивные технологии поиска заимствований.</li>
                            <li class="mb-2">Быстрый поиск и формирование детализированных отчетов.</li>
                            <li class="mb-2">Возможность печати отчета.</li>
                            <li class="mb-2">Автоматически генерируемая и заполненная справка о результатах проверки на
                                наличие заимствований (для обеспечения документооборота в организации).
                            </li>
                            <li class="mb-2">Неограниченное количество проверок.</li>
                            <li class="mb-2">Бесплатные обновления индексной базы.</li>
                            <li class="mb-2">Получение детализированного отчета и справки о результатах проверки на
                                объем заимствований.
                            </li>
                        </ul>
                        <p class="text-black-black pt-3">Проверка работ осуществляется двумя способами:</p>
                        <div class="accordion mb-5" id="accordionFlushExample">
                            <div class="accordion-item bg-green br-20 mb-3 br-none">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                        <img src="/images/setting.svg" alt="" class="pb-2"><span class="ps-3 fs-16">автоматический режим</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p class="fs-14 lh-17"> При загрузке работ достаточно указать этот параметр
                                            проверки — и добавляемые работы будут проверяться сразу после загрузки. Пока
                                            сотрудники загружают работы, система уже подготовит отчеты в автоматическом
                                            режиме.</p>
                                        <p class="fs-14 lh-17">Некоторые работы могут загружаться после их защиты или
                                            оценки, и их проверка не требуется, необходимо обеспечить только размещение.
                                            Специально для сотрудников учебного заведения предусмотрена возможность
                                            изменять настройки для своих работ и устанавливать другие варианты проверки
                                            (в ручном режиме или оставить работу без проверки)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-green br-20 mb-3 br-none">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <img src="/images/admin.svg" alt="" class="pb-2"><span class="ps-3 fs-16">ручной режим</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p class="fs-14 lh-17">Этот способ также может быть установлен непосредственно
                                            при загрузке работ.</p>
                                        <p class="fs-14 lh-17">Кроме того, сотрудник сможет выбрать вариант «Не
                                            проверять работу после загрузки».</p>
                                        <p class="fs-14 lh-17">По итогам проверки по каждой работе автоматически
                                            формируется отчет и обновляется статус проверки работы, при переходе на
                                            отчет пользователям доступны краткий и детальный отчеты с указанием
                                            конкретных фрагментов, заимствованных из других источников.</p>
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

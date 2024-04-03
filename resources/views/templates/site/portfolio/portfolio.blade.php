@extends('layouts.main')

@section('content')
<main>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7">
                <p class="text-black-black">На платформе ВКР-ВУЗ.РФ внедрен сервис «Электронное портфолио достижений»</p>
                <p class="fs-14 lh-17">Этот функционал позволяет обучающемуся не только загружать свои работы на платформу ВКР-ВУЗ.РФ в привязке к подразделениям вуза, которые настроены администратором, проверять тексты на объем заимствований, открывать доступ к ним для ответственных сотрудников вуза, но и вести полноценное портфолио.</p>
                <p class="fs-14 lh-17">Ответственные сотрудники учебного заведения в свою очередь видят и модерируют все тексты по закрепленным за ними подразделениям и, если работа выполнена с учетом всех требований, публикуют ее в общем списке трудов вуза. Таким образом, вовлечение студентов в работу с системой ВКР-ВУЗ.РФ позволяет наладить загрузку текстов на платформу и их дальнейшую обработку максимально эффективно.</p>

                <p class="fs-14 lh-17">Этот уникальный инструмент позволит обучающимся вести архив любых своих работ на протяжении всего срока обучения в образовательном учреждении.</p>
                <div class="accordion my-5" id="accordionFlushExample">
                    <div class="accordion-item bg-green br-20 mb-3 br-none">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <img src="/images/teacher.svg" alt="" class="pb-2"><span class="ps-3 fs-16">Электронное портфолио преподавателя</span>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p class="fs-14 lh-17 mb-1">
                                    Функционал преподавателя:
                                <ul class="text-black fs-14">
                                    <li class="mb-2">возможность загрузки и проверки собственных работ;</li>
                                    <li class="mb-2">самостоятельное ведение портфолио собственных достижений;</li>
                                    <li class="mb-2">просмотр списков работ и портфолио обучающихся в рамках своей кафедры.</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-green br-20 mb-3 br-none">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed bg-green br-20 box-shadow-none br-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="/images/student.png" alt="" class="pb-2"><span class="ps-3 fs-16">Электронное портфолио студента</span>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p class="fs-14 lh-17 mb-1">
                                    Функционал студента:
                                <ul class="text-black fs-14">
                                    <li class="mb-2">загрузка и проверка на объем заимствований своих работ для их дальнейшего размещения в директории соответствующего подразделения учебного заведения на платформе ВКР-ВУЗ.РФ;</li>
                                    <li class="mb-2">отправка текста на одобрение сотруднику, ответственному за размещение ВКР в системе;</li>
                                    <li class="mb-2">ведение портфолио собственных достижений с возможностью отображения этих материалов в общем электронном портфолио учебного заведения.</li>
                                </ul>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="bg-green p-4 br-20 mt-4">
                    <div class="d-flex">
                        <img src="/images/lamp.png" alt="" style="width:30px; height: 30px;">
                        <p class="fs-14 lh-17 text-black-black ps-3">электронное<br> портфолио в ЭИОС!</p>
                    </div>
                    <p class="fs-14 lh-17 m-0">компания «Профобразование» также продумала возможность интеграции электронного портфолио студентов в электронную информационно-образовательную среду  (ЭИОС) вуза.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

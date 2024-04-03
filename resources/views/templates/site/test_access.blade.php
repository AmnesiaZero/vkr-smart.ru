@extends('layouts.main')
@section('content')
<main>
    <div class="container py-5">
        <div class="row pb-3">
            <div class="col-xl-5 col-lg-6">
                <div class="bg-grey br-40 p-sm-5 p-4">
                    <div class="text-before-form">
                        <h2 class="pb-5">Тестовый доступ</h2>
                    </div>
                    <form class="auth" action="" method="POST">
                        <div class="form-group">
                            <label for="organization" class="m-0">Полное наименование организации</label>
                            <p class="fs-12 text-grey mb-1">*по возможности не используйте сокращения</p>
                            <input id="organization" type="text" name="organization" placeholder="по возможности не используйте сокращения" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="city">Город</label>
                            <input id="city" type="text" name="city" placeholder="" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="responsible_person">Ответственное лицо за подключение к системе - должность</label>
                            <p class="fs-12 text-grey m-0">*представитель руководства, библиотеки</p>
                            <p class="fs-12 text-grey mb-1">*ФИО полностью</p>
                            <input id="responsible_person" type="text" name="responsible_person" placeholder="" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="contact_person">Контактное лицо - должность</label>
                            <p class="fs-12 text-grey mb-1">*ФИО полностью</p>
                            <input id="contact_person" type="text" name="contact_person" placeholder="" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <label for="phone">Номер телефона</label>
                                    <input id="phone" type="tel" name="phone" placeholder="+7 000 000 00 00" class="form-control">
                                </div>
                            </div>
                            <div class="col-6 mt-auto">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="text" name="email" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="number_students">Количество обучающихся</label>
                            <p class="fs-12 text-grey mb-1">*обычно совпадает с количеством обучающихся и сотрудников</p>
                            <input id="number_students" type="text" name="number_students" placeholder="" class="form-control">
                        </div>
                        <p class="fs-14 pt-3 mb-2">Желаемый срок предоставления тестового доступа</p>
                        <div class="btn-group w-100 d-sm-inline-flex d-none" role="group">
                            <button type="button" class="btn btn-secondary fs-14">Стандартный<span class="text-grey fs-12"><br>2 недели</span></button>
                            <button type="button" class="btn btn-secondary fs-14">Расширенный<span class="text-grey fs-12"><br>1 месяц</span></button>
                            <button type="button" class="btn btn-secondary fs-14">Длительный<span class="text-grey fs-12"><br>по согласованию</span></button>
                        </div>
                        <div class="btn-group d-sm-none d-block" role="group">
                            <div class="row g-3">
                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary w-100 fs-14">Стандартный<span class="text-grey fs-12"><br>2 недели</span></button>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary w-100 fs-14">Расширенный<span class="text-grey fs-12"><br>1 месяц</span></button>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary w-100 fs-14">Длительный<span class="text-grey fs-12"><br>по согласованию</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-check mt-5 mb-2">
                            <input id="agree" type="checkbox" name="agree" value="1" class="form-check-input">
                            <label for="agree" class="form-check-label">Я согласен с условиями соглашения</label>
                        </div>
                    </form>
                    <button type="button" class="btn br-100 btn-primary w-100">Подать заявку</button>
                </div>
            </div>
            <div class="col-lg-3 mt-lg-0 mt-5">
                <div class="br-grey-1 br-20 p-4">
                    <div class="d-flex">
                        <img src="/images/lamp.png" alt="" style="width:30px; height: 30px;">
                        <p class="ps-3 fs-14 lh-17 text-black-black">все поля формы <br> обязательны для заполнения</p>
                    </div>
                    <p class="fs-14 lh-17 m-0">Мы постарались указать минимальный набор необходимых сведений для вашего удобства</p>
                </div>
                <div class="br-grey-1 br-20 p-4 mt-3">
                    <div class="d-flex">
                        <img src="/images/lamp.png" alt="" style="width:30px; height: 30px;">
                        <p class="ps-3 fs-14 lh-17 text-black-black">заявка будет рассмотрена <br>в течении дня</p>
                    </div>
                    <p class="fs-14 lh-17 m-0">С указанным контактным лицом свяжутся для уточнения деталей предоставления тестового доступа</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

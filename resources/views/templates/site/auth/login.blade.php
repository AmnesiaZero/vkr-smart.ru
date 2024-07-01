@extends('layouts.site.main')

@section('content')
    <main>
        <div class="container py-5 fs-m">
            <div class="row justify-content-center pb-3">
                <div class="col-xl-5 col-lg-6">
                    <div class="bg-grey br-40 p-5">
                        <div class="text-before-form">
                            <h2 class="">Авторизация</h2>
                            <p class="mb-5 text-grey fs-14 lh-17">Для авторизации в системе введите данные, полученные
                                от Вашего персонального менеджера или полученные в виде текстового сообщения на адрес
                                электронной почты</p>
                        </div>
                        <form class="auth" action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Имя пользователя</label>
                                <input id="name" type="text" name="login" placeholder="" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Пароль</label>
                                <input id="password" type="text" name="password" placeholder="" class="form-control">
                            </div>
                            <div class="form-check mt-5 mb-2">
                                <input id="remember_me" type="checkbox" name="remember" value="1"
                                       class="form-check-input">
                                <label for="remember_me" class="form-check-label">Запомнить меня</label>
                            </div>
                            <button type="submit" class="btn br-100 btn-primary w-100">войти</button>
                        </form>
                        <p class="fs-14 text-center pt-3 m-0">Забыли пароль? <a href="/reset-password"
                                                                                class="text-green">Восстановить</a></p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 mt-lg-0 mt-5">
                    <div class="bg-grey br-40 p-5">
                        <div class="text-before-form">
                            <h2 class="">Регистрация <br>по приглашению</h2>
                            <p class="mb-5 text-grey fs-14 lh-17">Чтобы пройти регистрацию, <br> введите выданный вам
                                код приглашения</p>
                        </div>
                        <form class="auth mb-5" method="POST" action="/login/by-code">
                            @csrf
                            <div class="form-group">
                                <label for="code">код приглашения</label>
                                <input id="code" type="text" name="code" placeholder="" class="form-control">
                            </div>
                            <button type="submit" class="btn br-100 btn-primary w-100">продолжить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


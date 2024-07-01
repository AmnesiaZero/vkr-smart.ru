@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row px-5 pt-5 g-3">
            <div class="col-xxl-6 col-lg-10 col-12">
                <p class="fw-600">Настройка интеграции системы со сторонними платформами</p>
                <p class="fs-14 text-grey lh-17 col-9">Для Вашей организации зарезервированы следующие параметры,
                    необходимые для проведения интеграции со сторонними платформами в рамках бесшовных переходов:</p>
                <div class="d-flex flex-inline">
                    <p class="fs-14 text-grey lh-17 pe-3">Идентификатор<br> домена организации:</p>
                    <div class="input-group mb-3" style="width: max-content;">
                        <input type="text" class="form-control form-copy" id="content" value="{{$organization->id}}"
                               size="2"
                               aria-describedby="button-addon2" readonly>
                        <button id="copy" class="btn copy_btn" type="button" id="button-addon2"></button>
                    </div>
                </div>
                <p class="fs-14 text-grey lh-17 mb-2">Ключевая фраза, необходимая <br>для шифрования исходных данных:
                </p>
                <div class="input-group" style="width: max-content;">
                    <input type="text" class="form-control form-copy" id="content_1"
                           value="{{$organization->jwt_key}}" aria-describedby="button-addon3" readonly>
                    <button id="copy_1" class="btn copy_btn" type="button" id="button-addon3"></button>
                </div>

            </div>
        </div>
        <div class="row p-5">
            <div class="col-12">
                <p class="fw-600">Для проведения интеграции с внешним порталом необходимо:</p>
                <ol type="1" class="text-grey fs-14 ps-3">
                    <li>Предоставить порталу указанные выше зарезервированные данные: домен и ключ.</li>
                    <li>Реализовать функционал бесшовного перехода из портала в систему ВКР-ВУЗ.РФ, согласно следующей
                        спецификации:
                    </li>
                </ol>
                <p class="text-grey fs-14 lh-17 mb-2">Полученный секретный код участвует в формировании нового ключа,
                    зависящего от даты его генерации.</p>
                <p class="text-grey fs-14 lh-17 mb-2">На страницу <a href="#" class="text-grey">сервиса автоматического
                        входа</a> обязательно должны быть переданы следующие параметры:</p>
                <ul class="text-grey fs-14">
                    <li>Идентификатор портала (&domain={$domain}).</li>
                    <li>ID пользователя портала (&uid={$uid}).</li>
                    <li>Дата в специальном формате YYYYMMDDHHMMSS (&time={$time}).</li>
                    <li>Уникальный ключ, сфомированный как MD5({$uid}.{$secret_key}.{$time}). $secret_key – ключевая
                        фраза, указанная выше.
                    </li>
                </ul>
                <p class="fw-600 pt-4">Пример ссылки перехода:</p>
                <p class="text-grey fs-14 mb-1">*для проверки ссылки, откройте ее в другом браузере</p>
                <a href="http://www.vkr-vuz.ru/autologin?&domain=595&id=31252&time=20230217181850&sign=a38647e6ab5be848682afc0975e62d70"
                   class="text-grey fs-14 td-none ww-break">http://www.vkr-vuz.ru/autologin?&domain=595&id=31252&time=20230217181850&sign=a38647e6ab5be848682afc0975e62d70</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var addBadge = function () {
            let text = document.getElementById("content").value;
            var elemOutKod = document.querySelector('.out-kod');

            elemOutKod.innerHTML += '<div class="badge text-black-black bg-green-light br-100 fs-12 me-3 mb-3" onclick="this.remove(this)">' + text + '<button class="close-badge btn"></button></div>';
        }

        function checkForEnter(e) {
            if (e.keyCode == 13) {
                console.log(this.value);
                addBadge();
            }
        }

        var addBadge_1 = function () {
            let text = document.getElementById("content_1").value;
            var elemOutKod_1 = document.querySelector('.out-kod_1');

            elemOutKod_1.innerHTML += '<div class="badge text-black-black bg-green-light br-100 fs-12 me-3 mb-3" onclick="this.remove(this)">' + text + '<button class="close-badge btn"></button></div>';
        }

        function checkForEnter_1(e) {
            if (e.keyCode == 13) {
                console.log(this.value);
                addBadge_1();
            }
        }
    </script>
@endsection

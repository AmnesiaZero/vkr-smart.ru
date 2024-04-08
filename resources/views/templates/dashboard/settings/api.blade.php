@extends('layouts.dashboard.main')

@section('content')
<div class="col-xl-9 col-lg-8 col-md-7 col-12">
    <div class="row px-5 pt-5 g-3">
        <div class="col-xxl-6 col-lg-10 col-12">
            <div class="br-green-light-2 br-15 p-3 mb-3">
                <div class="row g-4">
                    <div class="col">
                        <img src="/images/VKR-logo.svg" alt="">
                    </div>
                    <div class="col d-flex flex-column justify-content-between">
                        <p class="fs-16"><img src="/images/href.svg" alt="" class="pe-2"><a href="#" class="text-grey td-none text-grey-hover fw-600">ВКР-ВУЗ API</a></p>
                        <div class="">
                            <p class="fs-16 m-0"><img src="/images/href.svg" alt="" class="pe-2"><a href="#" class="text-grey td-none text-grey-hover fw-600">Документация к сервису</a></p>
                            <p class="text-grey fs-14 m-0">основной перечень запросов ВКР-ВУЗ API</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-5 col-xl-6 col-lg-7 mb-lg-0 mb-md-5 mb-0 p-5 col-12">
            <p class="fw-600">«Подключение и настройка»</p>
            <p class="fs-14 text-grey lh-17">Для подключения к сервису Вам необходимы 3 параметра:<br>2 специальных ключа и идентификатор клиента, которые вы передадите в отдел разработки ПО вашей организации.</p>
            <p class="fs-14 text-grey lh-17">Сформировать ключи и получить ID клиента:</p>
            <div class="mb-3">
                <label for="id" class="form-label">ID клиента</label>
                <input type="text" class="form-control bg-grey-form" id="id" value="тестовое значение" readonly>
            </div>
            <div class="mb-3">
                <label for="X_APIKey" class="form-label">X-APIKey</label>
                <input type="text" class="form-control bg-grey-form" id="X_APIKey" value="тестовое значение" readonly>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">SECRET KEY</label>
                <div class="password">
                    <input type="password" id="password-input" class="form-control bg-grey-form" name="password" value="тестовое значение" readonly>
                    <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                </div>
            </div>
            <button class="btn btn-secondary w-100 mt-3">сформировать запрос<br> на создание ключа защиты API</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        //Скрыть/показать значение в input
        function show_hide_password(target){
            let input = document.getElementById('password-input');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }
    </script>
@endsection

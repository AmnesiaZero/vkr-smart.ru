@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
            <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12 br-green-light-2 br-15 p-3 mb-3">
                    <img src="/images/Lock.svg" alt="">
                    <p class="mt-2">Неизменяемые типы работ:</p>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Выпускная квалификационная работа</div>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Дипломная работа</div>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Курсовая работа</div>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Курсовой проект</div>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Публикация</div>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Доклад</div>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Реферат</div>
                    <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1">Контрольная работа</div>
                </div>
            </div>
            <div class="row px-0 px-sm-4 mx-sm-0 mx-4">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12 br-green-light-2 br-15 p-3 mb-3">
                    <p>Добавление типов работ:</p>
                    <div class="out-kod my-2"></div>
                    <input type="text" value="" id="content" class="form-control vkr-form" placeholder="Наименование" onkeydown="checkForEnter(event)">

                </div>
            </div>
            <div class="row px-0 px-sm-4 mx-sm-0 mx-4">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12 br-green-light-2 br-15 p-3 mb-3">
                    <p>Научные руководители</p>
                    <div class="out-kod_1 my-2"></div>
                    <input type="text" value="" id="content_1" class="form-control vkr-form" placeholder="ФИО" onkeydown="checkForEnter_1(event)">
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script type="text/javascript">
    var addBadge = function() {
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
    var addBadge_1 = function() {
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

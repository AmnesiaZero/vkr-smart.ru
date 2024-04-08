@extends('layouts.dashboard.main')
@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-12 col-12 mb-3">
                <div class="br-green-light-2 br-15 p-3">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600">Код приглашения</p>
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    студентам
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="flexRadioDefault"
                                       id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    преподавателям
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3 col-lg-3">
                                <label for="amount" class="form-label fs-16 fw-600">Количество</label>
                                <span
                                    class="d-flex inline-flex br-green-light-2 br-100 px-3 text-pale-grey fs-14 align-items-center"
                                    style="width: 124px">
					                            <span class="d-flex inline-flex align-items-center">
					                                <button type="button" onclick="dec('amount')"
                                                            class="btn btn-minus btn-minus-white"></button>
					                                <input id="amount" type="text" name="amount" step="1"
                                                           class="form-control text-blue form-control-minute-custom fs-14"
                                                           readonly="" value="0">
					                                <button type="button" onclick="inc('amount')"
                                                            class="btn btn-plus btn-plus-white"></button>
					                            </span>
					                        </span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary br-none text-grey br-100 w-100 mt-4 fs-14 p-btn">сгенерировать
                    </button>
                </div>
            </div>
        </div>
        <div class="row px-0 px-sm-4 mx-sm-0 mx-4 pb-5">
            <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-12 col-12 mb-3">
                <div class="br-green-light-2 br-15 p-3 h-100">
                    <p class="fw-600 m-0">Для студентов</p>
                    <div class="text-center h-100 d-flex flex-column justify-content-center">
                        <p>Пока здесь пусто</p>
                        <p class="m-0">Сгенерируйте код доступа</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-12 col-12 mb-3">
                <div class="br-green-light-2 br-15 p-3">
                    <div class="d-flex inline-flex justify-content-between mb-3">
                        <p class="m-0 fw-600">Для преподавателей</p>
                        <span class="badge bg-green br-100 text-grey fs-14 cursor-p ps-3">выгрузить <img
                                src="/images/File_Download.svg" alt="" class="ps-1 pe-2"></span>
                    </div>
                    <div class="border-bottom mb-2">
                        <div class="input-group mb-0 br-none" style="width: max-content;">
                            <input type="text" class="form-control form-copy br-none text-black ps-0" id="content"
                                   value="180360-68858" aria-describedby="button-addon2" size="10" readonly>
                            <button id="copy" class="btn copy_btn br-none" type="button" id="button-addon2"></button>
                        </div>
                        <p class="text-grey fs-12 mb-0">Осталось: 360 дней</p>
                        <p class="text-grey fs-12 mb-2">Время истечения срока действия 10.02.2024</p>
                    </div>
                    <div class="border-bottom mb-2">
                        <div class="input-group mb-0 br-none" style="width: max-content;">
                            <input type="text" class="form-control form-copy br-none text-black ps-0" id="content"
                                   value="180360-68858" aria-describedby="button-addon2" size="10" readonly>
                            <button id="copy" class="btn copy_btn br-none" type="button" id="button-addon2"></button>
                        </div>
                        <p class="text-grey fs-12 mb-0">Осталось: 360 дней</p>
                        <p class="text-grey fs-12 mb-2">Время истечения срока действия 10.02.2024</p>
                    </div>
                    <div class="border-bottom mb-2">
                        <div class="input-group mb-0 br-none" style="width: max-content;">
                            <input type="text" class="form-control form-copy br-none text-black ps-0" id="content"
                                   value="180360-68858" aria-describedby="button-addon2" size="10" readonly>
                            <button id="copy" class="btn copy_btn br-none" type="button" id="button-addon2"></button>
                        </div>
                        <p class="text-grey fs-12 mb-0">Осталось: 360 дней</p>
                        <p class="text-grey fs-12 mb-2">Время истечения срока действия 10.02.2024</p>
                    </div>
                    <div class="border-bottom mb-2">
                        <div class="input-group mb-0 br-none" style="width: max-content;">
                            <input type="text" class="form-control form-copy br-none text-black ps-0" id="content"
                                   value="180360-68858" aria-describedby="button-addon2" size="10" readonly>
                            <button id="copy" class="btn copy_btn br-none" type="button" id="button-addon2"></button>
                        </div>
                        <p class="text-grey fs-12 mb-0">Осталось: 360 дней</p>
                        <p class="text-grey fs-12 mb-2">Время истечения срока действия 10.02.2024</p>
                    </div>
                    <div class="border-bottom mb-2">
                        <div class="input-group mb-0 br-none" style="width: max-content;">
                            <input type="text" class="form-control form-copy br-none text-black ps-0" id="content"
                                   value="180360-68858" aria-describedby="button-addon2" size="10" readonly>
                            <button id="copy" class="btn copy_btn br-none" type="button" id="button-addon2"></button>
                        </div>
                        <p class="text-grey fs-12 mb-0">Осталось: 360 дней</p>
                        <p class="text-grey fs-12 mb-2">Время истечения срока действия 10.02.2024</p>
                    </div>
                    <div class="border-bottom mb-2">
                        <div class="input-group mb-0 br-none" style="width: max-content;">
                            <input type="text" class="form-control form-copy br-none text-black ps-0" id="content"
                                   value="180360-68858" aria-describedby="button-addon2" size="10" readonly>
                            <button id="copy" class="btn copy_btn br-none" type="button" id="button-addon2"></button>
                        </div>
                        <p class="text-grey fs-12 mb-0">Осталось: 360 дней</p>
                        <p class="text-grey fs-12 mb-2">Время истечения срока действия 10.02.2024</p>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination m-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><img src="/images/Chevron_Left.svg" alt=""></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><img src="/images/Chevron_Right.svg" alt=""></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        //Копировать объект
        document.getElementById("copy").onclick = function () {
            let text = document.getElementById("content").value;
            navigator.clipboard.writeText(text);
        }
    </script>
    <script>
        //input plus/minus
        let number = document.querySelector('[name="number"]');

        function inc(element) {
            let el = document.querySelector(`[name="${element}"]`);
            el.value = parseInt(el.value) + 1;
        }

        function dec(element) {
            let el = document.querySelector(`[name="${element}"]`);
            if (parseInt(el.value) > 0) {
                el.value = parseInt(el.value) - 1;
            }
        }
    </script>
@endsection

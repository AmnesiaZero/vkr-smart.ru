@extends('layouts.dashboard.main')
@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-12 col-12 mb-3">
                <div class="br-green-light-2 br-15 p-3">
                    <form id="create_invite_codes_form" onsubmit="createInviteCodes();return false;">
                        <div class="row">
                            <div class="col">
                                <p class="mb-2 fw-600">Код приглашения</p>
                                <div class="form-check">
                                    <input class="form-check-input green" type="radio" name="type"
                                           id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        студентам
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input green" type="radio" name="type"
                                           id="flexRadioDefault2" value="2" checked>
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
                        <button class="btn btn-secondary br-none text-grey br-100 w-100 mt-4 fs-14 p-btn" type="submit">
                            сгенерировать
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row px-0 px-sm-4 mx-sm-0 mx-4 pb-5">
            <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-12 col-12 mb-3">
                <div class="br-green-light-2 br-15 p-3">
                    <div class="d-flex inline-flex justify-content-between mb-3" id="students_list_head">
                        <p class="m-0 fw-600">Для студентов</p>
                        <a href="#" onclick="downloadStudentsCodes()"
                           class="badge bg-green br-100 text-grey fs-14 cursor-p ps-3">выгрузить <img
                                src="/images/File_Download.svg" alt="" class="ps-1 pe-2"></a>
                    </div>
                    <div id="students_codes_list">

                    </div>
                    <nav aria-label="Page navigation example" class="custom_pagination" id="students_codes_pagination">
                        <ul class="pagination m-0" id="students_pages">
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-12 col-12 mb-3">
                <div class="br-green-light-2 br-15 p-3">
                    <div class="d-flex inline-flex justify-content-between mb-3" id="teachers_list_head">
                        <p class="m-0 fw-600">Для преподавателей</p>
                        <a href="#" onclick="downloadTeachersCodes()"
                           class="badge bg-green br-100 text-grey fs-14 cursor-p ps-3">выгрузить <img
                                src="/images/File_Download.svg" alt="" class="ps-1 pe-2"></a>

                    </div>
                    <div id="teachers_codes_list">

                    </div>
                    <nav aria-label="Page navigation example" class="custom_pagination" id="teachers_codes_pagination">
                        <ul class="pagination m-0" id="teachers_pages">

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/dashboard/settings/invite_codes.js"></script>

    <script id="invite_code_tmpl" type="text/x-jquery-tmpl">
     <div class="border-bottom mb-2">
                        <div class="input-group mb-0 br-none" style="width: max-content;">
                            <input type="text" class="form-control form-copy br-none text-black ps-0" id="content"
                                   value="${id}-${code}" aria-describedby="button-addon2" size="10" readonly>
                            <button id="copy" class="btn copy_btn br-none" type="button" id="button-addon2"></button>
                        </div>
                        <p class="text-grey fs-12 mb-0">Осталось: ${days_until} дней</p>
                        <p class="text-grey fs-12 mb-2">Время истечения срока действия ${expires_at}</p>
                    </div>


    </script>

    <script id="empty_tmpl" type="text/x-jquery-tmpl">
                    <div class="text-center h-100 d-flex flex-column justify-content-center" class="empty_codes" id="${id}">
                        <p>Пока здесь пусто</p>
                        <p class="m-0">Сгенерируйте код доступа</p>
                    </div>

    </script>



    <script id="pagination_tmpl" type="text/x-jquery-tmpl">
                            <li class="page-item">
                                <a class="page-link" href="/dashboard/invite-codes/get?page=${current_page-1}">
                                    <span aria-hidden="true"><img src="/images/Chevron_Left.svg" alt=""></span>
                                </a>
                            </li>
                            @{{each links}}
                               <li class="page-item active"><a class="page-link" href="#" onclick="">${label}</a></li>
                            @{{/each}}
                            <li class="page-item">
                                <a class="page-link" href="/dashboard/invite-codes/get?page=${current_page+1}" >
                                    <span aria-hidden="true"><img src="/images/Chevron_Right.svg" alt=""></span>
                                </a>
                            </li>


    </script>
@endsection

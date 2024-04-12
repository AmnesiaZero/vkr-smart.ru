@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xxl-5 col-xl-6 col-12 mb-4">
                <div class="br-green-light-2 br-15 py-3">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Год выпуска</p>
                              @foreach($years as $year)
                                   @include('layouts.dashboard.include.elements.year')
                              @endforeach
                            <div class="mx-3" id="year_end">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1" onclick="openModal('create_year')">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           @include('layouts.dashboard.include.modal.create.year')
            <div class="col-xxl-5 col-xl-6 col-12 mb-3">
                <div class="br-green-light-2 br-15 py-3">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Подразделения</p>
                            <div class="row py-2 mx-0 border-bottom">
                                <div class="col-8 ps-3">
                                    <p class="m-0 fs-14">Факультет менеджмента</p>
                                </div>
                                <div class="col text-end">
                                    <button id="edit" class="btn copy_edit br-none" type="button"></button>
                                    <button id="delete" class="btn copy_delete br-none" type="button"></button>
                                </div>
                            </div>
                            <div class="row py-2 mx-0 border-bottom bg-green">
                                <div class="col-8 ps-3">
                                    <p class="m-0 fs-14">Факультет финансов и учета</p>
                                </div>
                                <div class="col text-end">
                                    <button id="edit" class="btn copy_edit br-none" type="button"></button>
                                    <button id="delete" class="btn copy_delete br-none" type="button"></button>
                                </div>
                            </div>
                            <div class="row py-2 mx-0 border-bottom">
                                <div class="col-8 ps-3">
                                    <p class="m-0 fs-14">Факультет энергетики</p>
                                </div>
                                <div class="col text-end">
                                    <button id="edit" class="btn copy_edit br-none" type="button"></button>
                                    <button id="delete" class="btn copy_delete br-none" type="button"></button>
                                </div>
                            </div>
                            <div class="mx-3">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1" onclick="openModal('organizations_departments')">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
{{--                @include('layouts.dashboard.include.modal.create',[--}}
{{--  'modalName' => 'organizations_departments',--}}
{{--  'modalDescription' => 'Добавить подразделение',--}}
{{--   'url' => '/dashboard/organizations/departments/create',--}}
{{--   'modalFields' =>[--}}
{{--       'name' => 'Имя'--}}
{{--       ]])--}}
                <div class="br-green-light-2 br-15 py-3 mt-4">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Кафедры</p>
                            <div class="row py-2 mx-0 border-bottom bg-green">
                                <div class="col-8 ps-3">
                                    <p class="m-0 fs-14">Менеджмент</p>
                                </div>
                                <div class="col text-end">
                                    <button id="edit" class="btn copy_edit br-none" type="button"></button>
                                    <button id="delete" class="btn copy_delete br-none" type="button"></button>
                                </div>
                            </div>
                            <div class="row py-2 mx-0 border-bottom">
                                <div class="col-8 ps-3">
                                    <p class="m-0 fs-14">Реклама и связи с общественностью</p>
                                </div>
                                <div class="col text-end">
                                    <button id="edit" class="btn copy_edit br-none" type="button"></button>
                                    <button id="delete" class="btn copy_delete br-none" type="button"></button>
                                </div>
                            </div>
                            <div class="mx-3">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="br-green-light-2 br-15 py-3 mt-4">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Профили обучения</p>
                            <div class="row py-2 mx-0 border-bottom">
                                <div class="col-8 ps-3">
                                    <p class="m-0 fs-14">Менеджмент</p>
                                </div>
                                <div class="col text-end">
                                    <button id="edit" class="btn copy_edit br-none" type="button"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit"
                                            aria-controls="offcanvasEdit"></button>
                                    <button id="delete" class="btn copy_delete br-none" type="button"></button>
                                </div>
                            </div>
                            <div class="mx-3">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script id="year_tmpl" type="text/x-jquery-tmpl">
        <div class="row py-2 mx-0 border-bottom">
         <div class="col-8 ps-3">
             <p class="m-0 fs-14" id="year">${year}</p>
        <div class="" id="edit_block">
            <div class="d-flex inline-flex">
                <p class="fs-12 text-grey m-0">Комментарий:</p>
                <input id="edited1" type="text" name=""
                       class="form-control box-shadow-none fs-12 ms-2 p-0 px-2 br-2 edited w-auto"
                       value="${comment}" disabled>
            </div>
            <div class="d-flex inline-flex mt-2">
                <p class="fs-12 text-grey m-0">Количество обучающихся:</p>
                <input id="edited2" type="text" name=""
                       class="form-control box-shadow-none fs-12 ms-2 p-0 px-2 br-2 edited w-40"
                       value="${students_count}" disabled>
            </div>
            <span class="btn btn-secondary fs-12 py-1 px-2 text-grey br-none br-100 mt-2"
                  id="apply_btn" onclick="yearUpdate(${year})">применить</span>
        </div>
    </div>
    <div class="col text-end">
        <button id="edit_year_issue" class="btn copy_edit br-none" type="button"
                onclick="showEditBlock()"></button>
        <button id="copy" class="btn copy_btn br-none" type="button"></button>
        <button id="delete" class="btn copy_delete br-none" type="button"></button>
    </div>
   </div>
    </script>
    <script src="/js/organizations_settings.js"></script>
@endsection

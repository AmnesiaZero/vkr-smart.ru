@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xl-6 col-lg-8 col-md-10 col-12 br-green-light-2 br-15 p-3 mb-3" id="works_types_list">
                <img src="/images/Lock.svg" alt="">
                <p class="mt-2">Неизменяемые типы работ:</p>
                @if(isset($works_types) and is_iterable($works_types))
                    @foreach($works_types as $works_type)
                        <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1" onclick="deleteWorkType({{$works_type->id}})" id="work_type_{{$works_type->id}}">
                            {{$works_type->name}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xl-6 col-lg-8 col-md-10 col-12 br-green-light-2 br-15 p-3 mb-3"
                 id="scientific_supervisors_list">
                <img src="/images/Lock.svg" alt="">
                <p class="mt-2">Научные руководители:</p>
                @if(isset($scientific_supervisors) and is_iterable($scientific_supervisors))
                    @foreach($scientific_supervisors as $scientific_supervisor)
                        <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1" onclick="deleteScientificSupervisor({{$scientific_supervisor->id}})" id="scientific_supervisor_{{$scientific_supervisor->id}}">{{$scientific_supervisor->name}}</div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xl-6 col-lg-8 col-md-10 col-12 br-green-light-2 br-15 p-3 mb-3">
                <form onsubmit="addWorksType();return false" id="add_works_type_form">
                    <p>Добавление типов работ:</p>
                    <div class="out-kod my-2"></div>
                    <input type="text" value="" name="name" id="content" class="form-control vkr-form"
                           placeholder="Наименование"
                           onkeydown="checkForEnter(event)">
                    <div class="input-group-append">
                        <button class="btn btn-green" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#d9f1f3"
                                 class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M7.854 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.854 2.646a.5.5 0 0 1 0-.708z"></path>
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H1.5A.5.5 0 0 1 1 8z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xl-6 col-lg-8 col-md-10 col-12 br-green-light-2 br-15 p-3 mb-3">
                <form onsubmit="addScientificAdvisor();return false" id="add_scientific_advisor_form">
                    <p>Научные руководители</p>
                    <div class="out-kod_1 my-2"></div>
                    <input type="text" name="name" value="" id="content_1" class="form-control vkr-form"
                           placeholder="ФИО"
                           onkeydown="checkForEnter_1(event)">
                    <div class="input-group-append">
                        <button class="btn btn-green" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#d9f1f3"
                                 class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M7.854 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.854 2.646a.5.5 0 0 1 0-.708z"></path>
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H1.5A.5.5 0 0 1 1 8z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/dashboard/settings/handbook_management.js">

    </script>

    <script id="scientific_supervisor_tmpl" type="text/x-jquery-tmpl">
       <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1" onclick="deleteScientificSupervisor(${id})" id="scientific_supervisor_${id}">${name}</div>
    </script>

    <script id="works_type_tmpl" type="text/x-jquery-tmpl">
       <div class="badge text-black-black bg-green-light br-100 fs-12 me-1 mb-1" onclick="deleteWorkType(${id})" id="work_type_${id}">${name}</div>
    </script>
@endsection

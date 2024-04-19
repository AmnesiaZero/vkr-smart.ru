@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xxl-5 col-xl-6 col-12 mb-4">
                <div class="br-green-light-2 br-15 py-3">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Год выпуска</p>
                            <div id="years_list"></div>

                            <div class="mx-3" id="year_end">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1"
                                        onclick="openModal('create_year')">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.dashboard.include.modal.create.year')
            <div class="col-xxl-5 col-xl-6 col-12 mb-3">
                <div class="br-green-light-2 br-15 py-3" id="faculties_container" style="display: none">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Подразделения</p>
                            <div id="faculties_list">
                            </div>
                            <div class="mx-3" id="faculties_end">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1"
                                        onclick="openModal('create_faculty')">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.dashboard.include.modal.create.faculty')
                <div class="br-green-light-2 br-15 py-3 mt-4" style="display: none" id="faculties_departments_container">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Кафедры</p>
                            <div id="faculty_departments_list">
                            </div>
                            <div class="mx-3">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1"
                                        onclick="openModal('create_faculty_department')">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.dashboard.include.modal.create.faculty_department')
                <div class="br-green-light-2 br-15 py-3 mt-4" style="display: none" id="programs_container">
                    <div class="row">
                        <div class="col">
                            <p class="mb-2 fw-600 px-3">Профили обучения</p>
                            <div id="programs_list"></div>
                            <div class="mx-3">
                                <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1"
                                        onclick="openModal('create_program')">
                                    добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.dashboard.include.modal.create.program')
        </div>
    </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEdit">
            <div class="offcanvas-header border-bottom">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <h5 class="offcanvas-title fw-600 fs-16 text-center pe-5">Настройки профиля обучения</h5>
            </div>
            <div class="offcanvas-body px-0">
                <div>
                    <div class="mb-3 col-8 mx-4">
                        <p class="m-0">Профиль обучения</p>
                        <p class="fs-12 mb-2">программы подготовки</p>
                        <input type="text" class="form-control bg-grey-form" id="profile" value="" readonly>
                    </div>
                </div>
                <div class="mt-5">
                    <ul class="nav nav-tabs d-flex justify-content-between brb-green-light-2 px-4" id="myQuestions" role="tablist">
                        <li class="nav-item nav-item-head" role="presentation">
                            <a class="fs-16 active ps-0 pe-0 link-offcanvas td-none" id="base-tab" data-bs-toggle="tab" href="#base" role="tab" aria-controls="base" aria-selected="true">База направлений</a>
                        </li>
                        <li class="nav-item nav-item-head" role="presentation">
                            <a class="fs-16 ps-0 pe-0 link-offcanvas td-none" id="own-settings-tab" data-bs-toggle="tab" href="#own-settings" role="tab" aria-controls="own-settings" aria-selected="false">Собственные настройки</a>
                        </li>
                    </ul>
                    <div class="tab-content bg-white br-blue-grey-1 bbrr-20 bblr-20 " id="myQuestionsContent">
                        <div class="tab-pane fade active show" id="base" role="tabpanel" aria-labelledby="base-tab">
                            <p class="fs-14 m-0 pt-4 ps-4">уровень образования:</p>
                            <div class="d-flex inline-flex ps-4">
                                <div class="form-check">
                                    <input class="form-check-input green" type="radio" name="level_education" id="level_education_1">
                                    <label class="form-check-label" for="level_education_1">
                                        СПО
                                    </label>
                                </div>
                                <div class="form-check ms-5">
                                    <input class="form-check-input green" type="radio" name="level_education" id="level_education_2">
                                    <label class="form-check-label" for="level_education_2">
                                        ВО
                                    </label>
                                </div>
                            </div>
                            <p class="fs-14 m-0 pt-4 ps-4">уровень подготовки:</p>
                            <div class="row ps-4">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input green" type="radio" name="level" id="level_1">
                                        <label class="form-check-label" for="level_1">
                                            Бакалавриат
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input green" type="radio" name="level" id="level_2">
                                        <label class="form-check-label" for="level_2">
                                            Магистратура
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input green" type="radio" name="level" id="level_3">
                                        <label class="form-check-label" for="level_3">
                                            Специалитет
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input green" type="radio" name="level" id="level_4">
                                        <label class="form-check-label" for="level_4">
                                            Аспирантура
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input green" type="radio" name="level" id="level_5">
                                        <label class="form-check-label" for="level_5">
                                            Адъюнктура
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input green" type="radio" name="level" id="level_6">
                                        <label class="form-check-label" for="level_6">
                                            Ординатура
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input green" type="radio" name="level" id="level_7">
                                        <label class="form-check-label" for="level_7">
                                            Ассистентура
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <p class="fs-14 m-0 pt-4 ps-4">направление:</p>
                            <div class="px-4 col-10">
                                <select class="js-example-basic-single w-100" name="state" id="specialties_list">

                                </select>
                            </div>
                            <p class="brb-green-light-2 pb-2 m-0 pt-5 px-4">Направления подготовки (специальности) <br>в данной программе подготовки:</p>
                            <table class="table  fs-14 lh-17">
                                <tbody>
                                <tr>
                                    <th scope="row" class="ps-4">54.04.01</th>
                                    <td>Дизайн</td>
                                    <td class="pe-4"><button id="delete" class="btn copy_delete br-none" type="button"></button></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-4">54.04.02</th>
                                    <td>Дизайн одежды</td>
                                    <td class="pe-4"><button id="delete" class="btn copy_delete br-none" type="button"></button></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-4">02.03.03</th>
                                    <td>Математическое обеспечение и администрирование информационных систем</td>
                                    <td class="pe-4"><button id="delete" class="btn copy_delete br-none" type="button"></button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="own-settings" role="tabpanel" aria-labelledby="own-settings-tab">
                            <p class="text-grey fs-14 pt-4 mx-4 lh-17">вы можете самостоятельно добавить направление подготовки, если в предлагаемой базе направлений вы не видите необходимого</p>
                            <div class="mb-4 mx-4 col-8">
                                <label for="code_course" class="form-label m-0">код направления:</label>
                                <input type="text" class="form-control bg-grey-form" id="code_course" value="">
                            </div>
                            <div class="mb-3 mx-4 col-8">
                                <label for="course" class="form-label m-0">направление:</label>
                                <input type="text" class="form-control bg-grey-form" id="course" value="">
                            </div>
                            <div class="mx-4 col-8">
                                <button class="btn btn-secondary fs-14 br-100 w-100 text-grey br-none py-1 mt-3">добавить</button>
                            </div>
                            <p class="brb-green-light-2 pb-2 m-0 pt-5 px-4">Направления подготовки (специальности) <br>в данной программе подготовки:</p>
                            <table class="table  fs-14 lh-17">
                                <tbody>
                                <tr>
                                    <th scope="row" class="ps-4">54.04.01</th>
                                    <td>Дизайн</td>
                                    <td class="pe-4"><button id="delete" class="btn copy_delete br-none" type="button"></button></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-4">54.04.02</th>
                                    <td>Дизайн одежды</td>
                                    <td class="pe-4"><button id="delete" class="btn copy_delete br-none" type="button"></button></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="ps-4">02.03.03</th>
                                    <td>Математическое обеспечение и администрирование информационных систем</td>
                                    <td class="pe-4"><button id="delete" class="btn copy_delete br-none" type="button"></button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @endsection
@section('scripts')
    <script id="year_tmpl" type="text/x-jquery-tmpl">
        <div class="row py-2 mx-0 border-bottom" id="year_row_${id}">
            <div class="col-8 ps-3">
                <p class="m-0 fs-14 header" id="year_${id}" onclick="faculties(${id})">${year}</p>
                <div class="edit_block" id="edit_block_year_${id}">
                    <form onsubmit="updateYear(${id});return false;" id="year_update_${id}">
                        <div class="row g-2 mt-1">
                            <div class="col-lg-4">
                                <p class="fs-12 text-grey m-0">Год:</p>
                                <input type="text" name="year"
                                    class="form-control box-shadow-none fs-12 p-0 px-2 py-1 br-2 edited" value="${year}">
                            </div>

                            <div class="col-lg-8">
                                <p class="fs-12 text-grey m-0">Количество обучающихся:</p>
                                <input id="edited2" type="text" name="students_count"
                                    class="form-control box-shadow-none fs-12 p-0 px-2 py-1 br-2 edited"
                                    value="${students_count}">
                            </div>

                            <div class="col-12">
                                <p class="fs-12 text-grey m-0">Комментарий:</p>
                                <input id="edited1" type="text" name="comment"
                                    class="form-control box-shadow-none fs-12 p-0 px-2 py-1 br-2 edited w-100"
                                    value="${comment}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary fs-14 py-1 px-3 text-grey br-none br-100 mt-2"
                                    id="apply_btn">применить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col text-end">
                <button id="edit_year_issue" class="btn copy_edit br-none" type="button"
                    onclick="showYearEditBlock(${id})"></button>
                <button id="copy" class="btn copy_btn br-none" type="button"></button>
                <button id="delete" class="btn copy_delete br-none" type="button" onclick="deleteYear(${id})"></button>
            </div>
        </div>

    </script>


    <script id="faculty_tmpl" type="text/x-jquery-tmpl">
        <div class="row py-2 mx-0 border-bottom" id="faculty_row_${id}">
            <div class="col-8 ps-3">
                <p class="m-0 fs-14 header" onclick="facultyDepartments(${id})" id="faculty_${id}">${name}</p>
                <div class="edit_block" id="edit_block_faculty_${id}">
                    <form onsubmit="updateFaculty(${id});return false;" id="faculty_update_${id}">
                        <div class="row g-2 mt-1">
                            <div class="col-12">
                                <p class="fs-12 text-grey m-0">Название:</p>
                                <input id="edited1" type="text" name="name"
                                    class="form-control box-shadow-none fs-12 p-0 px-2 py-1 br-2 edited w-auto"
                                    value="${name}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary fs-14 py-1 px-3 text-grey br-none br-100 mt-2"
                                    id="apply_btn">применить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col text-end">
                <button id="edit" class="btn copy_edit br-none" type="button" onclick="showFacultyEditBlock(${id})"></button>
                <button id="delete" class="btn copy_delete br-none" type="button" onclick="deleteFaculty(${id})"></button>
            </div>
        </div>
    </script>

    <script id="faculty_department_tmpl" type="text/x-jquery-tmpl">
        <div class="row py-2 mx-0 border-bottom" id="faculty_department_row_${id}">
            <div class="col-8 ps-3">
                <p class="m-0 fs-14 header" onclick="programs(${id})" id="faculty_department_${id}">${name}</p>
                <div class="edit_block" id="edit_block_faculty_department_${id}">
                    <form onsubmit="updateFacultyDepartment(${id});return false;" id="faculty_department_update_${id}">
                        <div class="row g-2 mt-1">
                            <div class="col-12">
                                <p class="fs-12 text-grey m-0">Название:</p>
                                <input id="edited1" type="text" name="name"
                                    class="form-control box-shadow-none fs-12 p-0 px-2 py-1 br-2 edited w-auto"
                                    value="${name}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary fs-14 py-1 px-3 text-grey br-none br-100 mt-2"
                                    id="apply_btn">применить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col text-end">
                <button id="edit" class="btn copy_edit br-none" type="button" onclick="showFacultyDepartmentEditBlock(${id})"></button>
                <button id="delete" class="btn copy_delete br-none" type="button" onclick="deleteFacultyDepartment(${id})"></button>
            </div>
        </div>
    </script>

    <script id="program_tmpl" type="text/x-jquery-tmpl">

        <div class="row py-2 mx-0 border-bottom" id="program_row_${id}">
        <div class="col-8 ps-3">
            <p class="m-0 fs-14" id="program_${id}">${name}</p>
        </div>
        <div class="col text-end">
            <button id="edit" class="btn copy_edit br-none" type="button" onclick="loadProgramInfo(${id})"></button>
            <button id="delete" class="btn copy_delete br-none" type="button" onclick="deleteProgram(${id})"></button>
        </div>
    </div>
    </script>

        <script id="specialty_tmpl" type="text/x-jquery-tmpl">
            <option value="{id}">=${code} | ${name} </option>
        </script>


    <script src="/js/organizations_settings.js"></script>
@endsection

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
            <ul class="nav nav-tabs d-flex justify-content-between brb-green-light-2 px-4" id="myQuestions"
                role="tablist">
                <li class="nav-item nav-item-head" role="presentation">
                    <a class="fs-16 active ps-0 pe-0 link-offcanvas td-none" id="base-tab" data-bs-toggle="tab"
                       href="#base" role="tab" aria-controls="base" aria-selected="true">База направлений</a>
                </li>
                <li class="nav-item nav-item-head" role="presentation">
                    <a class="fs-16 ps-0 pe-0 link-offcanvas td-none" id="own-settings-tab" data-bs-toggle="tab"
                       href="#own-settings" role="tab" aria-controls="own-settings" aria-selected="false">Собственные
                        настройки</a>
                </li>
            </ul>
            <div class="tab-content bg-white br-blue-grey-1 bbrr-20 bblr-20 " id="myQuestionsContent">
                <div class="tab-pane fade active show" id="base" role="tabpanel" aria-labelledby="base-tab">
                    <p class="fs-14 m-0 pt-4 ps-4">уровень образования:</p>
                    <div class="d-flex inline-flex ps-4">
                        <div class="form-check">
                            <input class="form-check-input green" type="radio" name="level_education"
                                   id="level_education1" checked>
                            <label class="form-check-label" for="level_education1">
                                СПО
                            </label>
                        </div>
                        <div class="form-check ms-5">
                            <input class="form-check-input green" type="radio" name="level_education"
                                   id="level_education2">
                            <label class="form-check-label" for="level_education2">
                                ВО
                            </label>
                        </div>
                    </div>
                    <p class="fs-14 m-0 pt-4 ps-4">уровень подготовки:</p>
                    <div class="row ps-4">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="level_training"
                                       id="level_training1" checked>
                                <label class="form-check-label" for="level_training1">
                                    Бакалавриат
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="level_training"
                                       id="level_training2">
                                <label class="form-check-label" for="level_training2">
                                    Магистратура
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="level_training"
                                       id="level_training3">
                                <label class="form-check-label" for="level_training3">
                                    Специалитет
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="level_training"
                                       id="level_training4">
                                <label class="form-check-label" for="level_training4">
                                    Аспирантура
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="level_training"
                                       id="level_training5">
                                <label class="form-check-label" for="level_training5">
                                    Адъюнктура
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="level_training"
                                       id="level_training6">
                                <label class="form-check-label" for="level_training6">
                                    Ординатура
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input green" type="radio" name="level_training"
                                       id="level_training7">
                                <label class="form-check-label" for="level_training7">
                                    Ассистентура
                                </label>
                            </div>
                        </div>
                    </div>
                    <p class="fs-14 m-0 pt-4 ps-4">направление:</p>
                    <div class="px-4 col-10">
                        <select class="js-example-basic-single w-100" name="state" id="specialties_container">

                        </select>
                    </div>
                    <p class="brb-green-light-2 pb-2 m-0 pt-5 px-4">Направления подготовки (специальности) <br>в данной
                        программе подготовки:</p>
                    <table class="table  fs-14 lh-17">
                        <tbody>
                        <tr>
                            <th scope="row" class="ps-4">54.04.01</th>
                            <td>Дизайн</td>
                            <td class="pe-4">
                                <button id="delete" class="btn copy_delete br-none" type="button"></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="ps-4">54.04.02</th>
                            <td>Дизайн одежды</td>
                            <td class="pe-4">
                                <button id="delete" class="btn copy_delete br-none" type="button"></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="ps-4">02.03.03</th>
                            <td>Математическое обеспечение и администрирование информационных систем</td>
                            <td class="pe-4">
                                <button id="delete" class="btn copy_delete br-none" type="button"></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="own-settings" role="tabpanel" aria-labelledby="own-settings-tab">
                    <p class="text-grey fs-14 pt-4 mx-4 lh-17">вы можете самостоятельно добавить направление подготовки,
                        если в предлагаемой базе направлений вы не видите необходимого</p>
                    <div class="mb-4 mx-4 col-8">
                        <label for="code_course" class="form-label m-0">код направления:</label>
                        <input type="text" class="form-control bg-grey-form" id="code_course" value="">
                    </div>
                    <div class="mb-3 mx-4 col-8">
                        <label for="course" class="form-label m-0">направление:</label>
                        <input type="text" class="form-control bg-grey-form" id="course" value="">
                    </div>
                    <div class="mx-4 col-8">
                        <button class="btn btn-secondary fs-14 br-100 w-100 text-grey br-none py-1 mt-3">добавить
                        </button>
                    </div>
                    <p class="brb-green-light-2 pb-2 m-0 pt-5 px-4">Направления подготовки (специальности) <br>в данной
                        программе подготовки:</p>
                    <table class="table  fs-14 lh-17">
                        <tbody>
                        <tr>
                            <th scope="row" class="ps-4">54.04.01</th>
                            <td>Дизайн</td>
                            <td class="pe-4">
                                <button id="delete" class="btn copy_delete br-none" type="button"></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="ps-4">54.04.02</th>
                            <td>Дизайн одежды</td>
                            <td class="pe-4">
                                <button id="delete" class="btn copy_delete br-none" type="button"></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="ps-4">02.03.03</th>
                            <td>Математическое обеспечение и администрирование информационных систем</td>
                            <td class="pe-4">
                                <button id="delete" class="btn copy_delete br-none" type="button"></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

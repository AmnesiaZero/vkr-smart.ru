@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-5 px-0 px-sm-4 mx-sm-0 mx-4">
            <div class="col-xxl-9 col-xl-8 col-12 mb-4 order-xl-1 order-2">
                <form onsubmit="searchUsers();return false" id="search_users" class="">
                    <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                        <input type="text" name="name" value="" class="form-control search br-none"
                               placeholder="Поиск по имени">
                        <button class="btn pe-sm-5 pe-3 py-1" type="submit" id="search">
                            <img src="/images/Search.svg" alt="search">
                        </button>
                    </div>
                </form>
                <div class="br-green-light-2 br-15 p-4 mt-4" id='you'>
                </div>


                <div class="br-green-light-2 br-15 p-4 mt-4">
                    <p class="fw-600">Пользователи</p>
                    <div id="users_list">

                    </div>


                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-12 mb-3 order-xl-2 order-1">
                <div class="br-green-light-2 br-15 p-4 text-center bg-green cursor-p"
                     onclick="openModal('create_admin')">
                    <img src="/images/Plus.svg">
                    <p class="text-grey m-0 pt-3">Добавить администратора</p>
                </div>
                <div class="br-green-light-2 br-15 p-4 text-center bg-green cursor-p mt-3"
                     onclick="years('years_list');openModal('create_employee')">
                    <img src="/images/Plus.svg">
                    <p class="text-grey m-0 pt-3">Добавить сотрудника</p>
                </div>
                <div class="br-green-light-2 br-15 p-4 text-center bg-green cursor-p mt-3"
                     onclick="inspectorsAccessModal()">
                    <img src="/images/Plus.svg">
                    <p class="text-grey m-0 pt-3">Доступ<br> для проверяющих</p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.dashboard.include.modal.create.employee')
    @include('layouts.dashboard.include.modal.create.admin')
    @include('layouts.dashboard.include.modal.configure.inspectors_access')
    @include('layouts.dashboard.include.modal.configure.users_departments')
    <div class="create-modal" id="update_user" style="display: none">

    </div>
    @include('layouts.dashboard.include.modal.add.departments')

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEdit">
        <div class="offcanvas-header border-bottom">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <h5 class="offcanvas-title fw-600 fs-16 text-center pe-5">Редактирование пользователя</h5>
        </div>
        <div class="offcanvas-body" id="edit_canvas_body">

        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCreate">
        <div class="offcanvas-header border-bottom">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <h5 class="offcanvas-title fw-600 fs-16 text-center pe-5">Создание пользователя</h5>
        </div>
        <div class="offcanvas-body" id="create_canvas_body">

        </div>
    </div>
@endsection

@section('scripts')

    <script src="/js/user.js"></script>



    <script id="department_tmpl" type="text/x-jquery-tmpl">
        <div class="bg-green col-lg-8 mb-3">
                                            <p class="text-grey m-0 fs-14">Кафедра: «${name}»</p>
                                            <p class="text-grey m-0 fs-14">Подразделение: «${faculty.name}»</p>
                                            <p class="text-grey m-0 fs-14">Год выпуска: «${year.year}»</p>
                                    </div>



    </script>

    <script id="user_tmpl" type="text/x-jquery-tmpl">
        <div class="border-bottom pt-4" id="user_${id}">
                              <div class="d-flex mb-3">
                                  <button class="btn copy_edit br-none" type="button" onclick="openUpdateUserCanvas(${id})"></button>
                                  <button id="delete" class="btn copy_delete br-none" type="button" onclick="deleteUser(${id})"></button>
                                  <a href="#" class="text-grey link-active-hover ps-2 fs-14" onclick="userDepartmentsModal(${id})">Настроить доступ</a>
                              </div>
                              <div class="row pb-4">
                                  <div class="col-6">
                                      <p class="mb-2">${name}</p>
                                      <p class="text-grey fs-14" id="role_${id}">
                                        ${roles[0]['name']}
                                      </p>

                                       @{{each departments}}
                                          <div class="bg-green col-lg-8 mb-3">
                                            <p class="text-grey m-0 fs-14">Кафедра: «${name}»</p>
                                            <p class="text-grey m-0 fs-14">Подразделение: «${faculty.name}»</p>
                                            <p class="text-grey m-0 fs-14">Год выпуска: «${year.year}»</p>
                                          </div>
                                       @{{/each}}

                                      <div class="me-3">
                                          <button class="btn btn-secondary br-none w-100 br-100 mt-4 text-grey fs-14 py-1" onclick="years('add_department_years_list');openAddDepartmentModal(${id})">
                                              добавить<img src="/images/Plus.svg" alt="" class="ps-3"></button>
                                      </div>
                                  </div>
                                  <div class="col brl-grey-2"></div>
                                  <div class="col-5">
                                      <div class="d-flex flex-inline">
                                          @{{if is_active}}
                                          <img src="/images/green_active.svg" alt="" class="pe-2" id="active_user_img">
                                           <p class="text-grey fs-14 m-0" id="active_user">Активен</p>
                                           @{{else}}
                                            <img src="/images/red.svg" alt="" class="pe-2" id="active_user_img2">
                                           <p class="text-grey fs-14 m-0" id="active_user2">Заблокирован</p>
                                          @{{/if}}
                                      </div>
                                      @{{if is_active}}
                                       <div id="lock1" class="mt-2"><img src="/images/Lock_1.svg" alt="" id="/imageslock">
                                       <a class="text-grey link-active-hover fs-14 ps-2" id="lock_text" onclick="blockUser(${id})">заблокировать</a>
                                       @{{else}}
                                      <div id="lock2" class="mt-2"><img src="/images/Lock_1.svg" alt="" id="/imageslock2">
                                      <a class="text-grey link-active-hover fs-14 ps-2" id="lock_text2" onclick="unblockUser(${id})">разблокировать</a>
                                       @{{/if}}
                                      </div>
                                      <p class="text-grey fs-14 pt-4">${date_of_birth}</p>
                                      <p class="text-grey fs-14">${phone}</p>
                                      <p class="text-grey fs-14 mb-0">${email}</p>
                                      <a href="#" class="text-grey link-active-hover fs-14" onclick="resetUserPassword('${email}')">отправить пароль на email</a>
                                      <div class="pas cursor-p mt-2">
                                          <span class="text-grey fs-14"><img src="/images/Show.svg" alt=""
                                                                             class="pe-2 img_pas">Пароль</span>
                                          <div class="input-group mb-3 mt-2 copy_box" style="width: max-content;">
                                              <input type="text" class="form-control form-copy"
                                                     value="${password}" size="8" aria-describedby="button-addon2" readonly>
                                              <button id="copy" class="btn copy_btn" type="button"
                                                      id="button-addon2"></button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>



    </script>
    <script id="year_tmpl" type="text/x-jquery-tmpl">
        <option value="${id}" onclick="faculties(${id})">${year}</option>
    </script>

    <script id="faculty_tmpl" type="text/x-jquery-tmpl">
        <option value="${id}">${name}</option>
    </script>

    <script id="department_list_tmpl" type="text/x-jquery-tmpl">
        <option value="${id}">${name}</option>
    </script>


    <script id="you_tmpl" type="text/x-jquery-tmpl">
            <div class="d-flex flex-inline justify-content-between">
                <p class="m-0 text-grey-light fw-600">Вы</p>
                <img src="/images/pin.svg" alt="">
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="d-flex flex-inline">
                        <p class="mb-1">${organization.name}</p>
                        <button class="btn copy_edit br-none ms-lg-5 ms-1" type="button" onclick="editUserModal(${id})"></button>
                    </div>
                    <p class="text-grey fs-14">${roles[0].name}</p>
                </div>
                <div class="col brl-grey-2"></div>
                <div class="col-5">
                    @{{if is_active}}
                    <p class="text-grey fs-14"><span><img src="/images/green_active.svg" alt=""
                                                          class="pe-2"></span>Активен</p>
                    @{{else}}
                     <img src="/images/red.svg" alt="" class="pe-2" id="active_user_img2">
                      <p class="text-grey fs-14 m-0" id="active_user2">Заблокирован</p>
                     @{{/if}}
                    <p class="text-grey fs-14 mb-0">${email}</p>
                    <a href="#" class="text-grey link-active-hover fs-14"  onclick="resetUserPassword('${email}')">отправить пароль на email</a>
                </div>
            </div>

    </script>


    <script id="update_user_tmpl" type="text/x-jquery-tmpl">
    <div class="create-modal" id="update_user" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <h4 class="modal-title">Изменить пользователя</h4>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="update_user_form" class="d-flex flex-column gap-2"
                      onsubmit="updateUser(${id});return false;">
                    <div class="form-group">
                        <label class="col-sm-4">ФИО</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="${name}" value=${password}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" value="${email}" value=${password}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Логин</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="login" value="${login}" value=${password}>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4">Номер телефона</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" value="${phone}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Дата рождения</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="date_of_birth" value="${date_of_birth}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Пол</label>
                        <div class="col-sm-8">
                            <select name="gender" class="form-control">
                                <option value="0" @{{if gender==0}} checked @{{/if}}>Муж.</option>
                                <option value="1" @{{if gender==1}} checked @{{/if}}>Жен.</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Статус</label>
                        <div class="col-sm-8">
                            <select name="is_active" class="form-control">
                                <option value="1" @{{if is_active==1}} checked @{{/if}}>Активен</option>
                                <option value="0" @{{if is_active==0}} checked @{{/if}}>Заблокирован</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer br-none">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                onclick="closeModal('update_user')">Закрыть
                        </button>
                        <button type="submit" class="btn btn-success" onclick="closeModal('update_user')">Изменить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    </script>
    <script id="inspectors_access_year_tmpl" type="text/x-jquery-tmpl">
      <li>
         <a href="#" onclick="accessSpecialties(${id});">${year}</a>
      </li>


    </script>

    <script id="user_access_year_tmpl" type="text/x-jquery-tmpl">
      <li>
         <a href="#" onclick="accessDepartments(${id});">${year}</a>
      </li>


    </script>


    <script type="text/x-jquery-tmpl" id="off_canvas_user_update">
        <div class="px-4">
        <form onsubmit="updateUser(${id});return false" id="update_user_form">
            <div class="mb-3 pt-4">
                <label for="fio">ФИО</label>
                <input type="text" name="name" class="form-control bg-grey-form fs-14 text-grey fw-500" id="fio"
                       value="${name}">
            </div>
            <div class="mb-3">
                <label for="email">Email-адрес</label>
                <input type="text" name="email" class="form-control bg-grey-form fs-14 text-grey fw-500" id="email"
                       value="${email}">
            </div>
            <div class="mb-3">
                <label for="email">Дата рождения </label>
                <input type="date" name="date_of_birth" class="form-control bg-grey-form fs-14 text-grey fw-500"
                       value="${date_of_birth}">
            </div>
            <div class="mb-3">
                <label for="email">Пол</label>
                <select name="gender" class="form-control">
                                <option value="1">Муж.</option>
                                <option value="2">Жен.</option>
                 </select>
            </div>
            <div class="mb-3">
                <label for="email">Номер телефона</label>
                <input type="text" name="phone" class="form-control bg-grey-form fs-14 text-grey fw-500"
                       value="${phone}">
            </div>
            <div class="mb-3">
                <label for="email">Логин</label>
                <input type="text" name="login" class="form-control bg-grey-form fs-14 text-grey fw-500"
                       value="${login}">
            </div>

            <div class="mb-3">
                <label for="date_registration">Дата регистрации</label>
                <input type="text" class="form-control bg-grey-form fs-14 text-grey fw-500" id="date_registration"
                       value="06.11.2019" readonly>
            </div>
            <button type="submit" class="btn btn-secondary w-100 text-grey fs-14 br-100 br-none mt-4 mb-5">Применить</button>
            </form>
        </div>

    </script>

    <script src="/js/dashboard/settings/access.js"></script>
@endsection

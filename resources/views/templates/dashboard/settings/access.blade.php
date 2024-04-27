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
                <div class="br-green-light-2 br-15 p-4 mt-4">
                    <div class="d-flex flex-inline justify-content-between">
                        <p class="m-0 text-grey-light fw-600">Вы</p>
                        <img src="/images/pin.svg" alt="">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="d-flex flex-inline">
                                <p class="mb-1">Демонстрационная организация</p>
                                <button class="btn copy_edit br-none ms-lg-5 ms-1" type="button"></button>
                            </div>
                            <p class="text-grey fs-14">Администратор организации</p>
                        </div>
                        <div class="col brl-grey-2"></div>
                        <div class="col-5">
                            <p class="text-grey fs-14"><span><img src="/images/green_active.svg" alt=""
                                                                  class="pe-2"></span>Активен</p>
                            <p class="text-grey fs-14 mb-0">koshelev76@mail.ru</p>
                            <a href="#" class="text-grey link-active-hover fs-14">отправить пароль на email</a>
                        </div>
                    </div>
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
                <div class="br-green-light-2 br-15 p-4 text-center bg-green cursor-p mt-3">
                    <img src="/images/Plus.svg">
                    <p class="text-grey m-0 pt-3">Доступ<br> для проверяющих</p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.dashboard.include.modal.create.employee')
    @include('layouts.dashboard.include.modal.create.admin')
    <div class="create-modal" id="update_user" style="display: none">

    </div>
    @include('layouts.dashboard.include.modal.add.departments')
@endsection

@section('scripts')
    <script id="you_tmpl" type="text/x-jquery-tmpl">

        <div class="row mt-3">
                       <div class="col-6">
                           <div class="d-flex flex-inline">
                               <p class="mb-1">Демонстрационная организация</p>
                               <button class="btn copy_edit br-none ms-lg-5 ms-1" type="button"></button>
                           </div>
                           <p class="text-grey fs-14">Администратор организации</p>
                       </div>
                       <div class="col brl-grey-2"></div>
                       <div class="col-5">
                           <p class="text-grey fs-14"><span><img src="/images/green_active.svg" alt=""
                                                                 class="pe-2"></span>Активен</p>
                           <p class="text-grey fs-14 mb-0">${email}</p>
                           <a href="#" class="text-grey link-active-hover fs-14">отправить пароль на email</a>
                       </div>
                   </div>


    </script>

    <script id="department_tmpl" type="text/x-jquery-tmpl">
        <div class="bg-green col-lg-8 mb-3">
                                            <p class="text-grey m-0 fs-14">Кафедра: «${name}»</p>
                                            <p class="text-grey m-0 fs-14">Подразделение: «<span id="user_faculty_${id}"> </span>»</p>
                                            <p class="text-grey m-0 fs-14">Год выпуска: «<span id="user_year_${id}"> </span>»</p>
                                    </div>

    </script>

    <script id="user_tmpl" type="text/x-jquery-tmpl">
        <div class="border-bottom pt-4" id="user_${id}">
                              <div class="d-flex mb-3">
                                  <button class="btn copy_edit br-none" type="button" onclick="editUserModal(${id})"></button>
                                  <button id="delete" class="btn copy_delete br-none" type="button" onclick="deleteUser(${id})"></button>
                                  <a href="#" class="text-grey link-active-hover ps-2 fs-14">Настроить доступ</a>
                              </div>
                              <div class="row pb-4">
                                  <div class="col-6">
                                      <p class="mb-2">${name}</p>
                                      <p class="text-grey fs-14" id="role_${id}"></p>
                                      <div id="departments_list_${id}"></div>
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
                                       <a href="#" class="text-grey link-active-hover fs-14 ps-2" id="lock_text" onclick="blockUser(${id})">заблокировать</a>
                                       @{{else}}
                                      <div id="lock2" class="mt-2"><img src="/images/Lock_1.svg" alt="" id="/imageslock2">
                                      <a href="#" class="text-grey link-active-hover fs-14 ps-2" id="lock_text2" onclick="unblockUser(${id})">разблокировать</a>
                                       @{{/if}}
                                      </div>
                                      <p class="text-grey fs-14 pt-4">${date_of_birth}</p>
                                      <p class="text-grey fs-14">${phone}</p>
                                      <p class="text-grey fs-14 mb-0">${email}</p>
                                      <a href="#" class="text-grey link-active-hover fs-14">отправить пароль на email</a>
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

    <script src="/js/dashboard/settings/access.js"></script>
@endsection

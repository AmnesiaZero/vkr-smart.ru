@extends('layouts.dashboard.main')

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
        <div class="row pt-4 g-3 px-md-0 px-3">
            <div class="col-xxl-4 col-xl-5 col-lg-6">
                <div id="tree" class="br-green-light-2 br-15 p-3">
                    <ul class="ui-fancytree fancytree-container fancytree-plain" tabindex="0">
                        @if(is_iterable($years))
                            @foreach($years as $year)
                                <li class="fancytree-lastsib">
		    							<span
                                            class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    								<span class="fancytree-title" id="year_{{$year->id}}">{{$year->year}}</span>
		    							</span>
                                    <ul>
                                        @if(is_iterable($year->departments))
                                            @foreach($year->departments as $department)
                                                <li class="fancytree-lastsib">
		    											<span
                                                            class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c"><span
                                                                class="fancytree-expander"></span>
		    											<span class="fancytree-title"
                                                              id="department_{{$department->id}}">{{$department->name}}</span>
		    										</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col">
                <form class="pt-4 col-xxl-4 col-xl-5 col-md-8" onsubmit="searchUsers();return false;" id="search_users">
                    <p class="fs-14 m-0 text-grey">Статус</p>
                    <div class="form-check">
                        <input class="form-check-input green" type="radio" name="is_active" id="status1" value="1"
                               checked>
                        <label class="form-check-label" for="status1">
                            активен
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input green" type="radio" name="is_active" id="status2" value="0">
                        <label class="form-check-label" for="status2">
                            заблокирован
                        </label>
                    </div>
                    <p class="fs-14 m-0 text-grey pt-4">Тип пользователя</p>
                    <div class="form-check">
                        <input class="form-check-input green" type="radio" name="role" id="user_type1" value="user"
                               checked>
                        <label class="form-check-label" for="user_type1">
                            студентам
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input green" type="radio" name="role" id="user_type2" value="teacher">
                        <label class="form-check-label" for="user_type2">
                            преподавателям
                        </label>
                    </div>
                    <div class="input-group input-group-lg br-100 br-green-light-2 focus-form">
                        <input type="text" name="name" class="form-control search br-none fs-14 form-small-p"
                               placeholder="Поиск по имени">
                        <button class="btn pe-3 py-0" type="submit" id="search">
                            <img src="/images/Search.svg" alt="search">
                        </button>
                    </div>
                    <div class="input-group input-group-lg br-100 br-green-light-2 focus-form mt-3">
                        <input type="text" name="email" class="form-control search br-none fs-14 form-small-p"
                               placeholder="Поиск по email">
                        <button class="btn pe-3 py-0" type="submit" id="search">
                            <img src="/images/Search.svg" alt="search">
                        </button>
                    </div>
                    <div class="input-group input-group-lg br-100 br-green-light-2 focus-form mt-3">
                        <input type="text" name="group" class="form-control search br-none fs-14 form-small-p"
                               placeholder="Группа">
                        <button class="btn pe-3 py-0" type="submit" id="search">
                            <img src="/images/Search.svg" alt="search">
                        </button>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100 text-grey fs-14 br-100 br-none mt-4 mb-5">
                        Применить
                    </button>
                </form>
                <div class="out-kod mt-5"></div>
            </div>
        </div>
        <div class="pt-5 px-md-0 px-3">
            <p class="text-grey fs-14">Пользователей: <span class="text-black" id="users_total"></span></p>
            <div class="row g-3" id="users_list">


            </div>
            <button class="btn btn-secondary w-100 text-grey fs-14 br-100 br-none mt-4 mb-5">Показать еще</button>
        </div>
    </div>
    @include('layouts.dashboard.include.elements.works_menu')

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEdit">
        <div class="offcanvas-header border-bottom">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <h5 class="offcanvas-title fw-600 fs-16 text-center pe-5">Редактирование пользователя</h5>
        </div>
        <div class="offcanvas-body" id="canvas_body">

        </div>
    </div>
@endsection

@section('scripts')

    <script src="/js/dashboard/settings/user_management.js">

    </script>
    <script src="/js/user.js"></script>
    <script id="user_tmpl" type="text/x-jquery-tmpl">
            <div class="col-xl-3 col-lg-4 col-sm-6 col-12" id="user_${id}">
                <div class="br-green-light-1 p-3 br-15">
                        <div class="d-flex justify-content-between pb-4">
                            <button class="btn copy_edit br-none" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasEdit" aria-controls="offcanvasEdit" onclick="openUpdateUserCanvas(${id})"></button>
                            <div class="bg-active br-100">
                            @{{if is_active}}
                                <p class="text-grey fs-14 m-0 px-3"><span><img src="/images/green_active.svg" alt=""
                                                                               class="pe-2"></span>Активен</p>
                            @{{else}}
                              <p class="text-grey fs-14 m-0 px-3"><span><img src="/images/red.svg" alt=""
                                  class="pe-2"></span>Заблокирован</p>
                             @{{/if}}
                            </div>
                        </div>
                    <p>${name}</p>
                    <div class="border-left ps-3">
                        <p class="text-grey fs-14 m-0">Группа: ${group}</p>
                        <p class="text-grey fs-14 m-0">${date_of_birth}</p>
                        <p class="text-grey fs-14 m-0">${email}</p>
                    </div>
                    @{{if is_active}}
                    <div class="mt-2"><img src="/images/Lock_1.svg" alt=""><a href="#"
                                                                             class="text-grey link-active-hover fs-14 ps-2" onclick="blockUser(${id})">заблокировать</a>
                    </div>
                    @{{else}}
                    <div class="mt-2"><img src="/images/Lock_1.svg" alt="">
                    <a href="#" class="text-grey link-active-hover fs-14 ps-2"  onclick="unblockUser(${id})">разблокировать</a>
                    </div>
                    @{{/if}}
                    <p><img src="/images/setting_grey.svg" alt=""><a href="#"
                                                                     class="text-grey ps-2 fs-14 link-active-hover" onclick="resetUserPassword('${email}')">сбросить
                        пароль</a></p>
                    <div class="bg-green-light br-5 d-flex justify-content-center py-1">
                        <img src="/images/doc_green.svg" alt="" class="pe-2">
                            <p class="text-grey fs-14 m-0" onclick="openWorks(${id})">Загруженных<br> документов: ${works.length}</p>
                    </div>
                </div>
            </div>


    </script>
    <script type="text/x-jquery-tmpl" id="off_canvas_user">
        <div class="px-4">
        <form onsubmit="updateUser(${id});return false" id="update_user_form">
            <p class="fs-14 m-0 pt-4">Тип пользователя</p>
            <div class="form-check">
                <input class="form-check-input green" type="radio" name="role" value="user" id="user_type1" @{{if roles[0].slug =='user'}} checked @{{/if}}>
                    <label class="form-check-label" for="user_type1">
                        студент
                    </label>
            </div>
            <div class="form-check">
                <input class="form-check-input green" type="radio" name="role" value="teacher" id="user_type2" @{{if roles[0].slug =='teacher'}} checked @{{/if}}>
                    <label class="form-check-label" for="user_type2">
                        преподаватель
                    </label>
            </div>
            <div class="mb-3 pt-4">
                <label for="fio">ФИО</label>
                <input type="text" name="name" class="form-control bg-grey-form fs-14 text-grey fw-500" id="fio"
                       value="${name}">
            </div>
            <div class="mb-3">
                <label for="group">Группа</label>
                <input type="text" name="group" class="form-control bg-grey-form fs-14 text-grey fw-500" id="group"
                       value="${group}">
            </div>
            <div class="mb-3">
                <label for="email">Email-адрес</label>
                <input type="text" name="email" class="form-control bg-grey-form fs-14 text-grey fw-500" id="email"
                       value="${email}">
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

    @include('layouts.dashboard.include.tmpls.work')

@endsection

@extends('layouts.site.main')

@section('content')
    <div class="bc-post p-4">
        <h2 class="bc-post-title" id="bc-post-title">Регистрация по коду приглашения</h2>
        <div id="ajax-content">
            <div class="row">
                <div class="col-sm-6">
                    <blockquote>
                        <p>Добро пожаловать в систему персональной регистрации пользователей комплекса систем хранения и проверок на
                            замствования ВКР-ВУЗ. </p>
                        <p>Специально для наших пользователей мы разработали модуль персональной регистрации, после прохождения
                            которой становятся доступными дополнительные возможности при работе в системе.</p>
                        <p>На данную страницу участники попадают автоматически при указании временного кода приглашения.</p>
                        <p>Для прохождения регистрации заполните все необходимые поля формы. Если вы уже регистрировались в системе
                            ранее или авторизованы автоматически в Вашем вузе, нажмите кнопку "Авторизация", вы будете перемещены на
                            форму входа.</p>
                        <a href="/login" class="btn btn-success btn-block">Авторизация</a>
                    </blockquote>
                </div>
                <div class="col-sm-6" id="code_registration">
                    <form class="form-horizontal" id="registration_form" onsubmit="registration(); return false;">
                        <div class="form-group">
                            <label class="form-label">
                                <span>Ваша организация:</span>
                            </label>

                            <span class="col-sm-8">
                                {{$organization_name}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label"><span>Ваш тип пользователя:</span></label>
                            @if($code->type==1)
                                <span class="col-sm-8">Преподаватель</span>
                            @else
                                <span class="col-sm-8">Студент</span>
                            @endif
                        </div>


                        <div class="form-group pt-4">
                            <div class="col-sm-12">
                                <h4 class="bc-post-title-xs">
                                    <span>Укажите сведения о себе:</span>
                                </h4>
                            </div>
                        </div>

                        <div class="form-group pt-2">
                            <label class="col-sm-4">
                                <span>Год выпуска</span>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="years_list" >
                                </select>
                            </div>
                        </div>

                        <div class="form-group pt-2">
                            <label class="col-sm-4">
                                <span>Факультет</span>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="faculties_list">
                                    <option value="" selected>Выбрать</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group pt-2">
                            <label class="col-sm-4">
                                <span>Кафедры</span>
                            </label>
                            <div class="col-sm-8">
                                @if($code->type==1)
                                    <select class="form-control" id="departments_list">
                                    <option value="" selected>Выбрать</option>
                                    </select>
                                @else
                                    <select name="departments_ids[]" id="departments_menu_list"
                                            class="selectpicker form-control bs-select-hidden" data-title="Выбрать несколько..." data-width="100%"
                                            multiple>
                                        <option value="" selected>Выбрать</option>

                                    </select>
                                @endif
                            </div>
                        </div>

                        @if($code->type==1)
                            <div class="form-group pt-2">
                                <label class="col-sm-4">
                                    <span>Выберите направление подготовки</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="specialty_id" id="programs_specialties_list">
                                        <option value="" selected>Выбрать</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group pt-2">
                                <label class="col-sm-4">
                                    <span>Укажите вашу группу</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="group" placeholder="Уточните группу, в которой вы обучаетесь..." required="">
                                </div>
                            </div>

                        @endif


                        <div class="form-group pt-2">
                            <label class="form-label col-sm-4"><span>Укажите ваше ФИО:</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="ФИО" required="">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label class="col-sm-4">
                                <span>Номер телефона</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone"placeholder="+7 999 999 99 99">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label class="col-sm-4">
                                <span>Дата рождения</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="date_of_birth">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label class="col-sm-4">
                                <span>Пол</span>
                            </label>
                            <div class="col-sm-8">
                                <select name="gender" class="form-control">
                                    <option value="1">Муж.</option>
                                    <option value="2">Жен.</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label col-sm-4">
                                <span>Укажите ваш email-адрес:</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" placeholder="Необходимо для формирования логина..."
                                       required="">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label col-sm-4">
                                <span>Придумайте пароль:</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Не менее 8 символов..."
                                       required="" aria-autocomplete="list">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label col-sm-4">
                                <span>Повторите ввод пароля:</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password" id="repassword" class="form-control" name="repassword" placeholder="Подтвердите пароль"
                                       required="">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label class="form-label col-sm-4">
                                <span>Действия:</span>
                            </label>
                            <div class="col-sm-8 mb-2">
                                <button class="btn btn-success" id="registration-button" type="submit">Зарегистрироваться</button>
                            </div>
                        </div>
                    </form>
                    <div id="success_registration">

                    </div>
                </div>
            </div>

            @endsection

            @section('scripts')

                <script id="year_tmpl" type="text/x-jquery-tmpl">
                    <option value="${id}" onclick="faculties(${id})">${year}</option>


                </script>

                <script id="faculty_tmpl" type="text/x-jquery-tmpl">
                    <option value="${id}">${name}</option>


                </script>
            <script id="program_specialty_tmpl" type="text/x-jquery-tmpl">
                <option value="${id}">${code}|${name}</option>
            </script>

                <script id="department_list_tmpl" type="text/x-jquery-tmpl">
                    <option value="${id}">${name}</option>
                </script>

                <script id="success_registration_tmpl" type="text/x-jquery-tmpl">
                    <div class="alert alert-success">
                    <p>Вы успешно прошли регистрацию в комплексе систем по размещению и проверке работ на заимствования.</p>
                    <p>Ваши учетные данные для авторизации на платформе:</p>
                    <p>Имя пользователя: <strong id="reg-name">${login}</strong>
                    </p><p>Пароль: <strong id="reg-password">${password}</strong>
                   </p>
                   <p>Данные также были отправлены на адрес Вашей электронной почты.</p>
                   <p><a href="/login" class="btn btn-lg btn-success">Авторизоваться по логину и паролю</a></p>
                   </div>
                </script>

                <script src="/js/site/code-register.js"> </script>
@endsection

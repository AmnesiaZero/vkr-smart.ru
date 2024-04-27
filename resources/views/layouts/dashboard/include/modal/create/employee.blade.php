<div class="create-modal" id="create_employee" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <h4 class="modal-title">Создать факультет</h4>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="create_employee_form" class="d-flex flex-column gap-2"
                      onsubmit="createEmployee();return false;">
                    <div class="form-group">
                        <label class="col-sm-4">ФИО</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Логин</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="login" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Пароль</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Номер телефона</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Дата рождения</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="date_of_birth">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Пол</label>
                        <div class="col-sm-8">
                            <select name="gender" class="form-control">
                                <option value="1">Муж.</option>
                                <option value="2">Жен.</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Статус</label>
                        <div class="col-sm-8">
                            <select name="is_active" class="form-control">
                                <option value="1">Активен</option>
                                <option value="0">Заблокирован</option>
                            </select>
                        </div>
                    </div>
                    <h3 class="bc-post-title">Определение уровня доступа</h3>
                    <div class="form-group">
                        <label class="col-sm-4">Год выпуска</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="years_list" required="">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Факультет</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="faculties_list">
                                <option value="" selected>Уточните год выпуска...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Кафедры</label>
                        <div class="col-sm-8">
                            <select name="did[]" id="departments-select" class="form-control bs-select-hidden" data-title="Выбрать несколько..." data-width="100%" multiple="multiple">
                                <option value="">Выбрать...</option>
                                <option value="8717">Экономики и права</option>
                            </select>
                            <div class="btn-group bootstrap-select show-tick form-control dropup" style="width: 100%;">
                                <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" data-id="departments-select" title="Экономики и права" aria-expanded="false">
                                    <span class="filter-option pull-left">Экономики и права</span>
                                    &nbsp;
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu open" style="max-height: 626.367px; overflow: hidden; min-height: 0px;">
                                    <ul class="dropdown-menu inner" role="menu" style="max-height: 614.367px; overflow-y: auto; min-height: 0px;">
                                        <li data-original-index="0">
                                            <a tabindex="0" class="" style="" data-tokens="null">
                                                <span class="text">Выбрать...</span>
                                                <span class="glyphicon glyphicon-ok check-mark"></span>
                                            </a></li><li data-original-index="1" class="selected">
                                            <a tabindex="0" class="" style="" data-tokens="null">
                                                <span class="text">Экономики и права</span>
                                                <span class="glyphicon glyphicon-ok check-mark">

                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Кафедры</label>
                        <div class="col-sm-8">
                            <select name="departments_ids[]"  class="form-control" id="departments_menu_list" multiple>
                                <option value="" selected>Уточните факультет...</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer br-none">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                onclick="closeModal('create_employee')">Закрыть
                        </button>
                        <button type="submit" class="btn btn-success" onclick="closeModal('create_employee')">Создать
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


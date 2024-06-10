<div class="modal" id="configure_user_departments">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Настройка доступа для проверяющих</h3>
            </div>
            <form class="form form-inline" onsubmit="configureUserDepartments(); return false;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Выберите те кафедры,которыми будет управлять сотрудник </h5>
                            <div id="checking-access-alert"></div>
                            <nav class="navbar navbar-default">
                                <ul class="nav gap-3" id="user_access_years_list">

                                </ul>
                            </nav>

                            <div class="list-group list-group-sm gap-2">
                                <p class="m-0">
                                    <input id="checking_departments" type="checkbox">
                                    <label for="checking_departments">Выбрать все</label>
                                </p>
                                <div id="departments_list">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="closeModal('configure_user_departments');"
                                class="btn btn-success">Сохранить изменения
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="closeModal('configure_user_departments')">Закрыть окно
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>







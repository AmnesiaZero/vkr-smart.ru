<div class="modal" id="inspectors_access_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Настройка доступа для проверяющих</h3>
            </div>
            <form class="form form-inline" id="checkingAccessForm" onsubmit="configureInspectorsAccess(); return false;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Выберите те направления подготовки, доступ к которым будет иметь проверяющий организации</h5>
                            <div id="checking-access-alert"></div>
                            <div id="checkingAccessFormListYears">
                                <nav class="navbar navbar-default">
                                    <ul class="nav gap-3" id="access_years_list">

                                    </ul>
                                </nav>

                            </div>
                            <div id="checkingAccessFormList">

                                <div class="list-group list-group-sm gap-2">
                                    <p class="m-0">
                                        <input id="checking-year-1042" type="checkbox">
                                        <label for="checking-year-1042">Выбрать все</label>
                                    </p>
                                    {{--                                    <select name="specialties_ids[]" id="specialties_list" class="selectpicker form-control bs-select-hidden" data-title="Выбрать несколько..." data-width="100%" multiple>--}}


                                    {{--                                    </select>--}}
                                    <div id="specialties_list">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="closeModal('inspectors_access_modal');" class="btn btn-success">Сохранить изменения</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="closeModal('inspectors_access_modal')">Закрыть окно</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

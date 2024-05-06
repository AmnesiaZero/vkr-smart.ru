<div class="modal-dialog modal-lg" style="width:80%;display: none" id="inspectors_access_modal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                <ul class="nav navbar-nav" id="inspectors_access_years_list">

                                </ul>
                            </nav>

                    </div>
                        <div id="checkingAccessFormList">

                                <div class="list-group list-group-sm">
                                    <h4>
                                        <input id="checking_specialties" type="checkbox"> Выбрать все</h4>
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

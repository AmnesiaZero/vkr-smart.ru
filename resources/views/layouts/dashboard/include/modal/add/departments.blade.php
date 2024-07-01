<div class="create-modal" id="add_department" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <h4 class="modal-title">Создать факультет</h4>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="add_department_form" class="d-flex flex-column gap-2"
                      onsubmit="addDepartment();return false;">
                    <h3 class="bc-post-title">Добавление кафедры</h3>
                    <div class="form-group">
                        <label class="col-sm-4">Год выпуска</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="add_department_years_list" required=""> </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Факультет</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="add_department_faculties_list">
                                <option value="" selected>Уточните год выпуска...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Кафедры</label>
                        <div class="col-sm-8">
                            <select name="departments_ids[]" id="add_departments_menu_list"
                                    class="selectpicker form-control bs-select-hidden" data-title="Выбрать несколько..."
                                    data-width="100%" multiple>
                                <option value="" selected>Уточните факультет...</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer br-none">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                onclick="closeModal('add_department')">Закрыть
                        </button>
                        <button type="submit" class="btn btn-success" onclick="closeModal('add_department')">Создать
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

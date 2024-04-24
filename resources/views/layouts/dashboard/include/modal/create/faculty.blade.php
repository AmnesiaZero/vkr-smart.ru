<div class="create-modal" id="create_faculty">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <h4 class="modal-title">Создать факультет</h4>
            </div>
            <div class="modal-body p-4">
                <form method="post" id="faculty_form" class="d-flex flex-column gap-2"
                      onsubmit="createFaculty();return false;">
                    @csrf
                    <div class="form-group">
                        <label for="name">Название подразделения</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="modal-footer br-none">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                onclick="closeModal('create_faculty')">Закрыть
                        </button>
                        <button type="submit" class="btn btn-success" onclick="closeModal('create_faculty')">Создать
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

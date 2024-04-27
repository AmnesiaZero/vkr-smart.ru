<div class="create-modal" id="create_program">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <h4 class="modal-title">Создать профиль обучения</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="program_form" class="d-flex flex-column gap-2"
                      onsubmit="createProgram();return false;">
                    @csrf
                    <div class="form-group">
                        <label for="name">Название профиля обучения </label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="modal-footer br-none">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                                onclick="closeModal('create_program')">Закрыть
                        </button>
                        <button type="submit" class="btn btn-success" onclick="closeModal('create_program')">Создать
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

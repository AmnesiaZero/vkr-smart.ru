<div class="create-modal" id="create_faculty_department">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <h4 class="modal-title">Создать кафедру</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="faculty-department-form" class="d-flex flex-column gap-2" onsubmit="createFacultyDepartment();return false;">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal('create_faculty_department')">Закрыть</button>
                        <button type="submit" class="btn btn-success" onclick="closeModal('create_faculty_department')">Отправить</button> <!-- Зеленый цвет кнопки "Отправить" -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

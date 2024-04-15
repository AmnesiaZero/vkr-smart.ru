<div class="myModal" id="create_faculty_department">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;"> <!-- Белый цвет фона для модального окна -->
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <h4 class="modal-title">Создать год</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Содержимое модального окна -->
            <div class="modal-body">
                <!-- Форма с полями -->
                <form method="post" id="faculty-department-form" onsubmit="createFacultyDepartment();return false;">
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

<div class="myModal" id="create_year">
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
                <form method="post" action="/dashboard/organizations/years/create" id="yearForm">
                    @csrf
                    <div class="form-group">
                        <label for="year">Год</label>
                        <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <div class="form-group">
                        <label for="students_count">Количество студентов</label>
                        <input type="text" class="form-control" id="students_count" name="students_count">
                    </div>
                    <div class="form-group">
                        <label for="comment">Комментарий</label>
                        <input type="text" class="form-control" id="comment" name="comment">
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal('create_year')">Закрыть</button>
                            <button type="submit" class="btn btn-success" onclick="closeModal('create_year')">Отправить</button> <!-- Зеленый цвет кнопки "Отправить" -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



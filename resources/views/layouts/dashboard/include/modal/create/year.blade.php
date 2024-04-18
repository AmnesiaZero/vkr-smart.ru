<div class="create-modal" id="create_year">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">

            <div class="modal-header">
                <h4 class="modal-title">Создать год</h4>
            </div>

            <div class="modal-body">
                <form method="post" id="yearForm" class="d-flex flex-column gap-2" onsubmit="createYear(); return false;">
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
                    <div class="modal-footer br-none">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal('create_year')">Закрыть</button>
                            <button type="submit" class="btn btn-success" onclick="closeModal('create_year')">Создать</button> <!-- Зеленый цвет кнопки "Отправить" -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

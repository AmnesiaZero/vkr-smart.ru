<div id="user_works_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="userWorksListLabel" aria-hide="true" style="padding-right: 20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hide="true">×</button>
                <h4 id="userWorksListLabel">Просмотр списка загруженных работы пользователя</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-mini">
                    <thead>
                    <tr>
                        <th>Наименование работы (тип работы)</th>
                        <th>Дата защиты</th>
                        <th>Оценка</th>
                        <th>Самопроверка</th>
                        <th>Проверка ВКР-ВУЗ.РФ</th>
                    </tr>
                    </thead>
                    <tbody id="works_list">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hide="true" onclick="closeModal('user_works_modal')">Закрыть окно</button>
            </div>
        </div>
    </div>
</div>

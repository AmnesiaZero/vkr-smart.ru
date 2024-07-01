<div class="modal" id="additional_files_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3>Управление дополнительными файлами для работы</h3>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="upload_additional_file_form"  class="form-inline form-well well-form">
                    <div class="col-sm-6">
                        <input type="file" name="additional_file">
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block">Добавить файл</button>
                    </div>
                </form><hr>
                <h3 class="bc-post-title-sm">Прикрепленные файлы</h3>
                <table class="table table-striped table-condensed table-bordered table-mini">
                    <thead>
                    <tr>
                        <th>Наименование файла</th>
                        <th width="80px">Действия</th>
                    </tr>
                    </thead>
                    <tbody id="additional_files">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="closeModal('additional_files_modal')">Закрыть окно</button>
            </div>
        </div>
    </div>
</div>

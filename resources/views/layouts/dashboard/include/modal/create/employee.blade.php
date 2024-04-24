<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h3>Добавление сотрудника кафедры</h3>
    </div>
    <form class="form form-horizontal" id="addStaffForm" onsubmit="createEmployee(); return false;">
        <div class="modal-body">
            <h3 class="bc-post-title">Основная информация</h3>
            <div class="form-group">
                <label class="col-sm-4">ФИО</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Номер телефона</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Пол</label>
                <div class="col-sm-8">
                    <select name="gender" class="form-control">
                        <option value="1">Муж.</option>
                        <option value="2">Жен.</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Статус</label>
                <div class="col-sm-8">
                    <select name="is_active" class="form-control">
                        <option value="0">Активен</option>
                        <option value="1">Заблокирован</option>
                    </select>
                </div>
            </div>
            <h3 class="bc-post-title">Определение уровня доступа</h3>
            <div class="form-group">
                <label class="col-sm-4">Год выпуска</label>
                <div class="col-sm-8">
                    <select name="year" class="form-control" id="years-select" required="">
                        <option value="">Выбрать...</option>
                        <option value="1042">2018 (Первый семестр)</option>
                        <option value="1091">2018 - копия</option>
                        <option value="1327">2020/2021</option>
                        <option value="1328">2020/2021</option>
                        <option value="1330">2027</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Факультет</label>
                <div class="col-sm-8">
                    <select name="fid" class="form-control" id="facultets-select">
                        <option value="">Уточните год выпуска...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Кафедры</label>
                <div class="col-sm-8">
                    <select name="did[]" id="departments-select" class="form-control" data-title="Выбрать несколько..."
                            data-width="100%">
                        <option value="">Уточните факультет...</option>
                    </select>
                </div>
            </div>
            <div id="staff-add-alert"></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Создать и закрыть окно</button>
        </div>
    </form>
</div>

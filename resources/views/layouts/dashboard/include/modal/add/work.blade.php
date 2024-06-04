<div class="modal-content modal" style="display: none" id="add_work_modal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3>Добавление работы</h3>
    </div>
    <form enctype="multipart/form-data" class="form form-horizontal" id="addWorkForm" onsubmit="workAdd(); return false;">
        <div class="modal-body">
            <div class="form-group">
                <label class="col-sm-4">Год выпуска</label>
                <div class="col-sm-8">
                    <select name="year_id" class="form-control" id="years_list" data-width="100%">
                        <option value="">Выбрать...</option>
                        @if(is_iterable($years))
                            @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->year}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Подразделение</label>
                <div class="col-sm-8">
                    <select name="facultet_id" class="form-control" id="faculties_list" data-width="100%">
                        <option value="" disabled="" selected="selected">Уточните год выпуска</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Кафедра</label>
                <div class="col-sm-8">
                    <select name="department_id" class="form-control" id="departments_list" data-width="100%">
                        <option value="" disabled="" selected="selected">Уточните подразделение</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Направление подготовки (специальность)</label>
                <div class="col-sm-8">
                    <select name="specialty_id" class="form-control" id="specialties_list" data-width="100%">
                        <option value="" disabled="" selected="selected">Уточните кафедру</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">ФИО обучающегося</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="student" placeholder="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Группа обучающегося</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="groupname" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Наименование работы</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" placeholder="" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Научный руководитель</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="scientific_adviser" placeholder="Введите ФИО">
                    <span style="font-size:13px; display:block; margin:0.5rem 0; color:#999;">Или выберите из списка:</span>
                    <select name="work_teacher" class="form-control">
                        <option value="">Выбрать...</option><option value="83">Ivanova Natalya</option><option value="96">А.М.В.</option><option value="1098">Иванов Иван Иванович</option><option value="30">Кузьмичев Николай Валерьевич</option><option value="87">Кузьмичев Николай Валерьевич</option><option value="31">Кузьмичев Николай Валерьевич 2</option><option value="32">Кузьмичев Николай Валерьевич 3</option><option value="33">Кузьмичев Николай Валерьевич 4</option><option value="1277">Митрохин Иван Александрович</option><option value="97">П А И</option>							</select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Тип работы</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="worktype" placeholder="">
                    <span style="font-size:13px; display:block; margin:0.5rem 0; color:#999;">Или выберите из списка:</span>
                    <select name="work_type" class="form-control">
                        <option value="">Выбрать...</option><option value="3">Выпускная квалификационная работа</option><option value="4">Дипломная работа</option><option value="5">Доклад</option><option value="6">Контрольная работа</option><option value="2">Курсовая работа</option><option value="1">Курсовой проект</option><option value="27">Мой тип работы</option><option value="28">Мой тип работы 2</option><option value="29">Мой тип работы 3</option><option value="30">Мой тип работы 4</option><option value="31">Мой тип работы 5</option><option value="7">Публикация</option><option value="8">Реферат</option>							</select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Дата защиты</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="protect_date">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Оценка</label>
                <div class="col-sm-8">
                    <select class="selectpicker bs-select-hidden" data-width="100%" data-style="btn" name="assessment">
                        <option value="0">Без оценки</option>
                        <option value="5">Отлично</option>
                        <option value="4">Хорошо</option>
                        <option value="3">Удовлетворительно</option>
                        <option value="2">Неудовлетворительно</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Согласие на размещение работы</label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="agreement" checked="" required=""> Да
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Файл работы</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="workfile" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Способ проверки работы по базе ВКР-ВУЗ:</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                            <input type="radio" name="bsemethod" value="0"> Проверить автоматически после загрузки
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="bsemethod" value="1" checked=""> Проверить работу в ручном режиме
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="bsemethod" value="2"> Не проверять работу после загрузки
                        </label>
                    </div>
                </div>
            </div><hr>
            <div class="form-group">
                <label class="col-sm-4">Самопроверка работы студентом</label>
                <div class="col-sm-8">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="selfcheck" value="1" checked=""> Работа проверена самостоятельно
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4">Справка о самопроверке работы обучающимся по системе заимствований</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="certificate" placeholder="">
                </div>
            </div>
            <div id="works-add-alert"></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Добавить</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Закрыть окно</button>
        </div>
    </form>
</div>
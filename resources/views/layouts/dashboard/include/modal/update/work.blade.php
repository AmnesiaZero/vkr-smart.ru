<div class="modal modal-dialog modal-lg" id="update_work_modal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h3>Редактирование направления подготовки квалификационной работы</h3>
        </div>
        <form class="form form-horizontal" id="update_work_form" onsubmit="updateWork(); return false;">
            <div class="modal-body">
                <div id="editWorkSpecialtieAlert"></div>
                <div class="form-group">
                    <label class="col-sm-4">ФИО обучающегося</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="student" placeholder="" required="">
                    </div>
                </div><div class="form-group">
                    <label class="col-sm-4">Группа обучающегося</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="group" placeholder="">
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
                        <input type="text" class="form-control" name="scientific_supervisor" placeholder="Введите ФИО">
                        <span style="font-size:13px; display:block; margin:0.5rem 0; color:#999;">Или выберите из списка:</span>
                        <select name="scientific_supervisor" class="form-control">
                            <option value="">Выбрать...</option>
                            @if(isset($scientific_supervisors) and is_iterable($scientific_supervisors))
                                @foreach($scientific_supervisors as $scientific_supervisor)
                                    <option value="{{$scientific_supervisor->name}}">{{$scientific_supervisor->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4">Тип работы</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="work_type" placeholder="">
                        <span style="font-size:13px; display:block; margin:0.5rem 0; color:#999;">Или выберите из списка:</span>
                        <select name="work_type" class="form-control">
                            <option value="">Выбрать...</option>
                            @if(isset($works_types) and is_iterable($works_types))
                                @foreach($works_types as $works_type)
                                    <option value="{{$works_type->name}}">{{$works_type->name}}</option>
                                @endforeach
                            @endif
                        </select>
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
                        <select class="selectpicker bs-select-hidden" data-width="100%" data-style="btn"
                                name="assessment">
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
                    <label class="col-sm-4">Способ проверки работы по базе ВКР-ВУЗ:</label>
                    <div class="col-sm-8">
                        <div class="radio">
                            <label>
                                <input type="radio" name="verification_method" value="0"> Проверить автоматически после
                                загрузки
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="verification_method" value="1" checked=""> Проверить работу в ручном
                                режиме
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="verification_method" value="2"> Не проверять работу после загрузки
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Изменить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="closeModal('update_work_modal')">Отмена</button>
            </div>
        </form>
    </div>
</div>

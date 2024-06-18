<div class="modal modal-dialog modal-lg" id="update_work_specialty_modal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" onclick="closeModal('update_work_specialty_modal')">×</span></button>
            <h3>Редактирование направления подготовки квалификационной работы</h3>
        </div>
        <form class="form form-horizontal" id="update_work_specialty_form" onsubmit="updateWorkSpecialty(); return false;">
            <div class="modal-body">

                <div class="form-group">
                    <label class="col-sm-4">Год выпуска</label>
                    <div class="col-sm-8">
                        <select name="year_id" class="form-control" id="update_years_list" data-width="100%">
                            <option value="">Выбрать...</option>
                            @if(isset($years) and is_iterable($years))
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
                        <select name="faculty_id" class="form-control" id="update_faculties_list" data-width="100%">
                            <option value="" disabled="" selected="selected">Уточните год выпуска</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4">Кафедра</label>
                    <div class="col-sm-8">
                        <select name="department_id" class="form-control" id="update_departments_list" data-width="100%">
                            <option value="" disabled="" selected="selected">Уточните подразделение</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4">Направление подготовки (специальность)</label>
                    <div class="col-sm-8">
                        <select name="specialty_id" class="form-control" id="update_specialties_list" data-width="100%">
                            <option value="" disabled="" selected="selected">Уточните кафедру</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Изменить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="closeModal('update_work_specialty_modal')">Отмена</button>
            </div>
        </form>
    </div>
</div>

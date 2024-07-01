<div id="import_work_modal" class="modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h3>Импортирование работ</h3>
			</div>
			<form class="form form-horizontal" id="import_work_form">
				<div class="modal-body">
					<div class="form-group">
                        <label class="col-sm-4">Год выпуска</label>
                        <div class="col-sm-8">
                            <select name="year_id" class="form-control" id="import_years_list" data-width="100%">
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
                            <select name="faculty_id" class="form-control" id="import_faculties_list" data-width="100%">
                                <option value="" disabled="" selected="selected">Уточните год выпуска</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Кафедра</label>
                        <div class="col-sm-8">
                            <select name="department_id" class="form-control" id="import_departments_list" data-width="100%">
                                <option value="" disabled="" selected="selected">Уточните подразделение</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4">Направление подготовки (специальность)</label>
                        <div class="col-sm-8">
                            <select name="specialty_id" class="form-control" id="import_specialties_list" data-width="100%">
                                <option value="" disabled="" selected="selected">Уточните кафедру</option>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-4">Файл c информацией об обучающихся</label>
						<div class="col-sm-8">
							<input type="file" class="form-control" name="import_file" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">Способ проверки работы по базе ВКР-ВУЗ:</label>
						<div class="col-sm-8">
							<div class="radio">
								<label>
									<input type="radio" name="verification_method" value="0"> Проверить автоматически после загрузки
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="verification_method" value="1" checked=""> Проверять работы в ручном режиме
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="verification_method" value="2"> Не проверять работы после загрузки
								</label>
							</div>
						</div>
					</div><hr>
					<div class="alert alert-info">
						<p>Загружаемый файл со списком работ студентов должен быть заполнен по образцу.</p>
						<p>Разрешенные к загрузке файлы имеют одно из расширений: .CSV, .XLS, .XLSX.</p>
						<p>Если Вы загружаете CSV файл, в этом случае он должен иметь в качестве разделителей «;», а также значения полей должны быть обрамлены в «"»</p>
						<p class="text-right"><a href="/assets/templates/c/xlss/template.xls" class="btn btn-link btn-lg">Скачать образец заполнения списков работ</a></p>
					</div>
					<div id="works-import-alert"></div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Добавить</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="closeModal('import_work_modal')">Закрыть окно</button>
				</div>
			</form>
		</div>
	</div>
</div>

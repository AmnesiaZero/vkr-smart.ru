<div class="myModal" id="{{$modalName}}">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;"> <!-- Белый цвет фона для модального окна -->
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <h4 class="modal-title">{{$modalDescription}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Содержимое модального окна -->
            <div class="modal-body">
                <!-- Форма с полями -->
                <form method="POST" action="{{$url}}">
                    @csrf
                    @foreach($modalFields as $name => $description)
                        <div class="form-group">
                            <label for="{{$name}}">{{$description}}</label>
                            <input type="text" class="form-control" id="{{$name}}" name="{{$name}}">
                        </div>
                    @endforeach
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal('{{$modalName}}')">Закрыть</button>
                            <button type="submit" class="btn btn-success" onclick="closeModal('{{$modalName}}')">Отправить</button> <!-- Зеленый цвет кнопки "Отправить" -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



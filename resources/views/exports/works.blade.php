<table>
    <thead>
    <tr>
        <th>Год выпуска</th>
        <th>Подразделение</th>
        <th>Направление подготовки</th>
        <th>Обучающийся</th>
        <th>Группа</th>
        <th>Наименование работы</th>
        <th>Научный руководитель</th>
        <th>Исполнитель</th>
        <th>Дата загрузки работы</th>
        <th>Дата защиты</th>
        <th>Наличие согласия о размещении работы</th>
        <th>Наличие справки о самопроверке</th>
        <th>Загружен ли файл работы</th>
        <th>Оценка</th>
        <th>Процент заимствований</th>
        <th>Тип работы</th>
    </tr>
    </thead>
    <tbody>
    @foreach($works as $work)
        <tr>
            <td>{{$work->year->year}}</td>
            <td>{{$work->faculty->name}}</td>
            <td>{{$work->specialty->name}}</td>
            <td>{{$work->student}}</td>
            <td>{{$work->group}}</td>
            <td>{{$work->name}}</td>
            <td>{{$work->scientific_supervisor}}</td>
            <td>{{$work->user->name}}</td>
            <td>{{$work->created_at}}</td>
            <td>{{$work->protect_date}}</td>
            @if($work->agreement==1)
                <td>Согласен</td>
            @else
                <td>Не согласен</td>
            @endif

            @if(isset($work->certificate))
                <td>Имеется сертификат о самопроверке</td>
            @else
                <td>Сертификат о самопроверке не загружен/td>
            @endif

            @if(isset($work->path))
                <td>Загружен</td>
            @else
                <td>Не загружен</td>
            @endif
            <td>{{$work->assesment}}</td>
            <td>{{ceil($work->borrowings_percent)}}%</td>
            <td>{{$work->work_type}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

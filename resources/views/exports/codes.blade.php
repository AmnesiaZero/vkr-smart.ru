<table>
    <thead>
    <tr>
        <th>Код приглашения</th>
        <th>Дата окончания</th>
        <th>Тип приглашения</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invite_codes as $invite_code)
        <tr>
            <td>{{$invite_code->id}}-{{$invite_code->code}}</td>
            <td>{{$invite_code->expires_at}}</td>
            @if($invite_code->type==1)
                <td>Для студентов</td>
            @else
                <td>Для преподавателей</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

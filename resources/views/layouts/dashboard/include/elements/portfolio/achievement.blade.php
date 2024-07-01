<tr id="achievement_{{$achievement->id}}">
    <td>
        <strong>{{$loop->iteration}}</strong>
    </td>
    <td>      {{$achievement->name}}
        <span class="desc">{{$achievement->description}}</span>
        <span class="desc">       Подтверждающих документов:
            @if(isset($achievement->records) and is_iterable($achievement->records))
                {{count($achievement->records)}}
                <a href="#" class="get-resourses-link" onclick="getResourses(10608); return false;">Обзор</a>
                <div id="resourses-10608" class="resourses-block"></div>
            @endif
            </span>
    </td>
    <td>{{$achievement->type->name}}</td>
    <td>{{$achievement->record_date}}</td>
</tr>

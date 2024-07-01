@for($i=0;$i<count($levels);$i++)
    <div class="form-check">
        <input class="form-check-input green" type="radio" name="level" id="level_{{$i+1}}" value="{{$i+1}}">
        <label class="form-check-label" for="level_{{$i+1}}">
            {{$levels['name']}}
        </label>
    </div>

@endfor

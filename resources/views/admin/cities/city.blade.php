{{--<select id="city_id" name="city_id" class="form-control" >--}}

{{--        @foreach($cities as $city)--}}

{{--        <option--}}
{{--                @if(isset($item) &&$city->id == $item->city_id)--}}
{{--                selected--}}
{{--                @endif--}}
{{--                value="{{$city->id}}"> {{$city->name}}--}}
{{--        </option>--}}

{{--    @endforeach--}}

{{--</select>--}}

<select id="city_id" name="city_id" class="form-control" >

    @foreach($cities as $cty)
        <option
            @if(isset($item) &&$cty->id == $item->city_id)
            selected
            @endif
            value="{{$cty->id}}"> {{$cty->name}}
        </option>
    @endforeach
</select>


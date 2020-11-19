
@if(isset($category))
    @foreach($category as $cat)
        <option
            @if(isset($item) &&$cat->id == $item->sub_category_id)
            selected
            @endif
            value="{{$cat->id}}"> {{$cat->name}}
        </option>
    @endforeach
@elseif(isset($sub2category))
    @foreach($sub2category as $sub2)
        <option
            @if(isset($item) &&$sub2->id == $item->sub2_category_id)
            selected
            @endif
            value="{{$sub2->id}}"> {{$sub2->name}}
        </option>
    @endforeach
@else
    @foreach($sub3category as $sub3)
        <option
            @if(isset($item) &&$sub3->id == $item->sub3_category_id)
            selected
            @endif
            value="{{$sub3->id}}"> {{$sub3->name}}
        </option>
    @endforeach
@endif

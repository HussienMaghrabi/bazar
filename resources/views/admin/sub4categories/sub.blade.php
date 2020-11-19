
    @if(isset($subcategory))
        @foreach($subcategory as $subcat)
            <option
                @if(isset($item) &&$subcat->id == $item->sub_category_id)
                selected
                @endif
                value="{{$subcat->id}}"> {{$subcat->name}}
            </option>
        @endforeach
    @elseif(isset($sub2category))
        @foreach($sub2category as $subsub)
            <option
                @if(isset($item) &&$subsub->id == $item->sub2_category_id)
                selected
                @endif
                value="{{$subsub->id}}"> {{$subsub->name}}
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

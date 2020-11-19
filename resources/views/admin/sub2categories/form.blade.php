
<div class="form-group">
    <label for="exampleInputuname">{{__('language.image')}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group">
        {!!Form::file('image', array('id' => 'image', 'data-max-file-size' => '2M','class'=>'dropify', isset($item) ? '' : 'required'))!!}
    </div>
</div>

<div class="form-group">
    <label for="exampleInputuname">{{__('language.images')}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group">

        {!!Form::file('images[]', array('id' => 'images[]', 'multiple'=> 'multiple', 'data-max-file-size' => '2M', 'class'=>'dropify', isset($item) ? '' : 'required'))!!}
    </div>
</div>


<div class="form-group">
  <label>{{__("language.name_ar")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
      <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
      </div>
    {!!Form::text('name_ar', null, array('required', 'id' => 'name_ar', 'placeholder'=>__('language.name_ar'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
    <label>{{__("language.name_en")}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        {!!Form::text('name_en', null, array('required', 'id' => 'name_en', 'placeholder'=>__('language.name_en'), 'class'=>'form-control'))!!}
    </div>
</div>

<div class="form-group">
    <label>{{__("language.Sort")}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-book"></i></span>
        </div>
        {!!Form::number('sort', null, array('required', 'id' => 'sort', 'placeholder'=>__('language.Sort'), 'class'=>'form-control'))!!}
    </div>
</div>


<div class="form-group">
    <label >{{__("language.categories")}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
        <select id="category_id" name="category_id" required='required'  class="form-control"  >
            <option selected disabled></option>
            @foreach($categories as $category)
                <option
                    @if(isset($item) &&$category->id == $item->category_id)
                    selected
                    @endif
                    value="{{$category->id}}"> {{$category->name}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>{{__("language.subcategories")}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}}  input-group-prepend">
        <select id="sub_category_id" name="sub_category_id" required='required'  class="form-control"  >
            <option selected disabled></option>
            @foreach($subcategories as $categories)
                <option
                    @if(isset($item) &&$categories->id == $item->sub_category_id)
                    selected
                    @endif
                    value="{{$categories->id}}"> {{$categories->name}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script >
    $(function() {
        $('#category_id').on('change', function () {
            var val = $(this).val();
            console.log(val);
            $.ajax({
                url: '{{route('sub2categories.ajax',App::getLocale())}}',
                dataType: 'html',
                data: {category_id: val},
                success: function (data) {
                    console.log(data);
                    $('#sub_category_id').html(data);
                }
            });
        });
    });
</script>

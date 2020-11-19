<div class="form-group">
  <label>{{__("language.title")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
      <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-address-card"></i></span>
      </div>
    {!!Form::text('title', null, array('required', 'id' => 'title', 'placeholder'=>__('language.title'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
    <label>{{__("language.price")}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
            </div>
        {!!Form::number('price', null, array('required', 'id' => 'price', 'placeholder'=>__('language.price'), 'class'=>'form-control'))!!}
    </div>
</div>

<div class="form-group">
    <label>{{__("language.description")}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-comment-o"></i></span>
        </div>
        {!!Form::textarea('description', null, array('required', 'id' => 'description', 'placeholder'=>__('language.description'), 'class'=>'form-control'))!!}
    </div>
</div>


<div class="form-group">
    <label >{{__("language.country")}}</label>

    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-flag"></i></span>
        </div>
        <select id="country_id" name="country_id"   class="form-control"  >
            <option selected disabled></option>
            @foreach($countries as $country)
                <option
                    @if(isset($item) &&$country->id == $item->country_id)
                    selected
                    @endif
                    value="{{$country->id}}"> {{$country->name}}
                </option>
            @endforeach
        </select>
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

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>


@if(!isset($item))
    <div class="form-group">
        <label >{{__("language.categories")}}</label>
        <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
            <select id="category_id" name="category_id"   class="form-control"  >
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
        <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
            <select id="sub_category_id" name="sub_category_id"   class="form-control"  >

            </select>
        </div>
    </div>

    <div class="form-group">
        <label>{{__("language.sub2categories")}}</label>
        <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
            <select id="sub2_category_id" name="sub2_category_id" class="form-control" >

            </select>
        </div>
    </div>


    <div class="form-group">
        <label>{{__("language.sub3categories")}}</label>
        <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
            <select id="sub3_category_id" name="sub3_category_id" class="form-control" >

            </select>
        </div>
    </div>

    <div class="form-group">
        <label>{{__("language.sub4categories")}}</label>
        <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group-prepend">
            <select id="sub4_category_id" name="sub4_category_id" class="form-control" >

            </select>
        </div>
    </div>



    <script >
        $(function() {
            $('#category_id').on('change', function() {
                var val = $(this).val();
                console.log(val);
                $.ajax({
                    url: '{{route('subcategories.ajax',App::getLocale())}}',
                    dataType: 'html',
                    data: { category_id : val },
                    success: function(data) {

                        $('#sub2_category_id').prop('disabled', false);
                        $('#sub_category_id').html(data);
                    }
                });
            });

            $('#sub_category_id').on('change', function() {
                var val = $(this).val();
                $.ajax({
                    url: '{{route('subcategories.ajax',App::getLocale())}}',
                    data: { sub_category : val },
                    success: function(data) {
                        console.log(data);
                        $('#sub3_category_id').prop('disabled', false);
                        $('#sub2_category_id').html(data);
                    }
                });
            });

            $('#sub2_category_id').on('change', function() {
                var val = $(this).val();
                console.log(val);
                $.ajax({
                    url: '{{route('subcategories.ajax',App::getLocale())}}',
                    dataType: 'html',
                    data: { sub2_category : val },
                    success: function(data) {
                        console.log(data);
                        $('#sub4_category_id').prop('disabled', false);
                        $('#sub3_category_id').html(data);
                    }
                });
            });

            $('#sub3_category_id').on('change', function() {
                var val = $(this).val();
                console.log(val);
                $.ajax({
                    url: '{{route('subcategories.ajax',App::getLocale())}}',
                    dataType: 'html',
                    data: { sub3_category : val },
                    success: function(data) {
                        console.log(data);
                        $('#sub4_category_id').html(data);
                    }
                });
            });
        });
    </script>
@endif



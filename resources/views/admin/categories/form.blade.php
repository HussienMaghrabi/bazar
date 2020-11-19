<div class="form-group">
    <label for="exampleInputuname">{{__('language.image')}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group">

        {!!Form::file('image', array('id' => 'image', 'multiple'=> 'multiple', 'data-max-file-size' => '2M', 'class'=>'dropify', isset($item) ? '' : 'required'))!!}
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

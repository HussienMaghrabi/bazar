<div class="form-group">
    <label for="exampleInputuname">{{__('language.image')}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} input-group">
         {!!Form::file('image', array('id' => 'image', 'class'=>'form-control', isset($item) ? '' : 'required'))!!}
        </div>
</div>
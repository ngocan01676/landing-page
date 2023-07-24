@if(is_default_lang())
<div class="form-group">
    <label>{{ __('Slug')}}</label>
    <input type="text" value="{{$row->slug}}" placeholder=" {{ __('Tag Slug')}}" name="slug" class="form-control">
</div>
<div class="form-group">
    <label>{{ __('Name')}}</label>
    <input type="text" value="{{$translation->name}}" placeholder=" {{ __('Tag name')}}" name="name" class="form-control">
</div>
<!-- <div class="form-group">
    <label>{{ __('Icon')}}</label>
    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
</div>
<div class="form-group">
    <label>{{ __('Hightlight Name')}}</label>
    <input type="text" value="{{$row->detail_tag}}" placeholder=" {{ __('Tag detail name')}}" name="detail_tag" class="form-control">
</div>
<div class="form-group">
    <label>{{ __('Icon detail')}}</label>
    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id_detail',$row->image_id_detail) !!}
</div> -->

<!-- <div class="form-group">
    <label>{{ __('Icon Class')}}</label>
    <input type="text" value="{{$row->icon_class}}" placeholder=" {{ __('Class is font-awesome')}}" name="icon_class" class="form-control">
</div> -->
@endif
{{--<div class="form-group">--}}
    {{--<label class="control-label">{{ __('Description')}}</label>--}}
    {{--<textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->content}}</textarea>--}}
{{--</div>--}}
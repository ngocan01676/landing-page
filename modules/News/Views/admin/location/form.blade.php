<div class="form-group">
    <label> {{ __('Name')}}</label>
    <input type="text" value="{{$row->name}}" placeholder="Location name" name="name" class="form-control">
</div>
@if(is_default_lang())
<div class="form-group">
    <label> {{ __('Parent')}}</label>
    <select name="parent_id" class="form-control">
        <option value=""> {{ __('-- Please Select --')}}</option>
        <?php
        $traverse = function ($locations, $prefix = '') use (&$traverse, $row) {
            foreach ($locations as $location) {
                if ($location->id == $row->id) {
                    continue;
                }
                $selected = '';
                if ($row->parent_id == $location->id)
                    $selected = 'selected';
                printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                $traverse($location->children, $prefix . '-');
            }
        };
        $traverse($parents);
        ?>
    </select>
</div>
<div class="form-group">
    <label> {{ __('Slug')}}</label>
    <input type="text" value="{{$row->slug}}" placeholder="Location slug" name="slug" class="form-control">
</div>
<!-- <div class="form-group">
    <label class="control-label">{{ __('Tiêu đề')}} </label>
    <div class="">
        <textarea name="title" class="d-none has-ckeditor" cols="30" rows="10">{{$row->title}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label">{{ __('Nội dung')}} </label>
    <div class="">
        <textarea name="sub_title" class="d-none has-ckeditor" cols="30" rows="10">{{$row->sub_title}}</textarea>
    </div>
</div> -->
@endif
{{--<div class="form-group">--}}
    {{--<label class="control-label"> {{ __('Description')}}</label>--}}
    {{--<textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$row->content}}</textarea>--}}
{{--</div>--}}
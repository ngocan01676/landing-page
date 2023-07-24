<div class="form-group">
    <label>{{ __('Tiêu đề')}}</label>
    <input type="text" value="{{ $translation->title}}" placeholder="Tiêu đề" name="title" class="form-control">
</div>
<!-- <div class="form-group">
    <label>{{ __('Title Job')}}</label>
    <input type="text" value="{{ $row->sub_title }}" placeholder="Title Job" name="sub_title" class="form-control">
</div> -->
<!-- <div class="form-group">
    <label>{{ __('Ngày hết hạn')}}</label>
    <input type="date" value="{{ $row->due_date }}" data-date="" data-date-format="DD/MM/YYYY"  placeholder="dd/mm/yyyy" name="due_date" class="form-control">
</div> -->
<div class="form-group">
    <label class="control-label">{{ __('Mô tả')}} </label>
    <div class="">
        <textarea name="content" class="" rows="7" style="width:100%">{{$translation->content}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label">{{ __('Content body')}} </label>
    <div class="">
        <textarea name="description_1" class="d-none has-ckeditor" cols="30" rows="20">{{ $row->description_1 }}</textarea>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script>
    // A $( document ).ready() block.
    $(document).ready(function() {
        //console.log(moment(new Date()).format('DD/MM/YYYY'));
        $("input").on("change", function() {
            this.setAttribute(
                "data-date",
                moment(this.value)
                .format( this.getAttribute("data-date-format") )
            )
        }).trigger("change")
    });
</script>
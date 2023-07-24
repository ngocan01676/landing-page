@php
    $logo_header = get_file_url(setting_item("header_image_id"),"full");
@endphp
<div class="container">
    <div class="dhl-header">
        <img class="logo" alt="logo"  src="{{$logo_header}}"/>
    </div>
</div>

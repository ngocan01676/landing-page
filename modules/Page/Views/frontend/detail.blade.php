@extends ('layouts.app')
@section ('content')
<section class="wrapper-content container" id="tp-apec" >
    @if($row->template_id)
        {!! $row->getProcessedContent() !!}
    @else
        <div class="container " style="padding-top: 40px;padding-bottom: 40px;">
            <h1>{{$translation->title}}</h1>
            <div class="blog-content">
                {!! $translation->content !!}
            </div>
        </div>
    @endif
</section>
@endsection
<?php
    $phone_text = setting_item("footer_phone_text");
    $phone_call = setting_item("footer_phone_call");
 ?>
<div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show" id="coccoc-alo-phoneIcon" data-aos="slide-up" data-aos-duration="2000">
    <a href="tel:{{$phone_call}} " data-original-title="Liên hệ với chúng tôi">
    <div class="coccoc-alo-ph-circle"></div>
    <div class="coccoc-alo-ph-circle-fill"></div>
    <div class="coccoc-alo-ph-img-circle"></div>
    <span class="phone_text">{{$phone_text}}</span></a>
</div>
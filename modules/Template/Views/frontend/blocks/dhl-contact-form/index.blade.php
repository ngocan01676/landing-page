@php
   $bg = get_file_url($bg,'full')
@endphp

<div class="dhl-form-contact"  style="background-image: url({{$bg}});">
    <div class="d-flex content-fisrt" >
        <div class="block-left" data-aos="fade-right" data-aos-duration="2000">
            @if (!empty($title))
            <h1 class="title">{{$title}}</h1>
            @endif
            @if (!empty($desc))
            <div class="desc">{!! $desc !!}</div>
            @endif
            @if (!empty($hotline_1))
            <div class="hotline_1 hotline">
                <a href="tel:+{{$hotline_1_link}}">{{$hotline_1}}</a></div>
            @endif
            @if (!empty($hotline_2))
            <div class="hotline_1 hotline">
                <a href="tel:+{{$hotline_2_link}}">{{$hotline_2}}</a>
            </div>
            @endif
            @if (!empty($left_text_footer))
            <div class="block_left_text_footer">
                {!! $left_text_footer !!}
            </div>
            @endif
        </div>
        <div class="wrapper-contact-form block-right ravi-contact-form" data-aos="flip-left" data-aos-duration="2000">
            <h4>ĐĂNG KÝ NGAY ĐỂ NHẬN BÁO GIÁ</h4>
            <div class="contact-form">
                <form action="{{route('contact.clientSubscriber')}}" method="post" class="ravi-client-subscriber-form" novalidate>
                    @csrf
                    <div class="contact-form-input">
                        <input name="name" class="name-pattern" type="text" placeholder="Họ tên*" />
                        <span class="text-error is-hidden">Họ tên không hợp lệ</span>
                    </div>
                    <div class="contact-form-input">
                        <input name="phone" class="phone-pattern" type="number" placeholder="Số điện thoại của bạn*" />
                        <span class="text-error is-hidden">Số điện thoại không hợp lệ</span>
                    </div>
                    <div class="contact-form-input">
                        <input class="email-pattern" name="email"  type="email" placeholder="Địa chỉ Email của bạn*" />
                        <span class="text-error is-hidden">Email không hợp lệ</span>
                    </div>
                    <div class="contact-form-btn">
                        <button type="submit" class="form-btn-btn font-btn">Gửi Thông Tin</button>
                    </div>
                    @if (!empty($right_text_footer))
                    <div class="block_right_text_footer">
                        {{ $right_text_footer }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
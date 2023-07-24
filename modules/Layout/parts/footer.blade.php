{{-- <section id="contact" class="contact">
    <div class="contact-background">
        <img src="{{asset('/images/ravi/Mask-group.png')}}" alt="" />
    </div>
    <div class="contact-box">
        <div class="contact-text">
            <span>Đăng ký nhận voucher trải nghiệm nghỉ dưỡng miễn phí cùng RAVI!</span>
        </div>
        <div class="wrapper-contact-form">
            <div class="contact-form">
                <form action="{{route('contact.clientSubscriber')}}" method="post" class="ravi-client-subscriber-form" novalidate>
                    @csrf
                    <div class="contact-form-input">
                        <span>HỌ TÊN *</span>
                        <input name="name" class="name-pattern" type="text" placeholder="Họ tên" />
                        <span class="text-error is-hidden">Họ tên không hợp lệ</span>
                    </div>
                    <div class="contact-form-input">
                        <span>SỐ ĐIỆN THOẠI *</span>
                        <input name="phone" class="phone-pattern" type="number" placeholder="Số điện thoại của bạn" />
                        <span class="text-error is-hidden">Số điện thoại không hợp lệ</span>
                    </div>
                    <div class="contact-form-input">
                        <span>EMAIL *</span>
                        <input class="email-pattern" name="email"  type="email" placeholder="Địa chỉ Email của bạn" />
                        <span class="text-error is-hidden">Email không hợp lệ</span>
                    </div>
                    <div class="contact-form-btn">
                        <button type="submit" class="form-btn-btn font-btn">ĐĂNG KÝ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> --}}
<!-- Footer -->
{{-- <section id="footer" class="footer">
    <div class="footer-box">
        <div class="footer-box-list">
            @if($logo_footer = get_file_url(setting_item("logo_footer"),"full"))
                <img src="{{$logo_footer}}" class="img-responsive" alt="logo footer">
            @endif
            <div class="footer-list-item">
                {!! setting_item("ravi_footer_content") !!}
                <div class="footer-list-icons">
                    <div class="footer-text-span">theo dõi chúng tôi</div>
                    <div class="footer-box-icons">
                        <div class="footer-button-icon" data-social-redirect="{{ setting_item("ravi_facebook_url") }}">
                            <div class="icons icon-face"></div>
                        </div>
                        <a class="footer-button-icon" href="tel:+{{ setting_item("ravi_twitter_url") }}"><i class="far fa-phone-alt menu-btn"></i></a>
                        <div class="footer-button-icon" data-social-redirect="{{ setting_item("ravi_instagram_url") }}">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="footer-button-icon" data-social-redirect="{{ setting_item("ravi_youtube_url") }}">
                            <div class="icons icon-youtube"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        @if(!empty(setting_item("ravi_footer_version")))
        <span>{{ setting_item("ravi_footer_version") }}</span>
        @endif
    </div>
</section> --}}
@include('Layout::parts.login-register-modal')
@include('Layout::parts.chat')
@if(Auth::id())
    @include('Media::browser')
@endif
<link rel="stylesheet" href="{{asset('libs/flags/css/flag-icon.min.css')}}" >

{!! \App\Helpers\Assets::css(true) !!}

{{--Lazy Load--}}
<script src="{{asset('libs/lazy-load/intersection-observer.js')}}"></script>
<script async src="{{asset('libs/lazy-load/lazyload.min.js')}}"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);


</script>
<script src="{{ asset('libs/lodash.min.js') }}"></script>
<script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('libs/vue/vue.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>
@if(Auth::id())
    <script src="{{ asset('module/media/js/browser.js?_ver='.config('app.version')) }}"></script>
@endif
<script src="{{ asset('libs/carousel-2/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>
<script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script>
<script src="{{ asset('js/functions.js?_ver='.config('app.version')) }}"></script>

@if(setting_item('inbox_enable'))
    <script src="{{ asset('module/core/js/chat-engine.js?_ver='.config('app.version')) }}"></script>
@endif
<script src="{{ asset('js/home.js?_ver='.config('app.version')) }}"></script>

@if(!empty($is_user_page))
    <script src="{{ asset('module/user/js/user.js?_ver='.config('app.version')) }}"></script>
@endif

{!! \App\Helpers\Assets::js(true) !!}

@yield('footer')

@php \App\Helpers\ReCaptchaEngine::scripts() @endphp
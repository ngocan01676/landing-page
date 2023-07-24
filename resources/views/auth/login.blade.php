@extends('layouts.app')

@section('content')
<div class="container hr-login-page d-flex align-items-center justify-content-center" style="height:100vh">
    <div class="login-wrapper" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="1000">
        <div class="row justify-content-center bravo-login-form-page bravo-login-page">
            <div style="width:100%">
                <div class="">
                    <h4 class="form-title">{{ __('Login') }}</h4>
                    @include('auth.login-form',['captcha_action'=>'login_normal'])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

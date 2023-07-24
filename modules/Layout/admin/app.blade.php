<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? 'Dashboard'}} - {{setting_item('site_title') ?? 'Admin'}}</title>

    @php
        $favicon = setting_item('site_favicon');
    @endphp
    @if($favicon)
        @php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        @endphp
        @if(!empty($file))
            <link rel="icon" type="{{$file['file_type']}}" href="{{asset('uploads/'.$file['file_path'])}}" />
        @else:
        <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}" />
        @endif
    @endif

    <meta name="robots" content="noindex, nofollow" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/flags/css/flag-icon.min.css') }}" rel="stylesheet">

    <link href="{{ asset('dist/admin/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/admin/css/app.css') }}" rel="stylesheet">
    <style>
        input[type="date"] {
            position: relative;
            height: 32px;
            color: white;
        }

        input[type="date"]:before {
            position: absolute;
            top: 3px; left: 3px;
            content: attr(data-date);
            display: inline-block;
            color: black;
        }

        input[type="date"]::-webkit-datetime-edit, input[type="date"]::-webkit-inner-spin-button, input[type="date"]::-webkit-clear-button {
            display: none;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            top: 3px;
            right: 0;
            color: black;
            opacity: 1;
        }
        [hr-data-title] {
            padding: 20px;
            margin: 0;
            cursor: pointer;
        }
        [hr-data-title] i {
            transform: rotate(270deg);
        }

        [hr-data-title].active i {
            transform: rotate(90deg);
        }

        [hr-data-content] {
            display: none;
        }
        .hr-popup-show {
            position: fixed;
            top:50%;
            left:50%;
            z-index: 999;
            width: 650px;
            transform: translate(-50%,-50%);
            display:none;
            background: #fff;
            box-shadow: 0 3px 6px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%)
        }

        .hr-popup-show .close-popup {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
        }
        .hr-popup-show .header {
            position: relative;
        }

        .hr-popup-show .content {
            max-height: 450px;
            overflow-y: auto;
        }

        .hr-popup-show .content::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .hr-popup-show .content::-webkit-scrollbar
        {
            width: 10px;
            background-color: #F5F5F5;
        }

        .hr-popup-show .content::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            background-color: #FFF;
            background-image: -webkit-linear-gradient(top,
                                                    #e4f5fc 0%,
                                                    #bfe8f9 50%,
                                                    #9fd8ef 51%,
                                                    #2ab0ed 100%);
        }

        .hr-popup-show.open-popup {
            display: block;
        }
        .hr-popup-show .header {
            padding: 10px;
            border-bottom: 1px solid #e4e4e4;
        }
        .hr-popup-show .content {
            padding: 15px;
        }
        .hr-popup-show .content .item {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #e4e4e4;
        }
        .hr-popup-show .content .item .key,.hr-popup-show .content .item .value {
            width: 50%;
        }
    </style>
    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    <script>
        var bookingCore  = {
            url:'{{url('/')}}',
            map_provider:'{{setting_item('map_provider')}}',
            map_gmap_key:'{{setting_item('map_gmap_key')}}',
            csrf:'{{csrf_token()}}'
        };
        var i18n = {
            warning:"{{__("Warning")}}",
            success:"{{__("Success")}}",
            confirm_delete:"{{__("Do you want to delete?")}}",
            confirm:"{{__("Confirm")}}",
            cancel:"{{__("Cancel")}}",
        };
    </script>
    <script src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    @yield('script.head')

</head>
<body class="{{($enable_multi_lang ?? '') ? 'enable_multi_lang' : '' }} @if(setting_item('site_enable_multi_lang')) site_enable_multi_lang @endif">
<div id="app">
    <div class="main-header d-flex">
        @include('Layout::admin.parts.header')
    </div>
    <div class="main-sidebar">
        @include('Layout::admin.parts.sidebar')
    </div>
    <div class="main-content">
        @include('Layout::admin.parts.bc')
        @yield('content')
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="backdrop-sidebar-mobile"></div>
</div>

@include('Media::browser')

<!-- Scripts -->
{!! \App\Helpers\Assets::css(true) !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('dist/admin/js/manifest.js?_ver='.config('app.version')) }}" ></script>
<script src="{{ asset('dist/admin/js/vendor.js?_ver='.config('app.version')) }}" ></script>

<script src="{{ asset('dist/admin/js/app.js?_ver='.config('app.version')) }}" ></script>

<script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>

{!! \App\Helpers\Assets::js(true) !!}

@yield('script.body')
<div class="hr-popup-show-file">
    
</div>
</body>
</html>

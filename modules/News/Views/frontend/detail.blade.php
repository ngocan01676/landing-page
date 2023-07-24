@extends('layouts.app')
@section('head')
    <link href="{{ asset('module/news/css/news.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link href="{{ asset('css/app.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}" />
@endsection
@section('content')
@php
    $image_thumb = get_file_url($row->image_id,'full');
@endphp
<div class="Banner">
    <div class="background-banner">
        <div class="background-opaciti"></div>
    </div>
    <img src="{{ $image_thumb }}" class="banner-blog-single" />
    <div class="content-banner">
        <span>{{ $row->title}}</span>
        <!-- <div>Home / {{ $row->title }}</div> -->
    </div>
</div>
<!-- Nội dụng bài viết -->
<div class="content content-blog-single row" data-detail-url="{{ $row->getDetailUrl() }}">
    <div class="content-left col-sm-12 col-lg-9">
            <div class="content-top">
                <div class="info-top">
                        <div class="content-blog-top">
                            <div class="content-blog-img"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path d="M12.6667 2.66666H3.33333C2.59695 2.66666 2 3.26361 2 3.99999V13.3333C2 14.0697 2.59695 14.6667 3.33333 14.6667H12.6667C13.403 14.6667 14 14.0697 14 13.3333V3.99999C14 3.26361 13.403 2.66666 12.6667 2.66666Z"
                                                stroke="#BCBCBC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        <path d="M10.666 1.33334V4.00001" stroke="#BCBCBC" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.33398 1.33334V4.00001" stroke="#BCBCBC" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 6.66666H14" stroke="#BCBCBC" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></div>
                            <span>{{ display_date($row->created_at) }}</span>
                        </div>
                        <div class="content-blog-top">
                            <div class="content-blog-img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path d="M13.3327 14V12.6667C13.3327 11.9594 13.0517 11.2811 12.5516 10.781C12.0515 10.281 11.3733 10 10.666 10H5.33268C4.62544 10 3.94716 10.281 3.44706 10.781C2.94697 11.2811 2.66602 11.9594 2.66602 12.6667V14"
                                            stroke="#BCBCBC" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    <path d="M8.00065 7.33333C9.47341 7.33333 10.6673 6.13943 10.6673 4.66667C10.6673 3.19391 9.47341 2 8.00065 2C6.52789 2 5.33398 3.19391 5.33398 4.66667C5.33398 6.13943 6.52789 7.33333 8.00065 7.33333Z"
                                            stroke="#BCBCBC" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                </svg>
                            </div>
                            <span>admin</span>
                        </div>
                        <div class="content-blog-top">
                            <div class="content-blog-img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path d="M14 10C14 10.3536 13.8595 10.6928 13.6095 10.9428C13.3594 11.1929 13.0203 11.3333 12.6667 11.3333H4.66667L2 14V3.33333C2 2.97971 2.14048 2.64057 2.39052 2.39052C2.64057 2.14048 2.97971 2 3.33333 2H12.6667C13.0203 2 13.3594 2.14048 13.6095 2.39052C13.8595 2.64057 14 2.97971 14 3.33333V10Z"
                                            stroke="#BCBCBC" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                </svg>
                            </div>
                            <span>{{ $countComment ?? 0 }} bình luận</span>
                        </div>
                </div>
            </div>
            <h3>{{ $row->title }}</h3>
            <div class="content-detail posts-blog-single">
             {!! $row->description_1 !!}
            </div>

            <!-- Các icon chia sẻ -->
            <div class="share">
                <h4>Chia sẻ</h4>
                <div class="item-share">
                        <div class="share-icon" data-social-redirect="{{ setting_item("ravi_facebook_url") }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="22" viewBox="0 0 13 22"
                                    fill="none">
                                    <path d="M12 1H9C7.67392 1 6.40215 1.52678 5.46447 2.46447C4.52678 3.40215 4 4.67392 4 6V9H1V13H4V21H8V13H11L12 9H8V6C8 5.73478 8.10536 5.48043 8.29289 5.29289C8.48043 5.10536 8.73478 5 9 5H12V1Z"
                                        stroke="#BCBCBC" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                            </svg>
                        </div>
                        <a class="share-icon" href="tel:+{{ setting_item("ravi_twitter_url") }}"><i class="far fa-phone-alt menu-btn"></i></a>
                        <div class="share-icon" data-social-redirect="{{ setting_item("ravi_instagram_url") }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M17 2H7C4.23858 2 2 4.23858 2 7V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V7C22 4.23858 19.7614 2 17 2Z"
                                        stroke="#BCBCBC" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15.9997 11.3698C16.1231 12.2021 15.981 13.052 15.5935 13.7988C15.206 14.5456 14.5929 15.1512 13.8413 15.5295C13.0898 15.9077 12.2382 16.0394 11.4075 15.9057C10.5768 15.7721 9.80947 15.3799 9.21455 14.785C8.61962 14.1901 8.22744 13.4227 8.09377 12.592C7.96011 11.7614 8.09177 10.9097 8.47003 10.1582C8.84829 9.40667 9.45389 8.79355 10.2007 8.40605C10.9475 8.01856 11.7975 7.8764 12.6297 7.99981C13.4786 8.1257 14.2646 8.52128 14.8714 9.12812C15.4782 9.73496 15.8738 10.5209 15.9997 11.3698Z"
                                        stroke="#BCBCBC" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M17.5 6.5H17.51" stroke="#BCBCBC" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="share-icon" data-social-redirect="{{ setting_item("ravi_youtube_url") }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <g clip-path="url(#clip0_1231_6640)">
                                        <path d="M22.5406 6.42C22.4218 5.94541 22.1799 5.51057 21.8392 5.15941C21.4986 4.80824 21.0713 4.55318 20.6006 4.42C18.8806 4 12.0006 4 12.0006 4C12.0006 4 5.12057 4 3.40057 4.46C2.92982 4.59318 2.50255 4.84824 2.16192 5.19941C1.82129 5.55057 1.57936 5.98541 1.46057 6.46C1.14579 8.20556 0.991808 9.97631 1.00057 11.75C0.989351 13.537 1.14334 15.3213 1.46057 17.08C1.59153 17.5398 1.83888 17.9581 2.17872 18.2945C2.51855 18.6308 2.93939 18.8738 3.40057 19C5.12057 19.46 12.0006 19.46 12.0006 19.46C12.0006 19.46 18.8806 19.46 20.6006 19C21.0713 18.8668 21.4986 18.6118 21.8392 18.2606C22.1799 17.9094 22.4218 17.4746 22.5406 17C22.8529 15.2676 23.0069 13.5103 23.0006 11.75C23.0118 9.96295 22.8578 8.1787 22.5406 6.42V6.42Z"
                                                stroke="#BCBCBC" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        <path d="M9.75 15.02L15.5 11.75L9.75 8.47998V15.02Z" stroke="#BCBCBC"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1231_6640">
                                                <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                            </svg>
                        </div>
                </div>
            </div>

            <!-- Phần để bài viết trước và sau -->
            <!-- <div class="advertisement">
                <div class="advertisement-left">
                        <div class="blog-before-left">
                            <img src="{{asset('/images/ravi/blog/Icons.png')}}" alt="" class="img-arrow" />
                            <span>BÀI ĐĂNG TRƯỚC</span>
                        </div>
                        <h3 class="title">10 câu nói truyền động lực hay nhất mọi thời đại</h3>
                </div>
                <div class="advertisement-right">
                        <div class="blog-before-right">
                            <span>BÀI TIẾP THEO</span>
                            <img src="{{asset('/images/ravi/blog/Icons (1).png')}}" alt="" class="img-arrow" />
                        </div>
                        <h3 class="title">Bạn có nghĩ những suy nghĩ động lực không?</h3>
                </div>

            </div> -->

            <!-- binh luận -->
            <div class="comment cmt-wrapper">
            <h3>Bình luận ({{ $countComment ?? 0 }} )</h3>
            @if ($countComment > 0)
                <ul>
                @foreach ($commentList as $item)
                    @include('News::frontend.blocks.partials-comment', $item)
                    @if ($loop->index  >= 4)
                        @break
                    @endif
                @endforeach
                </ul>
                @if ($countComment > 5)
                    <ul class="cmt-hidden" style="display: none;">
                        @foreach ($commentList as $item)
                            @include('News::frontend.blocks.partials-comment', $item)
                            @if ($loop->index  <= 4)
                                @break
                            @endif
                        @endforeach
                    </ul>
                    <div class="mt-3">
                        <a style="font-size:16px" href="javascript: void(0)" data-click-show-all-cmt>{{__("Xem thêm")}} <i class="ti-back-left"></i></a>
                    </div>
                @endif
            @endif
            </div>

            <!-- Form bình luận -->
            <div class="form-comment">
                <h3>Bình luận của bạn</h3>
                @include('News::frontend.blocks.blogs-form-cmt')
            </div>
    </div>
    <div class="content-right col-sm-12 col-lg-3">
            <div class="search">
                <form method="get" action="{{ url(app_get_locale(false,false,'/').config('news.news_route_prefix')) }}" class="" role="search">
                    <input type="text" placeholder="Từ khóa tìm kiếm" />
                    <button type="submit" class="content-btn">
                        <div class="icon-search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                        stroke="#BA9256" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                <path d="M22 22L20 20" stroke="#BA9256" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                </form>
            </div>
            @if (isset($model_category))
                <div class="category">
                    <h3>Danh mục <strong>__</strong></h3>
                    @foreach($model_category as $t)
                        <p><a href="{{ $t->getDetailUrl() }}">{{ $t->name }}</a></p>
                    @endforeach
                </div>
            @endif
            <div class="new-posts">
                <h3>Bài đăng mới nhất <strong>__</strong></h3>
                @if($newest->count() > 0)
                    @foreach($newest as $row)
                        @php
                            $translation = $row->translateOrOrigin(app()->getLocale());
                            $image_thumb = get_file_url($row->image_id,'full');
                        @endphp
                        <div class="info-new-posts">
                            <div class="new-left">
                                <a href="{{ $row->getDetailUrl() }}">
                                    <img src="{{ $image_thumb }}" alt="{{ $row->title }}"/>
                                </a>
                            </div>
                            <div class="new-right">
                                <a href="{{ $row->getDetailUrl() }}">
                                    <span>{{ $row->title }}</span>
                                </a>
                                <br>
                                <span class="day-posts">
                                    {{ display_date($row->created_at)}}
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if(!empty($model_tag))
                @php
                    $list_tags = \Modules\News\Models\News::getAllTags();
                @endphp
                <div class="tags">
                    <h3>Tags <strong>__</strong></h3>
                    <div class="item-tags">
                    @if($list_tags)
                        @foreach($list_tags as $tag)
                            @php $translation = $tag->translateOrOrigin(app()->getLocale()) @endphp
                            <div>
                                <a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-cloud-link"><span>{{$translation->name}}</span></a>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            @endif
    </div>
</div>
@endsection



@extends('layouts.app')
@section('head')
    <link href="{{ asset('module/news/css/news.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link href="{{ asset('css/app.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
@php
    $title_page = setting_item_with_lang("news_page_list_title");
    $bg_blog =  get_file_url(setting_item("news_page_list_banner"),'full');
@endphp
<div class="Banner">
    <div class="background-banner">
        <div class="background-opaciti"></div>
    </div>
    <img src="{{ $bg_blog }}" />
    <div class="content-banner">
        <span>{{ $title_page }}</span>
        <!-- <div>Home / Tin tức</div> -->
    </div>
</div>
<div class="content blogs-page row">
    <div class="content-left col-sm-12 col-lg-9">
        @if($rows->count() > 0)
        @foreach($rows as $row)
        @php
            $translation = $row->translateOrOrigin(app()->getLocale());
            $image_thumb = get_file_url($row->image_id,'full');
        @endphp
        <div class="list-post">
            <a href="{{ $row->getDetailUrl() }}">
                <img src="{{ $image_thumb }}" alt="{{ $row->title }}"/>
            </a>
            <div class="info-blog">
                    <div class="info-top">
                        <div class="content-blog-top">
                                <div class="content-blog-img"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path d="M12.6667 2.66666H3.33333C2.59695 2.66666 2 3.26361 2 3.99999V13.3333C2 14.0697 2.59695 14.6667 3.33333 14.6667H12.6667C13.403 14.6667 14 14.0697 14 13.3333V3.99999C14 3.26361 13.403 2.66666 12.6667 2.66666Z"
                                                stroke="#BCBCBC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10.666 1.33334V4.00001" stroke="#BCBCBC"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5.33398 1.33334V4.00001" stroke="#BCBCBC"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
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
                                <span>0 bình luận</span>
                        </div>
                    </div>
                    <a href="{{ $row->getDetailUrl() }}">
                        <div class="title-blog">
                                <h3>{{ $row->title }}</h3>
                        </div>
                    </a>
                    <div class="content-blog">
                        <p>{{ $row->content }}</p>
                    </div>
                    <a href="{{ $row->getDetailUrl() }}">
                        <div class="see-more-blog blog">
                                <span>Xem thêm</span>
                        </div>
                    </a>
            </div>
        </div>
        @endforeach
        <div class="blogs bravo-pagination ravi-pagination" style="display:none !important">
            {{$rows->appends(request()->query())->links()}}
            <span data-last-item="{{ $rows->lastItem() }}"  data-count="{{ $rows->total() }}" class="count-string" >{{ __("Showing :from - :to of :total posts",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
        </div>
        @if ($rows->total() > 12)
        <div class="see-more" data-count="{{ $rows->total() }}" >
            <button type="submit" class="ravi-blog-loadmore" ravi-blog-loadmore>
                    Xem thêm 12 bài viết
            </button>
        </div>
        @endif
        @else
            <div class="alert alert-danger">
                {{__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")}}
            </div>
        @endif
        </div>
    <div class="content-right col-sm-12 col-lg-3">
        <form method="get" action="{{ url(app_get_locale(false,false,'/').config('news.news_route_prefix')) }}" class="" role="search">
            <div class="search">
                <input value="{{ Request::query("s") }}" name="s"   type="text" placeholder="Từ khóa tìm kiếm" />
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
            </div>
        </form>
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
            @if(isset($newest) && $newest->count() > 0)
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



<div class="dhl-five-block container">
    @if (!empty($title))
        <h3>{{$title}}</h3>
    @endif
    <div class="list-items d-flex">
        @foreach($list_item as $key=>$item)
        <div class="item"  data-aos="zoom-in" data-aos-duration="2000">
            <?php $img = get_file_url($item['bg'],'full') ?>
            <div class="content-wrapper">
                <img src="{{$img }}" />
                <p class="title">{{$item['title']}} </p>
                <div class="content">{!! $item['content'] !!} </div>
            </div>
        </div>
        @endforeach
    </div>
    @if (!empty($note))
    <div class="content-heading" data-aos="zoom-out" data-aos-duration="1500">
        <div class="note">{!! $note !!}</div>
    </div>
    @endif
    <h3 class="follow-us">Follow us</h3>
        <ul class="list-social">
            <a target="_blank" href="{{setting_item('ravi_linkedin_url')}}"><img class="alignnone wp-image-7754" src="{{asset('images/linkedin_grey.png')}}" alt="Icon linkedin"></a>
            <a target="_blank" href="{{setting_item('ravi_instagram_url')}}"><img class="alignnone wp-image-7754" src="{{asset('images/ig_grey.png')}}" alt="Icon instagram"></a>
            <a target="_blank" href="{{setting_item('ravi_facebook_url')}}"><img class="alignnone wp-image-7754" src="{{asset('images/fb_grey.png')}}" alt="Icon facebook"></a>
            <a target="_blank" href="{{setting_item('ravi_zalo_url')}}"><img class="alignnone wp-image-7754" src="{{asset('images/zalo_grey.png')}}" alt="Icon zalo"></a>
        </ul>
    <div class="dhl-dived"></div>
</div>
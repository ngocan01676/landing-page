<section class="home">
    @if (empty($video_url))
    <video autoplay muted loop playsinline class="myVideo">
        <source src="{{asset('/videos/demo-home.mp4')}}" type="video/mp4">
    </video>
    @else
    <iframe width="100%" height="315" src="https://www.youtube.com/watch?v=XoA6bTXf1FY&t=944s" frameborder="0" 
    allowfullscreen></iframe>
    @endif
    @if (!empty($btn_text) && !empty($btn_link))
    <div class="home-box">
        <div class="home-btn">
            <a href="{{ $btn_link }}">
                <div class="home-btn-btn font-btn">{{ $btn_text }}</div>
            </a>
        </div>
        <div class="img-bottom">
            <img src="{{asset('/images/ravi/h1-rev-bottom 1.png')}}" alt=""/>
        </div>
    </div>
    @endif
</section>
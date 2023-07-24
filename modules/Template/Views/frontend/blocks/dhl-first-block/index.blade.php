<div class="dhl-first-block container">
    @if (!empty($title))
        <h3>{{$title}}</h3>
    @endif
    <div class="list-items mt-3 d-flex">
        @foreach($list_item as $key=>$item)
        <?php $img = get_file_url($item['bg'],'full') ?>
        <div class="item" data-aos-duration="1500"    @if($loop->iteration % 2 == 0) data-aos="fade-right" @else data-aos="fade-left" @endif>
            <a href="$item['link']">
                <div class="content">
                    <img src="{{$img }}" />
                    <p class="title">{{$item['title']}} </p>
                    <p class="sub_title">{{$item['sub_title']}} </p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @if (!empty($btn_label))
        <div class="btn-action action-scroll-to-top">
            <button>{{$btn_label}}</button>
        </div>
    @endif
    <div class="dhl-dived"></div>
</div>
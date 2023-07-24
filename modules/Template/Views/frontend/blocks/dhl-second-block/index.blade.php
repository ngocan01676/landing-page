<div class="dhl-second-block container">
    @if (!empty($title))
        <h3>{{$title}}</h3>
    @endif
    <div class="list-items mt-3 d-flex">
        @foreach($list_item as $key=>$item)
        <?php $img = get_file_url($item['bg'],'full') ?>
        <div class="item"  data-aos="fade-up" data-aos-duration="2000">
            <div class="content">
                <img src="{{$img }}" />
                <p class="title">{{$item['title']}} </p>
                <p class="sub_title">{{$item['sub_title']}} </p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="dhl-dived"></div>
</div>
<div class="dhl-third-block container">
    @if (!empty($title))
        <h3>{{$title}}</h3>
    @endif
    <div class="list-items mt-3">
        @foreach($list_item as $key=>$item)
        <div class="item"  data-aos="zoom-in" data-aos-duration="2000">
            <div class="content-wrapper">
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
    <div class="dhl-dived"></div>
</div>
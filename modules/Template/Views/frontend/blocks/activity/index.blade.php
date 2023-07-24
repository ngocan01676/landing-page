@if($list_item)
<section id="activity" class="activity">
    <div class="activity-box">
        @if (!empty($title))
        <h3>{{ $title }}</h3>
        @endif
        <div class="activity-list">
            @foreach($list_item as $k=>$item)
                <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                <div class="activity-box-item">
                <div class="activity-group-box">
                    <div class="activity-group">
                        <div class="group-img img-order-{{ $loop->index }}" style="background-image: url('{{$image_url}}')"></div>
                    </div>
                </div>
                @if (!empty($item['title']))
                <h4>{{ $item['title'] }}</h4>
                @endif
                @if ($item['desc'])
                <div class="fos">
                    <p>{{ $item['desc'] }}</p>
                </div>
                @endif
                @if (!empty($item['btn_text']) && !empty($item['btn_link']))
                <a href="{{ $item['btn_link'] }}">
                    <span>{{ $item['btn_text'] }}</span>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
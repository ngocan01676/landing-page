@if($list_item)
<section id="partner" class="partner">
        <div class="partner-box">
            @if(!empty($title))
            <span>{{ $title}}</span>
            @endif
            @if(!empty($desc))
            <p>{{ $desc}}</p>
            @endif
            <div class="partner-max-width">
                <button class="partner-btn custom-Prev">
                    <i class="ti-angle-left"></i>
                </button>
                <div class="panrtner-carousel owlCarousel">
                @foreach($list_item as $k=>$item)
                    <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                    <div class="panrtner-carousel-card">
                        <img class="panrtner-img" src="{{ $image_url }}" alt="image slide" />
                    </div>
                @endforeach
                </div>
                <button class="partner-btn custom-Next">
                    <i class="ti-angle-right"></i>
                </button>
            </div>
        </div>
</section>
@endif
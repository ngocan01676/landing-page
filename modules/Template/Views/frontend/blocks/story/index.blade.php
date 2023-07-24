<section id="story" class="story">
    <div class="story-box">
        <?php $image_url = get_file_url($icon_image, 'full') ?>
        <img src="{{ $image_url }}" alt="Image story"/>
        <div class="story-text-list">
            @if (!empty($title))
            <h5>{{ $title }}</h5>
            @endif
            @if (!empty($sub_title))
                <h3>{{ $sub_title }}</h3>
            @endif
            @if (!empty($desc))
                {!! $desc !!}
            @endif
            @if (!empty($btn_text) && !empty($btn_link))
            <div class="story-width">
                <div class="story-width-btn font-btn"><a href="{{ $btn_link }}">{{ $btn_text }}</a></div>
            </div>
            @endif
        </div>
    </div>
</section>
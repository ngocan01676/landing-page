@if($list_item)
<section id="news" class="news">
    <div class="news-background"></div>
    <div class="news-box">
        <div class="news-box-list">
            @if(!empty($title))
            <h5>{{ $title }}</h5>
            @endif
            @if(!empty($desc))
            <h3>{{ $desc }}</h3>
            @endif
            <div class="news-row">
                @foreach($list_item as $k=>$item)
                    <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                    <div class="news-row-item">
                        <a href="{{ $item['news_url'] }}">
                            <img src="{{ $image_url }}" alt="Image news list" />
                            <div class="news-row-text">
                                @if (!empty($item['createAt']))
                                <span>{{ $item['createAt'] }}</span>
                                @endif
                                @if (!empty($item['title']))
                                <p>{{ $item['title'] }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @if(!empty($view_all_text))
            <div class="news-btn">
                <a href="{{ $view_all_link}}">
                    <div class="news-btn-btn font-btn">{{ $view_all_text }}</div>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
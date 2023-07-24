@if($list_item)
<section id="project" class="project">
    <div class="project-box">
        @if(!empty($title))
        <h5>{{ $title }}</h5>
        @endif
        @if(!empty($desc))
        <h3>{{ $desc }}</h3>
        @endif
        <div class="project-max-width">
            <div class="project-carousel owl-carousel">
                @foreach($list_item as $k=>$item)
                    <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                    <a href="{{ $item['pj_url'] }}">
                        <div class="project-carousel-card">
                            <div class="carousel-card-box" style="background-image: url('{{$image_url}}')">
                                <div class="carousel-text">
                                    @if (!empty($item['title'] ))
                                    <h4>{{ $item['title'] }}</h4>
                                    @endif
                                    @if (!empty($item['location'] ))
                                    <h5>{{ $item['location'] }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @if (!empty($view_all_text))
        <div class="project-btn">
            <a href="{{ $view_all_link}}">
                <div class="project-btn-btn font-btn">{{ $view_all_text }}</div>
            </a>
        </div>
        @endif
    </div>
</section>
@endif
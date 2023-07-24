@if($list_item)
<section id="recruit" class="recruit">
    <div class="recruit-box row">
        <?php $bg_image_url = get_file_url($bg, 'full') ?>
        <img class="col-sm-12 col-lg-6" src="{{ $bg_image_url  }}" alt="image recruit job" />
        <div class="recruit-content col-sm-12 col-lg-6">
            @if (!empty($title))
            <h5>{{ $title }}</h5>
            @endif
            @if (!empty($desc))
            <h3>{{ $desc }}</h3>
            @endif
            @foreach($list_item as $k=>$item)
                <a href="{{ $item['btn_link'] }}">
                    <div class="recruit-box-job" data-aos="fade-left" data-aos-duration="2000">
                        <div class="box-job-list">
                            <h4>{{ $item['title'] }}</h4>
                            <div class="box-job-text">
                                <div class="job-text-item">
                                    <h5>{{ $item['salary_text'] }}</h5>
                                    <span>{{ $item['salary_value'] }}</span>
                                </div>
                                <div class="recruit-border"></div>
                                <div class="job-text-item">
                                    <h5>{{ $item['quantity_text'] }}</h5>
                                    <span>{{ $item['quantity_value'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="recruit-text-link">
                            <span>
                            {{ $item['btn_text'] }}
                            </span>
                            <i class="ti-arrow-right"></i>
                        </div>
                    </div>
                </a>
            @endforeach
            @if (!empty($view_all_text))
            <div class="recruit-btn">
                <a href="{{ $view_all_link }}">
                    <div class="recruit-btn-btn font-btn">
                        {{ $view_all_text }}
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
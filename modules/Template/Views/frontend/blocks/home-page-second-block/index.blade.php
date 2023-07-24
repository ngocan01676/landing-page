<?php $logo_header = get_file_url($bg,'full') ?>
<div class="apec-group" id="apec-group">
    <div class="group-left">
        <img src="{{$logo_header}}" alt="" data-aos="fade-right" data-aos-duration="1000">
    </div>
    <div class="group-right">
        <div id="carouselExampleIndicators" class="carousel slide">
            <ol class="carousel-indicators">
                <div class="next-group">
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <button class="prev carousel-control-prev-icon" aria-hidden="true">
            <i class="fal fa-chevron-left"></i>
        </button>
                    </a>

                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <button class="prev" aria-hidden="true">
            <i class="fal fa-chevron-right"></i>
        </button>
                    </a>

                </div>
            </ol>
            <div class="carousel-inner">
            @php $number = 0; @endphp
            @foreach($list_item as $key=>$item)
            <div  class="carousel-item @if($number == 0) active @endif">
                <div class="content-group-right">
                    <h1>{{$item['title']}}</h1>
                    <h2>{{$item['sub_title']}}</h2>
                    <br/>
                    <div class="text-group">
                    @if(!empty($item['content']))
                        {!! clean($item['content'],'html5-definitions') !!}
                    @endif
                    </div>
                </div>
            </div>
            @php $number++; @endphp
            @endforeach
            </div>

            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
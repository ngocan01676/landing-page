<?php $logo_bg = get_file_url($bg, 'full') ?>
<div class="garden-apec" id="garden-group" data-aos="zoom" data-aos-duration="500">
    <div class="item-garden-apec" style="background-image: url('{{$logo_bg }}') !important">
        <p data-aos="zoom-in" data-aos-duration="1000">{{$title}}</p>
        <h3 data-aos="zoom-in" data-aos-duration="1000">{{$sub_title}}</h3>
        <div class="content-garden-apec" data-aos="fade-up" data-aos-duration="1000">
            @foreach($list_item as $key=>$item)
            <a href="{{$item['link_url']}}" style="text-decoration: none;" target="_blank">
                <div class="info-garend">
                    <div class="img-garend">
                        <?php $logo = get_file_url($item['bg_child'], 'full') ?>
                        <img src="{{$logo}}" alt="Apec">
                    </div>
                    <div class="title-garden-apec">
                        <h2>{{$item['title']}}</h2>
                        <h1>{{$item['content']}}</h1>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="discover">
            <a href="{{$btn_link_url}}" style="text-decoration: none;" target="_blank">
                <button>
                    {{$btn_link}}
                    <img src="{{ URL::to('/') }}/images/searchs.png" />
                </button>
            </a>
            <div>
            </div>
        </div>
    </div>
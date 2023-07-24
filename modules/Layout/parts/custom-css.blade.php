@php $main_color = setting_item('style_main_color','#5191fa');
$style_typo = json_decode(setting_item_with_lang_raw('style_typo',false,"{}"),true);
@endphp
<style id="custom-css">
    body{
    @if(!empty($style_typo) && is_array($style_typo))
        @foreach($style_typo as $k=>$v)
            @if($v)
                {{str_replace('_','-',$k)}}:{!! $v !!};
            @endif
        @endforeach
    @endif
    }

    {!! (setting_item('style_custom_css')) !!}
    {!! (setting_item_with_lang_raw('style_custom_css')) !!}
    .navbar-header {
        background: {{ setting_item("header_background_color") }};
    }
    .footer {
        background-color: {{ setting_item("footer_background_color") }};
    }

    @media screen (min-width: 948px) {
        .navbar-box-list li a {
        color: {{ setting_item("header_text_color") }};
        }
        .sticky .navbar-box-list li a {
            color: {{ setting_item("header_text_color_sticky") }};
        }
        .navbar-box-list li a:hover {
            color: #ba9256;
        }   
    }
</style>

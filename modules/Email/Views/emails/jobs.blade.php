@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            <?php 
                $templateContent = setting_item_with_lang('email_body_content');
                $delimiters = ["{{", "}}"];            
                function someCrazyFunction($myString, $params, $delimiters) {
                    foreach($params as $k => $v) {
                        $params[$delimiters[0] . $k . $delimiters[1]] = $v;
                        unset($params[$k]);
                    }
            
                    return strtr($myString, $params);
            
                }
                $result = someCrazyFunction($templateContent, $data, $delimiters);
            ?>
            {!! $result !!}
        </div>
    </div>
@endsection

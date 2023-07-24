@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            {!! setting_item_with_lang('email_body_content') !!}
        </div>
    </div>
@endsection

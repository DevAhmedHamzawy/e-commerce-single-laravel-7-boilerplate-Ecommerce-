@extends('main.layouts.app')


@section('header')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            overflow-y: scroll;
        }

        .data{
            z-index: -1;
            margin: 50px 0;
        }

        .the_result{
            margin: -18px 237px;
            font-size: 48px;
        }
    </style>
@endsection

@section('content')

<div class="show-ad-content" style="">
    <div class="layer">
        <div class="container text-right">
            {!! $the_page->{'description_' . $locale} !!}
        </div>
    </div>
</div>


@endsection
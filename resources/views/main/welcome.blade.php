@extends('main.layouts.app')


@section('content')
    @include('main.welcome.banners')
    @include('main.welcome.best_ads')
    @include('main.welcome.new_ads')
    @include('main.welcome.ads_by_category')
@endsection
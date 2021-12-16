@extends('main.layouts.app')

@section('content')

    @if($n % 2 == 0)  @include('main.search.includes.by_tabs')  @endif 

    @if($n % 2 != 0)  @include('main.search.includes.by_blocks') @endif

@endsection
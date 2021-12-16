@extends('main.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('home.dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-center">{{ trans('home.welcome') }}</h1>
                    
                    @include('main.profile.includes.orders')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
   <a href={{ route('get_favourites') }} class="btn btn-success col-md-12">
    {{ trans('welcome.show_favourite') }}
   </a>    
</div>


@endsection
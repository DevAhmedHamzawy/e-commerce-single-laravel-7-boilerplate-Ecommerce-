@extends('main.layouts.app')

@section('content')

<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
  
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="{{ url('public/main/img/header-01.png') }}" id="icon" alt="User Icon" />
      </div>
  
      <!-- Login Form -->
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" id="name" class="fadeIn second textinput @error('name') is-invalid @enderror" name="name" placeholder="{{ trans('auth.name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="text" id="email" class="fadeIn third textinput @error('email') is-invalid @enderror" name="email" placeholder="{{ trans('auth.email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="text" id="mobile" class="fadeIn third textinput @error('mobile') is-invalid @enderror" name="mobile" placeholder="{{ trans('auth.mobile') }}">
        @error('mobile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="password" id="pasword" class="fadeIn third textinput @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('auth.password') }}">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="text" id="password_confirm" class="fadeIn third textinput" name="password_confirmation" placeholder="{{ trans('auth.password_confirmation') }}">
        <input type="submit" class="fadeIn fourth" value="{{ trans('auth.register') }}">
      </>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="{{ route('login') }}"> {{ trans('auth.have_account') }}  ?</a>
      </div>
  
    </div>
  </div>



  
@endsection

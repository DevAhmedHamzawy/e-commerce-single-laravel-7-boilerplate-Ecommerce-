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
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" id="login" class="fadeIn second textinput @error('email') is-invalid @enderror" name="email" placeholder="{{ trans('auth.email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="password" id="password" class="fadeIn third textinput @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('auth.password') }}">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ trans('auth.remember_me') }} 
                    </label>
                </div>
            </div>
        </div>

        <input type="submit" class="fadeIn fourth" value="{{ trans('auth.login') }}">
      </form>
  
      <!-- Remind Passowrd -->
      

      @if (Route::has('password.request'))
        <div id="formFooter">
            <a class="underlineHover" href="{{ route('password.request') }}">
                {{-- __('Forgot Your Password?') --}}
                   {{ trans('auth.forgot_pasword') }} ?
            </a>

            <a class="underlineHover" href="{{ route('register') }}">
              {{-- __('Forgot Your Password?') --}}
              {{ trans('auth.create_account') }} ?    
            </a>
        </div>
      @endif
  
    </div>
  </div>

@endsection

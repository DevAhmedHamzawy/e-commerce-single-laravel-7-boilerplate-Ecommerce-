@extends('main.layouts.app')

@section('content')
  
<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
  
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="{{ url('public/main/img/header-01.png') }}" id="icon" alt="User Icon" />
      </div>
    
      <h3>{{ trans('auth.shipping_address') }}</h3>

      <!-- Login Form -->
      <form method="POST" action="{{ auth()->user() ? route('save_shipping_address') : route('save_the_shipping_address') }}">
        @csrf
        <input type="text" id="login" class="fadeIn second textinput" name="name" value="{{ auth()->user()->latestShippingAddress->name ?? '' }}" placeholder="{{ trans('auth.name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="text" id="emaiil" class="fadeIn third textinput" name="email" value="{{ auth()->user()->latestShippingAddress->email ?? '' }}" placeholder="{{ trans('auth.email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="number" id="telephone" class="fadeIn third textinput" name="telephone" value="{{ auth()->user()->latestShippingAddress->telephone ?? '' }}" placeholder="{{ trans('auth.mobile') }}">
        @error('telephone')
            <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <select name="city_id" class="fadeIn third textinput" required>
           <option selected disabled>{{ trans('order.choose_city') }} .....</option>
           @foreach ($cities as $city)
               <option value="{{ $city->id }}">{{ $city->{'name_' . $locale} }} - {{ trans('order.shipping_cost') }} :- {{ $city->shipping_cost }}</option>
           @endforeach
        </select>
        @error('city_id')
            <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <textarea name="address" class="fadeIn third textinput" id="address" placeholder="{{ trans('auth.address') }}" cols="30" rows="10">{{ auth()->user()->latestShippingAddress->address ?? '' }}</textarea>
        @error('address')
            <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="submit" class="fadeIn fourth" value="{{ trans('auth.save') }}">
      </form>
  
   
  
    </div>
  </div>

@endsection
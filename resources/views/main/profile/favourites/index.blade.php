@extends('main.layouts.app')

@section('content')

<h1 class="text-center mt-3 mb-3">عـــــــــرض الــــمـــفـــضــــلـــــة</h1>

<div class="row">
    @foreach (auth()->user()->favourites as $favourite)
      <div class="col-md-3">
        <div class="changegrid" style="  background-color: #e1cdcd;">
            <div><a href="{{ route('the_products.show', $favourite->product->slug) }}" class="namename"><img src="{{ $favourite->product->img_path }}"  class="blocks" alt=""></a></div>
            <div class="data">
             <h4><a href="{{ route('the_products.show', $favourite->product->slug) }}" class="namename">{{ $favourite->product->{'name_' . $locale} }}</a></h4>
              <p>{!! $favourite->product->{'brief_description_' . $locale} !!}</p>
              <div class="row">
                  <div class="col-6">
                      @if ($favourite->product->the_discount)
                      <span>{{ $favourite->product->the_price }}</span><br>
                      <span>{{ $favourite->product->the_discount }}</span>
                      @else
                      <span></span><br>
                      <span>{{ $favourite->product->the_price }}</span>
                      @endif
                  </div>
                  <div class="col-6 testetst">
                      <a href="{{ route('cart.store', $favourite->product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  </div>
              </div>
            </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
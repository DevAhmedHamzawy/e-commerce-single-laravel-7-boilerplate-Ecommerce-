@extends('main.layouts.app')

@section('content')

<!-- ====================== start cart =========================== -->
 <div class="title">
    <h4>
       <span>
        {{ trans('order.order_details') }}
       </span>
    </h4>


</div>



@include('main.checkout.summary.order_header')
@include('main.checkout.summary.order_items')
{{-- @include('main.checkout.summary.order_footer') --}}



<div class="container pro_cart mt-4">
    <h6>{{ trans('order.coupon_discount') }}</h6>

    <div class="row">
        <form action="{{ route('get_discount') }}" method="get">
        <input type="text" name="coupon" class="form-control" placeholder="{{ trans('order.enter_coupon') }}">

        <button class="bbtn" type="submit">
        {{ trans('order.active_coupon') }}     
        </button>
        </form>
    </div>  
</div>


        
        {{--<form action="{{ auth()->user() ? route('payment', 'myFatoorah') : route('the_payment','myFatoorah') }}" method="post">
            @csrf
            <input type="hidden" name="total" value="{{ $total + \App\City::find(auth()->user()->shippingAddresses[0]->city_id ?? Session::get('address')->city_id)->shipping_cost ?? 0 }}">
            <button type="submit" class="bbtn col-md-7" style="margin: 1% 20%"><a class="text-white">{{ trans('cart.pay_now') }}</a></button>
        </form>--}}


        <form action="{{ auth()->user() ? route('payment', 'delivering') : route('the_payment', 'delivering') }}" method="post">
            @csrf
            <input type="hidden" name="total" value="{{ $total + \App\City::find(auth()->user()->shippingAddresses[0]->city_id ?? Session::get('address')->city_id)->shipping_cost ?? 0 }}">
            <button type="submit" class="bbtn col-md-7" style="margin: 1% 20%"><a class="text-white">{{ trans('cart.pay_delivering') }}</a></button>
        </form>


    <!-- ==================== end cart =================================== -->

@endsection
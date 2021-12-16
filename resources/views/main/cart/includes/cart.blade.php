<div class="col-md-3 col-12">
    <div class="total">
        <h6>
            {{ trans('cart.total_shopping_cart') }}
        </h6>
        <div class="row">
            <div class="col-md-6 text-left">
                <span>
                    {{ trans('cart.sub_total') }}
                </span>
            </div>
            <div class="col-md-6">
                <span>
                    {{ $subTotal }}
                </span>
            </div>
            
        </div>
        {{--<div class="row">
            <div class="col-md-6 text-left">
                <span>
                    {{ trans('cart.vat') }} 
                </span>
            </div>
            <div class="col-md-6">
                <span>
                    {{ $taxes }}
                </span>
            </div>
            
        </div>--}}
        <div class="row">
            <div class="col-md-6 text-left">
                <span>
                    {{ trans('cart.total') }}
                </span>
            </div>
            <div class="col-md-6">
                <span>
                    {{ $total }}
                </span>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="bbtn">
                    <a href="{{ auth()->user() ? route('shipping_address') : route('the_shipping_address') }}" class="text-white">{{ trans('cart.pay_now') }}</a>
                </button>
                <div>
                    <a href="{{ url('/') }}" class="help">
                        {{ trans('cart.continue_purchase') }}
                    </a>
                </div>
              
            </div>
           
            
        </div>
    </div>
</div>
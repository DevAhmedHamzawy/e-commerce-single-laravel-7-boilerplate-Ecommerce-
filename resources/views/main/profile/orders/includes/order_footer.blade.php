<div class="bordertwo">
    <div class="row">
        <div class="col-md-4 col-12">
            <h4 style="margin-right: 5%;">
                <a href="{{ route('invoice', $order->id) }}" target="_blank" style="color: #000;">
                {{ trans('cart.invoice') }}
                </a>
            </h4>
          
        </div>
        <div class="col-md-4 col-12">
          
        </div>
        <div class="col-md-4 col-12">
         
            <p class="del">
                {{ trans('cart.items_no') }} ( {{ count($order->items) }} {{ trans('cart.items') }} )

                <br>
                 {{ trans('cart.sub_total') }}: {{ $order->sub_total }} 
                 <br>
                 + {{ trans('order.shipping_cost') }} : {{ \App\City::find(auth()->user()->shippingAddresses[0]->city_id ?? Session::get('address')->city_id)->shipping_cost ?? 0 }} 
 
                 <h4>
                   {{ trans('order.total') }} : {{ $order->sub_total +  \App\City::find(auth()->user()->shippingAddresses[0]->city_id ?? Session::get('address')->city_id)->shipping_cost ?? 0 }} 
                 </h4>
                 <p class="del">
                    {{ trans('order.note') }}
 
                 </p>
 
             </p>
        </div>
    </div>
  </div>

<div class="container-fluid content2">
    <h4></h4>
    <div class="bordertwo">
      <div class="row">
          {{--<div class="col-md-4 col-12">
              <h4></h4>
              <p class="del"></p>
          </div>--}}
          <div class="col-md-6 col-12">
              <h4>
                   {{ trans('order.client_data') }}
              </h4>
              <p class="del">
                  {{ auth()->user()->shippingAddresses[0]->name ?? Session::get('address')->name }}
                  <br>
                  {{ auth()->user()->shippingAddresses[0]->address ?? Session::get('address')->email  }}
                  <br>
                  {{ trans('auth.address') }} :                   
                  {{ auth()->user()->shippingAddresses[0]->address ?? Session::get('address')->address }}
                
                  <br>
                 {{ trans('order.telephone') }} :   {{ auth()->user()->shippingAddresses[0]->telephone ?? Session::get('address')->telephone }}
  
              </p>
          </div>
          <div class="col-md-6 col-12">
              <h4>
                 {{ trans('order.order_details') }}
              </h4>
              <p class="del">
                 {{ trans('cart.items_no') }} ( {{ $count }} {{ trans('cart.items') }} )

                 <br>
                  {{ trans('cart.sub_total') }}: {{ $subTotal }} 
                  <br>
                  + {{ trans('order.shipping_cost') }} : {{ \App\City::find(auth()->user()->shippingAddresses[0]->city_id ?? Session::get('address')->city_id)->shipping_cost ?? 0 }} 
  
                  <h4>
                    {{ trans('order.total') }} : {{ $subTotal +  \App\City::find(auth()->user()->shippingAddresses[0]->city_id ?? Session::get('address')->city_id)->shipping_cost ?? 0 }} 
                  </h4>
                  <p class="del">
                     {{ trans('order.note') }}
  
                  </p>
  
              </p>
          </div>
      </div>
    </div>
  
  
   
  
  </div>
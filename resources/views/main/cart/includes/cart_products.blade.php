<div class="col-md-9 col-12">


     @foreach ($cart as $item)
     <div class="pro_cart">
        <div class="row" style="margin-right: 0;">
            <div class="col-md-4 image">
                <a href="{{ route('the_products.show', $item->model->slug) }}"><img src="{{ $item->model->img_path }}" class="img-fluid" alt=""></a>
            </div>
            
            <div class="col-md-8 image_data">
                    <a href="{{ route('the_products.show', $item->model->slug) }}" style="text-decoration: none;"><h4>{{ $item->model->{'name_' . $locale} }}</h4></a>
                    <h5>{{ trans('cart.product_price') }}  : {{ $item->model->the_price }}</h5>
                    @unless ($item->model->discount == 0 && $item->model->discount == null) <h5>{{ trans('cart.price_after_discount') }}  : {{ $item->model->the_discount }} </h5> @endunless
                    <h5>{{ trans('cart.qty') }} : {{ $item->qty }}</h5>
                    <h5>{{ trans('cart.total_cost') }}    : {{ $item->total }}</h5>

                    <div class="row bread">

                        @foreach ($item->options as $key=>$value)
                            @if ($value != null)
                                <h6 class="font-weight-bold pt-2 pr-1">{{ $value }}</h6>
                                <span><a style="color: #9d0909; font-weight: bold;">{{ $key }}</a></span>
                            @endif
                        @endforeach

                    </div>
                  

                   <div class="price_data">
                       <span>
                           {{ $item->qty }}
                       </span>
                       <span class="def-number-input number-input safari_only mb-0 w-100">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                          class="minus decrease">
                          <i class="fas fa-minus"></i>
                        </button>
                        <input class="quantity" min="0" id="quantity_{{ $item->rowId }}" value="1" type="number">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                          class="plus increase">
                          <i class="fas fa-plus"></i>
                        </button>
                       </span>
                       <span>
                          {{ $item->the_price }}
                       </span>
                       <a href="{{ route('cart.destroy', $item->rowId) }}" class="delete">
                           {{ trans('cart.delete') }}
                       </a>
                       <input type="hidden" class="rowId"  id="{{ $item->rowId }}"  value="{{ $item->rowId }}">
                       <a href="javascript:void(0)" onclick='updateQty(document.getElementById({!! json_encode($item->rowId) !!}), document.getElementById("quantity_{!! $item->rowId !!}"))' class="sure">
                           {{ trans('cart.edit') }}
                       </a>

                   </div>
            </div>

        </div>

    </div>
     @endforeach
   

 
</div>
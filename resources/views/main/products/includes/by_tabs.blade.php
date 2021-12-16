<!-- Ads By Category -->
<section class="menu_list mt-6">
  
  <div class="container-fluid" style="margin-left: 2%;">

    <div class="row" style="margin-left: 6%;margin-right: 4%;">
        <ul class="nav nav-tabs menu_tab" id="myTab" role="tablist" style="justify-content: flex-end;border-bottom: solid 2px gray;margin-top: 28px;">
          <li class="nav-item"><a class="nav-link active show" id="breakfast-one-tab" data-toggle="tab" href="#breakfastone" role="tab" aria-selected="false">{{ trans('welcome.most_viewed') }}</a></li>
          <li class="nav-item"><a class="nav-link" id="lunch-one-tab" data-toggle="tab" href="#lunchone" role="tab" aria-selected="false">{{ trans('welcome.most_selling') }}</a></li>
          <li class="nav-item"><a class="nav-link" id="dinner-one-tab" data-toggle="tab" href="#dinnerone" role="tab" aria-selected="true">{{ trans('welcome.most_rating') }}</a></li>
        </ul>
    </div>


    <div class="row" style="margin-left: 6%;margin-right: 4%;">
        <div class="tab-content col-xl-12" id="myTabContent">

          <div class="tab-pane fade active show" id="breakfastone" role="tabpanel" aria-labelledby="breakfast-one-tab">
            @foreach ($products as $product)
              <div class="row" style="padding-bottom: 25px;">
                <div class="col-md-4 text-center"><a href="{{ route('the_products.show', $product->slug) }}" class="namename"><img src="{{ $product->img_path}}" class="pro_image" alt="" srcset=""></a></div>
                  <div class="col-md-6">
                    <h4><a href="{{ route('the_products.show', $product->slug) }}" class="namename">{{ $product->{'name_' . $locale} }}</a></h4><span class="trade"> {!! $product->{'brief_description_' . $locale} !!}</span>
                  </div>
                  <div class="col-md-2 lefttry">
                    

                    @if ($product->the_discount)
                    <p>{{ $product->the_price }}</p><br>
                    <p>{{ $product->the_discount }}</p>
                    @else
                    <p></p><br>
                    <p>{{ $product->the_price }}</p>
                    @endif

                    {{--<p>
                      {{ trans('products.prices_including_vat') }} <a href="{{ route('the_page', 5) }}" class="details"> {{ trans('products.details') }}</a>
                      <br>
                      {{ trans('products.shipping_free') }} <a href="{{ route('the_page', 7) }}" class="details"> {{ trans('products.details') }}</a>
                    </p>--}}
                    <a href="{{ route('cart.store', $product->slug) }}" class="buynow">{{ trans('products.buy_now') }}</a>
                  </div>
                  <hr style="background-color: #9d0909;height: 1px;width: 95%;margin-right: 5%;margin-top: 11px;">
              </div>
            @endforeach
          </div>

          <div class="tab-pane fade" id="lunchone" role="tabpanel" aria-labelledby="lunch-one-tab">
            @foreach ($products as $product)
              <div class="row" style="padding-bottom: 25px;">
                <div class="col-md-4 text-center"><a href="{{ route('the_products.show', $product->slug) }}" class="namename"><img src="{{ $product->img_path}}" class="pro_image" alt="" srcset=""></a></div>
                  <div class="col-md-6">
                    <h4><a href="{{ route('the_products.show', $product->slug) }}" class="namename">{{ $product->{'name_' . $locale} }}</a></h4><span class="trade"> {!! $product->{'brief_description_' . $locale} !!}</span>
                  </div>
                  <div class="col-md-2 lefttry">

                    @if ($product->the_discount)
                    <p>{{ $product->the_price }}</p><br>
                    <p>{{ $product->the_discount }}</p>
                    @else
                    <p></p><br>
                    <p>{{ $product->the_price }}</p>
                    @endif

                    <p>
                      {{ trans('products.prices_including_vat') }} <a href="{{ route('the_page', 5) }}" class="details"> {{ trans('products.details') }}</a>
                      <br>
                      {{ trans('products.shipping_free') }} <a href="{{ route('the_page', 7) }}" class="details"> {{ trans('products.details') }}</a>
                    </p>
                    <div>
                      <a href="{{ route('cart.store', $product->slug) }}" class="buynow">{{ trans('products.buy_now') }}</a>
                    </div>
                  </div>
                  <hr style="background-color: #9d0909;height: 1px;width: 95%;margin-right: 5%;margin-top: 11px;">
              </div>
            @endforeach
          </div>

          <div class="tab-pane fade" id="dinnerone" role="tabpanel" aria-labelledby="dinner-one-tab">
            @foreach ($products as $product)
              <div class="row" style="padding-bottom: 25px;">
                <div class="col-md-4 text-center">
                  <a href="{{ route('the_products.show', $product->slug) }}" class="namename"><img src="{{ $product->img_path}}" class="pro_image" alt="" srcset=""></a>
                
                </div>
                  <div class="col-md-6">
                    <h4 class="namename">{{ $product->{'name_' . $locale} }} </h4>
                    <span class="trade">
                      العلامة التجارية : لينوفو

                    </span><br>
                    <span  class="trade">
                      منصة الجهاز : ويندوز
                    </span><br>
                    <span  class="trade">
                      اللون : اسود

                    </span>
                  </div>
                <div class="col-md-2 lefttry">
                    @if ($product->the_discount)
                    <p>{{ $product->the_price }}</p><br>
                    <p>{{ $product->the_discount }}</p>
                    @else
                    <p></p><br>
                    <p>{{ $product->the_price }}</p>
                    @endif
                  <p>
                    {{ trans('products.prices_including_vat') }} <a href="{{ route('the_page', 5) }}" class="details"> {{ trans('products.details') }}</a>
                    <br>
                    {{ trans('products.shipping_free') }} <a href="{{ route('the_page', 7) }}" class="details"> {{ trans('products.details') }}</a>
                  </p>
                  <div>
                    <a href="{{ route('cart.store', $product->slug) }}" class="buynow">{{ trans('products.buy_now') }}</a>
                  </div>
                </div>
                <hr style="background-color: #9d0909;
                height: 1px;
                width: 95%;
                margin-right: 5%;margin-top: 11px;">
              </div>
            @endforeach
          </div>
        
        </div>
    </div>
  

  </div>
</section>
<!-- Ads By Category -->
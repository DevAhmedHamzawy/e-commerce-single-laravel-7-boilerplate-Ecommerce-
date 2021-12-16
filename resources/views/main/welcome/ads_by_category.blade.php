 <!-- Ads By تلفزيونات -->
{{--<section class="menu_list mt-60 mb-60">
    <div class="container">

    <!-- tabs -->
    <div class="row">
      <ul class="nav nav-tabs menu_tab" id="myTab" role="tablist">
        <li class="nav-item the-nav-main-tab"><a class="nav-link the-nav-main-title">المنتجات المميزة</a></li>
        <li class="nav-item"><a class="nav-link active show" id="breakfast-one-tab" data-toggle="tab" href="#breakfastone" role="tab" aria-selected="false">{{ trans('welcome.most_viewed') }}</a></li>
        <li class="nav-item"><a class="nav-link" id="lunch-one-tab" data-toggle="tab" href="#lunchone" role="tab" aria-selected="false">{{ trans('welcome.most_selling') }}</a></li>
        <li class="nav-item"><a class="nav-link" id="dinner-one-tab" data-toggle="tab" href="#dinnerone" role="tab" aria-selected="true">{{ trans('welcome.most_rating') }}</a></li>
      </ul>
    </div>


    <div class="row">
        <div class="tab-content col-xl-12" id="myTabContent">
        <div class="tab-pane fade active show" id="breakfastone" role="tabpanel" aria-labelledby="breakfast-one-tab">
          <div class="row">
            <div class="col-md-6">
              @foreach ($specialProducts as $product)
                <div class="single_menu_list row" style="border-left: solid 1px black;">
                  <a href="{{ route('the_products.show', $product->slug) }}"  class="col-md-6"><img src="{{ $product->img_path }}" width="100%" alt="" srcset=""></a>
                  <div class="col-md-6">
                    <h4>{!! $product->description_ar !!}</h4>
                    <p><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #ffffff;">{{ $product->{'name_' . $locale} }}</a></p>
                    <span class="price">{{ $product->the_price }}</span>
                    <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  </div>
                </div> 
              @endforeach
            </div>
            <div class="col-md-6">
              @foreach ($specialProducts as $product)
                <div class="single_menu_list row" style="border-left: solid 1px black;">
                  <a href="{{ route('the_products.show', $product->slug) }}"  class="col-md-6"><img src="{{ $product->img_path }}" width="100%" alt="" srcset=""></a>
                  <div class="col-md-6">
                    <h4>{!! $product->description_ar !!}</h4>
                    <p><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #ffffff;">{{ $product->{'name_' . $locale} }}</a></p>
                    <span class="price">{{ $product->the_price }}</span>
                    <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  </div>
                </div> 
              @endforeach
            </div>
          </div>
        </div>

        
        <div class="tab-pane fade" id="lunchone" role="tabpanel" aria-labelledby="lunch-one-tab">
          <div class="row">
            <div class="col-md-6">
              @foreach ($specialProducts as $product)
                <div class="single_menu_list row" style="border-left: solid 1px black;">
                  <a href="{{ route('the_products.show', $product->slug) }}"  class="col-md-6"><img src="{{ $product->img_path }}" width="100%" alt="" srcset=""></a>
                  <div class="col-md-6">
                    <h4>{!! $product->description_ar !!}</h4>
                    <p><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #ffffff;">{{ $product->{'name_' . $locale} }}</a></p>
                    <span class="price">{{ $product->the_price }}</span>
                    <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  </div>
                </div> 
              @endforeach          
            </div>
            <div class="col-md-6">
          
              @foreach ($specialProducts as $product)
                <div class="single_menu_list row" style="border-left: solid 1px black;">
                  <a href="{{ route('the_products.show', $product->slug) }}"  class="col-md-6"><img src="{{ $product->img_path }}" width="100%" alt="" srcset=""></a>
                  <div class="col-md-6">
                    <h4>{!! $product->description_ar !!}</h4>
                    <p><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #ffffff;">{{ $product->{'name_' . $locale} }}</a></p>
                    <span class="price">{{ $product->the_price }}</span>
                    <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  </div>
                </div> 
              @endforeach

          </div>
          </div>
        </div>
        <div class="tab-pane fade" id="dinnerone" role="tabpanel" aria-labelledby="dinner-one-tab">
          <div class="row">
            <div class="col-md-6">

              @foreach ($specialProducts as $product)
                <div class="single_menu_list row" style="border-left: solid 1px black;">
                  <a href="{{ route('the_products.show', $product->slug) }}"  class="col-md-6"><img src="{{ $product->img_path }}" width="100%" alt="" srcset=""></a>
                  <div class="col-md-6">
                    <h4>{!! $product->description_ar !!}</h4>
                    <p><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #ffffff;">{{ $product->{'name_' . $locale} }}</a></p>
                    <span class="price">{{ $product->the_price }}</span>
                    <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  </div>
                </div> 
              @endforeach
          
          
          </div>
          <div class="col-md-6">

           

          

            @foreach ($specialProducts as $product)
            <div class="single_menu_list row" style="border-left: solid 1px black;">
              <a href="{{ route('the_products.show', $product->slug) }}"  class="col-md-6"><img src="{{ $product->img_path }}" width="100%" alt="" srcset=""></a>
              <div class="col-md-6">
                <h4>{!! $product->description_ar !!}</h4>
                <p><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #ffffff;">{{ $product->{'name_' . $locale} }}</a></p>
                <span class="price">{{ $product->the_price }}</span>
                <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
              </div>
            </div> 
          @endforeach

          </div>
          </div>
        </div>
        </div>
    </div>
  
    </div>
</section>--}}
<!-- Ads By تلفزيونات -->


 <!-- Best Ads -->
 <section class="menu_list mt-60 mb-60">
  <div class="container">

    <!-- tabs -->
    <div class="row">
      <ul class="nav nav-tabs menu_tab" id="myTab" role="tablist">
        <li class="nav-item the-nav-main-tab"><a class="nav-link the-nav-main-title">{{ trans('welcome.premium_products') }}</a></li>
        <li class="nav-item the-first-nav-tab"><a class="nav-link active show" id="breakfast-one-tab" data-toggle="tab" href="#breakfastone" role="tab" aria-selected="false">{{ trans('welcome.most_viewed') }}</a></li>
        <li class="nav-item"><a class="nav-link" id="lunch-one-tab" data-toggle="tab" href="#lunchone" role="tab" aria-selected="false">{{ trans('welcome.most_selling') }}</a></li>
        <li class="nav-item"><a class="nav-link" id="dinner-one-tab" data-toggle="tab" href="#dinnerone" role="tab" aria-selected="true">{{ trans('welcome.most_rating') }}</a></li>
      </ul>
    </div>


    <!-- tab blocks !-->
    <div class="row">

      <div class="tab-content col-xl-12" id="myTabContent">

        <div class="tab-pane fade active show" id="breakfastone" role="tabpanel" aria-labelledby="breakfast-one-tab">
          <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach ($specialProducts as $product)
                <div class="item">
                  <h4><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #D70204;">{{ $product->{'name_' . $locale} }}</a></h4>
                  <a href="{{ route('the_products.show', $product->slug) }}"> <div> <img src="{{ $product->img_path}}"  alt="" srcset=""> </div> </a>
                
                  <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  <a href="javascript:void(0)">
                    <span class="lefttry" style="text-decoration: none;color: #D70204;">
                      @if ($product->the_discount)
                      <s>{{ $product->the_price }}</s><br>
                      <span>{{ $product->the_discount }}</span>
                      @else
                      <span></span><br>
                      <span>{{ $product->the_price }}</span>
                      @endif
                    </span>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="lunchone" role="tabpanel" aria-labelledby="lunch-one-tab">
          <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach ($specialProducts as $product)
                <div class="item">
                  <h4><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #D70204;">{{ $product->{'name_' . $locale} }}</a></h4>
                  <a href="{{ route('the_products.show', $product->slug) }}"> <div> <img src="{{ $product->img_path}}"  alt="" srcset=""> </div> </a>
                  <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  <a href="javascript:void(0)">
                    <span class="lefttry" style="text-decoration: none;color: #D70204;">
                      @if ($product->the_discount)
                      <s>{{ $product->the_price }}</s><br>
                      <span>{{ $product->the_discount }}</span>
                      @else
                      <span></span><br>
                      <span>{{ $product->the_price }}</span>
                      @endif
                    </span>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="dinnerone" role="tabpanel" aria-labelledby="dinner-one-tab">
          <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach ($specialProducts as $product)
                <div class="item">
                  <h4><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #D70204;">{{ $product->{'name_' . $locale} }}</a></h4>
                  <a href="{{ route('the_products.show', $product->slug) }}"> <div> <img src="{{ $product->img_path}}"  alt="" srcset=""> </div> </a>
                  <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                  <a href="javascript:void(0)">
                    <span class="lefttry" style="text-decoration: none;color: #D70204;">
                      @if ($product->the_discount)
                      <s>{{ $product->the_price }}</s><br>
                      <span>{{ $product->the_discount }}</span>
                      @else
                      <span></span><br>
                      <span>{{ $product->the_price }}</span>
                      @endif
                    </span>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>

    </div>



  </div>
</section>
  <!-- Best Ads -->
 <!-- Best Ads -->
<section class="menu_list mt-60 mb-60">
  <div class="container">

    <!-- tabs -->
    <div class="row">
        <ul class="nav nav-tabs menu_tab" id="myTab" role="tablist">
          <li class="nav-item"><a class="nav-link active show" id="breakfast-tab" data-toggle="tab" href="#breakfast" role="tab" aria-selected="false">{{ trans('welcome.most_viewed') }}</a></li>
          <li class="nav-item"><a class="nav-link" id="lunch-tab" data-toggle="tab" href="#lunch" role="tab" aria-selected="false">{{ trans('welcome.most_selling') }}</a></li>
          <li class="nav-item"><a class="nav-link" id="dinner-tab" data-toggle="tab" href="#dinner" role="tab" aria-selected="true">{{ trans('welcome.most_rating') }}</a></li>
        </ul>
    </div>


    <!-- tab blocks !-->
    <div class="row">

      <div class="tab-content col-xl-12" id="myTabContent">

        <div class="tab-pane fade active show" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
          <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach ($products as $product)
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


        <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
          <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach ($products as $product)
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


        <div class="tab-pane fade" id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
          <div class="row">
            <div class="owl-carousel owl-theme">
              @foreach ($products as $product)
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
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
          <div class="row">
            @foreach ($products as $product)
              <div class="col-md-6 col-xl-3 col-lg-4">
                <div class="changegrid" style="  background-color: #e1cdcd;">
                    <div>
                      <a href="{{ route('the_products.show', $product->slug) }}" class="namename">
                        <div><img src="{{ $product->img_path }}"  class="blocks" alt=""></div>
                      </a>
                    </div>
                    <div class="data">
                      <h4><a href="{{ route('the_products.show', $product->slug) }}" class="namename">{{ $product->{'name_' . $locale} }}</a></h4>
                      <p>{!! $product->{'brief_description_' . $locale} !!}</p>
                      <div class="row">
                          <div class="col-6">
                            @if ($product->the_discount)
                            <span>{{ $product->the_price }}</span><br>
                            <span>{{ $product->the_discount }}</span>
                            @else
                            <span></span><br>
                            <span>{{ $product->the_price }}</span>
                            @endif
                          </div>
                          <div class="col-6 testetst">
                              <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
       
        <div class="tab-pane fade" id="lunchone" role="tabpanel" aria-labelledby="lunch-one-tab">
          <div class="row">
            @foreach ($products as $product)
              <div class="col-md-6 col-xl-3 col-lg-4">
                <div class="changegrid" style="  background-color: #e1cdcd;">
                    <div>
                      <a href="{{ route('the_products.show', $product->slug) }}" class="namename">
                        <div><img src="{{ $product->img_path }}"  class="blocks" alt=""></div>
                      </a>
                    </div>
                    <div class="data">
                     <h4><a href="{{ route('the_products.show', $product->slug) }}" class="namename">{{ $product->{'name_' . $locale} }}</a></h4>
                      <p>{!! $product->{'brief_description_' . $locale} !!}</p>
                      <div class="row">
                          <div class="col-6">
                              @if ($product->the_discount)
                              <span>{{ $product->the_price }}</span><br>
                              <span>{{ $product->the_discount }}</span>
                              @else
                              <span></span><br>
                              <span>{{ $product->the_price }}</span>
                              @endif
                          </div>
                          <div class="col-6 testetst">
                              <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="tab-pane fade" id="dinnerone" role="tabpanel" aria-labelledby="dinner-one-tab">
          <div class="row">
            @foreach ($products as $product)
              <div class="col-md-6 col-xl-3 col-lg-4">
                <div class="changegrid" style="  background-color: #e1cdcd;">
                    <div>
                      <a href="{{ route('the_products.show', $product->slug) }}" class="namename">
                        <div><img src="{{ $product->img_path }}"  class="blocks" alt=""></div>
                      </a>
                    </div>
                    <div class="data">
                     <h4><a href="{{ route('the_products.show', $product->slug) }}" class="namename">{{ $product->{'name_' . $locale} }}</a></h4>
                      <p>{!! $product->{'brief_description_' . $locale} !!}</p>
                      <div class="row">
                          <div class="col-6">
                            @if ($product->the_discount)
                            <span>{{ $product->the_price }}</span><br>
                            <span>{{ $product->the_discount }}</span>
                            @else
                            <span></span><br>
                            <span>{{ $product->the_price }}</span>
                            @endif
                          </div>
                          <div class="col-6 testetst">
                              <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>

  </div>

</section>
<!-- Ads By Category -->
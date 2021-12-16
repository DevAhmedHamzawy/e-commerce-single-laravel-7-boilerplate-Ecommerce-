<section class="labtop" style="
  @if($locale == 'ar') 
  background: url('{{ asset('public/main/img/back.png') }}');
    padding: 4% 0%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 3% 0;
  @else
  background: url('{{ asset('public/main/img/back_en.png') }}');
    padding: 4% 0%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 3% 0;
  @endif
  ">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <!-- Swiper -->
                <div class="swiper-container swipermm">
                    <p class="adf">{{ trans('welcome.new_ads') }}</p>
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="small_ata_home">
                                    <h4><a href="{{ route('the_products.show', $product->slug) }}" style="text-decoration: none;color: #D70204;">{{ $product->{'name_' . $locale} }}</a></h4>
                                    <a href="{{ route('the_products.show', $product->slug) }}" >
                                        <div>
                                            <img src="{{ $product->img_path }}"  class="img-fluid">
                                        </div>
                                    </a>
            
                                    <a href="{{ route('cart.store', $product->slug) }}"><i class="fas fa-shopping-cart the-cart-icon"></i></a>
                                    <span>{{ $product->the_price }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="shut">
    <div class="container-fluid">
  
      <div class="row">
          
          @foreach ($similarProducts as $product)
          <div class="col-md-5 col-xl-3 col-10">
            <div class="small_ata">
                <h4>
                  <a href="{{ route('the_products.show', $product->slug) }}" class="namename">{{ $product->{'name_' . $locale} }}</a>
                </h4>
                <div style="text-align: center;"><a href="{{ route('the_products.show', $product->slug) }}" class="namename"><img src="{{ $product->img_path }}"   class="blocks" alt="">
                  </a></div>
                <i class="fas fa-shopping-cart the-cart-icon"></i>
                <span>
                  {{ $product->the_price }}
                </span>
                
              </div>
              

        </div>
        
          @endforeach
        
       
      </div>
  
    </div>
  
  </div>
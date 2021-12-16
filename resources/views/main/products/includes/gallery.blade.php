<div class="gallery">
    
    <img src="{{ $product->img_path }}" class="img-fluid putimage" alt="" data-toggle="modal" data-target="#myModal" style="cursor: pointer">

    <div class="@if($locale == 'ar') swiper-container @else swiper-container-rtl @endif swiperxx">
        <div class="swiper-wrapper">

            @unless ($product->other_images == null)
                @foreach ($product->other_images_path as $key=>$value)

                <div class="swiper-slide">
                    <img src="{{ $value }}" class="img-fluid takesrc" alt="">
                </div>

                @endforeach
            @endunless
          
            
        
        </div>
        <!-- Add Pagination -->
        
        <!-- Add Arrows -->
        @if ($locale == 'ar')
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        @else
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        @endif
     

    </div>
    

     <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="slideshow-container">

            <div class="mySlides fade">

            <img src="{{ $product->img_path }}" class="img-fluid putimage">

            </div>

            @unless ($product->other_images == null)
            @foreach ($product->other_images_path as $key=>$value)
                <div class="mySlides fade">
                <img src="{{ $value }}"  class="img-fluid putimage">
                </div>
                
            
            @endforeach
            @endunless
      
        
      
        @if ($locale == 'ar')
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        @else
        <a class="prev" onclick="plusSlides(-1)">&#10095;</a>
        <a class="next" onclick="plusSlides(1)">&#10094;</a>
        @endif
        
        </div>
        <br>
        </div>
        
        
        
      </div>
    </div>
  </div>

</div>
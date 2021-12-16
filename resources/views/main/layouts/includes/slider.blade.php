 <!-- Start Slider -->
 <section class="slider">
    <div id="main-slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($mainSliders as $slider)
           
          <div class="carousel-item carousel-{{ $loop->iteration }} @if($loop->iteration == 1) active @endif" style="
             background-image: url({{ $slider->img_path }});
             background-position: center;
              background-size: cover;
              background-repeat: no-repeat;
              width: 100%;
            ">
            <div class="carouseldata"><h3>      أقوى    <p>     العروض   </p> </h3> <a href="" class="btn">   تسوق الأن   </a></div>
          </div>
        @endforeach

      </div>
      <ol class="carousel-indicators">
        
        @foreach ($mainSliders as $slider)
          <li data-target="#main-slider" data-slide-to="{{ $loop->iteration }}"  @if($loop->iteration == 1) class="active" @endif></li>
        @endforeach
      </ol>
    </div>
  </section>
  <!-- End Slider -->
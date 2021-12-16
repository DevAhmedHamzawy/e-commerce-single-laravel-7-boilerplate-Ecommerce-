<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $locale == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="facebook-domain-verification" content="pc1dyznu3atd7rw5ws0ovk4dyk96hi" />
      @if (isset($product))
        <title>{{ $product->{'name_' . $locale} }}</title>
        @else
        <title>{{ $settings->{'name_' . $locale} }}</title>
      @endif
    
        @yield('meta')

    <link rel='stylesheet' type="text/css"  href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css' integrity='sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==' crossorigin='anonymous'/>
    
    
    <link rel="stylesheet" type="text/css" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />    
    <link rel="stylesheet" type="text/css" href="{{ url('main/css/main.css') }}">
    <style>@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap');</style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />   

     <link rel="stylesheet" type="text/css" href="{{ url('main/css/swiper.min.css') }}">   
     
     <link rel="stylesheet" href="{{ url('main/css/carousel/style.css') }}">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
     
     
     @if($locale == 'en')

        <link rel="stylesheet" type="text/css" href="{{ url('main/css/ltr-css.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ url('main/css/ask.css') }}">

        @if(\Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\HomeController@welcome")
          <style>
            .small_ata {
                  width: 100% !important;
                  height: 330px !important;
                  margin-bottom: 30px;
              }
    
              .shut .small_ata h4 {
                height: 64px !important;
              }
    
              .small_ata a div {width: 90%;}
    
              .small_ata span {right: 0px !important;}
    
              @media screen and (min-width: 992px) and (max-width: 1253px) {
                
                .small_ata {
                  width: 100% !important;
                  height: 360px !important;
                  margin-bottom: 30px;
              }
              }
          </style>
        @endif

     @endif
     
     
     @if ($locale == 'ar')
         <style>
           .rc-rcbrand-inner{
             direction: ltr;
           }
         </style>
         
         <link rel="stylesheet" type="text/css" href="{{ url('main/css/me.css') }}">
         
         
        @if(\Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\HomeController@welcome")
          
          <style>
            .small_ata {
                width: 100% !important;
                height: 330px !important;
                margin-bottom: 30px;
              }

              .shut .small_ata h4 {
                height: 64px !important;
              }

              .small_ata a div {width: 90%;}

              .small_ata span {right: 0px !important;}

              @media screen and (min-width: 992px) and (max-width: 1253px) {
                
                .small_ata {
                  width: 100% !important;
                  height: 360px !important;
                  margin-bottom: 30px;
              }
              }
          </style>

        @endif

     @endif


     <link rel="stylesheet" type="text/css" href="{{ url('main/css/kite.css') }}">
        
     
     @yield('header')
</head>
<body style='overflow-x:hidden'>

     <!-- Header -->
    <header>

        <!--First Header -->
        <div class="upper-bar container mt-4">
            <div class="row">
                <!-- One -->
                <div class="col-md-6 col-12">
                    <ul class="list-unstyled row d-flex justify-content-center justify-content-md-start">
                        <li> <a href="{{ route('register') }}" style="color: #000; font-weight:bold;">{{ trans('header.create_account') }}</a> | &nbsp;</li>
                        <li> <a href="{{ route('login') }}" style="color: #000;font-weight:bold;">{{ trans('header.login') }}</a> | &nbsp; </li>
                        <li> <a href="{{ route('contact_us') }}" style="color: #000; font-weight:bold;">{{ trans('header.customer_service') }}</a> | &nbsp;</li>
                        <li> <a href="{{ route('cart.index') }}" style="color: #000; font-weight:bold;">{{ trans('header.follow_purchases') }}</a></li>
                    </ul>
                </div>

                <!-- Two -->
                <div class="col-md-4 col-12">
                    <ul class="list-inline row d-flex justify-content-center justify-content-md-start">
                       {{-- <li>الشحن مجانى  | &nbsp;</li>
                        <li>إرجاع السلع  | &nbsp;</li>
                        <li>الدفع عند الإستلام</li> --}}

                        @auth

                        <li class="list-inline-item d-flex justify-content-center justify-content-md-start"><a href="{{ route('home') }}" class="dropdown-item" style="font-weight: bold;">{{ auth()->user()->name }}</a></li>

                        <li class="list-inline-item d-flex justify-content-center justify-content-md-start"><a class="dropdown-item" href="{{ route('logout') }}" style="font-weight: bold;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <span class="fa fa-sign-out" style="color:#000;"></span>
                                 
                            {{ trans('auth.logout') }}
 
                         </a>
               

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                         </form> 
                        </li>    
                
                     @endauth
                         
                     @guest
                         {{--<li><a href="{{ route('register') }}" style="color: #000;font-weight:bold;">{{ trans('header.register') }} | &nbsp;</a></li>
                         <li><a href="{{ route('login') }}" style="color: #000;font-weight:bold;">{{ trans('header.login') }}</a></li>--}}
                     @endguest
                    </ul>



                </div>

                <div class="col-md-2 col-12 d-flex justify-content-center justify-content-md-start" style="margin-top: -10px;">
                  @include('main.layouts.includes.lang')
                </div>

            </div>
        
        </div>

        <hr>

        <!-- Search Nav Bar -->
        <nav class="header-main">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-4 col-md-4 col-5"> 
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img class="logo" src="{{ url('main/img/header-01.png') }}"> 
                        </a> 
                    </div>
                    <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">

                        <form method="get" action="{{ route('search') }}" class="search-wrap">
                            @csrf
                            <div class="input-group w-100"> <input type="text" name="name" class="form-control search-form" placeholder="{{ trans('header.look') }}">
                                <select name="category_id" class="the_categories" id="">
                                  <option hidden selected> {{ trans('header.all_categories') }}  <i class="fas fa-arrow-down"></i> </option>
                                  @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->{'name_' . $locale} }}</option>
                                  @endforeach
                                </select>
                                <div class="input-group-append"> <button class="btn search-button" type="submit"> <i class="fa fa-search"></i> </button> </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-sm-5 col-md-4 col-6"> 
                        <ul class="list-unstyled row the-nav-icons d-flex justify-content-center justify-content-md-start">
                            {{--<li><i class="fas fa-sync-alt"></i></li>
                            <li><i class="far fa-thumbs-up"></i></li>--}}
                            <li class="cart">
                              <a href="{{ url('cart') }}" style="color: #000"><i class="fas fa-shopping-cart"></i></a>
                              <span class="cart-title d-none d-sm-block d-md-inline"><a href="{{ url('cart') }}" style="color: #000">{{ trans('header.cart') }}</a></span>
                              <span class="num">
                                {{ \Cart::count() }}
                              </span>
                            </li>


                            @auth
                            <li class="cart">
                              <a href="{{ url('get_favourites') }}" style="color: #000"><i class="fas fa-heart"></i></a>
                              <span class="cart-title d-none d-sm-block d-md-inline"><a href="{{ route('get_favourites') }}" style="color: #000">{{ trans('welcome.favourite') }}</a></span>
                              <span class="num">
                                {{ count(auth()->user()->favourites) }}
                               </span>
                            </li>
                            @endauth

                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        <!-- Nav Bar Main -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                {{--<li class="nav-item first_ite">
                  <a class="nav-link" href="#">تلفزيونات</a>
                </li>--}}

                <li class="nav-item first_ite dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ trans('welcome.ecommerce_sections') }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-right: -6%;">
          
                    
                    <div class="container">
                      <div class="row">
                          {{--<span class="text-uppercase text-white"><a href="#" style="color: #fff;">أقسام المتجر</a></span>--}}
                          <ul class="nav the_categories_nav">
                          @foreach ($allCategories as $category)
                            <li class="nav-item">
                              <a class="nav-link @if ($loop->iteration == 1) active @endif" href="{{ route('the_products.index', $category->slug) }}">{{ $category->{'name_' . $locale} }}</a>
                            </li>
                          @endforeach
                           
                         
                        </ul>
                        <!-- /.col-md-4  -->
                        {{--<div class="col-md-4">
                          <ul class="nav ">
                            @foreach ($category->subcategories as $subcategory)
                            <li class="nav-item">
                              <a class="nav-link @if ($loop->iteration == 1) active @endif" href="{{ route('the_products.index', $subcategory->slug) }}">{{ $subcategory->name_ar }}</a>
                            </li>
                            @endforeach
                        </ul>
                        </div>--}}
                        <!-- /.col-md-4  -->
                        {{--<div class="col-md-4">
                          <a href="">
                            <img src="https://dummyimage.com/200x100/ccc/000&text=image+link" alt="" class="img-fluid">
                          </a>
                          <p class="text-white">{{ $category->description_ar }}</p>
          
                        </div>--}}
                        <!-- /.col-md-4  -->
                      </div>
                    </div>
                    <!--  /.container  -->
          
          
                  </div>
                </li>



                @foreach ($categories as $category)
                <li class="nav-item first_ite dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $category->{'name_' . $locale} }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
                    
                    <div class="container">
                      <div class="row">
                          {{--<span class="text-uppercase text-white"><a href="{{ route('the_products.index', $category->slug) }}" style="color: #fff;">{{ $category->{'name_' . $locale} }}</a></span>--}}
                          <ul class="nav the_categories_nav">
                          @foreach ($category->subcategories as $subcategory)
                            <li class="nav-item">
                              <a class="nav-link @if ($loop->iteration == 1) active @endif" href="{{ route('the_products.index', $subcategory->slug) }}">{{ $subcategory->{'name_' . $locale} }}</a>
                            </li>
                          @endforeach
                           
                         
                        </ul>
                        <!-- /.col-md-4  -->
                        {{--<div class="col-md-4">
                          <ul class="nav ">
                            @foreach ($category->subcategories as $subcategory)
                            <li class="nav-item">
                              <a class="nav-link @if ($loop->iteration == 1) active @endif" href="{{ route('the_products.index', $subcategory->slug) }}">{{ $subcategory->name_ar }}</a>
                            </li>
                            @endforeach
                        </ul>
                        </div>--}}
                        <!-- /.col-md-4  -->
                        {{--<div class="col-md-4">
                          <a href="">
                            <img src="https://dummyimage.com/200x100/ccc/000&text=image+link" alt="" class="img-fluid">
                          </a>
                          <p class="text-white">{{ $category->description_ar }}</p>
          
                        </div>--}}
                        <!-- /.col-md-4  -->
                      </div>
                    </div>
                    <!--  /.container  -->
          
          
                  </div>
                </li>
                @endforeach
               
                
          
              </ul>
            
            </div>
          
          
        </nav>
 
    </header>

    @if (request()->route()->getName() == 'welcome')
      @include('main.layouts.includes.slider')
    @endif
    
    
    @yield('content')



    @include('main.layouts.includes.brands')


    
  


    <!-- Footer -->

    

    <!-- Footer --> <!-- Start Footer -->
    <div class="footer" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-12">
            <div class="site-info">
              <img  style='width:100%;max-width:400px' src="{{ url('main/img/footer.png') }}" alt="" srcset="">
             
            </div>
          </div>
          <div class="col-md-2 col-12">
            <div class="helpful-links">
              <div class="row">
                <div class="col">
                  <ul class="list-unstyled">
                    @foreach ($pages as $page)
                      <li><a href="{{ route('the_page', $page->id) }}" style="color: #fff"> {{ $page->{'name_' . $locale} }} </a></li>
                    @endforeach
                  </ul>
                </div>
                
              </div>
            </div>
          </div>
            <div class="col-md-2 col-12">
            <div class="helpful-links">
              <div class="row">
                <div class="col">
                  <ul class="list-unstyled">
                    @foreach ($categories as $category)
                      <li><a href="{{ route('the_products.index', $category->slug) }}" style="color: #fff"> {{ $category->{'name_' . $locale} }} </a></li>
                    @endforeach
                  </ul>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-md-2 col-12">
            <div class="col helpful-links">
             <ul class="list-unstyled">
                @foreach ($categories as $category)
                  <li><a href="{{ route('the_products.index', $category->slug) }}" style="color: #fff"> {{ $category->{'name_' . $locale} }} </a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer -->
    <!-- Start Copyright -->
  
    <!-- End Copyright -->



    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="{{ url('main/js/swiper.min.js') }}"></script>

    <script src="{{ url('main/js/main.js') }}"></script>
    
    
    <script src="{{ asset('main/js/carousel/jquery.rcbrand.js') }}"></script>
    
    
    <script>
        

      $(window).load(function() {
      
      $("#rcbrand1").rcbrand({
          visibleItems: 4,
          itemsToScroll: 3,
          animationSpeed: 200,
          infinite: true,
          navigationTargetSelector: null,
          autoPlay: {
              enable: false,
              interval: 5000,
              pauseOnHover: true
          },
          responsiveBreakpoints: {
              portrait: {
                  changePoint:480,
                  visibleItems: 1,
                  itemsToScroll: 1
              },
              landscape: {
                  changePoint:640,
                  visibleItems: 2,
                  itemsToScroll: 2
              },
              tablet: {
                  changePoint:768,
                  visibleItems: 3,
                  itemsToScroll: 3
              }
          }
      });
      
      $("#rcbrand2").rcbrand({
          visibleItems: 3,
          itemsToScroll: 1,
          autoPlay: {
              enable: true,
              interval: 3000,
              pauseOnHover: true
          }
      });
      
      $("#rcbrand3").rcbrand({
          infinite: false
      });
      
      });
      </script>
      
      <script>
      try {
      fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
      return true;
      }).catch(function(e) {
      var carbonScript = document.createElement("script");
      carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
      carbonScript.id = "_carbonads_js";
      document.getElementById("carbon-block").appendChild(carbonScript);
      });
      } catch (error) {
      console.log(error);
      }
      </script>
      <script type="text/javascript">
      
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);
      
      (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
      
          </script>
    
      <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NP8MBJJ');</script>
    <!-- End Google Tag Manager -->

    @yield('footer')
</body>
</html>
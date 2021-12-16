@extends('main.layouts.app')



@section('meta')

<meta name='description' itemprop='description' content='{{ $product->{'description_' . $locale} }}' />
<meta property='article:published_time' content='{{ $product->updated_at }}' />
<meta property='article:section' content='{{ $category->{'name_' . $locale} }}' />

<meta property="og:description"content="{{ $product->{'description_' . $locale} }}" />
<meta property="og:title"content="{{ $product->{'name_' . $locale} }}" />
<meta property="og:url"content="{{ url()->current() }}" />
<meta property="og:type"content="product" />
<meta property="og:locale"content="{{ $locale }}" />
<meta property="og:site_name"content="{{ $settings->{'name_' . $locale} }}" />
<meta property="og:image:secure"content="{{ $product->img_path }}" />
<meta property="og:image:secure_url"content="{{ $product->img_path }}" />
<meta property="og:image:size"content="300" />

<meta property="og:title" content="{{ $product->{'name_' . $locale} }}">
<meta property="og:description" content="{{ $product->{'description_' . $locale} }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $product->img_path }}">
<meta property="product:brand" content="{{ $settings->{'name_' . $locale} }}">
<meta property="product:availability" content="in stock">
<meta property="product:category" content="{{ $category->{'name_' . $locale} }}"/>

@foreach ($options as $suboptions)
    @foreach ($suboptions as $option)
        <meta property="product:condition" content="{{ $suboptions[0]['name'] }} &nbsp; {{ $option['value'] }}">
    @endforeach
@endforeach

<meta property="product:price:amount" content="{{ $product->price }}">
<meta property="product:price:currency" content="{{ $settings->currency }}">
<meta property="product:retailer_item_id" content="{{ $product->code }}">
<meta property="product:item_group_id" content="{{ $category->{'name_' . $locale} }}">


<meta name="twitter:card" content="{{ $product->{'name_' . $locale} }}" />
<meta name="twitter:site" content="@joomlakw" />
<meta name="twitter:creator" content="@joomlakw" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ $product->{'name_' . $locale} }}" />
<meta property="og:description" content="{{ $product->{'description_' . $locale} }}" />
<meta property="og:image" content="{{ $product->img_path }}" />
@endsection



@section('header')
<link rel="stylesheet" href="{{ asset('public/main/css/pop-up/style.css') }}">

@if ($locale == 'ar')
    <style>
        .next {
            left: 0 !important;
            right: 100%;
            border-radius: 3px 0 0 3px;
         }
    </style>
@else

    <style>
        .next {
            right: 100%;
            border-radius: 3px 0 0 3px;
        }
    </style>

@endif

@endsection

@section('content')
    

<!-- ========================== start product =========================== -->
<div class="container-fluid">
    <div class="bread d-none d-md-block">
        <span>{{ $mainCategory->{'name_' . $locale} }}</span><i class="fas @if($locale == 'ar') fa-chevron-left @else fa-chevron-right @endif"></i>
        <span>{{ $category->{'name_' . $locale} }}</span><i class="fas @if($locale == 'ar') fa-chevron-left @else fa-chevron-right @endif"></i>
        <span>{{ $product->{'name_' . $locale} }}</span>
    </div>
        <div class="row">

            <div class="col-md-3">

             @include('main.products.includes.gallery')

            </div>


            <div class="col-md-5">

                <ul class="dattaa mt-3">
                    <li><h4>{{ $product->{'name_' . $locale} }} </h4></li>
                </ul>
                <ul class="fdsa"><p class="row"> {{ trans('products.description') }} : </p> {!! $product->{'description_' . $locale} !!}</ul>

                
                <h3 class="row ml-5">{{ trans('products.options') }}</h3>
                <div class="bread">
                    @foreach ($options as $suboptions)
                    <div class="row mt-3">
                    <h6 class="font-weight-bold pt-2 pr-1">{{ $suboptions[0]['name'] }}</h6>
                    <br>
                    @foreach ($suboptions as $option)
                        <span class="option"><a href="#" id="{{ rand(0,9999) }}" onclick="selectOption({{ json_encode($suboptions[0]['name']) }}, this);return false;" style="color: #9d0909; font-weight: bold;">{{ $option['value'] }}</a></span>
                    @endforeach
                    </div>
                    @endforeach
                </div>
                
            </div>


            <div class="col-md-2 lefttryp">
                @if ($product->the_discount)
                <p>{{ $product->the_price }}</p><br>
                <p>{{ $product->the_discount }}</p>
                @else
                <p></p><br>
                <p>{{ $product->the_price }}</p>
                @endif
                {{--<p>{{ trans('products.prices_including_vat') }} <a href="{{ route('the_page', 5) }}" class="details"> {{ trans('products.details') }}</a>
                {{ trans('products.shipping_free') }} <a href="{{ route('the_page', 7) }}" class="details"> {{ trans('products.details') }}</a>
                </p>--}}

                <div>
                    <form method="GET" action="{{ route('cart.store', $product->slug) }}" class="buynow">
                        <input type="hidden" id="the_main_options" name="main_options">
                        <input type="hidden" id="the_options" name="options">
                        <button type="submit" class="btn text-white" style="width: 150px;">{{trans('products.add_to_cart') }}</button> 
                    </form>
                </div>
                
                <div>
                    <form method="GET" action="{{ route('cart.store', $product->slug) }}" class="buynow">
                        <input type="hidden" id="type" name="type" value="buy_now">
                        <input type="hidden" id="the_main_options" name="main_options">
                        <input type="hidden" id="the_options" name="options">
                        <button type="submit" class="btn text-white" style="width: 150px;">{{trans('products.buy_now') }}</button> 
                    </form>
                </div>

                <div>
                    <form method="POST" action="{{ route('favourite') }}" class="buynow">
                        @csrf
                        <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn text-white" style="width: 150px;">{{ $product->favourite ? trans('products.unfavourite')  :  trans('products.favourite') }}</button> 
                    </form>
                </div>

                {{--<div class="lastp">
                        اشحن الى..............(تغيير المدينة)
                        ََ! اطلب قبل الساعة ٦
                        للحصول عليه غدا
                        ً مساء إختر التوصيل في اليوم التالي على
                        صفحة الشراء
                </div>--}}
            </div>
            
        </div>

        <div class="row m-4">
            <h4>{{ trans('products.add_rating') }}</h4>
        </div>

        <div class="row m-4">
         
            
            {!! $product->ratings->avg('rating') !!}&nbsp;{{-- trans('products.rating') --}}
            @for ($i=1; $i <= 5 ; $i++)<i class="{{ ($i <= round($product->ratings->avg('rating'),1)) ? 'fas' : 'far'}} fa-star">
            </i>
            @endfor&nbsp;&nbsp;{!! $product->ratings->count() !!}&nbsp;{{ trans('products.rated') }}</p>
        </div>
       

      
        <form class="row form-horizontal poststars m-1" action="{{ route('ratingStar') }}" id="addStar" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                      <label class="star star-5" for="star-5"></label>
                      <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                      <label class="star star-4" for="star-4"></label>
                      <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                      <label class="star star-3" for="star-3"></label>
                      <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                      <label class="star star-2" for="star-2"></label>
                      <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                      <label class="star star-1" for="star-1"></label>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">{{ trans('products.confirm') }}</button>
                  </div>
          </form>


 
         <!-- ===================================== other products ====================== -->
 
 
        <div class="title"><h4><span>{{ trans('products.similar_products') }}</span></h4></div>
        
     
    </div>
 
 </div>

  @include('main.products.includes.similar_products')
 
 
 
 <!-- ============================ end product ============================ -->


 @endsection


 @section('footer')
    <script>
        var main_options = [];
        var options = [];
        function selectOption(main, item)
        {
            $('#'+$(item).attr('id')).css('color', '#fff').css('background-color', '#9d0909');

            options.push($(item).text());

            main_options.push(main);

            $("#the_options").val(options); 

            $("#the_main_options").val(main_options);
        }
    </script>


    <script src="{{ asset('public/main/js/pop-up/slideshow.js') }}"></script>

 @endsection
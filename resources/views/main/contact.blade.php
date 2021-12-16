@extends('main.layouts.app')

@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        
        a {
          text-decoration: none !important;
        }

        body {
          overflow-y: scroll;          
        }

        .data{
            z-index: -1;
        }

        .footer{
            margin-top: 11.4%;
        }

        .the_fa {
        padding: 20px;
        font-size: 30px;
        width: 70px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
      }

      .fa:hover {
          opacity: 0.7;
      }

      .fa-facebook {
        background: #3B5998;
        color: white !important;
      }

      .fa-twitter {
        background: #55ACEE;
        color: white !important;
      }

      .fa-google {
        background: #dd4b39;
        color: white !important;
      }

      .fa-linkedin {
        background: #007bb5;
        color: white !important;
      }

      .fa-youtube {
        background: #bb0000;
        color: white !important;
      }

      .fa-instagram {
        background: #125688;
        color: white !important;
      }

      .fa-pinterest {
        background: #cb2027;
        color: white !important;
      }

      .fa-snapchat-ghost {
        background: #fffc00;
        color: white !important;
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
      }

      .fa-skype {
        background: #00aff0;
        color: white !important;
      }

      .fa-android {
        background: #a4c639;
        color: white !important;
      }

      .fa-dribbble {
        background: #ea4c89;
        color: white !important;
      }

      .fa-vimeo {
        background: #45bbff;
        color: white !important;
      }

      .fa-tumblr {
        background: #2c4762;
        color: white !important;
      }

      .fa-vine {
        background: #00b489;
        color: white !important;
      }

      .fa-foursquare {
        background: #45bbff;
        color: white !important;
      }

      .fa-stumbleupon {
        background: #eb4924;
        color: white !important;
      }

      .fa-flickr {
        background: #f40083;
        color: white !important;
      }

      .fa-yahoo {
        background: #430297;
        color: white !important;
      }

      .fa-soundcloud {
        background: #ff5500;
        color: white !important;
      }

      .fa-reddit {
        background: #ff5700;
        color: white !important;
      }

      .fa-rss {
        background: #ff6600;
        color: white !important;
      }

      .fa-telegram {
        background: #0088CC;
        color: white !important;
      }


      .fa-whatsapp {
        background: #25D366;
        color: white !important;
      }


      .fa-snapchat {
        background: #FFFC00;
        color: white !important;
      }
    </style>
@endsection

@section('content')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
          
          
          <div class="row justify-content-center mt-5">
            <div class="col-md-8 text-center">
              <h1>{{ trans('contact.contact_us') }}</h1>
              <p class="mb-0">{{ trans('contact.contact_us_one') }}</p>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>  


  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7 mb-5"  data-aos="fade">

          

          <form class="p-5 bg-white">
            <div id="success-message"></div>

            <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label class="text-black" for="name">{{ trans('contact.name') }}</label>
                <input type="text" class="form-control name">
                <span class="name-contact-error invalid-feedback" role="alert"></span>
              </div>
              <div class="col-md-6">
                <label class="text-black" for="mobile">{{ trans('contact.mobile') }}</label>
                <input type="text" class="form-control mobile">
                <span class="mobile-contact-error invalid-feedback" role="alert"></span>
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">{{ trans('contact.email') }}</label> 
                <input type="email" class="form-control email">
                <span class="email-contact-error invalid-feedback" role="alert"></span>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="body">{{ trans('contact.message_content') }}</label> 
                <textarea name="message" class="form-control body" id="message" cols="30" rows="7" placeholder="{{ trans('contact.write_here') }}"></textarea>
                <span class="body-contact-error invalid-feedback" role="alert"></span> 
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2"></div>
              <div class="g-recaptcha" data-sitekey="6Lf61l0aAAAAADiZZM-lHkfmJzziMPU9GGn7rP_q"></div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" onclick="sendContact();return false;"  value="{{ trans('contact.send') }}" class="btn btn-primary py-2 px-4 text-white">
              </div>
            </div>


          </form>
        </div>
        <div class="col-md-5"  data-aos="fade" data-aos-delay="100">
          
          <div class="p-4 mb-3 bg-white">
            <p class="mb-0 font-weight-bold">{{ trans('auth.address') }}</p>
            <p class="mb-4">{{ $settings->address_ar }}</p>

            <p class="mb-0 font-weight-bold">{{ trans('auth.mobile') }}</p>
            <p class="mb-4"><a href="#">{{ $settings->telephone }}</a></p>

            <p class="mb-0 font-weight-bold">{{ trans('auth.email') }}</p>
            <p class="mb-0"><a href="#">{{ $settings->email }}</a></p>

          </div>
          
          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">{{ trans('contact.about') }}</h3>
            <p>{!! $settings->about_ar !!}</p>
            <p><a href="#" class="btn btn-primary px-4 py-2 text-white">{{ trans('contact.more') }}</a></p>
          </div>


          <div class="mb-3 bg-white">
            <a href="{{ $settings->facebook }}" target="_blank" class="fa the_fa fa-facebook"></a>
            <a href="{{ $settings->twitter }}" target="_blank" class="fa the_fa fa-instagram"></a>
            <a href="{{ $settings->telegram }}" target="_blank" class="fa the_fa fa-telegram"></a>
            <a href="{{ $settings->whatsapp }}" target="_blank" class="fa the_fa fa-whatsapp"></a>
            <a href="{{ $settings->snapchat }}" target="_blank" class="fa the_fa fa-snapchat"></a>
            <a href="{{ $settings->googleplus }}" target="_blank" class="fa the_fa fa-google"></a>
            <a href="{{ $settings->linkedin }}" target="_blank" class="fa the_fa fa-linkedin"></a>
            <a href="{{ $settings->youtube }}" target="_blank" class="fa the_fa fa-youtube"></a>
            {{--<a href="#" class="fa the_fa fa-instagram"></a>
            <a href="#" class="fa the_fa fa-pinterest"></a>
            <a href="#" class="fa the_fa fa-snapchat-ghost"></a>
            <a href="#" class="fa the_fa fa-skype"></a>
            <a href="#" class="fa the_fa fa-android"></a>
            <a href="#" class="fa the_fa fa-dribbble"></a>
            <a href="#" class="fa the_fa fa-vimeo"></a>
            <a href="#" class="fa the_fa fa-tumblr"></a>
            <a href="#" class="fa the_fa fa-vine"></a>
            <a href="#" class="fa the_fa fa-foursquare"></a>
            <a href="#" class="fa the_fa fa-stumbleupon"></a>
            <a href="#" class="fa the_fa fa-flickr"></a>
            <a href="#" class="fa the_fa fa-yahoo"></a>
            <a href="#" class="fa the_fa fa-reddit"></a>
            <a href="#" class="fa the_fa fa-rss"></a>--}}
          </div>

        </div>
      </div>
    </div>
  </div>

 
@endsection



@section('footer')


 <script>
  window.form_data = new FormData();


function sendContact(){
    form_data.append('name', $(".name").val())
    form_data.append('mobile', $(".mobile").val())
    form_data.append('email', $(".email").val())
    form_data.append('body', $(".body").val())

    $(".name").removeClass('is-invalid');
    $(".email").removeClass('is-invalid');
    $(".mobile").removeClass('is-invalid');
    $(".body").removeClass('is-invalid');


    axios.post('../../sendcontact', form_data)
                .then((data) => {

                    $(".name").val('');
                    $(".mobile").val('');
                    $(".email").val('');
                    $(".body").val('');


                    $(".name").removeClass('is-invalid');
                    $(".email").removeClass('is-invalid');
                    $(".mobile").removeClass('is-invalid');
                    $(".body").removeClass('is-invalid');


                    $('.name-contact-error').empty();
                    $('.body-contact-error').empty();
                    $('.mobile-contact-error').empty();
                    $('.email-contact-error').empty();


                    $('#success-message').append('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>تم الإرسال!</strong> الرسالة قد تم إرسالها بنجاح!</div></div>');
                    setTimeout(() => {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove() 
                        });
                    }, 2000);
                }).catch((error) => {

                    $('.name-contact-error').empty();
                    $('.body-contact-error').empty();
                    $('.mobile-contact-error').empty();
                    $('.email-contact-error').empty();

                    
                if(error.response.data.errors.name){
                    $('.name-contact-error').append('<strong>'+error.response.data.errors.name+'</strong>');
                    $('.name').addClass('is-invalid')
                }
                if(error.response.data.errors.email){
                    $('.email-contact-error').append('<strong>'+error.response.data.errors.email+'</strong>');
                    $('.email').addClass('is-invalid')
                }
                if(error.response.data.errors.mobile){
                    $('.mobile-contact-error').append('<strong>'+error.response.data.errors.mobile+'</strong>');
                    $('.mobile').addClass('is-invalid')
                }
                if(error.response.data.errors.body){
                    $('.body-contact-error').append('<strong>'+error.response.data.errors.body+'</strong>');
                    $('.body').addClass('is-invalid')
                }
                });

}

 
 
 </script>
    
@endsection
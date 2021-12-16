@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


                <div class="card">
                    <div class="card-header"> <h5 class="text-center">إسم الموقع</h5> </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name_ar" class="col-md-2 col-form-label text-md-right">إسم الموقع باللغة العربية</label>
    
                                <div class="col-md-10">
                                    <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $settings->name_ar }}" required autocomplete="name_ar" autofocus>
    
                                    @error('name_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="form-group row">
                                <label for="name_en" class="col-md-2 col-form-label text-md-right">إسم الموقع باللغة الإنجليزية</label>
    
                                <div class="col-md-10">
                                    <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ $settings->name_en }}" required autocomplete="name_en" autofocus>
    
                                    @error('name_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    تغيير الإسم
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header"><h5 class="text-center">بيانات التواصل</h5></div>

                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                        @csrf
                        @method('PATCH')


                        <div class="form-group row">
                            <label for="telephone" class="col-md-2 col-form-label text-md-right">رقم التليفون</label>

                            <div class="col-md-10">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ $settings->telephone }}" required autocomplete="telephone">

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    


                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">البريد الإلكترونى</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $settings->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                تعديل بيانات التواصل
                            </button>
                        </form>

                        </div>

                    </div>

                </div>

                <div class="card">
                    <div class="card-header"><h5 class="text-center">اختيار تصنيف لعرض المنتجات للموقع</h5></div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                            @csrf
                            @method('PATCH')

                        <div class="container">
                            <div class="row">
                               @foreach ($categories as $category)
                                   <div class="form-group">
                                        <label for="category_name">{{ $category->name_ar }}</label>
                                        <input type="checkbox" name="category_ids_main_page_app[]" id="category_ids_main_page_app" value="{{ $category->id }}" 
                                        
                                        
                                        @if(in_array($category->id, json_decode($settings->category_ids_main_page_app)))  
                                            checked 
                                        @endif
                                        
                                        >

                                        &nbsp;&nbsp;
                                   </div>
                                @endforeach                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                تعديل بيانات التواصل
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                            
                   

                <div class="card">
                    <div class="card-header"><h5 class="text-center">عن الموقع وبيانات التواصل الإجتماعى</h5></div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="about_ar" class="col-md-2 col-form-label text-md-right">عن الموقع</label>
    
                                <div class="col-md-10">
                                    <textarea name="about_ar" id="about_ar" class="form-control @error('about_ar') is-invalid @enderror textarea" cols="30" rows="10" required autocompleted="about_ar">{{ $settings->about_ar }}</textarea>
    
                                    @error('about_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="about_en" class="col-md-2 col-form-label text-md-right">عن الموقع</label>
    
                                <div class="col-md-10">
                                    <textarea name="about_en" id="about_en" class="form-control @error('about_en') is-invalid @enderror textarea" cols="30" rows="10" required autocompleted="about_en">{{ $settings->about_en }}</textarea>
    
                                    @error('about_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook" class="col-md-2 col-form-label text-md-right">{{ __('Facebook') }}</label>

                                <div class="col-md-10">
                                    <input id="facebook" type="url" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $settings->facebook }}" required autocomplete="facebook" autofocus>

                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="googleplus" class="col-md-2 col-form-label text-md-right">{{ __('googleplus') }}</label>

                                <div class="col-md-10">
                                    <input id="googleplus" type="url" class="form-control @error('googleplus') is-invalid @enderror" name="googleplus" value="{{ $settings->googleplus }}" required autocomplete="googleplus" autofocus>

                                    @error('googleplus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="youtube" class="col-md-2 col-form-label text-md-right">{{ __('youtube') }}</label>

                                <div class="col-md-10">
                                    <input id="youtube" type="url" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ $settings->youtube }}" required autocomplete="youtube" autofocus>

                                    @error('youtube')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="twitter" class="col-md-2 col-form-label text-md-right">{{ __('instagram') }}</label>

                                <div class="col-md-10">
                                    <input id="twitter" type="url" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $settings->twitter }}" required autocomplete="twitter" autofocus>

                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="telegram" class="col-md-2 col-form-label text-md-right">{{ __('telegram') }}</label>

                                <div class="col-md-10">
                                    <input id="telegram" type="url" class="form-control @error('telegram') is-invalid @enderror" name="telegram" value="{{ $settings->telegram }}" required autocomplete="telegram" autofocus>

                                    @error('telegram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="whatsapp" class="col-md-2 col-form-label text-md-right">{{ __('whatsapp') }}</label>

                                <div class="col-md-10">
                                    <input id="whatsapp" type="url" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ $settings->whatsapp }}" required autocomplete="whatsapp" autofocus>

                                    @error('whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="snapchat" class="col-md-2 col-form-label text-md-right">{{ __('snapchat') }}</label>

                                <div class="col-md-10">
                                    <input id="snapchat" type="url" class="form-control @error('snapchat') is-invalid @enderror" name="snapchat" value="{{ $settings->snapchat }}" required autocomplete="snapchat" autofocus>

                                    @error('snapchat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="linkedin" class="col-md-2 col-form-label text-md-right">{{ __('linkedin') }}</label>

                                <div class="col-md-10">
                                    <input id="linkedin" type="url" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ $settings->linkedin }}" required autocomplete="linkedin" autofocus>

                                    @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    تعديل بيانات عن الموقع وبيانات مواقع التواصل الإجتماعى
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h5 class="text-center">روابط التطبيق على متاجر الجوال</h5></div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="play_store" class="col-md-2 col-form-label text-md-right">{{ __('play store') }}</label>

                                <div class="col-md-10">
                                    <input id="play_store" type="url" class="form-control @error('play_store') is-invalid @enderror" name="play_store" value="{{ $settings->play_store }}" required autocomplete="play_store" autofocus>

                                    @error('play_store')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="app_store" class="col-md-2 col-form-label text-md-right">{{ __('app store') }}</label>

                                <div class="col-md-10">
                                    <input id="app_store" type="url" class="form-control @error('app_store') is-invalid @enderror" name="app_store" value="{{ $settings->app_store }}" required autocomplete="app_store" autofocus>

                                    @error('app_store')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="microsoft_store" class="col-md-2 col-form-label text-md-right">{{ __('microsoft store') }}</label>

                                <div class="col-md-10">
                                    <input id="microsoft_store" type="url" class="form-control @error('microsoft_store') is-invalid @enderror" name="microsoft_store" value="{{ $settings->microsoft_store }}" required autocomplete="microsoft_store" autofocus>

                                    @error('microsoft_store')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    تعديل روابط التطبيق على متاجر الجوال
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


                {{--<div class="card">

                    <div class="card-header"><h5 class="text-center">بيانات الربط مع الAPI</h5></div>

                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                            @csrf
                            @method('PATCH')

                        <div class="form-group row">
                            <label for="root_api" class="col-md-2 col-form-label text-md-right">رابط الapi</label>

                            <div class="col-md-10">
                                <input id="root_api" type="text" class="form-control @error('root_api') is-invalid @enderror" name="root_api" value="{{ $settings->root_api }}" required autocomplete="root_api">

                                @error('root_api')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="root_img_path" class="col-md-2 col-form-label text-md-right">الرابط الاساسى للصورة</label>

                            <div class="col-md-10">
                                <input id="root_img_path" type="text" class="form-control @error('root_img_path') is-invalid @enderror" name="root_img_path" value="{{ $settings->root_img_path }}" required autocomplete="root_img_path">

                                @error('root_img_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="root_username" class="col-md-2 col-form-label text-md-right">اسم المستخدم</label>

                            <div class="col-md-10">
                                <input id="root_username" type="text" class="form-control @error('root_username') is-invalid @enderror" name="root_username" value="{{ $settings->root_username }}" required autocomplete="root_username">

                                @error('root_username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="root_password" class="col-md-2 col-form-label text-md-right">كلمة المرور</label>

                            <div class="col-md-10">
                                <input id="root_password" type="text" class="form-control @error('root_password') is-invalid @enderror" name="root_password" value="{{ $settings->root_password }}" required autocomplete="root_password">

                                @error('root_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                تعديل بيانات الربط
                            </button>
                        </form>

                        </div>

                    </div>

                </div>--}}



                <div class="card">

                    <div class="card-header"><h5 class="text-center">صور الإعلانات</h5></div>

                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('settings.update', $settings->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')


                        <div class="form-group row">

                            <img src="{{ $settings->first_img_path }}" width="50%" alt="" srcset="">

                            <label for="the_first_image" class="col-md-2 col-form-label text-md-right">الصورة الأولى</label>

                            <div class="col-md-10">
                                <input id="the_first_image" type="file" class="form-control @error('the_first_image') is-invalid @enderror" name="the_first_image" required autocomplete="the_first_image">

                                @error('the_first_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">

                            <img src="{{ $settings->second_img_path }}" width="50%" alt="" srcset="">

                            <label for="the_second_image" class="col-md-2 col-form-label text-md-right">الصورة الثانية</label>

                            <div class="col-md-10">
                                <input id="the_second_image" type="file" class="form-control @error('the_second_image') is-invalid @enderror" name="the_second_image" required autocomplete="the_second_image">

                                @error('the_second_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                تعديل صور الإعلانات 
                            </button>
                        </form>

                        </div>

                    </div>

                </div>



                <div class="card">

                    <div class="card-header"><h5 class="text-center">بيانات اخرى</h5></div>

                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                        @csrf
                        @method('PATCH')


                        <div class="form-group row">
                            <label for="vat" class="col-md-2 col-form-label text-md-right">ضريبة اليمة المضافة</label>

                            <div class="col-md-10">
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ $settings->vat }}" required autocomplete="vat">

                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="currency" class="col-md-2 col-form-label text-md-right">الوحدة</label>

                            <div class="col-md-10">
                                <input id="currency" type="text" class="form-control @error('currency') is-invalid @enderror" name="currency" value="{{ $settings->currency }}" required autocomplete="currency">

                                @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                تعديل بيانات اخرى
                            </button>
                        </form>

                        </div>

                    </div>

                </div>

       
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script>


        window.form_data = new FormData();

       
        function changeIcon(id){
            let file_data = $(`#image_${id}`).prop('files')[0];
            form_data.append('file_data', file_data);
            form_data.append('icon_id', $(`#icon_id_${id}`).val());
            

            axios.post('../../../admin/icons/settings', form_data)
            .then((data) => {
                location.reload();
                                      
            }).catch((error) => {

            
            
            });
        
        }
    </script>
   
@endsection
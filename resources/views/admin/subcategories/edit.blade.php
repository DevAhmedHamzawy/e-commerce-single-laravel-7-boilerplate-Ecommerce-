@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header text-center">التعديل على التصنيف الفرعى {{ $subcategory->name }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('subcategories.update' , [$category->slug , $subcategory->slug]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')


                        <div class="col-md-12" id="the_icon">
                            <img src="{{ $subcategory->img_path }}" class="the_image_changing"  onclick="document.getElementById('image').click()" alt="Cinque Terre">
                            <h5 class="text-center" style="margin-top: -15px;">إرفع صورة من هنا</h5>
                            <input  style="display: none;"  id="image" type="file" name="main_image">
                        </div>
                        <br>
                        
                        <div class="form-group row">
                            <label for="name_ar" class="col-md-2 col-form-label text-md-right">الإسم باللغة العربية</label>

                            <div class="col-md-10">
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $subcategory->name_ar }}" required autocomplete="name_ar" autofocus>

                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name_en" class="col-md-2 col-form-label text-md-right">الإسم باللغة الإنجليزية</label>

                            <div class="col-md-10">
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ $subcategory->name_en }}" required autocomplete="name_en" autofocus>

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description_ar" class="col-md-2 col-form-label text-md-right">الوصف باللغة العربية</label>

                            <div class="col-md-10">
                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror" cols="30" rows="10">{{ $subcategory->description_ar }}</textarea>

                                @error('description_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description_en" class="col-md-2 col-form-label text-md-right">الوصف باللغة الإنجليزية</label>

                            <div class="col-md-10">
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" cols="30" rows="10">{{ $subcategory->description_en }}</textarea>

                                @error('description_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="show" class="col-md-2 col-form-label text-md-right">نوع العرض</label>

                            <div class="col-md-10">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="show" id="inlineRadio1" value="blocks" @if($subcategory->show == 'blocks') checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">blocks</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="show" id="inlineRadio2" value="tabs" @if($subcategory->show == 'tabs') checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">tabs</label>
                                </div>

                                @error('show')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        

                        <div class="form-group row">

                            <label for="options" class="col-md-2 col-form-label text-md-right">تحديد الإختيارات</label>

                            @foreach ($options as $option)
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="options[]" @if (in_array($option->id, $categoryOptionsIds)) checked @endif id="inlineRadio1" value="{{ $option->id }}">
                                    <label class="form-check-label" for="inlineRadio1">{{ $option->name_ar }}</label>
                                </div>

                            @endforeach

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    تعديل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script>
         function changeImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('.the_image_changing').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image").change(function() {
            changeImage(this);
        });
    </script>
@endsection
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="text-center">التعديل على الصفحة</h4></div>

                <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-info'}}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pages.update', $page->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf


                        
                    
                    

                        <div class="form-group row">
                            <label for="name_ar" class="col-md-2 col-form-label text-md-right">الإسم باللغة العربية</label>

                            <div class="col-md-10">
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $page->name_ar }}" required autocomplete="name_ar" autofocus>

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
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ $page->name_en }}" required autocomplete="name_en" autofocus>

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="position" class="col-md-2 col-form-label text-md-right">الترتيب</label>

                            <div class="col-md-10">

                                <select name="position" id="position"  class="form-control @error('position') is-invalid @enderror">
                                
                                    <option selected disables>اختر الترتيب</option>
                                    @for ($i = 0; $i < $pagesCount; $i++)

                                        <option @if($page->position == $i) selected @endif>{{ $i }}</option>

                                    @endfor


                                </select>
                              

                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description_ar" class="col-md-2 col-form-label text-md-right">الوصف باللغة العربية</label>

                            <div class="col-md-10">
                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror" cols="30" rows="10">{{ $page->description_ar }}</textarea>

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
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" cols="30" rows="10">{{ $page->description_en }}</textarea>

                                @error('description_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     
    
                

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                التعديل على الصفحة
                            </button>
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
                $('.rounded-circle').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image").change(function() {
            changeImage(this);
        });
    </script>
    
@endsection
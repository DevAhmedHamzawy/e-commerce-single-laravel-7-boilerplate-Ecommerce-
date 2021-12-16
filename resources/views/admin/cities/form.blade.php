@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header text-center">
                    @if($action == 'post')  إضافة مدينة جديدة @else  التعديل على بيانات المدينة {{ $city->name_ar }}   @endif
                </h2>

                <div class="card-body">
                    <form method="POST" action="{{ $action == 'post' ? route('cities.store') : route('cities.update', $city->name_ar) }}" enctype="multipart/form-data">
                        @if ($action != 'post') @method('PUT')  @endif
                        @csrf

                        <div class="form-group row">
                            <label for="name_ar" class="col-md-2 col-form-label text-md-right">الإسم</label>

                            <div class="col-md-10">
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ $action == 'post' ?  old('name_ar') : $city->name_ar }}">

                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_en" class="col-md-2 col-form-label text-md-right">الإسم</label>

                            <div class="col-md-10">
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ $action == 'post' ?  old('name_en') : $city->name_en }}">

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="shipping_cost" class="col-md-2 col-form-label text-md-right">تكلفة الشحن</label>

                            <div class="col-md-10">
                                <input id="shipping_cost" type="number" class="form-control @error('shipping_cost') is-invalid @enderror" name="shipping_cost" value="{{ $action == 'post' ?  old('shipping_cost') : $city->shipping_cost }}">

                                @error('shipping_cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    @if($action == 'post')  إضافة مدينة جديدة @else  التعديل على بيانات المدينة {{ $city->name }}   @endif
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
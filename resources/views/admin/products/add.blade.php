@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header text-center">إضافة منتج جديد</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="col-md-12" id="the_icon">
                            <img src="{{ url('public/admin/panel/img/upload.png') }}" class="the_image_changing"  onclick="document.getElementById('image').click()" alt="Cinque Terre">
                            <h5 class="text-center" style="margin-top: -15px;">إرفع صورة من هنا</h5>
                            <input  style="display: none;"  id="image" type="file" name="main_image">
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="subcategories" class="col-md-2 col-form-label text-md-right">التصنيفات</label>
                        
                            <div class="col-md-10">
                                <select  onchange="getSubCategories(this);" class="form-control">

                                    <option value="">اختر التصنيف ...</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="subcategories" class="col-md-2 col-form-label text-md-right">فروع التصنيفات</label>
                        
                            <div class="col-md-10">
                                

                                <select class="category_id form-control" name="category_id" id="category_id"></select>
                                

                                </select>

                               

                                @error('category_id')
                                    <span class="invalid-feedback" country="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-2 col-form-label text-md-right">الكود</label>

                            <div class="col-md-10">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name_ar" class="col-md-2 col-form-label text-md-right">الإسم باللغة العربية</label>

                            <div class="col-md-10">
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}" required autocomplete="name_ar" autofocus>

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
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name_en') }}" required autocomplete="name_en" autofocus>

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        
                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">السعر</label>

                            <div class="col-md-10">
                                <input id="price" type="number" step="any" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="discount" class="col-md-2 col-form-label text-md-right">السعر بعد الخصم</label>

                            <div class="col-md-10">
                                <input id="discount" type="number" step="any" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}" autocomplete="discount" autofocus>

                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="brief_description_ar" class="col-md-2 col-form-label text-md-right">الوصف المختصر باللغة العربية</label>

                            <div class="col-md-10">
                                <textarea name="brief_description_ar" id="brief_description_ar" class="form-control mceNoEditor @error('brief_description_ar') is-invalid @enderror textarea" cols="30" rows="10">{{ old('brief_description_ar') }}</textarea>

                                @error('brief_description_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description_ar" class="col-md-2 col-form-label text-md-right">الوصف باللغة العربية</label>

                            <div class="col-md-10">
                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror textarea" cols="30" rows="10">{{ old('description_ar') }}</textarea>

                                @error('description_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="brief_description_en" class="col-md-2 col-form-label text-md-right">الوصف المختصر باللغة الإنجليزية</label>

                            <div class="col-md-10">
                                <textarea name="brief_description_en" id="brief_description_en" class="form-control mceNoEditor @error('brief_description_en') is-invalid @enderror textarea" cols="30" rows="10">{{ old('brief_description_en') }}</textarea>

                                @error('brief_description_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description_en" class="col-md-2 col-form-label text-md-right">الوصف باللغة الإنجليزية</label>

                            <div class="col-md-10">
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror textarea" cols="30" rows="10">{{ old('description_en') }}</textarea>

                                @error('description_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="visible" class="col-md-3 col-form-label text-md-right">أضف صور</label>

                            <div class="col-md-9">
                                <input type="file" name="the_attachment[]" id="upload_file1"/>
                                <div id="moreImageUpload"></div>
                                <div class="clear"></div>
                                <div id="moreImageUploadLink" style="display:none;margin-left: 10px;">
                                    <a href="javascript:void(0);" id="attachMore">إضافة صورة اخرى</a>
                                </div>

                            </div>
                        </div>


                        <div class="the_options_one">

                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    إضافة
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
        function getSubCategories(item){
            axios.get('../../list_subcategories/'+item.value)
                .then((data) => {
                $('#category_id').empty();
                $('#category_id').append('<option value="">اختر التصنيف ...</option>');
                for(subcategory of data.data){
                $('#category_id').append('<option value="'+subcategory.id+'">'+subcategory.name_ar+'</option>')
                }  
            })
        }

        $('#category_id').on("change", function() {
            getOptions(this);
        });


        function getOptions(item){
            axios.get('../../list_options/'+item.value)
                .then((data) => { 
                    $('.the_options_one').empty();
                    $('.the_options_one').append('<label for="description" class="col-md-12 col-form-label text-md-right"><h2 class="text-center">الإختيارات</h2></label>');

                    for(option of data.data){
                        //$('.the_options_one').append('<div class="row">');
                        $('.the_options_one').append('<div class="form-check form-check-inline"><h3><input class="form-check-input" type="checkbox" name="options[]" id="inlineRadio1" value="'+option.id+'"><label class="form-check-label" for="inlineRadio1">'+option.name_ar+'</label></h3></div><br>');
                        //$('.the_options_one').append('</div>');
                            let options_ar = [];
                            options_ar = JSON.parse(option.options_ar);
                            //console.log(options_ar[0]);
                        for(var i = 0; i < options_ar.length; i++){
                            console.log(options_ar[i]);
                            //$('.the_options_one').append('<div class="row">');
                            $('.the_options_one').append('<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="the_other_options['+option.id+'][]" id="inlineRadio1" value="'+i+'"><label class="form-check-label" for="inlineRadio1">'+options_ar[i]+'</label></div>');
                            //$('.the_options_one').append('</div>');
                        }

                        $('.the_options_one').append('<br>');
                    }
                 })
        }


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

    
    $(document).ready(function() {
		$("input[id^='upload_file']").each(function() {
			var id = parseInt(this.id.replace("upload_file", ""));
			$("#upload_file" + id).change(function() {
				if ($("#upload_file" + id).val() != "") {
					$("#moreImageUploadLink").show();
				}
			});
		});
	});
	

    $(document).ready(function() {
		var upload_number = 2;
		$('#attachMore').click(function() {
			//add more file
			var moreUploadTag = '';
			moreUploadTag += '<div class="element"><label for="upload_file"' + upload_number + '>Upload File ' + upload_number + '</label>';
			moreUploadTag += '<input type="file" id="upload_file' + upload_number + '" name="the_attachment[]"/>';
			moreUploadTag += ' <a href="javascript:del_file(' + upload_number + ')" style="cursor:pointer;" onclick="return confirm("Are you really want to delete ?")">Delete ' + upload_number + '</a></div>';
			$('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreImageUpload');
			upload_number++;
		});
	});
	
	function del_file(eleId) {
		var ele = document.getElementById("delete_file" + eleId);
		ele.parentNode.removeChild(ele);
	}

    </script>
@endsection
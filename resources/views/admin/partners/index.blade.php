@extends('admin.layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                       <h5 class="text-center">
                           الشركاء
                       </h5>
                  </div>

                    <div class="card-body">

                        @if(session()->has('message'))
                            <div class="alert {{session('alert') ?? 'alert-info'}}">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="row justify-content-center">
                                @foreach ($partners as $partner)
                                    <div class="col-md-3" id="the_partner_{{ $partner->id }}">
                                        <img src="{{ $partner->img_path }}" style="width:60px;height:60px;margin: 16px 38%;background-color: black;" class="rounded-circle" onclick="document.getElementById('image_{!! $partner->id !!}').click()" alt="Cinque Terre">
                                        <h5 class="text-center">{{ $partner->name }}</h5>
                                        <input onchange="changeIcon({{ $partner->id }})" style="display: none;"  id="image_{{ $partner->id }}" type="file" name="image">
                                        <input type="hidden" id="partner_id_{{ $partner->id }}" value="{{ $partner->id }}">
                                        <a href="{{ route("partners.delete", $partner->id) }}" class="delete btn btn-danger btn-sm col-md-12">حذف</a>
                                    </div>
                                @endforeach
                            </div>
                            <br><br><br><br><br>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info btn-lg col-md-12" data-toggle="modal" data-target="#myModal">إضافة</button>
                        </div>


                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{ route('partners.store') }}" enctype="multipart/form-data">
                                        @csrf

                                    <div class="col-md-12" id="the_icon">
                                        <img src="{{ url('public/admin/panel/img/upload.png') }}" style="width:60px;height:60px;margin: 16px 45%;background-color: black;" class="rounded-circle" onclick="document.getElementById('image').click()" alt="Cinque Terre">
                                        <h5 class="text-center">إرفع صورة من هنا</h5>
                                        <input  style="display: none;"  id="image" type="file" name="the_image">
                                    </div>


                                    <div class="form-group row mb-0">
                                        <button type="submit" class="btn btn-primary col-md-12">
                                            إضافة  
                                        </button>
                                    </div>

                                    </form>




                                </div>
                                
                            </div>
                        
                            </div>
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
            form_data.append('partner_id', $(`#partner_id_${id}`).val());
            

            axios.post('../../partners', form_data)
            .then((data) => {
                location.reload();
                                      
            }).catch((error) => {

            
            
            });
        
        }



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
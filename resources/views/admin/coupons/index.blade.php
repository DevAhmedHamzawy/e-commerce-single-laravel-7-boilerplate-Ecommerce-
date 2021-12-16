@extends('admin.layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        العروض
                        <div style="float:left">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">إضافة</button>

                        </div>
                    </div>

                    <div class="card-body">

                        @if(session()->has('message'))
                            <div class="alert {{session('alert') ?? 'alert-info'}}">
                                {{ session('message') }}
                            </div>
                        @endif

                  
                                <table class="table  data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">الإسم</th>
                                            <th scope="col">المدة</th>
                                            <th scope="col">نسبة الخصم</th>
                                            <th scope="col">العمليات</th>
                                        </tr>
                                    </thead> 
                                </table>
                           


                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{ route('coupons.store') }}" enctype="multipart/form-data">
                                        @csrf


                                    <div class="col-md-12">
                                        <input type="text" name="name" placeholder="الإسم" class="form-control" id="">
                                        <br>
                                        <input type="number" name="duration" placeholder="المدة" class="form-control" id="">
                                        <br>
                                        <input type="number" name="discount" step="any" placeholder="نسبة الخصم" class="form-control" id="">
                                        
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
        

        $(function () {
    
    var scroll_x=false;
    if($( window ).width()<=750) {
        scroll_x=true
    }
    var table = $('.data-table').DataTable({
         processing: true,
        serverSide: true,
        'scrollX': scroll_x,
        
        ajax: "{{ route('coupons.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'duration', name: 'duration'},
            {data: 'discount', name: 'discount'},
            {data: 'actiontwo', name: 'actiontwo', orderable: false, searchable: false},
        ],
        dom: 'lBfrtip',
    });
    
  });


  $.fn.dataTable.ext.errMode = 'none';

    


    </script>

    <script>


        window.form_data = new FormData();

       
        function changeIcon(id){
            let file_data = $(`#image_${id}`).prop('files')[0];
            form_data.append('file_data', file_data);
            form_data.append('slider_id', $(`#slider_id_${id}`).val());
            

            axios.post('../../public/sliders', form_data)
            .then((data) => {
                location.reload();
                                      
            }).catch((error) => {

            
            
            });
        
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
    </script>
   
@endsection
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                       التصنيفات الفرعيه ل {{ $category->name_ar }}

                    <div style="float:left">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('subcategories.create', $category->slug) }}" style="color:#fff;">إضافة تصنيف فرعى جديد</a>
                        </button>  
                    </div>
                </h3>

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
                                <th scope="col">رقم</th>
                                <th scope="col">الإسم</th>
                                <th scope="col">العمليات</th>
                                <th scope="col">العمليات</th>
                                <th scope="col">العروض</th>
                            </tr>
                        </thead>
                          
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script type="text/javascript">

$(function () {
    
    var scroll_x=false;
    if($( window ).width()<=750) {
        scroll_x=true
    }
    var table = $('.data-table').DataTable({
         processing: true,
        serverSide: true,
        'scrollX': scroll_x,
        responsive: true,
        
        
        ajax: "{{ route('subcategories.index', Request::segment(3)) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id'},
            {data: 'name_ar', name: 'name_ar'},
            {data: 'actionone', name: 'actionone', orderable: false, searchable: false},
            {data: 'actiontwo', name: 'actiontwo', orderable: false, searchable: false},
            {data: 'actionthree', name: 'actionthree', orderable: false, searchable: false},
        ],
        dom: 'lBfrtip',
    });
    
  });


  $.fn.dataTable.ext.errMode = 'none';

    

    </script>
@endsection
@extends('main.layouts.app')

@section('content')

<!-- ====================== start cart =========================== -->
 <div class="title">
    <h4>
       <span>
        تفاصيل الطلب  
       </span>
    </h4>


</div>



@include('main.profile.orders.includes.order_header')
@include('main.profile.orders.includes.order_items')
@include('main.profile.orders.includes.order_footer')



    <!-- ==================== end cart =================================== -->

@endsection
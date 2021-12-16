@extends('main.layouts.app')

@section('content')
    <!-- ====================== start cart =========================== -->
<div class="title">
    <h4>
       <span>
        {{ trans('cart.cart_purchases') }}  
       </span>
    </h4>

</div>

<div class="container-fluid content">
    <div class="row">
        
        @include('main.cart.includes.cart')

        @include('main.cart.includes.cart_products')

    </div>

</div>



    <!-- ==================== end cart =================================== -->


@endsection


@section('footer')
    

    <script>
            function updateQty(rowId, qty){
                axios.post('update_cart', {rowId: rowId.value, qty: qty.value})
                    .then((data) => {
                       location.reload();
                    })
            }
           
    </script>


@endsection
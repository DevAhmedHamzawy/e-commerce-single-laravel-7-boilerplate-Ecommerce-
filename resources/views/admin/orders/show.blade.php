@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"> تـــفـــاصـــيــــل الــــطـــــلــــب رقــــــم {{ $order->id }}</h4>
                </div>

                <div class="container">
                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-3">رقم العميل</h5>
                        <div class="col-md-3">{{ $order->user->id ?? $order->user_id }}</div>
                        <h5 class="col-md-3">العميل</h5>
                        <div class="col-md-3">{{ $order->user->name ?? \App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->name  }}</div>
                    </div>
                    <br>
                    {{--<div class="row justify-content-center text-center">
                        <h5 class="col-md-6">ضريبة القيمة المضافة</h5>
                        <div class="col-md-6">{{ $order->vat_rate }}</div>
                    </div>
                    
                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">حساب الضريبة الكلية للطلب</h5>
                        <div class="col-md-6">{{ $order->vat }}</div>
                    </div>--}}



                   

                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">السعر الصافى</h5>
                        <div class="col-md-6">{{ $order->sub_total }}</div>
                    </div>
                    
                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">السعر الكلى</h5>
                        <div class="col-md-6">{{ $order->total }}</div>
                    </div>

                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">حاله الطلب</h5>
                        <div class="col-md-6">{{ $order->status }}</div>
                    </div>
                    

                    <h1 class="text-center">مـــعــــلـــومــــات الــــشــــحــــن</h1>

                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">الإسم</h5>
                        <div class="col-md-6">{{ $order->user->latestShippingAddress->name ?? 'غير محدد' }}</div>
                    </div>
                    
                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">البريد الإلكترونى</h5>
                        <div class="col-md-6">{{ $order->user->latestShippingAddress->email ?? 'غير محدد' }}</div>
                    </div>

                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">العنوان</h5>
                        <div class="col-md-6">{{ $order->user->latestShippingAddress->address ?? 'غير محدد' }}</div>
                    </div>
                    
                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">التليفون</h5>
                        <div class="col-md-6">{{ $order->user->latestShippingAddress->telephone ?? 'غير محدد' }}</div>
                    </div>

                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">العنوان</h5>
                        <div class="col-md-6">{{ $order->user->latestShippingAddress->address ?? 'غير محدد' }}</div>
                    </div>

                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">المدينة</h5>
                        <div class="col-md-6">{{ \App\City::find($order->user->latestShippingAddress->city_id)->name_ar ?? 'غير محدد' }}</div>
                    </div>

                    <div class="row justify-content-center text-center">
                        <h5 class="col-md-6">النوع</h5>
                        <div class="col-md-6">{{ $order->sort }}</div>
                    </div>
                  
                    
                    
                </div>


                <table class="table border-top-0">
                    <thead>
                      <tr>
                        <th>المنتجات</th>
                        <th>الكمية</th>
                        <th>الاختيارات</td>
                        <th>السعر</td>
                      </tr>
                    </thead>
                    <tbody>

                      @php $totalOriginalPrice = 0; @endphp  
                      @foreach ($order->items as $item)
                      <tr>
                        <td>{{ $item->product->name_ar ?? 'منتج' }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>@if($item->options == 0) @else {{ $item->options }} @endif</td>
                        <td>
                            @if($item->product->discount != null) 
                            <del>{{ $item->product->price * $item->qty }}</del> 
                            <br>
                            {{ $item->product->discount * $item->qty }} 
                            @else 
                                {{ $item->product->price * $item->qty  }} 
                            @endif       
                        </td>
                                
                      </tr>
                      @php $totalOriginalPrice +=  $item->product->discount != null ? $item->product->discount * $item->qty : $item->product->price * $item->qty @endphp
                      @endforeach
                      


                      <tr>
                        <td>المجموع</td>
                        <td></td>
                        <td></td>
                        <td>{{ $totalOriginalPrice }}</td>
                      </tr>


                      <tr>
                        <td> + تكلفة التوصيل</td>
                        <td></td>
                        <td></td>
                        <td> + {{ \App\City::find(\App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->city_id)->shipping_cost }}</td>
                      </tr>


                      


                      <tr>
                          <td>الإجمالي</td>
                          <td></td>
                          <td></td>
                          <td>{{ ($totalOriginalPrice +  \App\City::find(\App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->city_id)->shipping_cost) }}</td>
                      </tr>



                      @if(abs(($totalOriginalPrice +  \App\City::find(\App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->city_id)->shipping_cost) - $order->total) > 0)
                        <tr>
                            <td> - الخصم</td>
                            <td></td>
                            <td></td>
                            <td> - {{ abs(($totalOriginalPrice +  \App\City::find(\App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->city_id)->shipping_cost) - $order->total) }}</td>
                        </tr>

                        <tr>
                            <td> السعر بعد الخصم</td>
                            <td></td>
                            <td></td>
                            <td> {{  ($totalOriginalPrice +  \App\City::find(\App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->city_id)->shipping_cost) - abs(($totalOriginalPrice +  \App\City::find(\App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->city_id)->shipping_cost) - $order->total) }}</td>
                        </tr>
                       @endif
                      
                     
                     
                    </tbody>
                  </table>
              

                  <div class="col-md-12">
                      <div class="btn btn-primary col-md-12">
                          <a href="{{ route('invoice', $order->id) }}" target="_blank" style="color: #fff;">
                            مــــــشـــــاهـــــدة الـــــفــــاتــــــورة
                          </a>
                      </div>
                  </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
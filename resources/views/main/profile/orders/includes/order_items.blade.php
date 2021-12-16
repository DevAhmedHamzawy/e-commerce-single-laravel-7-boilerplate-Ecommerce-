<div class="borderthree">
    {{--<div class="row">
       <div class="col-6">
           <p>
               شحنة  من 
   
           </p>
           <span>
               تم استلامها
           </span>
           <p>
               
           </p>
   
          </div>
          <div class="col-4">
           <p>
               الشحن من خلال 
               <img src="images/logo.png" class="img-fluid" alt="">
   

               <br>
               رقم بوليصة الشحن : 25684545674612
           </p>
         
          
   
          </div>
          <div class="col-2">
           <a href="">
               تتبع الشحنة
           </a>
          
           <p>
               
           </p>
   
          </div>

    </div>--}}
    <div class="row">
        <div class="pro_cart lastdata">

            @foreach ($order->items as $item)

            <div class="row" style="margin-right: 0;">
               <div class="col-md-8">
                <img src="{{ $item->product->img_path }}" class="img-fluid" alt="">
                

             
                <h4>
                    {{ $item->product->name_ar }}  
                 <br>
                 <p>
                  {{ trans('cart.qty') }} :   {{ $item->qty }}
              </p>
                </h4>
               </div>
                   
                     
                      <div class="col-md-4">
                        <p class="ppro">
                            {{ $item->the_price }}
                        </p>

                      </div>

                      
               

            </div>

            @endforeach

        </div>

    </div>

    
 </div>
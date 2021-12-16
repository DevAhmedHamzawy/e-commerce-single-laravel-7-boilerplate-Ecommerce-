<!-- Brands -->

    <section class="brands container">
        <div class="row">
          <ul id="rcbrand2">
          @foreach ($partners as $partner)
          
            <li><img src="{{ $partner->img_path }}"></li>
        
          @endforeach
          </ul>
          
        </div>
      </section>
  
      <!-- Brands -->
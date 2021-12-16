<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown" style="font-size: 15px;">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @switch($locale)
                @case('ar')
                <img src="{{url('public/main/img/kw.png')}}" class="rounded-circle" width="15%"> {{ trans('home.arabic') }}
                @break
                @case('en')
                <img src="{{url('public/main/img/us.png')}}" class="rounded-circle" width="15%"> {{ trans('home.english') }}
                @break
            @endswitch
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" style="color: #fff;" onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#fff'" href="{{ route('language', 'ar') }}"><img src="{{asset('public/main/img/kw.png')}}" class="rounded-circle" width="30%"> {{ trans('home.arabic') }} </a>
            <a class="dropdown-item" style="color: #fff;" onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#fff'" href="{{ route('language', 'en') }}"><img src="{{asset('public/main/img/us.png')}}" class="rounded-circle" width="30%"> {{ trans('home.english') }}</a>
        </div>
    </li>
  </ul>
<table class="table  data-table">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ trans('home.no') }}</th>
            <th scope="col">{{ trans('home.operations') }}</th>
        </tr>

        
        @foreach (auth()->user()->orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->id }}</td>
            <td><a href="{{ route('show_order', $order->id) }}" >عرض</a></td>
        </tr>
        @endforeach
      
    </thead>
      
</table>
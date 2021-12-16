<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $orders = Order::orderByDesc('id')->get();

            return DataTables::of($orders)->addIndexColumn()
            ->addcolumn('action', function($row){ $btn = '<a target="_blank" href="'.route("orders.show", [$row->id]).'" class="btn btn-primary">عرض</a>'; return $btn; })
            ->addcolumn('actionone', function($row){ return $row->user->name ?? \App\ShippingAddress::whereUserId($row->user_id)->firstOrFail()->name; })
            ->addcolumn('status' , function($row){ return $row->read_at == null ? 'جديد' : 'تم قراءته'; })
            ->rawColumns(['action', 'actionone', 'status'])
            ->addIndexColumn()
            ->make(true);

        }     

        return view('admin.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->update(['read_at' => now()]);
        if($order->user == null) {
            $order->user = new \stdClass();
            $order->user->latestShippingAddress = ShippingAddress::whereUserId($order->user_id)->firstOrFail();
        }
       
        return view('admin.orders.show', compact('order'));
    }

   function getOrdersNo()
   {
        return count(Order::whereReadAt(null)->get());
   }
   
}

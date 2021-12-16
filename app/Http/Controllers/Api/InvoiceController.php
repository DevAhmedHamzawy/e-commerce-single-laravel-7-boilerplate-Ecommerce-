<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        //return 'https://joomlakw.com/invoice/'.$id;
        
        $order = Order::findOrFail($id);
        
        $view = view('invoice.show', compact('order'));
        
        return $view->render();

    }
}

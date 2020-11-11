<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Meal;



class OrderController extends Controller
{
    //

    public function deliver(Order $order)
    {
        $order->delivered = true;
        $order->save();
        return redirect('admin/order');
    }

    public function pay(Order $order)
    {
        $order->paid = true;
        $order->save();
        return redirect('admin/order');
    }

    public function deleteDelivered()
    {
        $toDelete = Order::where('delivered', '=', true)->get();
        foreach ($toDelete as $value) {
            $value->delete();
        }
        return redirect('admin/order');
    }

    public function deleteAll()
    {
        $toDelete = Order::all();
        foreach ($toDelete as $value) {
            $value->delete();
        }
        return redirect('admin/order');
    }
}

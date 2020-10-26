<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Meal;

class OrderController extends Controller
{
    //
    public function store(){
        request()->validate([

        ]);

        $cart = request('cart');
        $totalPrice = 0;
        foreach ($cart as $key => $item) {
            $cart[$key]['price'] = Meal::find($item['id'])->price;
            $totalPrice += $cart[$key]['price']*$item['amount'];
        }

        $order = new Order();
        $order->price = $totalPrice;
        $order->delivered = false;
        $order->paid=(request('paymentMethod')!='cash');

        $order->save();
        
        foreach ($cart as $item) {
            
            $order->meals()->attach($item['id'], [
                'amount' => $item['amount'],
                'price' =>  $item['price']
            ]);
            
        } 
        $response = [
            'cart'=> $cart,
            'orderId' => $order->id
        ];
        return $response;

    }
}

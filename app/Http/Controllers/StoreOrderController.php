<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Meal;
use App\Http\Requests\StoreOrderRequest;

class StoreOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreOrderRequest $request)
    { 
        $cart = $request->cart;
        $cart = $this->addCartPrices($cart);
        $totalPrice = $this->calculatePrice($cart);

        $order = new Order();
        $order->price = $totalPrice;
        $order->delivered = false;

        $order->paid=($request->paymentMethod!='cash');
        $order->save();

        $this->attachMeals($order, $cart);

        $response = [
            'cart'=> $cart,
            'orderId' => $order->id
        ];

        return $response;
    }


    private function addCartPrices($cart)
    {
        foreach ($cart as $key => $item) {
            $cart[$key]['price'] = Meal::find($item['id'])->price;
        }
        return $cart;
    }


    private function calculatePrice($cart)
    {
        $totalPrice = 0;
        foreach ($cart as $key => $item) {
            $totalPrice += $cart[$key]['price']*$item['amount'];
        }
        return $totalPrice;
    }

    private function attachMeals($order, $cart){

        foreach ($cart as $item) {
            
            $order->meals()->attach($item['id'], [
                'amount' => $item['amount'],
                'price' =>  $item['price']
            ]);
            
        }
    }
}



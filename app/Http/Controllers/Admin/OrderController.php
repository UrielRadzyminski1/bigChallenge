<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Meal;
use App\Rules\SumsTen;


class OrderController extends Controller
{
    //
    public function store(){
        
        $messages = [
            'required' => 'The :attribute is empty!',
            'in' => 'The :attribute must be one of the follwoing: :values'
        ];

        if (request('paymentMethod')=='credit') {
            request()->validate([
                'cart'=>['required'],
                'paymentMethod'=>['required'],
                'cardNumber'=>'required',
                'expiration'=>'required',
                'name'=>'required',
                'security'=>['required', new SumsTen]
            ], $messages);
        } else if (request('paymentMethod')=='cash'){
            request()->validate([
                'cart'=>['required'],
            ], $messages);
        } else {
            request()->validate([
                'paymentMethod'=>'required|in:cash,credit'
            ], $messages);   
        }
        

        $cart = request('cart');
        $responseCart = $cart;
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

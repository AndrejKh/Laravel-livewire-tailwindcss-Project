<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // cancelar orden
    public function getOrderById($order_id){
        $order = Order::findOrFail($order_id);

        return $order;
    }

    // cancelar orden
    public function getProductsByOrderId($order_id){
        $products = OrderProducts::where('order_id',$order_id)->get();

        return $products;
    }

    // Crear orden
    public function createOrder(Request $request){
        if ( isset(Auth::user()->id) ) {
            $user_id = Auth::user()->id;
        }else{
            return 0;
        }

        // datos del reuqest
        $brand_id = $request->brand['id'];
        $amount = $request->amount['amount'];
        $products = $request->products;

        // Creo la orden
        Order::create([
            'brand_id' => $brand_id,
            'user_id' => $user_id,
            'amount' => $amount
            ]);
        $newOrder = Order::latest('id')->first();
        $order_id = $newOrder->id;

        // Guardo los productos, precios y cantidades compradas en la orden
        foreach ($products as $product) {
            $product_id = $product['id'];
            $quantity = $product['quantity'];
            $price = $product['price'];

            OrderProducts::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $price
            ]);
        }

        // Creo la variable de sesion que servira para notificar que se ha creado la compra
        session(['order' => $order_id]);

        return true;

    }

    // cancelar orden
    public function cancelOrder(Request $request){
        $order = Order::findOrFail($request->idOrder);
        $order->update([
            'status' => 'cancelled'
            ]);

        return redirect('/compras');

    }

}


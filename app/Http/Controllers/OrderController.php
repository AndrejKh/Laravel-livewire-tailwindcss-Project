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
        // Marca seleccionada
        $brandSelected = $request->brand;
        // $brand = $brandSelected['brand'];
        // $brand_id = $brandSelected['id'];

        // Direccion de la busqueda
        // $ubicationSelected = $request->ubication;
        // $state = $ubicationSelected['state'];
        // $state_id = $ubicationSelected['state_id'];
        // $city = $ubicationSelected['city'];
        // $city_id = $ubicationSelected['city_id'];

        // $products = $request->products;

        $amountSelected = $request->amount;
        // $amount = $amountSelected['amount'];
        return $amountSelected.'-'.$user_id.'-'.$brandSelected;

        // $items = $request->items;

        // Creo la orden
        // Order::create([
        //     'brand_id' => $brand_id,
        //     'user_id' => $user_id,
        //     'amount' => $amount
        // ]);
        // $newOrder = Order::latest('id')->first();
        // $order_id = $newOrder->id;

        // foreach ($items as $item) {
        //     $product_id = $item['product_id'];
        //     $quantity = $item['quantity'];
        //     $price = $item['price'];
        //     # code...
        //     OrderProducts::create([
        //         'order_id' => $order_id,
        //         'product_id' => $product_id,
        //         'quantity' => $quantity,
        //         'price' => $price
        //     ]);
        // }

        // return true;

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

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\RatingsSeller;
use Illuminate\Http\Request;

class RatingsSellerController extends Controller
{
    public function createRating(Request $request){
        // valido los datos


        // Creo la nueva calificacion
        RatingsSeller::create([
            'brand_id' => $request->brand_id,
            'user_id' => $request->user_id,
            'order_id' => $request->order_id,
            'comment' => $request->comment,
            'rating' => $request->rating
        ]);

        $order = Order::findOrFail($request->order_id);

        $order->update([
            'seller_status' => 'qualify'
        ]);


        return 'success';

    }
}

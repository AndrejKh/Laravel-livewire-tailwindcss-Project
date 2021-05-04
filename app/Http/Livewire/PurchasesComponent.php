<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class PurchasesComponent extends Component
{
    //ahora uso la clase dentro del componente y listo!
    use WithPagination;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $purchase, $brand, $confirmPurchase, $purchaseToRating, $products, $user_id, $message_alert, $color_alert;

    public $search = '';
    public $status = '';
    public $perPage = 10;
    public $action = 'store';
    public $show_alert = 'false';

    public $modalDetailPurchase = false;
    public $modalConfirmPurchase = false;
    public $modalRating = false;
    public $modalCancelPurchase = false;
    public $modalCalificaciones = false;

    public function render()
    {
        if ($this->status != '') {
            $orders = Order::latest('id')->where('user_id', $this->user_id)->where('status', $this->status)->paginate($this->perPage);
        } else {
            $orders = Order::latest('id')->where('user_id', $this->user_id)->paginate($this->perPage);
        }

        return view('livewire.purchases-component', compact('orders'));
    }


    public function showModalDetailsPurchase(Order $order)
    {
        $this->cancel();
        $this->brand = Brand::where('id', $order->brand_id)->first();
        $this->modalDetailPurchase = true;
        $this->purchase = $order;
        $this->products = $order->products_purchase;
    }

    public function showModalCancel(Order $order){
        $this->cancel();
        $this->modalCancelPurchase = true;
        $this->purchase = $order;
    }

    public function cancelledOrder(){
        $order = $this->purchase;

        $order->update([
            'status' => 'cancelled',
            'buyer_status' => 'cancelled'
        ]);

        //reinicio las propiedades
        $this->cancel();
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Cancelado exitosamente!';
    }

    public function setConfirmPurchase(Order $order){
        $this->modalConfirmPurchase = true;
        $this->confirmPurchase = $order;
    }

    public function confirmPurchase(){
        $order = $this->confirmPurchase;

        if( $order->seller_status == 'active' ){
            $order->update([
                'status' => 'received',
                'buyer_status' => 'received'
            ]);
        }else{
            $order->update([
                'status' => 'completed',
                'buyer_status' => 'received'
            ]);
        }

        $this->purchaseToRating = $order;

        //reinicio las propiedades
        $this->cancel();
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Compra recibida exitosamente!';
        $this->modalRating = true;

    }

    public function setRatingPurchase(Order $order){
        $this->modalRating = true;
        $this->purchaseToRating = $order;
    }

    public function cancel(){
        $this->reset(['purchase', 'brand', 'products', 'modalDetailPurchase', 'modalConfirmPurchase', 'modalCancelPurchase', 'modalRating', 'show_alert', 'message_alert', 'color_alert']);
    }

}

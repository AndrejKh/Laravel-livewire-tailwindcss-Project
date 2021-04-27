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

    public $order, $brand, $products, $user_id, $message_alert, $color_alert;

    public $search = '';
    public $status = '';
    public $perPage = 10;
    public $action = 'store';
    public $show_alert = 'false';

    public $modalDetailPurchase = false;
    public $modalCancelPurchase = false;

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
        $this->reset(['order', 'brand', 'products', 'modalDetailPurchase', 'modalCancelPurchase', 'show_alert', 'message_alert', 'color_alert']);
        $this->brand = Brand::where('id', $order->brand_id)->first();
        $this->modalDetailPurchase = true;
        $this->order = $order;
        $this->products = $order->products_purchase;
    }

    public function showModalCancel(Order $order){
        $this->reset(['order', 'brand', 'products', 'modalDetailPurchase', 'modalCancelPurchase', 'show_alert', 'message_alert', 'color_alert']);
        $this->modalCancelPurchase = true;
        $this->order = $order;
    }

    public function cancelledOrder(){
        $order = $this->order;

        $order->update([
            'status' => 'cancelled'
        ]);

        //reinicio las propiedades
        $this->reset(['order', 'brand', 'products', 'modalDetailPurchase', 'modalCancelPurchase', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Cancelado exitosamente!';
    }

    public function cancel(){
        $this->reset(['order', 'brand', 'products', 'modalDetailPurchase', 'modalCancelPurchase', 'show_alert', 'message_alert', 'color_alert']);
    }
}

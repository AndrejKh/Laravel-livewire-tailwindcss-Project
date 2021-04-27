<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class SalesComponent extends Component
{

    //ahora uso la clase dentro del componente y listo!
    use WithPagination;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $sale, $products, $user_id, $message_alert, $color_alert;


    public $brand_id = '';
    public $search = '';
    public $status = '';
    public $perPage = 10;
    public $action = 'store';
    public $show_alert = 'false';

    public $modalDetailSales = false;
    public $modalCancelSales = false;

    public function render()
    {
        $brand = Brand::where('user_id', $this->user_id)->first();
        $this->brand_id = $brand->id;

        if ($this->status != '') {
            $orders = Order::latest('id')->where('brand_id', $this->brand_id)->where('status', $this->status)->paginate($this->perPage);
        } else {
            $orders = Order::latest('id')->where('brand_id', $this->brand_id)->paginate($this->perPage);
        }
        $brands = Brand::where('user_id', $this->user_id)->get();

        return view('livewire.sales-component', compact('orders','brands'));
    }

    public function showModalDetailsSale(Order $order)
    {
        $this->reset(['sale', 'products', 'modalDetailSales', 'modalCancelSales', 'show_alert', 'message_alert', 'color_alert']);
        $this->modalDetailSales = true;
        $this->sale = $order;
        $this->products = $order->products_purchase;
    }

    public function showModalCancel(Order $order){
        $this->reset(['sale', 'products', 'modalDetailSales', 'modalCancelSales', 'show_alert', 'message_alert', 'color_alert']);
        $this->modalCancelSales = true;
        $this->sale = $order;
    }

    public function cancelledOrder(){
        $order = $this->sale;

        $order->update([
            'status' => 'cancelled'
        ]);

        //reinicio las propiedades
        $this->reset(['sale', 'products', 'modalDetailSales', 'modalCancelSales', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Cancelado exitosamente!';
    }

    public function cancel(){
        $this->reset(['sale', 'products', 'modalDetailSales', 'modalCancelSales', 'show_alert', 'message_alert', 'color_alert']);
    }


}

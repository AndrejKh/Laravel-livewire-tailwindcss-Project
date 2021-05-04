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

    public $sale, $confirmSale, $saleToRating, $products, $user_id, $message_alert, $color_alert;


    public $brand_id = '';
    public $search = '';
    public $status = '';
    public $perPage = 10;
    public $action = 'store';
    public $show_alert = 'false';

    public $modalDetailSales = false;
    public $modalConfirmSale = false;
    public $modalRating = false;
    public $modalCancelSales = false;
    public $modalCalificaciones = false;

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
        $this->cancel();
        $this->modalDetailSales = true;
        $this->sale = $order;
        $this->products = $order->products_purchase;
    }

    public function showModalCancel(Order $order){
        $this->cancel();
        $this->modalCancelSales = true;
        $this->sale = $order;
    }

    public function cancelledOrder(){
        $order = $this->sale;

        $order->update([
            'status' => 'cancelled',
            'seller_status' => 'cancelled'
        ]);

        //reinicio las propiedades
        $this->cancel();
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Cancelado exitosamente!';
    }

    public function setConfirmSale(Order $order){
        $this->modalConfirmSale = true;
        $this->confirmSale = $order;
    }

    public function confirmSale(){
        $order = $this->confirmSale;

        if( $order->buyer_status == 'active' ){
            $order->update([
                'status' => 'delivered',
                'seller_status' => 'delivered'
            ]);
        }else{
            $order->update([
                'status' => 'completed',
                'seller_status' => 'delivered'
            ]);
        }

        $this->saleToRating = $order;

        //reinicio las propiedades
        $this->cancel();
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Venta entregada exitosamente!';
        $this->modalRating = true;

    }

    public function setRatingSale(Order $order){
        $this->modalRating = true;
        $this->saleToRating = $order;
    }

    public function cancel(){
        $this->reset(['sale', 'products', 'modalDetailSales', 'modalConfirmSale', 'modalCancelSales', 'modalRating', 'show_alert', 'message_alert', 'color_alert']);
    }

}

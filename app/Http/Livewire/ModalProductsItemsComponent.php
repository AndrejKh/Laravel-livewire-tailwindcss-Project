<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Item;
use App\Models\Product;
use Livewire\Component;

class ModalProductsItemsComponent extends Component
{
    public $user_id, $brand, $quantity, $product_id, $product_selected, $price, $message_alert, $color_alert, $itemInStock;

    public $show_modal = false;
    public $show_alert = 'false';
    public $products_search_input = '';

    public function render()
    {
        $this->brand = Brand::where('user_id', $this->user_id)->first();
        $products = Product::where('status', 'active')->where('title', 'like', "%{$this->products_search_input}%")->get();
        return view('cms.items.modal-products-items-component', compact('products'));
    }

    public function SearchProduct( $product_id ){
        $this->product_id = $product_id;
        $this->product_selected = Product::findOrFail($product_id);
    }

    public function SetModalShow(){
        $this->reset(['show_alert']);
        $this->show_modal = true;
    }

    public function agregar()
    {
        $brand = Brand::where('user_id', $this->user_id)->first();
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'quantity' => 'required',
            'price' => 'required'
        ]);
        // No se selecciono ninguan categoria
        if ($this->product_id === 0 || $this->product_id === null) {
            $this->show_alert = 'true';
            $this->color_alert = 'red';
            $this->message_alert = 'Debes seleccionar un producto!';
            return;
        }

        // Ya se tiene este item creado
        $this->itemInStock = Item::where('brand_id', $brand->id)->where('product_id', $this->product_id)->get();
        if (count($this->itemInStock) > 0) {
            $this->show_alert = 'true';
            $this->color_alert = 'blue';
            $this->message_alert = 'Ya tienes este producto en tu inventario!';
            $this->reset(['itemInStock', 'product_id', 'product_selected' , 'quantity', 'price']);
            return;
        }

        $price = number_format($this->price, 2, '.', ',');

        Item::create([
            'product_id' => $this->product_id,
            'brand_id' => $brand->id,
            'quantity' => $this->quantity,
            'price' => $price
        ]);
        //reinicio las propiedades
        $this->reset(['product_id', 'product_selected', 'quantity', 'price', 'show_modal']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Creado exitosamente!';


        // cambiando variable para renderizar los items
        $this->emit('newItem', 'true');
    }

}

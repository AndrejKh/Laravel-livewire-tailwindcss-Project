<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

use Livewire\Component;

use Livewire\WithPagination;

class ItemsComponent extends Component
{
    //ahora uso la clase dentro del componente y listo!
    use WithPagination;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => '']];

    public $brand_id, $item_id, $user_id, $item, $quantity, $price, $message_alert, $color_alert, $itemToDelete, $itemToChangeStatus;

    public $product_id=0;
    public $products_seach = '';
    public $search = '';
    public $status = '';
    public $perPage = 15;
    public $show_alert = 'false';
    public $show_modal_delete = 'false';
    public $show_modal_status = 'false';

    //reglas de validacion, protected indica que solo se usara en este modelo
    protected $rules = [
        'item' => 'required',
        'item_id' => 'required',
        'user_id' => 'required',
        'quantity' => 'required',
        'price' => 'required'
    ];

    public function render()
    {
        $user_id = $this->user_id;
        $brand = Brand::where('user_id', $this->user_id)->first();

        // El usuario tiene una marca?
        if($brand){
            $this->brand_id = $brand->id;
            // SE esta buscando por estatus
            if ($this->status !== '') {
                $items = Item::latest('id')->where('brand_id', $this->brand_id)
                    ->where('status', $this->status)
                    ->whereHas('product', function (Builder $query) {
                        $query->where('title', 'like', "%{$this->search}%");
                    })->paginate($this->perPage);
            // Se esta buscando todos los items, sin filtro por estatus
            }else{
                $items = Item::latest('id')->where('brand_id', $this->brand_id)
                ->whereHas('product', function (Builder $query) {
                    $query->where('title', 'like', "%{$this->search}%");
                })->paginate($this->perPage);
            }
        // el usuario no tiene marca
        }else{
            $items = [];
        }

        return view('livewire.items-component', compact('items','user_id'));
    }

    public function edit(Item $item)
    {
        $this->reset(['show_alert']);
        $this->product_id = $item->id;
        $this->quantity = $item->quantity;
        $this->price = $item->price;
    }

    public function update()
    {
        //validacion de valores
        $this->validate();

        $product = Item::find($this->product_id);

        $product->update([
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'price' => $this->price
        ]);

        //reinicio las propiedades
        $this->reset(['product_id', 'quantity', 'price','show_alert','color_alert','message_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Actualizado exitosamente!';
    }

    public function cancel()
    {
        $this->reset(['item_id', 'item', 'product_id', 'quantity', 'price', 'itemToDelete', 'itemToChangeStatus', 'show_alert', 'show_modal_delete', 'show_modal_status']);
    }

    public function setItemStatus(Item $item){
        $this->reset(['show_alert']);
        $this->show_modal_status = 'true';
        $this->itemToChangeStatus = $item;
    }

    // Activar item , cambio de estatus
    public function activarItem(Item $item){
        $item->update([
            'status' => 'active'
        ]);

        //reinicio las propiedades
        $this->reset(['show_modal_delete', 'itemToChangeStatus','show_alert','color_alert','message_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Activado exitosamente!';
    }

    // Activar item , cambio de estatus
    public function pausarItem(Item $item){
        $item->update([
            'status' => 'paused'
        ]);

        //reinicio las propiedades
        $this->reset(['show_modal_delete', 'itemToChangeStatus','show_alert','color_alert','message_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Pausado exitosamente!';
    }

    public function setItemDelete(Item $item){
        $this->reset(['show_alert']);
        $this->show_modal_delete = 'true';
        $this->itemToDelete = $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();
        //reinicio las propiedades
        $this->reset(['product_id', 'quantity', 'price', 'itemToDelete']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'Eliminado exitosamente!';
    }
}

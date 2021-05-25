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

    public $brand_id, $item_id, $user_id, $item, $quantity, $price, $message_alert, $color_alert, $itemToDelete, $itemToUpdate, $newItem;

    public $product_id = 0;
    public $products_seach = '';
    public $search = '';
    public $status = '';
    public $perPage = 15;
    public $show_alert = 'false';
    public $show_modal_delete = 'false';
    public $show_modal_update = 'false';

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
        if ($brand) {
            $this->brand_id = $brand->id;
            // SE esta buscando por estatus
            if ($this->status !== '') {
                $items = Item::latest('id')->where('brand_id', $this->brand_id)
                    ->where('status', $this->status)
                    ->whereHas('product', function (Builder $query) {
                        $query->where('title', 'like', "%{$this->search}%");
                    })->paginate($this->perPage);

                $total_items = Item::latest('id')->where('brand_id', $this->brand_id)
                    ->where('status', $this->status)
                    ->whereHas('product', function (Builder $query) {
                        $query->where('title', 'like', "%{$this->search}%");
                    })->count();
                // Se esta buscando todos los items, sin filtro por estatus
            } else {
                $items = Item::latest('id')->where('brand_id', $this->brand_id)
                    ->whereHas('product', function (Builder $query) {
                        $query->where('title', 'like', "%{$this->search}%");
                    })->paginate($this->perPage);

                $total_items = Item::latest('id')->where('brand_id', $this->brand_id)
                ->whereHas('product', function (Builder $query) {
                    $query->where('title', 'like', "%{$this->search}%");
                })->count();
            }
            // el usuario no tiene marca
        } else {
            $items = [];
        }

        return view('cms.items.items-component', compact('items', 'total_items', 'user_id'));
    }

    public function setItemUpdate(Item $item)
    {
        $this->reset(['show_alert']);
        $this->show_modal_update = 'true';
        $this->price = $item->price;
        $this->quantity = $item->quantity;
        $this->itemToUpdate = $item;
    }

    public function update()
    {

        $item = $this->itemToUpdate;

        $item->update([
            'quantity' => $this->quantity,
            'price' => $this->price
        ]);

        //reinicio las propiedades
        $this->reset(['itemToUpdate', 'quantity', 'price', 'show_alert', 'color_alert', 'message_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Actualizado exitosamente!';
    }

    public function cancel()
    {
        $this->reset(['item_id', 'item', 'product_id', 'quantity', 'price', 'itemToUpdate', 'itemToDelete', 'show_alert', 'show_modal_delete', 'show_modal_update']);
    }

    public function setItemDelete(Item $item)
    {
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

    // Evento que escucha se ejecuta cuando se agrega un nuevo item, desde el controlador 'ModalProductItemsComponent'
    protected $listeners = ['newItem'];

    public function newItem($new)
    {
        $this->newItem = $new;
    }
}

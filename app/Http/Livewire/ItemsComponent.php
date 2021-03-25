<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

use Livewire\Component;

use Livewire\WithPagination;

class ItemsComponent extends Component
{
    //ahora uso la clase dentro del componente y listo!
    use WithPagination;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $item_id, $user_id, $item, $quantity, $price, $message_alert, $color_alert, $itemcito;

    public $product_id=0;
    public $products_seach = '';
    public $search = '';
    public $status = 'active';
    public $perPage = 10;
    public $show_alert = 'false';

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
        $items = Item::latest('id')->where('user_id', $this->user_id)
            ->where('status', $this->status)
            ->whereHas('product', function (Builder $query) {
                $query->where('title', 'like', "%{$this->search}%");
            })->paginate($this->perPage);

        return view('livewire.items-component', compact('items'));
    }

    public function agregar()
    {
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'quantity' => 'required',
            'price' => 'required'
        ]);
        if ($this->product_id === 0) {
            $this->show_alert = 'true';
            $this->color_alert = 'red';
            $this->message_alert = 'Debes seleccionar un producto!';
            return;
        }

        $this->itemcito = Item::where('user_id', $this->user_id)->where('product_id', $this->product_id)->get();
        if (count($this->itemcito) > 0) {
            $this->show_alert = 'true';
            $this->color_alert = 'yellow';
            $this->message_alert = 'Ya tienes este producto en tu inventario!';
            $this->reset(['item_id', 'item', 'quantity', 'price']);
            return;
        }

        Item::create([
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'price' => $this->price
        ]);
        //reinicio las propiedades
        $this->reset(['product_id', 'quantity', 'price']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'El producto fue creado exitosamente!';
    }

    public function edit(Item $item)
    {
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
        $this->reset(['product_id', 'quantity', 'price']);
        $this->show_alert = 'true';
        $this->color_alert = 'blue';
        $this->message_alert = 'El producto fue actualizado exitosamente!';
    }

    public function cancel()
    {
        $this->reset(['item_id', 'item', 'product_id', 'quantity', 'price']);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        //reinicio las propiedades
        $this->reset(['product_id', 'quantity', 'price']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'El producto fue eliminado exitosamente!';
    }

    public function clean()
    {
        $this->status = 'active';
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

    // EVENTOS
    protected $listeners = ['setIdCategoryFromChildComponent'];

    public function setIdCategoryFromChildComponent($category_id)
    {
        $this->product_id = $category_id;
    }
}

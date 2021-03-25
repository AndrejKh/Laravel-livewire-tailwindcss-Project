<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProductsComponent extends Component
{
    public $products_search_input = '';

    public function render()
    {
        //
        $products = Product::where('status', 'active')->where('title', 'like', "%{$this->products_search_input}%" )->get();

        return view('livewire.search-products-component', compact('products'));
    }

    // Funcion de comunicacion con el componente padre, asignacion de Category_Id
    public function SetCategory($id_categoria)
    {
        $this->emitUp('setIdCategoryFromChildComponent', $id_categoria);
    }

}

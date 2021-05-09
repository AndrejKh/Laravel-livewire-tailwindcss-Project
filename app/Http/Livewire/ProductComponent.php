<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cviebrock\EloquentSluggable\Services\SlugService;

//clase para crear paginacion dinamica, sin que se recargue la pagina
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ProductComponent extends Component
{
    //ahora uso la clase dentro del componente y listo!
    use WithPagination;
    use WithFileUploads;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $product, $product_id, $title, $description, $slug, $photo_main_product, $category_id, $message_alert, $color_alert;

    public $search = '';
    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';

    //reglas de validacion, protected indica que solo se usara en este modelo
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'slug' => 'required',
        'photo_main_product' => 'required'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $validationAttributes = [
        'name' => 'Producto',
        'body' => 'Descripción del producto',
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $messages = [
        'title.required' => 'Este campo () es necesario'
    ];


    public function render()
    {
        //Obtengo los posts ordenados por id, desde el ultimo, con paginacion
        $products = Product::latest('id')->where('status', $this->status)->where('title', 'LIKE', "%{$this->search}%")->orWhere('description', 'LIKE', "%{$this->search}%")->paginate($this->perPage);
        $categories = Category::all();
        return view('cms.products.product-component', compact('products', 'categories'));
    }

    public function agregar()
    {
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'title' => 'required|max:60',
            'description' => 'required',
            'category_id' => 'required',
            'photo_main_product' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        //Guardo la imagen en la carpeta storage, enlace public
        $path_imagen = $this->photo_main_product->store('public');

        Product::create([
            'title' => $this->title,
            'description' => $this->description,
            'slug' => SlugService::createSlug(Product::class, 'slug', $this->title),
            'photo_main_product' => $path_imagen,
            'category_id' => $this->category_id
        ]);
        //reinicio las propiedades
        $this->reset(['title', 'description', 'action', 'slug', 'photo_main_product', 'category_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Creado exitosamente!';
    }

    public function edit(Product $product)
    {
        $this->product_id = $product->id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->slug = $product->slug;
        $this->category_id = $product->category_id;

        $this->action = 'update';
    }

    public function update()
    {

        if ($this->photo_main_product) {
            //validacion de valores
            $this->validate();

            //Guardo la imagen en la carpeta storage, enlace public
            $path_imagen = $this->photo_main_product->store('public');

            $product = Product::find($this->product_id);

            $product->update([
                'title' => $this->title,
                'description' => $this->description,
                'slug' => SlugService::createSlug(Product::class, 'slug', $this->title),
                'photo_main_product' => $path_imagen,
                'category_id' => $this->category_id
            ]);
        } else {
            $this->validate([
                'title' => 'required|max:60',
                'description' => 'required',
                'category_id' => 'required',
            ]);

            $product = Product::find($this->product_id);

            $product->update([
                'title' => $this->title,
                'description' => $this->description,
                'slug' => SlugService::createSlug(Product::class, 'slug', $this->title),
                'category_id' => $this->category_id
            ]);
        }

        //reinicio las propiedades
        $this->reset(['title', 'description', 'action', 'slug', 'photo_main_product', 'category_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'blue';
        $this->message_alert = 'Actualizado exitosamente!';
    }

    public function cancel()
    {
        $this->reset(['title', 'description', 'action', 'slug', 'photo_main_product', 'category_id', 'show_alert', 'message_alert', 'color_alert']);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        //reinicio las propiedades
        $this->reset(['title', 'description', 'action', 'slug', 'photo_main_product', 'category_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'Eliminado exitosamente!';
    }

    public function close_alert()
    {
        $this->show_alert = 'false';
    }

    public function clean()
    {
        $this->status = 'active';
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

}

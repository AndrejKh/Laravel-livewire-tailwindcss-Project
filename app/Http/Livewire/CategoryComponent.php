<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

//clase para crear paginacion dinamica, sin que se recargue la pagina
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
{
    //ahora uso la clase dentro del componente y listo!
    use WithPagination;
    use WithFileUploads;

    protected $queryString = ['status' => ['except' => 'active'],'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $category, $description, $slug, $photo, $category_id, $padre_id, $category_father_name, $message_alert,$color_alert;

    public $search = '';
    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';
    public $show_alert = 'false';

    //reglas de validacion, protected indica que solo se usara en este modelo
    protected $rules = [
        'category' => 'required',
        'description' => 'required',
        'slug' => 'required',
        'photo' => 'required'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $validationAttributes = [
        'name' => 'Categoria',
        'body' => 'Descripción de la categoria',
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $messages = [
        'category.required' => 'Este campo () es necesario'
    ];


    public function render()
    {
        //Obtengo los posts ordenados por id, desde el ultimo, con paginacion
        $categories = Category::latest('id')->
                                where('status',$this->status)->
                                where('category', 'LIKE' , "%{$this->search}%" )->
                                orWhere('description', 'LIKE' , "%{$this->search}%" )->
                                paginate($this->perPage);
        return view('livewire.category-component', compact('categories'));
    }

    public function agregar()
    {
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'category' => 'required|max:60',
            'description' => 'required',
            'padre_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        //Guardo la imagen en la carpeta storage, enlace public
        $path_imagen=$this->photo->store('public');

        Category::create([
            'category' => $this->category,
            'description' => $this->description,
            'slug' => $this->category,
            'photo' => $path_imagen,
            'padre_id' => $this->padre_id
        ]);
        //reinicio las propiedades
        $this->reset(['category', 'description', 'action', 'slug', 'photo', 'category_id', 'padre_id','show_alert','message_alert','color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'creada';
    }

    public function edit(Category $category)
    {
        $this->category = $category->category;
        $this->description = $category->description;
        /* $this->photo = $category->photo; */
        $this->padre_id = $category->padre_id;
        $this->category_id = $category->id;

        $this->action = 'update';
    }

    public function update()
    {

        if ($this->photo) {
            //validacion de valores
            $this->validate();

            //Guardo la imagen en la carpeta storage, enlace public
            $path_imagen=$this->photo->store('public');

            $category = Category::find($this->category_id);

            $category->update([
                'category' => $this->category,
                'description' => $this->description,
                'slug' => $this->category,
                'photo' => $path_imagen,
                'padre_id' => $this->padre_id
            ]);
        } else {
            $this->validate([
                'category' => 'required|max:60',
                'description' => 'required',
                'padre_id' => 'required'
            ]);

            $category = Category::find($this->category_id);

            $category->update([
                'category' => $this->category,
                'description' => $this->description,
                'slug' => $this->category,
                'padre_id' => $this->padre_id
            ]);
        }

        //reinicio las propiedades
        $this->reset(['category', 'description', 'action', 'slug', 'photo', 'category_id', 'padre_id','show_alert','message_alert','color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'blue';
        $this->message_alert = 'actualizada';
    }

    public function cancel()
    {
        $this->reset(['category', 'description', 'action', 'slug', 'photo', 'category_id', 'padre_id']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        //reinicio las propiedades
        $this->reset(['category', 'description', 'action', 'slug', 'photo', 'category_id', 'padre_id','show_alert','message_alert','color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'eliminada';
    }

    public function category_father($category_id)
    {
        $category_father_name = Category::find($category_id);
        return $category_father_name;
    }

    public function clean(){
        $this->status = 'active';
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\BannerPromocional;
use Livewire\Component;

//clase para crear paginacion dinamica, sin que se recargue la pagina
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class PromotionalBannerComponent extends Component
{

    //ahora uso la clase dentro del componente y listo!
    use WithPagination;
    use WithFileUploads;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $banner, $page_banner, $banner_id, $message_alert, $color_alert;

    public $search = '';
    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';
    public $show_alert = 'false';

    //reglas de validacion, protected indica que solo se usara en este modelo
    protected $rules = [
        'banner' => 'required',
        'page_banner' => 'required'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $validationAttributes = [
        'name' => 'Banner',
        'page_banner' => 'Página',
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $messages = [
        'banner.required' => 'Este campo () es necesario'
    ];


    public function render()
    {
        //Obtengo los posts ordenados por id, desde el ultimo, con paginacion
        $banners = BannerPromocional::latest('id')->where('status', $this->status)->where('page', 'LIKE', "%{$this->search}%")->paginate($this->perPage);
        return view('livewire.promotional-banner-component', compact('banners'));
    }

    public function agregar()
    {
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'page_banner' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        //Guardo la imagen en la carpeta storage, enlace public
        $path_imagen = $this->banner->store('public');

        BannerPromocional::create([
            'banner' => $path_imagen,
            'page' => $this->page_banner
        ]);
        //reinicio las propiedades
        $this->reset(['banner', 'page_banner', 'banner_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'creado';
    }

    public function edit(BannerPromocional $banner)
    {
        $this->banner_id = $banner->id;
        $this->page_banner = $banner->page_banner;

        $this->action = 'update';
    }

    public function update()
    {

        if ($this->banner) {
            //validacion de valores
            $this->validate();

            //Guardo la imagen en la carpeta storage, enlace public
            $path_imagen = $this->banner->store('public');

            $banner = BannerPromocional::find($this->banner_id);

            $banner->update([
                'banner' => $path_imagen,
                'page' => $this->page_banner
            ]);
        } else {
            $this->validate([
                'page_banner' => 'required',
            ]);

            $banner = BannerPromocional::find($this->banner_id);

            $banner->update([
                'page' => $this->page_banner
            ]);
        }

        //reinicio las propiedades
        $this->reset(['banner', 'page_banner', 'banner_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'blue';
        $this->message_alert = 'actualizado';
    }

    public function cancel()
    {
        $this->reset(['banner', 'page_banner', 'banner_id', 'show_alert', 'message_alert', 'color_alert']);
    }

    public function destroy(BannerPromocional $banner)
    {
        $banner->delete();
        //reinicio las propiedades
        $this->reset(['banner', 'page_banner', 'banner_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'eliminado';
    }

    public function close_alert()
    {
        $this->show_alert = 'false';
    }

    public function clean()
    {
        $this->status = 'active';
        $this->search = '';
        $this->page_banner = 1;
        $this->perPage = '10';
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Brand;
use Livewire\Component;

use Livewire\WithFileUploads;

class BannerComponent extends Component
{
    use WithFileUploads;

    public $message_alert, $color_alert, $brand, $brand_id, $user_id, $photo, $bannerUpdate ;

    public $openModal = false;
    public $openModalUpdate = false;

    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';

    //reglas de validacion, protected indica que solo se usara en este modelo
    protected $rules = [
        'banner' => 'required',
        'profile_photo_path_brand' => 'required'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $validationAttributes = [
        'banner' => 'Banner'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $messages = [
        'banner.required' => 'Este campo () es necesario'
    ];

    public function render()
    {
        $brand = Brand::where('user_id', $this->user_id)->first();
        if ($brand) {
            $this->brand = $brand;
            $banners_tienda = Banner::where('status', $this->status)->where('brand_id', $brand->id )->get();
        }else{
            $banners_tienda = [];
        }
        return view('livewire.banner-component', compact('banners_tienda','brand'));
    }

    public function agregar()
    {
        //reinicio las propiedades
        $this->reset(['photo', 'action','show_alert','message_alert','color_alert', 'openModal']);
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        //Guardo la imagen en la carpeta storage, enlace public
        $path_imagen=$this->photo->store('public');


        $brand = Brand::where('user_id', $this->user_id)->first();
        if ($brand) {
            $brand_id = $brand->id;
        }else{
            $this->message_alert = 'Debes crear primero tu marca';
            $this->color_alert = 'yellow';
            $this->show_alert = true;
            return;
        }

        Banner::create([
            'brand_id' => $brand_id,
            'photo' => $path_imagen
        ]);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Guardado exitosamente!';
    }

    public function bannerUpdate(Banner $banner){
        $this->reset(['show_alert']);
        $this->openModalUpdate = 'true';
        $this->bannerUpdate = $banner;
    }

    public function update(){

        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        //Guardo la imagen en la carpeta storage, enlace public
        $path_imagen=$this->photo->store('public');

        $this->bannerUpdate->update([
            'photo' => $path_imagen
        ]);

         //reinicio las propiedades
         $this->reset(['photo', 'action','show_alert','message_alert','color_alert', 'openModalUpdate']);
         $this->show_alert = 'true';
         $this->color_alert = 'green';
         $this->message_alert = 'Actualizado exitosamente!';
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        //reinicio las propiedades
        $this->reset(['photo', 'action','show_alert','message_alert','color_alert', 'openModal']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'Eliminado exitosamente!';
    }
}

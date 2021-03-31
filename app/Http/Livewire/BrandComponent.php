<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

use Livewire\WithFileUploads;

class BrandComponent extends Component
{
    use WithFileUploads;

    public $message_alert, $color_alert, $brand, $brand_id, $user_id, $profile_photo_path_brand;

    public $openModal = false;
    public $openModalActualizar = false;

    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';

        //reglas de validacion, protected indica que solo se usara en este modelo
        protected $rules = [
            'brand' => 'required',
            'profile_photo_path_brand' => 'required'
        ];

        // para cambiar los nombres de los atributos de validacion que vienen por default
        protected $validationAttributes = [
            'brand' => 'Marca'
        ];

        // para cambiar los nombres de los atributos de validacion que vienen por default
        protected $messages = [
            'banner.required' => 'Este campo () es necesario'
        ];

        public function render()
        {
            $brand_user = Brand::where('user_id', $this->user_id)->first();
            return view('livewire.brand-component', compact('brand_user'));
        }

        public function crear()
        {
            //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
            $this->validate([
                'brand' => 'required|max:60',
                'profile_photo_path_brand' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            //Guardo la imagen en la carpeta storage, enlace public
            $path_imagen=$this->profile_photo_path_brand->store('public');

            $slug = str_replace('-',' ',strtolower($this->brand));

            Brand::create([
                'brand' => $this->brand,
                'user_id' => $this->user_id,
                'slug' => $slug,
                'profile_photo_path_brand' => $path_imagen
            ]);
            //reinicio las propiedades
            $this->reset(['brand', 'profile_photo_path_brand', 'action','show_alert','message_alert','color_alert','openModal']);
            $this->show_alert = 'true';
            $this->color_alert = 'green';
            $this->message_alert = 'guardada';
        }

        public function update(){

            if ($this->profile_photo_path_brand) {
                //validacion de valores
                $this->validate();

                //Guardo la imagen en la carpeta storage, enlace public
                $path_imagen=$this->profile_photo_path_brand->store('public');

                $slug = str_replace('-',' ',strtolower($this->brand));

                $brand = Brand::where('user_id', $this->user_id)->first();

                $brand->update([
                    'brand' => $this->brand,
                    'slug' => $slug,
                    'profile_photo_path_brand' => $path_imagen
                ]);
            } else {
                $this->validate([
                    'brand' => 'required|max:60'
                ]);

                $slug = str_replace('-',' ',strtolower($this->brand));

                $brand = Brand::where('user_id', $this->user_id)->first();

                $brand->update([
                    'brand' => $this->brand,
                    'slug' => $slug
                ]);
            }

            //reinicio las propiedades
            $this->reset(['brand', 'profile_photo_path_brand', 'action','show_alert','message_alert','color_alert', 'openModalActualizar']);
            $this->show_alert = 'true';
            $this->color_alert = 'blue';
            $this->message_alert = 'actualizada';
        }


}

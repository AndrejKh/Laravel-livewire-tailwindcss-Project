<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\City;
use App\Models\State;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

use Livewire\WithFileUploads;

class BrandComponent extends Component
{
    use WithFileUploads;

    public $user_id, $brand, $brand_id, $profile_photo_path_brand, $state_id, $city_id, $cities, $address, $message_alert, $color_alert;

    public $openModal = false;
    public $openModalActualizar = false;

    public $openModalAddress = false;
    public $openModalActualizarAddress = false;


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

            $cities = [];
            $estados = State::all();

            return view('cms.tiendas.components.brand-component', compact('brand_user', 'estados', 'cities'));
        }

        public function crear()
        {
            //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
            $this->validate([
                'brand' => 'required',
                'profile_photo_path_brand' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            //Guardo la imagen en la carpeta storage, enlace public
            $path_imagen=$this->profile_photo_path_brand->store('public');

            Brand::create([
                'brand' => $this->brand,
                'user_id' => $this->user_id,
                'slug' => SlugService::createSlug(Brand::class, 'slug', $this->brand),
                'profile_photo_path_brand' => $path_imagen
            ]);
            //reinicio las propiedades
            $this->cancelar();
            $this->show_alert = 'true';
            $this->color_alert = 'green';
            $this->message_alert = 'Guardado exitosamente!';

            // cambiando variable para renderizar los items
            $this->emit('newBrand', 'true');
        }

        public function update(){

            $brand = Brand::where('user_id', $this->user_id)->first();
            if ($this->profile_photo_path_brand) {
                //Guardo la imagen en la carpeta storage, enlace public
                $path_imagen=$this->profile_photo_path_brand->store('public');

                if ($this->brand != '') {

                    $brand->update([
                        'brand' => $this->brand,
                        'slug' => SlugService::createSlug(Brand::class, 'slug', $this->brand),
                        'profile_photo_path_brand' => $path_imagen
                    ]);
                }else{
                    $brand->update([
                        'profile_photo_path_brand' => $path_imagen
                    ]);
                }

            } else {

                $brand->update([
                    'brand' => $this->brand,
                    'slug' => SlugService::createSlug(Brand::class, 'slug', $this->brand),
                ]);
            }

            //reinicio las propiedades
            $this->cancelar();
            $this->show_alert = 'true';
            $this->color_alert = 'green';
            $this->message_alert = 'Actualizado exitosamente!';
        }

        public function buttonActualizarBrand(){
            $this->openModalActualizar = true;
            $brand_user = Brand::where('user_id', $this->user_id)->first();

            $this->brand = $brand_user->brand;
            // $this->profile_photo_path_brand = $brand_user->profile_photo_path_brand;
        }

        //* Address */

        // Funcion que se activa al momento de dar click en el boton 'editar' de algun delivery
        public function buttonActualizarAddress(){
            $this->openModalActualizarAddress = true;
            $brand = Brand::where('user_id', $this->user_id)->first();

            $this->state_id = $brand->state_id;
            $this->city_id = $brand->city_id;
            $this->address = $brand->address;
        }

        public function updateAddress()
        {
            $brand = Brand::where('user_id', $this->user_id)->first();

            $brand->update([
                'state_id' => $this->state_id,
                'city_id' => $this->city_id,
                'address' => $this->address
            ]);

            //reinicio las propiedades
            $this->cancelar();
            $this->show_alert = 'true';
            $this->color_alert = 'green';
            $this->message_alert = 'Actualizado exitosamente!';
        }


        // Funcion para buscar las ciudades, dependiendo del estado seleccionado
        public function changeState(){
            $this->cities = City::where('state_id', $this->state_id)->get();
        }

        public function cancelar(){
            $this->reset(['brand', 'state_id', 'city_id', 'cities', 'address', 'profile_photo_path_brand','show_alert','message_alert','color_alert', 'openModalActualizar', 'openModalAddress', 'openModalActualizarAddress']);
        }
}


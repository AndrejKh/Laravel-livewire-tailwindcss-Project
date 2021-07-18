<?php

namespace App\Http\Livewire;

use App\Models\AddressBrands;
use App\Models\Brand;
use App\Models\City;
use App\Models\DaysWeek;
use App\Models\State;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

use Livewire\WithFileUploads;

class BrandComponent extends Component
{
    use WithFileUploads;

    public $user_id, $brand, $brand_id, $profile_photo_path_brand, $state_id, $city_id, $cities, $address, $code_whatsapp, $whatsapp, $message_alert, $color_alert, $whatsapp_number;
    public $days = [];
    public $open_hour = [];
    public $open_min = [];
    public $close_hour = [];
    public $close_min = [];

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

        if( isset( $brand_user->id ) ){
            $addressBD = AddressBrands::where('brand_id', $brand_user->id)->first();
        }else{
            $addressBD = null;
        }

        $cities = [];
        $estados = State::all();
        $days_week = DaysWeek::all();

        return view('cms.tiendas.components.brand-component', compact('brand_user', 'addressBD', 'estados', 'cities', 'days_week'));
    }

    public function crear()
    {
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'brand' => 'required',
            'profile_photo_path_brand' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
        ]);

        // sort( $this->days );

        //Guardo la imagen en la carpeta storage, enlace public
        $path_imagen = $this->profile_photo_path_brand->store('public');

        // Whatsapp
        $whatsapp_number =  $this->code_whatsapp.trim($this->whatsapp);

        Brand::create([
            'brand' => $this->brand,
            'user_id' => $this->user_id,
            'slug' => SlugService::createSlug(Brand::class, 'slug', trim($this->brand)),
            'profile_photo_path_brand' => $path_imagen,
            'whatsapp' => $whatsapp_number,

        ]);
        $newBrand = Brand::latest('id')->first();
        $brand_id = $newBrand->id;

        AddressBrands::create([
            'brand_id' => $brand_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'address' => $this->address,
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

        $brand = Brand::where('id', $this->brand_id)->first();
        $address = AddressBrands::where('brand_id', $this->brand_id)->first();

        // Whatsapp
        $whatsapp_number =  $this->code_whatsapp.trim($this->whatsapp);

        if ($this->profile_photo_path_brand) {
            //Guardo la imagen en la carpeta storage, enlace public
            $path_imagen=$this->profile_photo_path_brand->store('public');

            if ($this->brand != '') {

                $brand->update([
                    'brand' => $this->brand,
                    'slug' => SlugService::createSlug(Brand::class, 'slug', trim($this->brand)),
                    'profile_photo_path_brand' => $path_imagen,
                    'whatsapp' => $whatsapp_number,
                ]);
            }else{
                $brand->update([
                    'profile_photo_path_brand' => $path_imagen,
                    'whatsapp' => $whatsapp_number,
                ]);

            }

        } else {

            $brand->update([
                'brand' => $this->brand,
                'slug' => SlugService::createSlug(Brand::class, 'slug', trim($this->brand)),
                'whatsapp' => $whatsapp_number,
            ]);

        }
        $address->update([
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

    public function buttonActualizarBrand(){
        $this->openModalActualizar = true;
        $brand_user = Brand::where('user_id', $this->user_id)->first();

        $this->brand_id = $brand_user->id;
        $this->brand = $brand_user->brand;
        $this->state_id = $brand_user->address->state_id;
        $this->city_id = $brand_user->address->city_id;
        $this->address = $brand_user->address->address;
        $code_whatsapp = substr( $brand_user->whatsapp, 0, 5);
        $whatsapp = substr( $brand_user->whatsapp, 5, 7);
        $this->code_whatsapp = $code_whatsapp;
        $this->whatsapp = $whatsapp;
        // $this->profile_photo_path_brand = $brand_user->profile_photo_path_brand;
    }


    public function cancelar(){
        $this->reset(['brand', 'state_id', 'city_id', 'cities', 'address', 'profile_photo_path_brand','show_alert','message_alert','color_alert', 'openModalActualizar', 'openModalAddress', 'openModalActualizarAddress']);
    }
}


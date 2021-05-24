<?php

namespace App\Http\Livewire;

use App\Models\AddressBrands;
use App\Models\Brand;
use App\Models\City;
use App\Models\State;
use Livewire\Component;

class AddressComponent extends Component
{
    public $user_id, $brand_id, $state_id, $city_id, $cities, $address, $message_alert, $color_alert;

    public $openModal = false;
    public $openModalActualizar = false;

    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';


    public function render()
    {
        $brand = Brand::where('user_id', $this->user_id)->first();

        if( isset($brand->id) ){
            $address = AddressBrands::where('brand_id', $brand->id)->first();
        }else{
            $address = Null;
        }

        $cities = [];
        $estados = State::all();
        return view('cms.tiendas.components.address-component', compact('estados', 'brand', 'cities' , 'address'));
    }

    // abrir modal para crear direccion
    public function buttonCreate(){
        $brand = Brand::where('user_id', $this->user_id)->first();

        $this->brand_id = $brand->id;
        $this->openModal = true;
    }

    // Crear nuevo registro de direccion
    public function create(){

        $this->validate([
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
        ]);


        AddressBrands::create([
            'brand_id' => $this->brand_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'address' => $this->address,
        ]);

        //reinicio las propiedades
        $this->cancelar();
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Guardada exitosamente!';

    }

    // Funcion que se activa al momento de dar click en el boton 'editar' de algun delivery
    public function buttonActualizar(){
        $this->openModalActualizar = true;
        $brand = Brand::where('user_id', $this->user_id)->first();

        $this->brand_id = $brand->id;
        $this->state_id = $brand->address->state_id;
        $this->city_id = $brand->address->city_id;
        $this->address = $brand->address->address;
    }

    public function update()
    {
        $address = AddressBrands::where('brand_id', $this->brand_id)->first();

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

    public function cancelar()
    {
        $this->reset(['state_id', 'city_id', 'address', 'cities', 'show_alert', 'message_alert', 'color_alert', 'openModal', 'openModalActualizar']);
    }

    // Funcion para buscar las ciudades, dependiendo del estado seleccionado
    public function changeState(){
        $this->cities = City::where('state_id', $this->state_id)->get();
    }

    // Evento que escucha se ejecuta cuando se crea la marca, desde el controlador 'BrandComponent'
    protected $listeners = ['newBrand'];

    public function newBrand($new)
    {
        $this->newBrand = $new;
    }
}

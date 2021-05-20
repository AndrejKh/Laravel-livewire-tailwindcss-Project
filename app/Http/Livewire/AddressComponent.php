<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Livewire\Component;

class AddressComponent extends Component
{
    public $user_id, $state_id, $city_id, $cities, $address, $message_alert, $color_alert, $brand_test;

    public $openModal = false;
    public $openModalActualizar = false;

    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';


    public function render()
    {
        $brand = Brand::where('user_id', $this->user_id)->first();
        $cities = [];
        $estados = State::all();
        return view('cms.tiendas.components.address-component', compact('estados', 'brand', 'cities'));
    }

    // Funcion que se activa al momento de dar click en el boton 'editar' de algun delivery
    public function buttonActualizar(){
        $this->openModalActualizar = true;
        $brand = Brand::where('user_id', $this->user_id)->first();

        $this->state_id = $brand->state_id;
        $this->city_id = $brand->city_id;
        $this->address = $brand->address;
    }

    public function update()
    {
        $this->brand_test = Brand::where('user_id', $this->user_id)->first();

        $this->brand->update([
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'address' => $this->address
        ]);
        //reinicio las propiedades
        $this->reset(['state_id', 'city_id', 'address', 'cities', 'show_alert', 'message_alert', 'color_alert', 'openModal', 'openModalActualizar']);
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
}

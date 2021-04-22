<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Livewire\Component;

class AddressComponent extends Component
{
    public $message_alert, $color_alert, $user_id, $state_id, $city_id, $cities, $address;

    public $openModal = false;
    public $openModalActualizar = false;

    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';


    public function render()
    {
        $user = User::where('id', $this->user_id)->first();
        $direction = $user->state_id;
        $cities = [];
        $estados = State::all();
        return view('livewire.address-component', compact('estados', 'direction', 'user', 'cities'));
    }


    public function update()
    {

        $user = User::where('id', $this->user_id)->first();

        $user->update([
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

    // Funcion que se activa al momento de dar click en el boton 'editar' de algun delivery
    public function buttonActualizar(){
        $this->openModalActualizar = true;
        $user = User::where('id', $this->user_id)->first();

        $this->state_id = $user->state_id;
        $this->city_id = $user->city_id;
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

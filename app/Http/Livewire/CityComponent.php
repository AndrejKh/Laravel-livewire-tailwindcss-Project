<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\State;
use Livewire\Component;

use Livewire\WithPagination;

class CityComponent extends Component
{

    //ahora uso la clase dentro del componente y listo!
    use WithPagination;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $city, $state_id, $city_id, $message_alert, $color_alert;

    public $search = '';
    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';

    //reglas de validacion, protected indica que solo se usara en este modelo
    protected $rules = [
        'city' => 'required',
        'state_id' => 'required',
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $validationAttributes = [
        'name' => 'Ciudad'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $messages = [
        'city.required' => 'Este campo () es necesario'
    ];


    public function render()
    {
        //Obtengo los posts ordenados por id, desde el ultimo, con paginacion
        $cities = City::latest('id')->where('status', $this->status)->where('city', 'LIKE', "%{$this->search}%")->paginate($this->perPage);
        $estados = State::all();
        return view('cms.cities.city-component', compact('cities','estados'));
    }

    public function agregar()
    {
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'city' => 'required|max:60',
            'state_id' => 'required'
        ]);

        City::create([
            'city' => $this->city,
            'state_id' => $this->state_id
        ]);
        //reinicio las propiedades
        $this->reset(['city', 'state_id', 'action', 'city_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Creada exitosamente!';
    }

    public function edit(City $city)
    {
        $this->city_id = $city->id;
        $this->city = $city->city;
        $this->state_id = $city->state_id;

        $this->action = 'update';
    }

    public function update()
    {
        //validacion de valores
        $this->validate();

        $city = City::find($this->city_id);

        $city->update([
            'city' => $this->city,
            'state_id' => $this->state_id
        ]);

        //reinicio las propiedades
        $this->reset(['city', 'state_id', 'action', 'city_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'blue';
        $this->message_alert = 'Actualizada exitosamente!';
    }

    public function cancel()
    {
        $this->reset(['city', 'state_id', 'action', 'city_id', 'show_alert', 'message_alert', 'color_alert']);
    }

    public function destroy(City $city)
    {
        $city->delete();
        //reinicio las propiedades
        $this->reset(['city', 'state_id', 'action', 'city_id', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'Eliminada exitosamente!';
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

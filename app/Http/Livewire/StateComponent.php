<?php

namespace App\Http\Livewire;

use App\Models\State;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

//clase para crear paginacion dinamica, sin que se recargue la pagina
use Livewire\WithPagination;

class StateComponent extends Component
{
    //ahora uso la clase dentro del componente y listo!
    use WithPagination;

    protected $queryString = ['status' => ['except' => 'active'], 'search' => ['except' => ''], 'perPage'  => ['except' => '10']];

    public $state_id, $state, $code, $category_id, $message_alert, $color_alert;

    public $search = '';
    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';

    public $show_alert = 'false';

    //reglas de validacion, protected indica que solo se usara en este modelo
    protected $rules = [
        'state' => 'required'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $validationAttributes = [
        'name' => 'Estado'
    ];

    // para cambiar los nombres de los atributos de validacion que vienen por default
    protected $messages = [
        'state.required' => 'Este campo () es necesario'
    ];


    public function render()
    {
        //Obtengo los posts ordenados por id, desde el ultimo, con paginacion
        $estados = State::latest('id')->where('status', $this->status)->where('state', 'LIKE', "%{$this->search}%")->paginate($this->perPage);
        return view('cms.states.state-component', compact('estados'));
    }

    public function agregar()
    {
        //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
        $this->validate([
            'state' => 'required|max:60'
        ]);

        State::create([
            'state' => $this->state,
            'code' => $this->code
        ]);

        // elimino el cache
        Cache::forget('states');
        //reinicio las propiedades
        $this->reset(['state_id', 'state', 'code', 'action', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'green';
        $this->message_alert = 'Creado exitosamente!';
    }

    public function edit(State $state)
    {
        $this->state_id = $state->id;
        $this->state = $state->state;
        $this->code = $state->code;

        $this->action = 'update';
    }

    public function update()
    {
        //validacion de valores
        $this->validate();

        $state = State::find($this->state_id);

        $state->update([
            'state' => $this->state,
            'code' => $this->code
        ]);
        // elimino el cache
        Cache::forget('states');

        //reinicio las propiedades
        $this->reset(['state_id', 'state', 'code', 'action', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'blue';
        $this->message_alert = 'Actualizado exitosamente!';
    }

    public function cancel()
    {
        $this->reset(['state_id', 'state', 'code', 'action', 'show_alert', 'message_alert', 'color_alert']);
    }

    public function destroy(State $state)
    {
        $state->delete();
        //reinicio las propiedades
        $this->reset(['state_id', 'state', 'code', 'action', 'show_alert', 'message_alert', 'color_alert']);
        $this->show_alert = 'true';
        $this->color_alert = 'red';
        $this->message_alert = 'Eliminado exitosamente!';
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

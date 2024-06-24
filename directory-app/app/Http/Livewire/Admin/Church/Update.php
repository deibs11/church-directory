<?php

namespace App\Http\Livewire\Admin\Church;

use App\Models\Church;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $church;

    public $nombre;
    public $mapa;
    public $direccion;
    public $ciudad;
    public $estado;
    public $pais;
    public $cp;
    public $ubicacion_enlace;
    public $status;
    public $telefono;
    public $email;
    public $facebook;
    public $pagina_web;
    public $instagram;
    
    protected $rules = [
        'nombre' => 'required|min:7|max:50',
        'mapa' => 'required|min:50',
        'direccion' => 'required|min:10',
        'ciudad' => 'required|min:5',
        'estado' => 'required|min:6',
        'pais' => 'required|min:6',
        'cp' => 'required|min:5',
        'status' => 'required|min:6',        
    ];

    public function mount(Church $Church){
        $this->church = $Church;
        $this->nombre = $this->church->nombre;
        $this->mapa = $this->church->mapa;
        $this->direccion = $this->church->direccion;
        $this->ciudad = $this->church->ciudad;
        $this->estado = $this->church->estado;
        $this->pais = $this->church->pais;
        $this->cp = $this->church->cp;
        $this->ubicacion_enlace = $this->church->ubicacion_enlace;
        $this->status = $this->church->status;
        $this->telefono = $this->church->telefono;
        $this->email = $this->church->email;
        $this->facebook = $this->church->facebook;
        $this->pagina_web = $this->church->pagina_web;
        $this->instagram = $this->church->instagram;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Church') ]) ]);
        
        $this->church->update([
            'nombre' => $this->nombre,
            'mapa' => $this->mapa,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'estado' => $this->estado,
            'pais' => $this->pais,
            'cp' => $this->cp,
            'ubicacion_enlace' => $this->ubicacion_enlace,
            'status' => $this->status,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'pagina_web' => $this->pagina_web,
            'instagram' => $this->instagram,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.church.update', [
            'church' => $this->church
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Church') ])]);
    }
}

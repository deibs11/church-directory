<?php

namespace App\Http\Livewire\Admin\Church;

use App\Models\Church;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nombre;
    public $mapa;
    public $latitud;
    public $longitud;
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

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Church') ])]);
        
        Church::create([
            'nombre' => $this->nombre,
            'mapa' => $this->mapa,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
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

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.church.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Church') ])]);
    }
}

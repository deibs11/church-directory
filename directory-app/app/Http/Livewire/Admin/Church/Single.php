<?php

namespace App\Http\Livewire\Admin\Church;

use App\Models\Church;
use Livewire\Component;

class Single extends Component
{

    public $church;

    public function mount(Church $Church){
        $this->church = $Church;
    }

    public function delete()
    {
        $this->church->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Church') ]) ]);
        $this->emit('churchDeleted');
    }

    public function render()
    {
        return view('livewire.admin.church.single')
            ->layout('admin::layouts.app');
    }
}

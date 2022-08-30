<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\User;

class AlumnusProfileCard extends Component
{
    public $alumnus ;

    public function mount(User $alumnus){
        $this->alumnus = $alumnus;
    }
    public function render()
    {
        return view('livewire.components.alumnus-profile-card');
    }
}

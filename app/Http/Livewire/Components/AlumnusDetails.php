<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Foundation\Auth\User;

class AlumnusDetails extends Component
{
    public $alumnus ;
    public function mount(User $user){
        $this->alumnus = $user ;
    }
    public function render()
    {
        return view('livewire.components.alumnus-details', ["alumnus" => $this->alumnus]);
    }
}

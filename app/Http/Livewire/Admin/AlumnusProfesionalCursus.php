<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AlumnusProfesionalCursus extends Component
{
    public $experiences ;

    public function mount($experiences){
        $this->experiences = $experiences ;
    }
    public function render()
    {
        return view('livewire.admin.alumnus-profesional-cursus', ["experiences" => $this->experiences]);
    }
}

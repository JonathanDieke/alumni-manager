<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlumnusPersonalData extends Component
{

    protected $alumnus ;

    public function mount($alumnus){ 
        $this->alumnus = $alumnus ;
    }

    public function render()
    {
        return view('livewire.alumnus-personal-data', ["alumnus" => $this->alumnus]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlumnusPersonalData extends Component
{

    protected $alumnus ;

    public function mount($alumnus){
        dd('perso data');
        $this->alumnus = $alumnus ;
    }

    public function render()
    {
        dd('perso data');

        return view('livewire.alumnus-personal-data', ["alumnus" => $this->alumnus]);
    }
}

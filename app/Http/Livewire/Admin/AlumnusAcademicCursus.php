<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AlumnusAcademicCursus extends Component
{

    public $formations ;

    public function mount($formations){
        $this->formations = $formations ;
    }
    public function render()
    {
        return view('livewire.admin.alumnus-academic-cursus', ["formations" => $this->formations]);
    }
}

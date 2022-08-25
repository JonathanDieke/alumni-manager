<?php

namespace App\Http\Livewire\Alumni;

use Livewire\Component;
use App\Models\User;

class AlumniAlumnusDetails extends Component
{
    public $alumnus ;
    public function mount(User $user){
        $this->alumnus = $user ;
    }
    public function render()
    {
        return view('livewire.alumni.alumni-alumnus-details');
    }
}

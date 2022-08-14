<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAlumnusDetailsComponent extends Component
{

    public User $alumnus;
    public function mount(User $user){
        $this->alumnus = $user; 
    }
    public function render()
    {
        return view('livewire.admin.admin-alumnus-details-component', ["alumnus" => $this->alumnus])->layout('layouts.admin.app');
    }
}

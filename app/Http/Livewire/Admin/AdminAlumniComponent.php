<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Foundation\Auth\User;

class AdminAlumniComponent extends Component
{
    public $query = "queryyyyyyyy";
    public function mount(){
        $this->query = "queryyyyyyyyy";
    }
    public function render()
    {
        $alumni = User::all();
        return view('livewire.admin.alumni-component', compact('alumni'))->layout('layouts.admin.app');
    }
}

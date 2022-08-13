<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use \App\Models\User;

class AdminAlumniComponent extends Component
{

    public $query = "";
    public $modalIsOpen = true;

    public function mount(){

    }

    public function toggleModal(){
        $this->modalIsOpen = !$this->modalIsOpen ;
    }

    public function edit(User $alumni){
        dd("edit method", $alumni);
    }

    public function delete(User $alumni){
        dd("delete method", $alumni);
    }

    public function render()
    {
        $alumni = User::paginate(10);
        return view('livewire.admin.alumni-component', compact('alumni'))->layout('layouts.admin.app');
    }
}

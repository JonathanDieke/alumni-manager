<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use \App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\WithPagination;

class AdminAlumniComponent extends Component
{

    use WithPagination ;

    public $query = "";
    public $modalIsOpen = false;

    public $alumnus ;

    public function mount(){
        // $this->fill(['alumnus' => [],]);
    }

    public $listeners = ["delete", "deleteFromModal"] ;

    public function rules(){
        return [
            "alumnus.name" => ["required", "string", "min:3"],
            "alumnus.lname" => ["required", "string", "min:3"],
            "alumnus.email" => ["required", "email"],
            "alumnus.gender" => ["required", "in:male,female"],
            "alumnus.password" => ['required', 'confirmed', Password::default()],
        ];
    }

    public function create(){
        $this->toggleModal();
    }

    public function toggleModal(){
        $this->modalIsOpen = !$this->modalIsOpen ;
        $this->resetInputs();
    }

    public function store(){
        $data = $this->validate();

        User::create($data['alumnus']);

        session()->flash('message', "Enregistrement réussi !");
        $this->toggleModal();

    }

    public function edit(User $alumnus){
        $this->toggleModal();
        $this->alumnus = $alumnus ;
    }

    public function delete(User $alumnus){
        $alumnus->delete();
        $this->toggleModal();
    }

    public function deleteFromModal(){
        $this->alumnus->delete();
    }

    public function resetInputs(){
        $this->alumnus = [];
    }

    public function render()
    {
        $alumni = User::paginate(10);

        // dd($alumni);

        return view('livewire.admin.alumni-component', compact('alumni'))->layout('layouts.admin.app');
    }
}

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

    public $listeners = ["delete"];

    public function rules(){
        return [
            "alumnus.name" => ["required", "string", "min:3"],
            "alumnus.lname" => ["required", "string", "min:3"],
            "alumnus.email" => ["required", "email"],
            "alumnus.gender" => ["required", "in:male,female"],
            "alumnus.birthdate" => ["required", "date", 'before_or_equal:now'],
            "alumnus.job" => ["required", "string"],
            "alumnus.company" => ["required", "string"],
            "alumnus.tel" => ["required", "string", "numeric"],
            "alumnus.promotion" => ["required", "string"],
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

        if($this->alumnus instanceof User){
            $this->alumnus->update($data["alumnus"]);
            session()->flash('message', "Mise à jour réussie !");
        }else{
            User::create($data['alumnus']);
            session()->flash('message', "Enregistrement réussi !");
        }

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

    public function resetInputs(){
        $this->alumnus = [];
    }

    public function render()
    {
        if(!empty($this->query)){
            $q= "%".$this->query."%" ;
            $alumni = User::where('name', "like", $q)
                        ->orWhere("lname", "like", $q)
                        ->orWhere("email", "like", $q)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }else{
            $alumni = User::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('livewire.admin.alumni-component', compact('alumni'))->layout('layouts.admin.app');
    }
}

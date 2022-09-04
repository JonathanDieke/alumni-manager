<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use \App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AdminAlumniComponent extends Component
{
    use WithPagination ;

    public $query = "";
    public $modalIsOpen = false;
    public $alumnus ;

    public $listeners = ["delete"];

    public function rules(){
        return [
            "alumnus.fname" => ["required", "string", "min:3"],
            "alumnus.lname" => ["required", "string", "min:3"],
            "alumnus.email" => ["required", "email"],
            "alumnus.gender" => ["required", "in:male,female"],
            "alumnus.birthdate" => ["required", "date", 'before:'. now()->subYears(10)],
            "alumnus.job" => ["required", "string"],
            "alumnus.company" => ["required", "string"],
            "alumnus.tel" => ["required", "string", "numeric"],
            "alumnus.promotion" => ["required", "string", "starts_with:it"],
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
        $data['alumnus']['lname'] = Str::upper($data['alumnus']['lname']);
        $data['alumnus']['fname'] = Str::title($data['alumnus']['fname']);
        $data['alumnus']['job'] = Str::upper($data['alumnus']['job']);
        $data['alumnus']['company'] = Str::upper($data['alumnus']['company']);

        // dd($data);

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
            $alumni = User::where('fname', "like", Str::upper($q))
                        ->orWhere("lname", "like", Str::title($q))
                        ->orWhere("email", "like", $q)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }else{
            $alumni = User::orderBy('created_at', 'desc')->paginate(4);
        }

        return view('livewire.admin.alumni-component', compact('alumni'))->layout('layouts.admin.app');
    }
}

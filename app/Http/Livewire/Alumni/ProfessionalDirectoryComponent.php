<?php

namespace App\Http\Livewire\Alumni;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ProfessionalDirectoryComponent extends Component
{
    use WithPagination ;
    public $query = "" ;

    public function updatedQuery(){
        dd($this->query);
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

        return view('livewire.alumni.professional-directory-component', compact('alumni'))->layout('layouts.app');
    }
}

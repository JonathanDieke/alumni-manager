<?php

namespace App\Http\Livewire\Alumni;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProfessionalDirectoryComponent extends Component
{
    use WithPagination ;
    public $query = "" ;

    protected $listeners = ['refresh' => '$refresh'];

    public function updatedQuery(){
        // $this->emit("refresh");
    }

    public function render()
    {
        if(!empty($this->query)){
            $q= "%".$this->query."%" ;
            $alumni = User::where('fname', "like", Str::title($q))
                        ->orWhere("lname", "like", Str::upper($q))
                        ->orWhere("email", "like", $q)
                        ->orderBy('created_at', 'desc')
                        ->paginate(4);
            // dd($alumni);
        }else{
            $alumni = User::orderBy('created_at', 'desc')->paginate(4);
        }

        // dd($alumni);

        return view('livewire.alumni.professional-directory-component', compact('alumni'))->layout('layouts.app');
    }
}

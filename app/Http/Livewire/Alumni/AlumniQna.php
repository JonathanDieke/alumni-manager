<?php

namespace App\Http\Livewire\Alumni;

use App\Models\Question;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AlumniQna extends Component
{
    use WithPagination ;
    public $query = "" ;
    public $listeners = ['refresh' => '$refresh', 'refreshParent'] ;

    public function refreshParent(){
        $this->emit("refresh");
        session()->flash('message', "Enregistrement réussi !");
    }

    public function render()
    {
        Carbon::setLocale('fr');

        if(!empty($this->query)){
            $q= "%".$this->query."%" ;
            $questions = Question::where('title', "like", $q)
            ->orWhere("description", "like", $q)
            ->orWhere("keywords", "like", $q)
            ->paginate(10);
        }else{
            $questions = Question::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('livewire.alumni.alumni-qna', compact('questions'))->layout('layouts.app');
    }
}

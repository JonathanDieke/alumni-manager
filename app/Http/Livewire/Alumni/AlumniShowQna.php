<?php

namespace App\Http\Livewire\Alumni;

use App\Models\Question;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AlumniShowQna extends Component
{
    public $questionModalIsOpen = false ;
    public $question, $answer ;

    public $listeners = ['refresh' => '$refresh'] ;

    public function mount(Question $question){
        $this->question = $question;
    }

    public function addAnswer(){
        $data = $this->validate([
            "answer" => ['required', 'min:3']
        ]);

        // dd($data);

        $data['user_id'] = Auth::id();
        $data['question_id'] = $this->question->id;

        Answer::create($data);

        $this->answer = "";

        $this->emit("refresh");
        session()->flash('message', "Réponse postée !");
    }

    public function render()
    {
        Carbon::setLocale('fr');
        $answers = $this->question->answers ;

        return view('livewire.alumni.alumni-show-qna', compact('answers'));
    }
}

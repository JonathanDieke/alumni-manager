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

    public $listeners = ['refresh' => '$refresh', 'deleteAnswer', 'getCurrentQuestion'] ;

    public function mount(Question $question){
        $this->question = $question;
    }

    public function addAnswer(){
        $data = $this->validate([
            "answer" => ['required', 'min:3']
        ]);

        $data['user_id'] = Auth::id();
        $data['question_id'] = $this->question->id; 

        Answer::create($data);


        $this->emit("refresh");
        $this->dispatchBrowserEvent('clearAnswerInput');
        session()->flash('message', "Réponse postée !");
    }

    public function deleteAnswer(Answer $answer){
        $answer->delete();
        $this->emit('refresh');
    }

    public function isOwnerOfAnswer($answerUserId) {
        return Auth::id() === $answerUserId ;
    }

    public function getCurrentQuestion(){
        $this->emit('takeCurrentQuestion', $this->question);
    }

    public function render()
    {
        Carbon::setLocale('fr');
        $answers = $this->question->answers->sortByDesc('created_at') ;

        return view('livewire.alumni.alumni-show-qna', compact('answers'));
    }
}

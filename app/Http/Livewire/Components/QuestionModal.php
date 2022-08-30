<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionModal extends Component
{
    public $showEditButton ;
    public $questionModalIsOpen = false ;
    public $question, $questionEditing ;

    public $listeners = ['takeCurrentQuestion'];

    public function mount(?Question $questionEditing){
        $this->questionEditing = $questionEditing ;
    }

    public function isOwnerofQuestion() {
        return $this->questionEditing ? Auth::id() === $this->questionEditing->user->id : false ;
    }

    public function toggleQuestionModalCreate(){
        $this->reinitializeInputs();
        $this->questionModalIsOpen = !$this->questionModalIsOpen ;
    }

    public function toggleQuestionModalEdit(){
        // $this->emit('getCurrentQuestion');
        $this->question = $this->questionEditing->toArray() ;
        $this->questionModalIsOpen = !$this->questionModalIsOpen ;

        // dd($this->question);
    }

    public function takeCurrentQuestion($question){
        $this->question = $question ;
        // dd($this->question);
        $this->questionModalIsOpen = !$this->questionModalIsOpen ;
    }

    public function reinitializeInputs(){
        $this->question = [];
    }

    public function storeQuestion(){
        $data = $this->validate([
            "question.title" => ['required', 'string', 'min:3'],
            "question.description" => ['required', 'string', 'min:3'],
            "question.status" => ['required', 'in:open,closed,resolved'],
            "question.keywords" => ['nullable', 'string'],
        ]);

        $data['question']['user_id'] = Auth::id();

        Question::create($data["question"]);

        $this->toggleQuestionModalCreate();
        $this->emitUp("refreshParent");
    }

    public function render()
    {
        return view('livewire.components.question-modal');
    }
}

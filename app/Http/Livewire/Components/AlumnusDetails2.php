<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Experience;
use App\Models\AcademicFormation;

class AlumnusDetails2 extends Component
{
    
    public $XPModalIsOpen = false, $profileModalIsOpen = false, $formationModalIsOpen = false ;
    public $alumnus, $experience, $formation;
    protected $listeners = ['refresh' => '$refresh', 'deleteXP', 'deleteFormation'];
    
    protected $rules = [
        // alumnus
        "alumnus.name" => ["required", "string", "min:3"],
        "alumnus.lname" => ["required", "string", "min:3"],
        "alumnus.email" => ["required", "email"],
        "alumnus.gender" => ["required", "in:male,female"],
        "alumnus.birthdate" => ["required", "date", 'before_or_equal:now'],
        "alumnus.job" => ["required", "string"],
        "alumnus.company" => ["required", "string"],
        "alumnus.promotion" => ["required", "string"],
        "alumnus.tel" => ["required", "string", "numeric"],
    ];

    public function mount(User $user){
        $this->alumnus = $user ;
    }


    public function toggleProfileModal(){
        $this->profileModalIsOpen = !$this->profileModalIsOpen ;
        $this->resetErrorBag();
        $this->alumnus->birthdate = date("Y-m-d", strtotime($this->alumnus->birthdate));
    }

    public function updateProfile(){
        $data = $this->validate();

        $this->alumnus->save();

        $this->toggleProfileModal();
        $this->emit('refresh');
        session()->flash('message', "Mise à jour réussie !");
    }

    public function toggleXPModal(){
        $this->XPModalIsOpen = !$this->XPModalIsOpen ;
        $this->reinitializeXP();
        $this->resetErrorBag();
    }

    public function storeXP(){
        $data = $this->validate([
            // XP
            "experience.title" => ["required", "string", "min:3"],
            "experience.company" => ["required", "string"],
            "experience.localization" => ["required", "string"],
            "experience.start_date" => ["required", 'date', 'before_or_equal:now'],
            "experience.end_date" => ["required", 'date', 'after_or_equal:experience.start_date'],
        ]);

        $data['experience']['user_id'] = Auth::id();
        Experience::updateOrCreate(["id" => $this->experience['id'] ?? ""], $data['experience']);

        $this->toggleXPModal(); 
        $this->emit('refresh');
        session()->flash('message', "Enregistrement réussi !");
    }

    public function editXP($experience){
        $this->toggleXPModal();

        $this->experience = $experience ; 
        $this->experience['start_date'] = date("Y-m-d", strtotime($this->experience['start_date']));
        $this->experience['end_date'] = date("Y-m-d", strtotime($this->experience['end_date']));
    }

    public function deleteXP(Experience $experience){
        $experience->delete();
        $this->emit('refresh');
    }

    public function reinitializeXP(){
        $this->experience = [];
    }

    public function toggleFormationModal(){
        $this->formationModalIsOpen = !$this->formationModalIsOpen ;
        $this->reinitializeFormation() ;
        $this->resetErrorBag();
    }

    public function storeFormation(){
        $data = $this->validate([
             // formations
             "formation.name" => ["required", "string", "min:3"],
             "formation.level" => ["required", "string", "in:bac,bac1,bac2,bac3,bac4,bac5,bac6,bac7,bac8"],
             "formation.school" => ["required", "string", "min:3"],
             "formation.start_year" => ["required", "date", "before_or_equal:now"],
             "formation.end_year" => ["required", "date", "after_or_equal:start_year"],
        ]);

        $data['formation']['user_id'] = Auth::id();
        AcademicFormation::updateOrCreate(["id" => $this->formation['id'] ?? ""], $data['formation']); 

        $this->toggleFormationModal(); 
        $this->emit('refresh');
        session()->flash('message', "Enregistrement réussi !");
    }

    public function editFormation($formation){
        $this->toggleFormationModal();

        $this->formation = $formation ; 
        // dd($this->formation);
        $this->formation['start_year'] = date("Y-m-d", strtotime($this->formation['start_year']));
        $this->formation['end_year'] = date("Y-m-d", strtotime($this->formation['end_year']));
        // $this->formation['level'] = $this->formation['level'] ;
    }

    public function deleteFormation(AcademicFormation $formation){
        $formation->delete();
        $this->emit('refresh');
    }

    public function reinitializeFormation(){
        $this->formation = [];
    }
    public function isAuthUser() {
        return Auth::id() === $this->alumnus->id ;
    } 

    public function render()
    {
        $experiences = $this->alumnus->experiences ;
        $formations = $this->alumnus->academicFormations ;
        return view('livewire.components.alumnus-details2', compact('experiences', 'formations'));
    }
}

<?php

namespace App\Http\Livewire\Alumni;

use Livewire\Component;
use App\Models\Offer;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AlumniOffersComponent extends Component
{
    use WithPagination ;

    public $query = "", $filter="stage";
    public $modalIsOpen = false ;
    public $alumnus ;
    public $offer ;

    public $listeners = ["delete"];

    public function mount(?User $user){
        $this->alumnus = $user ;
    }

    public function rules(){
        return [
            "offer.title" => ["required", "string", "min:3"],
            "offer.description" => ["required", "string", "min:3", "max:256"],
            "offer.type" => ["required", "string", "in:job,stage"],
            "offer.company" => ["required", "string"],
            "offer.localization" => ["required", "string"],
            "offer.deadline" => ["required", 'date', 'after_or_equal:now'],
        ];
    }

    public function create(){
        $this->toggleModal();
    }

    public function toggleModal(){
        $this->modalIsOpen = !$this->modalIsOpen ;
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function resetInputs(){
        $this->offer = [];
    }
    public function store(){
        $data = $this->validate();
        // dd($data);

        if($this->offer instanceof Offer){
            $this->offer->update($data["offer"]);
            session()->flash('message', "Mise à jour réussie !");
            // dd("nice working !");
        }else{
            $data['offer']['user_id'] = Auth::id();
            // dd("not working !");

            Offer::create($data['offer']);

            session()->flash('message', "Enregistrement réussi !");
        }

        $this->toggleModal();
    }

    public function edit(Offer $offer){
        $this->toggleModal();
        $this->offer = $offer ;
        $this->offer->deadline = date("Y-m-d", strtotime($this->offer->deadline));
        // $this->offer['deadline'] = explode(" ", $this->offer['deadline'])[0] ;
        // $this->offer['deadline'] = str_replace(search:"-", replace:"/", subject:$this->offer['deadline']);
        // dd($this->offer);
    }

    public function delete(Offer $offer){
        $offer->delete();
    }

    public function render()
    {
        $q= "%".$this->query."%" ;
        if(!empty($this->alumnus->toArray())){
            $offers =  Offer::where("user_id", Auth::id())
            ->where(function ($query) use ($q){
                if(!empty($this->query)){
                    $query->where("title", "like", $q)
                    ->orWhere("id", "like", $q)
                    ->orWhere("description", "like", $q)
                    ->orWhere("company", "like", $q)
                    ->orWhere("localization", "like", $q)
                    ->orderBy('created_at', 'desc');
                }
            });
        }else{
            $offers = Offer::orderBy('created_at', 'desc');
            if(!empty($this->query)){
                $offers = $offers->where("title", "like", $q)
                ->orWhere("id", "like", $q)
                ->orWhere("description", "like", $q)
                ->orWhere("company", "like", $q)
                ->orWhere("localization", "like", $q)
                ->orderBy('created_at', 'desc');
            }
        }

        $count = $offers->count();
        $offers = $offers->paginate(4);

        return view('livewire.alumni.alumni-offers-component', compact('offers', 'count'));
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Offer;
use Livewire\WithPagination;
use App\Models\User;

class AdminOffersComponent extends Component
{
    use WithPagination ;

    public $query = "", $filter="stage";
    public $modalIsOpen = false ;
    public $offer ;
    public User $alumnus ;
    public $listeners = ["delete"];

    public function mount(?User $user){ 
        $this->alumnus = $user ;
    } 
    public function render()
    {
        $q= "%".$this->query."%" ;
        if(!empty($this->query)){
            $offers = Offer::where("title", "like", $q)
            ->orWhere("description", "like", $q)
            ->orWhere("company", "like", $q)
            ->orWhere("localization", "like", $q)
            ->orderBy('created_at', 'desc');
        }
        // else if (!empty($this->alumnus->all())){
        //     // dd($this->alumnus->offers->toArray());
        //     $offers = Offer::where('user_id', $this->alumnus->id)->get();
        //     dd($offers);
        //     $offers = $offers->where("title", "like", $q)
        //     ->orWhere("description", "like", $q)
        //     ->orWhere("company", "like", $q)
        //     ->orWhere("localization", "like", $q)
        //     ->orderBy('created_at', 'desc');
        // }
        else{
            $offers = Offer::orderBy('created_at', 'desc');
        }
        
        $count = $offers->count();
        $offers = $offers->paginate(3);
            
        // dd($offers);
        return view('livewire.admin.admin-offers-component', compact('offers', 'count'));
    }
}

<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;

class OffersListComponent extends Component
{
    use WithPagination ;
    
    protected $offers; 
    public $count ;
    public function mount($offers, $count){
        $this->offers = $offers ;  
    }

    public function hydrated(){
        echo 'reloading...';
    }
    public function render()
    { 
        return view('livewire.components.offers-list-component', ["offers" => $this->offers]);
    }
}

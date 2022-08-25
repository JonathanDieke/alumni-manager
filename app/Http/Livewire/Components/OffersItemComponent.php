<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class OffersItemComponent extends Component
{
    public $offer ;
    public function render()
    {
        return view('livewire.components.offers-item-component');
    }
}

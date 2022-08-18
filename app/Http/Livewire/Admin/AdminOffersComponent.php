<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminOffersComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-offers-component')->layout('layouts.admin.app');
    }
}

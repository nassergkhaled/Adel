<?php

namespace App\Livewire;

use App\Http\Controllers\witnessesController;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Invoices extends Component
{

    public function render()
    {
        return view('livewire.invoices');
    }
}

<?php

namespace App\Livewire;

use App\Models\requestedFund;
use Livewire\Component;

class RequestedFunds extends Component
{
    public $data;
    public $requestedFunds;
    public function mount()
    {
        $this->requestedFunds = requestedFund::all();

    }
    public function render()
    {
        return view('livewire.requested-funds');
    }
}

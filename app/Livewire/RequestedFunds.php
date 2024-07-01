<?php

namespace App\Livewire;

use App\Models\requestedFund;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequestedFunds extends Component
{
    public $data;
    public $requestedFunds;
    public function mount()
    {
        $user = Auth::user();
        if ($user->role === "Lawyer") {
            $myCasesIds = $user->lawyer->legalCases->pluck('id');
            $myRequestedFunds = RequestedFund::whereIn('case_id', $myCasesIds)->get();
            $this->data += [
                'requestedFunds' => $myRequestedFunds,
            ];
        }
    }
    public function render()
    {
        return view('livewire.requested-funds');
    }
}

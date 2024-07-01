<?php

namespace App\Livewire;

use App\Http\Controllers\witnessesController;
use App\Models\invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Invoices extends Component
{
    public $data;


    public function mount()
    {
        $user = Auth::user();
        if ($user->role === "Lawyer") {
            $myCasesIds = $user->lawyer->legalCases->pluck('id');
            $myInvoices = invoice::whereIn('case_id', $myCasesIds)->get();
            $this->data += [
                'invoices' => $myInvoices,
            ];
        }
    }
    public function render()
    {
        return view('livewire.invoices');
    }
}

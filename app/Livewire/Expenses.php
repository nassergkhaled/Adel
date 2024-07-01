<?php

namespace App\Livewire;

use App\Models\expense;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Expenses extends Component
{
    public $expenses;
    public $data;

    public function mount()
    {
        $user = Auth::user();
        if ($user->role === "Lawyer") {
            $myCasesIds = $user->lawyer->legalCases->pluck('id');
            $myExpenses = expense::whereIn('case_id', $myCasesIds)->get();
            $this->data += [
                'expenses' => $myExpenses,
            ];
        }
    }

    public function render()
    {
        return view('livewire.expenses');
    }
}

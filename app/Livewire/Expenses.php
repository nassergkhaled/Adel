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
        $this->expenses = expense::all();

    }

    public function render()
    {
        return view('livewire.expenses');
    }
}

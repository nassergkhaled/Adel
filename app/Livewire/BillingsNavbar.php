<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillingsNavbar extends Component
{

    public $Tab = "invoices";
    protected $queryString = ['Tab'];

    public $data;

    public function mount()
    {
        $this->data["lawyer"] = Auth::user()->lawyer;
    }

    public function changeTab($Tab)
    {
        $this->Tab = $Tab;
    }
    public function render()
    {
        return view('livewire.billings-navbar');
    }
}

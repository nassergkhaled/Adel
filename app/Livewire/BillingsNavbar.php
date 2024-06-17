<?php

namespace App\Livewire;

use Livewire\Component;

class BillingsNavbar extends Component
{

    public $Tab = "invoices";
    protected $queryString = ['Tab'];


    public function changeTab($Tab)
    {
        $this->Tab = $Tab;
    }
    public function render()
    {
        return view('livewire.billings-navbar');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class BillingsNavbar extends Component
{
    public $page = "invoices";

    public function changePage($page)
    {
        $this->page = $page;
    }
    public function render()
    {
        return view('livewire.billings-navbar');
    }
}

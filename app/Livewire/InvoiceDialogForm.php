<?php

namespace App\Livewire;

use App\Models\LegalCase;
use Livewire\Component;

class InvoiceDialogForm extends Component
{
    public $data;
    public $expenses;
    public $funds;

    public function selectCase($case_id)
    {
        $legalCase = LegalCase::find($case_id);
        $this->expenses = $legalCase->expenses->where('invoice_id', null);
        $this->funds = $legalCase->requestedFunds->where('paid_amount', '>', '0')->where('invoice_id', null)->sortByDesc('pay_date');
    }
    public function render()
    {
        return view('livewire.invoice-dialog-form');
    }
}

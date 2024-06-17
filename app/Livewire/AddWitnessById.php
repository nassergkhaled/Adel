<?php

namespace App\Livewire;

use App\Models\Witness;
use Livewire\Component;

class AddWitnessById extends Component
{

    public $case;
    public $state = 'start';
    public $Witness_id_number = null;
    public $witness = false;
    public $valError = false;

    public function changeState($newState)
    {
        $this->state = $newState;
    }
    public function mount($case, $valError)
    {
        $this->case = $case;
        if ($valError === true)
            $this->state = null;
    }

    public function existWitness()
    {
        $witness = Witness::where('ID_no', $this->Witness_id_number)->first();
        if ($witness) {
            $this->witness = $witness;
        } else {
            $this->witness = false;
        }
        $this->state = null;
    }
    public function render()
    {
        return view('livewire.add-witness-by-id');
    }
}

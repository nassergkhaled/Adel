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
    public $sessionId = null;
    public $session_name;

    public function changeState($newState)
    {
        $this->state = $newState;
    }
    public function mount($case, $valError, $sessionId)
    {
        $this->case = $case;
        if ($valError === true)
            $this->state = null;
        $this->sessionId = $sessionId;
        $this->session_name = session()->get('session_name');
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

<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class AddClient extends Component
{

    public $clientId;
    public $client = 'start';
    public $loading = true;



    public function existClient()
    {
        $client = Client::where('id_number', $this->clientId)->first();
        if ($client) {
            $this->client = $client;
        } else {
            $this->client = false;
        }
    }



    public function render()
    {
        return view('livewire.add-client');
    }
}

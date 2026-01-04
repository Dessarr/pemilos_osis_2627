<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kandidat as KandidatModel;

class Kandidat extends Component
{
    public $selectedKandidatId = null;
    public $showModal = false;

    public function openModal($kandidatId)
    {
        $this->selectedKandidatId = $kandidatId;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedKandidatId = null;
    }

    public function render()
    {
        $kandidat = KandidatModel::all();
        $selectedKandidat = $this->selectedKandidatId 
            ? KandidatModel::find($this->selectedKandidatId) 
            : null;
        
        return view('livewire.kandidat', [
            'kandidat' => $kandidat,
            'selectedKandidat' => $selectedKandidat
        ]);
    }
}

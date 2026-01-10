<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\VoteService;

class Voting extends Component
{
    public $kandidatId;
    public $error = '';
    public $success = false;

    public function mount($kandidatId)
    {
        $this->kandidatId = $kandidatId;
    }

    public function submitVote()
    {
        $murid = Auth::guard('siswa')->user();
        
        if (!$murid) {
            $this->error = 'Anda harus login terlebih dahulu';
            return redirect()->route('home');
        }

        // Check if already voted
        if ($murid->has_voted) {
            $this->error = 'Anda sudah melakukan voting';
            return;
        }

        $result = VoteService::processVote($murid->nis, $this->kandidatId);

        if ($result['success']) {
            $this->success = true;
            $this->dispatch('vote-success');
        } else {
            $this->error = $result['message'];
        }
    }

    public function render()
    {
        $kandidat = \App\Models\Kandidat::find($this->kandidatId);
        return view('livewire.voting', compact('kandidat'));
    }
}


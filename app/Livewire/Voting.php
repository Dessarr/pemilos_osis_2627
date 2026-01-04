<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\VoteService;

class Voting extends Component
{
    public $kandidatId;
    public $token = '';
    public $error = '';
    public $success = false;

    public function mount($kandidatId)
    {
        $this->kandidatId = $kandidatId;
    }

    public function validateToken()
    {
        $this->validate([
            'token' => 'required|string|size:12',
        ]);

        $this->error = '';
        
        // Real-time validation
        if (strlen($this->token) === 12) {
            // Token format valid, will validate on submit
        }
    }

    public function submitVote()
    {
        $this->validate([
            'token' => 'required|string|size:12',
        ]);

        $siswa = Auth::guard('siswa')->user();
        
        if (!$siswa) {
            return redirect()->route('home');
        }

        $result = VoteService::processVote($siswa->nis, $this->kandidatId, strtoupper($this->token));

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


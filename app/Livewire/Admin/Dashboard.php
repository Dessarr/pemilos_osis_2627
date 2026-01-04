<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\VoteService;

class Dashboard extends Component
{
    public $stats = [];
    public $votesPerDay = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->stats = VoteService::getStatistics();
        $this->votesPerDay = VoteService::getVotesPerDay();
    }

    public function resetVotes()
    {
        if (VoteService::resetAllVotes()) {
            session()->flash('message', 'Semua data voting berhasil direset');
            $this->loadData();
        } else {
            session()->flash('error', 'Gagal mereset data voting');
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}


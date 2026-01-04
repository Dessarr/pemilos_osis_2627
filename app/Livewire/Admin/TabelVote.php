<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vote;

class TabelVote extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $votes = Vote::with(['kandidat'])
            ->when($this->search, function ($query) {
                $query->where('nis', 'like', '%' . $this->search . '%')
                    ->orWhere('token', 'like', '%' . $this->search . '%');
            })
            ->orderBy('voted_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.tabel-vote', compact('votes'));
    }
}


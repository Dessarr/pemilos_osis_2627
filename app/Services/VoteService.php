<?php

namespace App\Services;

use App\Models\Murid;
use App\Models\Kandidat;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class VoteService
{
    /**
     * Process a vote
     */
    public static function processVote(string $nis, int $kandidatId): array
    {
        try {
            DB::beginTransaction();

            // Check if murid exists
            $murid = Murid::where('nis', $nis)->first();
            if (!$murid) {
                return ['success' => false, 'message' => 'NIS tidak terdaftar'];
            }

            // Check if already voted
            if ($murid->has_voted) {
                return ['success' => false, 'message' => 'Anda sudah melakukan voting'];
            }

            // Check if kandidat exists
            $kandidat = Kandidat::find($kandidatId);
            if (!$kandidat) {
                return ['success' => false, 'message' => 'Kandidat tidak ditemukan'];
            }

            // Create vote
            Vote::create([
                'kandidat_id' => $kandidatId,
                'voted_at' => now(),
            ]);

            // Mark murid as voted
            $murid->update([
                'has_voted' => true,
            ]);

            DB::commit();

            return ['success' => true, 'message' => 'Voting berhasil! Terima kasih atas partisipasi Anda.'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()];
        }
    }

    /**
     * Get vote statistics
     */
    public static function getStatistics(): array
    {
        $totalVotes = Vote::count();
        $paslon1Votes = Vote::where('kandidat_id', 1)->count();
        $paslon2Votes = Vote::where('kandidat_id', 2)->count();

        return [
            'total_votes' => $totalVotes,
            'paslon1_votes' => $paslon1Votes,
            'paslon2_votes' => $paslon2Votes,
            'paslon1_percentage' => $totalVotes > 0 ? round(($paslon1Votes / $totalVotes) * 100, 2) : 0,
            'paslon2_percentage' => $totalVotes > 0 ? round(($paslon2Votes / $totalVotes) * 100, 2) : 0,
        ];
    }

    /**
     * Get votes per day
     */
    public static function getVotesPerDay(): array
    {
        return Vote::selectRaw('DATE(voted_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'count' => $item->count,
                ];
            })
            ->toArray();
    }

    /**
     * Reset all votes (admin only)
     */
    public static function resetAllVotes(): bool
    {
        try {
            DB::beginTransaction();

            // Delete all votes
            Vote::truncate();

            // Reset has_voted for all murid
            Murid::query()->update([
                'has_voted' => false,
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}


<?php

namespace App\Services;

use App\Models\Siswa;
use App\Models\Kandidat;
use App\Models\Token;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class VoteService
{
    /**
     * Process a vote
     */
    public static function processVote(string $nis, int $kandidatId, string $token): array
    {
        try {
            DB::beginTransaction();

            // Check if siswa exists
            $siswa = Siswa::where('nis', $nis)->first();
            if (!$siswa) {
                return ['success' => false, 'message' => 'NIS tidak terdaftar'];
            }

            // Check if already voted (cek di table votes)
            $existingVote = Vote::where('nis', $nis)->first();
            if ($existingVote) {
                return ['success' => false, 'message' => 'Anda sudah melakukan voting'];
            }

            // Check if token is valid
            $tokenModel = Token::where('token', $token)->first();
            if (!$tokenModel) {
                return ['success' => false, 'message' => 'Token tidak valid'];
            }

            // Check if token is already used
            if ($tokenModel->is_used) {
                return ['success' => false, 'message' => 'Token sudah digunakan'];
            }

            // Check if kandidat exists
            $kandidat = Kandidat::find($kandidatId);
            if (!$kandidat) {
                return ['success' => false, 'message' => 'Kandidat tidak ditemukan'];
            }

            // Create vote
            Vote::create([
                'nis' => $nis,
                'kandidat_id' => $kandidatId,
                'token' => $token,
                'voted_at' => now(),
            ]);

            // Mark token as used
            $tokenModel->update([
                'is_used' => true,
                'used_by_nis' => $nis,
                'used_at' => now(),
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
        $availableTokens = Token::where('is_used', false)->count();

        return [
            'total_votes' => $totalVotes,
            'paslon1_votes' => $paslon1Votes,
            'paslon2_votes' => $paslon2Votes,
            'available_tokens' => $availableTokens,
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

            // Reset all tokens
            Token::query()->update([
                'is_used' => false,
                'used_by_nis' => null,
                'used_at' => null,
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}


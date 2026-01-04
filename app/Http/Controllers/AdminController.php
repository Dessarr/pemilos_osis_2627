<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Services\VoteService;
use Spatie\Browsershot\Browsershot;

class AdminController extends Controller
{
    public function exportPdf()
    {
        $stats = VoteService::getStatistics();
        $votes = Vote::with('kandidat')->orderBy('voted_at', 'desc')->get();
        
        $html = view('admin.export-pdf', compact('stats', 'votes'))->render();
        
        try {
            $pdf = Browsershot::html($html)
                ->pdf()
                ->save(storage_path('app/reports/voting-report.pdf'));
            
            return response()->download(storage_path('app/reports/voting-report.pdf'))
                ->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            // Fallback: return HTML view
            return view('admin.export-pdf', compact('stats', 'votes'));
        }
    }

    public function exportCsv()
    {
        $votes = Vote::with('kandidat')->orderBy('voted_at', 'desc')->get();
        
        $filename = 'voting-report-' . date('Y-m-d-H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($votes) {
            $file = fopen('php://output', 'w');
            
            // Header
            fputcsv($file, ['NIS', 'Paslon', 'Token', 'Waktu Vote']);
            
            // Data
            foreach ($votes as $vote) {
                fputcsv($file, [
                    $vote->nis,
                    'Paslon ' . $vote->kandidat_id . ' - ' . $vote->kandidat->nama,
                    $vote->token,
                    $vote->voted_at->format('Y-m-d H:i:s'),
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}

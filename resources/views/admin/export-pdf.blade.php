<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Voting OSIS 2025</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            color: #4551ff;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4551ff;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Laporan Voting OSIS 2025</h1>
    <p><strong>Total Vote:</strong> {{ $stats['total_votes'] }}</p>
    <p><strong>Paslon 1:</strong> {{ $stats['paslon1_votes'] }} ({{ $stats['paslon1_percentage'] }}%)</p>
    <p><strong>Paslon 2:</strong> {{ $stats['paslon2_votes'] }} ({{ $stats['paslon2_percentage'] }}%)</p>
    
    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Paslon</th>
                <th>Token</th>
                <th>Waktu Vote</th>
            </tr>
        </thead>
        <tbody>
            @foreach($votes as $vote)
                <tr>
                    <td>{{ $vote->nis }}</td>
                    <td>Paslon {{ $vote->kandidat_id }}</td>
                    <td>{{ $vote->token }}</td>
                    <td>{{ $vote->voted_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


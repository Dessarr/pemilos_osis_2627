<div>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="text-gray-600 text-sm mb-1">Total Vote</div>
            <div class="text-3xl font-bold text-gray-800">{{ $stats['total_votes'] ?? 0 }}</div>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="text-gray-600 text-sm mb-1">Paslon 1</div>
            <div class="text-3xl font-bold text-[#4551ff]">{{ $stats['paslon1_votes'] ?? 0 }}</div>
            <div class="text-sm text-gray-500 mt-1">{{ $stats['paslon1_percentage'] ?? 0 }}%</div>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="text-gray-600 text-sm mb-1">Paslon 2</div>
            <div class="text-3xl font-bold text-[#ffd45e]">{{ $stats['paslon2_votes'] ?? 0 }}</div>
            <div class="text-sm text-gray-500 mt-1">{{ $stats['paslon2_percentage'] ?? 0 }}%</div>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="text-gray-600 text-sm mb-1">Token Tersisa</div>
            <div class="text-3xl font-bold text-gray-800">{{ $stats['available_tokens'] ?? 0 }}</div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Pie Chart -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Perbandingan Suara</h3>
            <div id="pieChart" style="min-height: 300px;"></div>
        </div>

        <!-- Bar Chart -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Vote per Hari</h3>
            <div id="barChart" style="min-height: 300px;"></div>
        </div>
    </div>

    <!-- Actions -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Aksi Admin</h3>
        <div class="grid md:grid-cols-3 gap-4">
            <a href="{{ route('admin.export.pdf') }}" 
               class="bg-[#4551ff] hover:bg-[#3540e6] text-white font-semibold py-3 px-6 rounded-lg text-center transition">
                Export PDF
            </a>
            <a href="{{ route('admin.export.csv') }}" 
               class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg text-center transition">
                Export CSV
            </a>
            <button wire:click="resetVotes" 
                    onclick="return confirm('Apakah Anda yakin ingin mereset semua data voting? Tindakan ini tidak dapat dibatalkan!')"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition">
                Reset All Votes
            </button>
        </div>
    </div>

    <!-- Tabel Vote -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Daftar Voting</h3>
        @livewire('admin.tabel-vote')
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pie Chart
        const pieOptions = {
            series: [{{ $stats['paslon1_votes'] ?? 0 }}, {{ $stats['paslon2_votes'] ?? 0 }}],
            chart: {
                type: 'pie',
                height: 300
            },
            labels: ['Paslon 1', 'Paslon 2'],
            colors: ['#4551ff', '#ffd45e'],
            legend: {
                position: 'bottom'
            }
        };
        const pieChart = new ApexCharts(document.querySelector("#pieChart"), pieOptions);
        pieChart.render();

        // Bar Chart
        const votesPerDay = @json($votesPerDay);
        const barOptions = {
            series: [{
                name: 'Vote',
                data: votesPerDay.map(item => item.count)
            }],
            chart: {
                type: 'bar',
                height: 300
            },
            xaxis: {
                categories: votesPerDay.map(item => item.date)
            },
            colors: ['#4551ff'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false
                }
            }
        };
        const barChart = new ApexCharts(document.querySelector("#barChart"), barOptions);
        barChart.render();
    });
</script>
@endpush


<div>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <!-- Total Vote Card -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform transition-all duration-200 hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-between mb-2">
                <div class="text-blue-100 text-sm font-medium">Total Vote</div>
                <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div class="text-4xl font-bold">{{ $stats['total_votes'] ?? 0 }}</div>
            <div class="text-blue-100 text-xs mt-2">Total suara masuk</div>
        </div>

        <!-- Paslon 1 Card -->
        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white transform transition-all duration-200 hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-between mb-2">
                <div class="text-indigo-100 text-sm font-medium">Paslon 1</div>
                <svg class="w-8 h-8 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div class="text-4xl font-bold">{{ $stats['paslon1_votes'] ?? 0 }}</div>
            <div class="flex items-center gap-2 mt-2">
                <div class="text-indigo-100 text-xs">{{ $stats['paslon1_percentage'] ?? 0 }}%</div>
                <div class="flex-1 bg-indigo-400 rounded-full h-2">
                    <div class="bg-white rounded-full h-2" style="width: {{ min($stats['paslon1_percentage'] ?? 0, 100) }}%"></div>
                </div>
            </div>
        </div>

        <!-- Paslon 2 Card -->
        <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl shadow-lg p-6 text-white transform transition-all duration-200 hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-between mb-2">
                <div class="text-yellow-100 text-sm font-medium">Paslon 2</div>
                <svg class="w-8 h-8 text-yellow-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div class="text-4xl font-bold">{{ $stats['paslon2_votes'] ?? 0 }}</div>
            <div class="flex items-center gap-2 mt-2">
                <div class="text-yellow-100 text-xs">{{ $stats['paslon2_percentage'] ?? 0 }}%</div>
                <div class="flex-1 bg-yellow-300 rounded-full h-2">
                    <div class="bg-white rounded-full h-2" style="width: {{ min($stats['paslon2_percentage'] ?? 0, 100) }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
        <!-- Pie Chart -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-800">Perbandingan Suara</h3>
                <div class="flex gap-2">
                    <div class="flex items-center gap-1">
                        <div class="w-3 h-3 rounded-full bg-[#4551ff]"></div>
                        <span class="text-xs text-gray-600">Paslon 1</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <div class="w-3 h-3 rounded-full bg-[#ffd45e]"></div>
                        <span class="text-xs text-gray-600">Paslon 2</span>
                    </div>
                </div>
            </div>
            <div id="pieChart" style="min-height: 400px;"></div>
        </div>
    </div>

    <!-- Actions -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Aksi Admin
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="{{ route('admin.export.pdf') }}" 
               class="bg-[#4551ff] hover:bg-[#3540e6] text-white font-semibold py-3 px-6 rounded-lg text-center transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                Export PDF
            </a>
            <a href="{{ route('admin.export.csv') }}" 
               class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg text-center transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Export CSV
            </a>
            <button wire:click="resetVotes" 
                    onclick="return confirm('Apakah Anda yakin ingin mereset semua data voting? Tindakan ini tidak dapat dibatalkan!')"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Reset All Votes
            </button>
        </div>
    </div>

    <!-- Tabel Vote -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            Daftar Voting
        </h3>
        @livewire('admin.tabel-vote')
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Wait for Livewire to finish loading
        if (typeof window.ApexCharts === 'undefined') {
            console.error('ApexCharts is not loaded');
            return;
        }

        // Pie Chart
        const pieElement = document.querySelector("#pieChart");
        if (pieElement) {
            const pieOptions = {
                series: [{{ $stats['paslon1_votes'] ?? 0 }}, {{ $stats['paslon2_votes'] ?? 0 }}],
                chart: {
                    type: 'pie',
                    height: 400,
                    fontFamily: 'Poppins, sans-serif',
                    toolbar: {
                        show: false
                    }
                },
                labels: ['Paslon 1', 'Paslon 2'],
                colors: ['#4551ff', '#ffd45e'],
                legend: {
                    position: 'bottom',
                    fontSize: '14px',
                    fontFamily: 'Poppins',
                    fontWeight: 500
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '14px',
                        fontFamily: 'Poppins',
                        fontWeight: 600
                    },
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex] + ' (' + val.toFixed(1) + '%)';
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + ' suara';
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 280
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            
            try {
                const pieChart = new ApexCharts(pieElement, pieOptions);
                pieChart.render();
            } catch (error) {
                console.error('Error rendering pie chart:', error);
                pieElement.innerHTML = '<div class="flex items-center justify-center h-full text-gray-500">Gagal memuat chart</div>';
            }
        }

    });

    // Re-render charts when Livewire updates
    document.addEventListener('livewire:load', function() {
        Livewire.hook('message.processed', (message, component) => {
            if (component.fingerprint.name === 'admin.dashboard') {
                setTimeout(() => {
                    const pieElement = document.querySelector("#pieChart");
                    if (pieElement && pieElement.innerHTML.trim() === '') {
                        location.reload();
                    }
                }, 100);
            }
        });
    });
</script>
@endpush


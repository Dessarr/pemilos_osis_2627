<div>
    <!-- Kandidat Cards -->
    <div class="grid md:grid-cols-2 gap-6 md:gap-8">
        @foreach($kandidat as $item)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="h-64 bg-gradient-to-br from-[#4551ff] to-[#3540e6] flex items-center justify-center relative">
                    @if($item->gambar)
                        <img src="{{ $item->gambar }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-white text-6xl font-bold">{{ $item->id }}</div>
                    @endif
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                        <h3 class="text-white text-xl font-bold">{{ $item->nama }}</h3>
                        <p class="text-white/90 text-sm">{{ $item->ketos_nama }} & {{ $item->waketos_nama }}</p>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ \Illuminate\Support\Str::limit($item->visi, 100) }}</p>
                    <button 
                        type="button"
                        wire:click="openModal({{ $item->id }})" 
                        class="w-full bg-[#4551ff] hover:bg-[#3540e6] text-white font-semibold py-2 rounded-lg transition">
                        Lihat Detail
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Detail Kandidat -->
    @if($showModal && $selectedKandidat)
        <div 
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" 
            style="display: flex !important;"
            wire:click="closeModal"
            wire:key="modal-backdrop-{{ $selectedKandidat->id }}">
            <div 
                class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl"
                wire:click.stop
                wire:key="modal-content-{{ $selectedKandidat->id }}"
                onclick="event.stopPropagation()">
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $selectedKandidat->nama }}</h2>
                            <p class="text-gray-600">Paslon Nomor {{ $selectedKandidat->id }}</p>
                        </div>
                        <button 
                            type="button"
                            wire:click="closeModal" 
                            class="text-gray-500 hover:text-gray-700 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Biodata Ketos & Waketos -->
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <!-- Ketos -->
                        <div class="bg-gradient-to-br from-[#4551ff] to-[#3540e6] rounded-xl p-6 text-white">
                            <div class="text-center mb-4">
                                <div class="w-24 h-24 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white shadow-lg">
                                    @if($selectedKandidat->ketos_foto)
                                        <img src="{{ $selectedKandidat->ketos_foto }}" alt="{{ $selectedKandidat->ketos_nama }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-white/20 flex items-center justify-center">
                                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold mb-1">Ketua OSIS</h3>
                                <p class="text-lg font-semibold">{{ $selectedKandidat->ketos_nama }}</p>
                                <p class="text-sm opacity-90">Kelas {{ $selectedKandidat->ketos_kelas }}</p>
                            </div>
                            <div class="bg-white/10 rounded-lg p-4">
                                <p class="text-sm leading-relaxed">{{ $selectedKandidat->ketos_biodata }}</p>
                            </div>
                        </div>

                        <!-- Waketos -->
                        <div class="bg-gradient-to-br from-[#ffd45e] to-[#ffc933] rounded-xl p-6 text-gray-800">
                            <div class="text-center mb-4">
                                <div class="w-24 h-24 mx-auto mb-3 rounded-full overflow-hidden border-4 border-white shadow-lg">
                                    @if($selectedKandidat->waketos_foto)
                                        <img src="{{ $selectedKandidat->waketos_foto }}" alt="{{ $selectedKandidat->waketos_nama }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-white/20 flex items-center justify-center">
                                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold mb-1">Wakil Ketua OSIS</h3>
                                <p class="text-lg font-semibold">{{ $selectedKandidat->waketos_nama }}</p>
                                <p class="text-sm opacity-80">Kelas {{ $selectedKandidat->waketos_kelas }}</p>
                            </div>
                            <div class="bg-white/30 rounded-lg p-4">
                                <p class="text-sm leading-relaxed">{{ $selectedKandidat->waketos_biodata }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Visi -->
                    <div class="mb-6 bg-[#dedede] rounded-xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-[#4551ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Visi
                        </h3>
                        <p class="text-gray-700 text-lg leading-relaxed">{{ $selectedKandidat->visi }}</p>
                    </div>

                    <!-- Misi -->
                    <div class="mb-8 bg-white border-2 border-[#4551ff] rounded-xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-[#ffd45e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                            Misi
                        </h3>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $selectedKandidat->misi }}</div>
                    </div>

                    <!-- Button Pilih Paslon -->
                    <a href="{{ route('voting', $selectedKandidat->id) }}" 
                       class="block w-full bg-[#ffd45e] hover:bg-[#ffc933] text-gray-800 font-bold py-4 rounded-lg text-center transition transform hover:scale-105 shadow-lg text-lg">
                        PILIH PASLON INI
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<div>
    @if($success)
    <!-- Success Page -->
    <div class="bg-white rounded-2xl shadow-xl p-8 text-center animate-fade-in">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Terima Kasih! Voting Berhasil ✅</h2>
        <p class="text-gray-600 mb-8">Suara Anda telah tercatat dengan baik.</p>
        <div class="space-y-4">
            <a href="{{ route('home') }}"
                class="block w-full bg-[#4551ff] hover:bg-[#3540e6] text-white font-semibold py-3 rounded-lg transition">
                Kembali ke Beranda
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 rounded-lg transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
    @else
    <!-- Voting Form -->
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Konfirmasi Voting</h2>
            <p class="text-gray-600">Paslon Nomor {{ $kandidat->id }}</p>
        </div>

        <!-- Info Kandidat -->
        <div class="bg-gradient-to-br from-[#4551ff] to-[#3540e6] rounded-xl p-6 text-white mb-6">
            <div class="grid md:grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-sm opacity-90 mb-1">Ketua OSIS</p>
                    <p class="text-lg font-bold">{{ $kandidat->ketos_nama }}</p>
                    <p class="text-sm opacity-80">Kelas {{ $kandidat->ketos_kelas }}</p>
                </div>
                <div>
                    <p class="text-sm opacity-90 mb-1">Wakil Ketua OSIS</p>
                    <p class="text-lg font-bold">{{ $kandidat->waketos_nama }}</p>
                    <p class="text-sm opacity-80">Kelas {{ $kandidat->waketos_kelas }}</p>
                </div>
            </div>
            <div class="border-t border-white/20 pt-4">
                <p class="text-sm opacity-90 mb-1">Visi</p>
                <p class="font-semibold">{{ $kandidat->visi }}</p>
            </div>
        </div>

        <!-- Token Input -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Masukkan Token</label>
            <input type="text" wire:model="token" wire:input="validateToken" maxlength="12"
                placeholder="Masukkan token 12 digit"
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4551ff] focus:border-[#4551ff] outline-none transition text-center text-lg font-mono tracking-wider uppercase">
        </div>

        @if($error)
        <div class="bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 animate-fade-in">
            {{ $error }}
        </div>
        @endif

        <button wire:click="submitVote"
            class="w-full bg-[#ffd45e] hover:bg-[#ffc933] text-gray-800 font-bold py-4 rounded-lg transition transform hover:scale-105 shadow-lg text-lg">
            KONFIRMASI VOTING
        </button>

        <div class="mt-4 text-center">
            <a href="{{ route('kandidat') }}" class="text-gray-600 hover:text-gray-800 underline text-sm">
                Kembali ke Daftar Kandidat
            </a>
        </div>
    </div>
    @endif

    <style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
    </style>
</div>
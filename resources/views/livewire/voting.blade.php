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
    <div class="bg-[#FFFAEB] rounded-2xl shadow-[4px_4px_4px_0px_rgba(0,0,0,0.25)] p-8">
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Konfirmasi Voting</h2>
            <p class="text-gray-600">Paslon Nomor {{ $kandidat->id }}</p>
        </div>

        <!-- Info Kandidat -->
        <div class="bg-[rgba(217,217,217,0.25)] border-1 border-black rounded-xl p-6 text-black font-bold mb-6">
            <div class="flex justify-between gap-4 mb-4">
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
            <div class="border-t border-black/20 pt-4 font-bold">
                <p class="text-sm opacity-90 mb-1">Visi</p>
                <p class="font-semibold">{{ $kandidat->visi }}</p>
            </div>
        </div>

        @if($error)
        <div class="bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 animate-fade-in">
            {{ $error }}
        </div>
        @endif

        <!-- Konfirmasi Manual -->
        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-800 mb-2">
                Ketik "VOTE PASLON {{ $kandidat->id }}"
            </label>

            <input
    type="text"
    wire:model.defer="voteConfirmText"
    placeholder="VOTE PASLON {{$kandidat->id}}"
    class="w-full px-4 py-3 rounded-lg border-2 border-black bg-[rgba(217,217,217,0.25)] font-bold tracking-wider"
/>


        </div>


        <button
    wire:click="submitVote"
    wire:loading.attr="disabled"
    wire:target="submitVote"
    class="w-full bg-[#ffd45e] hover:bg-[#ffc933] text-gray-800 font-bold py-4 rounded-lg transition shadow-lg text-lg
           disabled:opacity-50 disabled:cursor-not-allowed"
>
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
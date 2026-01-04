<div class="space-y-4">
    <div>
        <input type="text" wire:model="nis" placeholder="NIS" required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        @error('nis') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <input type="password" wire:model="password" placeholder="Password (NIS)" required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    @if($error)
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
            {{ $error }}
        </div>
    @endif
    <button wire:click="login" 
        class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 shadow-md">
        Masuk sebagai Siswa
    </button>
</div>


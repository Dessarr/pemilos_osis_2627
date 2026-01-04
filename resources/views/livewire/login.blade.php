<div class="space-y-4">
    <!-- Form Fields -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
        <input type="text" wire:model="nis" placeholder="Masukkan NIS" required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        @error('nis')
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
        <input type="password" wire:model="password" placeholder="Password (sama dengan NIS)" required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
        @error('password')
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
        @enderror
        <p class="text-xs text-gray-500 mt-1">Password default sama dengan NIS</p>
    </div>

    <!-- Error Message -->
    @if($error)
    <div class="bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm animate-fade-in-error">
        {{ $error }}
    </div>
    @endif

    <!-- Submit Button -->
    <button wire:click="login" type="button"
        class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 shadow-md">
        Masuk sebagai Siswa
    </button>
</div>
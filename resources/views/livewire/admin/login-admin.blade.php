<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
        <input type="text" 
               wire:model="nama" 
               placeholder="Masukkan nama admin" 
               required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ffd45e] focus:border-transparent outline-none transition">
        @error('nama') 
            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
        <input type="password" 
               wire:model="password" 
               placeholder="Masukkan password" 
               required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ffd45e] focus:border-transparent outline-none transition">
        @error('password') 
            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
        @enderror
    </div>

    @if($error)
        <div class="bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm animate-fade-in-error">
            {{ $error }}
        </div>
    @endif

    <button wire:click="login" 
            type="button"
            class="w-full bg-[#ffd45e] hover:bg-[#ffc933] text-gray-800 font-semibold py-3 rounded-lg transition transform hover:scale-105 shadow-md">
        Masuk sebagai Admin
    </button>
</div>


<div>
    <!-- Kandidat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-12 max-w-7xl mx-auto py-3">
        @forelse($kandidat as $item)
        <div class="relative cursor-pointer group transition-transform duration-300 hover:scale-105"
            wire:click="openModal({{ $item->id }})" data-paslon-id="{{ $item->id }}">
            <!-- Container untuk frame -->
            <div class="relative w-full paslon-container" style="aspect-ratio: 4/3; overflow: visible;">
                <!-- Foto Formal/Unformal dengan fade effect - Ukuran konsisten -->
                <div class="absolute inset-0 w-full h-full flex items-center justify-center z-10"
                    style="overflow: visible;">
                    <img src="{{ asset('img/paslon' . $item->id . '/frame_kandidat/formal' . $item->id . '.png') }}"
                        alt="Foto Formal Paslon {{ $item->id }}"
                        class="absolute paslon-{{ $item->id }}-formal transition-opacity duration-1000"
                        style="opacity: 1; max-width: 100%; height: auto;">
                    <img src="{{ asset('img/paslon' . $item->id . '/frame_kandidat/unformal' . $item->id . '.png') }}"
                        alt="Foto Unformal Paslon {{ $item->id }}"
                        class="absolute paslon-{{ $item->id }}-unformal transition-opacity duration-1000"
                        style="opacity: 0; max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-2 text-center py-12">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            <p class="text-gray-500 text-lg">Belum ada kandidat yang terdaftar</p>
        </div>
        @endforelse
    </div>

    <!-- Modal Detail Kandidat -->
    <!-- Modal Detail Kandidat -->
    @if($showModal && $selectedKandidat)
    <div class="fixed inset-0 flex items-center justify-center z-50 p-4 h-full" style="display: flex !important;"
        wire:click="closeModal" wire:key="modal-backdrop-{{ $selectedKandidat->id }}">
        <div class="inset-0 flex items-center justify-center h-[80%]">
            <div class="relative bg-[#fef9e72d] rounded-2xl w-[85%] h-full overflow-y-scroll" wire:click.stop
                wire:key="modal-content-{{ $selectedKandidat->id }}" onclick="event.stopPropagation()">
                <!-- X button for close -->
                <button type="button" wire:click="closeModal"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <!-- Carousel for 3 images -->
                <div>
                    <div class="carousel fade-in-out">
                        <!-- Foto 1 -->
                        <img src="{{ asset('img/paslon' . $selectedKandidat->id . '/detail/foto1.png') }}"
                            alt="Kandidat Foto 1" class="carousel-img w-full object-cover rounded-xl"
                            style="display: block;">
                        <!-- Foto 2 -->
                        <img src="{{ asset('img/paslon' . $selectedKandidat->id . '/detail/foto2.png') }}"
                            alt="Kandidat Foto 2" class="carousel-img w-full object-cover rounded-xl"
                            style="display: none;">
                        <!-- Foto 3 -->
                        <img src="{{ asset('img/paslon' . $selectedKandidat->id . '/detail/foto3.png') }}"
                            alt="Kandidat Foto 3" class="carousel-img w-full object-cover rounded-xl"
                            style="display: none;">
                    </div>
                </div>



                <!-- Border Section -->
                <div class="relative border-t-8 border-b-8 border-[#FFE064] opacity-100 fade-out-border">
                    <!-- Vote Button Section -->
                    <div class="relative">
                        <a href="{{ route('voting', $selectedKandidat->id) }}"
                            class="block w-full bg-[#FFFFFF] opacity-20 shadow-inner-inner px-4 py-2 text-gray-800 font-semibold rounded-lg text-center transition transform hover:scale-105">
                            <span class="font-playfair text-lg">VOTE PASLON</span>
                        </a>
                    </div>
                </div>

                <!-- VISI and MISI Section -->
                <div class="p-6 bg-[]">
                    <!-- VISI Section -->
                    <div class="mb-6">
                        <h3 class="text-2xl font-playfair mb-3">VISI</h3>
                        <p class="text-lg font-montserrat">{{ $selectedKandidat->visi }}</p>
                        <hr class="my-4 w-[80%] mx-auto" />
                    </div>

                    <!-- MISI Section -->
                    <div>
                        <h3 class="text-2xl font-playfair mb-3">MISI</h3>
                        <p class="text-lg font-montserrat">{{ $selectedKandidat->misi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tunggu beberapa detik sebelum memulai carousel (untuk memastikan gambar dimuat)
    setTimeout(function() {
        const images = document.querySelectorAll('.carousel-img'); // Ambil semua gambar dalam carousel

        // Jika tidak ada gambar yang ditemukan, tampilkan pesan error di konsol
        if (images.length === 0) {
            console.error('No images found in the carousel.');
            return;
        }

        let currentIndex = 0; // Menyimpan indeks gambar yang sedang ditampilkan

        // Fungsi untuk mengganti gambar dengan efek fade
        function changeImage() {
            // Sembunyikan semua gambar
            images.forEach((image) => image.style.display = 'none');

            // Menampilkan gambar yang sesuai dengan currentIndex
            if (images[currentIndex]) { // Pastikan elemen gambar ada
                images[currentIndex].style.display = 'block';
            }

            // Perbarui currentIndex untuk gambar berikutnya
            currentIndex = (currentIndex + 1) % images
                .length; // Perulangan ke gambar pertama setelah yang terakhir
        }

        // Panggil fungsi changeImage pertama kali
        changeImage();

        // Ganti gambar setiap 5 detik (5000 ms)
        setInterval(changeImage, 5000);
    }, 500); // Tunggu 500ms sebelum memulai carousel
});
</script>
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
    @if($showModal && $selectedKandidat)
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm flex justify-center z-50 p-2 modal-backdrop-scroll"
        wire:click="closeModal" wire:key="modal-backdrop-{{ $selectedKandidat->id }}">
        <!-- Container Detail Keseluruhan - Width mengikuti aspect ratio gambar (hologram effect) -->
        <!-- Width dihitung dari aspect ratio 1202/863 = 1.394, jadi width = height * 1.394 -->
        <div class="relative detail-modal-container my-8 flex flex-col h-[70%]"
            wire:click.stop wire:key="modal-content-{{ $selectedKandidat->id }}" onclick="event.stopPropagation()"
            style="background: transparent; width: min(85vw, calc(90vh * 1.394 * 0.7)); max-width: 1200px; max-height: 90vh;">
            
            <!-- X Button - Pojok Kanan Atas -->
            <button type="button" wire:click="closeModal"
                class="absolute top-0 right-0 z-50 w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-gray-100 text-gray-700 hover:text-gray-900 transition-all shadow-lg hover:scale-110 transform translate-x-1/2 -translate-y-1/2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

           <!-- Section 1: Carousel Container -->
<div class="relative w-full carousel-wrapper-{{ $selectedKandidat->id }}">
    <div 
        id="carousel-container-{{ $selectedKandidat->id }}"
        class="carousel-container-{{ $selectedKandidat->id }} carousel-container">

        <img src="{{ asset('img/paslon' . $selectedKandidat->id . '/detail/foto1.png') }}"
            class="carousel-img carousel-img-active">

        <img src="{{ asset('img/paslon' . $selectedKandidat->id . '/detail/foto2.png') }}"
            class="carousel-img">

        <img src="{{ asset('img/paslon' . $selectedKandidat->id . '/detail/foto3.png') }}"
            class="carousel-img">
    </div>
</div>


            <!-- Section 2: Vote Paslon dengan Border Fade - Height sekitar 12%, tidak terlalu banyak -->
            <div class="relative w-full vote-paslon-section flex-shrink-0" style="flex: 0 0 12%; height: 12%; min-height: 75px; max-height: 95px; position: relative;">
                <!-- Border fade atas: dari #FFE064 ke putih dengan opacity rendah untuk efek fade -->
                <div class="absolute top-0 left-0 w-full h-6 z-0" style="background: linear-gradient(to bottom, #fef5d2 0%, #ffe064 100%);"></div>
                
                <!-- Button VOTE PASLON - Fill warna keemasan #FFE064 -->
                <div class="absolute inset-0 flex items-center justify-center px-6 z-10" style="background-color: #FFE064; top: 24px; bottom: 24px;">
                    <a href="{{ route('voting', $selectedKandidat->id) }}"
                        wire:click="closeModal"
                        class="relative block w-full px-8 py-3 rounded-lg cursor-pointer transition-all hover:scale-105 text-center"
                        style="font-family: 'Playfair Display', serif; font-weight: 400;">
                        <span class="text-gray-800 text-lg md:text-xl font-normal">VOTE PASLON</span>
                    </a>
                </div>

                <!-- Border fade bawah: dari #FFE064 ke #FFE064 dengan opacity 60% -->
                <div class="absolute bottom-0 left-0 w-full h-6 z-0" style="background: linear-gradient(to bottom, #FFE064 0%,rgba(255, 224, 100, 0.6) 100%);"></div>
            </div>

            <!-- Section 3: VISI dan MISI - Scrollable dengan background transisi dari #FFE064 opacity 60% -->
            <div class="relative w-full visi-misi-section rounded-b-2xl overflow-y-auto custom-scrollbar" 
                style="
                    flex: 1 1 auto;
                    min-height: 180px;
                    max-height: calc(90vh - 82%);
                    background: linear-gradient(to bottom, rgba(255, 224, 100, 0.6) 0%, rgba(255, 224, 100, 0.58) 15%, rgba(255, 224, 100, 0.56) 30%, rgba(255, 224, 100, 0.54) 45%, rgba(255, 224, 100, 0.52) 60%, rgba(255, 224, 100, 0.5) 75%, rgba(255, 224, 100, 0.48) 90%, rgba(255, 224, 100, 0.45) 100%);
                ">
                <div class="p-6 md:p-8 pb-8">
                    <!-- VISI Section -->
                    <div class="mb-8">
                        <h3 class="text-2xl md:text-3xl font-normal mb-4 text-white text-left"
                            style="font-family: 'Playfair Display', serif;">VISI</h3>
                        <p class="text-base md:text-lg text-white leading-relaxed text-left"
                            style="font-family: 'Montserrat', sans-serif;">
                            {{ $selectedKandidat->visi ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.' }}
                        </p>
                        
                        <!-- Pembatas tengah - HR dengan width 80% -->
                        <hr class="my-6 w-[80%] mx-auto" style="border-color: rgba(255, 224, 100, 0.4); border-width: 1px;" />
                    </div>

                    <!-- MISI Section -->
                    <div>
                        <h3 class="text-2xl md:text-3xl font-normal mb-2 text-white text-left"
                            style="font-family: 'Playfair Display', serif;">MISI</h3>
                        <p class="text-base md:text-lg text-white leading-relaxed whitespace-pre-line text-left"
                            style="font-family: 'Montserrat', sans-serif;">
                            {{ $selectedKandidat->misi ?? '1. Lorem ipsum dolor sit amet, consectetur adipiscing elit\n2. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua\n3. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\n4. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum\n5. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt\n6. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\n7. Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis\n8. Et quasi architecto beatae vitae dicta sunt explicabo\n9. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit\n10. Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt\n11. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>

<script>
(function() {
    let carouselIntervals = {};

    // Function to update carousel ratio based on natural image dimensions
    window.updateCarouselRatio = function(kandidatId, imgElement) {
        if (!imgElement || !imgElement.naturalWidth || !imgElement.naturalHeight) return;
        
        const container = document.getElementById('carousel-container-' + kandidatId);
        if (!container) return;
        
        const ratio = imgElement.naturalWidth / imgElement.naturalHeight;
        const containerWidth = container.offsetWidth || container.parentElement.offsetWidth || window.innerWidth * 0.55;
        
        if (containerWidth > 0 && ratio > 0) {
            const calculatedHeight = containerWidth / ratio;
            container.style.height = calculatedHeight + 'px';
            container.style.position = 'relative';
            
            // Update absolute positioned images height
            const absoluteImgs = container.querySelectorAll('.carousel-img:not(.carousel-img-active)');
            absoluteImgs.forEach(function(img) {
                img.style.height = calculatedHeight + 'px';
                img.style.width = '100%';
            });
            
            // Update active image
            const activeImg = container.querySelector('.carousel-img-active');
            if (activeImg) {
                activeImg.style.height = calculatedHeight + 'px';
            }
        }
    };

    function initDetailCarousel(containerId) {
        const container = document.getElementById('carousel-container-' + containerId) || document.querySelector('.carousel-container-' + containerId);
        if (!container) {
            return;
        }

        const images = container.querySelectorAll('.carousel-img');
        if (images.length === 0) {
            return;
        }

        // Clear existing interval if any
        if (carouselIntervals[containerId]) {
            clearInterval(carouselIntervals[containerId]);
            delete carouselIntervals[containerId];
        }

        // Set initial state: first image visible, others hidden
        images.forEach((img, index) => {
            if (index === 0) {
                img.style.opacity = '1';
                img.style.position = 'relative';
                img.classList.add('carousel-img-active');
            } else {
                img.style.opacity = '0';
                img.style.position = 'absolute';
                img.style.top = '0';
                img.style.left = '0';
                img.style.pointerEvents = 'none';
                img.classList.remove('carousel-img-active');
            }
        });

        let currentIndex = 0;

        function changeImage() {
            // Hide current image (fade out)
            if (images[currentIndex]) {
                images[currentIndex].style.opacity = '0';
                images[currentIndex].style.pointerEvents = 'none';
                images[currentIndex].classList.remove('carousel-img-active');
            }

            // Move to next image
            currentIndex = (currentIndex + 1) % images.length;

            // Show next image (fade in)
            if (images[currentIndex]) {
                images[currentIndex].style.opacity = '1';
                images[currentIndex].style.pointerEvents = 'auto';
                images[currentIndex].classList.add('carousel-img-active');
            }
        }

        // Start carousel - change every 4 seconds
        carouselIntervals[containerId] = setInterval(changeImage, 4000);
        
        // Update ratio if first image is already loaded
        const firstImg = images[0];
        if (firstImg && firstImg.complete && firstImg.naturalWidth > 0) {
            window.updateCarouselRatio(containerId, firstImg);
        }
    }

    // Listen for Livewire events (Livewire 3)
    document.addEventListener('livewire:init', function() {
        Livewire.on('modal-opened', function(data) {
            if (data && data.kandidatId) {
                setTimeout(function() {
                    initDetailCarousel(data.kandidatId);
                    // Try to update ratio after a short delay to ensure images are loaded
                    setTimeout(function() {
                        const firstImg = document.getElementById('carousel-img-0-' + data.kandidatId);
                        if (firstImg && firstImg.complete) {
                            window.updateCarouselRatio(data.kandidatId, firstImg);
                        }
                    }, 500);
                }, 300);
            }
        });
    });

    // Use MutationObserver to detect when modal opens/closes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1) {
                    // Check if a carousel container was added
                    const carouselContainer = node.querySelector ? node.querySelector('[class*="carousel-container-"]') : null;
                    if (carouselContainer) {
                        const containerId = carouselContainer.id ? carouselContainer.id.replace('carousel-container-', '') : 
                            Array.from(carouselContainer.classList).find(cls => cls.startsWith('carousel-container-'))?.replace('carousel-container-', '');
                        if (containerId) {
                            setTimeout(function() {
                                initDetailCarousel(containerId);
                            }, 300);
                        }
                    }
                    
                    // Also check if the node itself is a carousel container
                    if (node.id && node.id.startsWith('carousel-container-')) {
                        const containerId = node.id.replace('carousel-container-', '');
                        setTimeout(function() {
                            initDetailCarousel(containerId);
                        }, 300);
                    }
                }
            });

            // Clean up intervals when modal closes
            mutation.removedNodes.forEach(function(node) {
                if (node.nodeType === 1) {
                    const removedContainer = node.querySelector ? node.querySelector('[class*="carousel-container-"]') : null;
                    if (removedContainer || (node.id && node.id.startsWith('carousel-container-'))) {
                        Object.keys(carouselIntervals).forEach(function(containerId) {
                            const container = document.getElementById('carousel-container-' + containerId) || 
                                document.querySelector('.carousel-container-' + containerId);
                            if (!container) {
                                clearInterval(carouselIntervals[containerId]);
                                delete carouselIntervals[containerId];
                            }
                        });
                    }
                }
            });
        });
    });

    // Start observing
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    // Also check on DOMContentLoaded for existing modals
    document.addEventListener('DOMContentLoaded', function() {
        const existingContainers = document.querySelectorAll('[id^="carousel-container-"], [class*="carousel-container-"]');
        existingContainers.forEach(function(container) {
            const containerId = container.id ? container.id.replace('carousel-container-', '') :
                Array.from(container.classList).find(cls => cls.startsWith('carousel-container-'))?.replace('carousel-container-', '');
            if (containerId) {
                setTimeout(function() {
                    initDetailCarousel(containerId);
                }, 300);
            }
        });
    });
})();
</script>
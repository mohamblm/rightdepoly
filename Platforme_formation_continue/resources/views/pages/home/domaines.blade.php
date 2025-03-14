<section class="bg-white py-12">
    <div class="container mx-auto px-4 py-12 max-w-6xl">
        <h2 class="text-center text-2xl md:text-3xl font-bold text-blue-800 mb-2">
            NOS DOMAINES DE FORMATION
        </h2>

        <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
            Depuis [année], notre plateforme de formation continue accompagne les entreprises dans le développement des compétences de leurs équipes.
        </p>

        <!-- Swiper Slider -->
        <div class="relative">
            <div class="swiper mySwiper-domaines mt-8">
                <div class="swiper-wrapper">
                    <!-- Slide 1: INFORMATIQUE -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center">
                            <div class="relative w-full h-48 md:h-56 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/domaines/informatique.png') }}" alt="Informatique et systèmes d'information" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                    <div class="bg-white rounded-full w-10 h-10 flex items-center justify-center">
                                        <i class="fa-solid fa-laptop" style="color: #000000;"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-4 font-bold text-blue-800 uppercase">Informatique</h3>
                        </div>
                    </div>

                    <!-- Slide 2: LANGUES -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center">
                            <div class="relative w-full h-48 md:h-56 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/domaines/langue.png') }}" alt="Langues" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                    <div class="bg-white rounded-full w-10 h-10 flex items-center justify-center">
                                        <i class="fa-solid fa-language" style="color: #000000;"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-4 font-bold text-blue-800 uppercase">Langues</h3>
                        </div>
                    </div>

                    <!-- Slide 3: LOGISTIQUE -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center">
                            <div class="relative w-full h-48 md:h-56 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/domaines/logistique.png') }}" alt="LOGISTIQUE" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                    <div class="bg-white rounded-full w-10 h-10 flex items-center justify-center">
                                        <i class="fa-solid fa-warehouse" style="color: #000000;"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-4 font-bold text-blue-800 uppercase">LOGISTIQUE</h3>
                        </div>
                    </div>

                    <!-- Slide 4: MANAGEMENT -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center">
                            <div class="relative w-full h-48 md:h-56 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/domaines/management.png') }}" alt="MANAGEMENT" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                    <div class="bg-white rounded-full w-10 h-10 flex items-center justify-center">
                                        <i class="fa-solid fa-list-check" style="color: #000000;"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-4 font-bold text-blue-800 uppercase text-center">MANAGEMENT</h3>
                        </div>
                    </div>

                    <!-- Slide 5: COMMUNICATION -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center">
                            <div class="relative w-full h-48 md:h-56 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/domaines/communication.png') }}" alt="Communication" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                    <div class="bg-white rounded-full w-10 h-10 flex items-center justify-center">
                                        <i class="fa-solid fa-comments" style="color: #000000;"></i>
                                    </div>
                                </div>
                            </div>
                            <h3 class="mt-4 font-bold text-blue-800 uppercase">COMMUNICATION</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next mySwiper-domaines-next text-blue-600 after:text-2xl absolute right-0 top-1/2 transform -translate-y-1/2"></div>
            <div class="swiper-button-prev mySwiper-domaines-prev text-blue-600 after:text-2xl absolute left-0 top-1/2 transform -translate-y-1/2"></div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination mySwiper-domaines-pagination mt-8"></div>
    </div>
</section>

@push('scripts')
<script>
    // Initialize Swiper for the domaines section with unique selectors
    var swiperDomaines = new Swiper(".mySwiper-domaines", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".mySwiper-domaines-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".mySwiper-domaines-next",
            prevEl: ".mySwiper-domaines-prev",
        },
        breakpoints: {
            640: { slidesPerView: 2, spaceBetween: 20 },
            768: { slidesPerView: 3, spaceBetween: 30 },
            1024: { slidesPerView: 4, spaceBetween: 40 },
            1280: { slidesPerView: 5, spaceBetween: 50 }
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });
</script>
@endpush

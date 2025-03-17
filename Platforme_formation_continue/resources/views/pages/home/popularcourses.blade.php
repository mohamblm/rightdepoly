<section class="bg-[#F8F8F8] py-12">
    <div class="container mx-auto px-4 py-12 max-w-6xl">
        <!-- Section Title -->
        <div class="text-center mb-10">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-blue-800 mb-6">
                Formations populaires
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-primary"></span>
            </h2>
        </div>

        <!-- Category Filters -->
        <!-- (If there are filters, add them here) -->

        <!-- Courses Slider -->
        <div class="swiper-container mySwiper-popular-courses">
            <div class="swiper-wrapper pb-10">
                <!-- Course Card 1 -->
                <div class="swiper-slide p-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="relative bg-cyan-500 h-48">
                            <img src="{{ asset('images/popularcourses/leadership.jpg') }}" alt="Leadership" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x200?text=Leadership'">
                        </div>
                        <div class="flex items-center gap-1 px-4 py-2 bg-gray-100">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar1.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=A'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar2.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=B'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar3.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=C'">
                            </div>
                            <span class="text-sm text-gray-600">• 40 Participants</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">1 - 30 July 2022</div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Leadership et Management d'Équipe</h3>
                            <p class="text-sm text-gray-600 mb-4">Renforcez vos compétences en gestion, prise de décision et leadership stratégique.</p>
                        </div>
                        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
                            <div>
                                <span class="text-primary font-bold">$ 380</span>
                                <span class="text-gray-400 line-through text-sm ml-2">$ 500</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-primaryDark transition">Explore</button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="swiper-slide p-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="relative bg-amber-100 h-48">
                            <img src="{{ asset('images/popularcourses/marketing.jpg') }}" alt="Marketing" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x200?text=Marketing'">
                        </div>
                        <div class="flex items-center gap-1 px-4 py-2 bg-gray-100">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar1.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=A'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar2.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=B'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar3.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=C'">
                            </div>
                            <span class="text-sm text-gray-600">• 11 Participants</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">1 - 30 July 2022</div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Stratégies de Vente et Marketing Digital</h3>
                            <p class="text-sm text-gray-600 mb-4">Boostez vos ventes et optimisez votre marketing digital.</p>
                        </div>
                        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
                            <div>
                                <span class="text-primary font-bold">$ 230</span>
                                <span class="text-gray-400 line-through text-sm ml-2">$ 350</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-primaryDark transition">Explore</button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 3 -->
                <div class="swiper-slide p-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="relative bg-blue-100 h-48">
                            <img src="{{ asset('images/popularcourses/secours.jpg') }}" alt="Premiers Secours" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x200?text=Premiers+Secours'">
                        </div>
                        <div class="flex items-center gap-1 px-4 py-2 bg-gray-100">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar1.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=A'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar2.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=B'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar3.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=C'">
                            </div>
                            <span class="text-sm text-gray-600">+ 234 Participants</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">1 - 28 July 2022</div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Formation en Premiers Secours et Urgences Médicales</h3>
                            <p class="text-sm text-gray-600 mb-4">Apprenez les gestes de premiers secours et la gestion des urgences avec Pro1Santé Formation - Spécialiste en santé d'urgence.</p>
                        </div>
                        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
                            <div>
                                <span class="text-primary font-bold">$ 123</span>
                                <span class="text-gray-400 line-through text-sm ml-2">$ 500</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-primaryDark transition">Explore</button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 4 -->
                <div class="swiper-slide p-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="relative bg-teal-600 h-48">
                            <img src="{{ asset('images/popularcourses/info.jpg') }}" alt="Informatique" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x200?text=Informatique'">
                        </div>
                        <div class="flex items-center gap-1 px-4 py-2 bg-gray-100">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar1.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=A'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar2.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=B'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar3.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=C'">
                            </div>
                            <span class="text-sm text-gray-600">• 342 Participants</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">1 - 30 July 2022</div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Gestion des Systèmes d'Information</h3>
                            <p class="text-sm text-gray-600 mb-4">Développez vos compétences en administration des systèmes, cybersécurité et gestion des infrastructures IT.</p>
                        </div>
                        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
                            <div>
                                <span class="text-primary font-bold">$ 567</span>
                                <span class="text-gray-400 line-through text-sm ml-2">$ 800</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-primaryDark transition">Explore</button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 5 -->
                <div class="swiper-slide p-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="relative bg-cyan-500 h-48">
                            <img src="{{ asset('images/popularcourses/course1.jpg') }}" alt="Leadership" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x200?text=Leadership'">
                        </div>
                        <div class="flex items-center gap-1 px-4 py-2 bg-gray-100">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar1.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=A'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar2.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=B'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar3.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=C'">
                            </div>
                            <span class="text-sm text-gray-600">• 40 Participants</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">1 - 30 July 2022</div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Leadership et Management d'Équipe</h3>
                            <p class="text-sm text-gray-600 mb-4">Renforcez vos compétences en gestion, prise de décision et leadership stratégique.</p>
                        </div>
                        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
                            <div>
                                <span class="text-primary font-bold">$ 380</span>
                                <span class="text-gray-400 line-through text-sm ml-2">$ 500</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-primaryDark transition">Explore</button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 6 -->
                <div class="swiper-slide p-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="relative bg-cyan-500 h-48">
                            <img src="{{ asset('images/popularcourses/course2.jpg') }}" alt="Leadership" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x200?text=Leadership'">
                        </div>
                        <div class="flex items-center gap-1 px-4 py-2 bg-gray-100">
                            <div class="flex -space-x-2">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar1.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=A'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar2.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=B'">
                                <img class="w-8 h-8 rounded-full border-2 border-white" src="{{ asset('images/popularcourses/avatar3.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40?text=C'">
                            </div>
                            <span class="text-sm text-gray-600">• 40 Participants</span>
                        </div>
                        <div class="p-4 flex-grow">
                            <div class="text-xs text-gray-500 mb-2">1 - 30 July 2022</div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Leadership et Management d'Équipe</h3>
                            <p class="text-sm text-gray-600 mb-4">Renforcez vos compétences en gestion, prise de décision et leadership stratégique.</p>
                        </div>
                        <div class="p-4 border-t border-gray-100 flex justify-between items-center">
                            <div>
                                <span class="text-primary font-bold">$ 380</span>
                                <span class="text-gray-400 line-through text-sm ml-2">$ 500</span>
                            </div>
                            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-primaryDark transition">Explore</button>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
        
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Swiper for Popular Courses with unique selectors
        const swiperPopular = new Swiper('.mySwiper-popular-courses', {
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                },
                // when window width is >= 1024px
                1024: {
                    slidesPerView: 3,
                },
                // when window width is >= 1280px
                1280: {
                    slidesPerView: 4,
                }
            },
            autoplay: {
                delay: 5000,
            },
        });
    });
</script>
@endpush

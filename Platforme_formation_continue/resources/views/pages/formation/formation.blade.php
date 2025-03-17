@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Formations') }}
    </h2>
@endsection
@section('content')
    <!-- Navigation Breadcrumb -->
    {{-- <div class="container mx-auto px-4 py-2 text-sm">
        <div class="flex items-center space-x-2 text-gray-500">
            <a href="#" class="hover:text-blue-500">Home</a>
            <span>›</span>
            <a href="#" class="hover:text-blue-500">Development</a>
            <span>›</span>
            <a href="#" class="hover:text-blue-500">Web Development</a>
            <span>›</span>
            <span class="text-gray-700">Webflow</span>
        </div>
    </div> --}}

    <!-- Main Content -->
    <div class="container mx-auto px-10 pt-20 pb-8">
        <div class="flex flex-col md:flex-row">
            <!-- Left Column - Formation Info -->
            <div class="md:w-2/3 pr-0 md:pr-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">{{ $formation->nom }}</h1>
                <p class="text-gray-600 mb-4">3 in 1 Formation: Learn to design websites with Figma, build with Webflow, and
                    make a living freelancing.</p>

                <!-- Rating -->
                <div class="flex items-center mb-6">
                    <span class=" text-gray-800 mr-2">{{ $averageRating }}</span>
                    <div class="flex text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="{{ $i < floor($averageRating) ? 'fas fa-star' : ($i < ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5 ? 'fas fa-star-half-alt' : 'far fa-star') }}"></i>
                        @endfor
                    </div>
                    <span class="ml-2 text-gray-600"> ({{count($formation->reviews)}} Rating)</span>
                </div>

                <!-- Formation Preview Image -->
                <div class="relative rounded-lg overflow-hidden mb-8 bg-pink-100">
                    <img src="{{ asset('storage/images/formation1.png') }}" alt="Formation Preview"
                        class="w-full object-cover h-64 md:h-96">
                    {{-- <button class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg">
                        <i class="fas fa-play text-blue-500 text-xl"></i>
                    </button> --}}
                </div>

                <!-- Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="mr-2">
                            <a href="#"
                                class="inline-block py-4 px-4 text-sm font-medium text-center border-b-2 border-blue-500 text-blue-600">Overview</a>
                        </li>
                        <li class="mr-2">
                            <a href="#Curriculum"
                                class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 hover:text-gray-700">Curriculum</a>
                        </li>
                        <li class="mr-2">
                            <a href="#Aqui"
                                class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 hover:text-gray-700">À qui</a>
                        </li>
                        <li class="mr-2">
                            <a href="#Requirements"
                                class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 hover:text-gray-700">Requirements</a>
                        </li>
                        <li class="mr-2">
                            <a href="#Reviews"
                                class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 hover:text-gray-700">Reviews</a>
                        </li>
                    </ul>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Description</h2>
                    <div class="text-gray-700 space-y-4">
                        <p>{{ $formation->description }}</p>
                        @if ($formation->description == null)
                            <p>there is no description for this formation</p>
                        @endif
                    </div>

                    
                    <!-- Ce que vous apprendrez dans ce cours Section -->
                    <div id="Curriculum" class="mt-8 border border-gray-200 rounded-lg p-6">
                        <h2 class="text-xl font-semibold mb-4">Ce que vous apprendrez dans ce cours</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach(json_decode($formation->sub_titles)?? [] as $sub_title)
                                <div class="flex">
                                    <div
                                        class="flex-shrink-0 h-6 w-6 rounded-full bg-green-500 flex items-center justify-center mt-1">
                                        <span class="text-white text-xs">✓</span>
                                    </div>
                                    <p class="ml-3 text-gray-700 text-sm">{{$sub_title}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- À qui s'adresse ce Formation Section -->
                    <div id="Aqui" class="mt-8">
                        <h2 class="text-xl font-semibold mb-4">À qui s'adresse ce Formation :</h2>

                        <ul class="space-y-3 text-gray-700">
                            @foreach(json_decode($formation->for_whos)?? [] as $forElement)
                            <li class="flex items-start">
                                <span class="text-blue-500 mr-2">❯</span>
                                <span>{{$forElement}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Formation requirements Section -->
                    <div id="Requirements" class="mt-8">
                        <h2 class="text-xl font-semibold mb-4">Formation requirements</h2>

                        <ul class="list-disc pl-5 space-y-3 text-gray-700">
                            @foreach(json_decode($formation->requirements)?? [] as $requirement)
                                <li>{{$requirement}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column - Formation Purchase Card -->
            <div class="md:w-1/3 mt-8 md:mt-0">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden sticky top-4">
                    <!-- Discount Banner -->
                    <div class="bg-blue-500 text-white py-2 px-4 flex justify-between">
                        <span class="font-semibold">56% Off</span>
                        <span class="text-sm">2 days left at this offer!</span>
                    </div>

                    <!-- Formation Details -->
                    <div class="p-6">
                        <!-- Formation Duration -->
                        <div class="flex justify-between mb-4">
                            <div class="flex items-center">
                                <span class="text-gray-500 mr-2">
                                    <i class="far fa-clock"></i>
                                </span>
                                <span class="text-sm text-gray-600">Formation Duration</span>
                            </div>
                            <span class="text-sm text-gray-800">6 Month</span>
                        </div>

                        <!-- Formation Level -->
                        <div class="flex justify-between mb-4">
                            <div class="flex items-center">
                                <span class="text-gray-500 mr-2">
                                    <i class="fas fa-signal"></i>
                                </span>
                                <span class="text-sm text-gray-600">Formation Level</span>
                            </div>
                            <span class="text-sm text-gray-800">Beginner and Intermediate</span>
                        </div>

                        <!-- Students Enrolled -->
                        <div class="flex justify-between mb-4">
                            <div class="flex items-center">
                                <span class="text-gray-500 mr-2">
                                    <i class="fas fa-users"></i>
                                </span>
                                <span class="text-sm text-gray-600">Students Enrolled</span>
                            </div>
                            <span class="text-sm text-gray-800">69,219,618</span>
                        </div>

                        <!-- Language -->
                        <div class="flex justify-between mb-6">
                            <div class="flex items-center">
                                <span class="text-gray-500 mr-2">
                                    <i class="fas fa-globe"></i>
                                </span>
                                <span class="text-sm text-gray-600">Language</span>
                            </div>
                            <span class="text-sm text-gray-800">
                                @foreach(json_decode($formation->languages)?? [] as $language)
                                    {{$language.', '}}
                                @endforeach
                            </span>
                        </div>

                        <!-- Action Buttons -->
                        
                        <form action="{{ route('cart.add', $formation->id) }}" method="POST">
                            @csrf
                            <button type="submit"  class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-4 rounded mb-3">
                                Add To Cart
                            </button>
                            {{-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add to Cart</button> --}}
                        </form>
                        <form action="{{ route('cart.add', $formation->id) }}" method="POST">
                            @csrf
                            <button
                            class="w-full bg-white hover:bg-gray-50 text-blue-500 font-medium py-3 px-4 rounded border border-blue-500 mb-3">
                                Demande De Devis
                            </button>
                            {{-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add to Cart</button> --}}
                        </form>
                        

                        <!-- Secondary Actions -->
                        {{-- <div class="flex justify-between mb-6">
                            <button class="text-gray-600 text-sm hover:text-blue-500">
                                <i class="far fa-heart mr-1"></i> Add To Wishlist
                            </button>
                            <button class="text-gray-600 text-sm hover:text-blue-500">
                                <i class="fas fa-gift mr-1"></i> Gift Formation
                            </button>
                        </div> --}}

                        <!-- Guarantee Notice -->
                        <div class="text-center text-xs text-gray-500 mb-6">
                            <p>Note: All Formations have 30-days money-back guarantee</p>
                        </div>

                        <!-- What's Included -->
                        <div>
                            <h3 class="font-medium text-gray-800 mb-4">This Formation includes:</h3>
                            <ul class="space-y-3">
                                @foreach(json_decode($formation->includes)?? [] as $include)
                                    <li class="flex items-center text-sm text-gray-600">
                                        <i class="fa-solid fa-arrow-right text-blue-500 mr-3"></i>
                                        {{$include}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Share Formation -->
                        <div class="mt-6">
                            <h3 class="text-sm font-medium text-gray-800 mb-3">Share this Formation:</h3>
                            <div class="flex space-x-3">
                                <button class="text-gray-600 hover:text-blue-500">
                                    <i class="fas fa-link"></i>
                                </button>
                                <button class="text-gray-600 hover:text-blue-700">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button class="text-gray-600 hover:text-blue-400">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="text-gray-600 hover:text-blue-500">
                                    <i class="fas fa-envelope"></i>
                                </button>
                                <button class="text-gray-600 hover:text-green-600">
                                    <i class="fab fa-whatsapp"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- reriews --}}
    <div id="Reviews" class="container mx-auto px-10 mb-20">
        <!-- Formation Rating Section -->
        @if (count($formation->reviews) !== 0)
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Evaluation du Formation</h2>

            <div class="flex items-center mb-4 ">
                <div class="mr-4">
                    <!-- Display Average Rating -->
                    <span class="text-3xl font-bold text-gray-800">{{ $averageRating }}</span>
                    <div class="flex text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="{{ $i < floor($averageRating) ? 'fas fa-star' : ($i < ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5 ? 'fas fa-star-half-alt' : 'far fa-star') }}"></i>
                        @endfor
                    </div>
                    <div class="text-sm text-gray-500">Evaluation du Formation</div>
                </div>

                <div class="flex-1">
                    @foreach (range(5, 1) as $star)
                        <!-- Display Star Rating Distribution -->
                        <div class="flex items-center mb-1">
                            <div class="flex text-yellow-400 mr-2">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="{{ $i < $star ? 'fas fa-star' : 'far fa-star' }}"></i>
                                @endfor
                            </div>
                            <span class="text-sm text-gray-600 mr-2">{{ $star }} Star Rating</span>
                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full"
                                    style="width: {{ $ratingPercentages[$star] }}%"></div>
                            </div>
                            <span class="text-sm text-gray-600 ml-2">{{ $ratingPercentages[$star] }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Reviews Section with JavaScript Filtering -->
        <div class="mt-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Les commentaires </h2>
                <div class="relative">
                    <select id="rating-filter"
                        class="appearance-none bg-white border border-gray-300 px-4 py-2 pr-8 rounded-md text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="6">All commentaire</option>
                        <option value="5">5 Star Rating</option>
                        <option value="4">4 Star Rating</option>
                        <option value="3">3 Star Rating</option>
                        <option value="2">2 Star Rating</option>
                        <option value="1">1 Star Rating</option>
                    </select>

                </div>
            </div>

            <div id="reviews-container">
                @foreach ($formation->reviews as $review)
                    <div class="review-item border-t border-gray-200 py-4" data-rating="{{ $review->note }}">
                        <div class="flex items-start">
                            <img src="{{ asset('storage/images/formation1.png') }}"
                                alt="{{ $review->user->name }}" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <div class="flex items-center">
                                    <h3 class="font-medium text-gray-800 mr-2">{{ $review->user->name }}</h3>
                                    <span
                                        class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="flex text-yellow-400 my-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->note)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="text-gray-700">{{ $review->commentaire }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Reviews Message -->
            <div id="no-reviews-message" class="hidden text-center py-8 text-gray-500">
                No reviews match your selected filter.
            </div>
            @if (count($formation->reviews) == 0)
                <div id="no-reviews-message" class=" text-center py-8 text-gray-500">
                    No reviews to show.
                </div>
            @endif

        </div>
    </div>
    {{-- notifiation --}}
    @if (session('status') === 'added-to-cart' || session('status') === 'already-in-cart')
        <div x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-4"
            class="fixed top-4 right-4 z-50 max-w-sm w-full">
            
            <div class="flex items-center p-5 bg-white rounded-lg shadow-xl border-l-4 border-l-green-500">
                <!-- Checkmark icon with animated circle -->
                <div class="flex-shrink-0 relative">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <svg class="w-8 h-8 absolute top-0 left-0 text-green-500 animate-[spin_4s_ease-in-out_infinite]" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1" stroke-dasharray="1 3" />
                    </svg>
                </div>
                
                <!-- Message with title and content -->
                <div class="ml-4 flex-1">
                    @if (session('status') === 'added-to-cart')
                        <h4 class="text-sm font-bold text-gray-800 mb-0.5">Success!</h4>
                        <p class="text-sm text-gray-600">
                            La formation a été ajoutée à votre panier avec succès.
                        </p>
                    @endif
                    @if (session('status') === 'already-in-cart')
                        <h4 class="text-sm font-bold text-gray-800 mb-0.5">Cette formation déjà dans le panier.</h4>
                        
                    @endif
                </div>
            </div>
        </div>
    @endif

@push('scripts')
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const ratingFilter = document.getElementById('rating-filter');
            const reviewsContainer = document.getElementById('reviews-container');
            const noReviewsMessage = document.getElementById('no-reviews-message');
            const reviewItems = document.querySelectorAll('.review-item');

            ratingFilter.addEventListener('change', function() {

                const selectedRating = this.value; // Value is a string
                let visibleReviews = 0;

                reviewItems.forEach(function(review) {
                    const reviewRating = review.getAttribute('data-rating');
                    console.log(
                        `Review Rating: ${reviewRating}, Selected Rating: ${selectedRating}`);

                    if (selectedRating === "6" || reviewRating === selectedRating) {
                        review.style.display = "block"; // Show matching reviews
                        visibleReviews++;
                    } else {
                        review.style.display = "none"; // Hide non-matching reviews
                    }
                });

                // Show/hide "no reviews" message based on visible reviews count
                noReviewsMessage.style.display = (visibleReviews === 0) ? "block" : "none";
            });
        });
</script>
@endpush
@endsection

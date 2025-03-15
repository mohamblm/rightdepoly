@extends('layouts.app')

@section('content')

 <!-- Hero section with search bar -->
 <div class="relative h-64 md:h-80 w-full overflow-hidden">
    <!-- Hero background image -->
    <div class="absolute inset-0">
        <img src="{{ asset('storage/images/building.jpg') }}" alt="Building at night" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-20"></div>
    </div>
    
    <!-- Search bar -->
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="w-full max-w-3xl px-4">
            <div class="relative">
                <input type="text" id="search-input" placeholder="Search..." class="w-full py-3 px-5 pr-10 rounded-full shadow-lg text-gray-700">
                <button id="search-button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Main content area -->
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Left sidebar filters -->
        <div class="w-full md:w-64 shrink-0">
            <h2 class="text-xl font-semibold mb-4">Filter</h2>
            
            <form id="filter-form" action="{{ route('formations.filter') }}" method="GET">
                <!-- Search input hidden field to include in form submission -->
                <input type="hidden" id="search-term" name="search">
                
                <!-- Filter accordions -->
                <div class="space-y-4">
                    <!-- Domain filter -->
                    <div class="bg-white rounded-md shadow-sm">
                        <button type="button" class="w-full px-4 py-3 text-left flex justify-between items-center" onclick="toggleAccordion('domaine')">
                            <span>Domaine</span>
                            <i class="fas fa-chevron-down text-blue-500"></i>
                        </button>
                        <div id="domaine" class="hidden px-4 py-2">
                            <!-- Filter content here -->
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="domaine[]" value="web-development" class="mr-2 filter-checkbox" data-category="domaine" data-label="Web Development">
                                    <span>Web Development</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="domaine[]" value="design" class="mr-2 filter-checkbox" data-category="domaine" data-label="Design">
                                    <span>Design</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="domaine[]" value="marketing" class="mr-2 filter-checkbox" data-category="domaine" data-label="Marketing">
                                    <span>Marketing</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Formation filter -->
                    <div class="bg-white rounded-md shadow-sm">
                        <button type="button" class="w-full px-4 py-3 text-left flex justify-between items-center" onclick="toggleAccordion('formation')">
                            <span>Formation</span>
                            <i class="fas fa-chevron-down text-blue-500"></i>
                        </button>
                        <div id="formation" class="hidden px-4 py-2">
                            <!-- Filter content here -->
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="formation[]" value="online-courses" class="mr-2 filter-checkbox" data-category="formation" data-label="Online Courses">
                                    <span>Online Courses</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="formation[]" value="workshops" class="mr-2 filter-checkbox" data-category="formation" data-label="Workshops">
                                    <span>Workshops</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="formation[]" value="webinars" class="mr-2 filter-checkbox" data-category="formation" data-label="Webinars">
                                    <span>Webinars</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Establishment filter -->
                    <div class="bg-white rounded-md shadow-sm">
                        <button type="button" class="w-full px-4 py-3 text-left flex justify-between items-center" onclick="toggleAccordion('etablissement')">
                            <span>Établissement</span>
                            <i class="fas fa-chevron-down text-blue-500"></i>
                        </button>
                        <div id="etablissement" class="hidden px-4 py-2">
                            <!-- Filter content here -->
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="etablissement[]" value="universities" class="mr-2 filter-checkbox" data-category="etablissement" data-label="Universities">
                                    <span>Universities</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="etablissement[]" value="training-centers" class="mr-2 filter-checkbox" data-category="etablissement" data-label="Training Centers">
                                    <span>Training Centers</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="etablissement[]" value="private-schools" class="mr-2 filter-checkbox" data-category="etablissement" data-label="Private Schools">
                                    <span>Private Schools</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Tag filters -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-4">Votre Filter</h3>
                <div id="selected-filters" class="flex flex-wrap gap-2">
                    <!-- Dynamically populated tags will appear here -->
                    <button class="px-4 py-2 bg-white rounded-md shadow-sm hover:bg-gray-50 hidden" id="tag-template">
                        <span class="tag-label">Filter</span>
                        <i class="fas fa-times ml-2 text-gray-500"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Right content area -->
        <div class="flex-1">
            <!-- Articles list -->
            <div id="formations-container" class="space-y-6">
                <!-- Formation items will be loaded here -->
                @foreach($formations ?? [] as $formation)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/3">
                            <img src="{{ asset('storage/images/' . ($formation->image ?? 'default.jpg')) }}" alt="{{ $formation->title ?? 'Formation' }}" class="h-48 w-full object-cover md:h-full">
                        </div>
                        <div class="p-6 md:w-2/3">
                            <h3 class="text-xl font-bold mb-2">
                                <a href="#" class="text-gray-900 hover:text-blue-600">{{ $formation->title ?? 'Best LearnPress WordPress Theme Collection For 2023' }}</a>
                            </h3>
                            <div class="text-blue-400 mb-3">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>{{ $formation->created_at ?? 'Jan 24, 2023' }}</span>
                            </div>
                            <p class="text-gray-600">
                                {{ $formation->excerpt ?? 'Looking for an amazing & well-functional LearnPress WordPress Theme? Online education...' }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Fallback content if no formations are available -->
                @if(empty($formations ?? []))
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/3">
                            <img src="{{ asset('storage/images/meeting.jpg') }}" alt="Team meeting" class="h-48 w-full object-cover md:h-full">
                        </div>
                        <div class="p-6 md:w-2/3">
                            <h3 class="text-xl font-bold mb-2">
                                <a href="#" class="text-gray-900 hover:text-blue-600">Best LearnPress WordPress Theme Collection For 2023</a>
                            </h3>
                            <div class="text-blue-400 mb-3">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>Jan 24, 2023</span>
                            </div>
                            <p class="text-gray-600">
                                Looking for an amazing & well-functional LearnPress WordPress Theme? Online education...
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/3">
                            <img src="{{ asset('storage/images/classroom.jpg') }}" alt="Classroom" class="h-48 w-full object-cover md:h-full">
                        </div>
                        <div class="p-6 md:w-2/3">
                            <h3 class="text-xl font-bold mb-2">
                                <a href="#" class="text-cyan-500 hover:text-cyan-600">Best LearnPress WordPress Theme Collection For 2023</a>
                            </h3>
                            <div class="text-blue-400 mb-3">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <span>Jan 24, 2023</span>
                            </div>
                            <p class="text-gray-600">
                                Looking for an amazing & well-functional LearnPress WordPress Theme? Online education...
                            </p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle accordion functionality
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
        } else {
            content.classList.add('hidden');
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Open first filter by default
        document.getElementById('domaine').classList.remove('hidden');
        
        // Get DOM elements
        const filterForm = document.getElementById('filter-form');
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const searchTerm = document.getElementById('search-term');
        const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
        const selectedFiltersContainer = document.getElementById('selected-filters');
        const tagTemplate = document.getElementById('tag-template');
        
        // Initialize active filters
        const activeFilters = {};
        
        // Setup search functionality
        searchButton.addEventListener('click', function() {
            searchTerm.value = searchInput.value;
            submitFilters();
        });
        
        searchInput.addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                searchTerm.value = searchInput.value;
                submitFilters();
            }
        });
        
        // Setup filter checkbox functionality
        filterCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const category = this.dataset.category;
                const value = this.value;
                const label = this.dataset.label;
                
                if (this.checked) {
                    // Add to active filters
                    if (!activeFilters[category]) {
                        activeFilters[category] = [];
                    }
                    activeFilters[category].push({ value, label });
                } else {
                    // Remove from active filters
                    if (activeFilters[category]) {
                        activeFilters[category] = activeFilters[category].filter(item => item.value !== value);
                        if (activeFilters[category].length === 0) {
                            delete activeFilters[category];
                        }
                    }
                }
                
                // Update selected filters display
                updateSelectedFilters();
                
                // Submit the form
                submitFilters();
            });
        });
        
        // Update selected filters display
        function updateSelectedFilters() {
            // Clear current tags except template
            const currentTags = selectedFiltersContainer.querySelectorAll('button:not(#tag-template)');
            currentTags.forEach(tag => tag.remove());
            
            // Add new tags for each active filter
            Object.keys(activeFilters).forEach(category => {
                activeFilters[category].forEach(item => {
                    const newTag = tagTemplate.cloneNode(true);
                    newTag.id = `tag-${category}-${item.value}`;
                    newTag.querySelector('.tag-label').textContent = item.label;
                    newTag.classList.remove('hidden');
                    
                    // Add click handler to remove filter
                    newTag.addEventListener('click', function() {
                        // Find and uncheck the corresponding checkbox
                        const checkbox = document.querySelector(`input[name="${category}[]"][value="${item.value}"]`);
                        if (checkbox) {
                            checkbox.checked = false;
                            
                            // Update active filters
                            activeFilters[category] = activeFilters[category].filter(filter => filter.value !== item.value);
                            if (activeFilters[category].length === 0) {
                                delete activeFilters[category];
                            }
                            
                            // Update display
                            updateSelectedFilters();
                            
                            // Submit form
                            submitFilters();
                        }
                    });
                    
                    selectedFiltersContainer.appendChild(newTag);
                });
            });
        }
        
        // Submit the form with all active filters
        function submitFilters() {
            // Set search value
            searchTerm.value = searchInput.value;
            
            // Submit the form to update formations
            fetch(filterForm.action + '?' + new URLSearchParams(new FormData(filterForm)))
                .then(response => response.text())
                .then(html => {
                    // Extract only the formations part to update
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newFormations = doc.getElementById('formations-container');
                    
                    if (newFormations) {
                        document.getElementById('formations-container').innerHTML = newFormations.innerHTML;
                    }
                    
                    // Update URL with new filters without page reload
                    const url = new URL(window.location);
                    const formData = new FormData(filterForm);
                    for (const [key, value] of formData.entries()) {
                        if (url.searchParams.has(key)) {
                            if (Array.isArray(value)) {
                                url.searchParams.delete(key);
                                value.forEach(v => url.searchParams.append(key, v));
                            } else {
                                url.searchParams.set(key, value);
                            }
                        } else {
                            url.searchParams.append(key, value);
                        }
                    }
                    window.history.pushState({}, '', url);
                })
                .catch(error => {
                    console.error('Error fetching formations:', error);
                });
        }
        
        // Initialize filters from URL params on page load
        function initializeFromURL() {
            const params = new URLSearchParams(window.location.search);
            
            // Set search input
            const searchParam = params.get('search');
            if (searchParam) {
                searchInput.value = searchParam;
                searchTerm.value = searchParam;
            }
            
            // Check relevant checkboxes
            for (const [key, value] of params.entries()) {
                if (key.endsWith('[]')) {
                    const category = key.slice(0, -2);
                    const values = params.getAll(key);
                    
                    values.forEach(val => {
                        const checkbox = document.querySelector(`input[name="${key}"][value="${val}"]`);
                        if (checkbox) {
                            checkbox.checked = true;
                            
                            // Add to active filters
                            if (!activeFilters[category]) {
                                activeFilters[category] = [];
                            }
                            activeFilters[category].push({ 
                                value: val, 
                                label: checkbox.dataset.label 
                            });
                        }
                    });
                }
            }
            
            // Update selected filters display
            updateSelectedFilters();
        }
        
        // Initialize from URL on page load
        initializeFromURL();
    });
</script>
@endsection
<div class="min-h-screen bg-gray-50">
    <!-- Blue Background Section -->
    <div class="h-[40vh] bg-gradient-to-r from-blue-600 pt-96 to-indigo-700 flex items-end justify-center pb-16">
        <!-- Profile Card -->
        <div class="w-full mx-4" style="max-width: 1200px">
            <div class="bg-white rounded-xl shadow-2xl p-8 transform transition-all duration-300 hover:shadow-3xl">
                <div class="flex flex-col items-center space-y-6">
                    <!-- User Image with Decorative Border -->
                    <div class="relative">
                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" 
                                alt="{{ Auth::user()->name }}" 
                                class="w-40 h-40 rounded-full object-cover border-[6px] border-white shadow-2xl">
                        @else
                            <div class="w-40 h-40 rounded-full bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center border-[6px] border-white shadow-2xl">
                                <span class="text-indigo-600 text-5xl font-bold tracking-tighter">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- User Information -->
                    <div class="text-center space-y-4">
                        <!-- Name -->
                        <h1 class="text-4xl font-bold text-gray-900 tracking-tight">
                            {{ Auth::user()->name }}
                        </h1>

                        <!-- Roles/Status -->
                        <div class="flex flex-col space-y-2">
                            @php
                                $roles = explode('&', Auth::user()->status);
                            @endphp
                            
                            @foreach($roles as $role)
                                <span class="inline-block px-6 py-2 bg-indigo-50 text-indigo-700 rounded-full text-lg font-semibold transition-all hover:bg-indigo-100">
                                    {{ trim($role) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rest of the page content would go here -->
</div>
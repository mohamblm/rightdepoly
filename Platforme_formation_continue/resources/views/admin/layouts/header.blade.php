<header class="bg-blue-500 shadow">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Search Bar -->
        <div class="flex-1 mx-4">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" class="w-full pl-10 pr-4 py-2 rounded-md bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Search">
            </div>
        </div>

        <!-- Right Side Icons -->
        <div class="flex items-center">
            <!-- Notification Icon -->
            <button class="p-2 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>

            <!-- Settings Icon -->
            <button class="p-2 ml-2 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </button>

            <!-- User Profile -->
            <div class="ml-4">
                <div class="flex items-center">
                    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=User&background=random" alt="User Profile">
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Message -->
    <div class="px-6 py-2 bg-gray-100">
        <p class="text-gray-500">Hello Ghost, Welcome back 👋</p>
        <h2 class="text-2xl font-bold text-gray-800">Your Dashboard today</h2>
    </div>
</header>
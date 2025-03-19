<!-- admin/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro-Skills Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">
        <!-- Mobile sidebar backdrop -->
        <div x-show="sidebarOpen" 
             @click="sidebarOpen = false" 
             class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"></div>
        
        <!-- Include the sidebar with access to sidebarOpen state -->
        @include('admin.layouts.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Include the header with access to sidebarOpen state -->
            @include('admin.layouts.header')

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 md:p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
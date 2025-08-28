<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6fadc8',
                        dark: '#25345b',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        };
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        
        /* Focus styles for accessibility */
        button:focus-visible,
        input:focus-visible {
            outline: 2px solid #4a90e2 !important;
            outline-offset: 2px;
        }
        
        /* Active state for sidebar items */
        .sidebar-item.active {
            background-color: rgba(111, 173, 200, 0.1);
        }
        
        .sidebar-item.active svg {
            color: #6b7275;
        }
        
        .sidebar-item:hover {
            background-color: rgba(111, 173, 200, 0.1);
        }
        
        .sidebar-item:hover svg {
            color: #6fadc8;
        }
        .sidebar-item.active:hover {
            background-color: #6FAEC9 !important;
        }

        .sidebar-item.active:hover svg {
            color: white !important;
        }
    </style>
</head>
<body class="bg-gray-50 font-inter antialiased">
    <!-- Main Container -->
    <div class="min-h-screen w-full max-w-[1920px] mx-auto bg-gray-50">
        
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 h-20 flex items-center px-6 lg:px-10">
            <div class="flex items-center justify-between w-full max-w-[1800px] mx-auto">
                
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}" class="inline-block">
                        <img src="{{ asset('images/image.png') }}" alt="Crocodic Logo" class="mx-auto h-12 w-auto">
                    </a>
                </div>
                
                <!-- Search Bar -->
                <div class="flex-1 max-w-lg mx-8">
                    <div class="relative bg-white rounded-full shadow-sm border border-gray-200 px-4 py-3">
                        <div class="flex items-center">
                            <input type="text" 
                                   placeholder="Search project" 
                                   class="text-base text-gray-500 font-medium bg-transparent border-none outline-none flex-1 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- User Info - Tampilan default (untuk halaman selain profile) -->
                <div class="flex items-center gap-4 {{ request()->routeIs('profile.*') ? 'hidden' : '' }}">
                    <div class="text-right hidden sm:block">
                        <h3 class="text-lg font-semibold text-gray-900">{{ auth()->user()->name ?? 'Freyaa' }}</h3>
                        <p class="text-sm font-medium text-gray-500">{{ auth()->user()->role ?? 'Admin' }}</p>
                    </div>
                    
                    <!-- User Icon -->
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->name ?? 'F', 0, 1) }}</span>
                        </div>
                        
                        <!-- Logout Icon -->
                        <a href="" 
                           class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full hover:bg-red-100 transition-colors">
                            <i class="fas fa-sign-out-alt text-gray-600 text-lg hover:text-red-500"></i>
                        </a>
                    </div>
                </div>
                
                <!-- User Info - Tampilan ketika di halaman profile -->
                <div class="flex items-center gap-4 {{ !request()->routeIs('profile.*') ? 'hidden' : '' }}">
                    <div class="flex flex-col items-end">
                        <h3 class="text-2xl font-semibold text-gray-900">Freyaa</h3>
                        <p class="text-base font-medium text-gray-500">{{ auth()->user()->role ?? 'Admin' }}</p>
                    </div>
                    <div class="w-12 h-12 flex items-center justify-center bg-gray-100 rounded-full">
                        <i class="fas fa-user text-gray-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex">
            <!-- Minimalist Sidebar -->
            <aside class="w-20 min-h-screen bg-white border-r border-gray-200 flex flex-col items-center py-6">
                <nav class="flex flex-col gap-5">
                    <!-- Dashboard -->
                    <div class="group relative">
                        <a href="{{ route('dashboard') }}" class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                        </a>
                        <div class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Dashboard
                        </div>
                    </div>
                    
                    <!-- Projects -->
                    <div class="group relative">
                        <a href="{{ route('project') }}" class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 {{ request()->routeIs('project.*') ? 'text-gray-600' : 'text-gray-400' }}" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                            </svg>
                        </a>
                        <div class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Projects 
                        </div>
                    </div>
                    
                    <!-- Tasks -->
                    <div class="group relative">
                        <a href="#" class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                            </svg>
                        </a>
                        <div class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Tasks 
                        </div>
                    </div>
                    
                    <!-- Activity -->
                    <div class="group relative">
                        <a href="#" class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z"/>
                            </svg>
                        </a>
                        <div class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Activity
                        </div>
                    </div>
                    
                    <!-- Settings -->
                    <div class="group relative">
                        <a href="#" class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.22,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.22,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.68 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"/>
                            </svg>
                        </a>
                        <div class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Settings
                        </div>
                    </div>
                    
                    <!-- Profile -->
                    <div class="group relative">
                        <a href="{{ route('profile.show') }}" class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.1,7 14,7.9 14,9C14,10.1 13.1,11 12,11C10.9,11 10,10.1 10,9C10,7.9 10.9,7 12,7M12,14.5C13.25,14.5 14.45,14.85 15.5,15.46V16.75C15.5,17.44 15.19,18.07 14.68,18.49C14.17,18.91 13.6,19 12,19C10.4,19 9.83,18.91 9.32,18.49C8.81,18.07 8.5,17.44 8.5,16.75V15.46C9.55,14.85 10.75,14.5 12,14.5Z"/>
                            </svg>
                        </a>
                        <div class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Profile
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    
</body>
</html>
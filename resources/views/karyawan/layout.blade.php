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
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body class="bg-gray-50 font-inter antialiased">
    <!-- Main Container -->
    <div class="min-h-screen w-full mx-auto bg-gray-50">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 h-20 flex items-center px-2 lg:px-10">
            <div class="flex items-center justify-between w-full">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('karyawan.dashboard') }}" class="inline-block">
                        <!-- Logo Mobile -->
                        <img src="{{ asset('images/icon.png') }}" alt="Logo Icon"
                            class="mx-auto h-7 w-auto block md:hidden">

                        <!-- Logo Desktop -->
                        <img src="{{ asset('images/image.png') }}" alt="Crocodic Logo"
                            class="mx-auto h-12 w-auto hidden md:block">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="md:flex-1 md:max-w-lg md:mx-8">
                    <div class="relative bg-white rounded-full shadow-sm border border-gray-200/50 px-2 md:px-4 py-3">
                        <div class="flex items-center">
                            <input type="text" placeholder="Search project"
                                class="text-xs md:text-base text-gray-500 font-medium bg-transparent border-none outline-none flex-1 placeholder-gray-400">
                            <svg class=" w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="flex items-center gap-2 md:gap-4 {{ request()->routeIs('user-info.*') ? 'hidden' : '' }} flex-shrink-0">
                    <div class="text-right hidden sm:block">
                        <h3 class="text-lg font-semibold text-gray-900">{{ auth()->user()->name ?? 'Freyaa' }}</h3>
                        <p class="text-sm font-medium text-gray-500">{{ auth()->user()->role ?? 'Admin' }}</p>
                    </div>

                    <!-- User Icon -->
                    <div class="flex items-center md:gap-2 gap-1">

                        <!-- Tambahkan link pada ikon user -->
                        <a href="{{ route('karyawan.admin-info') }}"
                            class="sidebar-item active w-8 h-8  md:w-12 md:h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 md:w-6 md:h-6 {{ request()->routeIs('karyawan.admin-info.*') ? 'text-gray-600' : 'text-gray-400' }}"
                                fill="currentColor" viewBox="0 0 31 31">
                                <path
                                    d="M13.9993 0.666504C15.7675 0.666504 17.4632 1.36888 18.7134 2.61913C19.9636 3.86937 20.666 5.56506 20.666 7.33317C20.666 9.10128 19.9636 10.797 18.7134 12.0472C17.4632 13.2975 15.7675 13.9998 13.9993 13.9998C12.2312 13.9998 10.5355 13.2975 9.2853 12.0472C8.03506 10.797 7.33268 9.10128 7.33268 7.33317C7.33268 5.56506 8.03506 3.86937 9.2853 2.61913C10.5355 1.36888 12.2312 0.666504 13.9993 0.666504ZM13.9993 17.3332C21.366 17.3332 27.3327 20.3165 27.3327 23.9998V27.3332H0.666016V23.9998C0.666016 20.3165 6.63268 17.3332 13.9993 17.3332Z" />
                            </svg>
                        </a>

                        <a href="{{ route('logout') }}"
                            class="sidebar-item active w-8 h-8  md:w-12 md:h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-600" fill="currentColor" viewBox="0 0 31 31">
                                <path
                                    d="M3.33333 30C2.41667 30 1.63222 29.6739 0.98 29.0217C0.327778 28.3694 0.00111111 27.5844 0 26.6667V3.33333C0 2.41667 0.326667 1.63222 0.98 0.98C1.63333 0.327778 2.41778 0.00111111 3.33333 0H15V3.33333H3.33333V26.6667H15V30H3.33333ZM21.6667 23.3333L19.375 20.9167L23.625 16.6667H10V13.3333H23.625L19.375 9.08333L21.6667 6.66667L30 15L21.6667 23.3333Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex">
            <!-- Minimalist Sidebar -->
            <aside
                class="w-20 min-h-screen bg-white border-r border-gray-200 md:flex hidden flex-col items-center py-6">
                <nav class="flex flex-col gap-5">
                    <!-- Dashboard -->
                    <div class="group relative">
                        <a href="{{ route('karyawan.dashboard') }}"
                            class="sidebar-item w-12 h-12 rounded-full {{ request()->routeIs('karyawan.dashboard') ? 'bg-[#6FAEC9] text-white' : 'text-gray-600' }} flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 31 31">
                                <path
                                    d="M1.83333 14.9583H10.5833C10.9701 14.9583 11.341 14.8047 11.6145 14.5312C11.888 14.2577 12.0417 13.8868 12.0417 13.5V1.83333C12.0417 1.44656 11.888 1.07563 11.6145 0.802136C11.341 0.528645 10.9701 0.375 10.5833 0.375H1.83333C1.44656 0.375 1.07563 0.528645 0.802136 0.802136C0.528645 1.07563 0.375 1.44656 0.375 1.83333V13.5C0.375 13.8868 0.528645 14.2577 0.802136 14.5312C1.07563 14.8047 1.44656 14.9583 1.83333 14.9583ZM0.375 25.1667C0.375 25.5534 0.528645 25.9244 0.802136 26.1979C1.07563 26.4714 1.44656 26.625 1.83333 26.625H10.5833C10.9701 26.625 11.341 26.4714 11.6145 26.1979C11.888 25.9244 12.0417 25.5534 12.0417 25.1667V19.3333C12.0417 18.9466 11.888 18.5756 11.6145 18.3021C11.341 18.0286 10.9701 17.875 10.5833 17.875H1.83333C1.44656 17.875 1.07563 18.0286 0.802136 18.3021C0.528645 18.5756 0.375 18.9466 0.375 19.3333V25.1667ZM14.9583 25.1667C14.9583 25.5534 15.112 25.9244 15.3855 26.1979C15.659 26.4714 16.0299 26.625 16.4167 26.625H25.1667C25.5534 26.625 25.9244 26.4714 26.1979 26.1979C26.4714 25.9244 26.625 25.5534 26.625 25.1667V14.9583C26.625 14.5716 26.4714 14.2006 26.1979 13.9271C25.9244 13.6536 25.5534 13.5 25.1667 13.5H16.4167C16.0299 13.5 15.659 13.6536 15.3855 13.9271C15.112 14.2006 14.9583 14.5716 14.9583 14.9583V25.1667ZM16.4167 10.5833H25.1667C25.5534 10.5833 25.9244 10.4297 26.1979 10.1562C26.4714 9.88271 26.625 9.51177 26.625 9.125V1.83333C26.625 1.44656 26.4714 1.07563 26.1979 0.802136C25.9244 0.528645 25.5534 0.375 25.1667 0.375H16.4167C16.0299 0.375 15.659 0.528645 15.3855 0.802136C15.112 1.07563 14.9583 1.44656 14.9583 1.83333V9.125C14.9583 9.51177 15.112 9.88271 15.3855 10.1562C15.659 10.4297 16.0299 10.5833 16.4167 10.5833Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Dashboard
                        </div>
                    </div>

                    <!-- Projects -->
                    <div class="group relative">
                        <a href="{{ route('karyawan.project') }}"
                            class="sidebar-item w-12 h-12 rounded-full {{ request()->routeIs('karyawan.project') ? 'bg-[#6FAEC9] text-white' : 'text-gray-600' }} flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 31 31">
                                <path
                                    d="M27.0781 0.828125H1.92188C1.31689 0.828125 0.828125 1.31689 0.828125 1.92188V27.0781C0.828125 27.6831 1.31689 28.1719 1.92188 28.1719H27.0781C27.6831 28.1719 28.1719 27.6831 28.1719 27.0781V1.92188C28.1719 1.31689 27.6831 0.828125 27.0781 0.828125ZM9.57812 22.4297C9.57812 22.5801 9.45508 22.7031 9.30469 22.7031H6.57031C6.41992 22.7031 6.29688 22.5801 6.29688 22.4297V6.57031C6.29688 6.41992 6.41992 6.29688 6.57031 6.29688H9.30469C9.45508 6.29688 9.57812 6.41992 9.57812 6.57031V22.4297ZM16.1406 12.8594C16.1406 13.0098 16.0176 13.1328 15.8672 13.1328H13.1328C12.9824 13.1328 12.8594 13.0098 12.8594 12.8594V6.57031C12.8594 6.41992 12.9824 6.29688 13.1328 6.29688H15.8672C16.0176 6.29688 16.1406 6.41992 16.1406 6.57031V12.8594ZM22.7031 15.3203C22.7031 15.4707 22.5801 15.5938 22.4297 15.5938H19.6953C19.5449 15.5938 19.4219 15.4707 19.4219 15.3203V6.57031C19.4219 6.41992 19.5449 6.29688 19.6953 6.29688H22.4297C22.5801 6.29688 22.7031 6.41992 22.7031 6.57031V15.3203Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Projects
                        </div>
                    </div>

                    <!-- Tasks -->
                    <div class="group relative">
                        <a href="{{ route('karyawan.task') }}"
                            class="sidebar-item w-12 h-12 rounded-full {{ request()->routeIs('karyawan.task') ? 'bg-[#6FAEC9] text-white' : 'text-gray-600' }} flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 31 31">
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="M15.4154 0.916016H3.7487C2.14453 0.916016 0.846615 2.22852 0.846615 3.83268L0.832031 27.166C0.832031 28.7702 2.12995 30.0827 3.73411 30.0827H21.2487C22.8529 30.0827 24.1654 28.7702 24.1654 27.166V9.66602L15.4154 0.916016ZM10.9529 24.2494L5.79036 19.0868L7.84662 17.0306L10.9383 20.1223L17.1216 13.9389L19.1779 15.9952L10.9529 24.2494ZM13.957 11.1243V3.10352L21.9779 11.1243H13.957Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Tasks
                        </div>
                    </div>

                    <!-- Administration -->
                    <div class="group relative">
                        <a href="{{ route('karyawan.administration-list') }}"
                            class="sidebar-item w-12 h-12 rounded-full {{ request()->routeIs('karyawan.administration-list') ? 'bg-[#6FAEC9] text-white' : 'text-gray-600' }} flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 31 31">
                                <path
                                    d="M6.20833 0.916992C4.66124 0.916992 3.17751 1.53157 2.08354 2.62554C0.989581 3.7195 0.375 5.20323 0.375 6.75033V24.2503C0.375 25.7974 0.989581 27.2812 2.08354 28.3751C3.17751 29.4691 4.66124 30.0837 6.20833 30.0837H26.625V0.916992H6.20833ZM12.0417 5.29199H22.25V8.20866H12.0417V5.29199ZM3.29167 24.2503C3.29167 23.4768 3.59896 22.7349 4.14594 22.1879C4.69292 21.641 5.43479 21.3337 6.20833 21.3337H23.7083V27.167H6.20833C5.43479 27.167 4.69292 26.8597 4.14594 26.3127C3.59896 25.7657 3.29167 25.0239 3.29167 24.2503Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Administration
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-4 lg:p-8 mb-12 md:mb-0">
                @yield('content')
            </main>
            <nav
                class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 flex justify-around items-center p-4 md:hidden z-50">
                <!-- Dashboard -->
                <a href="{{ route('karyawan.dashboard') }}"
                    class="flex flex-col items-center {{ request()->routeIs('karyawan.dashboard') ? 'text-[#6FAEC9]' : 'text-gray-600' }}">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 31 31">
                        <path
                            d="M1.83333 14.9583H10.5833C10.9701 14.9583 11.341 14.8047 11.6145 14.5312C11.888 14.2577 12.0417 13.8868 12.0417 13.5V1.83333C12.0417 1.44656 11.888 1.07563 11.6145 0.802136C11.341 0.528645 10.9701 0.375 10.5833 0.375H1.83333C1.44656 0.375 1.07563 0.528645 0.802136 0.802136C0.528645 1.07563 0.375 1.44656 0.375 1.83333V13.5C0.375 13.8868 0.528645 14.2577 0.802136 14.5312C1.07563 14.8047 1.44656 14.9583 1.83333 14.9583ZM0.375 25.1667C0.375 25.5534 0.528645 25.9244 0.802136 26.1979C1.07563 26.4714 1.44656 26.625 1.83333 26.625H10.5833C10.9701 26.625 11.341 26.4714 11.6145 26.1979C11.888 25.9244 12.0417 25.5534 12.0417 25.1667V19.3333C12.0417 18.9466 11.888 18.5756 11.6145 18.3021C11.341 18.0286 10.9701 17.875 10.5833 17.875H1.83333C1.44656 17.875 1.07563 18.0286 0.802136 18.3021C0.528645 18.5756 0.375 18.9466 0.375 19.3333V25.1667ZM14.9583 25.1667C14.9583 25.5534 15.112 25.9244 15.3855 26.1979C15.659 26.4714 16.0299 26.625 16.4167 26.625H25.1667C25.5534 26.625 25.9244 26.4714 26.1979 26.1979C26.4714 25.9244 26.625 25.5534 26.625 25.1667V14.9583C26.625 14.5716 26.4714 14.2006 26.1979 13.9271C25.9244 13.6536 25.5534 13.5 25.1667 13.5H16.4167C16.0299 13.5 15.659 13.6536 15.3855 13.9271C15.112 14.2006 14.9583 14.5716 14.9583 14.9583V25.1667ZM16.4167 10.5833H25.1667C25.5534 10.5833 25.9244 10.4297 26.1979 10.1562C26.4714 9.88271 26.625 9.51177 26.625 9.125V1.83333C26.625 1.44656 26.4714 1.07563 26.1979 0.802136C25.9244 0.528645 25.5534 0.375 25.1667 0.375H16.4167C16.0299 0.375 15.659 0.528645 15.3855 0.802136C15.112 1.07563 14.9583 1.44656 14.9583 1.83333V9.125C14.9583 9.51177 15.112 9.88271 15.3855 10.1562C15.659 10.4297 16.0299 10.5833 16.4167 10.5833Z" />
                    </svg>
                    <span class="text-[10px]">Dashboard</span>
                </a>

                <!-- Projects -->
                <a href="{{ route('karyawan.project') }}"
                    class="flex flex-col items-center {{ request()->routeIs('karyawan.project') ? 'text-[#6FAEC9]' : 'text-gray-600' }}">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 31 31">
                        <path
                            d="M27.0781 0.828125H1.92188C1.31689 0.828125 0.828125 1.31689 0.828125 1.92188V27.0781C0.828125 27.6831 1.31689 28.1719 1.92188 28.1719H27.0781C27.6831 28.1719 28.1719 27.6831 28.1719 27.0781V1.92188C28.1719 1.31689 27.6831 0.828125 27.0781 0.828125ZM9.57812 22.4297C9.57812 22.5801 9.45508 22.7031 9.30469 22.7031H6.57031C6.41992 22.7031 6.29688 22.5801 6.29688 22.4297V6.57031C6.29688 6.41992 6.41992 6.29688 6.57031 6.29688H9.30469C9.45508 6.29688 9.57812 6.41992 9.57812 6.57031V22.4297ZM16.1406 12.8594C16.1406 13.0098 16.0176 13.1328 15.8672 13.1328H13.1328C12.9824 13.1328 12.8594 13.0098 12.8594 12.8594V6.57031C12.8594 6.41992 12.9824 6.29688 13.1328 6.29688H15.8672C16.0176 6.29688 16.1406 6.41992 16.1406 6.57031V12.8594ZM22.7031 15.3203C22.7031 15.4707 22.5801 15.5938 22.4297 15.5938H19.6953C19.5449 15.5938 19.4219 15.4707 19.4219 15.3203V6.57031C19.4219 6.41992 19.5449 6.29688 19.6953 6.29688H22.4297C22.5801 6.29688 22.7031 6.41992 22.7031 6.57031V15.3203Z" />
                    </svg>
                    <span class="text-[10px]">Projects</span>
                </a>

                <!-- Tasks -->
                <a href="{{ route('karyawan.task') }}"
                    class="flex flex-col items-center {{ request()->routeIs('karyawan.task') ? 'text-[#6FAEC9]' : 'text-gray-600' }}">
                    <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 31 31">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M15.4154 0.916016H3.7487C2.14453 0.916016 0.846615 2.22852 0.846615 3.83268L0.832031 27.166C0.832031 28.7702 2.12995 30.0827 3.73411 30.0827H21.2487C22.8529 30.0827 24.1654 28.7702 24.1654 27.166V9.66602L15.4154 0.916016ZM10.9529 24.2494L5.79036 19.0868L7.84662 17.0306L10.9383 20.1223L17.1216 13.9389L19.1779 15.9952L10.9529 24.2494ZM13.957 11.1243V3.10352L21.9779 11.1243H13.957Z" />
                    </svg>
                    <span class="text-[10px]">Administration</span>
                </a>

            </nav>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('script.js') }}"></script>
</body>

</html>

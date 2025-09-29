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

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            width: 667px;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.95);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        /* Custom Radio Buttons */
        input[type="radio"]:checked+label span span {
            opacity: 1;
        }

        /* Scrollbar Styling */
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
                max-width: 400px;
            }
        }

        /* Alert Styles */
        .alert-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .alert-box {
            background: white;
            border-radius: 12px;
            padding: 24px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            text-align: center;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.2s ease-out;
        }

        .alert-box.show {
            transform: scale(1);
            opacity: 1;
        }

        .alert-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert-icon.success {
            background-color: #10b981;
        }

        .alert-icon.error {
            background-color: #ef4444;
        }

        .alert-icon.warning {
            background-color: #f59e0b;
        }

        .alert-title {
            font-family: 'Inter', Helvetica;
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 8px;
            color: #111111;
        }

        .alert-message {
            font-family: 'Inter', Helvetica;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .alert-button {
            background-color: #111111;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-family: 'Inter', Helvetica;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.2s;
            min-width: 80px;
        }

        .alert-button:hover {
            background-color: #333333;
        }

        /* User icon specific styles */
        .user-icon {
            transition: all 0.3s ease;
        }

        .user-icon.active {
            background-color: rgba(111, 173, 200, 0.1);
        }

        .user-icon.active span {
            color: #6b7275;
        }

        .user-icon:hover {
            background-color: #6FAEC9;
        }

        .user-icon:hover span {
            color: white;
        }

        .user-icon.active:hover {
            background-color: #6FAEC9 !important;
        }

        .user-icon.active:hover span {
            color: white !important;
        }

        /* administration style */
        /* Hide default date picker styles but keep functionality */
        input[type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
            position: absolute;
            right: 0;
            width: 50px;
            height: 100%;
            cursor: pointer;
        }

        /* Hide dropdown arrow for select */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        /* Focus styles */
        select:focus,
        input[type="date"]:focus,
        textarea:focus {
            outline: none;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
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
    <script>
        @stack('scripts')
        document.addEventListener('DOMContentLoaded', function() {
            const statusButtons = document.querySelectorAll('.status-btn');
            const employeeCards = document.querySelectorAll('.employee-card');

            // Set initial state - show only complete employees
            filterEmployees('ready');

            statusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const status = this.getAttribute('data-status');

                    // Update button styles
                    statusButtons.forEach(btn => {
                        btn.classList.remove('bg-gray-900', 'text-white');
                        btn.classList.add('bg-gray-100', 'text-gray-700',
                            'hover:bg-gray-200');
                    });

                    this.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                    this.classList.add('bg-gray-900', 'text-white');

                    // Filter employees
                    filterEmployees(status);
                });
            });

            function filterEmployees(status) {
                employeeCards.forEach(card => {
                    if (card.getAttribute('data-status') === status) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });

                // If no cards visible for this status, show message
                const visibleCards = document.querySelectorAll(
                    `.employee-card[data-status="${status}"]:not(.hidden)`);
                if (visibleCards.length === 0) {
                    // Create a message element if it doesn't exist
                    let messageElement = document.getElementById('noEmployeesMessage');
                    if (!messageElement) {
                        messageElement = document.createElement('div');
                        messageElement.id = 'noEmployeesMessage';
                        messageElement.className = 'col-span-full text-center py-8 text-gray-500';
                        document.getElementById('employeeCards').appendChild(messageElement);
                    }
                    messageElement.textContent = `No employees with status: ${status}`;
                } else {
                    // Remove message if it exists
                    const messageElement = document.getElementById('noEmployeesMessage');
                    if (messageElement) {
                        messageElement.remove();
                    }
                }
            }
        });


        // Modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const createTaskBtn = document.getElementById('createTaskBtn');
            const closeCreateTaskModal = document.getElementById('closeCreateTaskModal');
            const createTaskModal = document.getElementById('createTaskModal');
            const transferTaskBtn = document.getElementById('transferTaskBtn');
            const closeModal = document.getElementById('closeModal');
            const transferTaskModal = document.getElementById('transferTaskModal');
            const alertOverlay = document.getElementById('alertOverlay');
            const alertButton = document.getElementById('alertButton');
            const createTaskForm = createTaskModal.querySelector('form');
            const transferTaskForm = transferTaskModal.querySelector('form');

            // Open Create Task Modal
            createTaskBtn.addEventListener('click', () => {
                createTaskModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Close Create Task Modal
            closeCreateTaskModal.addEventListener('click', () => {
                createTaskModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Open Transfer Task Modal
            transferTaskBtn.addEventListener('click', () => {
                transferTaskModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            // Close Transfer Task Modal
            closeModal.addEventListener('click', () => {
                transferTaskModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Close modals when clicking outside
            [createTaskModal, transferTaskModal].forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                });
            });

            // Close alert modal
            alertButton.addEventListener('click', () => {
                alertOverlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Form validation and submission
            [createTaskForm, transferTaskForm].forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    if (validateForm(form)) {
                        // Simulate form submission
                        showAlert('Success', 'Task has been created successfully.', 'success');
                        form.reset();
                        createTaskModal.classList.remove('active');
                        transferTaskModal.classList.remove('active');
                    } else {
                        showAlert('Error', 'Please fill all required fields correctly.', 'error');
                    }
                });
            });

            // Form validation function
            function validateForm(form) {
                let isValid = true;
                const inputs = form.querySelectorAll('[required]');

                inputs.forEach(input => {
                    const errorElement = document.getElementById(`${input.id}-error`);
                    if (!input.value) {
                        if (errorElement) {
                            errorElement.textContent = 'This field is required';
                            errorElement.classList.remove('hidden');
                        }
                        isValid = false;
                    } else {
                        if (errorElement) {
                            errorElement.classList.add('hidden');
                        }
                    }
                });

                // Check if at least one radio button is selected
                const radioGroups = form.querySelectorAll('input[type="radio"]');
                const radioNames = [...new Set(Array.from(radioGroups).map(radio => radio.name))];

                radioNames.forEach(name => {
                    const radios = form.querySelectorAll(`input[name="${name}"]`);
                    const checked = Array.from(radios).some(radio => radio.checked);
                    if (!checked) {
                        isValid = false;
                        // You could add error display for radio groups here
                    }
                });

                return isValid;
            }

            // Show alert function
            function showAlert(title, message, type) {
                const alertIcon = document.getElementById('alertIcon');
                const alertIconSvg = document.getElementById('alertIconSvg');
                const alertTitle = document.getElementById('alertTitle');
                const alertMessage = document.getElementById('alertMessage');

                // Set alert content
                alertTitle.textContent = title;
                alertMessage.textContent = message;

                // Set alert style based on type
                if (type === 'success') {
                    alertIcon.classList.add('bg-green-500');
                    alertIcon.classList.remove('bg-red-500', 'hidden');
                    alertIconSvg.innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
                } else if (type === 'error') {
                    alertIcon.classList.add('bg-red-500');
                    alertIcon.classList.remove('bg-green-500', 'hidden');
                    alertIconSvg.innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                }

                // Show alert
                alertOverlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';

                // Animate in
                setTimeout(() => {
                    alertOverlay.querySelector('.transform').classList.remove('opacity-0', 'scale-95');
                    alertOverlay.querySelector('.transform').classList.add('opacity-100', 'scale-100');
                }, 10);
            }

            // Custom radio button behavior
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', () => {
                    // Update the visual state of all radio buttons in the group
                    const groupName = radio.name;
                    document.querySelectorAll(`input[name="${groupName}"]`).forEach(r => {
                        const label = document.querySelector(`label[for="${r.id}"]`);
                        if (label) {
                            const indicator = label.querySelector('span span');
                            if (r.checked) {
                                indicator.classList.remove('opacity-0');
                            } else {
                                indicator.classList.add('opacity-0');
                            }
                        }
                    });
                });
            });
        });
        // Task Detail and Edit Modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            const taskRows = document.querySelectorAll('.task-row');
            const taskModal = document.getElementById('taskDetailModal');
            const closeModalBtn = document.getElementById('closeTaskModal');
            const editTaskBtn = document.getElementById('editTaskBtn');
            const editTaskModal = document.getElementById('editTaskModal');
            const closeEditModalBtn = document.getElementById('closeEditTaskModal');
            const submitEditTaskBtn = document.getElementById('submitEditTask');
            const editTaskNameInput = document.getElementById('edit-task-name');
            const levelIndicators = document.querySelectorAll('.level-indicator');
            const levelInputs = document.querySelectorAll('input[name="task-level"]');

            // Status color mapping
            const statusColors = {
                'To do': '#e94949',
                'Progress': '#ffb32d',
                'Complete': '#7db445',
                'Review': '#6fadc8'
            };

            // Level color mapping
            const levelColors = {
                'High': '#e94949',
                'Medium': '#ffb32d',
                'Low': '#6fadc8'
            };

            let currentTaskData = {};

            // Open modal when a task row is clicked
            taskRows.forEach(row => {
                row.addEventListener('click', function() {
                    const taskId = this.getAttribute('data-task-id');
                    const taskName = this.getAttribute('data-task-name');
                    const project = this.getAttribute('data-project');
                    const assignee = this.getAttribute('data-assignee');
                    const level = this.getAttribute('data-level');
                    const status = this.getAttribute('data-status');
                    const created = this.getAttribute('data-created');
                    const timeline = this.getAttribute('data-timeline');

                    // Store current task data
                    currentTaskData = {
                        taskId,
                        taskName,
                        project,
                        assignee,
                        level,
                        status,
                        created,
                        timeline
                    };

                    // Update modal content with task data
                    document.getElementById('task-details-heading').textContent = taskName;
                    document.getElementById('task-project').textContent = project;
                    document.getElementById('task-assignee').textContent = assignee;
                    document.getElementById('assignee-initial').textContent = assignee.charAt(0);
                    document.getElementById('task-timeline').textContent = timeline;
                    document.getElementById('task-timeline').setAttribute('datetime', timeline
                        .replace(/\s/g, ''));

                    // Update status with appropriate color
                    const statusElement = document.getElementById('task-status');
                    statusElement.innerHTML =
                        `<span class="font-medium text-white text-sm">${status}</span>`;
                    statusElement.style.backgroundColor = statusColors[status] || '#e94949';

                    // Update level with appropriate color
                    const levelElement = document.getElementById('task-level');
                    levelElement.innerHTML =
                        `<span class="font-medium text-white text-sm">${level}</span>`;
                    levelElement.style.backgroundColor = levelColors[level] || '#ffb32d';

                    // Show the modal
                    taskModal.classList.remove('hidden');
                    taskModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close modal when close button is clicked
            closeModalBtn.addEventListener('click', function() {
                taskModal.classList.remove('active');
                taskModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Open edit modal when edit button is clicked
            editTaskBtn.addEventListener('click', function() {
                // Populate edit form with current task data
                editTaskNameInput.value = currentTaskData.taskName;

                // Set the correct level radio button
                document.querySelectorAll('input[name="task-level"]').forEach(input => {
                    if (input.value === currentTaskData.level) {
                        input.checked = true;
                        updateLevelIndicator(input.value);
                    }
                });

                // Close detail modal and open edit modal
                taskModal.classList.remove('active');
                taskModal.classList.add('hidden');
                editTaskModal.classList.remove('hidden');
                editTaskModal.classList.add('active');
            });

            // Close edit modal when close button is clicked
            closeEditModalBtn.addEventListener('click', function() {
                editTaskModal.classList.remove('active');
                editTaskModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Handle level selection
            levelInputs.forEach(input => {
                input.addEventListener('change', function() {
                    updateLevelIndicator(this.value);
                });
            });

            // Update level indicator style
            function updateLevelIndicator(level) {
                levelIndicators.forEach(indicator => {
                    indicator.style.backgroundColor = 'transparent';
                    if (indicator.getAttribute('data-level') === level) {
                        indicator.style.backgroundColor = levelColors[level] || '#ffb32d';
                    }
                });
            }

            // Submit edit form
            submitEditTaskBtn.addEventListener('click', function() {
                const newTaskName = editTaskNameInput.value;
                const newLevel = document.querySelector('input[name="task-level"]:checked').value;

                // Update the task data (in a real app, this would send to server)
                currentTaskData.taskName = newTaskName;
                currentTaskData.level = newLevel;

                // Show success message
                alert('Task updated successfully!');

                // Close edit modal
                editTaskModal.classList.remove('active');
                editTaskModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside
            [taskModal, editTaskModal].forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                });
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (taskModal.classList.contains('active')) {
                        taskModal.classList.remove('active');
                        taskModal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                    if (editTaskModal.classList.contains('active')) {
                        editTaskModal.classList.remove('active');
                        editTaskModal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                }
            });
        });

        // administration page - toggle user status
        // Radio button functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Handle radio button visual feedback
            const radioGroups = ['bring_laptop', 'can_be_contacted'];

            radioGroups.forEach(groupName => {
                const radios = document.querySelectorAll(`input[name="${groupName}"]`);
                radios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        // Reset all images in this group
                        const allLabels = document.querySelectorAll(
                            `input[name="${groupName}"]`);
                        allLabels.forEach(r => {
                            const img = r.nextElementSibling;
                            img.src =
                                'https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg';
                        });

                        // Set selected image (you can change this to a selected state image)
                        if (this.checked) {
                            const selectedImg = this.nextElementSibling;
                            // You can replace this with a different image for selected state
                            selectedImg.src =
                                'https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg';
                            selectedImg.style.filter = 'brightness(0.8)'; // Visual feedback
                        }
                    });
                });
            });

            // Date validation
            const startDate = document.getElementById('start-date');
            const endDate = document.getElementById('end-date');

            startDate.addEventListener('change', function() {
                endDate.min = this.value;
                if (endDate.value && endDate.value < this.value) {
                    endDate.value = '';
                    alert('End date must be after start date');
                }
            });

            endDate.addEventListener('change', function() {
                if (startDate.value && this.value < startDate.value) {
                    this.value = '';
                    alert('End date must be after start date');
                }
            });
        });

        // Form submission
        function submitForm() {
            const form = document.querySelector('form');
            const formData = new FormData(form);

            // Basic validation
            const category = formData.get('leave_category');
            const startDate = formData.get('start_date');
            const endDate = formData.get('end_date');
            const description = formData.get('description');

            if (!category) {
                alert('Please select a leave category');
                return;
            }

            if (!startDate || !endDate) {
                alert('Please select both start and end dates');
                return;
            }

            if (!description.trim()) {
                alert('Please enter a description');
                return;
            }

            // Log form data (replace with actual submission)
            console.log('Form Data:', {
                category: category,
                startDate: startDate,
                endDate: endDate,
                description: description,
                bringLaptop: formData.get('bring_laptop'),
                canBeContacted: formData.get('can_be_contacted')
            });

            alert('Leave request submitted successfully!');
        }

        // Reset form
        function resetForm() {
            const form = document.querySelector('form');
            form.reset();

            // Reset radio button visual states
            const allRadioImages = document.querySelectorAll('input[type="radio"] + img');
            allRadioImages.forEach(img => {
                img.style.filter = 'none';
            });
        }

        let selectedOptions = {};

        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');

            // Close other dropdowns
            document.getElementById('dropdownMenu2').classList.add('hidden');
        }

        function toggleDropdown2() {
            const dropdown = document.getElementById('dropdownMenu2');
            dropdown.classList.toggle('hidden');

            // Close other dropdowns
            document.getElementById('dropdownMenu').classList.add('hidden');
        }

        function selectOption(value, text) {
            // Update the display text
            document.getElementById('selectedText').textContent = text;
            document.getElementById('selectedText').classList.remove('text-[#7d7d7d]');
            document.getElementById('selectedText').classList.add('text-black');

            // Set the hidden input value
            document.getElementById('selectedValue').value = value;

            // Store selection
            selectedOptions['dropdown1'] = value;

            // Close the dropdown
            document.getElementById('dropdownMenu').classList.add('hidden');

            // Update dropdown options styling
            updateDropdownStyling('dropdownMenu', value);
        }

        function selectOption2(value, text) {
            // Update the display text
            document.getElementById('selectedText2').textContent = text;
            document.getElementById('selectedText2').classList.remove('text-[#7d7d7d]');
            document.getElementById('selectedText2').classList.add('text-black');

            // Store selection
            selectedOptions['dropdown2'] = value;

            // Close the dropdown
            document.getElementById('dropdownMenu2').classList.add('hidden');

            // Update dropdown options styling
            updateDropdownStyling('dropdownMenu2', value);
        }

        function updateDropdownStyling(dropdownId, selectedValue) {
            const dropdown = document.getElementById(dropdownId);
            const options = dropdown.querySelectorAll('div[onclick^="selectOption"]');

            options.forEach(option => {
                const optionValue = option.getAttribute('onclick').match(/'([^']+)'/)[1];

                if (optionValue === selectedValue) {
                    // Selected option styling
                    option.classList.remove('bg-white', 'hover:bg-[#e0e0e0]');
                    option.classList.add('bg-[#e0e0e0]', 'hover:bg-[#d0d0d0]');
                } else {
                    // Normal option styling
                    option.classList.remove('bg-[#e0e0e0]', 'hover:bg-[#d0d0d0]');
                    option.classList.add('bg-white', 'hover:bg-[#e0e0e0]');
                }
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown1 = document.getElementById('dropdownMenu');
            const button1 = event.target.closest('button[onclick="toggleDropdown()"]');

            if (!button1 && !dropdown1.contains(event.target)) {
                dropdown1.classList.add('hidden');
            }
        });

        // Initialize dropdown styling on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial selected option for demo (second dropdown)
            setTimeout(() => {
                selectOption2('website_management', 'Website Management Company');
            }, 100);
        });
    </script>
</body>

</html>

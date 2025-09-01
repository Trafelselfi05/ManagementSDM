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
                            <input type="text" placeholder="Search project"
                                class="text-base text-gray-500 font-medium bg-transparent border-none outline-none flex-1 placeholder-gray-400">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- User Info - Tampilan default (untuk halaman selain user-info) -->
                <div class="flex items-center gap-4 {{ request()->routeIs('user-info.*') ? 'hidden' : '' }}">
                    <div class="text-right hidden sm:block">
                        <h3 class="text-lg font-semibold text-gray-900">{{ auth()->user()->name ?? 'Freyaa' }}</h3>
                        <p class="text-sm font-medium text-gray-500">{{ auth()->user()->role ?? 'Admin' }}</p>
                    </div>

                    <!-- User Icon -->
                    <div class="flex items-center gap-2">
                        <!-- Tambahkan link pada ikon user -->
                        <a href="{{ route('user-info') }}"
                            class="user-icon active w-12 h-12 rounded-full flex items-center justify-center transition-colors bg-gray-200">
                            <span class="text-gray-600 font-semibold text-sm transition-colors">F</span>
                        </a>

                        <!-- Logout Icon - Hanya tampil di halaman selain user-info -->
                        <a href=""
                            class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full hover:bg-red-100 transition-colors">
                            <i class="fas fa-sign-out-alt text-gray-600 text-lg hover:text-red-500"></i>
                        </a>
                    </div>
                </div>

                <!-- User Info - Tampilan ketika di halaman user-info (tanpa logout icon) -->
                <div class="flex items-center gap-4 {{ !request()->routeIs('user-info.*') ? 'hidden' : '' }}">
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
                        <a href="{{ route('dashboard') }}"
                            class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Dashboard
                        </div>
                    </div>

                    <!-- Projects -->
                    <div class="group relative">
                        <a href="{{ route('project') }}"
                            class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 {{ request()->routeIs('project.*') ? 'text-gray-600' : 'text-gray-400' }}"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Projects
                        </div>
                    </div>

                    <!-- Tasks -->
                    <div class="group relative">
                        <a href="{{ route('task') }}"
                            class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 {{ request()->routeIs('task.*') ? 'text-gray-600' : 'text-gray-400' }}"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Tasks
                        </div>
                    </div>

                    <!-- Activity -->
                    <div class="group relative">
                        <a href="{{ route('activity') }}"
                            class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 {{ request()->routeIs('activity.*') ? 'text-gray-600' : 'text-gray-400' }}"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Activity
                        </div>
                    </div>

                    <!-- Settings -->
                    <div class="group relative">
                        <a href="#"
                            class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.22,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.22,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.68 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
                            Settings
                        </div>
                    </div>

                    <!-- Profile -->
                    <div class="group relative">
                        <a href=""
                            class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.1,7 14,7.9 14,9C14,10.1 13.1,11 12,11C10.9,11 10,10.1 10,9C10,7.9 10.9,7 12,7M12,14.5C13.25,14.5 14.45,14.85 15.5,15.46V16.75C15.5,17.44 15.19,18.07 14.68,18.49C14.17,18.91 13.6,19 12,19C10.4,19 9.83,18.91 9.32,18.49C8.81,18.07 8.5,17.44 8.5,16.75V15.46C9.55,14.85 10.75,14.5 12,14.5Z" />
                            </svg>
                        </a>
                        <div
                            class="absolute left-14 top-1/2 transform -translate-y-1/2 bg-[#6FAEC9] text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10">
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
    <script>
        @stack('scripts')
        document.addEventListener('DOMContentLoaded', function() {
            const statusButtons = document.querySelectorAll('.status-btn');
            const employeeCards = document.querySelectorAll('.employee-card');

            // Set initial state - show only complete employees
            filterEmployees('complete');

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
                    taskId, taskName, project, assignee, level, status, created, timeline
                };
                
                // Update modal content with task data
                document.getElementById('task-details-heading').textContent = taskName;
                document.getElementById('task-project').textContent = project;
                document.getElementById('task-assignee').textContent = assignee;
                document.getElementById('assignee-initial').textContent = assignee.charAt(0);
                document.getElementById('task-timeline').textContent = timeline;
                document.getElementById('task-timeline').setAttribute('datetime', timeline.replace(/\s/g, ''));
                
                // Update status with appropriate color
                const statusElement = document.getElementById('task-status');
                statusElement.innerHTML = `<span class="font-medium text-white text-sm">${status}</span>`;
                statusElement.style.backgroundColor = statusColors[status] || '#e94949';
                
                // Update level with appropriate color
                const levelElement = document.getElementById('task-level');
                levelElement.innerHTML = `<span class="font-medium text-white text-sm">${level}</span>`;
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
    </script>
</body>

</html>

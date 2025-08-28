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
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            width: 667px;
            height: 673px;
            position: relative;
            margin: 20px;
            max-height: 90vh;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
                max-width: 500px;
                height: auto;
                max-height: 80vh;
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
                        <a href="#"
                            class="sidebar-item active w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
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

        document.addEventListener('DOMContentLoaded', function() {
            const transferTaskModal = document.getElementById('transferTaskModal');
            const closeModal = document.getElementById('closeModal');
            const alertOverlay = document.getElementById('alertOverlay');
            const alertBox = alertOverlay.querySelector('div');
            const alertIcon = document.getElementById('alertIcon');
            const alertIconSvg = document.getElementById('alertIconSvg');
            const alertTitle = document.getElementById('alertTitle');
            const alertMessage = document.getElementById('alertMessage');
            const alertButton = document.getElementById('alertButton');
            const form = document.querySelector('form');

            // Function to show alert
            function showAlert(type, title, message) {
                // Set icon and color based on type
                alertIcon.className = `w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center`;

                switch (type) {
                    case 'success':
                        alertIcon.classList.add('bg-green-500');
                        alertIconSvg.innerHTML =
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
                        break;
                    case 'error':
                        alertIcon.classList.add('bg-red-500');
                        alertIconSvg.innerHTML =
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                        break;
                    case 'warning':
                        alertIcon.classList.add('bg-yellow-500');
                        alertIconSvg.innerHTML =
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>';
                        break;
                }

                alertTitle.textContent = title;
                alertMessage.textContent = message;

                // Show alert
                alertOverlay.classList.remove('hidden');
                setTimeout(() => {
                    alertBox.classList.remove('opacity-0', 'scale-95');
                    alertBox.classList.add('opacity-100', 'scale-100');
                }, 10);
            }

            // Function to close alert
            function closeAlert() {
                alertBox.classList.remove('opacity-100', 'scale-100');
                alertBox.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    alertOverlay.classList.add('hidden');
                }, 200);
            }

            // Open modal when Transfer Task button is clicked (asumsi ada button dengan id transferTaskBtn)
            const transferTaskBtn = document.getElementById('transferTaskBtn');
            if (transferTaskBtn) {
                transferTaskBtn.addEventListener('click', function() {
                    transferTaskModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            }

            // Close modal when close button is clicked
            closeModal.addEventListener('click', function() {
                transferTaskModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside of modal content
            transferTaskModal.addEventListener('click', function(e) {
                if (e.target === transferTaskModal) {
                    transferTaskModal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (transferTaskModal.style.display === 'flex') {
                        transferTaskModal.style.display = 'none';
                        document.body.style.overflow = 'auto';
                    }
                    if (!alertOverlay.classList.contains('hidden')) {
                        closeAlert();
                    }
                }
            });

            // Alert button click handler
            alertButton.addEventListener('click', function() {
                closeAlert();
            });

            // Close alert when clicking outside
            alertOverlay.addEventListener('click', function(e) {
                if (e.target === alertOverlay) {
                    closeAlert();
                }
            });

            // Form validation and submission with alerts
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form values
                const taskName = document.getElementById('task-name').value.trim();
                const project = document.getElementById('project-select').value;
                const employee = document.getElementById('employee-select').value;
                const taskLevel = document.querySelector('input[name="taskLevel"]:checked');

                // Reset error states
                document.getElementById('task-name-error').classList.add('hidden');
                document.getElementById('project-error').classList.add('hidden');
                document.getElementById('employee-error').classList.add('hidden');

                // Validation with specific error alerts
                let isValid = true;

                if (!taskName) {
                    document.getElementById('task-name-error').textContent = 'Please enter a task name.';
                    document.getElementById('task-name-error').classList.remove('hidden');
                    isValid = false;
                }

                if (!project) {
                    document.getElementById('project-error').textContent = 'Please select a project.';
                    document.getElementById('project-error').classList.remove('hidden');
                    isValid = false;
                }

                if (!employee) {
                    document.getElementById('employee-error').textContent = 'Please select an employee.';
                    document.getElementById('employee-error').classList.remove('hidden');
                    isValid = false;
                }

                if (!taskLevel) {
                    showAlert('error', 'Validation Error', 'Please select a task level.');
                    isValid = false;
                }

                if (!isValid) return;

                // If validation passes, show success alert
                const selectedProject = project.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase());
                const selectedEmployee = employee.replace('-', ' ').replace(/\b\w/g, l => l.toUpperCase());
                const selectedLevel = taskLevel.value.charAt(0).toUpperCase() + taskLevel.value.slice(1);

                showAlert('success', 'Task Transferred!',
                    `Task "${taskName}" has been successfully transferred to ${selectedEmployee} for project "${selectedProject}" with ${selectedLevel} priority.`
                    );

                // Close the main modal
                transferTaskModal.style.display = 'none';
                document.body.style.overflow = 'auto';

                // Reset form
                form.reset();
            });

            // Custom radio button behavior
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Update visual state of radio buttons
                    document.querySelectorAll('input[type="radio"] + label span:first-child span')
                        .forEach(indicator => {
                            indicator.style.opacity = '0';
                        });

                    if (this.checked) {
                        this.nextElementSibling.querySelector('span:first-child span').style
                            .opacity = '1';
                    }
                });
            });
        });
    </script>
</body>

</html>

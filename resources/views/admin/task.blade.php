@extends('admin/layout')

@section('title', 'Tasks')

@section('content')
    <div class="flex flex-col">
        <!-- Filter Section -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 gap-4">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                <div class="relative">
                    <select
                        class="w-56 h-10 px-4 bg-white rounded-lg shadow-sm border border-gray-200 text-gray-600 text-sm font-medium appearance-none focus:outline-none focus:ring-2 focus:ring-primary">
                        <option>Project</option>
                        <option>Website Redesign</option>
                        <option>Mobile App</option>
                        <option>Marketing Campaign</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <div class="relative">
                    <select
                        class="w-40 h-10 px-3 bg-white rounded-lg shadow-sm border border-gray-200 text-gray-600 text-sm font-medium appearance-none focus:outline-none focus:ring-2 focus:ring-primary">
                        <option>Date</option>
                        <option>This Week</option>
                        <option>This Month</option>
                        <option>Next Month</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <button
                    class="flex items-center justify-center gap-2 w-full sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create task
                </button>

                <button id="transferTaskBtn"
                    class="flex items-center justify-center gap-2 w-full sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                    Transfer task
                </button>

                <a href="{{ route('task-detail') }}"
                    class="w-full sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg shadow-sm hover:bg-gray-800 transition-colors flex items-center justify-center">
                    View All Task
                </a>
            </div>
        </div>

        <!-- Task Boards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 overflow-x-auto custom-scrollbar">
            <!-- To Do Column -->
            <div class="bg-white rounded-lg shadow-sm min-w-[260px]">
                <div class="h-2 bg-red-500 rounded-t-lg"></div>
                <div class="p-3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">To do</h3>

                    <div class="space-y-3">
                        <!-- Task Card 1 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Wordpress plugin update</h4>
                                <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">High</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">Website Management Company</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 4, 2024</span>
                                </div>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group.png" alt="Assignee">
                            </div>
                        </div>

                        <!-- Task Card 2 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Running login view</h4>
                                <span class="bg-blue-400 text-white text-xs font-semibold px-2 py-1 rounded">Low</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">CafeLink Menu Transactions Via Website</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 1, 2024</span>
                                </div>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-1.png" alt="Assignee">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- In Progress Column -->
            <div class="bg-white rounded-lg shadow-sm min-w-[260px]">
                <div class="h-2 bg-amber-400 rounded-t-lg"></div>
                <div class="p-3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">In progress</h3>

                    <div class="space-y-3">
                        <!-- Task Card 1 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Create website design</h4>
                                <span class="bg-amber-400 text-white text-xs font-semibold px-2 py-1 rounded">Medium</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">TokoKu Online Marketplace Application</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 4, 2024</span>
                                </div>
                                <div class="flex -space-x-1">
                                    <img class="w-7 h-7 rounded-full border-2 border-white"
                                        src="https://via.placeholder.com/28x28" alt="Assignee 1">
                                    <img class="w-7 h-7 rounded-full border-2 border-white"
                                        src="https://via.placeholder.com/28x28" alt="Assignee 2">
                                    <img class="w-7 h-7 rounded-full border-2 border-white"
                                        src="https://via.placeholder.com/28x28" alt="Assignee 3">
                                </div>
                            </div>
                        </div>

                        <!-- Task Card 2 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Human resources data company</h4>
                                <span class="bg-blue-400 text-white text-xs font-semibold px-2 py-1 rounded">Low</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">Website Management Company</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 15, 2024</span>
                                </div>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-2.png" alt="Assignee">
                            </div>
                        </div>

                        <!-- Task Card 3 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Dashboard revision</h4>
                                <span class="bg-blue-400 text-white text-xs font-semibold px-2 py-1 rounded">Low</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">SiteCraft Websites That Bring Your Business to Life</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 2, 2024</span>
                                </div>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-3.png" alt="Assignee">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review Column -->
            <div class="bg-white rounded-lg shadow-sm min-w-[260px]">
                <div class="h-2 bg-blue-400 rounded-t-lg"></div>
                <div class="p-3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Review</h3>

                    <div class="space-y-3">
                        <!-- Task Card 1 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Website menu view</h4>
                                <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">High</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">CafeLink Menu Transactions Via Website</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 4, 2024</span>
                                </div>
                                <div class="flex -space-x-1">
                                    <img class="w-7 h-7 rounded-full border-2 border-white"
                                        src="https://via.placeholder.com/28x28" alt="Assignee 1">
                                    <img class="w-7 h-7 rounded-full border-2 border-white"
                                        src="https://via.placeholder.com/28x28" alt="Assignee 2">
                                    <img class="w-7 h-7 rounded-full border-2 border-white"
                                        src="https://via.placeholder.com/28x28" alt="Assignee 3">
                                </div>
                            </div>
                        </div>

                        <!-- Task Card 2 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Marketplace display menu</h4>
                                <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">High</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">Website Management Company</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 1, 2024</span>
                                </div>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-4.png" alt="Assignee">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Column -->
            <div class="bg-white rounded-lg shadow-sm min-w-[260px]">
                <div class="h-2 bg-green-500 rounded-t-lg"></div>
                <div class="p-3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Completed</h3>

                    <div class="space-y-3">
                        <!-- Task Card 1 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Create login page</h4>
                                <span class="bg-amber-400 text-white text-xs font-semibold px-2 py-1 rounded">Medium</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">VirtuSphere Digital Innovation Without Borders</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 4, 2024</span>
                                </div>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-5.png" alt="Assignee">
                            </div>
                        </div>

                        <!-- Task Card 2 -->
                        <div class="p-3 border border-gray-300 rounded-lg">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">Create flowchart</h4>
                                <span class="bg-amber-400 text-white text-xs font-semibold px-2 py-1 rounded">Medium</span>
                            </div>
                            <p class="text-xs text-gray-700 mb-3">TokoKu Online Marketplace Application</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs text-gray-500">Nov 1, 2024</span>
                                </div>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-6.png" alt="Assignee">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Transfer Task -->
    <div id="transferTaskModal" class="modal-overlay">
        <div class="modal-content">
            <div class="bg-white rounded-lg">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-medium text-gray-900">Transfer Task</h2>
                        <button type="button" id="closeModal" class="text-gray-400 hover:text-gray-600"
                            aria-label="Close dialog">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form Content -->
                <form class="px-6 py-4" novalidate>
                    <!-- Task Input -->
                    <div class="mb-6">
                        <label for="task-name" class="block text-sm font-medium text-gray-700 mb-2">
                            Task
                        </label>
                        <input type="text" id="task-name" name="taskName" placeholder="Task name..."
                            class="w-full h-12 px-4 bg-gray-100 rounded-lg border-0 focus:ring-2 focus:ring-blue-500"
                            required aria-describedby="task-name-error" />
                        <div id="task-name-error" class="hidden text-red-500 text-xs mt-1" role="alert"></div>
                    </div>

                    <!-- Project Select -->
                    <div class="mb-6">
                        <label for="project-select" class="block text-sm font-medium text-gray-700 mb-2">
                            Project
                        </label>
                        <div class="relative">
                            <select id="project-select" name="project"
                                class="w-full h-12 px-4 bg-gray-100 rounded-lg appearance-none border-0 focus:ring-2 focus:ring-blue-500 pr-10"
                                required aria-describedby="project-error">
                                <option value="" disabled selected>Select project</option>
                                <option value="website-redesign">Website Redesign</option>
                                <option value="mobile-app">Mobile App</option>
                                <option value="marketing-campaign">Marketing Campaign</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        <div id="project-error" class="hidden text-red-500 text-xs mt-1" role="alert"></div>
                    </div>

                    <!-- Employee Select -->
                    <div class="mb-6">
                        <label for="employee-select" class="block text-sm font-medium text-gray-700 mb-2">
                            Send to
                        </label>
                        <div class="relative">
                            <select id="employee-select" name="employee"
                                class="w-full h-12 px-4 bg-gray-100 rounded-lg appearance-none border-0 focus:ring-2 focus:ring-blue-500 pr-10"
                                required aria-describedby="employee-error">
                                <option value="" disabled selected>Select employee</option>
                                <option value="john-doe">John Doe</option>
                                <option value="jane-smith">Jane Smith</option>
                                <option value="mike-johnson">Mike Johnson</option>
                                <option value="sarah-williams">Sarah Williams</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        <div id="employee-error" class="hidden text-red-500 text-xs mt-1" role="alert"></div>
                    </div>

                    <!-- Task Level -->
                    <fieldset class="mb-4">
                        <legend class="block text-sm font-medium text-gray-900 mb-3">Task Level</legend>
                        <div class="flex space-x-6">
                            <div class="flex items-center">
                                <input type="radio" id="level-low" name="taskLevel" value="medium" class="sr-only"
                                    required />
                                <label for="level-low" class="flex items-center cursor-pointer">
                                    <span
                                        class="relative w-5 h-5 rounded-full border-2 border-amber-400 flex items-center justify-center mr-2">
                                        <span
                                            class="w-3 h-3 rounded-full bg-amber-400 opacity-0 transition-opacity"></span>
                                    </span>
                                    <span class="text-gray-900">Low</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="level-medium" name="taskLevel" value="medium" class="sr-only"
                                    required />
                                <label for="level-medium" class="flex items-center cursor-pointer">
                                    <span
                                        class="relative w-5 h-5 rounded-full border-2 border-amber-400 flex items-center justify-center mr-2">
                                        <span
                                            class="w-3 h-3 rounded-full bg-amber-400 opacity-0 transition-opacity"></span>
                                    </span>
                                    <span class="text-gray-900">Medium</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="level-high" name="taskLevel" value="high"
                                    class="sr-only" />
                                <label for="level-high" class="flex items-center cursor-pointer">
                                    <span
                                        class="relative w-5 h-5 rounded-full border-2 border-amber-400 flex items-center justify-center mr-2">
                                        <span
                                            class="w-3 h-3 rounded-full bg-amber-400 opacity-0 transition-opacity"></span>
                                    </span>
                                    <span class="text-gray-900">High</span>
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Time Estimates -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <div class="flex flex-col sm:flex-row justify-between text-sm text-red-500 font-medium">
                            <p>Low : &gt; 2 hours</p>
                            <p>Medium : &gt; 6 hours</p>
                            <p>High : &lt; 6 hours</p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full h-16 bg-gray-900 text-white text-xl font-normal rounded-xl hover:bg-gray-800 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Alert Modal (tetap sama seperti sebelumnya) -->
    <div id="alertOverlay" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-6 max-w-md w-11/12 transform transition-all opacity-0 scale-95">
            <div id="alertIcon" class="w-12 h-12 rounded-full mx-auto mb-4 flex items-center justify-center">
                <svg id="alertIconSvg" class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 id="alertTitle" class="text-lg font-semibold text-gray-900 text-center mb-2">Success</h3>
            <p id="alertMessage" class="text-gray-600 text-center mb-6">Your action was completed successfully.</p>
            <div class="text-center">
                <button id="alertButton"
                    class="bg-gray-900 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition-colors">
                    OK
                </button>
            </div>
        </div>
    </div>



    <!-- Alert Modal -->
    <div id="alertOverlay" class="alert-overlay">
        <div id="alertBox" class="alert-box">
            <div id="alertIcon" class="alert-icon">
                <svg id="alertIconSvg" class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div id="alertTitle" class="alert-title">Success</div>
            <div id="alertMessage" class="alert-message">Your action was completed successfully.</div>
            <button id="alertButton" class="alert-button">OK</button>
        </div>
    </div>
@endsection

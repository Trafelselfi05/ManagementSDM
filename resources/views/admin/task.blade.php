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
                <button id="createTaskBtn"
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

                <a href="{{ route('admin.task-detail') }}"
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

                        @foreach ($tasks->where('status', 'todo') as $task)
                            <div class="p-3 border border-gray-300 rounded-lg">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $task->name }}</h4>
                                    <span
                                        class="bg-{{ $task->level == 'high' ? 'red' : ($task->level == 'medium' ? 'amber' : 'green') }}-400 text-white text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($task->level) }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-700 mb-3">{{ $task->project->name ?? '-' }}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y') }}</span>
                                    </div>
                                    @if ($task->assignedUser)
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ $task->assignedUser->image ?? 'https://via.placeholder.com/32' }}"
                                            alt="Assignee">
                                    @endif
                                </div>
                            </div>
                        @endforeach


                        {{-- <!-- Task Card 1 -->
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
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- In Progress Column -->
            <div class="bg-white rounded-lg shadow-sm min-w-[260px]">
                <div class="h-2 bg-amber-400 rounded-t-lg"></div>
                <div class="p-3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">In progress</h3>

                    <div class="space-y-3">

                        @foreach ($tasks->where('status', 'in_progress') as $task)
                            <div class="p-3 border border-gray-300 rounded-lg">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $task->name }}</h4>
                                    <span
                                        class="bg-{{ $task->level == 'high' ? 'red' : ($task->level == 'medium' ? 'amber' : 'green') }}-400 text-white text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($task->level) }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-700 mb-3">{{ $task->project->name ?? '-' }}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y') }}</span>
                                    </div>
                                    @if ($task->assignedUser)
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ $task->assignedUser->image ?? 'https://via.placeholder.com/32' }}"
                                            alt="Assignee">
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- <!-- Task Card 1 -->
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
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Review Column -->
            <div class="bg-white rounded-lg shadow-sm min-w-[260px]">
                <div class="h-2 bg-blue-400 rounded-t-lg"></div>
                <div class="p-3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Review</h3>

                    <div class="space-y-3">

                        @foreach ($tasks->where('status', 'review') as $task)
                            <div class="p-3 border border-gray-300 rounded-lg">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $task->name }}</h4>
                                    <span
                                        class="bg-{{ $task->level == 'high' ? 'red' : ($task->level == 'medium' ? 'amber' : 'green') }}-400 text-white text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($task->level) }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-700 mb-3">{{ $task->project->name ?? '-' }}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y') }}</span>
                                    </div>
                                    @if ($task->assignedUser)
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ $task->assignedUser->image ?? 'https://via.placeholder.com/32' }}"
                                            alt="Assignee">
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- <!-- Task Card 1 -->
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
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Completed Column -->
            <div class="bg-white rounded-lg shadow-sm min-w-[260px]">
                <div class="h-2 bg-green-500 rounded-t-lg"></div>
                <div class="p-3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Completed</h3>

                    <div class="space-y-3">
                        @foreach ($tasks->where('status', 'review') as $task)
                            <div class="p-3 border border-gray-300 rounded-lg">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $task->name }}</h4>
                                    <span
                                        class="bg-{{ $task->level == 'high' ? 'red' : ($task->level == 'medium' ? 'amber' : 'green') }}-400 text-white text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($task->level) }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-700 mb-3">{{ $task->project->name ?? '-' }}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($task->created_at)->format('M d, Y') }}</span>
                                    </div>
                                    @if ($task->assignedUser)
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ $task->assignedUser->image ?? 'https://via.placeholder.com/32' }}"
                                            alt="Assignee">
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- <!-- Task Card 1 -->
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Task -->
    <div id="createTaskModal" class="modal-overlay">
        <div class="modal-content">
            <div class="bg-white rounded-lg">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-medium text-gray-900">Create Task</h2>
                        <button type="button" id="closeCreateTaskModal" class="text-gray-400 hover:text-gray-600"
                            aria-label="Close dialog">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <form class="px-6 py-4" method="POST" action="{{ route('admin.task.store') }}">
                    @csrf

                    <!-- Task Name -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Task</label>
                        <input type="text" name="taskName" placeholder="Task name..."
                            class="w-full h-12 px-4 bg-gray-100 rounded-lg border-0 focus:ring-2 focus:ring-blue-500"
                            required />
                    </div>

                    <!-- Project Select -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Project</label>
                        <select name="project"
                            class="w-full h-12 px-4 bg-gray-100 rounded-lg border-0 focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" disabled selected>Select project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Level -->
                    <fieldset class="mb-4">
                        <legend class="block text-sm font-medium text-gray-900 mb-3">Task Level</legend>
                        <div class="flex space-x-6">
                            @foreach (['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'] as $value => $label)
                                <div class="flex items-center">
                                    <input type="radio" id="level-{{ $value }}" name="taskLevel"
                                        value="{{ $value }}" class="sr-only" required />
                                    <label for="level-{{ $value }}" class="flex items-center cursor-pointer">
                                        <span
                                            class="relative w-5 h-5 rounded-full border-2 border-amber-400 flex items-center justify-center mr-2">
                                            <span
                                                class="w-3 h-3 rounded-full bg-amber-400 opacity-0 transition-opacity"></span>
                                        </span>
                                        <span class="text-gray-900">{{ $label }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>

                    <!-- Estimated Info -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6 text-sm text-red-500 font-medium flex justify-between">
                        <p>Low : &lt; 2 hours</p>
                        <p>Medium : &lt; 6 hours</p>
                        <p>High : &gt; 6 hours</p>
                    </div>

                    <button type="submit"
                        class="w-full h-16 bg-gray-900 text-white text-xl font-normal rounded-xl hover:bg-gray-800 transition-colors">
                        Submit
                    </button>
                </form>

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

                <form method="POST" action="{{ route('admin.task.transfer') }}" class="px-6 py-4">
                    @csrf

                    <!-- Project -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Project</label>
                        <select id="project-select" name="project_id"
                            class="w-full h-12 px-4 bg-gray-100 rounded-lg border-0 focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" disabled selected>Select project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Task -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Task</label>
                        <select id="task-select" name="task_id"
                            class="w-full h-12 px-4 bg-gray-100 rounded-lg border-0 focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" disabled selected>Select task</option>
                        </select>
                    </div>

                    <!-- Assign to User -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Assign To</label>
                        <select id="user-select" name="assigned_to"
                            class="w-full h-12 px-4 bg-gray-100 rounded-lg border-0 focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" disabled selected>Select user</option>
                        </select>
                    </div>

                    <!-- Level -->
                    <fieldset class="mb-4">
                        <legend class="block text-sm font-medium text-gray-900 mb-3">Task Level</legend>
                        <div class="flex space-x-6">
                            @foreach (['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'] as $value => $label)
                                <div class="flex items-center">
                                    <input type="radio" id="level-update-{{ $value }}" name="taskLevel"
                                        value="{{ $value }}" class="sr-only" required />
                                    <label for="level-update-{{ $value }}"
                                        class="flex items-center cursor-pointer">
                                        <span
                                            class="relative w-5 h-5 rounded-full border-2 border-amber-400 flex items-center justify-center mr-2">
                                            <span
                                                class="w-3 h-3 rounded-full bg-amber-400 opacity-0 transition-opacity"></span>
                                        </span>
                                        <span class="text-gray-900">{{ $label }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>

                    <!-- Estimated Info -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6 text-sm text-red-500 font-medium flex justify-between">
                        <p>Low : &lt; 2 hours</p>
                        <p>Medium : &lt; 6 hours</p>
                        <p>High : &gt; 6 hours</p>
                    </div>

                    <button type="submit"
                        class="w-full h-16 bg-gray-900 text-white text-xl font-normal rounded-xl hover:bg-gray-800 transition-colors">
                        Update Task
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Alert Modal -->
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
            <button id="alertButton"
                class="w-full py-3 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                OK
            </button>
        </div>
    </div>

    <script>
        const tasks = @json($tasks); // Load semua Task
        console.log(tasks);

        const projectUsers = @json($projectUsers); // Load tabel project_user

        document.getElementById('project-select').addEventListener('change', function() {
            const projectId = this.value;

            // Filter Tasks sesuai project
            const relatedTasks = tasks.filter(t => t.project_id == projectId);
            const taskSelect = document.getElementById('task-select');
            taskSelect.innerHTML = '<option disabled selected>Select task</option>';
            relatedTasks.forEach(t => {
                taskSelect.innerHTML += `<option value="${t.id}">${t.name}</option>`;
            });


            // Filter Users sesuai project
            const relatedUsers = projectUsers.filter(u => u.project_id == projectId);
            const userSelect = document.getElementById('user-select');
            userSelect.innerHTML = '<option disabled selected>Select user</option>';
            relatedUsers.forEach(u => {
                userSelect.innerHTML += `<option value="${u.user.id}">${u.user.name}</option>`;
            });
        });

        document.getElementById('task-select').addEventListener('change', function() {
            const taskId = this.value;
            const selectedTask = tasks.find(t => t.id == taskId);

            if (selectedTask) {
                document.querySelectorAll('input[name="taskLevel"]').forEach(radio => {
                    // Reset semua dulu
                    radio.checked = false;
                    const dot = radio.nextElementSibling.querySelector('span span');
                    dot.classList.add('opacity-0');

                    // Baru set yang sesuai
                    if (radio.value === selectedTask.level) {
                        radio.checked = true;
                        dot.classList.remove('opacity-0');
                    }
                });
            }
        });
    </script>
@endsection

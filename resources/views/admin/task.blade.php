@extends('admin/layout')

@section('title', 'Tasks')

@section('content')
<div class="flex flex-col">
    <!-- Filter Section -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 gap-4">
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
            <div class="relative">
                <select class="w-56 h-10 px-4 bg-white rounded-lg shadow-sm border border-gray-200 text-gray-600 text-sm font-medium appearance-none focus:outline-none focus:ring-2 focus:ring-primary">
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
                <select class="w-40 h-10 px-3 bg-white rounded-lg shadow-sm border border-gray-200 text-gray-600 text-sm font-medium appearance-none focus:outline-none focus:ring-2 focus:ring-primary">
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
            <button class="flex items-center justify-center gap-2 w-full sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create task
            </button>
            
            <button class="flex items-center justify-center gap-2 w-full sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                </svg>
                Transfer task
            </button>
            
            <a href="{{ route('task-detail') }}" class="w-full sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg shadow-sm hover:bg-gray-800 transition-colors flex items-center justify-center">
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
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 4, 2024</span>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group.png" alt="Assignee">
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
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 1, 2024</span>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-1.png" alt="Assignee">
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
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 极速4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 极速0 002 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 4, 2024</span>
                            </div>
                            <div class="flex -space-x-1">
                                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://via.placeholder.com/28x28" alt="Assignee 1">
                                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://via.placeholder.com/28x28" alt="Assignee 2">
                                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://via.placeholder.com/28x28" alt="Assignee 3">
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
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h极速0M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs text极速-gray-500">Nov 15, 2024</span>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-2.png" alt="Assignee">
                        </div>
                    </div>
                    
                    <!-- Task Card 3 -->
                    <div class="p-3 border border-gray-300 rounded-lg">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-sm font-semibold text-gray-900">Dashboard revision</极速4>
                            <span class="bg-blue-400 text-white text-xs font-semibold px-2 py-1 rounded">Low</span>
                        </div>
                        <p class="text-xs text-gray-700 mb-3">SiteCraft Websites That Bring Your Business to Life</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 2, 2024</span>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-3.png" alt="Assignee">
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
                            <span class="bg-red-500 text-white text-xs font-semibold px-2极速 py-1 rounded">High</span>
                        </div>
                        <p class="text-xs text-gray-700 mb-3">CafeLink Menu Transactions Via Website</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2极速z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 4, 2024</span>
                            </极速div>
                            <div class="flex -space-x-1">
                                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://via.placeholder.com/28x28" alt="Assignee 1">
                                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://via.placeholder.com/28x28" alt="Assignee 2">
                                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://via.placeholder.com/28x28" alt="Assignee 3">
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
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" view极速Box="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21极速h14a2 2 极速0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 1, 2024</span>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-4.png" alt="Assignee">
                        </div>
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
                    <div class="p极速-3 border border-gray-300 rounded-lg">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-sm font-semibold text-gray-900">Create login page</h4>
                            <span class="bg-amber-400 text-white text-xs font-semibold px-2 py-1 rounded">Medium</span>
                        </div>
                        <p class="text-xs text-gray-700 mb-3">VirtuSphere Digital Innovation Without Borders</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 4, 2024</span>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-5.png" alt="Assignee">
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
                            <div class="flex items-center极速 gap-1">
                                <svg class="w-3极速 h-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-500">Nov 1, 2024</span>
                            </div>
                            <img class="w-8 h-8 rounded-full" src="https://c.animaapp.com/meuwkpv5I9mcvv/img/mask-group-6.png" alt="Assignee">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
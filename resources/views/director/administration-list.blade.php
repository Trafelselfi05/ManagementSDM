@extends('director/layout')
@section('title', 'Leave History')
@section('content')
    <!-- Main Content Section -->
    <div class="flex flex-col w-full gap-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-white rounded-2xl shadow-sm p-6">
            <div>
                <h1 class="text-2xl font-bold text-[#111111]">Leave Request History</h1>
                <p class="text-sm text-[#7d7d7d] mt-1">View all your leave submissions and their status</p>
            </div>
            <a href="{{ route('director.administration') }}" class="flex items-center gap-2 px-5 py-2.5 bg-[#111111] text-white rounded-lg hover:bg-[#333333] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="font-medium text-sm">New Request</span>
            </a>
        </div>

        <!-- Filter Tabs -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex flex-wrap gap-3">
                <button class="filter-tab active px-4 py-2 rounded-lg font-medium text-sm transition-colors" data-status="all">
                    All Requests
                </button>
                <button class="filter-tab px-4 py-2 rounded-lg font-medium text-sm transition-colors" data-status="pending">
                    Pending
                </button>
                <button class="filter-tab px-4 py-2 rounded-lg font-medium text-sm transition-colors" data-status="approved">
                    Approved
                </button>
                <button class="filter-tab px-4 py-2 rounded-lg font-medium text-sm transition-colors" data-status="rejected">
                    Rejected
                </button>
            </div>
        </div>

        <!-- Leave Requests List -->
        <div class="flex flex-col gap-4" id="leaveRequestsList">
            <!-- Sample Leave Request 1 - Pending -->
            <div class="leave-card bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" 
                 data-status="pending" 
                 onclick="window.location.href='{{ route('director.administration-status', ['status' => 'pending']) }}'">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="flex-1 flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <h3 class="font-semibold text-[#111111] text-lg">Cuti Tahunan</h3>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-medium">
                                <div class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></div>
                                Pending
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 text-sm text-[#7d7d7d]">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>2025-10-01 to 2025-10-05</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>5 days</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span>Submitted: 2025-09-25</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('director.administration-status', ['status' => 'pending']) }}" 
                           onclick="event.stopPropagation()" 
                           class="px-4 py-2 border border-[#111111] text-[#111111] rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                            View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sample Leave Request 2 - Approved -->
            <div class="leave-card bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" 
                 data-status="approved" 
                 onclick="window.location.href='{{ route('director.administration-status', ['status' => 'approved']) }}'">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="flex-1 flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <h3 class="font-semibold text-[#111111] text-lg">Cuti Sakit</h3>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                                Approved
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 text-sm text-[#7d7d7d]">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>2025-09-20 to 2025-09-22</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>3 days</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2 text-green-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Approved: 2025-09-19</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('director.administration-status', ['status' => 'approved']) }}" 
                           onclick="event.stopPropagation()" 
                           class="px-4 py-2 border border-[#111111] text-[#111111] rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                            View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sample Leave Request 3 - Rejected -->
            <div class="leave-card bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" 
                 data-status="rejected" 
                 onclick="window.location.href='{{ route('director.administration-status', ['status' => 'rejected']) }}'">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="flex-1 flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <h3 class="font-semibold text-[#111111] text-lg">Cuti Pribadi</h3>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">
                                <div class="w-1.5 h-1.5 bg-red-500 rounded-full"></div>
                                Rejected
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 text-sm text-[#7d7d7d]">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>2025-09-10 to 2025-09-12</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>3 days</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2 text-red-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span>Rejected: 2025-09-08</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('director.administration-status', ['status' => 'rejected']) }}" 
                           onclick="event.stopPropagation()" 
                           class="px-4 py-2 border border-[#111111] text-[#111111] rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                            View Details
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sample Leave Request 4 - Approved -->
            <div class="leave-card bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" 
                 data-status="approved" 
                 onclick="window.location.href='{{ route('director.administration-status', ['status' => 'approved']) }}'">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <div class="flex-1 flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <h3 class="font-semibold text-[#111111] text-lg">Cuti Pernikahan</h3>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
                                Approved
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 text-sm text-[#7d7d7d]">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>2025-08-15 to 2025-08-18</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>4 days</span>
                            </div>
                            <div class="hidden sm:block text-[#d0d0d0]">•</div>
                            <div class="flex items-center gap-2 text-green-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Approved: 2025-08-10</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('director.administration-status', ['status' => 'approved']) }}" 
                           onclick="event.stopPropagation()" 
                           class="px-4 py-2 border border-[#111111] text-[#111111] rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="hidden bg-white rounded-2xl shadow-sm p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Leave Requests Found</h3>
            <p class="text-sm text-gray-500 mb-6">You haven't submitted any leave requests yet.</p>
            <a href="{{ route('director.administration') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#111111] text-white rounded-lg hover:bg-[#333333] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="font-medium text-sm">Submit Your First Request</span>
            </a>
        </div>
    </div>

    <style>
        .filter-tab {
            background-color: #f9f9f9;
            color: #7d7d7d;
        }
        .filter-tab:hover {
            background-color: #e0e0e0;
        }
        .filter-tab.active {
            background-color: #111111;
            color: white;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterTabs = document.querySelectorAll('.filter-tab');
            const leaveCards = document.querySelectorAll('.leave-card');
            const emptyState = document.getElementById('emptyState');

            filterTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    filterTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    const status = this.getAttribute('data-status');
                    let visibleCount = 0;

                    leaveCards.forEach(card => {
                        if (status === 'all' || card.getAttribute('data-status') === status) {
                            card.style.display = 'block';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    if (visibleCount === 0) {
                        emptyState.classList.remove('hidden');
                    } else {
                        emptyState.classList.add('hidden');
                    }
                });
            });
        });
    </script>
@endsection
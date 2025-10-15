@extends('admin/layout')

@section('title', 'Leave Submissions')

@section('content')
    <section class="h-full bg-white rounded-[20px] shadow-lg p-6 md:p-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 w-full">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-[#111111] mb-1">Leave Submissions</h1>
                <p class="text-sm text-gray-600">Review and manage employee leave requests</p>
            </div>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full md:w-auto">
                <!-- Filter Button with Dropdown -->
                <div class="relative">
                    <button id="filterBtn" type="button"
                        class="flex items-center justify-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2.5 hover:bg-gray-50 transition-colors w-full sm:w-auto">
                        <img class="w-5 h-5" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg " id="filterArrow"  alt="Filter" />
                        <span class="text-gray-700 text-sm font-medium">Filter</span>
                    </button>

                    <!-- Filter Dropdown -->
                    <div id="filterDropdown" class="hidden absolute top-full mt-2 right-0 w-72 bg-white rounded-xl shadow-2xl border border-gray-100 z-50 overflow-hidden">
                        <div class="p-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800 text-sm">Filter by Status</h3>
                        </div>
                        
                        <div class="p-4 space-y-2">
                            <!-- All Status -->
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors group">
                                <input type="radio" name="filterStatus" value="all" class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500 cursor-pointer" checked>
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">All Status</span>
                                </div>
                            </label>

                            <!-- Pending -->
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 cursor-pointer transition-colors group">
                                <input type="radio" name="filterStatus" value="pending" class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-blue-700">Pending</span>
                                </div>
                            </label>

                            <!-- Approved -->
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 cursor-pointer transition-colors group">
                                <input type="radio" name="filterStatus" value="approved" class="w-4 h-4 text-green-600 focus:ring-2 focus:ring-green-500 cursor-pointer">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-green-700">Approved</span>
                                </div>
                            </label>

                            <!-- Rejected -->
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 cursor-pointer transition-colors group">
                                <input type="radio" name="filterStatus" value="rejected" class="w-4 h-4 text-red-600 focus:ring-2 focus:ring-red-500 cursor-pointer">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-red-700">Rejected</span>
                                </div>
                            </label>
                        </div>

                        <!-- Filter Actions -->
                        <div class="p-4 bg-gray-50 border-t border-gray-200 flex gap-2">
                            <button type="button" onclick="resetFilters()" class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                Reset
                            </button>
                            <button type="button" onclick="applyFilters()" class="flex-1 px-4 py-2 text-sm font-medium text-white bg-[#111111] rounded-lg hover:bg-[#333333] transition-colors">
                                Apply Filter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Create Leave Submission Button -->
                <a href="{{ route('admin.administration') }}"
                    class="flex items-center justify-center gap-2.5 bg-[#111111] hover:bg-[#333333] rounded-[10px] px-4 py-2.5 transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="text-white text-sm font-semibold whitespace-nowrap">Create Leave Submission</span>
                </a>
            </div>
        </div>

        <!-- Active Filters Display -->
        <div id="activeFilters" class="hidden flex flex-wrap gap-2 mb-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
            <span class="text-sm font-medium text-gray-700">Active Filters:</span>
            <div id="filterTags" class="flex flex-wrap gap-2"></div>
            <button onclick="clearAllFilters()" class="ml-auto text-xs font-medium text-blue-600 hover:text-blue-800 underline">
                Clear All
            </button>
        </div>

        <!-- Table Container -->
        <div class="w-full overflow-x-auto rounded-xl border border-gray-200">
            <table class="w-full min-w-[1200px]">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-16">#</th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[200px]">Employee Name</th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[180px]">Leave Category</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Start Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">End Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[160px]">Description</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-28">Standby</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-28">Form Cuti</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100">
                    @foreach ($leaves as $index => $leave)
                        <tr class="hover:bg-blue-50 transition-colors group">
                            <td class="py-4 px-4">
                                <span class="text-gray-800 font-medium text-center block">{{ $index + 1 }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $leave->user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $leave->user->division }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-amber-50 border border-amber-200 rounded-lg">
                                    <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                                    <span class="font-medium text-amber-700 text-sm">{{ $leave->type }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="text-sm text-gray-700 font-medium">
                                    {{ \Carbon\Carbon::parse($leave->start_date)->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="text-sm text-gray-700 font-medium">
                                    {{ \Carbon\Carbon::parse($leave->end_date)->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-sm text-gray-600 text-center line-clamp-2">{{ $leave->description }}</div>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $leave->contactable ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $leave->contactable ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex justify-center">
                                    <img src="{{ asset($leave->proof_photo) }}" alt="Form Cuti"
                                        class="w-12 h-12 object-cover rounded-lg border-2 border-gray-200 cursor-pointer hover:border-blue-500 transition-all shadow-sm hover:shadow-md"
                                        onclick="viewFormCuti('{{ asset($leave->proof_photo) }}')">
                                </div>
                            </td>
                            @if (!$leave->verified)
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick="acceptProject({{ $leave->id }})"
                                            class="inline-flex items-center justify-center w-9 h-9 text-green-600 bg-green-100 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-sm"
                                            title="Accept Leave">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <button type="button" onclick="rejectProject({{ $leave->id }})"
                                            class="inline-flex items-center justify-center w-9 h-9 text-red-600 bg-red-100 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 shadow-sm"
                                            title="Reject Leave">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            @elseif($leave->verified == 1)
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center">
                                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-red-600 shadow-md">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-xs font-semibold text-white">Rejected</span>
                                        </div>
                                    </div>
                                </td>
                            @else
                                <td class="py-4 px-4">
                                    <div class="flex items-center justify-center">
                                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-green-500 to-green-600 shadow-md">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-xs font-semibold text-white">Approved</span>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        </tr>

                        <!-- Modal for Approve -->
                        <div id="approveModal id{{ $leave->id }}"
                            class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden backdrop-blur-sm">
                            <div class="bg-white rounded-2xl max-w-xl w-full overflow-hidden shadow-2xl m-4">
                                <div class="flex justify-between items-center p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900">Approve Leave Request</h3>
                                    </div>
                                    <button onclick="closeApproveModal({{ $leave->user_id }})"
                                        class="text-gray-400 hover:text-gray-600 hover:bg-white rounded-lg p-2 transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('admin.administration.approve', ['id' => $leave->id]) }}">
                                    @csrf
                                    <div class="mb-4 px-6 pt-6">
                                        <p class="text-sm text-gray-600 mb-4">Add a note for the employee (optional):</p>
                                        <textarea id="approveNotes" rows="4" name="approveNotes"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none text-sm"
                                            placeholder="e.g., Permohonan cuti Anda telah disetujui..."></textarea>
                                    </div>
                                    <div class="flex gap-3 px-6 pb-6">
                                        <button type="button" onclick="closeApproveModal({{ $leave->id }})"
                                            class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="flex-1 px-4 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all shadow-md font-medium">
                                            Approve Request
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal for Reject -->
                        <div id="rejectModal id{{ $leave->id }}"
                            class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden backdrop-blur-sm">
                            <div class="bg-white rounded-2xl max-w-xl w-full overflow-hidden shadow-2xl m-4">
                                <div class="flex justify-between items-center p-6 border-b border-gray-200 bg-gradient-to-r from-red-50 to-rose-50">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900">Reject Leave Request</h3>
                                    </div>
                                    <button onclick="closeRejectModal({{ $leave->id }})"
                                        class="text-gray-400 hover:text-gray-600 hover:bg-white rounded-lg p-2 transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('admin.administration.reject', ['id' => $leave->id]) }}">
                                    @csrf
                                    <div class="mb-4 px-6 pt-6">
                                        <p class="text-sm text-gray-600 mb-4">Add a note for the employee (optional):</p>
                                        <textarea id="approveNotes" rows="4" name="approveNotes"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none text-sm"
                                            placeholder="e.g., Maaf, permohonan cuti tidak dapat disetujui..."></textarea>
                                    </div>
                                    <div class="flex gap-3 px-6 pb-6">
                                        <button type="button" onclick="closeRejectModal({{ $leave->id }})"
                                            class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="flex-1 px-4 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition-all shadow-md font-medium">
                                            Reject Request
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 pt-6 border-t border-gray-200 gap-4">
            <div class="text-sm text-gray-600">
                Showing <span class="font-semibold text-gray-900">1</span> to <span class="font-semibold text-gray-900">3</span> of <span class="font-semibold text-gray-900">3</span> results
            </div>
            <div class="flex gap-2">
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                    Previous
                </button>
                <button class="px-4 py-2 text-sm font-medium text-white bg-[#111111] border border-transparent rounded-lg hover:bg-[#333333] transition-colors shadow-sm">
                    1
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                    Next
                </button>
            </div>
        </div>
    </section>

    <!-- Modal for viewing Form Cuti -->
    <div id="formCutiModal" class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden backdrop-blur-sm">
        <div class="bg-white rounded-2xl max-w-3xl max-h-[85vh] overflow-hidden shadow-2xl m-4">
            <div class="flex justify-between items-center p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                <h3 class="text-lg font-bold text-gray-900">Form Cuti Preview</h3>
                <button onclick="closeFormCutiModal()"
                    class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 rounded-lg p-2 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 overflow-auto max-h-[calc(85vh-88px)]">
                <img id="formCutiImage" src="" alt="Form Cuti" class="w-full h-auto rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <script>
        // ==================== FILTER DROPDOWN ====================
        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const filterArrow = document.getElementById('filterArrow');
        const activeFiltersSection = document.getElementById('activeFilters');
        const filterTagsContainer = document.getElementById('filterTags');
        const filterRadios = document.querySelectorAll('input[name="filterStatus"]');

        // Toggle filter dropdown
        filterBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            filterDropdown.classList.toggle('hidden');
            filterArrow.classList.toggle('rotate-180');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!filterBtn.contains(e.target) && !filterDropdown.contains(e.target)) {
                filterDropdown.classList.add('hidden');
                filterArrow.classList.remove('rotate-180');
            }
        });

        // Close dropdown with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !filterDropdown.classList.contains('hidden')) {
                filterDropdown.classList.add('hidden');
                filterArrow.classList.remove('rotate-180');
            }
        });

        // Apply Filters Function
        function applyFilters() {
            const selectedStatus = document.querySelector('input[name="filterStatus"]:checked').value;
            
            // Create filter tag
            filterTagsContainer.innerHTML = '';
            
            if (selectedStatus !== 'all') {
                let statusText = '';
                let statusColor = '';
                
                if (selectedStatus === 'pending') {
                    statusText = 'Pending';
                    statusColor = 'bg-blue-100 border-blue-200 text-blue-700';
                } else if (selectedStatus === 'approved') {
                    statusText = 'Approved';
                    statusColor = 'bg-green-100 border-green-200 text-green-700';
                } else if (selectedStatus === 'rejected') {
                    statusText = 'Rejected';
                    statusColor = 'bg-red-100 border-red-200 text-red-700';
                }
                
                const tag = document.createElement('span');
                tag.className = `inline-flex items-center gap-1.5 px-3 py-1 border rounded-lg text-xs font-medium ${statusColor}`;
                tag.innerHTML = `
                    Status: ${statusText}
                    <button onclick="clearAllFilters()" class="hover:opacity-70">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                `;
                filterTagsContainer.appendChild(tag);
                
                // Show active filters section
                activeFiltersSection.classList.remove('hidden');
            } else {
                // Hide active filters section if "All" is selected
                activeFiltersSection.classList.add('hidden');
            }

            // Close dropdown
            filterDropdown.classList.add('hidden');
            filterArrow.classList.remove('rotate-180');

            // Here you would typically send AJAX request or filter table rows
            filterTableRows(selectedStatus);
            
            showNotification('Filter applied successfully!', 'success');
        }

        // Filter table rows based on status
        function filterTableRows(status) {
            const tableRows = document.querySelectorAll('tbody tr');
            let visibleCount = 0;
            
            tableRows.forEach(row => {
                // Skip if row is a modal (not an actual data row)
                if (row.querySelector('.fixed')) return;
                
                const actionCell = row.querySelector('td:last-child');
                if (!actionCell) return;
                
                let rowStatus = 'pending';
                
                // Check if row has approve/reject buttons (pending)
                if (actionCell.querySelector('button[onclick*="acceptProject"]')) {
                    rowStatus = 'pending';
                }
                // Check if row has "Approved" badge
                else if (actionCell.textContent.includes('Approved')) {
                    rowStatus = 'approved';
                }
                // Check if row has "Rejected" badge
                else if (actionCell.textContent.includes('Rejected')) {
                    rowStatus = 'rejected';
                }
                
                // Show/hide row based on filter
                if (status === 'all' || status === rowStatus) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Update result count
            console.log(`Showing ${visibleCount} results for status: ${status}`);
        }

        // Reset Filters Function
        function resetFilters() {
            // Reset radio to "All"
            document.querySelector('input[name="filterStatus"][value="all"]').checked = true;
            
            // Hide active filters
            activeFiltersSection.classList.add('hidden');
            filterTagsContainer.innerHTML = '';
            
            // Show all rows
            filterTableRows('all');
            
            showNotification('Filter reset', 'info');
        }

        // Clear All Filters
        function clearAllFilters() {
            resetFilters();
        }

        // ==================== EXISTING FUNCTIONS ====================
        let currentProjectId = null;

        function acceptProject(projectId) {
            currentProjectId = projectId;
            document.getElementById('approveModal id' + projectId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function rejectProject(projectId) {
            currentProjectId = projectId;
            document.getElementById('rejectModal id' + projectId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeApproveModal(id) {
            document.getElementById('approveModal id' + id).classList.add('hidden');
            const notesField = document.querySelector(`#approveModal\\ id${id} textarea[name="approveNotes"]`);
            if (notesField) notesField.value = '';
            document.body.style.overflow = 'auto';
            currentProjectId = null;
        }

        function closeRejectModal(projectId) {
            document.getElementById('rejectModal id' + projectId).classList.add('hidden');
            const notesField = document.querySelector(`#rejectModal\\ id${projectId} textarea[name="approveNotes"]`);
            if (notesField) notesField.value = '';
            document.body.style.overflow = 'auto';
            currentProjectId = null;
        }

        function viewFormCuti(imagePath) {
            document.getElementById('formCutiImage').src = imagePath;
            document.getElementById('formCutiModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeFormCutiModal() {
            document.getElementById('formCutiModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modals when clicking outside
        document.getElementById('formCutiModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeFormCutiModal();
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!document.getElementById('formCutiModal').classList.contains('hidden')) {
                    closeFormCutiModal();
                }
            }
        });

        // Notification Function
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-xl shadow-2xl transform translate-x-full transition-all duration-300 ${
                type === 'success' ? 'bg-gradient-to-r from-green-500 to-green-600 text-white' :
                type === 'error' ? 'bg-gradient-to-r from-red-500 to-red-600 text-white' :
                type === 'warning' ? 'bg-gradient-to-r from-yellow-500 to-yellow-600 text-white' :
                'bg-gradient-to-r from-blue-500 to-blue-600 text-white'
            }`;

            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        ${type === 'success' ? 
                            '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>' :
                        type === 'warning' ?
                            '<path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>' :
                            '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>'
                        }
                    </svg>
                    <span class="font-medium">${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
    </script>
@endsection
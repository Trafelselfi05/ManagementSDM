@extends('director/layout')

@section('title', 'Projects')

@section('content')
    <section class="w-full bg-white rounded-[20px] shadow-[0_0_4px_rgba(0,0,0,0.25)] p-4 md:p-8">
        <!-- Filter and Create Project Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 mb-6 md:mb-8">
            <!-- Filter Button -->
            <div class="flex items-center justify-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2">
                <img class="w-5 h-5 md:w-6 md:h-6" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" />
                <span class="text-gray-500 text-sm font-medium">Filter</span>
            </div>

            <!-- Create Project Button -->
            <a href="{{ route('director.project.create') }}"
                class="flex items-center justify-center gap-2.5 bg-black hover:bg-gray-800 rounded-[10px] px-3 py-3 md:py-3.5 transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span class="text-white text-sm font-semibold">Create project</span>
            </a>
        </div>

        <!-- Desktop Table View -->
        <div class="hidden lg:block w-full overflow-x-auto">
            <table class="w-full min-w-[1200px]">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-[#f5f5f5]">
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-16">#</th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[250px]">Project Name</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Start Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Deadline</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[180px]">Project Director</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-24">Level</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-28">Status</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                    @forelse ($projects as $index => $project)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4 text-gray-800 font-medium text-center">{{$index + 1}}</td>
                            <td class="py-4 px-4">
                                <div class="font-semibold text-gray-800">{{$project->name}}</div>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">{{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }}</td>
                            <td class="py-4 px-4 text-center text-gray-600">{{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</td>
                            <td class="py-4 px-4 text-center">
                                <div class="font-medium text-gray-800">{{$project->director->name}}</div>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">{{$project->level}}</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span onclick="openStatusModal({{$project->id}}, '{{$project->status}}')" 
                                      class="px-2.5 py-1 bg-[#0000FF] text-white text-sm font-semibold rounded-[10px] cursor-pointer hover:opacity-80 transition-opacity">
                                    {{$project->status}}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('director.edit-project') }}/{{$project->id}}"
                                        class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 rounded-md transition-colors">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <button onclick="confirmDelete({{$project->id}})"
                                        class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md transition-colors">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-gray-500">Tidak Ada Project</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="lg:hidden space-y-4">
            @forelse ($projects as $index => $project)
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                    <!-- Project Header -->
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs font-medium text-gray-500">#{{$index + 1}}</span>
                                <span class="px-2 py-0.5 bg-[#e94949] text-white text-xs font-semibold rounded-md">{{$project->level}}</span>
                            </div>
                            <h3 class="font-semibold text-gray-800 text-base mb-2">{{$project->name}}</h3>
                        </div>
                    </div>

                    <!-- Project Details -->
                    <div class="space-y-2 mb-3">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Director:</span>
                            <span class="font-medium text-gray-800">{{$project->director->name}}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Start Date:</span>
                            <span class="text-gray-600">{{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Deadline:</span>
                            <span class="text-gray-600">{{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Status:</span>
                            <span onclick="openStatusModal({{$project->id}}, '{{$project->status}}')" 
                                  class="px-2.5 py-1 bg-[#0000FF] text-white text-xs font-semibold rounded-md cursor-pointer hover:opacity-80 transition-opacity">
                                {{$project->status}}
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2 pt-3 border-t border-gray-200">
                        <a href="{{ route('admin.edit-project' , $project->id) }}"
                            class="flex-1 flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md py-2 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Edit</span>
                        </a>
                        <button onclick="confirmDelete({{$project->id}})"
                            class="flex-1 flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white rounded-md py-2 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Delete</span>
                        </button>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center text-gray-500">Tidak Ada Project</div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 pt-4 border-t border-gray-200 gap-4">
            <div class="text-sm text-gray-700 order-2 sm:order-1">
                Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">6</span> results
            </div>
            <div class="flex gap-2 order-1 sm:order-2">
                <button
                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled>
                    Previous
                </button>
                <button
                    class="px-3 py-2 text-sm font-medium text-white bg-black border border-transparent rounded-md hover:bg-gray-800">
                    1
                </button>
                <button
                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled>
                    Next
                </button>
            </div>
        </div>
    </section>

    <!-- Status Edit Modal -->
    <div id="statusModal" class="modal-overlay" style="display: none;">
        <div class="modal-content bg-white rounded-[20px] shadow-lg p-4 sm:p-6 w-[95%] sm:w-[450px] max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4 sm:mb-6">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Edit Project Status</h3>
                <button onclick="closeStatusModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="statusForm" method="POST">
                @csrf
                @method('PUT')
                
                <input type="hidden" id="projectId" name="project_id">
                
                <div class="mb-4 sm:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Select Status</label>
                    <div class="space-y-2 sm:space-y-3">
                        <!-- Ready -->
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors status-option">
                            <input type="radio" name="status" value="Ready" class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <span class="ml-3 text-sm font-medium text-gray-700">Ready</span>
                        </label>

                        <!-- Running -->
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors status-option">
                            <input type="radio" name="status" value="Running" class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <span class="ml-3 text-sm font-medium text-gray-700">Running</span>
                        </label>

                        <!-- Testing -->
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors status-option">
                            <input type="radio" name="status" value="Testing" class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <span class="ml-3 text-sm font-medium text-gray-700">Testing</span>
                        </label>

                        <!-- Maintenance -->
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors status-option">
                            <input type="radio" name="status" value="Maintenance" class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <span class="ml-3 text-sm font-medium text-gray-700">Maintenance</span>
                        </label>

                        <!-- Complete -->
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors status-option">
                            <input type="radio" name="status" value="Complete" class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500">
                            <span class="ml-3 text-sm font-medium text-gray-700">Complete</span>
                        </label>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeStatusModal()" 
                            class="flex-1 px-4 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium text-sm">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="flex-1 px-4 py-2.5 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors font-medium text-sm">
                        Update Status
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Modal Overlay */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
            padding: 1rem;
        }

        .modal-overlay.active {
            opacity: 1;
        }

        .modal-content {
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        /* Status option checked state */
        .status-option:has(input:checked) {
            background-color: #EFF6FF;
            border-color: #3B82F6;
        }

        /* Smooth scrolling for modal */
        @media (max-height: 700px) {
            .modal-content {
                max-height: 90vh;
                overflow-y: auto;
            }
        }
    </style>

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this project?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ url('admin/delete-project') }}/${id}`;

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function openStatusModal(projectId, currentStatus) {
            const modal = document.getElementById('statusModal');
            const projectIdInput = document.getElementById('projectId');
            const form = document.getElementById('statusForm');
            
            projectIdInput.value = projectId;
            form.action = `{{ url('admin/update-project-status') }}/${projectId}`;
            
            const radioButtons = document.querySelectorAll('input[name="status"]');
            radioButtons.forEach(radio => {
                if (radio.value === currentStatus) {
                    radio.checked = true;
                }
            });
            
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.classList.add('active');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeStatusModal() {
            const modal = document.getElementById('statusModal');
            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 300);
        }

        document.getElementById('statusModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStatusModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('statusModal');
                if (modal.classList.contains('active')) {
                    closeStatusModal();
                }
            }
        });
    </script>
@endsection
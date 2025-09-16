@extends('admin/layout')

@section('title', 'Projects')

@section('content')
    <section class="w-full bg-white rounded-[20px] shadow-[0_0_4px_rgba(0,0,0,0.25)] p-8">
        <!-- Filter and Create Project Buttons -->
        <div class="flex justify-between items-center mb-8">
            <!-- Filter Button -->
            <div class="flex items-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2">
                <img class="w-6 h-6" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" />
                <span class="text-gray-500 text-sm font-medium">Filter</span>
            </div>

            <!-- Create Project Button -->
            <a href="{{ url('admin/create-project') }}"
                class="flex items-center gap-2.5 bg-black hover:bg-gray-800 rounded-[10px] px-3 py-3.5 transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span class="text-white text-sm font-semibold">Create project</span>
            </a>
        </div>

        <!-- Projects Table -->
        <div class="w-full overflow-x-auto">
            <table class="w-full min-w-[1200px]">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-[#f5f5f5]">
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-16">#</th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[250px]">Project Name</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Start Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Deadline</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[180px]">Project
                            Director</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-24">Level</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-28">Status</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                    <!-- Project Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">1</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="font-medium text-gray-800">Athena Cyntia</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-2.5 py-1 bg-[#0000FF] text-white text-sm font-semibold rounded-[10px]">
                                Running
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('edit-project') }}" 
                                   class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(1)" 
                                        class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Project Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">2</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="font-medium text-gray-800">Athena Cyntia</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="px-2.5 py-1 bg-[#6fadc8] text-white text-sm font-semibold rounded-[10px]">Low</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-2.5 py-1 bg-[#FFA500] text-white text-sm font-semibold rounded-[10px]">
                                Maintenance
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('edit-project') }}" 
                                   class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(2)" 
                                        class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Project Row 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">3</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="font-medium text-gray-800">Athena Cyntia</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-2.5 py-1 bg-[#0000FF] text-white text-sm font-semibold rounded-[10px]">
                                Running
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('edit-project') }}" 
                                   class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(3)" 
                                        class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Project Row 4 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">4</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="font-medium text-gray-800">Athena Cyntia</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="px-2.5 py-1 bg-[#ffb32d] text-white text-sm font-semibold rounded-[10px]">Medium</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-2.5 py-1 bg-[#FFA500] text-white text-sm font-semibold rounded-[10px]">
                                Maintenance
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('edit-project') }}" 
                                   class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(4)" 
                                        class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Project Row 5 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">5</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="font-medium text-gray-800">Athena Cyntia</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="px-2.5 py-1 bg-[#6fadc8] text-white text-sm font-semibold rounded-[10px]">Low</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-2.5 py-1 bg-[#50C878] text-white text-sm font-semibold rounded-[10px]">
                                To do
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('edit-project') }}" 
                                   class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(5)" 
                                        class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Project Row 6 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">6</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="font-medium text-gray-800">Athena Cyntia</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-2.5 py-1 bg-[#50C878] text-white text-sm font-semibold rounded-[10px]">
                                To do
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ url('admin/edit-project/6') }}" 
                                   class="flex items-center justify-center w-8 h-8 bg-blue-500 hover:bg-blue-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button onclick="confirmDelete(6)" 
                                        class="flex items-center justify-center w-8 h-8 bg-red-500 hover:bg-red-600 rounded-md transition-colors">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
            <div class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span
                    class="font-medium">6</span> results
            </div>
            <div class="flex gap-2">
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

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this project?')) {
                // Create a form and submit it for deletion
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ url('admin/delete-project') }}/${id}`;
                
                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                // Add method override for DELETE
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endsection
@extends('director/layout')

@section('title', 'Leave Submissions')

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
            <a href="{{ route('director.administration') }}"
                class="flex items-center gap-2.5 bg-black hover:bg-gray-800 rounded-[10px] px-3 py-3.5 transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span class="text-white text-sm font-semibold">Create Leave Submission</span>
            </a>
        </div>

        <!-- Projects Table -->
        <div class="w-full overflow-x-auto">
            <table class="w-full min-w-[1200px]">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-[#f5f5f5]">
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-16">#</th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[250px]">Employee Name</th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[250px]">Leave Category</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Start Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">End Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[180px]">Description</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-24">Standby Status</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-28">Form Cuti</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                    <!-- Submission Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">1</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">John Doe</div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-medium text-gray-700">Cuti Sakit</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 10, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 12, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-600">Demam dan flu</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-600">No</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <img src="/path/to/form-cuti-2.jpg" alt="Form Cuti" class="w-12 h-12 object-cover rounded border mx-auto cursor-pointer" onclick="viewFormCuti('/path/to/form-cuti-2.jpg')">
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <!-- Accept Button -->
                                <button type="button" onclick="acceptProject(2)" 
                                    class="inline-flex items-center justify-center w-8 h-8 text-green-600 bg-green-100 rounded-full hover:bg-green-200 hover:text-green-700 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                                    title="Accept Leave">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                
                                <!-- Reject Button -->
                                <button type="button" onclick="rejectProject(2)" 
                                    class="inline-flex items-center justify-center w-8 h-8 text-red-600 bg-red-100 rounded-full hover:bg-red-200 hover:text-red-700 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                    title="Reject Leave">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Example of Approved Leave Row -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">2</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Jane Smith</div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-medium text-gray-700">Cuti Melahirkan</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Oct 15, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Jan 15, 2025</td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-600">Cuti melahirkan</div>
                        </td>
                         <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-600">Yes</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <img src="/path/to/form-cuti-3.jpg" alt="Form Cuti" class="w-12 h-12 object-cover rounded border mx-auto cursor-pointer" onclick="viewFormCuti('/path/to/form-cuti-3.jpg')">
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Approved
                                </span>
                            </div>
                        </td>
                    </tr>

                    <!-- Example of Rejected Leave Row -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800 font-medium text-center">3</td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-gray-800">Mike Johnson</div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-medium text-gray-700">Cuti Tahunan</div>
                        </td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 1, 2024</td>
                        <td class="py-4 px-4 text-center text-gray-600">Nov 30, 2024</td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-600">Liburan panjang</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-600">Yes</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <img src="/path/to/form-cuti-4.jpg" alt="Form Cuti" class="w-12 h-12 object-cover rounded border mx-auto cursor-pointer" onclick="viewFormCuti('/path/to/form-cuti-4.jpg')">
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
            <div class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                    class="font-medium">4</span> results
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

    <!-- Modal for viewing Form Cuti -->
    <div id="formCutiModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg max-w-2xl max-h-[80vh] overflow-auto">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-semibold">Form Cuti</h3>
                <button onclick="closeFormCutiModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <img id="formCutiImage" src="" alt="Form Cuti" class="w-full h-auto">
            </div>
        </div>
    </div>

    <script>
        function acceptProject(projectId) {
            if (confirm('Are you sure you want to accept this leave submission?')) {
                // Here you would typically send an AJAX request to your backend
                // For now, we'll show a simple notification
                showNotification('Leave submission accepted successfully!', 'success');
                
                // You can add your AJAX call here
                // Example:
                // fetch(`/admin/leave-submissions/${projectId}/accept`, {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                //     }
                // }).then(response => response.json())
                //   .then(data => {
                //       if (data.success) {
                //           location.reload(); // Refresh the page to show updated status
                //       }
                //   });
            }
        }

        function rejectProject(projectId) {
            if (confirm('Are you sure you want to reject this leave submission?')) {
                // Here you would typically send an AJAX request to your backend
                showNotification('Leave submission rejected successfully!', 'error');
                
                // You can add your AJAX call here similar to acceptProject function
            }
        }

        function viewFormCuti(imagePath) {
            document.getElementById('formCutiImage').src = imagePath;
            document.getElementById('formCutiModal').classList.remove('hidden');
        }

        function closeFormCutiModal() {
            document.getElementById('formCutiModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('formCutiModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeFormCutiModal();
            }
        });

        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                type === 'warning' ? 'bg-yellow-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        ${type === 'success' ? 
                            '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>' :
                            '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>'
                        }
                    </svg>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove after 3 seconds
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
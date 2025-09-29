@extends('admin/layout')

@section('title', 'Leave Submissions')

@section('content')
    <section class="w-full bg-white rounded-[20px] shadow-lg p-6 md:p-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-[#111111] mb-1">Leave Submissions</h1>
                <p class="text-sm text-gray-600">Review and manage employee leave requests</p>
            </div>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full md:w-auto">
                <!-- Filter Button -->
                <button
                    class="flex items-center justify-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2.5 hover:bg-gray-50 transition-colors">
                    <img class="w-5 h-5" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" alt="Filter" />
                    <span class="text-gray-700 text-sm font-medium">Filter</span>
                </button>

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

        <!-- Table Container -->
        <div class="w-full overflow-x-auto rounded-xl border border-gray-200">
            <table class="w-full min-w-[1200px]">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-16">#</th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[200px]">Employee Name
                        </th>
                        <th class="text-left py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[180px]">Leave Category
                        </th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Start Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">End Date</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold min-w-[160px]">Description
                        </th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-28">Standby</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-28">Form Cuti</th>
                        <th class="text-center py-4 px-4 text-[#7D7D7D] text-sm font-semibold w-32">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100">
                    <!-- Pending Submission Row 1 -->
                    <tr class="hover:bg-blue-50 transition-colors group">
                        <td class="py-4 px-4">
                            <span class="text-gray-800 font-medium text-center block">1</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-semibold text-gray-900">John Doe</div>
                                    <div class="text-xs text-gray-500">Software Developer</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1.5 bg-amber-50 border border-amber-200 rounded-lg">
                                <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                                <span class="font-medium text-amber-700 text-sm">Cuti Sakit</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-700 font-medium">Nov 10, 2024</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-700 font-medium">Nov 12, 2024</div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="text-sm text-gray-600 text-center line-clamp-2">Demam dan flu</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                No
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex justify-center">
                                <img src="/path/to/form-cuti-2.jpg" alt="Form Cuti"
                                    class="w-12 h-12 object-cover rounded-lg border-2 border-gray-200 cursor-pointer hover:border-blue-500 transition-all shadow-sm hover:shadow-md"
                                    onclick="viewFormCuti('/path/to/form-cuti-2.jpg')">
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-center gap-2">
                                <!-- Accept Button -->
                                <button type="button" onclick="acceptProject(1)"
                                    class="inline-flex items-center justify-center w-9 h-9 text-green-600 bg-green-100 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-sm"
                                    title="Accept Leave">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Reject Button -->
                                <button type="button" onclick="rejectProject(1)"
                                    class="inline-flex items-center justify-center w-9 h-9 text-red-600 bg-red-100 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 shadow-sm"
                                    title="Reject Leave">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Approved Leave Row -->
                    <tr class="hover:bg-green-50 transition-colors group bg-green-50/30">
                        <td class="py-4 px-4">
                            <span class="text-gray-800 font-medium text-center block">2</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-semibold text-gray-900">Jane Smith</div>
                                    <div class="text-xs text-gray-500">Project Manager</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1.5 bg-purple-50 border border-purple-200 rounded-lg">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="font-medium text-purple-700 text-sm">Cuti Melahirkan</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-700 font-medium">Oct 15, 2024</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-700 font-medium">Jan 15, 2025</div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="text-sm text-gray-600 text-center line-clamp-2">Cuti melahirkan</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                Yes
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex justify-center">
                                <img src="/path/to/form-cuti-3.jpg" alt="Form Cuti"
                                    class="w-12 h-12 object-cover rounded-lg border-2 border-gray-200 cursor-pointer hover:border-green-500 transition-all shadow-sm hover:shadow-md"
                                    onclick="viewFormCuti('/path/to/form-cuti-3.jpg')">
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-center">
                                <div
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-green-500 to-green-600 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-xs font-semibold text-white">Approved</span>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Rejected Leave Row -->
                    <tr class="hover:bg-red-50 transition-colors group bg-red-50/30">
                        <td class="py-4 px-4">
                            <span class="text-gray-800 font-medium text-center block">3</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-semibold text-gray-900">Mike Johnson</div>
                                    <div class="text-xs text-gray-500">UI/UX Designer</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 border border-blue-200 rounded-lg">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="font-medium text-blue-700 text-sm">Cuti Tahunan</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-700 font-medium">Nov 1, 2024</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="text-sm text-gray-700 font-medium">Nov 30, 2024</div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="text-sm text-gray-600 text-center line-clamp-2">Liburan panjang</div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                Yes
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex justify-center">
                                <img src="/path/to/form-cuti-4.jpg" alt="Form Cuti"
                                    class="w-12 h-12 object-cover rounded-lg border-2 border-gray-200 cursor-pointer hover:border-red-500 transition-all shadow-sm hover:shadow-md"
                                    onclick="viewFormCuti('/path/to/form-cuti-4.jpg')">
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-center">
                                <div
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-red-600 shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-xs font-semibold text-white">Rejected</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 pt-6 border-t border-gray-200 gap-4">
            <div class="text-sm text-gray-600">
                Showing <span class="font-semibold text-gray-900">1</span> to <span
                    class="font-semibold text-gray-900">3</span> of <span class="font-semibold text-gray-900">3</span>
                results
            </div>
            <div class="flex gap-2">
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                    disabled>
                    Previous
                </button>
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-[#111111] border border-transparent rounded-lg hover:bg-[#333333] transition-colors shadow-sm">
                    1
                </button>
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                    disabled>
                    Next
                </button>
            </div>
        </div>
    </section>

    <!-- Modal for viewing Form Cuti -->
    <div id="formCutiModal"
        class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden backdrop-blur-sm">
        <div class="bg-white rounded-2xl max-w-3xl max-h-[85vh] overflow-hidden shadow-2xl m-4">
            <div
                class="flex justify-between items-center p-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                <h3 class="text-lg font-bold text-gray-900">Form Cuti Preview</h3>
                <button onclick="closeFormCutiModal()"
                    class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 rounded-lg p-2 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="p-6 overflow-auto max-h-[calc(85vh-88px)]">
                <img id="formCutiImage" src="" alt="Form Cuti" class="w-full h-auto rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <!-- Modal for Approve with Notes -->
    <div id="approveModal"
        class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden backdrop-blur-sm">
        <div class="bg-white rounded-2xl max-w-xl w-full overflow-hidden shadow-2xl m-4">
            <div
                class="flex justify-between items-center p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Approve Leave Request</h3>
                </div>
                <button onclick="closeApproveModal()"
                    class="text-gray-400 hover:text-gray-600 hover:bg-white rounded-lg p-2 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-4">Add a note for the employee (optional):</p>
                    <textarea id="approveNotes" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none text-sm"
                        placeholder="e.g., Permohonan cuti Anda telah disetujui. Pastikan semua pekerjaan telah diselesaikan atau didelegasikan sebelum tanggal cuti. Nikmati liburan Anda!"></textarea>
                </div>
                <div class="flex gap-3">
                    <button onclick="closeApproveModal()"
                        class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                        Cancel
                    </button>
                    <button onclick="confirmApprove()"
                        class="flex-1 px-4 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all shadow-md font-medium">
                        Approve Request
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Reject with Reason -->
    <div id="rejectModal" class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden backdrop-blur-sm">
        <div class="bg-white rounded-2xl max-w-xl w-full overflow-hidden shadow-2xl m-4">
            <div
                class="flex justify-between items-center p-6 border-b border-gray-200 bg-gradient-to-r from-red-50 to-rose-50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Reject Leave Request</h3>
                </div>
                <button onclick="closeRejectModal()"
                    class="text-gray-400 hover:text-gray-600 hover:bg-white rounded-lg p-2 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Rejection Reason <span class="text-red-500">*</span>
                    </label>
                    <select id="rejectReason"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm mb-4">
                        <option value="">Select a reason...</option>
                        <option value="project_deadline">Project Deadline Conflict</option>
                        <option value="insufficient_coverage">Insufficient Team Coverage</option>
                        <option value="peak_period">Peak Business Period</option>
                        <option value="pending_tasks">Pending Critical Tasks</option>
                        <option value="quota_exceeded">Leave Quota Exceeded</option>
                        <option value="documentation_incomplete">Incomplete Documentation</option>
                        <option value="other">Other Reason</option>
                    </select>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Additional Details <span class="text-red-500">*</span>
                    </label>
                    <textarea id="rejectDetails" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none text-sm"
                        placeholder="e.g., Maaf, permohonan cuti tidak dapat disetujui karena bertepatan dengan deadline project penting. Silakan ajukan kembali dengan tanggal yang berbeda."></textarea>
                    <p class="text-xs text-gray-500 mt-2">Please provide clear explanation to help the employee understand
                        the decision.</p>
                </div>
                <div class="flex gap-3">
                    <button onclick="closeRejectModal()"
                        class="flex-1 px-4 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                        Cancel
                    </button>
                    <button onclick="confirmReject()"
                        class="flex-1 px-4 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition-all shadow-md font-medium">
                        Reject Request
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentProjectId = null;

        function acceptProject(projectId) {
            currentProjectId = projectId;
            document.getElementById('approveModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function rejectProject(projectId) {
            currentProjectId = projectId;
            document.getElementById('rejectModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeApproveModal() {
            document.getElementById('approveModal').classList.add('hidden');
            document.getElementById('approveNotes').value = '';
            document.body.style.overflow = 'auto';
            currentProjectId = null;
        }

        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
            document.getElementById('rejectReason').value = '';
            document.getElementById('rejectDetails').value = '';
            document.body.style.overflow = 'auto';
            currentProjectId = null;
        }

        function confirmApprove() {
            const notes = document.getElementById('approveNotes').value.trim();

            if (confirm('Are you sure you want to approve this leave submission?')) {
                // Here you would send the data to your backend
                const approvalData = {
                    project_id: currentProjectId,
                    status: 'approved',
                    admin_notes: notes || 'Leave request has been approved.',
                    approved_at: new Date().toISOString(),
                    approved_by: '{{ auth()->user()->name ?? 'Admin' }}'
                };

                console.log('Approval Data:', approvalData);

                // Add your AJAX call here
                // Example:
                // fetch(`/admin/leave-submissions/${currentProjectId}/approve`, {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                //     },
                //     body: JSON.stringify(approvalData)
                // }).then(response => response.json())
                //   .then(data => {
                //       if (data.success) {
                //           showNotification('Leave submission approved successfully!', 'success');
                //           setTimeout(() => location.reload(), 1500);
                //       }
                //   });

                closeApproveModal();
                showNotification('Leave submission approved successfully!', 'success');
            }
        }

        function confirmReject() {
            const reason = document.getElementById('rejectReason').value;
            const details = document.getElementById('rejectDetails').value.trim();

            if (!reason) {
                showNotification('Please select a rejection reason', 'warning');
                return;
            }

            if (!details) {
                showNotification('Please provide additional details for rejection', 'warning');
                return;
            }

            if (confirm('Are you sure you want to reject this leave submission?')) {
                // Here you would send the data to your backend
                const rejectionData = {
                    project_id: currentProjectId,
                    status: 'rejected',
                    rejection_reason: reason,
                    rejection_details: details,
                    rejected_at: new Date().toISOString(),
                    rejected_by: '{{ auth()->user()->name ?? 'Admin' }}'
                };

                console.log('Rejection Data:', rejectionData);

                // Add your AJAX call here
                // Example:
                // fetch(`/admin/leave-submissions/${currentProjectId}/reject`, {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                //     },
                //     body: JSON.stringify(rejectionData)
                // }).then(response => response.json())
                //   .then(data => {
                //       if (data.success) {
                //           showNotification('Leave submission rejected successfully!', 'error');
                //           setTimeout(() => location.reload(), 1500);
                //       }
                //   });

                closeRejectModal();
                showNotification('Leave submission rejected successfully!', 'error');
            }
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

        // Close modal when clicking outside
        document.getElementById('formCutiModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeFormCutiModal();
            }
        });

        document.getElementById('approveModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeApproveModal();
            }
        });

        document.getElementById('rejectModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRejectModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!document.getElementById('formCutiModal').classList.contains('hidden')) {
                    closeFormCutiModal();
                }
                if (!document.getElementById('approveModal').classList.contains('hidden')) {
                    closeApproveModal();
                }
                if (!document.getElementById('rejectModal').classList.contains('hidden')) {
                    closeRejectModal();
                }
            }
        });

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

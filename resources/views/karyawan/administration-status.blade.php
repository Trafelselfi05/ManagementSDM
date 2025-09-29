@extends('karyawan/layout')
@section('title', 'Leave Status')
@section('content')
    @php
        // Get status from URL parameter, default to 'pending' if not provided
        $status = request()->get('status', 'pending');
        
        // Validate status value
        if (!in_array($status, ['pending', 'approved', 'rejected'])) {
            $status = 'pending';
        }
    @endphp

    <!-- Main Content Section - Dynamic Status -->
    <div class="flex flex-col max-w-4xl w-full items-center gap-2.5 px-6 md:px-10 py-8 mx-auto bg-white rounded-2xl shadow-lg">
        <div class="flex flex-col items-start gap-8 relative self-stretch w-full">
            <!-- Header -->
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-3">
                    <a href="{{ route('karyawan.administration-list') }}" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                    <h1 class="font-semibold text-[#111111] text-lg md:text-xl">Leave Request Status</h1>
                </div>
            </div>

            <!-- Status Card - Dynamic based on $status variable -->
            @if($status === 'pending')
            <div class="flex flex-col items-center gap-6 relative self-stretch w-full bg-gradient-to-br from-amber-50 to-yellow-50 rounded-2xl p-8 border border-amber-200">
                <!-- Pending Icon -->
                <div class="w-20 h-20 bg-amber-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <!-- Status Text -->
                <div class="flex flex-col items-center gap-2">
                    <h2 class="font-bold text-amber-700 text-2xl">Pending Approval</h2>
                    <p class="font-medium text-amber-600 text-sm text-center">Your leave request is waiting for administrator approval</p>
                </div>

                <!-- Status Badge with Animation -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 rounded-full">
                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    <span class="font-semibold text-white text-sm">Status: Pending</span>
                </div>
            </div>
            @endif

            <!-- Approved Status -->
            @if($status === 'approved')
            <div class="flex flex-col items-center gap-6 relative self-stretch w-full bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 border border-green-200">
                <!-- Success Icon -->
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <!-- Status Text -->
                <div class="flex flex-col items-center gap-2">
                    <h2 class="font-bold text-green-700 text-2xl">Approved</h2>
                    <p class="font-medium text-green-600 text-sm text-center">Your leave request has been approved by the administrator</p>
                </div>

                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 rounded-full">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                    <span class="font-semibold text-white text-sm">Status: Approved</span>
                </div>
            </div>
            @endif

            <!-- Rejected Status -->
            @if($status === 'rejected')
            <div class="flex flex-col items-center gap-6 relative self-stretch w-full bg-gradient-to-br from-red-50 to-rose-50 rounded-2xl p-8 border border-red-200">
                <!-- Rejection Icon -->
                <div class="w-20 h-20 bg-red-500 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>

                <!-- Status Text -->
                <div class="flex flex-col items-center gap-2">
                    <h2 class="font-bold text-red-700 text-2xl">Rejected</h2>
                    <p class="font-medium text-red-600 text-sm text-center">Unfortunately, your leave request has been rejected by the administrator</p>
                </div>

                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 rounded-full">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                    <span class="font-semibold text-white text-sm">Status: Rejected</span>
                </div>
            </div>
            @endif

            <!-- Leave Details Card -->
            <div class="flex flex-col gap-5 relative self-stretch w-full bg-gray-50 rounded-xl p-6">
                <h3 class="font-semibold text-[#111111] text-base">Leave Details</h3>
                
                <!-- Detail Items -->
                <div class="flex flex-col gap-4">
                    <!-- Leave Category -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm w-full md:w-40">Leave Category</span>
                        <span class="font-medium text-[#111111] text-sm">: Cuti Tahunan</span>
                    </div>

                    <!-- Duration -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm w-full md:w-40">Duration</span>
                        <span class="font-medium text-[#111111] text-sm">: 2025-10-01 to 2025-10-05 (5 days)</span>
                    </div>

                    <!-- Submission Date -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm w-full md:w-40">Submitted On</span>
                        <span class="font-medium text-[#111111] text-sm">: 2025-09-25 14:30</span>
                    </div>

                    <!-- Conditional: Approved/Rejected Date -->
                    @if($status === 'approved')
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm w-full md:w-40">Approved On</span>
                        <span class="font-medium text-green-600 text-sm">: 2025-09-26 09:15</span>
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm w-full md:w-40">Approved By</span>
                        <span class="font-medium text-[#111111] text-sm">: Admin Manager</span>
                    </div>
                    @endif

                    @if($status === 'rejected')
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm w-full md:w-40">Rejected On</span>
                        <span class="font-medium text-red-600 text-sm">: 2025-09-26 10:45</span>
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm w-full md:w-40">Rejected By</span>
                        <span class="font-medium text-[#111111] text-sm">: Admin Manager</span>
                    </div>
                    @endif

                    <!-- Description -->
                    <div class="flex flex-col gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm">Description</span>
                        <div class="bg-white rounded-lg p-4 text-sm text-[#111111] border border-gray-200">
                            Liburan keluarga yang sudah direncanakan sejak awal tahun. Akan membawa laptop untuk berjaga-jaga jika ada hal mendesak.
                        </div>
                    </div>

                    <!-- Admin Notes (for approved) -->
                    @if($status === 'approved')
                    <div class="flex flex-col gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm">Admin Notes</span>
                        <div class="bg-green-50 rounded-lg p-4 text-sm text-green-700 border border-green-200">
                            <div class="flex items-start gap-2">
                                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span>Permohonan cuti Anda telah disetujui. Pastikan semua pekerjaan telah diselesaikan atau didelegasikan sebelum tanggal cuti. Nikmati liburan Anda!</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Rejection Reason (for rejected) -->
                    @if($status === 'rejected')
                    <div class="flex flex-col gap-2">
                        <span class="font-medium text-[#7d7d7d] text-sm">Rejection Reason</span>
                        <div class="bg-red-50 rounded-lg p-4 text-sm text-red-700 border border-red-200">
                            <div class="flex items-start gap-2">
                                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <div class="flex flex-col gap-1">
                                    <span class="font-semibold">Project Deadline Conflict</span>
                                    <span>Maaf, permohonan cuti tidak dapat disetujui karena bertepatan dengan deadline project penting (Project Website Redesign). Tim membutuhkan kehadiran Anda untuk menyelesaikan beberapa milestone kritis. Silakan ajukan kembali permohonan cuti dengan tanggal yang berbeda, minimal 2 minggu setelah deadline project (setelah 15 Oktober 2025).</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Additional Information based on status -->
            @if($status === 'pending')
            <!-- Pending Information -->
            <div class="flex flex-col gap-3 relative self-stretch w-full bg-blue-50 rounded-xl p-5 border border-blue-200">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-semibold text-blue-900 text-sm">While Waiting for Approval</h4>
                        <ul class="list-disc list-inside text-blue-700 text-sm space-y-1">
                            <li>Your request is being reviewed by the administrator</li>
                            <li>You will be notified once a decision is made</li>
                            <li>Average review time is 1-2 business days</li>
                            <li>You can contact HR if you need urgent approval</li>
                            <li>Do not make travel arrangements until approval is confirmed</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            @if($status === 'approved')
            <!-- Approved Information -->
            <div class="flex flex-col gap-3 relative self-stretch w-full bg-blue-50 rounded-xl p-5 border border-blue-200">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-semibold text-blue-900 text-sm">Important Information</h4>
                        <ul class="list-disc list-inside text-blue-700 text-sm space-y-1">
                            <li>Make sure to complete all pending tasks before your leave</li>
                            <li>Inform your team members about your leave schedule</li>
                            <li>Set up an out-of-office email response</li>
                            <li>Keep your contact number accessible for emergencies</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            @if($status === 'rejected')
            <!-- Rejected Next Steps -->
            <div class="flex flex-col gap-3 relative self-stretch w-full bg-amber-50 rounded-xl p-5 border border-amber-200">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-semibold text-amber-900 text-sm">What You Can Do Next</h4>
                        <ul class="list-disc list-inside text-amber-700 text-sm space-y-1">
                            <li>Review the rejection reason carefully</li>
                            <li>Discuss with your manager about alternative dates</li>
                            <li>Submit a new leave request with adjusted dates</li>
                            <li>Contact HR if you have questions about the rejection</li>
                            <li>Plan your leave schedule considering project deadlines</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact Support for Rejected -->
            <div class="flex flex-col gap-3 relative self-stretch w-full bg-blue-50 rounded-xl p-5 border border-blue-200">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <div class="flex flex-col gap-2">
                        <h4 class="font-semibold text-blue-900 text-sm">Need Help?</h4>
                        <p class="text-blue-700 text-sm">If you have questions about this rejection or need further clarification, please contact the HR department at <span class="font-semibold">hr@company.com</span> or call extension <span class="font-semibold">123</span>.</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Action Buttons - Dynamic based on status -->
            <div class="inline-flex flex-col sm:flex-row items-center gap-4 relative w-full justify-center mt-2">
                @if($status === 'pending')
                    <a href="{{ route('karyawan.administration') }}" class="flex w-full sm:w-[200px] h-[45px] items-center justify-center rounded-[10px] border-2 border-[#111111] hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-[#111111] text-sm">Back to Form</span>
                    </a>
                    <button onclick="cancelRequest()" class="flex w-full sm:w-[200px] h-[45px] items-center justify-center gap-2 bg-red-600 rounded-[10px] text-white hover:bg-red-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="font-semibold text-sm">Cancel Request</span>
                    </button>
                @endif

                @if($status === 'approved')
                    <a href="{{ route('karyawan.administration') }}" class="flex w-full sm:w-[200px] h-[45px] items-center justify-center rounded-[10px] border-2 border-[#111111] hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-[#111111] text-sm">Back to Form</span>
                    </a>
                    <button onclick="window.print()" class="flex w-full sm:w-[200px] h-[45px] items-center justify-center gap-2 bg-[#111111] rounded-[10px] text-white hover:bg-[#333333] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        <span class="font-semibold text-sm">Print Details</span>
                    </button>
                @endif

                @if($status === 'rejected')
                    <a href="{{ route('karyawan.administration') }}" class="flex w-full sm:w-[200px] h-[45px] items-center justify-center gap-2 bg-[#111111] rounded-[10px] text-white hover:bg-[#333333] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="font-semibold text-sm">Submit New Request</span>
                    </a>
                    <a href="mailto:hr@company.com" class="flex w-full sm:w-[200px] h-[45px] items-center justify-center gap-2 rounded-[10px] border-2 border-[#111111] hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="font-semibold text-[#111111] text-sm">Contact HR</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <script>
        function cancelRequest() {
            if (confirm('Are you sure you want to cancel this leave request?')) {
                alert('Leave request cancelled');
                window.location.href = '{{ route("karyawan.administration") }}';
            }
        }
    </script>
@endsection
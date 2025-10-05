@extends('admin.layout')
@section('title', 'Leave Submission')
@section('content')
    <!-- Main Content Section -->
    <div class="flex flex-col max-w-4xl w-full items-center gap-2.5 px-10 py-8 mx-auto bg-white rounded-2xl shadow-lg">
        <div class="flex flex-col items-start gap-8 relative self-stretch w-full">
            <div class="w-fit font-semibold text-[#111111] text-lg whitespace-nowrap">
                Leave Submission
            </div>
            <div class="flex flex-col items-center gap-12 relative self-stretch w-full">
                <form id="leaveForm" method="POST" action="{{ route('admin.administration.store') }}"
                    enctype="multipart/form-data" class="flex flex-col items-start gap-5 relative self-stretch w-full">
                    @csrf

                    <!-- ====== User dropdown ====== -->
                    <div class="flex flex-col items-start gap-3 relative self-stretch w-full">
                        <label class="self-stretch font-medium text-[#7d7d7d] text-sm">Nama User</label>

                        <div class="relative self-stretch w-full">
                            <button id="userBtn" type="button" aria-haspopup="true" aria-expanded="false"
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full bg-[#f9f9f9] rounded-[15px] shadow cursor-pointer focus:outline-none">
                                <div class="flex w-full items-center justify-between">
                                    <p id="userSelectedText" class="font-normal text-[#7d7d7d] text-sm whitespace-nowrap">
                                        -- Pilih User --
                                    </p>
                                    <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" id="userArrow"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>

                            <div id="dropdownUser"
                                class="hidden absolute top-[52px] left-0 flex-col w-full bg-white rounded-[12px] shadow-[0_4px_12px_rgba(0,0,0,0.08)] z-50 overflow-hidden">
                                @foreach ($users as $u)
                                    <div class="user-option flex w-full h-[45px] items-center gap-2.5 px-4 cursor-pointer hover:bg-[#f3f4f6]"
                                        data-id="{{ $u->id }}" data-name="{{ $u->name }}">
                                        <div class="font-normal text-black text-sm">{{ $u->name }} &nbsp;|&nbsp;
                                            {{ $u->role }}</div>
                                    </div>
                                @endforeach
                            </div>

                            <input type="hidden" id="user_id" name="user_id" value="{{ old('user_id', '') }}" />
                        </div>
                    </div>

                    <!-- ====== Category dropdown ====== -->
                    <div class="flex flex-col items-start gap-3 relative self-stretch w-full">
                        <label class="self-stretch font-medium text-[#7d7d7d] text-sm">Leave Category</label>

                        <div class="relative self-stretch w-full">
                            <button id="categoryBtn" type="button" aria-haspopup="true" aria-expanded="false"
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full bg-[#f9f9f9] rounded-[15px] shadow cursor-pointer focus:outline-none">
                                <div class="flex w-full items-center justify-between">
                                    <p id="categorySelectedText"
                                        class="font-normal text-[#7d7d7d] text-sm whitespace-nowrap">
                                        -- Pilih Jenis Cuti --
                                    </p>
                                    <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" id="categoryArrow"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>

                            <div id="dropdownMenu"
                                class="hidden absolute top-[52px] left-0 flex-col w-full bg-white rounded-[12px] shadow-[0_4px_12px_rgba(0,0,0,0.08)] z-50 overflow-hidden">
                                <div class="option-item px-4 h-[45px] flex items-center cursor-pointer hover:bg-[#f3f4f6]"
                                    data-value="Cuti Tahunan">Cuti Tahunan</div>
                                <div class="option-item px-4 h-[45px] flex items-center cursor-pointer hover:bg-[#f3f4f6]"
                                    data-value="Cuti Sakit">Cuti Sakit</div>
                                <div class="option-item px-4 h-[45px] flex items-center cursor-pointer hover:bg-[#f3f4f6]"
                                    data-value="Cuti Melahirkan">Cuti Melahirkan</div>
                                <div class="option-item px-4 h-[45px] flex items-center cursor-pointer hover:bg-[#f3f4f6]"
                                    data-value="Cuti Darurat">Cuti Darurat</div>
                                <div class="option-item px-4 h-[45px] flex items-center cursor-pointer hover:bg-[#f3f4f6]"
                                    data-value="Cuti Pribadi">Cuti Pribadi</div>
                                <div class="option-item px-4 h-[45px] flex items-center cursor-pointer hover:bg-[#f3f4f6]"
                                    data-value="Cuti Haji">Cuti Haji/Umrah</div>
                                <div class="option-item px-4 h-[45px] flex items-center cursor-pointer hover:bg-[#f3f4f6]"
                                    data-value="Cuti Pernikahan">Cuti Pernikahan</div>
                            </div>

                            <input type="hidden" id="leave_category" name="leave_category"
                                value="{{ old('leave_category', '') }}" />
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="flex flex-col md:flex-row items-end gap-5 relative self-stretch w-full">
                        <!-- Start Date -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 w-full">
                            <label for="start-date" class="self-stretch font-medium text-[#7d7d7d] text-sm">Start
                                Date</label>
                            <div class="relative self-stretch w-full">
                                <input readonly id="start-date" name="start_date" type="text" placeholder="YYYY-MM-DD"
                                    class="date-input flex h-[45px] items-center gap-2.5 px-4 py-[11px] pr-12 self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-sm cursor-pointer focus:outline-none" />
                                <img class="absolute right-4 top-1/2 transform -translate-y-1/2 w-[18px] h-[20px] pointer-events-none"
                                    src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125.png" />
                            </div>
                        </div>

                        <!-- End Date -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 w-full">
                            <label for="end-date" class="self-stretch font-medium text-[#7d7d7d] text-sm">End Date</label>
                            <div class="relative self-stretch w-full">
                                <input readonly id="end-date" name="end_date" type="text" placeholder="YYYY-MM-DD"
                                    class="date-input flex h-[45px] items-center gap-2.5 px-4 py-[11px] pr-12 self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-sm cursor-pointer focus:outline-none" />
                                <img class="absolute right-4 top-1/2 transform -translate-y-1/2 w-[18px] h-[20px] pointer-events-none"
                                    src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125-1.png" />
                            </div>
                        </div>
                    </div>

                    <!-- Upload Picture Section -->
                    <div class="flex flex-col items-start gap-3 relative self-stretch w-full">
                        <label class="self-stretch font-medium text-[#7d7d7d] text-sm">
                            Upload Supporting Document (if needed)
                        </label>
                        <div class="flex flex-col gap-3 w-full">
                            <button type="button" onclick="uploadPicture()"
                                class="flex h-[45px] items-center justify-center gap-2.5 px-4 py-[11px] self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] hover:bg-[#e0e0e0] transition-colors focus:outline-none focus:ring-2 focus:ring-[#111111] focus:ring-opacity-20">
                                <img class="w-4 h-4" src="https://cdn-icons-png.flaticon.com/512/126/126477.png"
                                    alt="Upload icon" />
                                <div class="font-medium text-[#111111] text-sm">Upload Picture</div>
                            </button>

                            <!-- Preview Container -->
                            <div id="imagePreviewContainer" class="hidden mt-2 w-full">
                                <p class="text-sm text-[#7d7d7d] mb-2">Preview:</p>
                                <div
                                    class="relative border border-dashed border-gray-300 rounded-[15px] p-2 flex justify-center items-center">
                                    <img id="imagePreview" class="max-h-40 max-w-full rounded-[10px]" src=""
                                        alt="Preview" />
                                    <button type="button" onclick="removeImage()"
                                        class="absolute top-0 right-0 m-2 bg-red-500 text-white rounded-full p-1 w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors">
                                        ×
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="file" id="fileInput" name="supporting_document" accept="image/*"
                            class="hidden" />
                    </div>

                    <!-- Description -->
                    <div class="flex flex-col items-start gap-3 relative self-stretch w-full">
                        <label for="description"
                            class="self-stretch font-medium text-[#7d7d7d] text-sm">Description</label>
                        <textarea id="description" name="description" placeholder="Enter your leave description..." rows="4"
                            class="flex h-[120px] items-start px-4 py-[11px] self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] resize-none text-sm placeholder-[#7d7d7d] focus:outline-none"></textarea>
                    </div>

                    <!-- Radio Button Options -->
                    <div class="flex flex-col md:flex-row items-center gap-5 relative self-stretch w-full">
                        <!-- Laptop Question -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 w-full">
                            <p class="font-medium text-[#7d7d7d] text-sm">
                                Do you bring laptop? (if there is a super urgent matter)
                            </p>
                            <div
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026]">

                                <label class="inline-flex items-center gap-2.5 cursor-pointer mr-4">
                                    <input type="radio" name="bring_laptop" value="1" class="hidden">
                                    <div
                                        class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center radio-indicator transition-all duration-300">
                                        <div
                                            class="w-3 h-3 rounded-full bg-[#FFB800] opacity-0 radio-dot transition-all duration-300">
                                        </div>
                                    </div>
                                    <div class="font-medium text-[#111111] text-sm">Yes</div>
                                </label>

                                <label class="inline-flex items-center gap-2.5 cursor-pointer">
                                    <input type="radio" name="bring_laptop" value="0" class="hidden" checked>
                                    <div
                                        class="w-6 h-6 rounded-full border-2 border-[#FFB800] flex items-center justify-center radio-indicator transition-all duration-300">
                                        <div
                                            class="w-3 h-3 rounded-full bg-[#FFB800] opacity-100 radio-dot transition-all duration-300">
                                        </div>
                                    </div>
                                    <div class="font-medium text-[#111111] text-sm">No</div>
                                </label>
                            </div>
                        </div>

                        <!-- Contact Question -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 w-full">
                            <p class="font-medium text-[#7d7d7d] text-sm">
                                Do you still be Contacted? (if there is super urgent matter)
                            </p>
                            <div
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026]">

                                <label class="inline-flex items-center gap-2.5 cursor-pointer mr-4">
                                    <input type="radio" name="can_be_contacted" value="1" class="hidden">
                                    <div
                                        class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center radio-indicator transition-all duration-300">
                                        <div
                                            class="w-3 h-3 rounded-full bg-[#FFB800] opacity-0 radio-dot transition-all duration-300">
                                        </div>
                                    </div>
                                    <div class="font-medium text-[#111111] text-sm">Yes</div>
                                </label>

                                <label class="inline-flex items-center gap-2.5 cursor-pointer">
                                    <input type="radio" name="can_be_contacted" value="0" class="hidden" checked>
                                    <div
                                        class="w-6 h-6 rounded-full border-2 border-[#FFB800] flex items-center justify-center radio-indicator transition-all duration-300">
                                        <div
                                            class="w-3 h-3 rounded-full bg-[#FFB800] opacity-100 radio-dot transition-all duration-300">
                                        </div>
                                    </div>
                                    <div class="font-medium text-[#111111] text-sm">No</div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="inline-flex flex-col sm:flex-row items-center gap-4 relative w-full justify-center mt-4">
                        <button type="button" onclick="resetForm()"
                            class="flex w-full sm:w-[180px] h-[45px] items-center justify-center rounded-[10px] border border-[#111111] hover:bg-[#f9f9f9] transition-colors">
                            <div class="font-semibold text-[#111111] text-sm">Cancel</div>
                        </button>
                        <button type="button" onclick="validateAndSubmit()"
                            class="flex w-full sm:w-[180px] h-[45px] items-center justify-center bg-[#111111] rounded-[10px] text-white hover:bg-[#333333] transition-colors">
                            <div class="font-semibold text-sm">Submit</div>
                        </button>
                    </div>
                </form>

                <!-- Custom Alert Modal -->
                <div id="alertModal"
                    class="hidden fixed inset-0 z-[10000] flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300">
                    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 transform transition-all duration-300 scale-95"
                        id="alertContent">
                        <div class="flex flex-col items-center gap-5">
                            <!-- Icon -->
                            <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>

                            <!-- Content -->
                            <div class="text-center">
                                <h3 class="font-semibold text-[#111111] text-lg mb-2">Validation Error</h3>
                                <p id="alertMessage" class="font-normal text-[#7d7d7d] text-sm leading-relaxed"></p>
                            </div>

                            <!-- Button -->
                            <button onclick="closeAlert()"
                                class="flex w-full h-[45px] items-center justify-center bg-[#111111] rounded-[10px] text-white hover:bg-[#333333] transition-colors focus:outline-none focus:ring-2 focus:ring-[#111111] focus:ring-offset-2">
                                <div class="font-semibold text-sm">OK</div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Calendar Popup -->
                <div id="calendarPopup" class="hidden z-[9999] w-[320px] bg-white rounded-2xl shadow-lg p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <div id="month-short" class="text-lg font-semibold w-20 text-center">Apr</div>
                        <div class="flex-1 flex gap-2 items-center">
                            <select id="year-select"
                                class="w-28 p-2 border-none rounded-lg bg-white focus:outline-none"></select>
                        </div>
                        <button id="prev-btn" aria-label="Previous month" class="p-2 rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="next-btn" aria-label="Next month" class="p-2 rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    <div class="grid grid-cols-7 text-center text-xs font-medium text-gray-600 mb-2">
                        <div>S</div>
                        <div>M</div>
                        <div>T</div>
                        <div>W</div>
                        <div>T</div>
                        <div>F</div>
                        <div>S</div>
                    </div>

                    <div id="dates-grid" class="grid grid-cols-7 gap-2"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ==================== UTILITY FUNCTIONS ====================
        function pad(n) {
            return n < 10 ? '0' + n : '' + n;
        }

        function formatISO(d) {
            if (!d) return '';
            return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
        }

        function stripTime(d) {
            return new Date(d.getFullYear(), d.getMonth(), d.getDate());
        }

        // ==================== CUSTOM ALERT MODAL ====================
        function showAlert(message) {
            const modal = document.getElementById('alertModal');
            const content = document.getElementById('alertContent');
            const messageEl = document.getElementById('alertMessage');

            messageEl.textContent = message;
            modal.classList.remove('hidden');

            setTimeout(() => {
                modal.classList.add('opacity-100');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        }

        function closeAlert() {
            const modal = document.getElementById('alertModal');
            const content = document.getElementById('alertContent');

            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            modal.classList.remove('opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        document.getElementById('alertModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAlert();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('alertModal');
                if (modal && !modal.classList.contains('hidden')) {
                    closeAlert();
                }
            }
        });

        // ==================== FORM VALIDATION ====================
        function validateAndSubmit() {
            const userId = document.getElementById('user_id').value;
            const leaveCategory = document.getElementById('leave_category').value;
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;
            const description = document.getElementById('description').value.trim();

            if (!userId) {
                showAlert('Silakan pilih user terlebih dahulu.');
                return;
            }

            if (!leaveCategory) {
                showAlert('Silakan pilih jenis cuti terlebih dahulu.');
                return;
            }

            if (!startDate || !endDate) {
                showAlert('Silakan pilih tanggal mulai dan akhir cuti.');
                return;
            }

            if (!description) {
                showAlert('Silakan isi deskripsi cuti.');
                return;
            }

            document.getElementById('leaveForm').submit();
        }

        // ==================== USER DROPDOWN ====================
        const userBtn = document.getElementById('userBtn');
        const dropdownUser = document.getElementById('dropdownUser');
        const userSelectedText = document.getElementById('userSelectedText');
        const userInput = document.getElementById('user_id');
        const userArrow = document.getElementById('userArrow');

        userBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isHidden = dropdownUser.classList.contains('hidden');
            dropdownUser.classList.toggle('hidden');
            userBtn.setAttribute('aria-expanded', String(!isHidden));
            
            // Rotate arrow icon
            if (isHidden) {
                userArrow.style.transform = 'rotate(180deg)';
            } else {
                userArrow.style.transform = 'rotate(0deg)';
            }

            // Close category dropdown if open
            if (!dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.add('hidden');
                categoryBtn.setAttribute('aria-expanded', 'false');
                categoryArrow.style.transform = 'rotate(0deg)';
            }
        });

        dropdownUser.querySelectorAll('.user-option').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.stopPropagation();
                const id = el.getAttribute('data-id');
                const name = el.getAttribute('data-name');
                userInput.value = id;
                userSelectedText.textContent = name;
                dropdownUser.classList.add('hidden');
                userBtn.setAttribute('aria-expanded', 'false');
                userArrow.style.transform = 'rotate(0deg)';
            });
        });

        dropdownUser.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // ==================== CATEGORY DROPDOWN ====================
        const categoryBtn = document.getElementById('categoryBtn');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const categorySelectedText = document.getElementById('categorySelectedText');
        const leaveCategoryInput = document.getElementById('leave_category');
        const categoryArrow = document.getElementById('categoryArrow');

        categoryBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isHidden = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden');
            categoryBtn.setAttribute('aria-expanded', String(!isHidden));
            
            // Rotate arrow icon
            if (isHidden) {
                categoryArrow.style.transform = 'rotate(180deg)';
            } else {
                categoryArrow.style.transform = 'rotate(0deg)';
            }

            // Close user dropdown if open
            if (!dropdownUser.classList.contains('hidden')) {
                dropdownUser.classList.add('hidden');
                userBtn.setAttribute('aria-expanded', 'false');
                userArrow.style.transform = 'rotate(0deg)';
            }
        });

        dropdownMenu.querySelectorAll('.option-item').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.stopPropagation();
                const val = el.getAttribute('data-value');
                leaveCategoryInput.value = val;
                categorySelectedText.textContent = val;
                dropdownMenu.classList.add('hidden');
                categoryBtn.setAttribute('aria-expanded', 'false');
                categoryArrow.style.transform = 'rotate(0deg)';
            });
        });

        dropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // ==================== CLOSE DROPDOWNS ON OUTSIDE CLICK ====================
        document.addEventListener('click', function() {
            if (!dropdownUser.classList.contains('hidden')) {
                dropdownUser.classList.add('hidden');
                userBtn.setAttribute('aria-expanded', 'false');
                userArrow.style.transform = 'rotate(0deg)';
            }
            if (!dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.add('hidden');
                categoryBtn.setAttribute('aria-expanded', 'false');
                categoryArrow.style.transform = 'rotate(0deg)';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!dropdownUser.classList.contains('hidden')) {
                    dropdownUser.classList.add('hidden');
                    userBtn.setAttribute('aria-expanded', 'false');
                    userArrow.style.transform = 'rotate(0deg)';
                }
                if (!dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.add('hidden');
                    categoryBtn.setAttribute('aria-expanded', 'false');
                    categoryArrow.style.transform = 'rotate(0deg)';
                }
            }
        });

        // ==================== IMAGE UPLOAD & PREVIEW ====================
        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');

        function uploadPicture() {
            fileInput.click();
        }

        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        function removeImage() {
            fileInput.value = '';
            imagePreviewContainer.classList.add('hidden');
            imagePreview.src = '';
        }

        // ==================== RADIO BUTTON STYLING ====================
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const groupName = this.name;

                document.querySelectorAll(`input[name="${groupName}"]`).forEach(r => {
                    const indicator = r.parentElement.querySelector('.radio-indicator');
                    const dot = r.parentElement.querySelector('.radio-dot');

                    indicator.classList.remove('border-[#FFB800]');
                    indicator.classList.add('border-gray-300');
                    dot.classList.remove('opacity-100');
                    dot.classList.add('opacity-0');
                });

                if (this.checked) {
                    const indicator = this.parentElement.querySelector('.radio-indicator');
                    const dot = this.parentElement.querySelector('.radio-dot');

                    indicator.classList.remove('border-gray-300');
                    indicator.classList.add('border-[#FFB800]');
                    dot.classList.remove('opacity-0');
                    dot.classList.add('opacity-100');
                }
            });
        });

        // ==================== CALENDAR LOGIC ====================
        document.addEventListener('DOMContentLoaded', () => {
            const monthShortNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                'Dec'
            ];
            const calendarPopup = document.getElementById('calendarPopup');
            const monthShortEl = document.getElementById('month-short');
            const yearSelect = document.getElementById('year-select');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const datesGrid = document.getElementById('dates-grid');
            const startInput = document.getElementById('start-date');
            const endInput = document.getElementById('end-date');

            if (calendarPopup && calendarPopup.parentElement !== document.body) {
                document.body.appendChild(calendarPopup);
            }

            let viewDate = new Date();
            let startDate = null;
            let endDate = null;
            let activeInput = null;

            function initYear() {
                yearSelect.innerHTML = '';
                const currentYear = new Date().getFullYear();
                for (let y = currentYear - 50; y <= currentYear + 50; y++) {
                    const opt = document.createElement('option');
                    opt.value = y;
                    opt.textContent = y;
                    yearSelect.appendChild(opt);
                }
            }

            function updateDropdowns() {
                yearSelect.value = viewDate.getFullYear();
                monthShortEl.textContent = monthShortNames[viewDate.getMonth()];
            }

            function render() {
                const year = viewDate.getFullYear();
                const month = viewDate.getMonth();
                updateDropdowns();
                datesGrid.innerHTML = '';

                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                for (let i = 0; i < firstDay; i++) {
                    const cell = document.createElement('div');
                    cell.className = 'w-10 h-10 rounded-full text-center text-sm text-gray-300';
                    datesGrid.appendChild(cell);
                }

                for (let d = 1; d <= daysInMonth; d++) {
                    const cell = document.createElement('button');
                    cell.type = 'button';
                    cell.className =
                        'w-10 h-10 rounded-full text-center text-sm flex items-center justify-center focus:outline-none hover:bg-gray-100 transition-colors';
                    cell.textContent = d;
                    const cellDate = new Date(year, month, d);

                    const today = new Date();
                    if (d === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                        cell.classList.add('font-semibold');
                        cell.style.boxShadow = 'inset 0 0 0 1px rgba(0,0,0,0.1)';
                    }

                    if (startDate && endDate) {
                        const s = stripTime(startDate).getTime();
                        const e = stripTime(endDate).getTime();
                        const t = stripTime(cellDate).getTime();
                        if (t >= s && t <= e) {
                            cell.classList.add('bg-blue-100');
                        }
                    }

                    if (startDate && stripTime(startDate).getTime() === stripTime(cellDate).getTime()) {
                        cell.classList.remove('bg-blue-100');
                        cell.classList.add('bg-blue-500', 'text-white', 'font-semibold', 'hover:bg-blue-600');
                    }

                    if (endDate && stripTime(endDate).getTime() === stripTime(cellDate).getTime()) {
                        cell.classList.remove('bg-blue-100');
                        cell.classList.add('bg-blue-500', 'text-white', 'font-semibold', 'hover:bg-blue-600');
                    }

                    cell.addEventListener('click', () => {
                        onDateClick(cellDate);
                    });

                    datesGrid.appendChild(cell);
                }
            }

            function onDateClick(d) {
                if (!activeInput) return;

                if (activeInput === 'start') {
                    startDate = stripTime(d);

                    if (endDate && startDate.getTime() > endDate.getTime()) {
                        const tmp = endDate;
                        endDate = startDate;
                        startDate = tmp;
                        startInput.value = formatISO(startDate);
                        endInput.value = formatISO(endDate);
                    } else {
                        startInput.value = formatISO(startDate);
                    }
                    activeInput = 'end';
                } else {
                    endDate = stripTime(d);

                    if (startDate && startDate.getTime() > endDate.getTime()) {
                        const tmp = startDate;
                        startDate = endDate;
                        endDate = tmp;
                        startInput.value = formatISO(startDate);
                        endInput.value = formatISO(endDate);
                    } else {
                        endInput.value = formatISO(endDate);
                    }
                }

                render();

                if (startDate && endDate) {
                    hideCalendar();
                }
            }

            function showCalendarFor(inputEl) {
                activeInput = (inputEl.id === 'start-date') ? 'start' : 'end';

                calendarPopup.classList.remove('hidden');
                calendarPopup.style.visibility = 'hidden';

                const rect = inputEl.getBoundingClientRect();
                const popupW = calendarPopup.offsetWidth || 320;
                const popupH = calendarPopup.offsetHeight || 380;

                let left = rect.left + window.scrollX;
                let top = rect.bottom + window.scrollY + 8;

                if (left + popupW > window.scrollX + window.innerWidth - 12) {
                    left = window.scrollX + window.innerWidth - popupW - 12;
                }
                if (left < 12 + window.scrollX) {
                    left = 12 + window.scrollX;
                }

                if (top + popupH > window.scrollY + window.innerHeight - 12) {
                    const altTop = rect.top + window.scrollY - popupH - 8;
                    if (altTop > 8 + window.scrollY) {
                        top = altTop;
                    } else {
                        top = Math.max(8 + window.scrollY, window.scrollY + window.innerHeight - popupH - 12);
                    }
                }

                calendarPopup.style.position = 'absolute';
                calendarPopup.style.left = left + 'px';
                calendarPopup.style.top = top + 'px';

                calendarPopup.style.visibility = 'visible';
                calendarPopup.classList.remove('hidden');

                render();
            }

            function hideCalendar() {
                calendarPopup.classList.add('hidden');
                activeInput = null;
            }

            startInput.addEventListener('click', () => showCalendarFor(startInput));
            startInput.addEventListener('focus', () => showCalendarFor(startInput));
            endInput.addEventListener('click', () => showCalendarFor(endInput));
            endInput.addEventListener('focus', () => showCalendarFor(endInput));

            prevBtn.addEventListener('click', () => {
                viewDate.setMonth(viewDate.getMonth() - 1);
                render();
            });

            nextBtn.addEventListener('click', () => {
                viewDate.setMonth(viewDate.getMonth() + 1);
                render();
            });

            yearSelect.addEventListener('change', (e) => {
                viewDate.setFullYear(Number(e.target.value));
                render();
            });

            document.addEventListener('click', function(e) {
                if (calendarPopup.classList.contains('hidden')) return;
                const target = e.target;
                if (target === startInput || target === endInput) return;
                if (!calendarPopup.contains(target)) {
                    hideCalendar();
                }
            });

            window.addEventListener('resize', () => {
                if (!calendarPopup.classList.contains('hidden') && activeInput) {
                    const inp = (activeInput === 'start') ? startInput : endInput;
                    showCalendarFor(inp);
                }
            });

            window.addEventListener('scroll', () => {
                if (!calendarPopup.classList.contains('hidden') && activeInput) {
                    const inp = (activeInput === 'start') ? startInput : endInput;
                    showCalendarFor(inp);
                }
            }, true);

            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                if (radio.checked) {
                    const indicator = radio.parentElement.querySelector('.radio-indicator');
                    const dot = radio.parentElement.querySelector('.radio-dot');

                    indicator.classList.remove('border-gray-300');
                    indicator.classList.add('border-[#FFB800]');
                    dot.classList.remove('opacity-0');
                    dot.classList.add('opacity-100');
                }
            });

            initYear();
            render();
        });

        // ==================== RESET FORM ====================
        function resetForm() {
            document.getElementById('leaveForm').reset();
            document.getElementById('start-date').value = '';
            document.getElementById('end-date').value = '';
            document.getElementById('leave_category').value = '';
            document.getElementById('categorySelectedText').textContent = '-- Pilih Jenis Cuti --';
            document.getElementById('user_id').value = '';
            document.getElementById('userSelectedText').textContent = '-- Pilih User --';
            removeImage();

            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                const indicator = radio.parentElement.querySelector('.radio-indicator');
                const dot = radio.parentElement.querySelector('.radio-dot');

                if (radio.value === '0') {
                    radio.checked = true;
                    indicator.classList.remove('border-gray-300');
                    indicator.classList.add('border-[#FFB800]');
                    dot.classList.remove('opacity-0');
                    dot.classList.add('opacity-100');
                } else {
                    radio.checked = false;
                    indicator.classList.remove('border-[#FFB800]');
                    indicator.classList.add('border-gray-300');
                    dot.classList.remove('opacity-100');
                    dot.classList.add('opacity-0');
                }
            });
        }
    </script>
@endsection
@extends('karyawan/layout')
@section('title', 'Leave Submission')
@section('content')
    <!-- Main Content Section -->
    <div class="flex flex-col max-w-4xl w-full items-center gap-2.5 px-10 py-8 mx-auto bg-white rounded-2xl shadow-lg">
        <div class="flex flex-col items-start gap-8 relative self-stretch w-full">
            <div class="w-fit font-semibold text-[#111111] text-lg whitespace-nowrap">
                Leave Submission
            </div>
            <div class="flex flex-col items-center gap-12 relative self-stretch w-full">
                <form id="leaveForm" method="POST" action="{{ route('karyawan.administration.store') }}"
                    enctype="multipart/form-data" class="flex flex-col items-start gap-5 relative self-stretch w-full">
                    @csrf

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
                                        class="absolute top-0 right-0 m-2 bg-red-500 text-white rounded-full p-1 w-6 h-6 flex items-center justify-center text-xs">
                                        ×
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="file" id="fileInput" name="supporting_document" accept="image/*" class="hidden" />
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
                            <p class="font-medium text-[#7d7d7d] text-sm">Do you bring laptop? (if there is a super urgent
                                matter)</p>
                            <div
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026]">
                                <label class="inline-flex items-center gap-2.5 cursor-pointer mr-4">
                                    <input type="radio" name="bring_laptop" value="1" class="hidden">
                                    <div
                                        class="w-4 h-4 rounded-full border border-gray-400 flex items-center justify-center radio-indicator">
                                        <div class="w-2 h-2 rounded-full hidden radio-dot"></div>
                                    </div>
                                    <div class="font-medium text-[#111111] text-sm">Yes</div>
                                </label>
                                <label class="inline-flex items-center gap-2.5 cursor-pointer">
                                    <input type="radio" name="bring_laptop" value="0" class="hidden" checked>
                                    <div
                                        class="w-4 h-4 rounded-full border border-gray-400 flex items-center justify-center radio-indicator">
                                        <div class="w-2 h-2 rounded-full hidden radio-dot"></div>
                                    </div>
                                    <div class="font-medium text-[#111111] text-sm">No</div>
                                </label>
                            </div>
                        </div>

                        <!-- Contact Question -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 w-full">
                            <p class="font-medium text-[#7d7d7d] text-sm">Do you still be Contacted? (if there is super
                                urgent matter)</p>
                            <div
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026]">
                                <label class="inline-flex items-center gap-2.5 cursor-pointer mr-4">
                                    <input type="radio" name="can_be_contacted" value="1" class="hidden">
                                    <div
                                        class="w-4 h-4 rounded-full border border-gray-400 flex items-center justify-center radio-indicator">
                                        <div class="w-2 h-2 rounded-full hidden radio-dot"></div>
                                    </div>
                                    <div class="font-medium text-[#111111] text-sm">Yes</div>
                                </label>
                                <label class="inline-flex items-center gap-2.5 cursor-pointer">
                                    <input type="radio" name="can_be_contacted" value="0" class="hidden" checked>
                                    <div
                                        class="w-4 h-4 rounded-full border border-gray-400 flex items-center justify-center radio-indicator">
                                        <div class="w-2 h-2 rounded-full hidden radio-dot"></div>
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
                        <button type="submit" 
                            class="flex w-full sm:w-[180px] h-[45px] items-center justify-center bg-[#111111] rounded-[10px] text-white hover:bg-[#333333] transition-colors">
                            <div class="font-semibold text-sm">Submit</div>
                        </button>
                    </div>
                </form>

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
        // ---------- Utility ----------
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
        // ---------- Image Upload & Preview ----------
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

        // ---------- Radio Button Styling ----------
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Update all radio indicators
                document.querySelectorAll('.radio-indicator').forEach(indicator => {
                    indicator.querySelector('.radio-dot').classList.add('hidden');
                    indicator.classList.remove('border-[#111111]', 'border-2');
                });

                // Style the selected one
                if (this.checked) {
                    const indicator = this.parentElement.querySelector('.radio-indicator');
                    indicator.querySelector('.radio-dot').classList.remove('hidden');
                    indicator.classList.add('border-[#111111]', 'border-2');
                }
            });
        });

        // Initialize radio buttons
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            if (radio.checked) {
                const indicator = radio.parentElement.querySelector('.radio-indicator');
                indicator.querySelector('.radio-dot').classList.remove('hidden');
                indicator.classList.add('border-[#111111]', 'border-2');
            }
        });

        // ---------- Calendar logic + positioning fix ----------
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

            // Pindahkan popup ke body supaya tak terclip oleh parent
            if (calendarPopup && calendarPopup.parentElement !== document.body) {
                document.body.appendChild(calendarPopup);
            }

            let viewDate = new Date();
            let startDate = null;
            let endDate = null;
            let activeInput = null; // 'start' or 'end'

            function initYear() {
                yearSelect.innerHTML = '';
                const cur = new Date().getFullYear();
                for (let y = cur - 50; y <= cur + 50; y++) {
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
                        'w-10 h-10 rounded-full text-center text-sm flex items-center justify-center focus:outline-none hover:bg-gray-100';
                    cell.textContent = d;
                    const cellDate = new Date(year, month, d);
                    // today's subtle highlight
                    const today = new Date();
                    if (d === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                        cell.classList.add('font-semibold');
                        cell.style.boxShadow = 'inset 0 0 0 1px rgba(0,0,0,0.04)';
                    }

                    // selected/range
                    if (startDate && endDate) {
                        const s = stripTime(startDate).getTime();
                        const e = stripTime(endDate).getTime();
                        const t = stripTime(cellDate).getTime();
                        if (t >= s && t <= e) {
                            // middle range style
                            cell.classList.add('bg-blue-100');
                        }
                    }
                    if (startDate && stripTime(startDate).getTime() === stripTime(cellDate).getTime()) {
                        cell.classList.add('bg-blue-500', 'text-white', 'font-semibold');
                    }
                    if (endDate && stripTime(endDate).getTime() === stripTime(cellDate).getTime()) {
                        cell.classList.add('bg-blue-500', 'text-white', 'font-semibold');
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
                    // swap when necessary
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
                if (startDate && endDate) hideCalendar();
            }

            // Show calendar positioned relative to input (and avoid clipping)
            function showCalendarFor(inputEl) {
                activeInput = (inputEl.id === 'start-date') ? 'start' : 'end';
                // ensure popup is visible for measurement but hidden visually
                calendarPopup.classList.remove('hidden');
                calendarPopup.style.visibility = 'hidden'; // invisible but occupies space to measure

                // measure
                const rect = inputEl.getBoundingClientRect();
                const popupW = calendarPopup.offsetWidth || 320;
                const popupH = calendarPopup.offsetHeight || 360;

                // compute left/top in document coords
                let left = rect.left + window.scrollX;
                let top = rect.bottom + window.scrollY + 8; // place below with gap

                // if overflow right, shift left
                if (left + popupW > window.scrollX + window.innerWidth - 12) {
                    left = window.scrollX + window.innerWidth - popupW - 12;
                }
                if (left < 12 + window.scrollX) left = 12 + window.scrollX;

                // if overflow bottom, place above input
                if (top + popupH > window.scrollY + window.innerHeight - 12) {
                    const altTop = rect.top + window.scrollY - popupH - 8;
                    if (altTop > 8 + window.scrollY) top = altTop;
                    else top = Math.max(8 + window.scrollY, window.scrollY + window.innerHeight - popupH - 12);
                }

                // apply position
                calendarPopup.style.position = 'absolute';
                calendarPopup.style.left = left + 'px';
                calendarPopup.style.top = top + 'px';

                // show popup
                calendarPopup.style.visibility = 'visible';
                calendarPopup.classList.remove('hidden');

                // render contents based on viewDate
                render();
            }

            function hideCalendar() {
                calendarPopup.classList.add('hidden');
                activeInput = null;
            }

            // attach to inputs
            startInput.addEventListener('click', () => showCalendarFor(startInput));
            startInput.addEventListener('focus', () => showCalendarFor(startInput));
            endInput.addEventListener('click', () => showCalendarFor(endInput));
            endInput.addEventListener('focus', () => showCalendarFor(endInput));

            // navigation
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

            // click outside to close (works because popup appended to body)
            document.addEventListener('click', function(e) {
                if (calendarPopup.classList.contains('hidden')) return;
                const target = e.target;
                if (target === startInput || target === endInput) return;
                if (!calendarPopup.contains(target)) {
                    hideCalendar();
                }
            });

            // reposition on resize / scroll (if open)
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

            // init
            initYear();
            render();
        }); // DOMContentLoaded

        // ---------- Reset & Submit ----------
        function resetForm() {
            document.getElementById('leaveForm').reset();
            document.getElementById('start-date').value = '';
            document.getElementById('end-date').value = '';
            document.getElementById('leave_category').value = '';
            document.getElementById('selectedText').textContent = '-- Pilih Jenis Cuti --';
            removeImage();

            // Reset radio buttons
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                const indicator = radio.parentElement.querySelector('.radio-indicator');
                indicator.querySelector('.radio-dot').classList.add('hidden');
                indicator.classList.remove('border-[#111111]', 'border-2');

                if (radio.value === 'no') {
                    radio.checked = true;
                    const indicator = radio.parentElement.querySelector('.radio-indicator');
                    indicator.querySelector('.radio-dot').classList.remove('hidden');
                    indicator.classList.add('border-[#111111]', 'border-2');
                }
            });
        }

        function submitForm() {
            if (!document.getElementById('leave_category').value) {
                alert('Pilih jenis cuti terlebih dahulu.');
                return;
            }
            if (!document.getElementById('start-date').value || !document.getElementById('end-date').value) {
                alert('Pilih tanggal mulai dan akhir cuti.');
                return;
            }
            document.getElementById('leaveForm').submit();
        }
    </script>
@endsection

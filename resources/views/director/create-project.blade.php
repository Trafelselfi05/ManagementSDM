@extends('director/layout')

@section('title', 'Create New Project & SDM User')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Single form to submit project + SDM -->
        <form action="{{ route('director.project.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- New Project Section -->
                <div>
                    <!-- New Project Form -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <!-- New Project Header -->
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">New Project</h2>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="project-name" class="block text-sm font-medium text-gray-700 mb-2">Project
                                    Name</label>
                                <input type="text" id="project-name" name="name"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter project name" required>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="project-start" class="block text-sm font-medium text-gray-700 mb-2">Start
                                        Date</label>
                                    <div class="relative">
                                        <input readonly id="project-start" name="start_date" type="text"
                                            placeholder="YYYY-MM-DD"
                                            class="date-input w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 cursor-pointer" />
                                        <img id="project-start-icon"
                                            class="absolute right-4 top-1/2 -translate-y-1/2 w-[18px] h-[20px] cursor-pointer select-none"
                                            src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125.png" />
                                    </div>
                                </div>

                                <div>
                                    <label for="project-end" class="block text-sm font-medium text-gray-700 mb-2">End
                                        Date</label>
                                    <div class="relative">
                                        <input readonly id="project-end" name="deadline" type="text"
                                            placeholder="YYYY-MM-DD"
                                            class="date-input w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 cursor-pointer" />
                                        <img id="project-end-icon"
                                            class="absolute right-4 top-1/2 -translate-y-1/2 w-[18px] h-[20px] cursor-pointer select-none"
                                            src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125.png" />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="project-status" class="block text-sm font-medium text-gray-700 mb-2">Level
                                    Project</label>
                                <select id="project-status" name="level"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white bg-no-repeat bg-[position:right_1rem_center] bg-[length:12px_8px]"
                                    style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23666666\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');">
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>

                            <div>
                                <label for="project-description"
                                    class="block text-sm font-medium text-gray-700 mb-2">About</label>
                                <textarea id="project-description" name="description" rows="3"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                    placeholder="Describe the project..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SDM Section -->
                <div>
                    <!-- SDM Form -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <!-- SDM Header -->
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">SDM</h2>
                        </div>

                        <!-- Project Director Dropdown -->
                        <div class="mb-6">

                            <label for="project-director" class="block text-sm font-medium text-gray-700 mb-2">
                                Project Director
                            </label>
                            <div class="relative">
                                <select id="project-director" name="project_director"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white bg-no-repeat bg-[position:right_1rem_center] bg-[length:12px_8px]"
                                    style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23666666\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');">
                                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Team Members Selection -->
                        <div class="mb-6">
                            <label for="division-select" class="block text-sm font-medium text-gray-700 mb-2">
                                Select Division
                            </label>
                            <div class="relative mb-4">
                                <select id="division-select"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white bg-no-repeat bg-[position:right_1rem_center] bg-[length:12px_8px]"
                                    style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23666666\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');"
                                    onchange="showMembersDropdown(this.value)">
                                    <option value="">Choose Division</option>
                                    @foreach ($karyawans as $division => $members)
                                        <option value="{{ $division ?? 'Unknown' }}">{{ $division ?? 'Unknown' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Members Checkboxes (Initially Hidden) -->
                            <div id="members-container" class="hidden">
                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                    Select Team Members
                                </label>
                                <div id="members-list" class="space-y-3 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                    <!-- Checkboxes will be populated by JavaScript -->
                                </div>
                            </div>

                            <!-- Selected Members Display -->
                            <div id="selected-display" class="hidden mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Selected Members
                                </label>
                                <div id="selected-chips"
                                    class="flex flex-wrap gap-2 p-3 border border-gray-200 rounded-lg bg-white min-h-[50px]">
                                    <!-- Selected member chips will appear here -->
                                </div>
                            </div>

                            <input type="text" name="karyawan_id" id="karyawan-id" class="hidden">
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <button type="reset" onclick="resetAllSelections()"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors duration-200">
                                Reset
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 shadow-sm transition-colors duration-200">
                                Create Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Calendar Popup -->
    <div id="calendarPopup" class="hidden z-[9999] w-[320px] bg-white rounded-2xl shadow-lg p-4">
        <div class="flex items-center gap-3 mb-3">
            <div id="month-short" class="text-lg font-semibold w-20 text-center">Apr</div>
            <div class="flex-1 flex gap-2 items-center">
                <select id="year-select" class="w-28 p-2 border-none rounded-lg bg-white focus:outline-none"></select>
            </div>
            <button id="prev-btn" aria-label="Previous month" class="p-2 rounded-lg hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
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

    <style>
        /* Custom dropdown styling */
        select {
            transition: all 0.2s ease;
        }

        select:hover {
            background-color: #f9fafb;
            border-color: #d1d5db;
        }

        select:focus {
            background-color: #ffffff;
            outline: none;
        }

        /* Remove default arrow in IE */
        select::-ms-expand {
            display: none;
        }

        /* Option styling - Enhanced */
        select option {
            padding: 12px 16px;
            background-color: #ffffff;
            color: #111827;
            font-weight: 500;
            font-size: 14px;
            line-height: 1.5;
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.15s ease;
        }

        select option:first-child {
            color: #9ca3af;
            font-weight: 400;
        }

        select option:hover {
            background-color: #eff6ff;
            color: #1d4ed8;
        }

        select option:checked,
        select option:focus {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #ffffff;
            font-weight: 600;
        }

        select option:active {
            background-color: #2563eb;
            color: #ffffff;
        }

        /* Disabled option */
        select option:disabled {
            color: #d1d5db;
            background-color: #f9fafb;
            cursor: not-allowed;
        }

        /* Disabled state */
        select:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background-color: #f3f4f6;
        }

        /* Calendar input styling */
        .date-input:hover {
            border-color: #93c5fd;
        }

        /* Firefox specific option styling */
        @-moz-document url-prefix() {
            select option {
                padding: 10px 12px;
            }
        }

        /* Webkit/Chrome specific option styling */
        @supports (-webkit-appearance: none) {
            select option {
                padding: 10px 16px;
            }
        }
    </style>

    <script>
        // membersData: object where keys are division names, values are arrays of {id, name, division}
        const membersData = @json(
            $karyawans->map(function ($group) {
                return $group->map(function ($u) {
                        return ['id' => $u->id, 'name' => $u->name, 'division' => $u->division];
                    })->values();
            }));

        // State
        let selectedMembers = {}; // { memberId: { id, name, division } }
        let usedDivisions = []; // to track removed division options for reset

        // ==================== DROPDOWN ARROW ANIMATIONS ====================
        // Removed arrow animations since we're using CSS background-image for arrows

        function showMembersDropdown(division) {
            const container = document.getElementById('members-container');
            const membersList = document.getElementById('members-list');
            const divisionSelect = document.getElementById('division-select');

            if (!division || division === '') {
                container.classList.add('hidden');
                membersList.innerHTML = '';
                return;
            }

            // Find members for division (safe fallback to empty array)
            const members = membersData[division] || [];

            // Clear previous
            membersList.innerHTML = '';

            if (members.length === 0) {
                membersList.innerHTML = '<div class="text-sm text-gray-500">No members in this division.</div>';
            } else {
                // Build checkboxes
                members.forEach(member => {
                    const id = member.id;
                    const name = member.name;
                    const div = member.division || division;

                    // Check if this member already selected (preserve selection)
                    const isChecked = !!selectedMembers[id];

                    const label = document.createElement('label');
                    label.className = 'flex items-center cursor-pointer';

                    const input = document.createElement('input');
                    input.type = 'checkbox';
                    input.name = 'team_members[]';
                    input.value = id;
                    input.dataset.name = name;
                    input.dataset.division = div;
                    input.className = 'rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4';
                    if (isChecked) input.checked = true;
                    input.addEventListener('change', updateSelectedMembers);

                    const span = document.createElement('span');
                    span.className = 'ml-3 text-sm text-gray-700';
                    span.textContent = name;

                    label.appendChild(input);
                    label.appendChild(span);

                    membersList.appendChild(label);
                });
            }

            // Show container
            container.classList.remove('hidden');

            // Remove chosen division from select (so user can't re-add same division)
            const optionToRemove = divisionSelect.querySelector(`option[value="${escapeSelector(division)}"]`);
            if (optionToRemove) {
                // store removed option text/value so we can restore later if reset
                usedDivisions.push({
                    value: optionToRemove.value,
                    text: optionToRemove.textContent
                });
                optionToRemove.remove();
            }

            // Reset select to default
            divisionSelect.value = '';
        }

        function updateSelectedMembers() {
            const selectedDisplay = document.getElementById('selected-display');
            const selectedChips = document.getElementById('selected-chips');
            const karaywanId = document.getElementById('karyawan-id');

            // gather all checked checkboxes
            const checkboxes = document.querySelectorAll('input[name="team_members[]"]');

            // update selectedMembers from checkboxes currently checked
            checkboxes.forEach(cb => {
                const id = cb.value;
                const name = cb.dataset.name || (cb.nextElementSibling ? cb.nextElementSibling.textContent : '');
                const division = cb.dataset.division || '';

                if (cb.checked) {
                    selectedMembers[id] = {
                        id,
                        name,
                        division
                    };
                } else {
                    // only remove if that member is present and not checked
                    if (selectedMembers[id]) {
                        delete selectedMembers[id];
                    }
                }
            });

            // Clear previous chips
            selectedChips.innerHTML = '';

            // if no selected members -> hide display
            if (Object.keys(selectedMembers).length === 0) {
                selectedDisplay.classList.add('hidden');
                return;
            }

            selectedDisplay.classList.remove('hidden');

            // Render chips
            Object.values(selectedMembers).forEach(member => {
                const chip = document.createElement('div');
                chip.className =
                    'inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800';

                const boldDiv = document.createElement('span');
                boldDiv.className = 'font-medium';
                boldDiv.textContent = `[${member.division}]`;

                const nameSpan = document.createElement('span');
                nameSpan.className = 'ml-1';
                nameSpan.textContent = member.name;

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'ml-2 text-blue-600 hover:text-blue-800 focus:outline-none';
                btn.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                 </svg>`;
                btn.addEventListener('click', () => removeSelectedMember(member.id));

                chip.appendChild(boldDiv);
                chip.appendChild(nameSpan);
                chip.appendChild(btn);

                selectedChips.appendChild(chip);
            });

            const memberIds = Object.keys(selectedMembers);
            karaywanId.value = memberIds;
        }

        function removeSelectedMember(memberId) {
            // remove from state
            delete selectedMembers[memberId];

            // uncheck checkbox if present
            const checkbox = document.querySelector(`input[name="team_members[]"][value="${memberId}"]`);
            if (checkbox) checkbox.checked = false;

            // update UI
            updateSelectedMembers();
        }

        function resetAllSelections() {
            const divisionSelect = document.getElementById('division-select');
            const membersList = document.getElementById('members-list');

            // restore removed division options
            if (usedDivisions && usedDivisions.length > 0) {
                usedDivisions.forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt.value;
                    option.textContent = opt.text;
                    divisionSelect.appendChild(option);
                });
            }

            // clear trackers
            usedDivisions = [];
            selectedMembers = {};

            // clear UI
            membersList.innerHTML = '';
            document.getElementById('members-container').classList.add('hidden');
            document.getElementById('selected-display').classList.add('hidden');

            // reset project director and other inputs if needed (HTML reset already handles most)
            const director = document.getElementById('project-director');
            if (director) director.value = '';

            // Clear date inputs
            const start = document.getElementById('project-start');
            const end = document.getElementById('project-end');
            if (start) start.value = '';
            if (end) end.value = '';
        }

        // Helper to escape selector when division name has special chars
        function escapeSelector(s) {
            return CSS.escape ? CSS.escape(s) : s.replace(/([ !"#$%&'()*+,./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
    }

    // Calendar JS
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

        const startInput = document.getElementById('project-start');
        const endInput = document.getElementById('project-end');
        const startIcon = document.getElementById('project-start-icon');
        const endIcon = document.getElementById('project-end-icon');

        // Move popup to body
        if (calendarPopup && calendarPopup.parentElement !== document.body) {
            document.body.appendChild(calendarPopup);
        }

        let viewDate = new Date();
        let activeInput = null;

        function stripTime(d) {
            const nd = new Date(d);
            nd.setHours(0, 0, 0, 0);
            return nd;
        }

        function pad(n) {
            return n < 10 ? '0' + n : String(n);
        }

        function formatISO(d) {
            return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
        }

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

        function updateHeader() {
            yearSelect.value = viewDate.getFullYear();
            monthShortEl.textContent = monthShortNames[viewDate.getMonth()];
        }

        function renderCalendar() {
            const year = viewDate.getFullYear();
            const month = viewDate.getMonth();
            updateHeader();
            datesGrid.innerHTML = '';

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                const cell = document.createElement('div');
                cell.className = 'w-10 h-10 rounded-full text-center text-sm text-gray-300';
                datesGrid.appendChild(cell);
            }

            const today = stripTime(new Date()).getTime();
            const currentVal = activeInput && activeInput.value ? new Date(activeInput.value) : null;
            const selectedTime = currentVal ? stripTime(currentVal).getTime() : null;

            for (let d = 1; d <= daysInMonth; d++) {
                const cell = document.createElement('button');
                cell.type = 'button';
                cell.className =
                    'w-10 h-10 rounded-full text-center text-sm flex items-center justify-center focus:outline-none hover:bg-gray-100 transition';
                cell.textContent = d;

                const cellDate = new Date(year, month, d);
                const cellTime = stripTime(cellDate).getTime();

                if (cellTime === today) {
                    cell.classList.add('font-semibold');
                    cell.style.boxShadow = 'inset 0 0 0 1px rgba(0,0,0,0.05)';
                }
                if (selectedTime && cellTime === selectedTime) {
                    cell.classList.add('bg-blue-500', 'text-white', 'font-semibold');
                }

                cell.addEventListener('click', () => {
                    if (!activeInput) return;
                    activeInput.value = formatISO(cellDate);
                    hideCalendar();
                });

                datesGrid.appendChild(cell);
            }
        }

        function showCalendarFor(inputEl) {
            activeInput = inputEl;

            if (activeInput.value) {
                const parsed = new Date(activeInput.value);
                if (!isNaN(parsed.getTime())) {
                    viewDate = new Date(parsed);
                }
            }

            calendarPopup.classList.remove('hidden');
            calendarPopup.style.visibility = 'hidden';

            const rect = inputEl.getBoundingClientRect();
            const popupW = calendarPopup.offsetWidth || 320;
            const popupH = calendarPopup.offsetHeight || 360;

            let left = rect.left + window.scrollX;
            let top = rect.bottom + window.scrollY + 8;

            if (left + popupW > window.scrollX + window.innerWidth - 12) {
                left = window.scrollX + window.innerWidth - popupW - 12;
            }
            if (left < 12 + window.scrollX) left = 12 + window.scrollX;

            if (top + popupH > window.scrollY + window.innerHeight - 12) {
                const altTop = rect.top + window.scrollY - popupH - 8;
                top = (altTop > 8 + window.scrollY) ? altTop : Math.max(8 + window.scrollY, window.scrollY +
                    window.innerHeight - popupH - 12);
            }

            calendarPopup.style.position = 'absolute';
            calendarPopup.style.left = left + 'px';
            calendarPopup.style.top = top + 'px';
            calendarPopup.style.visibility = 'visible';
            calendarPopup.classList.remove('hidden');

            renderCalendar();
        }

        function hideCalendar() {
            calendarPopup.classList.add('hidden');
            activeInput = null;
        }

        // Event binding for date inputs
        [startInput, endInput].forEach(inp => {
            if (!inp) return;
            inp.addEventListener('click', () => showCalendarFor(inp));
            inp.addEventListener('focus', () => showCalendarFor(inp));
        });
        if (startIcon) startIcon.addEventListener('click', () => showCalendarFor(startInput));
        if (endIcon) endIcon.addEventListener('click', () => showCalendarFor(endInput));

        // Calendar navigation
        prevBtn.addEventListener('click', () => {
            viewDate.setMonth(viewDate.getMonth() - 1);
            renderCalendar();
        });
        nextBtn.addEventListener('click', () => {
            viewDate.setMonth(viewDate.getMonth() + 1);
            renderCalendar();
        });
        yearSelect.addEventListener('change', (e) => {
            viewDate.setFullYear(Number(e.target.value));
            renderCalendar();
        });

        // Click outside to close
        document.addEventListener('click', (e) => {
            if (calendarPopup.classList.contains('hidden')) return;
            const t = e.target;
            if (t === startInput || t === endInput || t === startIcon || t === endIcon) return;
            if (!calendarPopup.contains(t)) hideCalendar();
        });

        // Reposition on resize/scroll
        const repositionIfOpen = () => {
            if (!calendarPopup.classList.contains('hidden') && activeInput) showCalendarFor(activeInput);
        };
        window.addEventListener('resize', repositionIfOpen);
        window.addEventListener('scroll', repositionIfOpen, true);

        // Init
        initYear();
        renderCalendar();

        // When the form is reset by browser default (pressing reset), also call our custom reset
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('reset', (e) => {
                // small timeout to allow HTML reset to complete
                setTimeout(() => resetAllSelections(), 10);
            });
        }
    });

    // ==================== ENHANCED DROPDOWN OPTION STYLING ====================
    document.addEventListener('DOMContentLoaded', () => {
        // Get all select elements except year-select in calendar
        const selectsToStyle = ['project-status', 'project-director', 'division-select'];

        selectsToStyle.forEach(selectId => {
            const originalSelect = document.getElementById(selectId);
            if (!originalSelect) return;

            // Create custom dropdown wrapper
            const wrapper = document.createElement('div');
            wrapper.className = 'custom-select-wrapper';
            wrapper.style.position = 'relative';
            wrapper.style.width = '100%';

            // Create custom display button
            const customDisplay = document.createElement('div');
            customDisplay.className = 'custom-select-display';
            customDisplay.style.cssText = `
                        width: 100%;
                        padding: 12px 16px;
                        border: 1px solid #e5e7eb;
                        border-radius: 8px;
                        background: white;
                        cursor: pointer;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        font-size: 14px;
                        color: #111827;
                        transition: all 0.2s ease;
                    `;

            // Create arrow icon
            const arrow = document.createElement('div');
            arrow.innerHTML =
                `<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1L6 6L11 1" stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
            arrow.style.transition = 'transform 0.2s ease';

            // Create custom dropdown list
            const customList = document.createElement('div');
            customList.className = 'custom-select-list';
            customList.style.cssText = `
                        position: absolute;
                        top: calc(100% + 4px);
                        left: 0;
                        right: 0;
                        background: white;
                        border-radius: 12px;
                        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
                        max-height: 280px;
                        overflow-y: auto;
                        z-index: 1000;
                        display: none;
                        padding: 8px;
                    `;

            // Populate options
            const selectedText = document.createElement('span');
            const options = Array.from(originalSelect.options);

            // Set initial display text
            const initialOption = options.find(opt => opt.value === originalSelect.value) || options[0];
            selectedText.textContent = initialOption.textContent;
            selectedText.style.color = initialOption.value === '' ? '#9ca3af' : '#111827';

            customDisplay.appendChild(selectedText);
            customDisplay.appendChild(arrow);

            // Create option items
            options.forEach((option, index) => {
                const optionItem = document.createElement('div');
                optionItem.className = 'custom-option';
                optionItem.textContent = option.textContent;
                optionItem.dataset.value = option.value;

                optionItem.style.cssText = `
                            padding: 12px 16px;
                            font-size: 14px;
                            color: ${index === 0 && option.value === '' ? '#9ca3af' : '#111827'};
                            cursor: pointer;
                            border-radius: 8px;
                            transition: all 0.15s ease;
                            font-weight: ${option.value === originalSelect.value && option.value !== '' ? '600' : '500'};
                            background: ${option.value === originalSelect.value && option.value !== '' ? '#eff6ff' : 'transparent'};
                        `;

                // Hover effect
                optionItem.addEventListener('mouseenter', function() {
                    if (this.dataset.value !== originalSelect.value) {
                        this.style.backgroundColor = '#f3f4f6';
                    }
                });

                optionItem.addEventListener('mouseleave', function() {
                    if (this.dataset.value !== originalSelect.value) {
                        this.style.backgroundColor = 'transparent';
                    }
                });

                // Click handler
                optionItem.addEventListener('click', function() {
                    const value = this.dataset.value;
                    originalSelect.value = value;

                    // Trigger change event on original select
                    const event = new Event('change', {
                        bubbles: true
                    });
                    originalSelect.dispatchEvent(event);

                    // Update display
                    selectedText.textContent = this.textContent;
                    selectedText.style.color = value === '' ? '#9ca3af' : '#111827';

                    // Update all options styling
                    customList.querySelectorAll('.custom-option').forEach(opt => {
                        const isSelected = opt.dataset.value === value &&
                            value !== '';
                        opt.style.fontWeight = isSelected ? '600' : '500';
                        opt.style.backgroundColor = isSelected ? '#eff6ff' :
                            'transparent';
                    });

                    // Close dropdown
                    customList.style.display = 'none';
                    arrow.style.transform = 'rotate(0deg)';
                    customDisplay.style.borderColor = '#e5e7eb';
                });

                customList.appendChild(optionItem);
            });

            // Toggle dropdown
            customDisplay.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = customList.style.display === 'block';

                // Close all other dropdowns
                document.querySelectorAll('.custom-select-list').forEach(list => {
                    list.style.display = 'none';
                });
                document.querySelectorAll('.custom-select-display').forEach(display => {
                    display.style.borderColor = '#e5e7eb';
                    display.querySelector('div').style.transform = 'rotate(0deg)';
                });

                if (!isOpen) {
                    customList.style.display = 'block';
                    arrow.style.transform = 'rotate(180deg)';
                    customDisplay.style.borderColor = '#3b82f6';
                } else {
                    customList.style.display = 'none';
                    arrow.style.transform = 'rotate(0deg)';
                    customDisplay.style.borderColor = '#e5e7eb';
                }
            });

            // Hover effect on display
            customDisplay.addEventListener('mouseenter', function() {
                if (customList.style.display !== 'block') {
                    this.style.backgroundColor = '#f9fafb';
                    this.style.borderColor = '#d1d5db';
                }
            });

            customDisplay.addEventListener('mouseleave', function() {
                if (customList.style.display !== 'block') {
                    this.style.backgroundColor = 'white';
                    this.style.borderColor = '#e5e7eb';
                }
            });

            // Close on outside click
            document.addEventListener('click', function() {
                customList.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
                customDisplay.style.borderColor = '#e5e7eb';
            });

            // Assemble custom dropdown
            wrapper.appendChild(customDisplay);
            wrapper.appendChild(customList);

            // Hide original select
            originalSelect.style.display = 'none';

            // Insert custom dropdown after original
            originalSelect.parentNode.insertBefore(wrapper, originalSelect.nextSibling);
        });

        // Custom scrollbar for dropdown lists
        const style = document.createElement('style');
        style.textContent = `
                    .custom-select-list::-webkit-scrollbar {
                        width: 6px;
                    }
                    .custom-select-list::-webkit-scrollbar-track {
                        background: #f1f1f1;
                        border-radius: 10px;
                    }
                    .custom-select-list::-webkit-scrollbar-thumb {
                        background: #cbd5e1;
                        border-radius: 10px;
                    }
                    .custom-select-list::-webkit-scrollbar-thumb:hover {
                        background: #94a3b8;
                    }
                `;
            document.head.appendChild(style);
        });
    </script>
@endsection

@extends('director/layout')

@section('title', 'Edit Project & SDM User')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Single form to submit project + SDM -->
        <form action="{{ route('director.edit-project.update' , $project->id) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- New Project Section -->
                <div>
                    <!-- New Project Form -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <!-- New Project Header -->
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Edit Project</h2>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="project-name" class="block text-sm font-medium text-gray-700 mb-2">Project
                                    Name</label>
                                <input type="text" id="project-name" name="name"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter project name" required
                                    value="{{ old('name', $project->name ?? '') }}">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="project-start" class="block text-sm font-medium text-gray-700 mb-2">Start
                                        Date</label>
                                    <div class="relative">
                                        <input readonly id="project-start" name="start_date" type="text"
                                            placeholder="YYYY-MM-DD"
                                            class="date-input w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 cursor-pointer"
                                            value="{{ old('start_date', $project->start_date ?? '') }}" />
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
                                            class="date-input w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 cursor-pointer"
                                            value="{{ old('deadline', $project->deadline ?? '') }}" />
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
                                    <option value="low" {{ old('level', $project->level) == 'low' ? 'selected' : '' }}>
                                        Low</option>
                                    <option value="medium"
                                        {{ old('level', $project->level) == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ old('level', $project->level) == 'high' ? 'selected' : '' }}>
                                        High</option>
                                </select>
                            </div>

                            <div>
                                <label for="project-description"
                                    class="block text-sm font-medium text-gray-700 mb-2">About</label>
                                <textarea id="project-description" name="description" rows="3"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                    placeholder="Describe the project...">{{ old('description', $project->description ?? '') }}</textarea>
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

                            <!-- Hidden input for legacy format (comma separated) -->
                            <input type="hidden" name="karyawan_id" id="karyawan-id"
                                value="{{ implode(',', $selectedMembers) }}">
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ url()->previous() }}" type="button"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-6 py-3 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 shadow-sm transition-colors duration-200">
                                Update Project
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

        /* Option styling */
        select option {
            padding: 12px;
            background-color: #ffffff;
            color: #111827;
            font-weight: 500;
        }

        select option:hover {
            background-color: #eff6ff;
        }

        select option:checked {
            background-color: #3b82f6;
            color: #ffffff;
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
    </style>

    <script>
        const membersData = {!! $karyawans->map(function ($group) {
                return $group->map(function ($u) {
                        return ['id' => $u->id, 'name' => $u->name, 'division' => $u->division];
                    })->values();
            })->toJson() !!};

        // selected member ids from server
        const initialSelected = @json($selectedMembers ?? []);

        // State
        let selectedMembers = {}; // { memberId: { id, name, division } }
        let usedDivisions = []; // to track removed division options for reset

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
                    const isChecked = !!selectedMembers[id] || initialSelected.includes(id);

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
            // const optionToRemove = divisionSelect.querySelector(`option[value="${escapeSelector(division)}"]`);
            // if (optionToRemove) {
            //     // store removed option text/value so we can restore later if reset
            //     usedDivisions.push({
            //         value: optionToRemove.value,
            //         text: optionToRemove.textContent
            //     });
            //     optionToRemove.remove();
            // }

            // Reset select to default
            divisionSelect.value = '';

            // After rendering, make sure initialSelected checkboxes are checked & added to state
            // (updateSelectedMembers will handle building chips)
            // (But we set checked above via isChecked)
            updateSelectedMembers();
        }

        function updateSelectedMembers() {
            const selectedDisplay = document.getElementById('selected-display');
            const selectedChips = document.getElementById('selected-chips');
            const karyawanInput = document.getElementById('karyawan-id');

            // gather all checkboxes
            const checkboxes = document.querySelectorAll('input[name="team_members[]"]');

            // update selectedMembers from checkboxes currently checked
            // NOTE: preserve selections accross divisions (multiple division blocks may exist)
            checkboxes.forEach(cb => {
                const id = String(cb.value);
                const name = cb.dataset.name || (cb.nextElementSibling ? cb.nextElementSibling.textContent : '');
                const division = cb.dataset.division || '';

                if (cb.checked) {
                    selectedMembers[id] = {
                        id,
                        name,
                        division
                    };
                } else {
                    if (selectedMembers[id]) {
                        delete selectedMembers[id];
                    }
                }
            });

            // Also ensure initialSelected (if any) are included if their checkbox exists checked
            // (This is already handled above, but keep for safety.)
            initialSelected.forEach(id => {
                id = String(id);
                if (!selectedMembers[id]) {
                    // try find checkbox and add if it's checked
                    const cb = document.querySelector(`input[name="team_members[]"][value="${id}"]`);
                    if (cb && cb.checked) {
                        selectedMembers[id] = {
                            id,
                            name: cb.dataset.name || '',
                            division: cb.dataset.division || ''
                        };
                    }
                }
            });

            // Clear previous chips
            selectedChips.innerHTML = '';

            // if no selected members -> hide display
            if (Object.keys(selectedMembers).length === 0) {
                selectedDisplay.classList.add('hidden');
                karyawanInput.value = '';
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
                btn.innerHTML = ``;
                btn.addEventListener('click', () => removeSelectedMember(member.id));

                chip.appendChild(boldDiv);
                chip.appendChild(nameSpan);
                chip.appendChild(btn);

                selectedChips.appendChild(chip);
            });

            // update hidden input (comma separated)
            const memberIds = Object.keys(selectedMembers);
            karyawanInput.value = memberIds.join(',');

            // Debug
            // console.log('selectedMembers', selectedMembers, 'karyawan_id', karyawanInput.value);
        }

        function removeSelectedMember(memberId) {
            // remove from state
            memberId = String(memberId);
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

            // clear hidden karyawan_id
            const karyawanInput = document.getElementById('karyawan-id');
            if (karyawanInput) karyawanInput.value = '';
        }

        // Helper to escape selector when division name has special chars
        function escapeSelector(s) {
            return CSS.escape ? CSS.escape(s) : s.replace(/([ !"#$%&'()*+,./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
        }

        // Calendar JS + init selected members rendering
        document.addEventListener('DOMContentLoaded', () => {
            // Calendar init (kept same as in create)
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

            // --- Initialization: open divisions that contain initialSelected members ---
            // initialSelected contains array of member ids
            (function openDivisionsForInitialSelection() {
                if (!initialSelected || initialSelected.length === 0) {
                    // nothing to preselect
                    return;
                }

                // Find which divisions contain selected member ids
                const divisionsToOpen = new Set();

                Object.keys(membersData).forEach(division => {
                    const members = membersData[division] || [];
                    members.forEach(m => {
                        if (initialSelected.includes(m.id)) {
                            divisionsToOpen.add(division);
                        }
                    });
                });

                // For each division, call showMembersDropdown => this will render checkboxes and auto-check those present in initialSelected
                divisionsToOpen.forEach(div => {
                    // small timeout to allow sequential DOM updates (not strictly necessary, but safe)
                    showMembersDropdown(div);
                });

                // After rendering all, ensure updateSelectedMembers runs to reflect state & hidden input
                setTimeout(() => updateSelectedMembers(), 50);
            })();

            // When the form is reset by browser default (pressing reset), also call our custom reset
            const form = document.getElementById('create-project-form');
            if (form) {
                form.addEventListener('reset', (e) => {
                    // small timeout to allow HTML reset to complete
                    setTimeout(() => resetAllSelections(), 10);
                });
            }
        });
    </script>
@endsection

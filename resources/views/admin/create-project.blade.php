@extends('admin/layout')

@section('title', 'Create New Project & SDM User')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Single form to submit project + SDM -->
        <form action="{{ route('admin.project.store') }}" method="POST">
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
                                    <option value="">Select Project Director</option>
                                    @foreach ($directors as $director)
                                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                                    @endforeach
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        const $container = $('#members-container');
        const $membersList = $('#members-list');
        const $divisionSelect = $('#division-select');

        if (!division || division === '') {
            $container.addClass('hidden');
            $membersList.empty();
            return;
        }

        // Find members for division (safe fallback to empty array)
        const members = membersData[division] || [];

        // Clear previous
        $membersList.empty();

        if (members.length === 0) {
            $membersList.html('<div class="text-sm text-gray-500">No members in this division.</div>');
        } else {
            // Build checkboxes
            members.forEach(member => {
                const id = member.id;
                const name = member.name;
                const div = member.division || division;

                // Check if this member already selected (preserve selection)
                const isChecked = !!selectedMembers[id];

                const $label = $('<label>', {
                    class: 'flex items-center cursor-pointer'
                });

                const $input = $('<input>', {
                    type: 'checkbox',
                    name: 'team_members[]',
                    value: id,
                    'data-name': name,
                    'data-division': div,
                    class: 'rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4'
                });

                if (isChecked) $input.prop('checked', true);
                $input.on('change', updateSelectedMembers);

                const $span = $('<span>', {
                    class: 'ml-3 text-sm text-gray-700',
                    text: name
                });

                $label.append($input);
                $label.append($span);

                $membersList.append($label);
            });
        }

        // Show container
        $container.removeClass('hidden');

        // Remove chosen division from select (so user can't re-add same division)
        const $optionToRemove = $divisionSelect.find(`option[value="${escapeSelector(division)}"]`);
        if ($optionToRemove.length) {
            // store removed option text/value so we can restore later if reset
            usedDivisions.push({
                value: $optionToRemove.val(),
                text: $optionToRemove.text()
            });
            $optionToRemove.remove();
        }

        // Reset select to default
        $divisionSelect.val('');
    }

    function updateSelectedMembers() {
        const $selectedDisplay = $('#selected-display');
        const $selectedChips = $('#selected-chips');
        const $karaywanId = $('#karyawan-id');

        // gather all checked checkboxes
        const $checkboxes = $('input[name="team_members[]"]');

        // update selectedMembers from checkboxes currently checked
        $checkboxes.each(function() {
            const $cb = $(this);
            const id = $cb.val();
            const name = $cb.data('name') || ($cb.next().length ? $cb.next().text() : '');
            const division = $cb.data('division') || '';

            if ($cb.is(':checked')) {
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
        $selectedChips.empty();

        // if no selected members -> hide display
        if (Object.keys(selectedMembers).length === 0) {
            $selectedDisplay.addClass('hidden');
            return;
        }

        $selectedDisplay.removeClass('hidden');

        // Render chips
        Object.values(selectedMembers).forEach(member => {
            const $chip = $('<div>', {
                class: 'inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800'
            });

            const $boldDiv = $('<span>', {
                class: 'font-medium',
                text: `[${member.division}]`
            });

            const $nameSpan = $('<span>', {
                class: 'ml-1',
                text: member.name
            });

            const $btn = $('<button>', {
                type: 'button',
                class: 'ml-2 text-blue-600 hover:text-blue-800 focus:outline-none',
                html: `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                       </svg>`
            });

            $btn.on('click', () => removeSelectedMember(member.id));

            $chip.append($boldDiv);
            $chip.append($nameSpan);
            $chip.append($btn);

            $selectedChips.append($chip);
        });

        const memberIds = Object.keys(selectedMembers);
        $karaywanId.val(memberIds);
    }

    function removeSelectedMember(memberId) {
        // remove from state
        delete selectedMembers[memberId];

        // uncheck checkbox if present
        const $checkbox = $(`input[name="team_members[]"][value="${memberId}"]`);
        if ($checkbox.length) $checkbox.prop('checked', false);

        // update UI
        updateSelectedMembers();
    }

    function resetAllSelections() {
        const $divisionSelect = $('#division-select');
        const $membersList = $('#members-list');

        // restore removed division options
        if (usedDivisions && usedDivisions.length > 0) {
            usedDivisions.forEach(opt => {
                const $option = $('<option>', {
                    value: opt.value,
                    text: opt.text
                });
                $divisionSelect.append($option);
            });
        }

        // clear trackers
        usedDivisions = [];
        selectedMembers = {};

        // clear UI
        $membersList.empty();
        $('#members-container').addClass('hidden');
        $('#selected-display').addClass('hidden');

        // reset project director and other inputs if needed (HTML reset already handles most)
        const $director = $('#project-director');
        if ($director.length) $director.val('');

        // Clear date inputs
        const $start = $('#project-start');
        const $end = $('#project-end');
        if ($start.length) $start.val('');
        if ($end.length) $end.val('');
    }

    // Helper to escape selector when division name has special chars
    function escapeSelector(s) {
        return CSS.escape ? CSS.escape(s) : s.replace(/([ !"#$%&'()*+,./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
    }

    // Calendar JS
    $(document).ready(function() {
        const monthShortNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
            'Dec'
        ];
        const $calendarPopup = $('#calendarPopup');
        const $monthShortEl = $('#month-short');
        const $yearSelect = $('#year-select');
        const $prevBtn = $('#prev-btn');
        const $nextBtn = $('#next-btn');
        const $datesGrid = $('#dates-grid');

        const $startInput = $('#project-start');
        const $endInput = $('#project-end');
        const $startIcon = $('#project-start-icon');
        const $endIcon = $('#project-end-icon');

        // Move popup to body
        if ($calendarPopup.length && $calendarPopup.parent()[0] !== document.body) {
            $calendarPopup.appendTo('body');
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
            $yearSelect.empty();
            const cur = new Date().getFullYear();
            for (let y = cur - 50; y <= cur + 50; y++) {
                const $opt = $('<option>', {
                    value: y,
                    text: y
                });
                $yearSelect.append($opt);
            }
        }

        function updateHeader() {
            $yearSelect.val(viewDate.getFullYear());
            $monthShortEl.text(monthShortNames[viewDate.getMonth()]);
        }

        function renderCalendar() {
            const year = viewDate.getFullYear();
            const month = viewDate.getMonth();
            updateHeader();
            $datesGrid.empty();

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                const $cell = $('<div>', {
                    class: 'w-10 h-10 rounded-full text-center text-sm text-gray-300'
                });
                $datesGrid.append($cell);
            }

            const today = stripTime(new Date()).getTime();
            const currentVal = activeInput && activeInput.value ? new Date(activeInput.value) : null;
            const selectedTime = currentVal ? stripTime(currentVal).getTime() : null;

            for (let d = 1; d <= daysInMonth; d++) {
                const $cell = $('<button>', {
                    type: 'button',
                    class: 'w-10 h-10 rounded-full text-center text-sm flex items-center justify-center focus:outline-none hover:bg-gray-100 transition',
                    text: d
                });

                const cellDate = new Date(year, month, d);
                const cellTime = stripTime(cellDate).getTime();

                if (cellTime === today) {
                    $cell.addClass('font-semibold');
                    $cell.css('box-shadow', 'inset 0 0 0 1px rgba(0,0,0,0.05)');
                }
                if (selectedTime && cellTime === selectedTime) {
                    $cell.addClass('bg-blue-500 text-white font-semibold');
                }

                $cell.on('click', function() {
                    if (!activeInput) return;
                    activeInput.value = formatISO(cellDate);
                    hideCalendar();
                });

                $datesGrid.append($cell);
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

            $calendarPopup.removeClass('hidden');
            $calendarPopup.css('visibility', 'hidden');

            const rect = inputEl.getBoundingClientRect();
            const popupW = $calendarPopup.outerWidth() || 320;
            const popupH = $calendarPopup.outerHeight() || 360;

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

            $calendarPopup.css({
                position: 'absolute',
                left: left + 'px',
                top: top + 'px',
                visibility: 'visible'
            });
            $calendarPopup.removeClass('hidden');

            renderCalendar();
        }

        function hideCalendar() {
            $calendarPopup.addClass('hidden');
            activeInput = null;
        }

        // Event binding for date inputs
        [$startInput, $endInput].forEach($inp => {
            if (!$inp.length) return;
            $inp.on('click', () => showCalendarFor($inp[0]));
            $inp.on('focus', () => showCalendarFor($inp[0]));
        });
        
        if ($startIcon.length) $startIcon.on('click', () => showCalendarFor($startInput[0]));
        if ($endIcon.length) $endIcon.on('click', () => showCalendarFor($endInput[0]));

        // Calendar navigation
        $prevBtn.on('click', function() {
            viewDate.setMonth(viewDate.getMonth() - 1);
            renderCalendar();
        });
        
        $nextBtn.on('click', function() {
            viewDate.setMonth(viewDate.getMonth() + 1);
            renderCalendar();
        });
        
        $yearSelect.on('change', function(e) {
            viewDate.setFullYear(Number($(this).val()));
            renderCalendar();
        });

        // Click outside to close
        $(document).on('click', function(e) {
            if ($calendarPopup.hasClass('hidden')) return;
            const t = e.target;
            if (t === $startInput[0] || t === $endInput[0] || t === $startIcon[0] || t === $endIcon[0]) return;
            if (!$calendarPopup.is(e.target) && $calendarPopup.has(e.target).length === 0) {
                hideCalendar();
            }
        });

        // Reposition on resize/scroll
        const repositionIfOpen = () => {
            if (!$calendarPopup.hasClass('hidden') && activeInput) showCalendarFor(activeInput);
        };
        $(window).on('resize', repositionIfOpen);
        $(window).on('scroll', repositionIfOpen, true);

        // Init
        initYear();
        renderCalendar();

        // When the form is reset by browser default (pressing reset), also call our custom reset
        const $form = $('form');
        if ($form.length) {
            $form.on('reset', function(e) {
                // small timeout to allow HTML reset to complete
                setTimeout(() => resetAllSelections(), 10);
            });
        }
    });

    // ==================== ENHANCED DROPDOWN OPTION STYLING ====================
    $(document).ready(function() {
        // Get all select elements except year-select in calendar
        const selectsToStyle = ['project-status', 'project-director', 'division-select'];

        selectsToStyle.forEach(selectId => {
            const $originalSelect = $('#' + selectId);
            if (!$originalSelect.length) return;

            // Create custom dropdown wrapper
            const $wrapper = $('<div>', {
                class: 'custom-select-wrapper'
            }).css({
                position: 'relative',
                width: '100%'
            });

            // Create custom display button
            const $customDisplay = $('<div>', {
                class: 'custom-select-display'
            }).css({
                width: '100%',
                padding: '12px 16px',
                border: '1px solid #e5e7eb',
                borderRadius: '8px',
                background: 'white',
                cursor: 'pointer',
                display: 'flex',
                justifyContent: 'space-between',
                alignItems: 'center',
                fontSize: '14px',
                color: '#111827',
                transition: 'all 0.2s ease'
            });

            // Create arrow icon
            const $arrow = $('<div>').html(`<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1L6 6L11 1" stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`);
            $arrow.css('transition', 'transform 0.2s ease');

            // Create custom dropdown list
            const $customList = $('<div>', {
                class: 'custom-select-list'
            }).css({
                position: 'absolute',
                top: 'calc(100% + 4px)',
                left: 0,
                right: 0,
                background: 'white',
                borderRadius: '12px',
                boxShadow: '0 10px 25px rgba(0, 0, 0, 0.15)',
                maxHeight: '280px',
                overflowY: 'auto',
                zIndex: 1000,
                display: 'none',
                padding: '8px'
            });

            // Populate options
            const $selectedText = $('<span>');
            const options = $originalSelect.find('option').toArray();
            
            // Set initial display text
            const initialOption = options.find(opt => opt.value === $originalSelect.val()) || options[0];
            $selectedText.text(initialOption.textContent);
            $selectedText.css('color', initialOption.value === '' ? '#9ca3af' : '#111827');

            $customDisplay.append($selectedText);
            $customDisplay.append($arrow);

            // Create option items
            options.forEach((option, index) => {
                const $optionItem = $('<div>', {
                    class: 'custom-option',
                    text: option.textContent
                }).data('value', option.value);
                
                $optionItem.css({
                    padding: '12px 16px',
                    fontSize: '14px',
                    color: (index === 0 && option.value === '') ? '#9ca3af' : '#111827',
                    cursor: 'pointer',
                    borderRadius: '8px',
                    transition: 'all 0.15s ease',
                    fontWeight: (option.value === $originalSelect.val() && option.value !== '') ? '600' : '500',
                    background: (option.value === $originalSelect.val() && option.value !== '') ? '#eff6ff' : 'transparent'
                });

                // Hover effect
                $optionItem.on('mouseenter', function() {
                    if ($(this).data('value') !== $originalSelect.val()) {
                        $(this).css('backgroundColor', '#f3f4f6');
                    }
                });

                $optionItem.on('mouseleave', function() {
                    if ($(this).data('value') !== $originalSelect.val()) {
                        $(this).css('backgroundColor', 'transparent');
                    }
                });

                // Click handler
                $optionItem.on('click', function() {
                    const value = $(this).data('value');
                    $originalSelect.val(value);
                    
                    // Trigger change event on original select
                    $originalSelect.trigger('change');

                    // Update display
                    $selectedText.text($(this).text());
                    $selectedText.css('color', value === '' ? '#9ca3af' : '#111827');

                    // Update all options styling
                    $customList.find('.custom-option').each(function() {
                        const $opt = $(this);
                        const isSelected = $opt.data('value') === value && value !== '';
                        $opt.css({
                            fontWeight: isSelected ? '600' : '500',
                            backgroundColor: isSelected ? '#eff6ff' : 'transparent'
                        });
                    });

                    // Close dropdown
                    $customList.hide();
                    $arrow.css('transform', 'rotate(0deg)');
                    $customDisplay.css('borderColor', '#e5e7eb');
                });

                $customList.append($optionItem);
            });

            // Toggle dropdown
            $customDisplay.on('click', function(e) {
                e.stopPropagation();
                const isOpen = $customList.is(':visible');
                
                // Close all other dropdowns
                $('.custom-select-list').hide();
                $('.custom-select-display').each(function() {
                    $(this).css('borderColor', '#e5e7eb');
                    $(this).find('div').last().css('transform', 'rotate(0deg)');
                });

                if (!isOpen) {
                    $customList.show();
                    $arrow.css('transform', 'rotate(180deg)');
                    $customDisplay.css('borderColor', '#3b82f6');
                } else {
                    $customList.hide();
                    $arrow.css('transform', 'rotate(0deg)');
                    $customDisplay.css('borderColor', '#e5e7eb');
                }
            });

            // Hover effect on display
            $customDisplay.on('mouseenter', function() {
                if (!$customList.is(':visible')) {
                    $(this).css({
                        backgroundColor: '#f9fafb',
                        borderColor: '#d1d5db'
                    });
                }
            });

            $customDisplay.on('mouseleave', function() {
                if (!$customList.is(':visible')) {
                    $(this).css({
                        backgroundColor: 'white',
                        borderColor: '#e5e7eb'
                    });
                }
            });

            // Close on outside click
            $(document).on('click', function() {
                $customList.hide();
                $arrow.css('transform', 'rotate(0deg)');
                $customDisplay.css('borderColor', '#e5e7eb');
            });

            // Assemble custom dropdown
            $wrapper.append($customDisplay);
            $wrapper.append($customList);

            // Hide original select
            $originalSelect.hide();

            // Insert custom dropdown after original
            $originalSelect.after($wrapper);
        });

        // Custom scrollbar for dropdown lists
        const $style = $('<style>').text(`
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
        `);
        $('head').append($style);
    });
</script>
@endsection
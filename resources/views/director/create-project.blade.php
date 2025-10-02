@extends('director/layout')

@section('title', 'Create New Project & SDM User')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- New Project Section -->
            <div>
                <!-- New Project Form -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <!-- New Project Header INSIDE the form -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">New Project</h2>
                    </div>

                    <form action="#" method="POST">
                        @csrf

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
                                        <input readonly id="project-end" name="end_date" type="text"
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
                                <select id="project-status" name="status"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white bg-no-repeat bg-[position:right_1rem_center] bg-[length:12px_8px]"
                                    style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23666666\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');">
                                    <option value="planning">Low</option>
                                    <option value="in_progress">Medium</option>
                                    <option value="on_hold">High</option>
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
                    </form>
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

                    <form action="#" method="POST">
                        @csrf

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
                                    <option value="m_reza_adi_w">M. Reza Adi W</option>
                                    <option value="ts">Ts</option>
                                    <option value="kv">Kv</option>
                                </select>
                            </div>
                        </div>

                        <!-- Team Members Selection -->
                        <div class="mb-6">
                            <label for="division-select" class="block text-sm font-medium text-gray-700 mb-2">
                                Select Division
                            </label>
                            <div class="relative mb-4">
                                <select id="division-select" name="division"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white bg-no-repeat bg-[position:right_1rem_center] bg-[length:12px_8px]"
                                    style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23666666\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');"
                                    onchange="showMembersDropdown(this.value)">
                                    <option value="">Choose Division</option>
                                    <option value="engineer_web">Engineer Web</option>
                                    <option value="analis">Analis</option>
                                    <option value="engineer_android">Engineer Android</option>
                                    <option value="content_creator">Content Creator</option>
                                    <option value="engineer_ios">Engineer IOS</option>
                                    <option value="copywriter">Copywriter</option>
                                    <option value="uiux">UI/UX</option>
                                    <option value="tester">Tester</option>
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
                    </form>
                </div>
            </div>
        </div>
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
        const membersData = {
            engineer_web: [{
                    value: 'engineer_web_john',
                    text: 'John Doe'
                },
                {
                    value: 'engineer_web_sarah',
                    text: 'Sarah Williams'
                },
                {
                    value: 'engineer_web_michael',
                    text: 'Michael Chen'
                },
                {
                    value: 'engineer_web_emma',
                    text: 'Emma Rodriguez'
                }
            ],
            analis: [{
                    value: 'analis_robert',
                    text: 'Robert Davis'
                },
                {
                    value: 'analis_maria',
                    text: 'Maria Garcia'
                },
                {
                    value: 'analis_kevin',
                    text: 'Kevin Brown'
                },
                {
                    value: 'analis_jessica',
                    text: 'Jessica Wilson'
                }
            ],
            engineer_android: [{
                    value: 'engineer_android_alex',
                    text: 'Alex Johnson'
                },
                {
                    value: 'engineer_android_priya',
                    text: 'Priya Patel'
                },
                {
                    value: 'engineer_android_james',
                    text: 'James Anderson'
                },
                {
                    value: 'engineer_android_lisa',
                    text: 'Lisa Zhang'
                }
            ],
            content_creator: [{
                    value: 'content_creator_olivia',
                    text: 'Olivia Brown'
                },
                {
                    value: 'content_creator_ethan',
                    text: 'Ethan Taylor'
                },
                {
                    value: 'content_creator_sophia',
                    text: 'Sophia Martinez'
                },
                {
                    value: 'content_creator_noah',
                    text: 'Noah Anderson'
                }
            ],
            engineer_ios: [{
                    value: 'engineer_ios_liam',
                    text: 'Liam Wilson'
                },
                {
                    value: 'engineer_ios_ava',
                    text: 'Ava Thompson'
                },
                {
                    value: 'engineer_ios_mason',
                    text: 'Mason Garcia'
                },
                {
                    value: 'engineer_ios_isabella',
                    text: 'Isabella Rodriguez'
                }
            ],
            copywriter: [{
                    value: 'copywriter_william',
                    text: 'William Lee'
                },
                {
                    value: 'copywriter_mia',
                    text: 'Mia Harris'
                },
                {
                    value: 'copywriter_benjamin',
                    text: 'Benjamin Clark'
                },
                {
                    value: 'copywriter_charlotte',
                    text: 'Charlotte Lewis'
                }
            ],
            uiux: [{
                    value: 'uiux_lucas',
                    text: 'Lucas Walker'
                },
                {
                    value: 'uiux_amelia',
                    text: 'Amelia Hall'
                },
                {
                    value: 'uiux_henry',
                    text: 'Henry Allen'
                },
                {
                    value: 'uiux_evelyn',
                    text: 'Evelyn Young'
                }
            ],
            tester: [{
                    value: 'tester_alexander',
                    text: 'Alexander King'
                },
                {
                    value: 'tester_harper',
                    text: 'Harper Wright'
                },
                {
                    value: 'tester_daniel',
                    text: 'Daniel Scott'
                },
                {
                    value: 'tester_ella',
                    text: 'Ella Green'
                }
            ]
        };

        let selectedMembers = {};
        let usedDivisions = [];

        function showMembersDropdown(division) {
            const container = document.getElementById('members-container');
            const membersList = document.getElementById('members-list');
            const divisionSelect = document.getElementById('division-select');

            if (division === '') {
                container.classList.add('hidden');
                return;
            }

            // Clear previous checkboxes
            membersList.innerHTML = '';

            // Tampilkan container
            container.classList.remove('hidden');

            // Tambahkan checkboxes berdasarkan divisi yang dipilih
            const members = membersData[division];
            members.forEach(member => {
                const checkboxContainer = document.createElement('label');
                checkboxContainer.className = 'flex items-center cursor-pointer';

                // Cek apakah member ini sudah ada di selectedMembers
                const isChecked = selectedMembers[member.value] !== undefined;

                checkboxContainer.innerHTML = `
                    <input type="checkbox" name="team_members[]" value="${member.value}" 
                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4"
                           onchange="updateSelectedMembers()" ${isChecked ? 'checked' : ''}>
                    <span class="ml-3 text-sm text-gray-700">${member.text}</span>
                `;

                membersList.appendChild(checkboxContainer);
            });

            // Hapus opsi divisi dari dropdown
            const optionToRemove = divisionSelect.querySelector(`option[value="${division}"]`);
            if (optionToRemove) {
                optionToRemove.remove();
            }

            // Tandai divisi sebagai sudah digunakan
            if (!usedDivisions.includes(division)) {
                usedDivisions.push(division);
            }

            // Reset dropdown ke default
            divisionSelect.value = '';
        }

        function updateSelectedMembers() {
            const checkboxes = document.querySelectorAll('input[name="team_members[]"]:checked');
            const selectedDisplay = document.getElementById('selected-display');
            const selectedChips = document.getElementById('selected-chips');

            // Update selectedMembers object dengan checkbox yang saat ini tercentang
            checkboxes.forEach(checkbox => {
                const memberName = checkbox.nextElementSibling.textContent;
                const memberValue = checkbox.value;
                
                // Extract division dari member value
                let divisionName = '';
                if (memberValue.startsWith('engineer_web_')) {
                    divisionName = 'Engineer Web';
                } else if (memberValue.startsWith('analis_')) {
                    divisionName = 'Analis';
                } else if (memberValue.startsWith('engineer_android_')) {
                    divisionName = 'Engineer Android';
                } else if (memberValue.startsWith('content_creator_')) {
                    divisionName = 'Content Creator';
                } else if (memberValue.startsWith('engineer_ios_')) {
                    divisionName = 'Engineer IOS';
                } else if (memberValue.startsWith('copywriter_')) {
                    divisionName = 'Copywriter';
                } else if (memberValue.startsWith('uiux_')) {
                    divisionName = 'UI/UX';
                } else if (memberValue.startsWith('tester_')) {
                    divisionName = 'Tester';
                }

                // Simpan ke selectedMembers object
                selectedMembers[memberValue] = {
                    name: memberName,
                    division: divisionName
                };
            });

            // Cek jika ada yang tidak tercentang, hapus dari selectedMembers
            const allCheckboxes = document.querySelectorAll('input[name="team_members[]"]');
            allCheckboxes.forEach(checkbox => {
                if (!checkbox.checked && selectedMembers[checkbox.value]) {
                    delete selectedMembers[checkbox.value];
                }
            });

            // Clear previous chips
            selectedChips.innerHTML = '';

            // Jika tidak ada member yang dipilih, sembunyikan display
            if (Object.keys(selectedMembers).length === 0) {
                selectedDisplay.classList.add('hidden');
                return;
            }

            // Show selected display
            selectedDisplay.classList.remove('hidden');

            // Create chips untuk semua selected members (dari object, bukan hanya yang tercentang saat ini)
            Object.entries(selectedMembers).forEach(([memberValue, memberData]) => {
                const chip = document.createElement('div');
                chip.className =
                    'inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800';
                chip.innerHTML = `
                    <span class="font-medium">[${memberData.division}]</span>
                    <span class="ml-1">${memberData.name}</span>
                    <button type="button" class="ml-2 text-blue-600 hover:text-blue-800 focus:outline-none" 
                        onclick="removeSelectedMember('${memberValue}')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                `;
                selectedChips.appendChild(chip);
            });
        }

        function removeSelectedMember(memberValue) {
            // Hapus dari selectedMembers object
            delete selectedMembers[memberValue];
            
            // Jika checkbox untuk member ini ada di DOM, uncheck
            const checkbox = document.querySelector(`input[value="${memberValue}"]`);
            if (checkbox) {
                checkbox.checked = false;
            }
            
            // Update tampilan
            updateSelectedMembers();
        }

        // Reset function for the reset button
        function resetAllSelections() {
            const divisionSelect = document.getElementById('division-select');
            const membersList = document.getElementById('members-list');

            // Simpan opsi divisi yang hilang
            const divisionsToRestore = [...usedDivisions];

            // Reset division dropdown
            divisionSelect.value = '';

            // Re-add all division options
            const divisionLabels = {
                'engineer_web': 'Engineer Web',
                'analis': 'Analis',
                'engineer_android': 'Engineer Android',
                'content_creator': 'Content Creator',
                'engineer_ios': 'Engineer IOS',
                'copywriter': 'Copywriter',
                'uiux': 'UI/UX',
                'tester': 'Tester'
            };

            divisionsToRestore.forEach(division => {
                const option = document.createElement('option');
                option.value = division;
                option.textContent = divisionLabels[division];
                divisionSelect.appendChild(option);
            });

            // Clear used divisions array
            usedDivisions = [];

            // Clear members list
            membersList.innerHTML = '';

            // Hide containers
            document.getElementById('members-container').classList.add('hidden');
            document.getElementById('selected-display').classList.add('hidden');

            // Clear selected members object
            selectedMembers = {};

            // Reset project director
            document.getElementById('project-director').value = '';

            // Reset date inputs
            document.getElementById('project-start').value = '';
            document.getElementById('project-end').value = '';
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

            // Event: input & icon -> open calendar
            [startInput, endInput].forEach(inp => {
                inp.addEventListener('click', () => showCalendarFor(inp));
                inp.addEventListener('focus', () => showCalendarFor(inp));
            });
            startIcon.addEventListener('click', () => showCalendarFor(startInput));
            endIcon.addEventListener('click', () => showCalendarFor(endInput));

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
        });
    </script>

@endsection
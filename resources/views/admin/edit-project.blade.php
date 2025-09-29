@extends('admin/layout')

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
                                    <input type="date" id="project-start" name="start_date"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>

                                <div>
                                    <label for="project-end" class="block text-sm font-medium text-gray-700 mb-2">End
                                        Date</label>
                                    <input type="date" id="project-end" name="end_date"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                </div>
                            </div>

                            <div>
                                <label for="project-status" class="block text-sm font-medium text-gray-700 mb-2">Level
                                    Project</label>
                                <select id="project-status" name="status"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                    <option value="planning">Low</option>
                                    <option value="in_progress">Medium</option>
                                    <option value="on_hold">High</option>
                                </select>
                            </div>

                            <div>
                                <label for="project-description"
                                    class="block text-sm font-medium text-gray-700 mb-2">About</label>
                                <textarea id="project-description" name="description" rows="3"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
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
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white">
                                    <option value="">Select Project Director</option>
                                    <option value="m_reza_adi_w">M. Reza Adi W</option>
                                    <option value="ts">Ts</option>
                                    <option value="kv">Kv</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Team Members Selection -->
                        <div class="mb-6">
                            <label for="division-select" class="block text-sm font-medium text-gray-700 mb-2">
                                Select Division
                            </label>
                            <div class="relative mb-4">
                                <select id="division-select" name="division"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white"
                                    onchange="showMembersDropdown(this.value)">
                                    <option value="">Choose Division</option>
                                    <option value="desain">Division Desain</option>
                                    <option value="engineer">Division Engineer</option>
                                    <option value="analyst">Division Analyst</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
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

                        <script>
                            const membersData = {
                                desain: [{
                                        value: 'desain_sarah',
                                        text: 'Sarah Williams'
                                    },
                                    {
                                        value: 'desain_michael',
                                        text: 'Michael Chen'
                                    },
                                    {
                                        value: 'desain_emma',
                                        text: 'Emma Rodriguez'
                                    },
                                    {
                                        value: 'desain_david',
                                        text: 'David Thompson'
                                    }
                                ],
                                engineer: [{
                                        value: 'engineer_alex',
                                        text: 'Alex Johnson'
                                    },
                                    {
                                        value: 'engineer_priya',
                                        text: 'Priya Patel'
                                    },
                                    {
                                        value: 'engineer_james',
                                        text: 'James Anderson'
                                    },
                                    {
                                        value: 'engineer_lisa',
                                        text: 'Lisa Zhang'
                                    }
                                ],
                                analyst: [{
                                        value: 'analyst_robert',
                                        text: 'Robert Davis'
                                    },
                                    {
                                        value: 'analyst_maria',
                                        text: 'Maria Garcia'
                                    },
                                    {
                                        value: 'analyst_kevin',
                                        text: 'Kevin Brown'
                                    },
                                    {
                                        value: 'analyst_jessica',
                                        text: 'Jessica Wilson'
                                    }
                                ]
                            };

                            let selectedMembers = [];
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

                                // Add checkboxes based on selected division
                                const members = membersData[division];
                                members.forEach(member => {
                                    const checkboxContainer = document.createElement('label');
                                    checkboxContainer.className = 'flex items-center cursor-pointer';

                                    checkboxContainer.innerHTML = `
                            <input type="checkbox" name="team_members[]" value="${member.value}" 
                                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4"
                                   onchange="updateSelectedMembers()">
                            <span class="ml-3 text-sm text-gray-700">${member.text}</span>
                        `;

                                    membersList.appendChild(checkboxContainer);
                                });

                                // Show the members container
                                container.classList.remove('hidden');

                                // Remove selected division from dropdown and mark as used
                                if (!usedDivisions.includes(division)) {
                                    usedDivisions.push(division);
                                    const optionToRemove = divisionSelect.querySelector(`option[value="${division}"]`);
                                    if (optionToRemove) {
                                        optionToRemove.remove();
                                    }

                                    // Reset dropdown to default
                                    divisionSelect.value = '';
                                }
                            }

                            function updateSelectedMembers() {
                                const checkboxes = document.querySelectorAll('input[name="team_members[]"]:checked');
                                const selectedDisplay = document.getElementById('selected-display');
                                const selectedChips = document.getElementById('selected-chips');

                                // Clear previous chips
                                selectedChips.innerHTML = '';
                                selectedMembers = [];

                                if (checkboxes.length === 0) {
                                    selectedDisplay.classList.add('hidden');
                                    return;
                                }

                                // Show selected display
                                selectedDisplay.classList.remove('hidden');

                                // Create chips for selected members
                                checkboxes.forEach(checkbox => {
                                    const memberName = checkbox.nextElementSibling.textContent;
                                    const memberValue = checkbox.value;
                                    selectedMembers.push(memberValue);

                                    // Extract division from member value
                                    let divisionName = '';
                                    if (memberValue.startsWith('desain_')) {
                                        divisionName = 'Desain';
                                    } else if (memberValue.startsWith('engineer_')) {
                                        divisionName = 'Engineer';
                                    } else if (memberValue.startsWith('analyst_')) {
                                        divisionName = 'Analyst';
                                    }

                                    const chip = document.createElement('div');
                                    chip.className =
                                    'inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800';
                                    chip.innerHTML = `
                            <span class="font-medium">[${divisionName}]</span>
                            <span class="ml-1">${memberName}</span>
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
                                const checkbox = document.querySelector(`input[value="${memberValue}"]`);
                                if (checkbox) {
                                    checkbox.checked = false;
                                }
                                updateSelectedMembers();
                            }

                            // Reset function for the reset button
                            function resetAllSelections() {
                                // Reset division dropdown
                                const divisionSelect = document.getElementById('division-select');
                                divisionSelect.value = '';

                                // Re-add all division options
                                if (usedDivisions.length > 0) {
                                    usedDivisions.forEach(division => {
                                        const option = document.createElement('option');
                                        option.value = division;

                                        switch (division) {
                                            case 'desain':
                                                option.textContent = 'Division Desain';
                                                break;
                                            case 'engineer':
                                                option.textContent = 'Division Engineer';
                                                break;
                                            case 'analyst':
                                                option.textContent = 'Division Analyst';
                                                break;
                                        }

                                        divisionSelect.appendChild(option);
                                    });
                                }

                                // Clear used divisions array
                                usedDivisions = [];

                                // Hide containers
                                document.getElementById('members-container').classList.add('hidden');
                                document.getElementById('selected-display').classList.add('hidden');

                                // Clear selected members
                                selectedMembers = [];

                                // Reset project director
                                document.getElementById('project-director').value = '';
                            }
                        </script>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <button type="reset"
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

    <script></script>

@endsection

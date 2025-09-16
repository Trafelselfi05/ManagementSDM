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
                        <h2 class="text-2xl font-bold text-gray-900">Edit Project</h2>
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
                    <!-- SDM Header INSIDE the form -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">SDM</h2>
                    </div>

                    <form action="#" method="POST">
                        @csrf

                        <div class="space-y-4 mb-6">
                            <!-- Division Selector Dropdown -->
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Team Members</label>
                                <div class="relative">
                                    <button type="button" id="dropdownButton"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-left bg-white flex items-center justify-between hover:border-gray-300 hover:shadow-sm">
                                        <span id="dropdownText" class="text-gray-500 select-none">Select Division</span>
                                        <svg id="dropdownIcon" class="w-5 h-5 text-gray-400 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    
                                    <!-- Dropdown Menu -->
                                    <div id="dropdownMenu" class="absolute z-50 w-full mt-2 bg-white border border-gray-200 rounded-xl shadow-lg opacity-0 invisible transform scale-95 transition-all duration-200 max-h-96 overflow-hidden">
                                        <!-- Division Options -->
                                        <div class="p-2 max-h-60 overflow-y-auto">
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="project-director">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Project Director</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="engineer-web">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Engineer Web</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="analyst">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Analyst</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="engineer-android">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Engineer Android</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="content-creator">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Content Creator</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="engineer-ios">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Engineer iOS</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="copywriter">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Copywriter</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="ui-ux">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">UI/UX Designer</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="division-option px-4 py-3 hover:bg-blue-50 cursor-pointer rounded-lg transition-all duration-200 border-b border-gray-100 last:border-b-0" data-division="tester">
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-gray-900">Tester</span>
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 division-check transition-opacity duration-200"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- People Selection -->
                                        <div id="peopleSelection" class="border-t border-gray-200 p-3 opacity-0 invisible transform translate-y-2 transition-all duration-200">
                                            <div class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Select Team Members:
                                            </div>
                                            <div id="peopleList" class="space-y-2 max-h-48 overflow-y-auto mb-4">
                                                <!-- People checkboxes will be inserted here -->
                                            </div>
                                            <div class="flex gap-2">
                                                <button type="button" id="confirmSelection" class="flex-1 px-4 py-2 bg-blue-500 text-white rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors duration-200 flex items-center justify-center">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Confirm
                                                </button>
                                                <button type="button" id="cancelSelection" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors duration-200">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Selected Members Display -->
                            <div id="selectedMembersDisplay" class="opacity-0 invisible transform translate-y-2 transition-all duration-300">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Selected Team Members</label>
                                <div id="selectedMembersList" class="space-y-3 max-h-60 overflow-y-auto">
                                    <!-- Selected members will be displayed here -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end space-x-4 pt-6">
                    <button type="button" onclick="resetSelection()"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                        Reset
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 transition-all duration-200 shadow-sm hover:shadow">
                        Create Project
                    </button>
                </div>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Team selection variables
    let selectedMembers = {};
    let currentDivision = null;
    let selectedDivisions = new Set();

    // Sample data structure for people in each division
    const divisionsData = {
        'project-director': [
            { id: 'pd1', name: 'Niken Nazwa S' },
            { id: 'pd2', name: 'Winda Putri Agustina' }
        ],
        'engineer-web': [
            { id: 'ew1', name: 'Reza Adi Wardana' },
            { id: 'ew2', name: 'Nizar Nur Afif' },
            { id: 'ew3', name: 'Ahmad Fauzi' }
        ],
        'analyst': [
            { id: 'an1', name: 'Sari Indah' },
            { id: 'an2', name: 'Budi Santoso' }
        ],
        'engineer-android': [
            { id: 'ea1', name: 'Dimas Pratama' },
            { id: 'ea2', name: 'Lisa Aulia' }
        ],
        'content-creator': [
            { id: 'cc1', name: 'Maya Sari' },
            { id: 'cc2', name: 'Rizki Akbar' }
        ],
        'engineer-ios': [
            { id: 'ei1', name: 'Andi Setiawan' },
            { id: 'ei2', name: 'Fitri Wulandari' }
        ],
        'copywriter': [
            { id: 'cw1', name: 'Dewi Lestari' },
            { id: 'cw2', name: 'Hendra Kusuma' }
        ],
        'ui-ux': [
            { id: 'ux1', name: 'Putri Amelia' },
            { id: 'ux2', name: 'Yoga Pratama' }
        ],
        'tester': [
            { id: 't1', name: 'Sinta Maharani' },
            { id: 't2', name: 'Bayu Wijaya' }
        ]
    };

    // Get DOM elements
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownIcon = document.getElementById('dropdownIcon');
    const dropdownText = document.getElementById('dropdownText');
    const peopleSelection = document.getElementById('peopleSelection');
    const peopleList = document.getElementById('peopleList');
    const selectedMembersDisplay = document.getElementById('selectedMembersDisplay');
    const selectedMembersList = document.getElementById('selectedMembersList');
    const confirmSelection = document.getElementById('confirmSelection');
    const cancelSelection = document.getElementById('cancelSelection');

    // Toggle dropdown with smooth animation
    function toggleDropdown(show = null) {
        const isOpen = show !== null ? show : dropdownMenu.classList.contains('opacity-0');
        
        if (isOpen) {
            // Show dropdown
            dropdownMenu.classList.remove('opacity-0', 'invisible', 'scale-95');
            dropdownMenu.classList.add('opacity-100', 'visible', 'scale-100');
            dropdownIcon.style.transform = 'rotate(180deg)';
            dropdownButton.classList.add('ring-2', 'ring-blue-500', 'border-transparent');
        } else {
            // Hide dropdown
            dropdownMenu.classList.remove('opacity-100', 'visible', 'scale-100');
            dropdownMenu.classList.add('opacity-0', 'invisible', 'scale-95');
            dropdownIcon.style.transform = 'rotate(0deg)';
            dropdownButton.classList.remove('ring-2', 'ring-blue-500', 'border-transparent');
            hidePeopleSelection();
        }
    }

    // Show people selection with animation
    function showPeopleSelection() {
        setTimeout(() => {
            peopleSelection.classList.remove('opacity-0', 'invisible', 'translate-y-2');
            peopleSelection.classList.add('opacity-100', 'visible', 'translate-y-0');
        }, 150);
    }

    // Hide people selection with animation
    function hidePeopleSelection() {
        peopleSelection.classList.remove('opacity-100', 'visible', 'translate-y-0');
        peopleSelection.classList.add('opacity-0', 'invisible', 'translate-y-2');
    }

    // Toggle dropdown
    dropdownButton.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const isCurrentlyOpen = dropdownMenu.classList.contains('opacity-100');
        
        if (!isCurrentlyOpen) {
            // Reset to division selection when opening
            hidePeopleSelection();
            updateDropdownText('Select Division', 'text-gray-500');
        }
        
        toggleDropdown(!isCurrentlyOpen);
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            toggleDropdown(false);
        }
    });

    // Prevent dropdown from closing when clicking inside
    dropdownMenu.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    // Handle division selection
    document.querySelectorAll('.division-option').forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const division = this.dataset.division;
            currentDivision = division;
            const divisionName = this.querySelector('span').textContent;
            
            // Clear previous people list
            peopleList.innerHTML = '';
            
            // Add people for this division
            if (divisionsData[division]) {
                divisionsData[division].forEach(person => {
                    const checkboxDiv = document.createElement('div');
                    checkboxDiv.className = 'flex items-center space-x-3 p-3 hover:bg-blue-50 rounded-lg transition-all duration-200 cursor-pointer';
                    
                    const isSelected = selectedMembers[division] && 
                                     selectedMembers[division].some(member => member.id === person.id);
                    
                    checkboxDiv.innerHTML = `
                        <div class="relative">
                            <input type="checkbox" id="person-${person.id}" 
                                   class="w-4 h-4 text-blue-500 border-2 border-gray-300 rounded focus:ring-2 focus:ring-blue-500 transition-colors duration-200"
                                   data-division="${division}" data-name="${person.name}" ${isSelected ? 'checked' : ''}>
                            <div class="absolute inset-0 pointer-events-none">
                                <svg class="w-4 h-4 text-white opacity-0 checkbox-check transition-opacity duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <label for="person-${person.id}" class="text-sm text-gray-700 cursor-pointer flex-1 select-none font-medium">${person.name}</label>
                    `;
                    
                    peopleList.appendChild(checkboxDiv);
                    
                    // Add click handler to the entire div
                    checkboxDiv.addEventListener('click', function(e) {
                        if (e.target.tagName !== 'INPUT') {
                            const checkbox = this.querySelector('input[type="checkbox"]');
                            checkbox.checked = !checkbox.checked;
                        }
                    });
                });
            }
            
            // Update dropdown text and show people selection
            updateDropdownText(`Select from ${divisionName}`, 'text-gray-900');
            showPeopleSelection();
        });
    });

    // Handle confirm selection
    confirmSelection.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        if (!currentDivision) return;
        
        const checkboxes = peopleList.querySelectorAll('input[type="checkbox"]:checked');
        
        if (checkboxes.length === 0) {
            showNotification('Please select at least one team member.', 'warning');
            return;
        }
        
        // Add selected members
        if (!selectedMembers[currentDivision]) {
            selectedMembers[currentDivision] = [];
        }
        
        // Clear existing members for this division
        selectedMembers[currentDivision] = [];
        
        checkboxes.forEach(checkbox => {
            const personId = checkbox.id;
            const name = checkbox.dataset.name;
            selectedMembers[currentDivision].push({ id: personId, name: name });
        });
        
        if (selectedMembers[currentDivision].length > 0) {
            selectedDivisions.add(currentDivision);
        }
        
        // Update displays
        updateSelectedDisplay();
        updateDivisionOptions();
        
        // Close dropdown
        toggleDropdown(false);
        updateDropdownText('Select Division', 'text-gray-500');
        currentDivision = null;
        
        showNotification(`Successfully added ${checkboxes.length} team members!`, 'success');
    });

    // Handle cancel selection
    cancelSelection.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        hidePeopleSelection();
        updateDropdownText('Select Division', 'text-gray-500');
        currentDivision = null;
    });

    function updateDropdownText(text, className) {
        dropdownText.textContent = text;
        dropdownText.className = className + ' select-none';
    }

    function updateSelectedDisplay() {
        const hasMembers = Object.keys(selectedMembers).length > 0 && 
                          Object.values(selectedMembers).some(members => members.length > 0);
        
        if (!hasMembers) {
            selectedMembersDisplay.classList.remove('opacity-100', 'visible', 'translate-y-0');
            selectedMembersDisplay.classList.add('opacity-0', 'invisible', 'translate-y-2');
            return;
        }
        
        selectedMembersDisplay.classList.remove('opacity-0', 'invisible', 'translate-y-2');
        selectedMembersDisplay.classList.add('opacity-100', 'visible', 'translate-y-0');
        selectedMembersList.innerHTML = '';
        
        Object.entries(selectedMembers).forEach(([division, members]) => {
            if (members.length === 0) return;
            
            const divisionDiv = document.createElement('div');
            divisionDiv.className = 'border border-gray-200 rounded-xl p-4 bg-gradient-to-r from-blue-50 to-indigo-50 hover:shadow-sm transition-all duration-200';
            
            const divisionTitle = getDivisionTitle(division);
            divisionDiv.innerHTML = `
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                        <div class="font-semibold text-gray-900">${divisionTitle}</div>
                        <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">${members.length}</span>
                    </div>
                    <button type="button" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-all duration-200" onclick="removeDivision('${division}')">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    ${members.map(member => `
                        <div class="flex items-center justify-between bg-white px-3 py-2 rounded-lg shadow-sm border border-gray-100 hover:shadow transition-all duration-200">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-700 font-medium">${member.name}</span>
                            </div>
                            <button type="button" class="text-red-400 hover:text-red-600 hover:bg-red-50 p-1 rounded transition-all duration-200" onclick="removeMember('${division}', '${member.id}')">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    `).join('')}
                </div>
            `;
            
            selectedMembersList.appendChild(divisionDiv);
        });
    }

    function updateDivisionOptions() {
        document.querySelectorAll('.division-option').forEach(option => {
            const division = option.dataset.division;
            const hasMembers = selectedDivisions.has(division) && 
                             selectedMembers[division] && 
                             selectedMembers[division].length > 0;
            
            const checkElement = option.querySelector('.division-check');
            if (hasMembers) {
                option.classList.add('bg-blue-50', 'border-blue-200');
                checkElement.classList.remove('opacity-0');
                checkElement.classList.add('opacity-100');
            } else {
                option.classList.remove('bg-blue-50', 'border-blue-200');
                checkElement.classList.remove('opacity-100');
                checkElement.classList.add('opacity-0');
            }
        });
    }

    function getDivisionTitle(division) {
        const titles = {
            'project-director': 'Project Director',
            'engineer-web': 'Engineer Web',
            'analyst': 'Analyst',
            'engineer-android': 'Engineer Android',
            'content-creator': 'Content Creator',
            'engineer-ios': 'Engineer iOS',
            'copywriter': 'Copywriter',
            'ui-ux': 'UI/UX Designer',
            'tester': 'Tester'
        };
        return titles[division] || division;
    }

    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'warning' ? 'bg-yellow-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
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

    // Global functions for removing members
    window.removeMember = function(division, memberId) {
        if (selectedMembers[division]) {
            selectedMembers[division] = selectedMembers[division].filter(member => member.id !== memberId);
            if (selectedMembers[division].length === 0) {
                delete selectedMembers[division];
                selectedDivisions.delete(division);
            }
        }
        updateSelectedDisplay();
        updateDivisionOptions();
        showNotification('Team member removed successfully!', 'success');
    };

    window.removeDivision = function(division) {
        const divisionName = getDivisionTitle(division);
        if (confirm(`Are you sure you want to remove all members from ${divisionName}?`)) {
            delete selectedMembers[division];
            selectedDivisions.delete(division);
            updateSelectedDisplay();
            updateDivisionOptions();
            showNotification(`All members from ${divisionName} removed!`, 'success');
        }
    };

    window.resetSelection = function() {
        if (Object.keys(selectedMembers).length === 0) {
            showNotification('No selections to reset.', 'info');
            return;
        }
        
        if (confirm('Are you sure you want to reset all selections?')) {
            selectedMembers = {};
            selectedDivisions.clear();
            currentDivision = null;
            updateSelectedDisplay();
            updateDivisionOptions();
            updateDropdownText('Select Division', 'text-gray-500');
            toggleDropdown(false);
            showNotification('All selections have been reset!', 'success');
        }
    };

    // Enhanced keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            toggleDropdown(false);
        }
    });

    // Initialize display
    updateSelectedDisplay();
    updateDivisionOptions();
});
</script>

@endsection
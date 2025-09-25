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
                    <!-- SDM Header INSIDE the form -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">SDM</h2>
                    </div>

                    <form action="#" method="POST">
                        @csrf

                        <!-- SDM Section -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <!-- Header -->
                            <div class="mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">SDM</h2>
                            </div>

                            <form action="#" method="POST">
                                @csrf
                                <div>
                                    <label for="project-name" class="block text-sm font-medium text-gray-700 mb-2">Project
                                        Project Director</label>
                                    <input type="text" id="project-name" name="name"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 mb-4"
                                        placeholder="Enter project name" required>
                                </div>

                                <!-- Multi Select Input -->
                                <div class="space-y-4">
                                    <label class="block text-sm font-medium text-gray-700">Select Team Members</label>
                                    <div class="relative">
                                        <!-- Searchable input -->
                                        <input type="text" id="memberSearch" placeholder="Type to search member..."
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                            oninput="filterMembers(this.value)" />

                                        <!-- Dropdown menu -->
                                        <div id="memberDropdown"
                                            class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto hidden">
                                            <!-- Options (rendered dynamically) -->
                                            @foreach ($employees as $employee)
                                                <div class="dropdown-item px-4 py-2 hover:bg-blue-50 cursor-pointer text-sm text-gray-700"
                                                    data-id="{{ $employee->id }}" data-name="{{ $employee->name }}"
                                                    onclick="selectMember(this)">
                                                    {{ $employee->name }} — <span
                                                        class="text-gray-400 text-xs">{{ $employee->division }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Selected members (chips) -->
                                    <div id="selectedMembers" class="flex flex-wrap gap-2">
                                        <!-- Chips akan muncul di sini -->
                                    </div>

                                    <!-- Hidden input untuk submit ke backend -->
                                    <input type="hidden" name="selected_ids" id="selectedIds">
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex justify-end space-x-4 pt-6">
                                    <button type="button" onclick="resetSelection()"
                                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">
                                        Reset
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-3 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 shadow-sm">
                                        Create Project
                                    </button>
                                </div>
                            </form>
                        </div>

                        <script>
                            const dropdown = document.getElementById("memberDropdown");
                            const searchInput = document.getElementById("memberSearch");
                            const selectedMembers = document.getElementById("selectedMembers");
                            const selectedIdsInput = document.getElementById("selectedIds");
                            let selected = [];

                            function filterMembers(query) {
                                dropdown.classList.remove("hidden");
                                const items = dropdown.querySelectorAll(".dropdown-item");
                                items.forEach(item => {
                                    if (item.dataset.name.toLowerCase().includes(query.toLowerCase())) {
                                        item.classList.remove("hidden");
                                    } else {
                                        item.classList.add("hidden");
                                    }
                                });
                            }

                            function selectMember(el) {
                                const id = el.dataset.id;
                                const name = el.dataset.name;
                                if (!selected.includes(id)) {
                                    selected.push(id);

                                    // buat chip
                                    const chip = document.createElement("div");
                                    chip.className = "flex items-center bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm";
                                    chip.innerHTML = `${name}
                <button type="button" class="ml-2 text-red-500 font-bold"
                onclick="removeMember('${id}', this)">×</button>`;
                                    chip.dataset.id = id;
                                    selectedMembers.appendChild(chip);
                                    updateHiddenInput();
                                }
                                searchInput.value = "";
                                dropdown.classList.add("hidden");
                            }

                            function removeMember(id, btn) {
                                selected = selected.filter(x => x !== id);
                                btn.parentElement.remove();
                                updateHiddenInput();
                            }

                            function updateHiddenInput() {
                                selectedIdsInput.value = selected.join(",");
                            }

                            function resetSelection() {
                                selected = [];
                                selectedMembers.innerHTML = "";
                                updateHiddenInput();
                            }

                            // Klik di luar → tutup dropdown
                            document.addEventListener("click", (e) => {
                                if (!dropdown.contains(e.target) && e.target !== searchInput) {
                                    dropdown.classList.add("hidden");
                                }
                            });
                        </script>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script></script>

@endsection

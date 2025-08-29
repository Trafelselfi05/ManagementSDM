@extends('admin/layout')

@section('title', 'Create New Project & SDM')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- New Project Section -->
            <div>
                <!-- New Project Form -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <!-- New Project Header INSIDE the form -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-dark">New Project</h2>
                    </div>

                    <form action="#" method="POST">
                        @csrf

                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="project-name" class="block text-sm font-medium text-gray-700 mb-2">Project
                                    Name</label>
                                <input type="text" id="project-name" name="name"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="Enter project name" required>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="project-start" class="block text-sm font-medium text-gray-700 mb-2">Start
                                        Date</label>
                                    <input type="date" id="project-start" name="start_date"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors">
                                </div>

                                <div>
                                    <label for="project-end" class="block text-sm font-medium text-gray-700 mb-2">End
                                        Date</label>
                                    <input type="date" id="project-end" name="end_date"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors">
                                </div>
                            </div>

                            <div>
                                <label for="project-status" class="block text-sm font-medium text-gray-700 mb-2">Level
                                    Project</label>
                                <select id="project-status" name="status"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors">
                                    <option value="planning">Low</option>
                                    <option value="in_progress">Medium</option>
                                    <option value="on_hold">High</option>
                                </select>
                            </div>

                            <div>
                                <label for="project-description"
                                    class="block text-sm font-medium text-gray-700 mb-2">About</label>
                                <textarea id="project-description" name="description" rows="3"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
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
                        <h2 class="text-2xl font-bold text-dark">SDM</h2>
                    </div>

                    <form action="#" method="POST">
                        @csrf

                        <div class="space-y-4 mb-6">
                            <div>
                                <label for="employee-position" class="block text-sm font-medium text-gray-700 mb-2">Project
                                    Director</label>
                                <select id="employee-position" name="position"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                    required>
                                    <option value="">Select Project Director</option>
                                    <option value="developer">Niken Nazwa S</option>
                                    <option value="designer">Winda Putri Agustina</option>
                                    <option value="manager">Reza Adi Wardana</option>
                                    <option value="analyst">Nizar Nur Afif</option>
                                </select>
                            </div>
                            <!--  Engineer Web & Analis -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="employee-position"
                                        class="block text-sm font-medium text-gray-700 mb-2">Engineer Web</label>
                                    <select id="employee-position" name="position"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                        required>
                                        <option value="">Select Engineer Web</option>
                                        <option value="developer">Niken Nazwa S</option>
                                        <option value="designer">Winda Putri Agustina</option>
                                        <option value="manager">Reza Adi Wardana</option>
                                        <option value="analyst">Nizar Nur Afif</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="employee-department"
                                        class="block text-sm font-medium text-gray-700 mb-2">Analis</label>
                                    <select id="employee-department" name="department"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                        required>
                                        <option value="">Select Analis</option>
                                        <option value="developer">Niken Nazwa S</option>
                                        <option value="designer">Winda Putri Agustina</option>
                                        <option value="manager">Reza Adi Wardana</option>
                                        <option value="analyst">Nizar Nur Afif</option>
                                    </select>
                                </div>
                            </div>

                            <!--  Engineer Android & Content Creator -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="employee-position"
                                        class="block text-sm font-medium text-gray-700 mb-2">Engineer Android</label>
                                    <select id="employee-position" name="position"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                        required>
                                        <option value="">Select Engineer Android</option>
                                        <option value="developer">Niken Nazwa S</option>
                                        <option value="designer">Winda Putri Agustina</option>
                                        <option value="manager">Reza Adi Wardana</option>
                                        <option value="analyst">Nizar Nur Afif</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="employee-department"
                                        class="block text-sm font-medium text-gray-700 mb-2">Content Creator</label>
                                    <select id="employee-department" name="department"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                        required>
                                        <option value="">Select Content Creator</option>
                                        <option value="developer">Niken Nazwa S</option>
                                        <option value="designer">Winda Putri Agustina</option>
                                        <option value="manager">Reza Adi Wardana</option>
                                        <option value="analyst">Nizar Nur Afif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--  Engineer IOS & Copywriter -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="employee-position"
                                    class="block text-sm font-medium text-gray-700 mb-2">Engineer IOS</label>
                                <select id="employee-position" name="position"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                    required>
                                    <option value="">Select Engineer IOS</option>
                                    <option value="developer">Niken Nazwa S</option>
                                    <option value="designer">Winda Putri Agustina</option>
                                    <option value="manager">Reza Adi Wardana</option>
                                    <option value="analyst">Nizar Nur Afif</option>
                                </select>
                            </div>
                            <div>
                                <label for="employee-department"
                                    class="block text-sm font-medium text-gray-700 mb-2">Copywriter</label>
                                <select id="employee-department" name="department"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                    required>
                                    <option value="">Select Copywriter</option>
                                    <option value="developer">Niken Nazwa S</option>
                                    <option value="designer">Winda Putri Agustina</option>
                                    <option value="manager">Reza Adi Wardana</option>
                                    <option value="analyst">Nizar Nur Afif</option>
                                </select>
                            </div>
                        </div>

                        <!--  Engineer IOS & Copywriter -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="employee-position"
                                    class="block text-sm font-medium text-gray-700 mb-2">UI/UX</label>
                                <select id="employee-position" name="position"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                    required>
                                    <option value="">Select UI/UX</option>
                                    <option value="developer">Niken Nazwa S</option>
                                    <option value="designer">Winda Putri Agustina</option>
                                    <option value="manager">Reza Adi Wardana</option>
                                    <option value="analyst">Nizar Nur Afif</option>
                                </select>
                            </div>
                            <div>
                                <label for="employee-department"
                                    class="block text-sm font-medium text-gray-700 mb-2">Tester</label>
                                <select id="employee-department" name="department"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                                    required>
                                    <option value="">Select Tester</option>
                                    <option value="developer">Niken Nazwa S</option>
                                    <option value="designer">Winda Putri Agustina</option>
                                    <option value="manager">Reza Adi Wardana</option>
                                    <option value="analyst">Nizar Nur Afif</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200">
                    <button type="button"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition-colors">
                        Add Employee
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

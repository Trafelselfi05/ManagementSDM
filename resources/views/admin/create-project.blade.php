@extends('admin/layout')

@section('title', 'Create New Project')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-dark">Create New Project</h1>
            <a href="{{ route('project') }}" class="text-primary hover:text-dark transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="#" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="project-name" class="block text-sm font-medium text-gray-700 mb-2">Project Name</label>
                        <input type="text" id="project-name" name="name"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                            placeholder="Enter project name" required>
                    </div>

                    <div>
                        <label for="project-client" class="block text-sm font-medium text-gray-700 mb-2">Client</label>
                        <input type="text" id="project-client" name="client"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                            placeholder="Enter client name">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="project-description"
                        class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="project-description" name="description" rows="4"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors"
                        placeholder="Describe the project..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label for="project-start" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                        <input type="date" id="project-start" name="start_date"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors">
                    </div>

                    <div>
                        <label for="project-end" class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                        <input type="date" id="project-end" name="end_date"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors">
                    </div>

                    <div>
                        <label for="project-status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="project-status" name="status"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary focus:border-primary transition-colors">
                            <option value="planning">Planning</option>
                            <option value="in_progress">In Progress</option>
                            <option value="on_hold">On Hold</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Team Members</label>
                    <div class="flex flex-wrap gap-2">
                        <div class="flex items-center bg-gray-100 rounded-full px-3 py-1">
                            <span class="text-sm">John Doe</span>
                            <button type="button" class="ml-1 text-gray-500 hover:text-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <button type="button" class="flex items-center text-primary hover:text-dark">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Member
                        </button>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('project') }}"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition-colors">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

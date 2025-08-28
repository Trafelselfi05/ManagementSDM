@extends('admin/layout')

@section('title', 'Projects')

@section('content')
<section class="w-full bg-white rounded-[20px] shadow-[0_0_4px_rgba(0,0,0,0.25)] p-8">
    <!-- Filter and Create Project Buttons -->
    <div class="flex justify-between items-center mb-8">
        <!-- Filter Button -->
        <button class="flex items-center gap-2.5 bg-[#f9f9f9] rounded-[10px] shadow-[0_0_4px_rgba(0,0,0,0.25)] px-4 py-4 hover:bg-gray-100 transition-colors">
            <svg class="w-4 h-4" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1H16M2 5H14M4 9H12M6 13H10" stroke="#7D7D7D" stroke-width="2"/>
            </svg>
            <span class="text-[#7D7D7D] text-lg font-medium">Filter</span>
        </button>
        
        <!-- Create Project Button -->
        <a href="{{ url('admin/create-project') }}" class="flex items-center gap-2.5 bg-black hover:bg-gray-800 rounded-[10px] px-5 py-3.5 transition-colors">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="text-white text-lg font-semibold">Create project</span>
        </a>
    </div>
    
    <!-- Projects Table -->
    <div class="w-full overflow-x-auto">
        <table class="w-full min-w-[1200px]">
            <!-- Table Header -->
            <thead>
                <tr class="bg-[#f5f5f5]">
                    <th class="text-left py-4 px-4 text-[#7D7D7D] text-lg font-semibold w-16">#</th>
                    <th class="text-left py-4 px-4 text-[#7D7D7D] text-lg font-semibold min-w-[250px]">Project Name</th>
                    <th class="text-center py-4 px-4 text-[#7D7D7D] text-lg font-semibold w-32">Start Date</th>
                    <th class="text-center py-4 px-4 text-[#7D7D7D] text-lg font-semibold w-32">Deadline</th>
                    <th class="text-center py-4 px-4 text-[#7D7D7D] text-lg font-semibold min-w-[180px]">Project Director</th>
                    <th class="text-center py-4 px-4 text-[#7D7D7D] text-lg font-semibold w-24">Level</th>
                    <th class="text-center py-4 px-4 text-[#7D7D7D] text-lg font-semibold w-28">Status</th>
                </tr>
            </thead>
            
            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200">
                <!-- Project Row 1 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800 font-medium text-center">1</td>
                    <td class="py-4 px-4">
                        <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                    </td>
                    <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                    <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                    <td class="py-4 px-4 text-center">
                        <div class="font-medium text-gray-800">Athena Cyntia</div>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            High
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            Running
                        </span>
                    </td>
                </tr>
                
                <!-- Project Row 2 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800 font-medium text-center">2</td>
                    <td class="py-4 px-4">
                        <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                    </td>
                    <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                    <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                    <td class="py-4 px-4 text-center">
                        <div class="font-medium text-gray-800">Athena Cyntia</div>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            High
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">
                            Maintenance
                        </span>
                    </td>
                </tr>
                
                <!-- Project Row 3 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800 font-medium text-center">3</td>
                    <td class="py-4 px-4">
                        <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                    </td>
                    <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                    <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                    <td class="py-4 px-4 text-center">
                        <div class="font-medium text-gray-800">Athena Cyntia</div>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            High
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                            Running
                        </span>
                    </td>
                </tr>
                
                <!-- Project Row 4 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800 font-medium text-center">4</td>
                    <td class="py-4 px-4">
                        <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                    </td>
                    <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                    <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                    <td class="py-4 px-4 text-center">
                        <div class="font-medium text-gray-800">Athena Cyntia</div>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            High
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                            Maintenance
                        </span>
                    </td>
                </tr>
                
                <!-- Project Row 5 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800 font-medium text-center">5</td>
                    <td class="py-4 px-4">
                        <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                    </td>
                    <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                    <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                    <td class="py-4 px-4 text-center">
                        <div class="font-medium text-gray-800">Athena Cyntia</div>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            High
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                            To do
                        </span>
                    </td>
                </tr>
                
                <!-- Project Row 6 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800 font-medium text-center">6</td>
                    <td class="py-4 px-4">
                        <div class="font-semibold text-gray-800">Wordpress Plugin Update</div>
                    </td>
                    <td class="py-4 px-4 text-center text-gray-600">Nov 4, 2024</td>
                    <td class="py-4 px-4 text-center text-gray-600">Dec 25, 2024</td>
                    <td class="py-4 px-4 text-center">
                        <div class="font-medium text-gray-800">Athena Cyntia</div>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            High
                        </span>
                    </td>
                    <td class="py-4 px-4 text-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                            To do
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
        <div class="text-sm text-gray-700">
            Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">6</span> results
        </div>
        <div class="flex gap-2">
            <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                Previous
            </button>
            <button class="px-3 py-2 text-sm font-medium text-white bg-black border border-transparent rounded-md hover:bg-gray-800">
                1
            </button>
            <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                Next
            </button>
        </div>
    </div>
</section>
@endsection
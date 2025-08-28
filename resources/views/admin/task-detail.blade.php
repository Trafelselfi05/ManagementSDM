@extends('admin/layout')

@section('content')
<div class="w-full max-w-[1800px] mx-auto">
    <!-- Main Content Container -->
    <div class="bg-white rounded-[20px] shadow-[0px_0px_4px_#00000040] p-6">
        <!-- Header with Filter and View Options -->
        <div class="flex justify-between items-center mb-6">
            <!-- Filter Button -->
            <button class="flex items-center gap-2.5 p-3 bg-[#f9f9f9] rounded-[10px] shadow-[0px_0px_4px_#00000040]">
                <svg class="w-4 h-[18px] text-[#7d7d7d]" viewBox="0 0 16 18" fill="currentColor">
                    <path d="M0 1.5C0 0.671573 0.671573 0 1.5 0H14.5C15.3284 0 16 0.671573 16 1.5C16 2.32843 15.3284 3 14.5 3H1.5C0.671573 3 0 2.32843 0 1.5ZM2 9C2 8.17157 2.67157 7.5 3.5 7.5H12.5C13.3284 7.5 14 8.17157 14 9C14 9.82843 13.3284 10.5 12.5 10.5H3.5C2.67157 10.5 2 9.82843 2 9ZM5.5 15C4.67157 15 4 15.6716 4 16.5C4 17.3284 4.67157 18 5.5 18H10.5C11.3284 18 12 17.3284 12 16.5C12 15.6716 11.3284 15 10.5 15H5.5Z"/>
                </svg>
                <span class="text-base font-medium text-[#7d7d7d]">Filter</span>
            </button>

            <!-- Task Board View Button -->
            <button class="flex items-center justify-center gap-2.5 px-5 py-3 bg-[#111111] rounded-[10px] shadow-[0px_0px_4px_#00000040]">
                <span class="text-base font-semibold text-white">Task Board View</span>
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-hidden rounded-lg border border-gray-200">
            <!-- Table Header -->
            <div class="flex items-center bg-neutral-100 h-14 px-6">
                <div class="flex-none w-16 text-center font-semibold text-[#7d7d7d] text-base">#</div>
                <div class="flex-1 min-w-0 font-semibold text-[#7d7d7d] text-base ml-4">Task Name</div>
                <div class="flex-1 min-w-0 font-semibold text-[#7d7d7d] text-base ml-4">Project</div>
                <div class="flex-none w-36 text-center font-semibold text-[#7d7d7d] text-base ml-4">Assigned Employee</div>
                <div class="flex-none w-24 text-center font-semibold text-[#7d7d7d] text-base ml-4">Level</div>
                <div class="flex-none w-28 text-center font-semibold text-[#7d7d7d] text-base ml-4">Status</div>
                <div class="flex-none w-24 text-center font-semibold text-[#7d7d7d] text-base ml-4">Created</div>
            </div>

            <!-- Table Rows -->
            <div class="divide-y divide-gray-200 bg-white">
                <!-- Row 1 -->
                <div class="flex items-center h-14 px-6">
                    <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">1</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Wordpress Plugin Update</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Website Management</div>
                    <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Athena Cyntia</div>
                    <div class="flex-none w-24 flex justify-center ml-4">
                        <span class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                    </div>
                    <div class="flex-none w-28 flex justify-center ml-4">
                        <span class="px-2 py-1 bg-neutral-100 text-[#7d7d7d] text-sm font-medium rounded-[10px]">To do</span>
                    </div>
                    <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Nov 4</div>
                </div>

                <!-- Row 2 -->
                <div class="flex items-center h-14 px-6">
                    <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">2</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Running Login View</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Online Marketplace App</div>
                    <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Ashlynn Culhane</div>
                    <div class="flex-none w-24 flex justify-center ml-4">
                        <span class="px-2.5 py-1 bg-[#6fadc8] text-white text-sm font-semibold rounded-[10px]">Low</span>
                    </div>
                    <div class="flex-none w-28 flex justify-center ml-4">
                        <span class="px-2 py-1 bg-[#ffb32d] text-white text-sm font-medium rounded-[10px]">Progress</span>
                    </div>
                    <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Nov 10</div>
                </div>

                <!-- Row 3 -->
                <div class="flex items-center h-14 px-6">
                    <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">3</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Create Website Design</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">CafeLink Menu Website</div>
                    <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Erika</div>
                    <div class="flex-none w-24 flex justify-center ml-4">
                        <span class="px-2.5 py-1 bg-[#ffb32d] text-white text-sm font-semibold rounded-[10px]">Medium</span>
                    </div>
                    <div class="flex-none w-28 flex justify-center ml-4">
                        <span class="px-2 py-1 bg-[#7db445] text-white text-sm font-medium rounded-[10px]">Complete</span>
                    </div>
                    <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Nov 25</div>
                </div>

                <!-- Row 4 -->
                <div class="flex items-center h-14 px-6">
                    <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">4</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Marketplace Display Menu</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">SiteCraft Websites</div>
                    <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Seon Woo</div>
                    <div class="flex-none w-24 flex justify-center ml-4">
                        <span class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                    </div>
                    <div class="flex-none w-28 flex justify-center ml-4">
                        <span class="px-2 py-1 bg-neutral-100 text-[#7d7d7d] text-sm font-medium rounded-[10px]">Review</span>
                    </div>
                    <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Dec 6</div>
                </div>

                <!-- Row 5 -->
                <div class="flex items-center h-14 px-6">
                    <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">5</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Dashboard Revision</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">VirtuSphere Digital Innovation</div>
                    <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Fathia</div>
                    <div class="flex-none w-24 flex justify-center ml-4">
                        <span class="px-2.5 py-1 bg-[#6fadc8] text-white text-sm font-semibold rounded-[10px]">Low</span>
                    </div>
                    <div class="flex-none w-28 flex justify-center ml-4">
                        <span class="px-2 py-1 bg-[#7db445] text-white text-sm font-medium rounded-[10px]">Complete</span>
                    </div>
                    <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Dec 12</div>
                </div>

                <!-- Row 6 -->
                <div class="flex items-center h-14 px-6">
                    <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">6</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Website Menu View</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">CafeLink Menu Website</div>
                    <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Erika</div>
                    <div class="flex-none w-24 flex justify-center ml-4">
                        <span class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                    </div>
                    <div class="flex-none w-28 flex justify-center ml-4">
                        <span class="px-2 py-1 bg-neutral-100 text-[#7d7d7d] text-sm font-medium rounded-[10px]">Review</span>
                    </div>
                    <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Dec 18</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
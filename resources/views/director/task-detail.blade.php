@extends('director/layout')

@section('title', 'Task Detail')

@section('content')
    <div class="w-full max-w-[1800px] mx-auto">
        <!-- Main Content Container -->
        <div class="bg-white rounded-[20px] shadow-[0px_0px_4px_#00000040] p-6">
            <!-- Header with Filter and View Options -->
            <div class="flex justify-between items-center mb-6">
                <!-- Filter Button -->
                <div class="flex items-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2">
                    <img class="w-6 h-6" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" />
                    <span class="text-gray-500 text-sm font-medium">Filter</span>
                </div>


                <!-- Task Board View Button -->
                <a href="{{ route('director.task') }}"
                    class="w-full sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg shadow-sm hover:bg-gray-800 transition-colors flex items-center justify-center">
                    Task Board View
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-hidden rounded-lg border border-gray-200">
                <!-- Table Header -->
                <div class="flex items-center bg-neutral-100 h-14 px-6">
                    <div class="flex-none w-16 text-center font-semibold text-[#7d7d7d] text-base">#</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#7d7d7d] text-base ml-4">Task Name</div>
                    <div class="flex-1 min-w-0 font-semibold text-[#7d7d7d] text-base ml-4">Project</div>
                    <div class="flex-none w-36 text-center font-semibold text-[#7d7d7d] text-base ml-4">Assigned Employee
                    </div>
                    <div class="flex-none w-24 text-center font-semibold text-[#7d7d7d] text-base ml-4">Level</div>
                    <div class="flex-none w-28 text-center font-semibold text-[#7d7d7d] text-base ml-4">Status</div>
                    <div class="flex-none w-24 text-center font-semibold text-[#7d7d7d] text-base ml-4">Created</div>
                </div>

                <!-- Table Rows -->
                <div class="divide-y divide-gray-200 bg-white">
                    <!-- Row 1 -->
                    <div class="flex items-center h-14 px-6 cursor-pointer task-row" data-task-id="1"
                        data-task-name="Wordpress Plugin Update" data-project="Website Management"
                        data-assignee="Athena Cyntia" data-level="High" data-status="To do" data-created="Nov 4"
                        data-timeline="25 November 2024 - 30 November 2024">
                        <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">1</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Wordpress Plugin
                            Update</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Website Management
                        </div>
                        <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Athena Cyntia
                        </div>
                        <div class="flex-none w-24 flex justify-center ml-4">
                            <span
                                class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                        </div>
                        <div class="flex-none w-28 flex justify-center ml-4">
                            <span class="px-2 py-1 bg-neutral-100 text-[#7d7d7d] text-sm font-medium rounded-[10px]">To
                                do</span>
                        </div>
                        <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Nov 4</div>
                    </div>

                    <!-- Row 2 -->
                    <div class="flex items-center h-14 px-6 cursor-pointer task-row" data-task-id="2"
                        data-task-name="Running Login View" data-project="Online Marketplace App"
                        data-assignee="Ashlynn Culhane" data-level="Low" data-status="Progress" data-created="Nov 10"
                        data-timeline="26 November 2024 - 1 December 2024">
                        <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">2</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Running Login View
                        </div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Online Marketplace
                            App</div>
                        <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Ashlynn Culhane
                        </div>
                        <div class="flex-none w-24 flex justify-center ml-4">
                            <span
                                class="px-2.5 py-1 bg-[#6fadc8] text-white text-sm font-semibold rounded-[10px]">Low</span>
                        </div>
                        <div class="flex-none w-28 flex justify-center ml-4">
                            <span
                                class="px-2 py-1 bg-[#ffb32d] text-white text-sm font-medium rounded-[10px]">Progress</span>
                        </div>
                        <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Nov 10</div>
                    </div>

                    <!-- Row 3 -->
                    <div class="flex items-center h-14 px-6 cursor-pointer task-row" data-task-id="3"
                        data-task-name="Create Website Design" data-project="CafeLink Menu Website" data-assignee="Erika"
                        data-level="Medium" data-status="Complete" data-created="Nov 25"
                        data-timeline="27 November 2024 - 2 December 2024">
                        <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">3</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Create Website
                            Design</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">CafeLink Menu
                            Website</div>
                        <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Erika</div>
                        <div class="flex-none w-24 flex justify-center ml-4">
                            <span
                                class="px-2.5 py-1 bg-[#ffb32d] text-white text-sm font-semibold rounded-[10px]">Medium</span>
                        </div>
                        <div class="flex-none w-28 flex justify-center ml-4">
                            <span
                                class="px-2 py-1 bg-[#7db445] text-white text-sm font-medium rounded-[10px]">Complete</span>
                        </div>
                        <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Nov 25</div>
                    </div>

                    <!-- Row 4 -->
                    <div class="flex items-center h-14 px-6 cursor-pointer task-row" data-task-id="4"
                        data-task-name="Marketplace Display Menu" data-project="SiteCraft Websites" data-assignee="Seon Woo"
                        data-level="High" data-status="Review" data-created="Dec 6"
                        data-timeline="28 November 2024 - 3 December 2024">
                        <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">4</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Marketplace Display
                            Menu</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">SiteCraft Websites
                        </div>
                        <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Seon Woo</div>
                        <div class="flex-none w-24 flex justify-center ml-4">
                            <span
                                class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                        </div>
                        <div class="flex-none w-28 flex justify-center ml-4">
                            <span
                                class="px-2 py-1 bg-neutral-100 text-[#7d7d7d] text-sm font-medium rounded-[10px]">Review</span>
                        </div>
                        <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Dec 6</div>
                    </div>

                    <!-- Row 5 -->
                    <div class="flex items-center h-14 px-6 cursor-pointer task-row" data-task-id="5"
                        data-task-name="Dashboard Revision" data-project="VirtuSphere Digital Innovation"
                        data-assignee="Fathia" data-level="Low" data-status="Complete" data-created="Dec 12"
                        data-timeline="29 November 2024 - 4 December 2024">
                        <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">5</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Dashboard Revision
                        </div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">VirtuSphere
                            Digital
                            Innovation</div>
                        <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Fathia</div>
                        <div class="flex-none w-24 flex justify-center ml-4">
                            <span
                                class="px-2.5 py-1 bg-[#6fadc8] text-white text-sm font-semibold rounded-[10px]">Low</span>
                        </div>
                        <div class="flex-none w-28 flex justify-center ml-4">
                            <span
                                class="px-2 py-1 bg-[#7db445] text-white text-sm font-medium rounded-[10px]">Complete</span>
                        </div>
                        <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Dec 12</div>
                    </div>

                    <!-- Row 6 -->
                    <div class="flex items-center h-14 px-6 cursor-pointer task-row" data-task-id="6"
                        data-task-name="Website Menu View" data-project="CafeLink Menu Website" data-assignee="Erika"
                        data-level="High" data-status="Review" data-created="Dec 18"
                        data-timeline="30 November 2024 - 5 December 2024">
                        <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">6</div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">Website Menu View
                        </div>
                        <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">CafeLink Menu
                            Website</div>
                        <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">Erika</div>
                        <div class="flex-none w-24 flex justify-center ml-4">
                            <span
                                class="px-2.5 py-1 bg-[#e94949] text-white text-sm font-semibold rounded-[10px]">High</span>
                        </div>
                        <div class="flex-none w-28 flex justify-center ml-4">
                            <span
                                class="px-2 py-1 bg-neutral-100 text-[#7d7d7d] text-sm font-medium rounded-[10px]">Review</span>
                        </div>
                        <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">Dec 18</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Task Detail Modal -->
    <div id="taskDetailModal" class="modal-overlay hidden">
        <div class="modal-content bg-white rounded-[20px] shadow-lg p-0 overflow-hidden w-[667px]">
            <article
                class="bg-[url('https://c.animaapp.com/mf0kcxh3ChSQMm/img/rectangle-152.svg')] bg-cover w-full h-[458px] relative"
                role="main" aria-labelledby="task-title">
                <header class="absolute w-[549px] h-6 top-[21px] left-[66px]">
                    <div class="w-[551px] h-6">
                        <div class="relative w-[549px] h-6">
                            <h1 id="task-title"
                                class="absolute w-[510px] top-0 left-0 font-medium text-[#111111] text-xl tracking-[0] leading-[normal]">
                                Task
                            </h1>
                            <div class="absolute w-[100px] h-5 top-0.5 left-[450px] flex items-center gap-4"
                                role="toolbar" aria-label="Task actions">
                                <!-- Edit Button -->
                                <button id="editTaskBtn" class="w-5 h-5 text-gray-500 hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>

                                <!-- Close Button -->
                                <button id="closeTaskModal" class="w-5 h-5 text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </header>
                <hr class="absolute w-[667px] h-px top-[60px] left-0 object-cover border-0 bg-gray-300"
                    aria-hidden="true" />
                <section class="absolute w-[529px] h-[287px] top-[98px] left-[66px]" aria-labelledby="task-details">
                    <h2 id="task-details-heading"
                        class="absolute w-[510px] top-0 left-0 font-semibold text-[#111111] text-[30px] tracking-[0] leading-[normal]">
                        Wordpress plugin update
                    </h2>
                    <div class="absolute top-[88px] left-[18px] flex items-center">
                        <div class="inline-flex items-center gap-4">
                            <svg class="w-[19px] h-[21px] text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                            <span class="font-medium text-[#7d7d7d] text-base whitespace-nowrap" id="status-label">
                                Status
                            </span>
                        </div>
                        <div id="task-status"
                            class="flex w-[78px] h-6 items-center justify-center gap-2.5 px-[19px] py-1 ml-[190px] bg-[#e94949] rounded-[20px]">
                            <span class="font-medium text-white text-sm">
                                To do
                            </span>
                        </div>
                    </div>
                    <div class="absolute top-[133px] left-[18px] flex items-center">
                        <div class="inline-flex items-center gap-4">
                            <svg class="w-[18px] h-[18px] text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z" />
                            </svg>
                            <span class="font-medium text-[#7d7d7d] text-base whitespace-nowrap" id="project-label">
                                Project
                            </span>
                        </div>
                        <div id="task-project"
                            class="absolute w-[333px] h-[19px] top-0 left-[172px] font-semibold text-[#111111] text-base">
                            Website Management Company
                        </div>
                    </div>
                    <div class="absolute top-[177px] left-[18px] flex items-center">
                        <div class="flex w-[104px] items-center gap-4">
                            <svg class="w-[18px] h-[18px] text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z" />
                            </svg>
                            <span class="font-medium text-[#7d7d7d] text-base whitespace-nowrap" id="timeline-label">
                                Timeline
                            </span>
                        </div>
                        <time id="task-timeline"
                            class="absolute w-[333px] h-[19px] top-0 left-[172px] font-semibold text-[#111111] text-base"
                            datetime="2024-11-25/2024-11-30">
                            25 November 2024 - 30 November 2024
                        </time>
                    </div>
                    <div class="absolute top-[221px] left-[18px] flex items-center">
                        <div class="flex w-[104px] items-center gap-4">
                            <svg class="w-[18px] h-[14.86px] text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                            <span class="font-medium text-[#7d7d7d] text-base whitespace-nowrap" id="assignee-label">
                                Assignee
                            </span>
                        </div>
                        <div class="absolute top-[-5px] left-[172px] flex items-center" aria-labelledby="assignee-label">
                            <div class="w-7 h-7 rounded-full bg-gray-200 flex items-center justify-center mr-2">
                                <span class="text-xs font-semibold text-gray-600" id="assignee-initial">A</span>
                            </div>
                            <span id="task-assignee" class="font-semibold text-[#111111] text-base">Athena Cyntia</span>
                        </div>
                    </div>
                    <div class="absolute top-[265px] left-[18px]">
                        <div class="inline-flex items-center justify-center gap-4">
                            <svg class="w-[18px] h-[19.5px] text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z" />
                            </svg>
                            <span class="font-medium text-[#7d7d7d] text-base whitespace-nowrap" id="label-section">
                                Label
                            </span>
                        </div>
                        <div class="inline-flex items-center justify-center gap-2.5 absolute top-[-2px] left-[172px]"
                            role="group" aria-labelledby="label-section">
                            <span id="task-level"
                                class="flex w-[78px] h-6 items-center justify-center gap-2.5 px-[19px] py-1 relative bg-[#ffb32d] rounded-[20px]"
                                role="tag" aria-label="Priority: Medium">
                                <span class="font-medium text-white text-sm">
                                    Medium
                                </span>
                            </span>
                            <span
                                class="flex w-[78px] h-6 items-center justify-center gap-2.5 px-[19px] py-1 relative bg-[#6fadc8] rounded-[20px]"
                                role="tag" aria-label="Department: Engineer">
                                <span class="font-medium text-white text-sm">
                                    Engineer
                                </span>
                            </span>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div>

    <!-- Edit Task Modal -->
    <div id="editTaskModal" class="modal-overlay hidden">
        <div class="modal-content bg-white rounded-[20px] shadow-lg p-0 overflow-hidden w-[667px]">
            <article
                class="bg-[url('https://c.animaapp.com/mf0kcxh3ChSQMm/img/rectangle-152.svg')] bg-cover w-full h-[458px] relative"
                role="main" aria-labelledby="edit-task-title">
                <header class="absolute w-[549px] h-6 top-[21px] left-[66px]">
                    <div class="w-[551px] h-6">
                        <div class="relative w-[549px] h-6">
                            <h1 id="edit-task-title"
                                class="absolute w-[510px] top-0 left-0 font-medium text-[#111111] text-xl tracking-[0] leading-[normal]">
                                Edit Task
                            </h1>
                            <div class="absolute w-[53px] h-5 top-0.5 left-[496px]" role="toolbar"
                                aria-label="Edit task actions">
                                <button id="closeEditTaskModal" class="w-5 h-5 text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </header>
                <hr class="absolute w-[667px] h-px top-[60px] left-0 object-cover border-0 bg-gray-300"
                    aria-hidden="true" />

                <div class="flex flex-col w-[538px] items-start gap-3 absolute top-[107px] left-[65px]">
                    <div
                        class="relative self-stretch mt-[-1.00px] font-medium text-[#7d7d7d] text-base tracking-[0] leading-[normal]">
                        Task
                    </div>
                </div>

                <div
                    class="flex w-[538px] h-[53px] items-center gap-2.5 pl-[21px] pr-5 py-[17px] absolute top-[142px] left-[65px] bg-[#f4f4f4] rounded-[5px]">
                    <input type="text" id="edit-task-name"
                        class="w-full bg-transparent border-none outline-none font-normal text-[#111111] text-base"
                        placeholder="Task name...">
                </div>

                <div class="inline-flex items-center gap-[26px] absolute top-[229px] left-[65px]">
                    <div
                        class="relative w-fit mt-[-1.00px] font-medium text-[#111111] text-[17px] tracking-[0] leading-[normal]">
                        Task Level
                    </div>

                    <div class="inline-flex items-center gap-2 relative flex-[0_0_auto]">
                        <input type="radio" id="level-low" name="task-level" value="Low" class="hidden">
                        <label for="level-low" class="flex items-center gap-2 cursor-pointer">
                            <div class="relative w-[18px] h-[18px] rounded-[9px] border-2 border-solid border-[#ffb32d] level-indicator"
                                data-level="Low"></div>
                            <div
                                class="relative w-fit mt-[-1.00px] font-medium text-[#111111] text-[17px] tracking-[0] leading-[normal]">
                                Low
                            </div>
                        </label>
                    </div>

                    <div class="inline-flex items-center gap-2 relative flex-[0_0_auto]">
                        <input type="radio" id="level-medium" name="task-level" value="Medium" class="hidden">
                        <label for="level-medium" class="flex items-center gap-2 cursor-pointer">
                            <div class="relative w-[18px] h-[18px] rounded-[9px] border-2 border-solid border-[#ffb32d] level-indicator"
                                data-level="Medium"></div>
                            <div
                                class="relative w-fit mt-[-1.00px] font-medium text-[#111111] text-[17px] tracking-[0] leading-[normal]">
                                Medium
                            </div>
                        </label>
                    </div>

                    <div class="inline-flex items-center gap-2 relative flex-[0_0_auto]">
                        <input type="radio" id="level-high" name="task-level" value="High" class="hidden">
                        <label for="level-high" class="flex items-center gap-2 cursor-pointer">
                            <div class="relative w-[18px] h-[18px] rounded-[9px] border-2 border-solid border-[#ffb32d] level-indicator"
                                data-level="High"></div>
                            <div
                                class="relative w-fit mt-[-1.00px] font-medium text-[#111111] text-[17px] tracking-[0] leading-[normal]">
                                High
                            </div>
                        </label>
                    </div>
                </div>

                <button id="submitEditTask"
                    class="flex w-[538px] h-[65px] items-center justify-center gap-2.5 px-[220px] py-3.5 absolute top-[312px] left-[65px] bg-[#111111] rounded-[10px] hover:bg-gray-800 transition-colors">
                    <div class="relative w-fit font-normal text-white text-2xl tracking-[0] leading-[normal]">
                        Submit
                    </div>
                </button>
            </article>
        </div>
    </div>
@endsection

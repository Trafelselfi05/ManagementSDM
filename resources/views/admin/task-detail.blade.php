@extends('admin/layout')

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
                <a href="{{ route('admin.task') }}"
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
                    @php
                        use Carbon\Carbon;
                        // ensure Carbon locale for translatedFormat (month names in Indonesian)
                        Carbon::setLocale('id');
                    @endphp

                    @foreach ($tasks as $task)
                        @php
                            // compute timeline: start = created_at, end = created_at + estimated_hours
                            $start = $task->created_at ? Carbon::parse($task->created_at) : null;
                            $end = $start ? $start->copy()->addHours((int) $task->estimated_hours) : null;

                            // timeline display format: "04 Oktober 2025 - 14:00 s/d 04 Oktober 2025 - 20:00"
                            $timelineStr = $start && $end
                                ? $start->translatedFormat('d F Y - H:i') . ' s/d ' . $end->translatedFormat('d F Y - H:i')
                                : '-';

                            // created short format for table created column (e.g. "04 Okt")
                            $createdShort = $start ? $start->translatedFormat('d M') : '-';

                            // assignee
                            $assigneeName = $task->assignedUser ? $task->assignedUser->name : '-';
                            $assigneeInitial = $assigneeName !== '-' ? strtoupper(substr($assigneeName, 0, 1)) : '-';

                            // level label (Human) and color
                            $levelLabel = $task->level ? ucfirst($task->level) : '-';
                            $levelColor = $task->level === 'high' ? 'bg-[#e94949]' : ($task->level === 'medium' ? 'bg-[#ffb32d]' : 'bg-[#6fadc8]');

                            // status label color mapping
                            $status = $task->status ?? 'todo';
                            switch ($status) {
                                case 'in_progress': $statusBg = 'bg-amber-400'; break;
                                case 'review': $statusBg = 'bg-blue-400'; break;
                                case 'completed': $statusBg = 'bg-green-500'; break;
                                default: $statusBg = 'bg-red-500'; break; // todo
                            }

                            // project name
                            $projectName = $task->project ? $task->project->name : '-';

                            // timeline data attr keep the same format too
                        @endphp

                        <div class="flex items-center h-14 px-6 cursor-pointer task-row"
                             data-task-id="{{ $task->id }}"
                             data-task-name="{{ e($task->name) }}"
                             data-project="{{ e($projectName) }}"
                             data-assignee="{{ e($assigneeName) }}"
                             data-level="{{ e($levelLabel) }}"
                             data-status="{{ e(ucfirst($status)) }}"
                             data-created="{{ e($start ? $start->translatedFormat('d F Y - H:i') : '-') }}"
                             data-timeline="{{ e($timelineStr) }}"
                             data-estimated-hours="{{ $task->estimated_hours ?? 0 }}"
                             data-assignee-initial="{{ e($assigneeInitial) }}"
                             >
                            <div class="flex-none w-16 text-center font-semibold text-[#111111] text-base">
                                {{ $loop->iteration }}
                            </div>

                            <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">
                                {{ $task->name }}
                            </div>

                            <div class="flex-1 min-w-0 font-semibold text-[#111111] text-base ml-4 truncate">
                                {{ $projectName }}
                            </div>

                            <div class="flex-none w-36 text-center font-semibold text-[#111111] text-base ml-4">
                                {{ $assigneeName }}
                            </div>

                            <div class="flex-none w-24 flex justify-center ml-4">
                                <span class="{{ $levelColor }} text-white text-sm font-semibold px-2 py-1 rounded-[10px]">
                                    {{ $levelLabel }}
                                </span>
                            </div>

                            <div class="flex-none w-28 flex justify-center ml-4">
                                <span class="px-2 py-1 {{ $statusBg }} text-white text-sm font-semibold rounded-[10px]">
                                    {{ ucfirst($status) }}
                                </span>
                            </div>

                            <div class="flex-none w-24 text-center font-semibold text-[#111111] text-base ml-4">
                                {{ $createdShort }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Task Detail Modal -->
    <div id="taskDetailModal" class="modal-overlay hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40">
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
                            <span class="font-medium text-white text-sm">To do</span>
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
                            datetime="">
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
                        <div class="inline-flex items-center justify-center gap-2.5 absolute top-[-2px] left-[172px]" role="group" aria-labelledby="label-section">
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
    <div id="editTaskModal" class="modal-overlay hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40">
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

    <style>
        /* small style for modal overlay (already added 'hidden' to hide) */
        .modal-overlay { }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // helpers
            function showModal(modalEl) {
                modalEl.classList.remove('hidden');
            }
            function hideModal(modalEl) {
                modalEl.classList.add('hidden');
            }

            // Map status color classes for modal top badge
            function statusBgClass(status) {
                switch ((status || '').toLowerCase()) {
                    case 'in_progress': return 'bg-amber-400';
                    case 'review': return 'bg-blue-400';
                    case 'completed': return 'bg-green-500';
                    default: return 'bg-red-500'; // todo
                }
            }

            // Map level color for small label (returns tailwind-like inline color classes used in markup)
            function levelBgInline(level) {
                if (!level) return 'bg-[#6fadc8]'; // default
                level = level.toLowerCase();
                if (level === 'high') return 'bg-[#e94949]';
                if (level === 'medium') return 'bg-[#ffb32d]';
                return 'bg-[#6fadc8]';
            }

            const taskRows = document.querySelectorAll('.task-row');
            const taskDetailModal = document.getElementById('taskDetailModal');
            const editTaskModal = document.getElementById('editTaskModal');

            // modal elements for viewing
            const elTitle = document.getElementById('task-title');
            const elDetailsHeading = document.getElementById('task-details-heading');
            const elStatus = document.getElementById('task-status');
            const elProject = document.getElementById('task-project');
            const elTimeline = document.getElementById('task-timeline');
            const elAssignee = document.getElementById('task-assignee');
            const elAssigneeInitial = document.getElementById('assignee-initial');
            const elLevelTag = document.getElementById('task-level');

            // edit modal elements
            const editNameInput = document.getElementById('edit-task-name');
            const levelRadios = document.getElementsByName('task-level');

            // Close buttons
            const closeTaskModalBtn = document.getElementById('closeTaskModal');
            const closeEditTaskModalBtn = document.getElementById('closeEditTaskModal');

            // Edit button inside view modal
            const editBtnInsideView = document.getElementById('editTaskBtn');

            // Attach click handlers to each task row
            taskRows.forEach(row => {
                row.addEventListener('click', function (e) {
                    // read dataset
                    const ds = this.dataset;
                    const taskId = ds.taskId;
                    const taskName = ds.taskName || '';
                    const project = ds.project || '-';
                    const assignee = ds.assignee || '-';
                    const level = ds.level || '-';
                    const status = ds.status || '-';
                    const timeline = ds.timeline || '-';
                    const assigneeInitial = ds.assigneeInitial || (assignee ? assignee[0] : '-');

                    // Fill modal content
                    elTitle.textContent = taskName;
                    elDetailsHeading.textContent = taskName;
                    // status badge
                    elStatus.innerHTML = `<span class="font-medium text-white text-sm">${status}</span>`;
                    // adjust bg color
                    elStatus.className = 'flex w-[78px] h-6 items-center justify-center gap-2.5 px-[19px] py-1 ml-[190px] rounded-[20px] ' + statusBgClass(status.toLowerCase());

                    elProject.textContent = project;
                    elTimeline.textContent = timeline;
                    elAssignee.textContent = assignee;
                    elAssigneeInitial.textContent = assigneeInitial;

                    // level tag
                    elLevelTag.innerHTML = `<span class="font-medium text-white text-sm">${level}</span>`;
                    elLevelTag.className = 'flex w-[78px] h-6 items-center justify-center gap-2.5 px-[19px] py-1 relative rounded-[20px] ' + levelBgInline(level);

                    // store current selection on detail modal for edit usage
                    taskDetailModal.dataset.currentTaskId = taskId;
                    taskDetailModal.dataset.currentTaskLevel = level;
                    taskDetailModal.dataset.currentTaskName = taskName;

                    // show modal
                    showModal(taskDetailModal);
                });
            });

            // Close detail modal
            if (closeTaskModalBtn) {
                closeTaskModalBtn.addEventListener('click', function (e) {
                    hideModal(taskDetailModal);
                });
            }

            // Open edit modal from inside view modal
            if (editBtnInsideView) {
                editBtnInsideView.addEventListener('click', function (e) {
                    e.stopPropagation();
                    // read data from detail modal
                    const taskId = taskDetailModal.dataset.currentTaskId;
                    const level = taskDetailModal.dataset.currentTaskLevel || '';
                    const name = taskDetailModal.dataset.currentTaskName || '';

                    // populate edit form
                    editNameInput.value = name;

                    // set radio according to level (case-insensitive check)
                    for (const r of levelRadios) {
                        r.checked = false;
                        if (r.value.toLowerCase() === level.toLowerCase()) {
                            r.checked = true;
                        }
                    }

                    // hide detail modal and show edit modal
                    hideModal(taskDetailModal);
                    showModal(editTaskModal);
                });
            }

            // Close edit modal
            if (closeEditTaskModalBtn) {
                closeEditTaskModalBtn.addEventListener('click', function (e) {
                    hideModal(editTaskModal);
                });
            }

            // Submit button in Edit modal - for now just closes and logs (no backend call)
            const submitEditBtn = document.getElementById('submitEditTask');
            if (submitEditBtn) {
                submitEditBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const newName = editNameInput.value.trim();
                    const selectedLevelEl = Array.from(levelRadios).find(r => r.checked);
                    const newLevel = selectedLevelEl ? selectedLevelEl.value : null;

                    // NOTE: here you can implement fetch() to call your update route.
                    // For now we'll just console.log and close modal to keep UI-only behavior.
                    console.log('Edit submit (UI only) - newName:', newName, 'newLevel:', newLevel);

                    hideModal(editTaskModal);
                });
            }

            // Close modals when clicking outside modal-content
            [taskDetailModal, editTaskModal].forEach(modal => {
                modal.addEventListener('click', function (e) {
                    if (e.target === modal) hideModal(modal);
                });
            });

        });
    </script>
@endsection

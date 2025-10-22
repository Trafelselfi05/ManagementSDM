@extends('admin/layout')

@section('title', 'Task Detail')

@section('content')
    <div class="w-full max-w-[1800px] mx-auto">
        <!-- Desktop Table View -->
        <div class="hidden lg:block bg-white rounded-[20px] shadow-[0px_0px_4px_#00000040] p-6 overflow-y-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2">
                    <img class="w-6 h-6" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" />
                    <span class="text-gray-500 text-sm font-medium">Filter</span>
                </div>
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
                        Carbon::setLocale('id');
                    @endphp

                    @foreach ($tasks as $task)
                        @php
                            $start = $task->created_at ? Carbon::parse($task->created_at) : null;
                            $end = $start ? $start->copy()->addHours((int) $task->estimated_hours) : null;
                            $timelineStr =
                                $start && $end
                                    ? $start->translatedFormat('d F Y - H:i') .
                                        ' s/d ' .
                                        $end->translatedFormat('d F Y - H:i')
                                    : '-';
                            $createdShort = $start ? $start->translatedFormat('d M') : '-';
                            $assigneeName = $task->assignedUser->name ?? '-';
                            $assigneeInitial = $assigneeName !== '-' ? strtoupper(substr($assigneeName, 0, 1)) : '-';
                            $levelLabel = ucfirst($task->level ?? '-');
                            $levelColor =
                                $task->level === 'high'
                                    ? 'bg-[#e94949]'
                                    : ($task->level === 'medium'
                                        ? 'bg-[#ffb32d]'
                                        : 'bg-[#6fadc8]');
                            $status = $task->status ?? 'todo';
                            $statusBg = match ($status) {
                                'in_progress' => 'bg-amber-400',
                                'review' => 'bg-blue-400',
                                'completed' => 'bg-green-500',
                                default => 'bg-red-500',
                            };
                            $projectName = $task->project->name ?? '-';
                        @endphp

                        <div class="flex items-center h-14 px-6 cursor-pointer task-row hover:bg-gray-50 transition"
                            data-task-id="{{ $task->id }}" data-task-name="{{ e($task->name) }}"
                            data-project="{{ e($projectName) }}" data-assignee="{{ e($assigneeName) }}"
                            data-level="{{ e($levelLabel) }}" data-status="{{ e(ucfirst($status)) }}"
                            data-created="{{ e($start ? $start->translatedFormat('d F Y - H:i') : '-') }}"
                            data-timeline="{{ e($timelineStr) }}" data-estimated-hours="{{ $task->estimated_hours ?? 0 }}"
                            data-assignee-initial="{{ e($assigneeInitial) }}" onclick="openTaskModal(this)">
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
                                <span
                                    class="{{ $levelColor }} text-white text-sm font-semibold px-2 py-1 rounded-[10px]">
                                    {{ $levelLabel }}
                                </span>
                            </div>
                            <div class="flex-none w-28 flex justify-center ml-4">
                                <span
                                    class="px-2 py-1 {{ $statusBg }} text-white text-sm font-semibold rounded-[10px]">
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

        <!-- Mobile Card View -->
        <div class="lg:hidden space-y-4">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2">
                    <img class="w-6 h-6" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" />
                    <span class="text-gray-500 text-sm font-medium">Filter</span>
                </div>
                <a href="{{ route('admin.task') }}"
                    class=" sm:w-40 h-10 px-3 bg-gray-900 text-white text-sm font-semibold rounded-lg shadow-sm hover:bg-gray-800 transition-colors flex items-center justify-center">
                    Task Board View
                </a>
            </div>

            @forelse ($tasks as $index => $task)
                @php
                    $assignee = $task->assignedUser->name ?? '-';
                    $project = $task->project->name ?? '-';
                    $level = ucfirst($task->level ?? '-');
                    $status = ucfirst($task->status ?? 'Todo');
                    $statusBg = match ($task->status) {
                        'in_progress' => 'bg-amber-400',
                        'review' => 'bg-blue-400',
                        'completed' => 'bg-green-500',
                        default => 'bg-red-500',
                    };
                    $levelBg =
                        $task->level === 'high'
                            ? 'bg-[#e94949]'
                            : ($task->level === 'medium'
                                ? 'bg-[#ffb32d]'
                                : 'bg-[#6fadc8]');
                    $created = $task->created_at
                        ? \Carbon\Carbon::parse($task->created_at)->translatedFormat('d M Y')
                        : '-';
                @endphp

                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm cursor-pointer task-row"
                            data-task-id="{{ $task->id }}" data-task-name="{{ e($task->name) }}"
                            data-project="{{ e($projectName) }}" data-assignee="{{ e($assigneeName) }}"
                            data-level="{{ e($levelLabel) }}" data-status="{{ e(ucfirst($status)) }}"
                            data-created="{{ e($start ? $start->translatedFormat('d F Y - H:i') : '-') }}"
                            data-timeline="{{ e($timelineStr) }}" data-estimated-hours="{{ $task->estimated_hours ?? 0 }}"
                            data-assignee-initial="{{ e($assigneeInitial) }}" onclick="openTaskModal(this)">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs font-medium text-gray-500">#{{ $index + 1 }}</span>
                                <span class="px-2 py-0.5 {{ $levelBg }} text-white text-xs font-semibold rounded-md">
                                    {{ $level }}
                                </span>
                            </div>
                            <h3 class="font-semibold text-gray-800 text-base mb-1">{{ $task->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $project }}</p>
                        </div>
                    </div>

                    <div class="space-y-2 mb-3 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Employee:</span>
                            <span class="font-medium text-gray-800">{{ $assignee }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Status:</span>
                            <span class="px-2.5 py-1 {{ $statusBg }} text-white text-xs font-semibold rounded-md">
                                {{ $status }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Created:</span>
                            <span class="text-gray-700">{{ $created }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center text-gray-500">Tidak Ada Task</div>
            @endforelse
        </div>
    </div>


    <!-- Task Detail Modal -->
    <div id="taskDetailModal"
        class="modal-overlay hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
        <div
            class="modal-content bg-white rounded-[20px] shadow-lg overflow-hidden w-full max-w-[667px] max-h-[90vh] overflow-y-auto">
            <article
                class="bg-[url('https://c.animaapp.com/mf0kcxh3ChSQMm/img/rectangle-152.svg')] bg-cover bg-center w-full relative p-6 sm:p-8">
                <!-- Header -->
                <header class="flex justify-between items-start sm:items-center mb-4">
                    <h1 id="task-title" class="font-medium text-[#111111] text-xl">Task</h1>
                    <div class="flex gap-3">
                        <button id="editTaskBtn" class="w-5 h-5 text-gray-500 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button id="closeTaskModal" class="w-5 h-5 text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </header>

                <hr class="border-gray-300 mb-4" />

                <!-- Task Detail Content -->
                <section class="flex flex-col gap-5">
                    <h2 class="font-semibold text-[#111111] text-2xl sm:text-[30px] leading-tight break-words">
                        Wordpress plugin update
                    </h2>

                    <!-- Status -->
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                            <span class="text-gray-600 text-base">Status</span>
                        </div>
                        <div id="task-status"
                            class="bg-[#e94949] rounded-full px-4 py-1 text-white text-sm font-medium text-center min-w-[90px]">
                            To do
                        </div>
                    </div>

                    <!-- Project -->
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z" />
                            </svg>
                            <span class="text-gray-600 text-base">Project</span>
                        </div>
                        <span id="task-project" class="font-semibold text-[#111111] text-base text-right">
                            Website Management Company
                        </span>
                    </div>

                    <!-- Timeline -->
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z" />
                            </svg>
                            <span class="text-gray-600 text-base">Timeline</span>
                        </div>
                        <time id="task-timeline" class="font-semibold text-[#111111] text-base text-right">
                            25 November 2024 - 30 November 2024
                        </time>
                    </div>

                    <!-- Assignee -->
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                            <span class="text-gray-600 text-base">Assignee</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-7 h-7 rounded-full bg-gray-200 flex items-center justify-center mr-2">
                                <span id="assignee-initial" class="text-xs font-semibold text-gray-600">A</span>
                            </div>
                            <span id="task-assignee" class="font-semibold text-[#111111] text-base">Athena Cyntia</span>
                        </div>
                    </div>

                    <!-- Level -->
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z" />
                            </svg>
                            <span class="text-gray-600 text-base">Label</span>
                        </div>
                        <span id="task-level"
                            class="flex items-center justify-center bg-[#ffb32d] text-white rounded-full px-4 py-1 text-sm font-medium">
                            Medium
                        </span>
                    </div>
                </section>
            </article>
        </div>
    </div>

    <!-- Edit Task Modal -->
    <div id="editTaskModal"
        class="modal-overlay hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
        <div
            class="modal-content bg-white rounded-[20px] shadow-lg overflow-hidden w-full max-w-[667px] max-h-[90vh] overflow-y-auto">
            <article
                class="bg-[url('https://c.animaapp.com/mf0kcxh3ChSQMm/img/rectangle-152.svg')] bg-cover bg-center w-full relative p-6 sm:p-10">
                <header class="flex justify-between items-center mb-5">
                    <h1 id="edit-task-title" class="font-medium text-[#111111] text-xl">Edit Task</h1>
                    <button id="closeEditTaskModal" class="w-5 h-5 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </header>

                <hr class="border-gray-300 mb-6" />

                <!-- Task Name -->
                <label for="edit-task-name" class="block text-gray-600 text-sm mb-2">Task</label>
                <input type="text" id="edit-task-name"
                    class="w-full bg-[#f4f4f4] px-4 py-3 rounded-md text-[#111111] text-base mb-6 outline-none border-none"
                    placeholder="Task name..." />

                <!-- Task Level -->
                <div class="mb-6">
                    <span class="block font-medium text-[#111111] mb-2">Task Level</span>
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" id="level-low" name="task-level" value="low" class="hidden">
                            <span class="w-[18px] h-[18px] border-2 border-[#ffb32d] rounded-full inline-block"></span>
                            <span>Low</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" id="level-medium" name="task-level" value="medium" class="hidden">
                            <span class="w-[18px] h-[18px] border-2 border-[#ffb32d] rounded-full inline-block"></span>
                            <span>Medium</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" id="level-high" name="task-level" value="high" class="hidden">
                            <span class="w-[18px] h-[18px] border-2 border-[#ffb32d] rounded-full inline-block"></span>
                            <span>High</span>
                        </label>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label for="edit-task-status" class="block mb-2 text-sm text-[#7d7d7d]">Status</label>
                    <select id="edit-task-status"
                        class="w-full h-10 px-3 rounded-md border border-gray-200 bg-white text-base">
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <!-- Submit -->
                <button id="submitEditTask"
                    class="w-full h-[55px] flex items-center justify-center bg-[#111111] rounded-[10px] hover:bg-gray-800 transition-colors">
                    <span class="text-white text-lg">Submit</span>
                </button>
            </article>
        </div>
    </div>


    <style>
        /* small style for modal overlay (already added 'hidden' to hide) */
        .modal-overlay {}
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // CSRF token from meta (ensure layout includes <meta name="csrf-token" content="{{ csrf_token() }}">)
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                '{{ csrf_token() }}';

            function showModal(modalEl) {
                modalEl.classList.remove('hidden');
            }

            function hideModal(modalEl) {
                modalEl.classList.add('hidden');
            }

            function statusBgClass(status) {
                switch ((status || '').toLowerCase()) {
                    case 'in_progress':
                        return 'bg-amber-400';
                    case 'review':
                        return 'bg-blue-400';
                    case 'completed':
                        return 'bg-green-500';
                    default:
                        return 'bg-red-500';
                }
            }

            function levelBgInline(level) {
                if (!level) return 'bg-[#6fadc8]';
                level = level.toLowerCase();
                if (level === 'high') return 'bg-[#e94949]';
                if (level === 'medium') return 'bg-[#ffb32d]';
                return 'bg-[#6fadc8]';
            }

            const taskRows = document.querySelectorAll('.task-row');
            const taskDetailModal = document.getElementById('taskDetailModal');
            const editTaskModal = document.getElementById('editTaskModal');

            // view modal elements
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
            const statusSelect = document.getElementById('edit-task-status');

            const closeTaskModalBtn = document.getElementById('closeTaskModal');
            const closeEditTaskModalBtn = document.getElementById('closeEditTaskModal');
            const editBtnInsideView = document.getElementById('editTaskBtn');
            const submitEditBtn = document.getElementById('submitEditTask');

            // Attach click handlers to each task row
            taskRows.forEach(row => {
                row.addEventListener('click', function(e) {
                    const ds = this.dataset;
                    const taskId = ds.taskId;
                    const taskName = ds.taskName || '';
                    const project = ds.project || '-';
                    const assignee = ds.assignee || '-';
                    const level = ds.level || '-';
                    const status = ds.status || '-';
                    const timeline = ds.timeline || '-';
                    const assigneeInitial = ds.assigneeInitial || (assignee ? assignee[0] : '-');

                    // Fill view modal content
                    elTitle.textContent = taskName;
                    elDetailsHeading.textContent = taskName;
                    elStatus.innerHTML =
                        `<span class="font-medium text-white text-sm">${status}</span>`;
                    elStatus.className =
                        'flex w-[78px] h-6 items-center justify-center gap-2.5 px-[19px] py-1 ml-[190px] rounded-[20px] ' +
                        statusBgClass(status.toLowerCase());
                    elProject.textContent = project;
                    elTimeline.textContent = timeline;
                    elAssignee.textContent = assignee;
                    elAssigneeInitial.textContent = assigneeInitial;
                    elLevelTag.innerHTML =
                        `<span class="font-medium text-white text-sm">${level}</span>`;
                    elLevelTag.className =
                        'flex w-[78px] h-6 items-center justify-center gap-2.5 px-[19px] py-1 relative rounded-[20px] ' +
                        levelBgInline(level);

                    // store meta for edit modal
                    taskDetailModal.dataset.currentTaskId = taskId;
                    taskDetailModal.dataset.currentTaskLevel = level;
                    taskDetailModal.dataset.currentTaskName = taskName;
                    taskDetailModal.dataset.currentTaskStatus = status;

                    showModal(taskDetailModal);
                });
            });

            // Close detail modal
            if (closeTaskModalBtn) closeTaskModalBtn.addEventListener('click', function() {
                hideModal(taskDetailModal);
            });

            // Open edit modal from detail view
            if (editBtnInsideView) {
                editBtnInsideView.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const taskId = taskDetailModal.dataset.currentTaskId;
                    const level = taskDetailModal.dataset.currentTaskLevel || '';
                    const name = taskDetailModal.dataset.currentTaskName || '';
                    const status = taskDetailModal.dataset.currentTaskStatus || 'todo';

                    // populate edit form
                    editNameInput.value = name;
                    statusSelect.value = status.toLowerCase();

                    // set radio according to level (case-insensitive)
                    for (const r of levelRadios) {
                        r.checked = false;
                        if (r.value.toLowerCase() === level.toLowerCase()) r.checked = true;
                    }

                    hideModal(taskDetailModal);
                    showModal(editTaskModal);
                });
            }

            // Close edit modal
            if (closeEditTaskModalBtn) closeEditTaskModalBtn.addEventListener('click', function() {
                hideModal(editTaskModal);
            });

            // Submit Edit -> AJAX POST ke server, update row DOM on success
            if (submitEditBtn) {
                submitEditBtn.addEventListener('click', async function(e) {
                    e.preventDefault();

                    // get current task id from detail modal dataset (set earlier)
                    const taskId = taskDetailModal.dataset.currentTaskId;
                    if (!taskId) {
                        console.error('No current task id set');
                        return;
                    }

                    const newName = editNameInput.value.trim();
                    const selectedLevelEl = Array.from(levelRadios).find(r => r.checked);
                    const newLevel = selectedLevelEl ? selectedLevelEl.value : null;
                    const newStatus = statusSelect.value;

                    if (!newLevel || !newStatus) {
                        alert('Please choose level and status.');
                        return;
                    }

                    // Prepare payload
                    const payload = {
                        task_id: taskId,
                        name: newName,
                        taskLevel: newLevel,
                        status: newStatus
                    };

                    try {
                        const res = await fetch("{{ route('admin.task.update') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify(payload)
                        });

                        if (!res.ok) {
                            const text = await res.text();
                            throw new Error('Request failed: ' + res.status + ' - ' + text);
                        }

                        const json = await res.json();

                        if (json.success) {
                            const updatedTask = json.task;

                            // Find the corresponding row in table by data-task-id and update DOM & data-attributes
                            const row = document.querySelector(
                                `.task-row[data-task-id="${updatedTask.id}"]`);
                            if (row) {
                                // update dataset attributes
                                row.dataset.taskName = updatedTask.name || row.dataset.taskName;
                                row.dataset.level = (updatedTask.level ? (updatedTask.level.charAt(0)
                                        .toUpperCase() + updatedTask.level.slice(1)) : row.dataset
                                    .level);
                                row.dataset.status = (updatedTask.status ? (updatedTask.status.charAt(0)
                                        .toUpperCase() + updatedTask.status.slice(1)) : row.dataset
                                    .status);

                                // update visible cells: name, level badge, status badge
                                const nameCell = row.querySelector('.flex-1.min-w-0.font-semibold');
                                if (nameCell) nameCell.textContent = updatedTask.name;

                                // level badge
                                const levelBadge = row.querySelector('.level-badge');
                                if (levelBadge) {
                                    levelBadge.textContent = (updatedTask.level ? (updatedTask.level
                                            .charAt(0).toUpperCase() + updatedTask.level.slice(1)) :
                                        '');
                                    // update color classes manually
                                    levelBadge.className = '';
                                    let levelColorClass = '';
                                    if (updatedTask.level === 'high') levelColorClass = 'bg-[#e94949]';
                                    else if (updatedTask.level === 'medium') levelColorClass =
                                        'bg-[#ffb32d]';
                                    else levelColorClass = 'bg-[#6fadc8]';
                                    levelBadge.classList.add(levelColorClass, 'text-white', 'text-sm',
                                        'font-semibold', 'px-2', 'py-1', 'rounded-[10px]',
                                        'level-badge');
                                }

                                // status badge
                                const statusBadge = row.querySelector('.status-badge');
                                if (statusBadge) {
                                    statusBadge.textContent = (updatedTask.status ? (updatedTask.status
                                        .charAt(0).toUpperCase() + updatedTask.status.slice(1)
                                    ) : '');
                                    statusBadge.className = '';
                                    let statusBg = '';
                                    switch (updatedTask.status) {
                                        case 'in_progress':
                                            statusBg = 'bg-amber-400';
                                            break;
                                        case 'review':
                                            statusBg = 'bg-blue-400';
                                            break;
                                        case 'completed':
                                            statusBg = 'bg-green-500';
                                            break;
                                        default:
                                            statusBg = 'bg-red-500';
                                            break;
                                    }
                                    statusBadge.classList.add('px-2', 'py-1', statusBg, 'text-white',
                                        'text-sm', 'font-semibold', 'rounded-[10px]', 'status-badge'
                                    );
                                }
                            }

                            // Optionally update detail modal stored dataset so further edits reflect new values
                            taskDetailModal.dataset.currentTaskName = updatedTask.name;
                            taskDetailModal.dataset.currentTaskLevel = (updatedTask.level ? (updatedTask
                                    .level.charAt(0).toUpperCase() + updatedTask.level.slice(1)) :
                                '');
                            taskDetailModal.dataset.currentTaskStatus = (updatedTask.status ? (
                                updatedTask.status.charAt(0).toUpperCase() + updatedTask.status
                                .slice(1)) : '');

                            // close edit modal
                            hideModal(editTaskModal);
                        } else {
                            alert(json.message || 'Failed to update task');
                        }
                    } catch (err) {
                        console.error(err);
                        alert('Error updating task: ' + (err.message || err));
                    }
                });
            }

            // Close modals when clicking outside modal-content
            [taskDetailModal, editTaskModal].forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) hideModal(modal);
                });
            });
        });
    </script>
@endsection

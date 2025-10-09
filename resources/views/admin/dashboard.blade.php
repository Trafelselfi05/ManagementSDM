@extends('admin/layout')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 rounded-[20px]">
    <!-- Main Dashboard Content -->
    <div class="lg:col-span-2 order-2 lg:order-1">
        <div class="bg-white rounded-2xl shadow-sm py-4 lg:p-6">
            <!-- Status Filter Tabs -->
            <div class="flex flex-wrap gap-2 lg:gap-4 mb-4 lg:mb-6" id="statusFilter">
                <button data-status="ready"
                    class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-900 text-white font-medium text-xs lg:text-sm shadow-sm">
                    Ready
                </button>
                <button data-status="standby"
                    class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Stand by
                </button>
                <button data-status="notready"
                    class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Not ready
                </button>
                <button data-status="complete"
                    class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Complete
                </button>
                <button data-status="absent"
                    class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Absent
                </button>
            </div>

            <!-- Employee Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6" id="employeeCards">
                @foreach ($users as $u)
                    @php
                        // Normalisasi status agar seragam dengan tombol filter
                        $dashboardStatus = strtolower(str_replace('_', '', $u['dashboard_status']));
                        $taskStatus = $u['task_status'] ? strtolower(str_replace('_', '', $u['task_status'])) : null;

                        // Pastikan selalu ada 1 status
                        $statusesToShow = [$dashboardStatus];

                        // Jika task_status berbeda, tambahkan
                        if ($taskStatus && $taskStatus !== $dashboardStatus) {
                            $statusesToShow[] = $taskStatus;
                        }
                    @endphp

                    @foreach ($statusesToShow as $status)
                        <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100"
                            data-status="{{ strtolower($status) }}">
                            <div class="flex items-start gap-3 mb-3 lg:mb-4">
                                <img src="{{ $u['image'] }}" alt="{{ $u['name'] }}"
                                    class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">
                                        {{ $u['name'] }}</h3>
                                    <p class="text-xs lg:text-sm text-gray-500">{{ $u['division'] ?? '-' }}</p>
                                </div>

                                {{-- Small badges (Mobile) --}}
                                <div class="flex md:hidden gap-2 items-center flex-wrap">
                                    @if ($u['task'])
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center bg-[#7db445] rounded-[10px] px-[6px] lg:px-[7px] py-[4px] lg:py-[5px]">
                                            <span
                                                class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['status']) }}</span>
                                        </div>
                                        <div
                                            class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center bg-[#e94949] rounded-[10px] px-[6px] lg:px-[7px] py-[4px] lg:py-[5px]">
                                            <span
                                                class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['level']) }}</span>
                                        </div>
                                    @else
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center bg-gray-200 rounded-[10px] px-[6px] lg:px-[7px] py-[4px] lg:py-[5px]">
                                            <span class="text-xs lg:text-sm font-semibold text-gray-700">
                                                {{ $status === 'absent' ? 'Absent' : 'No Task' }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-2">
                                <span class="text-xs lg:text-sm font-semibold text-gray-900">
                                    {{ $u['task']['project_name'] ?? 'No project assigned' }} :
                                </span>
                            </div>

                            <p class="text-xs lg:text-sm text-gray-600 mb-3 line-clamp-2">
                                {{ $u['task']['name'] ?? ($status === 'absent' ? 'Absent' : 'No task today') }}
                            </p>

                            <div class="hidden md:flex gap-2 items-center flex-wrap">
                                @if ($u['task'])
                                    <div
                                        class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center bg-[#7db445] rounded-[10px] px-[6px] lg:px-[7px] py-[4px] lg:py-[5px]">
                                        <span
                                            class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['status']) }}</span>
                                    </div>
                                    <div
                                        class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center bg-[#e94949] rounded-[10px] px-[6px] lg:px-[7px] py-[4px] lg:py-[5px]">
                                        <span
                                            class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['level']) }}</span>
                                    </div>
                                @else
                                    @if ($status === 'absent')
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center bg-[#e94949] rounded-[10px] px-[6px] lg:px-[7px] py-[4px] lg:py-[5px]">
                                            <span class="text-xs lg:text-sm font-semibold text-white">Absent</span>
                                        </div>
                                    @else
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center bg-gray-200 rounded-[10px] px-[6px] lg:px-[7px] py-[4px] lg:py-[5px]">
                                            <span class="text-xs lg:text-sm font-semibold text-gray-700">No Task</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-4 lg:space-y-6 order-1 lg:order-2">
        <div class="grid grid-cols-2 gap-4 lg:gap-6">
            <div class="bg-[#7db445] rounded-2xl shadow-sm p-3 lg:p-6">
                <div class="flex items-center gap-2 mb-3 lg:mb-6">
                    <svg class="w-5 h-5 lg:w-7 lg:h-7 text-white" fill="currentColor" viewBox="0 0 30 30">
                        <path
                            d="M15.4154 0.916016H3.7487C2.14453 0.916016 0.846615 2.22852 0.846615 3.83268L0.832031 27.166C0.832031 28.7702 2.12995 30.0827 3.73411 30.0827H21.2487C22.8529 30.0827 24.1654 28.7702 24.1654 27.166V9.66602L15.4154 0.916016ZM10.9529 24.2494L5.79036 19.0868L7.84662 17.0306L10.9383 20.1223L17.1216 13.9389L19.1779 15.9952L10.9529 24.2494ZM13.957 11.1243V3.10352L21.9779 11.1243H13.957Z" />
                    </svg>
                    <h2 class="text-base lg:text-xl font-semibold text-white">Tasks</h2>
                </div>
                <div class="space-y-2 lg:space-y-4">
                    <div class="bg-white rounded-xl p-2 lg:p-4">
                        <h3 class="font-semibold text-gray-900 text-xs lg:text-sm mb-1 lg:mb-2">Create filter to find
                            data resource</h3>
                        <p class="text-xs text-gray-500 mb-2 lg:mb-4 line-clamp-2">create button and if click data will
                            show</p>
                        <span
                            class="inline-block px-2 lg:px-3 py-1 bg-[#6fadc8] text-white text-xs font-medium rounded-md">Low</span>
                    </div>

                    <div class="bg-white rounded-xl p-2 lg:p-4">
                        <h3 class="font-semibold text-gray-900 text-xs lg:text-sm mb-1 lg:mb-2">Displaying and merging
                            data</h3>
                        <p class="text-xs text-gray-500 mb-2 lg:mb-4 line-clamp-2">merging data in web codelab, to make
                            easy access and more</p>
                        <span
                            class="inline-block px-2 lg:px-3 py-1 bg-[#ffb32d] text-white text-xs font-medium rounded-md">Medium</span>
                    </div>
                </div>
            </div>

            <div class="bg-[#ffb32d] rounded-2xl shadow-sm p-3 lg:p-6">
                <div class="flex items-center gap-2 mb-3 lg:mb-6">
                    <svg class="w-5 h-5 lg:w-7 lg:h-7 text-white" fill="currentColor" viewBox="0 0 30 30">
                        <path
                            d="M27.0781 0.828125H1.92188C1.31689 0.828125 0.828125 1.31689 0.828125 1.92188V27.0781C0.828125 27.6831 1.31689 28.1719 1.92188 28.1719H27.0781C27.6831 28.1719 28.1719 27.6831 28.1719 27.0781V1.92188C28.1719 1.31689 27.6831 0.828125 27.0781 0.828125Z" />
                    </svg>
                    <h2 class="text-base lg:text-xl font-semibold text-white">Project</h2>
                </div>
                <div class="bg-white rounded-xl p-2 lg:p-4">
                    <h3 class="font-semibold text-gray-900 text-xs lg:text-sm mb-1 lg:mb-2">CODESHOP</h3>
                    <p class="text-xs text-gray-500 mb-2 lg:mb-4 line-clamp-3">Create a web, to buy mod game GTA V.
                        Payment must use Dana/Paypal/Steam</p>
                    <span
                        class="inline-block px-2 lg:px-3 py-1 bg-[#e94949] text-white text-xs font-medium rounded-md">On create</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('#statusFilter .status-btn');
    const cards = document.querySelectorAll('#employeeCards .employee-card');

    function setActiveButton(activeBtn) {
        buttons.forEach(btn => {
            btn.classList.remove('bg-gray-900', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-700');
        });
        activeBtn.classList.add('bg-gray-900', 'text-white');
        activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
    }

    function filterCards(status) {
        cards.forEach(card => {
            const cardStatus = card.getAttribute('data-status')?.toLowerCase() ?? '';
            if (status === 'all' || cardStatus === status) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    }

    // Event listener
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const status = this.getAttribute('data-status').toLowerCase();
            setActiveButton(this);
            filterCards(status);
        });
    });

    // Default show "ready"
    const defaultBtn = document.querySelector('#statusFilter .status-btn[data-status="ready"]');
    if (defaultBtn) defaultBtn.click();
});
</script>
@endsection

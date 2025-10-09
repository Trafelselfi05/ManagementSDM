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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 relative" id="employeeCards">
                    @foreach ($users as $u)
                        @php
                            $dashboardStatus = strtolower(str_replace('_', '', $u['dashboard_status']));
                            $taskStatus = $u['task_status']
                                ? strtolower(str_replace('_', '', $u['task_status']))
                                : null;
                            $statusesToShow = [$dashboardStatus];
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

                    <!-- Pesan jika tidak ada user -->
                    <div id="emptyMessage"
                        class="hidden w-full  flex flex-col items-center justify-center text-center p-6">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                            class="w-24 h-24 opacity-70 mb-4" alt="Empty" />
                        <p class="text-gray-500 font-medium text-sm lg:text-base">No employee yet</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        {{-- (sidebar tetap sama seperti sebelumnya) --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('#statusFilter .status-btn');
            const cards = document.querySelectorAll('#employeeCards .employee-card');
            const emptyMessage = document.getElementById('emptyMessage');

            function setActiveButton(activeBtn) {
                buttons.forEach(btn => {
                    btn.classList.remove('bg-gray-900', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-700');
                });
                activeBtn.classList.add('bg-gray-900', 'text-white');
                activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
            }

            function filterCards(status) {
                let visibleCount = 0;

                cards.forEach(card => {
                    const cardStatus = card.getAttribute('data-status')?.toLowerCase() ?? '';
                    if (status === 'all' || cardStatus === status) {
                        card.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                    }
                });

                // Tampilkan pesan jika tidak ada kartu yang muncul
                if (visibleCount === 0) {
                    emptyMessage.classList.remove('hidden');
                } else {
                    emptyMessage.classList.add('hidden');
                }
            }

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

@extends('admin/layout')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .hide-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 rounded-[20px]">
        <!-- Main Dashboard Content -->
        <div class="lg:col-span-2 order-2 lg:order-1">
            <div class="bg-white rounded-2xl shadow-sm py-4 lg:p-6 h-full ">
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

                <!-- Employee Cards Grid with Fixed Height and Invisible Scrollbar -->
                <div class="overflow-y-auto hide-scrollbar" style="max-height: 600px;">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6" id="employeeCards">
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
                                <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 w-full"
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
                                        {{ $u['task']['name'] ?? ($status === 'absent' ? 'Absent' : 'No absent today') }}
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

                        <!-- Empty State Message -->
                        <div id="emptyMessage" class="hidden col-span-full w-full py-8 lg:py-12">
                            <div class="flex flex-col items-center justify-center text-center">
                                <!-- Icon Container -->
                                <div class="mb-3 lg:mb-4" id="emptyIcon">
                                    <!-- SVG will be inserted dynamically -->
                                </div>
                                
                                <!-- Text -->
                                <p class="text-gray-900 font-semibold text-sm lg:text-base mb-1" id="emptyTitle">No taks ready</p>
                                <p class="text-gray-500 text-xs lg:text-sm" id="emptySubtitle">There are no employees in this status</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <!-- Right Sidebar -->
        <div class="space-y-4 lg:space-y-6 order-1 lg:order-2">
            <!-- Mobile: Tasks and Project side by side -->
            <div class="grid grid-cols-2 gap-4 lg:gap-6">
                <!-- Tasks Card -->
                <div class="bg-[#7db445] rounded-2xl shadow-sm p-3 lg:p-6">
                    <div class="flex items-center gap-2 mb-3 lg:mb-6">
                        <svg class="w-5 h-5 lg:w-7 lg:h-7 text-white" fill="currentColor" viewBox="0 0 30 30">
                            <path xmlns="http://www.w3.org/2000/svg"
                                d="M15.4154 0.916016H3.7487C2.14453 0.916016 0.846615 2.22852 0.846615 3.83268L0.832031 27.166C0.832031 28.7702 2.12995 30.0827 3.73411 30.0827H21.2487C22.8529 30.0827 24.1654 28.7702 24.1654 27.166V9.66602L15.4154 0.916016ZM10.9529 24.2494L5.79036 19.0868L7.84662 17.0306L10.9383 20.1223L17.1216 13.9389L19.1779 15.9952L10.9529 24.2494ZM13.957 11.1243V3.10352L21.9779 11.1243H13.957Z" />
                        </svg>
                        <h2 class="text-base lg:text-xl font-semibold text-white">Tasks</h2>
                    </div>

                    <div class="space-y-2 lg:space-y-4">
                        <!-- Task 1 -->
                        <div class="bg-white rounded-xl p-2 lg:p-4">
                            <h3 class="font-semibold text-gray-900 text-xs lg:text-sm mb-1 lg:mb-2">Create filter to find
                                data resource</h3>
                            <p class="text-xs text-gray-500 mb-2 lg:mb-4 line-clamp-2">create button and if click data will
                                show</p>
                            <span
                                class="inline-block px-2 lg:px-3 py-1 bg-[#6fadc8] text-white text-xs font-medium rounded-md">Low</span>
                        </div>

                        <!-- Task 2 -->
                        <div class="bg-white rounded-xl p-2 lg:p-4">
                            <h3 class="font-semibold text-gray-900 text-xs lg:text-sm mb-1 lg:mb-2">Displaying and merging
                                data</h3>
                            <p class="text-xs text-gray-500 mb-2 lg:mb-4 line-clamp-2">merging data in web codelab, to make
                                easy accses and more</p>
                            <span
                                class="inline-block px-2 lg:px-3 py-1 bg-[#ffb32d] text-white text-xs font-medium rounded-md">Medium</span>
                        </div>
                    </div>
                </div>

                <!-- Project Card -->
                <div class="bg-[#ffb32d] rounded-2xl shadow-sm p-3 lg:p-6">
                    <div class="flex items-center gap-2 mb-3 lg:mb-6">
                        <svg class="w-5 h-5 lg:w-7 lg:h-7 text-white" fill="currentColor" viewBox="0 0 30 30">
                            <path
                                d="M27.0781 0.828125H1.92188C1.31689 0.828125 0.828125 1.31689 0.828125 1.92188V27.0781C0.828125 27.6831 1.31689 28.1719 1.92188 28.1719H27.0781C27.6831 28.1719 28.1719 27.6831 28.1719 27.0781V1.92188C28.1719 1.31689 27.6831 0.828125 27.0781 0.828125ZM9.57812 22.4297C9.57812 22.5801 9.45508 22.7031 9.30469 22.7031H6.57031C6.41992 22.7031 6.29688 22.5801 6.29688 22.4297V6.57031C6.29688 6.41992 6.41992 6.29688 6.57031 6.29688H9.30469C9.45508 6.29688 9.57812 6.41992 9.57812 6.57031V22.4297ZM16.1406 12.8594C16.1406 13.0098 16.0176 13.1328 15.8672 13.1328H13.1328C12.9824 13.1328 12.8594 13.0098 12.8594 12.8594V6.57031C12.8594 6.41992 12.9824 6.29688 13.1328 6.29688H15.8672C16.0176 6.29688 16.1406 6.41992 16.1406 6.57031V12.8594ZM22.7031 15.3203C22.7031 15.4707 22.5801 15.5938 22.4297 15.5938H19.6953C19.5449 15.5938 19.4219 15.4707 19.4219 15.3203V6.57031C19.4219 6.41992 19.5449 6.29688 19.6953 6.29688H22.4297C22.5801 6.29688 22.7031 6.41992 22.7031 6.57031V15.3203Z" />
                        </svg>
                        <h2 class="text-base lg:text-xl font-semibold text-white">Project</h2>
                    </div>

                    <div class="bg-white rounded-xl p-2 lg:p-4">
                        <h3 class="font-semibold text-gray-900 text-xs lg:text-sm mb-1 lg:mb-2">CODESHOP</h3>
                        <p class="text-xs text-gray-500 mb-2 lg:mb-4 line-clamp-3">Create a web, to buy mod game GTA V.
                            Payment must use
                            Dana/Paypal/Steam</p>

                        <div class="flex items-center justify-between">
                            <span
                                class="inline-block px-2 lg:px-3 py-1 bg-[#e94949] text-white text-xs font-medium rounded-md">On
                                create</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Card - Hidden on mobile -->
            <div class="bg-white rounded-2xl shadow-sm p-4 lg:p-6 hidden lg:block">
                <div class="flex items-center gap-2 mb-4 lg:mb-6">
                    <svg class="w-6 h-6 lg:w-8 lg:h-8 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z" />
                    </svg>
                    <h2 class="text-lg lg:text-2xl font-semibold text-gray-500">Activity</h2>
                </div>

                <div class="bg-gray-50 rounded-xl p-3 lg:p-4">
                    <div class="h-32 lg:h-40 flex items-end gap-1 lg:gap-2 mb-4 custom-scrollbar overflow-x-auto">
                        <!-- Activity bars -->
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 70%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Jan</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 40%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Feb</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 60%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Mar</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 90%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Apr</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 45%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">May</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 30%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Jun</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 75%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Jul</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 65%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Aug</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 20%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Sep</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 85%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Oct</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 55%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Nov</span>
                        </div>
                        <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                            <div class="w-6 lg:w-8 bg-[#6fadc8] rounded-t" style="height: 10%"></div>
                            <span class="text-[10px] lg:text-xs text-gray-500 mt-1">Dec</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('#statusFilter .status-btn');
            const cards = document.querySelectorAll('#employeeCards .employee-card');
            const emptyMessage = document.getElementById('emptyMessage');
            const emptyTitle = document.getElementById('emptyTitle');
            const emptyIcon = document.getElementById('emptyIcon');

            // Status titles mapping
            const statusTitles = {
                'ready': 'No taks ready',
                'standby': 'No employe yet',
                'notready': 'No employe yet',
                'complete': 'No taks complete',
                'absent': 'No absent today'
            };

            // Status icons mapping - Ukuran icon diperkecil
            const statusIcons = {
                'ready': `<svg class="w-4 h-4 lg:w-16 lg:h-16" viewBox="0 0 32 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 0H4C1.8 0 0.0200005 1.845 0.0200005 4.1L0 36.9C0 39.155 1.78 41 3.98 41H28C30.2 41 32 39.155 32 36.9V12.3L20 0ZM13.88 32.8L6.8 25.543L9.62 22.6525L13.86 26.9985L22.34 18.3065L25.16 21.197L13.88 32.8ZM18 14.35V3.075L29 14.35H18Z" fill="#111111"/>
                </svg>`,
                'standby': `<svg class="w-4 h-4 lg:w-16 lg:h-16" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_standby)">
                        <path d="M17.0658 22.5001H15.853C14.1979 22.4403 12.5482 22.7212 11.0062 23.3255C9.46428 23.9299 8.06296 24.8446 6.88926 26.0131L6.55469 26.4034V37.9461H12.2424V31.3941L13.0091 30.5298L13.3577 30.1255C15.1726 28.261 17.4322 26.8889 19.9236 26.1385C18.6767 25.1889 17.693 23.9365 17.0658 22.5001Z" fill="#111111"/>
                        <path d="M44.0272 25.9711C42.8535 24.8026 41.4522 23.8879 39.9102 23.2835C38.3683 22.6792 36.7186 22.3983 35.0635 22.4581C34.5559 22.4608 34.0488 22.4887 33.544 22.5417C32.9051 23.8893 31.9483 25.0615 30.7559 25.9571C33.416 26.6923 35.8256 28.1381 37.7261 30.1393L38.0746 30.5296L38.8274 31.3939V37.9599H44.32V26.3614L44.0272 25.9711Z" fill="#111111"/>
                        <path d="M15.812 19.7812H16.2441C16.0433 18.0571 16.3458 16.3117 17.1152 14.7557C17.8845 13.1998 19.0877 11.8998 20.5796 11.0126C20.0388 10.1864 19.2927 9.51483 18.4144 9.06363C17.536 8.61243 16.5556 8.39708 15.569 8.43865C14.5825 8.48023 13.6236 8.77731 12.7863 9.3008C11.9491 9.8243 11.2621 10.5563 10.7928 11.425C10.3234 12.2938 10.0877 13.2695 10.1087 14.2568C10.1298 15.244 10.4068 16.2088 10.9128 17.0568C11.4188 17.9047 12.1363 18.6068 12.9951 19.0941C13.8539 19.5815 14.8245 19.8374 15.812 19.8369V19.7812Z" fill="#111111"/>
                        <path d="M34.394 18.7357C34.4098 19.0561 34.4098 19.3772 34.394 19.6976C34.6614 19.7404 34.9317 19.7637 35.2025 19.7673H35.4674C36.4505 19.7149 37.4033 19.4088 38.233 18.8789C39.0627 18.3489 39.741 17.6131 40.2019 16.7432C40.6629 15.8733 40.8907 14.8988 40.8632 13.9147C40.8358 12.9306 40.554 11.9704 40.0452 11.1275C39.5365 10.2846 38.8182 9.58782 37.9603 9.10496C37.1023 8.6221 36.1339 8.36961 35.1495 8.37209C34.165 8.37456 33.1979 8.63192 32.3424 9.11909C31.4868 9.60626 30.7721 10.3067 30.2676 11.1521C31.5293 11.9759 32.5668 13.1 33.287 14.4236C34.0072 15.7472 34.3876 17.2289 34.394 18.7357Z" fill="#111111"/>
                        <path d="M25.249 24.9814C28.6905 24.9814 31.4804 22.1915 31.4804 18.75C31.4804 15.3084 28.6905 12.5186 25.249 12.5186C21.8075 12.5186 19.0176 15.3084 19.0176 18.75C19.0176 22.1915 21.8075 24.9814 25.249 24.9814Z" fill="#111111"/>
                        <path d="M25.5844 28.2996C23.764 28.2269 21.9476 28.5228 20.2443 29.1696C18.5411 29.8165 16.9861 30.8008 15.6727 32.0635L15.3242 32.4539V41.2782C15.3297 41.5656 15.3917 41.8492 15.5067 42.1127C15.6218 42.3761 15.7876 42.6143 15.9947 42.8137C16.2018 43.0131 16.4462 43.1697 16.7139 43.2746C16.9816 43.3795 17.2673 43.4306 17.5547 43.425H33.5723C33.8598 43.4306 34.1455 43.3795 34.4131 43.2746C34.6808 43.1697 34.9252 43.0131 35.1323 42.8137C35.3394 42.6143 35.5053 42.3761 35.6203 42.1127C35.7354 41.8492 35.7974 41.5656 35.8028 41.2782V32.4818L35.4682 32.0635C34.1639 30.7962 32.6144 29.8087 30.9148 29.1615C29.2152 28.5142 27.4014 28.221 25.5844 28.2996Z" fill="#111111"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_standby">
                            <rect width="50.1858" height="50.1858" fill="white" transform="translate(0.337891)"/>
                        </clipPath>
                    </defs>
                </svg>`,
                'notready': `<svg class="w-4 h-4 lg:w-16 lg:h-16" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_notready)">
                        <path d="M17.0658 22.5001H15.853C14.1979 22.4403 12.5482 22.7212 11.0062 23.3255C9.46428 23.9299 8.06296 24.8446 6.88926 26.0131L6.55469 26.4034V37.9461H12.2424V31.3941L13.0091 30.5298L13.3577 30.1255C15.1726 28.261 17.4322 26.8889 19.9236 26.1385C18.6767 25.1889 17.693 23.9365 17.0658 22.5001Z" fill="#111111"/>
                        <path d="M44.0272 25.9711C42.8535 24.8026 41.4522 23.8879 39.9102 23.2835C38.3683 22.6792 36.7186 22.3983 35.0635 22.4581C34.5559 22.4608 34.0488 22.4887 33.544 22.5417C32.9051 23.8893 31.9483 25.0615 30.7559 25.9571C33.416 26.6923 35.8256 28.1381 37.7261 30.1393L38.0746 30.5296L38.8274 31.3939V37.9599H44.32V26.3614L44.0272 25.9711Z" fill="#111111"/>
                        <path d="M15.812 19.7812H16.2441C16.0433 18.0571 16.3458 16.3117 17.1152 14.7557C17.8845 13.1998 19.0877 11.8998 20.5796 11.0126C20.0388 10.1864 19.2927 9.51483 18.4144 9.06363C17.536 8.61243 16.5556 8.39708 15.569 8.43865C14.5825 8.48023 13.6236 8.77731 12.7863 9.3008C11.9491 9.8243 11.2621 10.5563 10.7928 11.425C10.3234 12.2938 10.0877 13.2695 10.1087 14.2568C10.1298 15.244 10.4068 16.2088 10.9128 17.0568C11.4188 17.9047 12.1363 18.6068 12.9951 19.0941C13.8539 19.5815 14.8245 19.8374 15.812 19.8369V19.7812Z" fill="#111111"/>
                        <path d="M34.394 18.7357C34.4098 19.0561 34.4098 19.3772 34.394 19.6976C34.6614 19.7404 34.9317 19.7637 35.2025 19.7673H35.4674C36.4505 19.7149 37.4033 19.4088 38.233 18.8789C39.0627 18.3489 39.741 17.6131 40.2019 16.7432C40.6629 15.8733 40.8907 14.8988 40.8632 13.9147C40.8358 12.9306 40.554 11.9704 40.0452 11.1275C39.5365 10.2846 38.8182 9.58782 37.9603 9.10496C37.1023 8.6221 36.1339 8.36961 35.1495 8.37209C34.165 8.37456 33.1979 8.63192 32.3424 9.11909C31.4868 9.60626 30.7721 10.3067 30.2676 11.1521C31.5293 11.9759 32.5668 13.1 33.287 14.4236C34.0072 15.7472 34.3876 17.2289 34.394 18.7357Z" fill="#111111"/>
                        <path d="M25.249 24.9814C28.6905 24.9814 31.4804 22.1915 31.4804 18.75C31.4804 15.3084 28.6905 12.5186 25.249 12.5186C21.8075 12.5186 19.0176 15.3084 19.0176 18.75C19.0176 22.1915 21.8075 24.9814 25.249 24.9814Z" fill="#111111"/>
                        <path d="M25.5844 28.2996C23.764 28.2269 21.9476 28.5228 20.2443 29.1696C18.5411 29.8165 16.9861 30.8008 15.6727 32.0635L15.3242 32.4539V41.2782C15.3297 41.5656 15.3917 41.8492 15.5067 42.1127C15.6218 42.3761 15.7876 42.6143 15.9947 42.8137C16.2018 43.0131 16.4462 43.1697 16.7139 43.2746C16.9816 43.3795 17.2673 43.4306 17.5547 43.425H33.5723C33.8598 43.4306 34.1455 43.3795 34.4131 43.2746C34.6808 43.1697 34.9252 43.0131 35.1323 42.8137C35.3394 42.6143 35.5053 42.3761 35.6203 42.1127C35.7354 41.8492 35.7974 41.5656 35.8028 41.2782V32.4818L35.4682 32.0635C34.1639 30.7962 32.6144 29.8087 30.9148 29.1615C29.2152 28.5142 27.4014 28.221 25.5844 28.2996Z" fill="#111111"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_notready">
                            <rect width="50.1858" height="50.1858" fill="white" transform="translate(0.337891)"/>
                        </clipPath>
                    </defs>
                </svg>`,
                'complete': `<svg class="w-4 h-4 lg:w-16 lg:h-16" viewBox="0 0 32 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 0H4C1.8 0 0.0200005 1.845 0.0200005 4.1L0 36.9C0 39.155 1.78 41 3.98 41H28C30.2 41 32 39.155 32 36.9V12.3L20 0ZM13.88 32.8L6.8 25.543L9.62 22.6525L13.86 26.9985L22.34 18.3065L25.16 21.197L13.88 32.8ZM18 14.35V3.075L29 14.35H18Z" fill="#111111"/>
                </svg>`,
                'absent': `<svg class="w-4 h-4 lg:w-16 lg:h-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42.6562 48.542L35.4167 41.3024V41.667H2.08333V35.8337C2.08333 34.6531 2.3875 33.5684 2.99583 32.5795C3.60417 31.5906 4.41111 30.835 5.41667 30.3128C7.56944 29.2364 9.75694 28.4295 11.9792 27.892C14.2014 27.3545 16.4583 27.085 18.75 27.0837C19.1667 27.0837 19.5924 27.0927 20.0271 27.1107C20.4618 27.1288 20.8868 27.1545 21.3021 27.1878L19.1146 25.0003H18.75C16.4583 25.0003 14.4965 24.1844 12.8646 22.5524C11.2326 20.9205 10.4167 18.9587 10.4167 16.667V16.3024L1.40625 7.29199L4.375 4.32324L45.625 45.5732L42.6562 48.542ZM34.6875 27.3962C36.4583 27.6045 38.125 27.9607 39.6875 28.4649C41.25 28.9691 42.7083 29.585 44.0625 30.3128C45.3125 31.0073 46.2674 31.7795 46.9271 32.6295C47.5868 33.4795 47.9167 34.4087 47.9167 35.417V41.667H47.6562L39.3229 33.3337C39.0104 32.1878 38.4632 31.1031 37.6813 30.0795C36.8993 29.0559 35.9014 28.1614 34.6875 27.3962ZM29.2708 23.2816C29.9306 22.3094 30.4257 21.2677 30.7562 20.1566C31.0868 19.0455 31.2514 17.8823 31.25 16.667C31.25 15.2087 30.9986 13.8024 30.4958 12.4482C29.9931 11.0941 29.2722 9.86144 28.3333 8.75032C28.8194 8.57671 29.3056 8.46421 29.7917 8.41283C30.2778 8.36144 30.7639 8.33505 31.25 8.33366C33.5417 8.33366 35.5035 9.14963 37.1354 10.7816C38.7674 12.4135 39.5833 14.3753 39.5833 16.667C39.5833 18.9587 38.7243 20.9205 37.0063 22.5524C35.2882 24.1844 33.2826 25.0003 30.9896 25.0003L29.2708 23.2816ZM26.25 20.2607L15.1562 9.16699C15.7118 8.88921 16.2847 8.68088 16.875 8.54199C17.4653 8.4031 18.0903 8.33366 18.75 8.33366C21.0417 8.33366 23.0035 9.14963 24.6354 10.7816C26.2674 12.4135 27.0833 14.3753 27.0833 16.667C27.0833 17.3267 27.0139 17.9517 26.875 18.542C26.7361 19.1323 26.5278 19.7052 26.25 20.2607Z" fill="#111111"/>
                </svg>`
            };

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

                // Tampilkan/sembunyikan empty message dan update title & icon
                if (visibleCount === 0) {
                    emptyMessage.classList.remove('hidden');
                    emptyTitle.textContent = statusTitles[status] || 'No tasks';
                    emptyIcon.innerHTML = statusIcons[status] || '';
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
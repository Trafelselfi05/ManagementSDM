{{-- @extends('admin/layout')

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
                    <!-- Employee Card - Ready 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100"
                        data-status="ready">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Athena Cyntia</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UX Designer</p>
                            </div>

                            <div class="flex md:hidden gap-2 items-center flex-wrap">
                                <div
                                    class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                    <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                                </div>
                                <div
                                    class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                    <span class="text-xs lg:text-sm font-semibold text-white">High</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 mb-3 line-clamp-2">
                            Design landing & prototype page farm app
                        </p>
                        <!-- Container flex untuk kedua badge -->
                        <div class="md:flex hidden gap-2 items-center flex-wrap">
                            <div
                                class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                            </div>
                            <div
                                class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                <span class="text-xs lg:text-sm font-semibold text-white">High</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Ready 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-2 lg:p-4 border border-gray-100"
                        data-status="ready">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Athena Cyntia</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UX Designer</p>
                            </div>

                            <!-- Container flex untuk kedua badge -->
                            <div class="flex md:hidden gap-2 items-center flex-wrap">
                                <div
                                    class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                    <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                                </div>
                                <div
                                    class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                    <span class="text-xs lg:text-sm font-semibold text-white">High</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 mb-3 line-clamp-2">
                            Design landing & prototype page farm app
                        </p>
                        <!-- Container flex untuk kedua badge -->
                        <div class="hidden md:flex gap-2 items-center flex-wrap">
                            <div
                                class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                            </div>
                            <div
                                class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                <span class="text-xs lg:text-sm font-semibold text-white">High</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Ready 3 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100"
                        data-status="ready">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Athena Cyntia</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UX Designer</p>
                            </div>

                            <div class="flex md:hidden gap-2 items-center flex-wrap">
                                <div
                                    class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                    <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                                </div>
                                <div
                                    class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                    <span class="text-xs lg:text-sm font-semibold text-white">High</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 mb-3 line-clamp-2">
                            Design landing & prototype page farm app
                        </p>
                        <!-- Container flex untuk kedua badge -->
                        <div class="md:flex hidden gap-2 items-center flex-wrap">
                            <div
                                class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                            </div>
                            <div
                                class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                <span class="text-xs lg:text-sm font-semibold text-white">High</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card 1 - Absent -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="absent">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-62-1.svg" alt="Mariah Carey"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Mariah Carey</h3>
                                <p class="text-xs lg:text-sm text-gray-500">3 day off</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Sick</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 line-clamp-3">
                            Good morning, I have the flu and a fairly high fever, so I need to see a doctor.
                        </p>
                    </div>

                    <!-- Employee Card 2 - Absent -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="absent">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-62.svg" alt="Azzahra"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Azzahra</h3>
                                <p class="text-xs lg:text-sm text-gray-500">14 day off</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Sick</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 line-clamp-3">
                            I'm sorry, I am unable to work as I am currently giving birth and need time for recovery.
                        </p>
                    </div>

                    <!-- Standby Status Cards -->
                    <!-- Employee Card - Standby 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="standby">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58.png" alt="Adison Herwitz"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Adison Herwitz</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Standby 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="standby">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-10.svg" alt="Corey Culhane"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Corey Culhane</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- NotReady Status Cards -->
                    <!-- Employee Card - notReady 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="notready">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58.png" alt="Adison Herwitz"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Adison Herwitz</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Not Ready 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="notready">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-1.svg" alt="Corey Culhane"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Corey Culhane</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Not Ready 3 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="notready">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-5.svg" alt="Maria Dias"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Maria Dias</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Complete Status Cards -->
                    <!-- Employee Card - Complete 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="complete">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Athena Cyntia</h3>
                                <p class="text-xs lg:text-sm text-gray-500">UX Designer</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 mb-3 line-clamp-2">
                            Design landing & prototype page farm app
                        </p>
                        <div
                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                            <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                        </div>
                    </div>

                    <!-- Employee Card - Complete 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="complete">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-56.png" alt="Max Verstappen"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Max Verstappen</h3>
                                <p class="text-xs lg:text-sm text-gray-500">Data Science</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Working on Project R :</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 mb-3 line-clamp-2">
                            Creating a dataset of user accounts
                        </p>
                        <div
                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                            <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                        </div>
                    </div>

                    <!-- Employee Card - Complete 3 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100 hidden"
                        data-status="complete">
                        <div class="flex items-start gap-3 mb-3 lg:mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-59.png" alt="Kylo Finn"
                                class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                            <div class="min-w-0 flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">Kylo Finn</h3>
                                <p class="text-xs lg:text-sm text-gray-500">Back End Developer</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-xs lg:text-sm font-semibold text-gray-900">Working on Web Codelab :</span>
                        </div>
                        <p class="text-xs lg:text-sm text-gray-600 mb-3 line-clamp-2">
                            Fix the wordpress in Project A there's some bug when click account
                        </p>
                        <div
                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                            <span class="text-xs lg:text-sm font-semibold text-white">Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
@endsection --}}


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
                        class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-900 text-white font-medium text-xs lg:text-sm shadow-sm">Ready</button>
                    <button data-status="standby"
                        class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">Stand
                        by</button>
                    <button data-status="notready"
                        class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">Not
                        ready</button>
                    <button data-status="complete"
                        class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">Complete</button>
                    <button data-status="absent"
                        class="status-btn px-3 lg:px-6 py-2 lg:py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs lg:text-sm shadow-sm hover:bg-gray-200 transition-colors">Absent</button>
                </div>

                <!-- Employee Cards Grid (dynamic) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6" id="employeeCards">
                    @foreach ($users as $u)
                        <div class="employee-card bg-white rounded-xl shadow-sm p-3 lg:p-4 border border-gray-100"
                            data-status="{{ strtolower($u['frontend_status']) }}">
                            <div class="flex items-start gap-3 mb-3 lg:mb-4">
                                <img src="{{ $u['image'] }}" alt="{{ $u['name'] }}"
                                    class="w-10 h-10 lg:w-14 lg:h-14 rounded-full object-cover flex-shrink-0">
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-semibold text-gray-900 text-sm lg:text-base truncate">
                                        {{ $u['name'] }}</h3>
                                    <p class="text-xs lg:text-sm text-gray-500">{{ $u['division'] ?? '-' }}</p>
                                </div>

                                {{-- small badges for mobile --}}
                                <div class="flex md:hidden gap-2 items-center flex-wrap">
                                    @if ($u['task'])
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                            <span
                                                class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['status'] ?? '') }}</span>
                                        </div>
                                        <div
                                            class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                            <span
                                                class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['level'] ?? '') }}</span>
                                        </div>
                                    @else
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-gray-200 rounded-[10px]">
                                            <span class="text-xs lg:text-sm font-semibold text-gray-700">No Task</span>
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
                                {{ $u['task']['name'] ?? ($u['dashboard_status'] === 'absent' ? 'Absent' : 'No task today') }}
                            </p>

                            <div class="hidden md:flex gap-2 items-center flex-wrap">
                                @if ($u['task'])
                                    <div
                                        class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#7db445] rounded-[10px]">
                                        <span
                                            class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['status']) }}</span>
                                    </div>
                                    <div
                                        class="flex w-[60px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                        <span
                                            class="text-xs lg:text-sm font-semibold text-white">{{ ucfirst($u['task']['level']) }}</span>
                                    </div>
                                @else
                                    @if ($u['dashboard_status'] === 'absent')
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-[#e94949] rounded-[10px]">
                                            <span class="text-xs lg:text-sm font-semibold text-white">Absent</span>
                                        </div>
                                    @else
                                        <div
                                            class="flex w-[75px] lg:w-[91px] h-[25px] lg:h-[29px] items-center justify-center gap-2.5 px-[6px] lg:px-[7px] py-[4px] lg:py-[5px] bg-gray-200 rounded-[10px]">
                                            <span class="text-xs lg:text-sm font-semibold text-gray-700">No Task</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

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

                // event click
                buttons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const status = this.getAttribute('data-status').toLowerCase();
                        setActiveButton(this);
                        filterCards(status);
                    });
                });

                // tampilkan default (misal ready)
                const defaultBtn = document.querySelector('#statusFilter .status-btn[data-status="ready"]');
                if (defaultBtn) defaultBtn.click();
            });
        </script>

@endsection

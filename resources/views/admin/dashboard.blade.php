@extends('admin/layout')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="grid grid-cols-1 rounded-[20px] xl:grid-cols-3 gap-6 ">
        <!-- Main Dashboard Content -->
        <div class="xl:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <!-- Status Filter Tabs -->
                <div class="flex flex-wrap gap-4 mb-6" id="statusFilter">
                    <button data-status="ready"
                        class="status-btn px-6 py-3 rounded-lg bg-gray-900 text-white font-medium text-sm shadow-sm">
                        Ready
                    </button>
                    <button data-status="standby"
                        class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                        Stand by
                    </button>
                    <button data-status="notready"
                        class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                        Not ready
                    </button>
                    <button data-status="complete"
                        class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                        Complete
                    </button>
                    <button data-status="absent"
                        class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                        Absent
                    </button>
                </div>

                <!-- Employee Cards Grid -->
                                <!-- Employee Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="employeeCards">
                    <!-- Employee Card - Ready 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100"
                        data-status="ready">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Athena Cyntia</h3>
                                <p class="text-sm text-gray-500">UX Designer</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">
                            Design landing & prototype page farm app
                        </p>
                        <!-- Container flex untuk kedua badge -->
                        <div class="flex gap-2 items-center">
                            <div
                                class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                                <span class="text-sm font-semibold text-white">Complete</span>
                            </div>
                            <div
                                class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#e94949] rounded-[10px]">
                                <span class="text-sm font-semibold text-white">High</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Ready 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100"
                        data-status="ready">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Athena Cyntia</h3>
                                <p class="text-sm text-gray-500">UX Designer</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">
                            Design landing & prototype page farm app
                        </p>
                        <!-- Container flex untuk kedua badge -->
                        <div class="flex gap-2 items-center">
                            <div
                                class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                                <span class="text-sm font-semibold text-white">Complete</span>
                            </div>
                            <div
                                class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#e94949] rounded-[10px]">
                                <span class="text-sm font-semibold text-white">High</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Ready 3 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100"
                        data-status="ready">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Athena Cyntia</h3>
                                <p class="text-sm text-gray-500">UX Designer</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">
                            Design landing & prototype page farm app
                        </p>
                        <!-- Container flex untuk kedua badge -->
                        <div class="flex gap-2 items-center">
                            <div
                                class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                                <span class="text-sm font-semibold text-white">Complete</span>
                            </div>
                            <div
                                class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#e94949] rounded-[10px]">
                                <span class="text-sm font-semibold text-white">High</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card 1 - Absent -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="absent">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-62-1.svg" alt="Mariah Carey"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Mariah Carey</h3>
                                <p class="text-sm text-gray-500">3 day off</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Sick</span>
                        </div>
                        <p class="text-sm text-gray-600">
                            Good morning, I have the flu and a fairly high fever, so I need to see a doctor.
                        </p>
                    </div>

                    <!-- Employee Card 2 - Absent -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="absent">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-62.svg" alt="Azzahra"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Azzahra</h3>
                                <p class="text-sm text-gray-500">14 day off</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Sick</span>
                        </div>
                        <p class="text-sm text-gray-600">
                            I'm sorry, I am unable to work as I am currently giving birth and need time for recovery.
                        </p>
                    </div>

                    <!-- Standby Status Cards -->
                    <!-- Employee Card - Standby 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="standby">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58.png" alt="Adison Herwitz"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Adison Herwitz</h3>
                                <p class="text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Standby 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="standby">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-10.svg" alt="Corey Culhane"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Corey Culhane</h3>
                                <p class="text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- NotReady Status Cards -->
                    <!-- Employee Card - notReady 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="notready">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58.png" alt="Adison Herwitz"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Adison Herwitz</h3>
                                <p class="text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Not Ready 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="notready">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-1.svg" alt="Corey Culhane"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Corey Culhane</h3>
                                <p class="text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Card - Not Ready 3 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="notready">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-5.svg" alt="Maria Dias"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Maria Dias</h3>
                                <p class="text-sm text-gray-500">UI Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Complete Status Cards -->
                    <!-- Employee Card - Complete 1 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="complete">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Athena Cyntia</h3>
                                <p class="text-sm text-gray-500">UX Designer</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Working on Farm App :</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">
                            Design landing & prototype page farm app
                        </p>
                        <div
                            class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                            <span class="text-sm font-semibold text-white">Complete</span>
                        </div>
                    </div>

                    <!-- Employee Card - Complete 2 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="complete">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-56.png" alt="Max Verstappen"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Max Verstappen</h3>
                                <p class="text-sm text-gray-500">Data Science</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Working on Project R :</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">
                            Creating a dataset of user accounts
                        </p>
                        <div
                            class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                            <span class="text-sm font-semibold text-white">Complete</span>
                        </div>
                    </div>

                    <!-- Employee Card - Complete 3 -->
                    <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden"
                        data-status="complete">
                        <div class="flex items-start gap-3 mb-4">
                            <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-59.png" alt="Kylo Finn"
                                class="w-14 h-14 rounded-full object-cover">
                            <div>
                                <h3 class="font-semibold text-gray-900">Kylo Finn</h3>
                                <p class="text-sm text-gray-500">Back End Developer</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm font-semibold text-gray-900">Working on Web Codelab :</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">
                            Fix the wordpress in Project A there's some bug when click account
                        </p>
                        <div
                            class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                            <span class="text-sm font-semibold text-white">Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Right Sidebar -->
        <div class="space-y-6">
            <!-- Tasks Card -->
            <div class="bg-[#7db445] rounded-2xl shadow-sm p-6">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-white">Tasks</h2>
                </div>

                <div class="space-y-4">
                    <!-- Task 1 -->
                    <div class="bg-white rounded-xl p-4">
                        <h3 class="font-semibold text-gray-900 text-sm mb-2">Create filter to find data resource</h3>
                        <p class="text-xs text-gray-500 mb-4">create button and if click data will show</p>
                        <span
                            class="inline-block px-3 py-1 bg-[#6fadc8] text-white text-xs font-medium rounded-md">Low</span>
                    </div>

                    <!-- Task 2 -->
                    <div class="bg-white rounded-xl p-4">
                        <h3 class="font-semibold text-gray-900 text-sm mb-2">Displaying and merging data</h3>
                        <p class="text-xs text-gray-500 mb-4">merging data in web codelab, to make easy accses and more</p>
                        <span
                            class="inline-block px-3 py-1 bg-[#ffb32d] text-white text-xs font-medium rounded-md">Medium</span>
                    </div>
                </div>
            </div>

            <!-- Project Card -->
            <div class="bg-[#ffb32d] rounded-2xl shadow-sm p-6">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19,3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9,17H7v-7h2v7zm4,0h-2V7h2v10zm4,0h-2v-4h2v4z" />
                    </svg>
                    <h2 class="text-xl font-semibold text-white">Project</h2>
                </div>

                <div class="bg-white rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 text-sm mb-2">CODESHOP</h3>
                    <p class="text-xs text-gray-500 mb-4">Create a web, to buy mod game GTA V. Payment must use
                        Dana/Paypal/Steam</p>

                    <div class="flex items-center justify-between">
                        <span class="inline-block px-3 py-1 bg-[#e94949] text-white text-xs font-medium rounded-md">On
                            create</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z" />
                    </svg>
                    <h2 class="text-2xl font-semibold text-gray-500">Activity</h2>
                </div>

                <div class="bg-gray-50 rounded-xl p-4">
                    <div class="h-40 flex items-end gap-2 mb-4 custom-scrollbar overflow-x-auto">
                        <!-- Activity bars would go here -->
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 70%"></div>
                            <span class="text-xs text-gray-500 mt-1">Jan</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 40%"></div>
                            <span class="text-xs text-gray-500 mt-1">Feb</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 60%"></div>
                            <span class="text-xs text-gray-500 mt-1">Mar</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 90%"></div>
                            <span class="text-xs text-gray-500 mt-1">Apr</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 45%"></div>
                            <span class="text-xs text-gray-500 mt-1">May</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 30%"></div>
                            <span class="text-xs text-gray-500 mt-1">Jun</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 75%"></div>
                            <span class="text-xs text-gray-500 mt-1">Jul</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 65%"></div>
                            <span class="text-xs text-gray-500 mt-1">Aug</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 20%"></div>
                            <span class="text-xs text-gray-500 mt-1">Sep</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 85%"></div>
                            <span class="text-xs text-gray-500 mt-1">Oct</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 55%"></div>
                            <span class="text-xs text-gray-500 mt-1">Nov</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-[#6fadc8] rounded-t" style="height: 10%"></div>
                            <span class="text-xs text-gray-500 mt-1">Dec</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('user/layout')

@section('title', 'Employee Dashboard')

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <!-- Main Dashboard Content -->
    <div class="xl:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <!-- Status Filter Tabs -->
            <div class="flex flex-wrap gap-4 mb-6" id="statusFilter">
                <button data-status="ready" class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Ready
                </button>
                <button data-status="standby" class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Stand by
                </button>
                <button data-status="notready" class="status-btn px-6 py-3 rounded-lg bg-gray-900 text-white font-medium text-sm shadow-sm">
                    Not ready
                </button>
                <button data-status="complete" class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Complete
                </button>
                <button data-status="absent" class="status-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium text-sm shadow-sm hover:bg-gray-200 transition-colors">
                    Absent
                </button>
            </div>

            <!-- Employee Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="employeeCards">
                <!-- Employee Card 1 - Absent -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="absent">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-62-1.svg" alt="Mariah Carey" class="w-14 h-14 rounded-full object-cover">
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
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="absent">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-62.svg" alt="Azzahra" class="w-14 h-14 rounded-full object-cover">
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

                <!-- Employee Card 3 - Absent -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="absent">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/4fb8a15d9469797cc67672c211572bd6-1.png" alt="Carlo Felloso" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Carlo Felloso</h3>
                            <p class="text-sm text-gray-500">8 day off</p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-sm font-semibold text-gray-900">Other</span>
                    </div>
                    <p class="text-sm text-gray-600">
                        i got incident last night, now im in hospital for recovery
                    </p>
                </div>

                <!-- Employee Card 4 - Absent -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="absent">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/4fb8a15d9469797cc67672c211572bd6-2.png" alt="Carla Victoria" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Carla Victoria</h3>
                            <p class="text-sm text-gray-500">1 day off</p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-sm font-semibold text-gray-900">University Activities</span>
                    </div>
                    <p class="text-sm text-gray-600">
                        i can go office yesterday cus i should go to university, i had activities with my collegan and my lecture
                    </p>
                </div>

                <!-- Employee Card 5 - Absent -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="absent">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-63-1.svg" alt="Rachel" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Rachel</h3>
                            <p class="text-sm text-gray-500">1 day off</p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-sm font-semibold text-gray-900">Family Activities</span>
                    </div>
                    <p class="text-sm text-gray-600">
                        Hii, sorry for tomorrow im so busy cus i should help my church to decoration before christmas. i just need 1 day off to do that.
                    </p>
                </div>

                <!-- Employee Card 6 - Absent -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="absent">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-63.svg" alt="Allena Tifa" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Allena Tifa</h3>
                            <p class="text-sm text-gray-500">2 day off</p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-sm font-semibold text-gray-900">Sick</span>
                    </div>
                    <p class="text-sm text-gray-600">
                        Sorry i cant come in meet cus i feel catch a cold, i should take a rest around 2 days. Thanks.
                    </p>
                </div>

                <!-- Standby Status Cards -->
                <!-- Employee Card - Standby 1 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58.png" alt="Adison Herwitz" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Adison Herwitz</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 2 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-10.svg" alt="Corey Culhane" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Corey Culhane</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 3 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-6.svg" alt="Maria Dias" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Maria Dias</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 4 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-8.svg" alt="Tatiana Dias" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Tatiana Dias</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 5 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-5.svg" alt="Marilyn Saris" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Marilyn Saris</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 6 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-18.svg" alt="Maria Carder" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Maria Carder</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 7 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-9.svg" alt="Miracle Lubin" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Miracle Lubin</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 8 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-12.svg" alt="Kianna Gouse" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Kianna Gouse</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 9 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-11.svg" alt="Chance George" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Chance George</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 10 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-17.svg" alt="Jaxson Torff" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Jaxson Torff</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 11 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-13.svg" alt="Adison Herwitz" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Adison Herwitz</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Employee Card - Standby 12 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="standby">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-20.svg" alt="Phillip Franci" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Phillip Franci</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#ffb32d] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Standby</span>
                    </div>
                </div>

                <!-- Not Ready Status Cards -->
                <!-- Employee Card - Not Ready 1 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58.png" alt="Adison Herwitz" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Adison Herwitz</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 2 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-1.svg" alt="Corey Culhane" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Corey Culhane</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 3 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-5.svg" alt="Maria Dias" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Maria Dias</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 4 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-6.svg" alt="Tatiana Dias" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Tatiana Dias</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 5 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-4.svg" alt="Marilyn Saris" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Marilyn Saris</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 6 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-7.svg" alt="Maria Carder" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Maria Carder</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 7 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-10.svg" alt="Miracle Lubin" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Miracle Lubin</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 8 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-2.svg" alt="Kianna Gouse" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Kianna Gouse</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 9 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-9.svg" alt="Chance George" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Chance George</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 10 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-8.svg" alt="Phillip Franci" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Phillip Franci</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Card - Not Ready 11 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="notready">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metpkkriuDDnSU/img/image-58-3.svg" alt="Maria Aminoff" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Maria Aminoff</h3>
                            <p class="text-sm text-gray-500">UI Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Complete Status Cards -->
                <!-- Employee Card - Complete 1 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100" data-status="complete">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-60.png" alt="Athena Cyntia" class="w-14 h-14 rounded-full object-cover">
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
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Complete</span>
                    </div>
                </div>

                <!-- Employee Card - Complete 2 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100" data-status="complete">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-56.png" alt="Max Verstappen" class="w-14 h-14 rounded-full object-cover">
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
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Complete</span>
                    </div>
                </div>

                <!-- Employee Card - Complete 3 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100" data-status="complete">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-59.png" alt="Kylo Finn" class="w-14 h-14 rounded-full object-cover">
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
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Complete</span>
                    </div>
                </div>

                <!-- Employee Card - Complete 4 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100" data-status="complete">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-58.png" alt="Fathia" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Fathia</h3>
                            <p class="text-sm text-gray-500">UX Designer</p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-sm font-semibold text-gray-900">Working on Web Codelab :</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-3">
                        Design landing page
                    </p>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Complete</span>
                    </div>
                </div>

                <!-- Employee Card - Complete 5 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100" data-status="complete">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-54.png" alt="Erika" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Erika</h3>
                            <p class="text-sm text-gray-500">Copywriter</p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-sm font-semibold text-gray-900">Working on Project Market :</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-3">
                        Make a new promotion for a new product in market web
                    </p>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Complete</span>
                    </div>
                </div>

                <!-- Employee Card - Complete 6 -->
                <div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100" data-status="complete">
                    <div class="flex items-start gap-3 mb-4">
                        <img src="https://c.animaapp.com/metnxwl0qnRrKd/img/image-63.png" alt="Jasmine" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">Jasmine</h3>
                            <p class="text-sm text-gray-500">Photograph</p>
                        </div>
                    </div>
                    <div class="mb-2">
                        <span class="text-sm font-semibold text-gray-900">Working on Web Codelab :</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-3">
                        Displaying and merging data code
                    </p>
                    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
                        <span class="text-sm font-semibold text-white">Complete</span>
                    </div>
                </div>

                <!-- Employee Card - Ready 1 -->
<div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="ready">
    <div class="flex items-start gap-3 mb-4">
        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-14.svg" alt="John Smith" class="w-14 h-14 rounded-full object-cover">
        <div>
            <h3 class="font-semibold text-gray-900">John Smith</h3>
            <p class="text-sm text-gray-500">Frontend Developer</p>
        </div>
    </div>
    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
        <span class="text-sm font-semibold text-white">Ready</span>
    </div>
</div>

<!-- Employee Card - Ready 2 -->
<div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="ready">
    <div class="flex items-start gap-3 mb-4">
        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-15.svg" alt="Sarah Johnson" class="w-14 h-14 rounded-full object-cover">
        <div>
            <h3 class="font-semibold text-gray-900">Sarah Johnson</h3>
            <p class="text-sm text-gray-500">Backend Developer</p>
        </div>
    </div>
    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
        <span class="text-sm font-semibold text-white">Ready</span>
    </div>
</div>

<!-- Employee Card - Ready 3 -->
<div class="employee-card bg-white rounded-xl shadow-sm p-4 border border-gray-100 hidden" data-status="ready">
    <div class="flex items-start gap-3 mb-4">
        <img src="https://c.animaapp.com/metpzcidpe2q9o/img/image-58-16.svg" alt="Michael Brown" class="w-14 h-14 rounded-full object-cover">
        <div>
            <h3 class="font-semibold text-gray-900">Michael Brown</h3>
            <p class="text-sm text-gray-500">Full Stack Developer</p>
        </div>
    </div>
    <div class="flex w-[91px] h-[29px] items-center justify-center gap-2.5 px-[7px] py-[5px] bg-[#7db445] rounded-[10px]">
        <span class="text-sm font-semibold text-white">Ready</span>
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
                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                </svg>
                <h2 class="text-xl font-semibold text-white">Tasks</h2>
            </div>

            <div class="space-y-4">
                <!-- Task 1 -->
                <div class="bg-white rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 text-sm mb-2">Create filter to find data resource</h3>
                    <p class="text-xs text-gray-500 mb-4">create button and if click data will show</p>
                    <span class="inline-block px-3 py-1 bg-[#6fadc8] text-white text-xs font-medium rounded-md">Low</span>
                </div>

                <!-- Task 2 -->
                <div class="bg-white rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 text-sm mb-2">Displaying and merging data</h3>
                    <p class="text-xs text-gray-500 mb-4">merging data in web codelab, to make easy accses and more</p>
                    <span class="inline-block px-3 py-1 bg-[#ffb32d] text-white text-xs font-medium rounded-md">Medium</span>
                </div>
            </div>
        </div>

        <!-- Project Card -->
        <div class="bg-[#ffb32d] rounded-2xl shadow-sm p-6">
            <div class="flex items-center gap-2 mb-6">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19,3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9,17H7v-7h2v7zm4,0h-2V7h2v10zm4,0h-2v-4h2v4z"/>
                </svg>
                <h2 class="text-xl font-semibold text-white">Project</h2>
            </div>

            <div class="bg-white rounded-xl p-4">
                <h3 class="font-semibold text-gray-900 text-sm mb-2">CODESHOP</h3>
                <p class="text-xs text-gray-500 mb-4">Create a web, to buy mod game GTA V. Payment must use Dana/Paypal/Steam</p>
                
                <div class="flex items-center justify-between">
                    <span class="inline-block px-3 py-1 bg-[#e94949] text-white text-xs font-medium rounded-md">On create</span>
                    
                    <div class="flex -space-x-2">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-65.svg" alt="Team member" class="w-7 h-7 rounded-full border-2 border-white">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-66.svg" alt="Team member" class="w-7 h-7 rounded-full border-2 border-white">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-67.svg" alt="Team member" class="w-7 h-7 rounded-full border-2 border-white">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-68.svg" alt="Team member" class="w-7 h-7 rounded-full border-2 border-white">
                        <img src="https://c.animaapp.com/metjaxbj7h5wfa/img/ellipse-69.svg" alt="Team member" class="w-7 h-7 rounded-full border-2 border-white">
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Card -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center gap-2 mb-6">
                <svg class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z"/>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusButtons = document.querySelectorAll('.status-btn');
    const employeeCards = document.querySelectorAll('.employee-card');
    
    // Set initial state - show only complete employees
    filterEmployees('complete');
    
    statusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const status = this.getAttribute('data-status');
            
            // Update button styles
            statusButtons.forEach(btn => {
                btn.classList.remove('bg-gray-900', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            });
            
            this.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            this.classList.add('bg-gray-900', 'text-white');
            
            // Filter employees
            filterEmployees(status);
        });
    });
    
    function filterEmployees(status) {
        employeeCards.forEach(card => {
            if (card.getAttribute('data-status') === status) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
        
        // If no cards visible for this status, show message
        const visibleCards = document.querySelectorAll(`.employee-card[data-status="${status}"]:not(.hidden)`);
        if (visibleCards.length === 0) {
            // Create a message element if it doesn't exist
            let messageElement = document.getElementById('noEmployeesMessage');
            if (!messageElement) {
                messageElement = document.createElement('div');
                messageElement.id = 'noEmployeesMessage';
                messageElement.className = 'col-span-full text-center py-8 text-gray-500';
                document.getElementById('employeeCards').appendChild(messageElement);
            }
            messageElement.textContent = `No employees with status: ${status}`;
        } else {
            // Remove message if it exists
            const messageElement = document.getElementById('noEmployeesMessage');
            if (messageElement) {
                messageElement.remove();
            }
        }
    }
});
</script>
@endsection
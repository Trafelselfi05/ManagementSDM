@extends('admin/layout')

@section('title', 'Projects')

@section('content')
<section class="w-full bg-white rounded-[20px] shadow-[0_0_4px_rgba(0,0,0,0.25)] p-8">
    <!-- Filter Section -->
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2">
            <img class="w-6 h-6" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" />
            <span class="text-gray-500 text-lg font-medium">Filter</span>
        </div>
    </div>

    <!-- Employee Cards Grid -->
    <div class="grid grid-cols-3 gap-6">
        <!-- Employee Card 1 -->
        <div class="bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] p-6">
            <div class="flex items-center gap-3 mb-6">
                <img class="w-20 h-20 rounded-full" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mask-group.png" />
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">Carla Lalisa</h3>
                    <p class="text-gray-500">Copywriter</p>
                </div>
            </div>
            
            <div class="flex justify-between items-center mb-6">
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Project</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">10</span>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Tasks done</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">210</span>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Leave entitlement</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">2</span>
                    </div>
                </div>
            </div>
            
            <div>
                <p class="text-base font-medium text-gray-900 mb-2">Work hours</p>
                <div class="w-full bg-gray-300 rounded-full h-6">
                    <div class="bg-blue-900 rounded-full h-6" style="width: 45%">
                        <span class="text-white text-sm float-right mr-2">45%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Card 2 -->
        <div class="bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] p-6">
            <div class="flex items-center gap-3 mb-6">
                <img class="w-20 h-20 rounded-full" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mask-group-1.png" />
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">Tony Hank</h3>
                    <p class="text-gray-500">AI Developer</p>
                </div>
            </div>
            
            <div class="flex justify-between items-center mb-6">
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Project</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">10</span>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Tasks done</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">120</span>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Leave entitlement</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">0</span>
                    </div>
                </div>
            </div>
            
            <div>
                <p class="text-base font-medium text-gray-900 mb-2">Work hours</p>
                <div class="flex items-center justify-between">
                    <div class="w-full bg-gray-300 rounded-full h-6 mr-2">
                        <div class="bg-blue-900 rounded-full h-6" style="width: 100%">
                            <span class="text-white text-sm float-right mr-2">100%</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 text-black">
                        <img class="w-5 h-5" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mingcute-warning-fill.svg" />
                        <span class="text-sm font-medium">Over work</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Card 3 -->
        <div class="bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] p-6">
            <div class="flex items-center gap-3 mb-6">
                <img class="w-20 h-20 rounded-full" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/3baa030c96e449f388bdb40dddaf12c6-1.png" />
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">Eminem</h3>
                    <p class="text-gray-500">Content creator</p>
                </div>
            </div>
            
            <div class="flex justify-between items-center mb-6">
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Project</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">10</span>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Tasks done</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">210</span>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-lg font-medium text-gray-900 mb-2">Leave entitlement</p>
                    <div class="border border-gray-300 rounded-md px-4 py-2">
                        <span class="text-2xl font-semibold">2</span>
                    </div>
                </div>
            </div>
            
            <div>
                <p class="text-base font-medium text-gray-900 mb-2">Work hours</p>
                <div class="w-full bg-gray-300 rounded-full h-6">
                    <div class="bg-blue-900 rounded-full h-6" style="width: 70%">
                        <span class="text-white text-sm float-right mr-2">70%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional employee cards would follow the same pattern -->
    </div>
</section>
@endsection
@extends('admin/layout')

@section('title', 'Activity')

@section('content')
<section class="w-full bg-white rounded-[20px] shadow-[0_0_4px_rgba(0,0,0,0.25)] p-8">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-2 bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] px-4 py-2">
            <img class="w-6 h-6" src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mi-filter.svg" />
            <span class="text-gray-500 text-sm font-medium">Filter</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @foreach($data as $user)
            <div class="bg-white rounded-[10px] shadow-[0px_0px_4px_#00000040] p-5">
                <div class="flex items-center gap-3 mb-5">
                    <img class="w-16 h-16 rounded-full" src="{{ $user['image'] }}" />
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">{{ $user['name'] }}</h3>
                        <p class="text-gray-500 text-sm">{{ $user['role'] }}</p>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-5">
                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-900 mb-2">Project</p>
                        <div class="border border-gray-300 rounded-md px-3 py-2">
                            <span class="text-base font-semibold">{{ $user['projectCount'] }}</span>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-900 mb-2">Tasks done</p>
                        <div class="border border-gray-300 rounded-md px-3 py-2">
                            <span class="text-base font-semibold">{{ $user['taskDone'] }}</span>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="text-sm font-medium text-gray-900 mb-2">Leave entitlement</p>
                        <div class="border border-gray-300 rounded-md px-3 py-2">
                            <span class="text-base font-semibold">{{ $user['leaveCount'] }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-900 mb-2">Work hours</p>
                    <div class="w-full bg-gray-300 rounded-full h-5 relative">
                        <div class="bg-blue-900 rounded-full h-5" style="width: {{ $user['percentage'] }}%">
                            <span class="text-white text-xs absolute right-2 top-0 leading-5">{{ $user['percentage'] }}%</span>
                        </div>
                    </div>

                    @if($user['percentage'] >= 100)
                        <div class="flex items-center gap-1 text-black mt-1">
                            <img class="w-4 h-4"
                                 src="https://c.animaapp.com/mf0pte7ijudQ6p/img/mingcute-warning-fill.svg" />
                            <span class="text-xs font-medium">Over work</span>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

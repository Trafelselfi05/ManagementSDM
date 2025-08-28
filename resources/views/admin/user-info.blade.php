@extends('admin.layout')

@section('title', 'User Profile - Freyaa')

@section('content')
    <!-- Profile Content Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 lg:p-12 max-w-6xl mx-auto">

        <!-- Profile Section -->
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-16">

            <!-- Left Column - Profile Info -->
            <div class="w-full lg:w-96">

                <!-- Profile Header -->
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-12">
                    <div
                        class="w-32 h-32 bg-primary rounded-full flex items-center justify-center text-4xl font-bold text-white shadow-lg">
                        F
                    </div>

                    <div class="text-center sm:text-left">
                        <div class="mb-6">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Freyaa</h1>
                            <p class="text-lg font-medium text-gray-500">Admin</p>
                        </div>
                        <button
                            class="bg-primary text-white px-6 py-3 rounded-xl font-semibold text-base hover:bg-primary/90 transition-colors shadow-md">
                            Change Picture
                        </button>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="space-y-6 mb-12">
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-medium text-gray-600">Project Total</span>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 min-w-[100px] text-center">
                            <span class="text-2xl font-bold text-gray-900">10</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-lg font-medium text-gray-600">Tasks Done</span>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 min-w-[100px] text-center">
                            <span class="text-2xl font-bold text-gray-900">144</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-lg font-medium text-gray-600">Total Leave</span>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 min-w-[100px] text-center">
                            <span class="text-2xl font-bold text-gray-900">4</span>
                        </div>
                    </div>
                </div>

                <!-- Work Hours Progress -->
                <div>
                    <h3 class="text-lg font-medium text-gray-600 mb-4">Work hours</h3>
                    <div class="relative w-full h-3 bg-gray-200 rounded-full overflow-hidden">
                        <div class="absolute top-0 left-0 h-3 bg-dark rounded-full transition-all duration-500"
                            style="width: 70%;"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-600 mt-2 block">70% completed</span>
                </div>
            </div>

            <!-- Right Column - Form Fields -->
            <div class="flex-1">

                <!-- Edit Button -->
                <div class="flex justify-end mb-8">
                    <button
                        class="bg-dark text-white px-6 py-3 rounded-xl font-semibold text-base hover:bg-dark/90 transition-colors shadow-md">
                        Edit Profile
                    </button>
                </div>

                <!-- Profile Form -->
                <div>
                    <!-- Form Fields Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                        <!-- Left Column Fields -->
                        <div class="space-y-6">

                            <!-- Email -->
                            <div>
                                <label class="block text-base font-medium text-gray-700 mb-3">Email</label>
                                <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-4">
                                    <input type="email" value="Freyacarol@email.com"
                                        class="w-full text-base font-medium text-gray-900 bg-transparent border-none outline-none"
                                        readonly>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block text-base font-medium text-gray-700 mb-3">Phone Number</label>
                                <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-4">
                                    <input type="tel" value="0867744666778"
                                        class="w-full text-base font-medium text-gray-900 bg-transparent border-none outline-none"
                                        readonly>
                                </div>
                            </div>

                            <!-- Address -->
                            <div>
                                <label class="block text-base font-medium text-gray-700 mb-3">Address</label>
                                <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-4">
                                    <input type="text" value="Semarang, Central Java"
                                        class="w-full text-base font-medium text-gray-900 bg-transparent border-none outline-none"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column Fields -->
                        <div class="space-y-6">

                            <!-- Password -->
                            <div>
                                <label class="block text-base font-medium text-gray-700 mb-3">Password</label>
                                <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-4">
                                    <input type="password" placeholder="Leave blank to keep current password"
                                        class="w-full text-base font-medium text-gray-900 bg-transparent border-none outline-none"
                                        readonly>
                                </div>
                            </div>

                            <!-- Telegram -->
                            <div>
                                <label class="block text-base font-medium text-gray-700 mb-3">Link Telegram</label>
                                <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-4">
                                    <input type="text" value="FreyaaC"
                                        class="w-full text-base font-medium text-gray-900 bg-transparent border-none outline-none"
                                        readonly>
                                </div>
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label class="block text-base font-medium text-gray-700 mb-3">Birth Date</label>
                                <div
                                    class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-4 flex items-center justify-between">
                                    <input type="date" value="2006-02-13"
                                        class="text-base font-medium text-gray-900 bg-transparent border-none outline-none"
                                        readonly>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

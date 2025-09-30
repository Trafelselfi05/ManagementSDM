@extends('admin/layout')

@section('title', 'Tabel User Account')

@section('content')
    <div class="w-full max-w-[95vw] h-auto min-h-[85vh] mx-auto my-6 rounded-xl shadow-md bg-white p-6">
        <!-- Search and Filter Section -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 mb-6">
            <div class="flex flex-col md:flex-row items-center gap-3 w-full md:w-auto">
                <!-- Search Box -->
                <div
                    class="flex w-full md:w-64 items-center gap-2 px-3 py-2 bg-white rounded-md shadow-sm border border-gray-200">
                    <img class="w-4 h-4 opacity-60" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/vector.svg" />
                    <input type="text" placeholder="Search SDM"
                        class="flex-1 bg-transparent outline-none text-sm text-gray-600 placeholder-gray-400" />
                </div>

                <!-- Filter Box -->
                <div
                    class="flex w-full md:w-48 items-center justify-between px-3 py-2 bg-white rounded-md shadow-sm border border-gray-200 cursor-pointer">
                    <div class="text-gray-500 text-sm font-normal">
                        Filter by divisi
                    </div>
                    <img class="w-3 h-2 opacity-60" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/vector-10.svg" />
                </div>
            </div>

            <!-- Add New Button -->
            <a href="{{ route('admin.profile-admin') }}"
                class="flex w-full md:w-48 h-9 items-center justify-center gap-2 px-4 py-2 bg-gray-900 rounded-md cursor-pointer hover:bg-gray-800 transition-colors">
                <img class="w-4 h-4" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/group-126.png" />
                <div class="text-white text-sm font-semibold">
                    Add New SDM
                </div>
            </a>
        </div>

        <!-- Table Container -->
        <div class="w-full overflow-x-auto rounded-lg border border-gray-200">
            <!-- Table Header -->
            <div class="grid grid-cols-9 items-center bg-gray-100 py-3 px-4 text-gray-600 font-semibold text-sm min-w-max">
                <div class="text-center">Image</div>
                <div class="text-center">NIK</div>
                <div class="text-center">Username</div>
                <div class="text-center">Divisi</div>
                <div class="text-center">Status SDM</div>
                <div class="text-center">Telp</div>
                <div class="text-center">Email</div>
                <div class="text-center">Role</div>
                <div class="text-center">Action</div>
            </div>

            <!-- Table Rows -->
            <div class="divide-y divide-gray-200">
                @foreach ($users as $index => $user)
                    <a href="{{ route('admin.user-detail', $user->id) }}"
                        class="grid grid-cols-9 items-center py-3 px-4 text-gray-900 text-sm hover:bg-gray-50 transition-colors min-w-max">

                        <!-- Image -->
                        <div class="flex justify-center">
                            <img src="{{ asset($user->image) ?? '/default-avatar.png' }}" alt="User Image"
                                class="w-12 h-12 object-cover rounded border" />
                        </div>

                        <!-- NIK -->
                        <div class="text-center">{{ $user->nik }}</div>

                        <!-- Username -->
                        <div class="text-center font-medium">{{ $user->name }}</div>

                        <!-- Divisi -->
                        <div class="text-center">{{ $user->division }}</div>

                        <!-- Status SDM -->
                        <div class="text-center">
                            <span
                                class="px-2 py-1 rounded text-xs font-medium 
                                {{ $user->employment_status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $user->employment_status }}
                            </span>
                        </div>

                        <!-- Telp -->
                        <div class="text-center">{{ $user->phone }}</div>

                        <!-- Email -->
                        <div class="text-center truncate max-w-[200px]">{{ $user->email }}</div>

                        <!-- Role -->
                        <div class="text-center">
                            <span
                                class="px-2 py-1 rounded text-xs font-medium 
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>

                        <!-- Action -->
                        <div class="flex justify-center">
                            <form action="{{ route('admin.user-account.delete', $user->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

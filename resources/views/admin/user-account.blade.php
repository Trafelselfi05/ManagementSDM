@extends('admin/layout')

@section('title', 'Tabel User Account')

@section('content')
    <div class="w-full h-auto min-h-[85vh] mx-auto my-6 rounded-xl shadow-md bg-white p-6">
        <!-- Search and Filter Section -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 mb-6">
            <div class="flex flex-col md:flex-row items-center gap-3 w-full md:w-auto">
                <!-- Search Box -->
                <div
                    class="flex w-full md:w-64 items-center gap-2 px-3 py-2 bg-white rounded-md shadow-sm border border-gray-200">
                    <img class="w-4 h-4 opacity-60" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/vector.svg" />
                    <input type="text" id="searchInput" placeholder="Search SDM"
                        class="flex-1 bg-transparent outline-none text-sm text-gray-600 placeholder-gray-400" />
                </div>

                <!-- Filter Box -->
                <select id="filterDivision"
                    class="flex w-full md:w-48 px-3 py-2 bg-white rounded-md shadow-sm border border-gray-200 text-gray-600 text-sm">
                    <option value="">All Divisions</option>
                    <option value="UI / UX Designer">UI / UX Designer</option>
                    <option value="Engineer Mobile">Engineer Mobile</option>
                    <option value="Back End Developer">Back End Developer</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Copywriter">Copywriter</option>
                </select>

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
            <div class="grid grid-cols-9 items-center bg-gray-100 py-3 px-4 text-gray-600 font-semibold text-sm" style="min-width: 1200px;">
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
                        class="grid grid-cols-9 items-center py-3 px-4 text-gray-900 text-sm hover:bg-gray-50 transition-colors user-row" style="min-width: 1200px;">

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
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors"
                                    onclick="event.stopPropagation();">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const filterDivision = document.getElementById("filterDivision");
            const rows = document.querySelectorAll(".user-row");

            function filterUsers() {
                const searchText = searchInput.value.toLowerCase();
                const selectedDivision = filterDivision.value.toLowerCase();

                rows.forEach(row => {
                    const rowText = row.innerText.toLowerCase();
                    const division = row.querySelector("div:nth-child(4)").innerText.toLowerCase();

                    const matchesSearch = rowText.includes(searchText);
                    const matchesDivision = selectedDivision === "" || division === selectedDivision;

                    row.style.display = (matchesSearch && matchesDivision) ? "" : "none";
                });
            }

            searchInput.addEventListener("keyup", filterUsers);
            filterDivision.addEventListener("change", filterUsers);
        });
    </script>

@endsection
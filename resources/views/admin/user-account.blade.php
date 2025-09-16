@extends('admin/layout')

@section('title', 'Tabel User Account')

@section('content')
    <div class="w-full max-w-[95vw] h-auto min-h-[85vh] mx-auto my-6 rounded-xl shadow-md bg-white p-6">
        <!-- Search and Filter Section -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 mb-6">
            <div class="flex flex-col md:flex-row items-center gap-3 w-full md:w-auto">
                <!-- Search Box -->
                <div class="flex w-full md:w-64 items-center gap-2 p-2 bg-white rounded-md shadow-sm border border-gray-200">
                    <img class="w-4 h-4 opacity-60" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/vector.svg" />
                    <div class="text-gray-500 text-sm font-normal">
                        Search SDM
                    </div>
                </div>

                <!-- Filter Box -->
                <div
                    class="flex w-full md:w-48 items-center justify-between p-2 bg-white rounded-md shadow-sm border border-gray-200">
                    <div class="text-gray-500 text-sm font-normal">
                        Filter by divisi
                    </div>
                    <img class="w-3 h-2 opacity-60" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/vector-10.svg" />
                </div>
            </div>

            <!-- Add New Button -->
            <a href="{{ route('profile-admin') }}"
                class="flex w-full md:w-48 h-9 items-center justify-center gap-2 p-2 bg-gray-900 rounded-md cursor-pointer hover:bg-gray-800 transition-colors">
                <img class="w-4 h-4" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/group-126.png" />
                <div class="text-white text-sm font-semibold">
                    Add New SDM
                </div>
            </a>
        </div>

        <!-- Table Container -->
        <div class="w-full overflow-x-auto rounded-lg border border-gray-200">
            <!-- Table Header -->
            <div class="flex items-center bg-gray-100 py-4 px-4 text-gray-600 font-semibold text-sm min-w-max">
                <div class="w-16 text-center flex-shrink-0">#</div>
                <div class="w-20 text-center flex-shrink-0">Image</div>
                <div class="w-32 text-center flex-shrink-0">NIK</div>
                <div class="w-48 text-center flex-shrink-0">Username</div>
                <div class="w-40 text-center flex-shrink-0">Divisi</div>
                <div class="w-28 text-center flex-shrink-0">Status SDM</div>
                <div class="w-32 text-center flex-shrink-0">Telp</div>
                <div class="w-56 text-center flex-shrink-0">Email</div>
                <div class="w-20 text-center flex-shrink-0">Role</div>
                <div class="w-24 text-center flex-shrink-0">Action</div>
            </div>

            <!-- Table Rows -->
            <div class="divide-y divide-gray-200">
                <!-- Row 1 -->
                <a href="{{ route('user-detail') }}"
                    class="flex items-center py-4 px-4 text-gray-900 text-sm hover:bg-gray-50 transition-colors min-w-max">
                    <div class="w-16 text-center flex-shrink-0">1</div>
                    <div class="w-20 flex justify-center flex-shrink-0">
                        <img src="/path/to/form-cuti-2.jpg" alt="User Image"
                            class="w-12 h-12 object-cover rounded border cursor-pointer"
                            onclick="viewFormCuti('/path/to/form-cuti-2.jpg')">
                    </div>
                            <div class="w-32 text-center flex-shrink-0">201901005</div>
                    <div class="w-48 text-center flex-shrink-0">Kobe Bryant</div>
                    <div class="w-40 text-center flex-shrink-0">UI/UX Designer</div>
                    <div class="w-28 text-center flex-shrink-0">Aktif</div>
                    <div class="w-32 text-center flex-shrink-0">081234567894</div>
                    <div class="w-56 text-center flex-shrink-0">kobe@email.com</div>
                    <div class="w-20 text-center flex-shrink-0">User</div>
                    <div class="w-24 flex justify-center flex-shrink-0">
                        <button
                            class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors"
                            onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 1'); }">
                            Delete
                        </button>
                    </div>
                </a>

                <!-- Row 2 -->
                <a href="{{ route('user-detail') }}"
                    class="flex items-center py-4 px-4 text-gray-900 text-sm hover:bg-gray-50 transition-colors min-w-max">
                    <div class="w-16 text-center flex-shrink-0">2</div>
                    <div class="w-20 flex justify-center flex-shrink-0">
                        <img src="/path/to/form-cuti-2.jpg" alt="User Image"
                            class="w-12 h-12 object-cover rounded border cursor-pointer"
                            onclick="viewFormCuti('/path/to/form-cuti-2.jpg')">
                    </div>
                             <div class="w-32 text-center flex-shrink-0">201901005</div>
                    <div class="w-48 text-center flex-shrink-0">Kobe Bryant</div>
                    <div class="w-40 text-center flex-shrink-0">UI/UX Designer</div>
                    <div class="w-28 text-center flex-shrink-0">Aktif</div>
                    <div class="w-32 text-center flex-shrink-0">081234567894</div>
                    <div class="w-56 text-center flex-shrink-0">kobe@email.com</div>
                    <div class="w-20 text-center flex-shrink-0">User</div>
                    <div class="w-24 flex justify-center flex-shrink-0">
                        <button
                            class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors"
                            onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 2'); }">
                            Delete
                        </button>
                    </div>
                </a>

                <!-- Row 3 -->
                <a href="{{ route('user-detail') }}"
                    class="flex items-center py-4 px-4 text-gray-900 text-sm hover:bg-gray-50 transition-colors min-w-max">
                    <div class="w-16 text-center flex-shrink-0">3</div>
                    <div class="w-20 flex justify-center flex-shrink-0">
                        <img src="/path/to/form-cuti-3.jpg" alt="User Image"
                            class="w-12 h-12 object-cover rounded border cursor-pointer"
                            onclick="viewFormCuti('/path/to/form-cuti-3.jpg')">
                    </div>
                            <div class="w-32 text-center flex-shrink-0">201901005</div>
                    <div class="w-48 text-center flex-shrink-0">Kobe Bryant</div>
                    <div class="w-40 text-center flex-shrink-0">UI/UX Designer</div>
                    <div class="w-28 text-center flex-shrink-0">Aktif</div>
                    <div class="w-32 text-center flex-shrink-0">081234567894</div>
                    <div class="w-56 text-center flex-shrink-0">kobe@email.com</div>
                    <div class="w-20 text-center flex-shrink-0">User</div>
                    <div class="w-24 flex justify-center flex-shrink-0">
                        <button
                            class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors"
                            onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 3'); }">
                            Delete
                        </button>
                    </div>
                </a>

                <!-- Row 4 -->
                <a href="{{ route('user-detail') }}"
                    class="flex items-center py-4 px-4 text-gray-900 text-sm hover:bg-gray-50 transition-colors min-w-max">
                    <div class="w-16 text-center flex-shrink-0">4</div>
                    <div class="w-20 flex justify-center flex-shrink-0">
                        <img src="/path/to/form-cuti-4.jpg" alt="User Image"
                            class="w-12 h-12 object-cover rounded border cursor-pointer"
                            onclick="viewFormCuti('/path/to/form-cuti-4.jpg')">
                    </div>
                             <div class="w-32 text-center flex-shrink-0">201901005</div>
                    <div class="w-48 text-center flex-shrink-0">Kobe Bryant</div>
                    <div class="w-40 text-center flex-shrink-0">UI/UX Designer</div>
                    <div class="w-28 text-center flex-shrink-0">Aktif</div>
                    <div class="w-32 text-center flex-shrink-0">081234567894</div>
                    <div class="w-56 text-center flex-shrink-0">kobe@email.com</div>                    
                    <div class="w-20 text-center flex-shrink-0">User</div>
                    <div class="w-24 flex justify-center flex-shrink-0">
                        <button
                            class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors"
                            onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 4'); }">
                            Delete
                        </button>
                    </div>
                </a>

                <!-- Row 5 -->
                <a href="{{ route('user-detail') }}"
                    class="flex items-center py-4 px-4 text-gray-900 text-sm hover:bg-gray-50 transition-colors min-w-max">
                    <div class="w-16 text-center flex-shrink-0">5</div>
                    <div class="w-20 flex justify-center flex-shrink-0">
                        <img src="/path/to/form-cuti-5.jpg" alt="User Image"
                            class="w-12 h-12 object-cover rounded border cursor-pointer"
                            onclick="viewFormCuti('/path/to/form-cuti-5.jpg')">
                    </div>
                    <div class="w-32 text-center flex-shrink-0">201901005</div>
                    <div class="w-48 text-center flex-shrink-0">Kobe Bryant</div>
                    <div class="w-40 text-center flex-shrink-0">UI/UX Designer</div>
                    <div class="w-28 text-center flex-shrink-0">Aktif</div>
                    <div class="w-32 text-center flex-shrink-0">081234567894</div>
                    <div class="w-56 text-center flex-shrink-0">kobe@email.com</div>
                    <div class="w-20 text-center flex-shrink-0">User</div>
                    <div class="w-24 flex justify-center flex-shrink-0">
                        <button
                            class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition-colors"
                            onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 5'); }">
                            Delete
                        </button>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
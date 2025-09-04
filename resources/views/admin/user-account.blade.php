@extends('admin/layout')

@section('title', 'Activity')

@section('content')
<div class="w-full max-w-[95vw] h-auto min-h-[85vh] mx-auto my-6 rounded-xl shadow-md bg-white p-6">
  <!-- Search and Filter Section -->
  <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
    <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
      <!-- Search Box -->
      <div class="flex w-full md:w-80 items-center gap-3 p-3 bg-white rounded-lg shadow-sm border border-gray-200">
        <img class="w-5 h-5 opacity-60" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/vector.svg" />
        <div class="text-gray-500 text-base font-normal">
          Search SDM
        </div>
      </div>
      
      <!-- Filter Box -->
      <div class="flex w-full md:w-56 items-center justify-between p-3 bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="text-gray-500 text-base font-normal">
          Filter by divisi
        </div>
        <img class="w-3 h-2 opacity-60" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/vector-10.svg" />
      </div>
    </div>
    
    <!-- Add New Button -->
    <div class="flex w-full md:w-64 h-12 items-center justify-center gap-2 p-3 bg-gray-900 rounded-lg cursor-pointer hover:bg-gray-800 transition-colors">
      <img class="w-5 h-5" src="https://c.animaapp.com/mf11cpkvhucm6Y/img/group-126.png" />
      <div class="text-white text-base font-semibold">
        Add New SDM
      </div>
    </div>
  </div>
  
  <!-- Table Container -->
  <div class="w-full overflow-x-auto rounded-lg border border-gray-200">
    <!-- Table Header -->
    <div class="flex items-center bg-gray-100 py-4 px-4 text-gray-600 font-semibold text-sm">
      <div class="w-16 text-center">#</div>
      <div class="w-72">Username</div>
      <div class="w-64">Divisi</div>
      <div class="w-80">Email</div>
      <div class="w-40">Role</div>
      <div class="w-48 text-center">Action</div>
    </div>
    
    <!-- Table Rows -->
    <div class="divide-y divide-gray-200">
      <!-- Row 1 -->
      <a href="{{ route('user-detail') }}" class="flex items-center py-4 px-4 text-gray-900 text-base hover:bg-gray-50 transition-colors">
        <div class="w-16 text-center">1</div>
        <div class="w-72">Ahmad Wahid</div>
        <div class="w-64">Analis</div>
        <div class="w-80">Ahmad@email.com</div>
        <div class="w-40">User</div>
        <div class="w-48 flex justify-center">
          <button class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition-colors" onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 1'); }">
            Delete
          </button>
        </div>
      </a>
      
      <!-- Row 2 -->
      <a href="{{ route('user-detail') }}" class="flex items-center py-4 px-4 text-gray-900 text-base hover:bg-gray-50 transition-colors">
        <div class="w-16 text-center">2</div>
        <div class="w-72">Nur Wahid Alfiansyah</div>
        <div class="w-64">Analis</div>
        <div class="w-80">Ahmad@email.com</div>
        <div class="w-40">User</div>
        <div class="w-48 flex justify-center">
          <button class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition-colors" onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 2'); }">
            Delete
          </button>
        </div>
      </a>
      
      <!-- Row 3 -->
      <a href="{{ route('user-detail') }}" class="flex items-center py-4 px-4 text-gray-900 text-base hover:bg-gray-50 transition-colors">
        <div class="w-16 text-center">3</div>
        <div class="w-72">Rahmat Irawan</div>
        <div class="w-64">Backend Developer</div>
        <div class="w-80">Ahmad@email.com</div>
        <div class="w-40">User</div>
        <div class="w-48 flex justify-center">
          <button class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition-colors" onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 3'); }">
            Delete
          </button>
        </div>
      </a>
      
      <!-- Row 4 -->
      <a href="{{ route('user-detail') }}" class="flex items-center py-4 px-4 text-gray-900 text-base hover:bg-gray-50 transition-colors">
        <div class="w-16 text-center">4</div>
        <div class="w-72">Jesse Pinkman</div>
        <div class="w-64">Front End Developer</div>
        <div class="w-80">Ahmad@email.com</div>
        <div class="w-40">Admin</div>
        <div class="w-48 flex justify-center">
          <button class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition-colors" onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 4'); }">
            Delete
          </button>
        </div>
      </a>
      
      <!-- Row 5 -->
      <a href="{{ route('user-detail') }}" class="flex items-center py-4 px-4 text-gray-900 text-base hover:bg-gray-50 transition-colors">
        <div class="w-16 text-center">5</div>
        <div class="w-72">Kobe Bryant</div>
        <div class="w-64">UI/UX Designer</div>
        <div class="w-80">Ahmad@email.com</div>
        <div class="w-40">User</div>
        <div class="w-48 flex justify-center">
          <button class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition-colors" onclick="event.preventDefault(); event.stopPropagation(); if(confirm('Apakah Anda yakin ingin menghapus user ini?')) { console.log('Deleting user 5'); }">
            Delete
          </button>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection
@extends('admin/layout')

@section('title', 'Add User')

@section('content')
<div class="flex justify-center items-start py-[35px] min-h-screen bg-[#f9f9f9]">
    <div class="max-w-4xl w-full bg-white p-10 shadow-[0px_0px_4px_#00000040] rounded-[15px]">

        @if(session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded-lg mb-4">{{ session('success') }}</div>
        @endif

        <h2 class="text-xl font-bold mb-8">Create New Account</h2>

        <form action="{{ route('admin.profile-admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-8">

                @php
                    $inputClass = "flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full 
                                  bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] 
                                  text-base font-medium text-[#111111] border-0 outline-none";
                    $labelClass = "block text-sm font-medium text-gray-700 mb-2";
                    $selectClass = $inputClass . ' appearance-none cursor-pointer 
                        bg-no-repeat bg-right-4 bg-center bg-[length:18px_10px]';
                @endphp

                <!-- Name -->
                <div>
                    <label class="{{ $labelClass }}">Name</label>
                    <input type="text" name="name" class="{{ $inputClass }}" required>
                </div>

                <!-- Email -->
                <div>
                    <label class="{{ $labelClass }}">Email</label>
                    <input type="email" name="email" class="{{ $inputClass }}" required>
                </div>

                <!-- Password -->
                <div>
                    <label class="{{ $labelClass }}">Password</label>
                    <input type="password" name="password" class="{{ $inputClass }}" required>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="{{ $labelClass }}">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="{{ $inputClass }}" required>
                </div>

                <!-- Division -->
                <div>
                    <label class="{{ $labelClass }}">Division</label>
                    <input type="text" name="division" class="{{ $inputClass }}">
                </div>

                <!-- Phone -->
                <div>
                    <label class="{{ $labelClass }}">Phone</label>
                    <input type="text" name="phone" class="{{ $inputClass }}">
                </div>

                <!-- NIK -->
                <div>
                    <label class="{{ $labelClass }}">NIK</label>
                    <input type="text" name="nik" class="{{ $inputClass }}">
                </div>

                <!-- Telegram Link -->
                <div>
                    <label class="{{ $labelClass }}">Telegram Link</label>
                    <input type="text" name="telegram_link" class="{{ $inputClass }}">
                </div>

                <!-- Employment Status -->
                <div>
                    <label class="{{ $labelClass }}">Employment Status</label>
                    <input type="text" name="employment_status" class="{{ $inputClass }}">
                </div>

                <!-- Birth Date -->
                <div>
                    <label class="{{ $labelClass }}">Birth Date</label>
                    <input type="date" name="birth_date" class="{{ $inputClass }}">
                </div>

                <!-- Join Date -->
                <div>
                    <label class="{{ $labelClass }}">Join Date</label>
                    <input type="date" name="join_date" class="{{ $inputClass }}">
                </div>

                <!-- Last Education -->
                <div>
                    <label class="{{ $labelClass }}">Last Education</label>
                    <input type="text" name="last_education" class="{{ $inputClass }}">
                </div>

                <!-- Role -->
                <div>
                    <label class="{{ $labelClass }}">Role</label>
                    <select name="role" class="{{ $selectClass }}"
                        style="background-image: url('https://c.animaapp.com/mf0zod5k1fupaQ/img/vector-6.svg');">
                        <option value="">-- Select Role --</option>
                        <option value="director">Director</option>
                        <option value="karyawan">Karyawan</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Address -->
                <div class="col-span-2">
                    <label class="{{ $labelClass }}">Address</label>
                    <textarea name="address" class="w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] border-0 outline-none px-4 py-3"></textarea>
                </div>

                <!-- Dashboard Status -->
                <div>
                    <label class="{{ $labelClass }}">Dashboard Status</label>
                    <input type="text" name="dashboard_status" class="{{ $inputClass }}">
                </div>

                <!-- Status Description -->
                <div>
                    <label class="{{ $labelClass }}">Status Description</label>
                    <input type="text" name="status_description" class="{{ $inputClass }}">
                </div>

                <!-- Profile Image -->
                <div class="col-span-2">
                    <label class="{{ $labelClass }}">Profile Image</label>
                    <input type="file" name="image" class="{{ $inputClass }}">
                </div>
            </div>

            <button type="submit"
                class="mt-8 w-full bg-[#111111] text-white py-3 rounded-[15px] shadow-[0px_0px_4px_#00000026] font-bold text-lg">
                Save
            </button>
        </form>
    </div>
</div>
@endsection

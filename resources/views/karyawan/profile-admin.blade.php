@extends('karyawan/layout')
@section('title', 'Admin Profile')

@section('content')
<div class="flex justify-center items-start py-[35px] min-h-screen bg-[#f9f9f9]">
<div
  class="inline-flex flex-col items-center gap-2.5 px-16 py-[40px] bg-white rounded-[15px] shadow-[0px_0px_4px_#00000040]"
>
  <div class="flex flex-col w-[850px] items-start gap-[35px] relative flex-[0_0_auto]">
    <div
      class="relative self-stretch mt-[-1.00px] [font-family:'Inter',Helvetica] font-bold text-[#111111] text-xl tracking-[0] leading-[normal]"
    >
      Create New Account
    </div>
    <div class="flex flex-col items-center gap-[50px] relative self-stretch w-full flex-[0_0_auto]">
      <div class="flex items-start gap-8 relative self-stretch w-full flex-[0_0_auto]">
        <div class="flex flex-col w-[400px] items-start gap-[25px] relative">
          <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
            <div
              class="relative self-stretch mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-base tracking-[0] leading-[normal]"
            >
              Username
            </div>
            <input
              type="text"
              placeholder="Santiago"
              class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-base [font-family:'Inter',Helvetica] font-semibold text-[#111111] tracking-[0] leading-[normal] border-0 outline-none"
            />
          </div>
          <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
            <div
              class="relative self-stretch mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-base tracking-[0] leading-[normal]"
            >
              Email
            </div>
            <input
              type="email"
              placeholder="Santiago@email.com"
              class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-base [font-family:'Inter',Helvetica] font-semibold text-[#111111] tracking-[0] leading-[normal] border-0 outline-none"
            />
          </div>
          <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
            <div
              class="relative self-stretch mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-base tracking-[0] leading-[normal]"
            >
              Division
            </div>
            <select
              class="flex h-[45px] items-center gap-2.5 px-4 py-[13px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-base [font-family:'Inter',Helvetica] font-normal text-[#7d7d7d] tracking-[0] leading-[normal] border-0 outline-none appearance-none cursor-pointer"
              style="background-image: url('https://c.animaapp.com/mf0zod5k1fupaQ/img/vector-6.svg'); background-repeat: no-repeat; background-position: right 16px center; background-size: 18px 10px;"
            >
              <option value="" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Enter division</option>
              <option value="IT" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">IT Department</option>
              <option value="HR" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Human Resources</option>
              <option value="Finance" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Finance</option>
              <option value="Marketing" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Marketing</option>
              <option value="Operations" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Operations</option>
            </select>
          </div>
        </div>
        <div class="flex flex-col w-[400px] items-start gap-[25px] relative">
          <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
            <div
              class="relative self-stretch mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-base tracking-[0] leading-[normal]"
            >
              Password
            </div>
            <input
              type="password"
              placeholder="Enter password"
              class="flex h-[45px] items-center gap-2.5 pl-4 pr-[34px] py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-base [font-family:'Inter',Helvetica] font-normal text-[#7d7d7d] tracking-[0] leading-[normal] border-0 outline-none"
            />
          </div>
          <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
            <div
              class="relative self-stretch mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-base tracking-[0] leading-[normal]"
            >
              Confirm Password
            </div>
            <input
              type="password"
              placeholder="Confirm Password"
              class="flex h-[45px] items-center gap-2.5 pl-4 pr-[34px] py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-base [font-family:'Inter',Helvetica] font-normal text-[#7d7d7d] tracking-[0] leading-[normal] border-0 outline-none"
            />
          </div>
          <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
            <div
              class="relative self-stretch mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-base tracking-[0] leading-[normal]"
            >
              Role
            </div>
            <select
              class="flex h-[45px] items-center gap-2.5 px-4 py-[13px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-base [font-family:'Inter',Helvetica] font-normal text-[#7d7d7d] tracking-[0] leading-[normal] border-0 outline-none appearance-none cursor-pointer"
              style="background-image: url('https://c.animaapp.com/mf0zod5k1fupaQ/img/vector-6.svg'); background-repeat: no-repeat; background-position: right 16px center; background-size: 18px 10px;"
            >
              <option value="">Select role</option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>
      </div>
      <div class="flex flex-col w-[320px] items-start gap-5 relative flex-[0_0_auto]">
        <a href="{{ route('karyawan.user-account') }}"
          class="flex h-[45px] items-center justify-center gap-2.5 px-4 py-2.5 relative self-stretch w-full bg-[#111111] rounded-[15px] shadow-[0px_0px_4px_#00000026] cursor-pointer border-0 outline-none hover:bg-[#333333] transition-colors"
        >
          <div
            class="relative w-fit mt-[-0.50px] [font-family:'Inter',Helvetica] font-bold text-white text-lg tracking-[0] leading-[normal]"
          >
            Create Account
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
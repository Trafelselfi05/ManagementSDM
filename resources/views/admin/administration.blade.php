@extends('admin/layout')

@section('title', 'Administration')

@section('content')
    <!-- Main Content Section -->
    <div class="flex flex-col max-w-4xl items-center gap-2.5 px-10 py-8 mx-auto bg-white rounded-2xl shadow-lg">
        <div class="flex flex-col items-start gap-8 relative self-stretch w-full flex-[0_0_auto]">
            <div
                class="w-fit font-semibold text-[#111111] text-lg whitespace-nowrap relative mt-[-1.00px] [font-family:'Inter',Helvetica] tracking-[0] leading-[normal]">
                Leave Submission
            </div>
            <div class="flex flex-col items-center gap-12 relative self-stretch w-full flex-[0_0_auto]">
                <form class="flex flex-col items-start gap-5 relative self-stretch w-full flex-[0_0_auto]">

                    <!-- Leave Category Dropdown -->
                    <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
                        <label
                            class="self-stretch font-medium text-[#7d7d7d] text-sm relative mt-[-1.00px] [font-family:'Inter',Helvetica] tracking-[0] leading-[normal]">
                            Leave Category
                        </label>

                        <!-- Dropdown Container -->
                        <div class="relative self-stretch w-full">
                            <!-- Dropdown Button -->
                            <button onclick="toggleDropdown()" type="button"
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#111111] focus:ring-opacity-20 focus:border-transparent">
                                <div class="flex w-full items-center justify-between">
                                    <p id="selectedText"
                                        class="[font-family:'Inter',Helvetica] font-normal text-[#7d7d7d] text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        -- Pilih Jenis Cuti --
                                    </p>
                                    <img class="w-[16px] h-2"
                                        src="https://c.animaapp.com/mf0waiheGBQdaR/img/vector-6.svg" />
                                </div>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="dropdownMenu"
                                class="hidden absolute top-[52px] left-0 flex-col w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] z-10">
                                <div onclick="selectOption('tahunan', 'Cuti Tahunan')"
                                    class="flex w-full h-[45px] items-center gap-2.5 px-4 py-[11px] bg-white rounded-[15px] cursor-pointer hover:bg-[#e0e0e0] transition-colors">
                                    <div
                                        class="[font-family:'Inter',Helvetica] font-normal text-black text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        Cuti Tahunan
                                    </div>
                                </div>
                                <div onclick="selectOption('sakit', 'Cuti Sakit')"
                                    class="flex w-full h-[45px] items-center gap-2.5 px-4 py-[11px] bg-white rounded-[15px] cursor-pointer hover:bg-[#e0e0e0] transition-colors">
                                    <div
                                        class="[font-family:'Inter',Helvetica] font-normal text-black text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        Cuti Sakit
                                    </div>
                                </div>
                                <div onclick="selectOption('melahirkan', 'Cuti Melahirkan')"
                                    class="flex w-full h-[45px] items-center gap-2.5 px-4 py-[11px] bg-white rounded-[15px] cursor-pointer hover:bg-[#e0e0e0] transition-colors">
                                    <div
                                        class="[font-family:'Inter',Helvetica] font-normal text-black text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        Cuti Melahirkan
                                    </div>
                                </div>
                                <div onclick="selectOption('darurat', 'Cuti Darurat')"
                                    class="flex w-full h-[45px] items-center gap-2.5 px-4 py-[11px] bg-white rounded-[15px] cursor-pointer hover:bg-[#e0e0e0] transition-colors">
                                    <div
                                        class="[font-family:'Inter',Helvetica] font-normal text-black text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        Cuti Darurat
                                    </div>
                                </div>
                                <div onclick="selectOption('pribadi', 'Cuti Pribadi')"
                                    class="flex w-full h-[45px] items-center gap-2.5 px-4 py-[11px] bg-white rounded-[15px] cursor-pointer hover:bg-[#e0e0e0] transition-colors">
                                    <div
                                        class="[font-family:'Inter',Helvetica] font-normal text-black text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        Cuti Pribadi
                                    </div>
                                </div>
                                <div onclick="selectOption('haji_umrah', 'Cuti Haji/Umrah')"
                                    class="flex w-full h-[45px] items-center gap-2.5 px-4 py-[11px] bg-white rounded-[15px] cursor-pointer hover:bg-[#e0e0e0] transition-colors">
                                    <div
                                        class="[font-family:'Inter',Helvetica] font-normal text-black text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        Cuti Haji/Umrah
                                    </div>
                                </div>
                                <div onclick="selectOption('pernikahan', 'Cuti Pernikahan')"
                                    class="flex w-full h-[45px] items-center gap-2.5 px-4 py-[11px] bg-white rounded-[15px] cursor-pointer hover:bg-[#e0e0e0] transition-colors">
                                    <div
                                        class="[font-family:'Inter',Helvetica] font-normal text-black text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                        Cuti Pernikahan
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden input for form submission -->
                            <input type="hidden" id="leave_category" name="leave_category" value="" />
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="flex items-end gap-5 relative self-stretch w-full flex-[0_0_auto]">
                        <!-- Start Date -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 grow">
                            <label for="start-date"
                                class="self-stretch font-medium text-[#7d7d7d] relative mt-[-1.00px] [font-family:'Inter',Helvetica] text-sm tracking-[0] leading-[normal]">
                                Start Date
                            </label>
                            <div class="relative self-stretch w-full">
                                <input type="date" id="start-date" name="start_date" min="2024-01-01" max="2025-12-31"
                                    class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] pr-12 relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] font-normal text-[#111111] text-sm [font-family:'Inter',Helvetica] tracking-[0] leading-[normal] cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#111111] focus:ring-opacity-20 focus:border-transparent [color-scheme:light]"
                                    placeholder="dd/mm/yyyy" />
                                <img class="absolute right-4 top-1/2 transform -translate-y-1/2 w-[18px] h-[20px] pointer-events-none"
                                    src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125.png" />
                            </div>
                        </div>

                        <!-- End Date -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 grow">
                            <label for="end-date"
                                class="self-stretch font-medium text-[#7d7d7d] relative mt-[-1.00px] [font-family:'Inter',Helvetica] text-sm tracking-[0] leading-[normal]">
                                End Date
                            </label>
                            <div class="relative self-stretch w-full">
                                <input type="date" id="end-date" name="end_date" min="2024-01-01" max="2025-12-31"
                                    class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] pr-12 relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] font-normal text-[#111111] text-sm [font-family:'Inter',Helvetica] tracking-[0] leading-[normal] cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#111111] focus:ring-opacity-20 focus:border-transparent [color-scheme:light]"
                                    placeholder="dd/mm/yyyy" />
                                <img class="absolute right-4 top-1/2 transform -translate-y-1/2 w-[18px] h-[20px] pointer-events-none"
                                    src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125-1.png" />
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="flex flex-col items-start gap-3 relative self-stretch w-full flex-[0_0_auto]">
                        <label for="description"
                            class="self-stretch font-medium relative mt-[-1.00px] [font-family:'Inter',Helvetica] text-[#7d7d7d] text-sm tracking-[0] leading-[normal]">
                            Description
                        </label>
                        <textarea id="description" name="description" placeholder="Enter your leave description..." rows="4"
                            class="flex h-[120px] items-start gap-2.5 px-4 py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] resize-none font-normal text-[#111111] text-sm [font-family:'Inter',Helvetica] tracking-[0] leading-[normal] placeholder-[#7d7d7d] focus:outline-none focus:ring-2 focus:ring-[#111111] focus:ring-opacity-20 focus:border-transparent"></textarea>
                    </div>

                    <!-- Radio Button Options -->
                    <div class="flex items-center gap-5 relative self-stretch w-full flex-[0_0_auto]">
                        <!-- Laptop Question -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 grow">
                            <p
                                class="relative w-fit mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                Do you bring laptop? (if there is a super urgent matter)
                            </p>
                            <div
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026]">
                                <div class="flex items-center gap-8 relative flex-1 grow">
                                    <div class="inline-flex items-center gap-8 relative flex-[0_0_auto]">
                                        <label
                                            class="inline-flex items-center gap-2.5 relative flex-[0_0_auto] cursor-pointer">
                                            <input type="radio" name="bring_laptop" value="yes" class="hidden">
                                            <img class="relative w-4 h-4"
                                                src="https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg" />
                                            <div
                                                class="relative w-fit mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#111111] text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                                Yes
                                            </div>
                                        </label>
                                        <label
                                            class="inline-flex items-center gap-2.5 relative flex-[0_0_auto] cursor-pointer">
                                            <input type="radio" name="bring_laptop" value="no" class="hidden">
                                            <img class="relative w-4 h-4"
                                                src="https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg" />
                                            <div
                                                class="w-fit font-medium text-[#111111] whitespace-nowrap relative mt-[-1.00px] [font-family:'Inter',Helvetica] text-sm tracking-[0] leading-[normal]">
                                                No
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Question -->
                        <div class="flex flex-col items-start gap-3 relative flex-1 grow">
                            <p
                                class="relative w-fit mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#7d7d7d] text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                Do you still be Contacted? (if there is super urgent matter)
                            </p>
                            <div
                                class="flex h-[45px] items-center gap-2.5 px-4 py-[11px] relative self-stretch w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026]">
                                <div class="flex items-center gap-8 relative flex-1 grow">
                                    <div class="inline-flex items-center gap-8 relative flex-[0_0_auto]">
                                        <label
                                            class="inline-flex items-center gap-2.5 relative flex-[0_0_auto] cursor-pointer">
                                            <input type="radio" name="can_be_contacted" value="yes" class="hidden">
                                            <img class="relative w-4 h-4"
                                                src="https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg" />
                                            <div
                                                class="relative w-fit mt-[-1.00px] [font-family:'Inter',Helvetica] font-medium text-[#111111] text-sm tracking-[0] leading-[normal] whitespace-nowrap">
                                                Yes
                                            </div>
                                        </label>
                                        <label
                                            class="inline-flex items-center gap-2.5 relative flex-[0_0_auto] cursor-pointer">
                                            <input type="radio" name="can_be_contacted" value="no" class="hidden">
                                            <img class="relative w-4 h-4"
                                                src="https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg" />
                                            <div
                                                class="w-fit font-medium text-[#111111] whitespace-nowrap relative mt-[-1.00px] [font-family:'Inter',Helvetica] text-sm tracking-[0] leading-[normal]">
                                                No
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Action Buttons -->
                <div class="inline-flex items-center gap-4 relative flex-[0_0_auto]">
                    <button type="button" onclick="resetForm()"
                        class="flex w-[180px] h-[45px] items-center justify-center gap-2.5 px-[35px] py-2.5 relative rounded-[10px] border border-solid border-[#111111] hover:bg-[#f9f9f9] transition-colors cursor-pointer">
                        <div
                            class="relative w-fit mt-[-0.50px] [font-family:'Inter',Helvetica] font-semibold text-[#111111] text-sm tracking-[0] leading-[normal]">
                            Cancel
                        </div>
                    </button>
                    <button type="submit" onclick="submitForm()"
                        class="flex w-[180px] h-[45px] items-center justify-center gap-2.5 px-[35px] py-2.5 relative bg-[#111111] rounded-[10px] shadow-[0px_0px_4px_#00000040] hover:bg-[#333333] transition-colors cursor-pointer">
                        <div
                            class="relative w-fit mt-[-0.50px] [font-family:'Inter',Helvetica] font-semibold text-[#f9f9f9] text-sm tracking-[0] leading-[normal]">
                            Submit
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
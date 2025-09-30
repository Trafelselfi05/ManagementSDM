@extends('admin/layout')

@section('title', 'Add User')

@section('content')
    <div class="flex justify-center items-start py-[35px] min-h-screen bg-[#f9f9f9]">
        <div class="max-w-4xl w-full bg-white p-10 shadow-[0px_0px_4px_#00000040] rounded-[15px] relative">

            @if (session('success'))
                <div class="p-3 bg-green-100 text-green-700 rounded-lg mb-4">{{ session('success') }}</div>
            @endif

            <h2 class="text-xl font-bold mb-8">Create New Account</h2>

            <form action="{{ route('admin.profile-admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @php
                    $inputClass = "flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full 
                                  bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] 
                                  text-base font-medium text-[#111111] border-0 outline-none";
                    $labelClass = 'block text-sm font-medium text-gray-700 mb-2';
                    $selectClass = $inputClass . ' appearance-none cursor-pointer bg-no-repeat bg-right-4 bg-center bg-[length:18px_10px]';
                @endphp

                <div class="grid grid-cols-2 gap-8">
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

                    <!-- Division (dropdown) -->
                    <div>
                        <label class="{{ $labelClass }}">Division</label>
                        <select name="division" class="{{ $selectClass }}"
                            style="background-image: url('https://c.animaapp.com/mf0zod5k1fupaQ/img/vector-6.svg');">
                            <option value="">-- Select Division --</option>
                            <option value="UI / UX Designer">UI / UX Designer</option>
                            <option value="Enginer Mobile">Enginer Mobile</option>
                            <option value="Back End Developer">Back End Developer</option>
                            <option value="Data Science">Data Science</option>
                            <option value="Copywriter">Copywriter</option>
                        </select>
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

                    <!-- Employment Status (dropdown) -->
                    <div>
                        <label class="{{ $labelClass }}">Employment Status</label>
                        <select name="employment_status" class="{{ $selectClass }}"
                            style="background-image: url('https://c.animaapp.com/mf0zod5k1fupaQ/img/vector-6.svg');">
                            <option value="">-- Select Employment Status --</option>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                            <option value="contract">contract</option>
                            <option value="probation">probation</option>
                        </select>
                    </div>

                    <!-- Birth Date (single date + clickable icon) -->
                    <div>
                        <label class="{{ $labelClass }}">Birth Date</label>
                        <div class="relative">
                            <input readonly id="birth-date" name="birth_date" type="text" placeholder="YYYY-MM-DD"
                                class="date-input {{ $inputClass }} pr-12 cursor-pointer" />
                            <img id="birth-date-icon"
                                class="absolute right-4 top-1/2 -translate-y-1/2 w-[18px] h-[20px] cursor-pointer select-none"
                                src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125.png" />
                        </div>
                    </div>

                    <!-- Join Date (single date + clickable icon) -->
                    <div>
                        <label class="{{ $labelClass }}">Join Date</label>
                        <div class="relative">
                            <input readonly id="join-date" name="join_date" type="text" placeholder="YYYY-MM-DD"
                                class="date-input {{ $inputClass }} pr-12 cursor-pointer" />
                            <img id="join-date-icon"
                                class="absolute right-4 top-1/2 -translate-y-1/2 w-[18px] h-[20px] cursor-pointer select-none"
                                src="https://c.animaapp.com/mf0waiheGBQdaR/img/group-125.png" />
                        </div>
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
                        <textarea name="address"
                            class="w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] border-0 outline-none px-4 py-3"></textarea>
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

        @if ($errors->any())
            <div class="p-3 bg-red-100 text-red-700 rounded-lg mb-4">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Single-Date Calendar Popup (shared) -->
    <div id="calendarPopup" class="hidden z-[9999] w-[320px] bg-white rounded-2xl shadow-lg p-4">
        <div class="flex items-center gap-3 mb-3">
            <div id="month-short" class="text-lg font-semibold w-20 text-center">Apr</div>
            <div class="flex-1 flex gap-2 items-center">
                <select id="year-select" class="w-28 p-2 border-none rounded-lg bg-white focus:outline-none"></select>
            </div>
            <button id="prev-btn" aria-label="Previous month" class="p-2 rounded-lg hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="next-btn" aria-label="Next month" class="p-2 rounded-lg hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-7 text-center text-xs font-medium text-gray-600 mb-2">
            <div>S</div>
            <div>M</div>
            <div>T</div>
            <div>W</div>
            <div>T</div>
            <div>F</div>
            <div>S</div>
        </div>

        <div id="dates-grid" class="grid grid-cols-7 gap-2"></div>
    </div>

    {{-- Calendar JS (single date, input + icon clickable) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const monthShortNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                'Dec'
            ];

            const calendarPopup = document.getElementById('calendarPopup');
            const monthShortEl = document.getElementById('month-short');
            const yearSelect = document.getElementById('year-select');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const datesGrid = document.getElementById('dates-grid');

            const birthInput = document.getElementById('birth-date');
            const joinInput = document.getElementById('join-date');
            const birthIcon = document.getElementById('birth-date-icon');
            const joinIcon = document.getElementById('join-date-icon');

            // Pindahkan popup ke body supaya tak ter-clip parent
            if (calendarPopup && calendarPopup.parentElement !== document.body) {
                document.body.appendChild(calendarPopup);
            }

            let viewDate = new Date();
            let activeInput = null; // ref ke input aktif

            function stripTime(d) {
                const nd = new Date(d);
                nd.setHours(0, 0, 0, 0);
                return nd;
            }

            function pad(n) {
                return n < 10 ? '0' + n : String(n);
            }

            function formatISO(d) {
                return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
            }

            function initYear() {
                yearSelect.innerHTML = '';
                const cur = new Date().getFullYear();
                for (let y = cur - 50; y <= cur + 50; y++) {
                    const opt = document.createElement('option');
                    opt.value = y;
                    opt.textContent = y;
                    yearSelect.appendChild(opt);
                }
            }

            function updateHeader() {
                yearSelect.value = viewDate.getFullYear();
                monthShortEl.textContent = monthShortNames[viewDate.getMonth()];
            }

            function renderCalendar() {
                const year = viewDate.getFullYear();
                const month = viewDate.getMonth();
                updateHeader();
                datesGrid.innerHTML = '';

                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                for (let i = 0; i < firstDay; i++) {
                    const cell = document.createElement('div');
                    cell.className = 'w-10 h-10 rounded-full text-center text-sm text-gray-300';
                    datesGrid.appendChild(cell);
                }

                const today = stripTime(new Date()).getTime();
                const currentVal = activeInput && activeInput.value ? new Date(activeInput.value) : null;
                const selectedTime = currentVal ? stripTime(currentVal).getTime() : null;

                for (let d = 1; d <= daysInMonth; d++) {
                    const cell = document.createElement('button');
                    cell.type = 'button';
                    cell.className =
                        'w-10 h-10 rounded-full text-center text-sm flex items-center justify-center focus:outline-none hover:bg-gray-100 transition';
                    cell.textContent = d;

                    const cellDate = new Date(year, month, d);
                    const cellTime = stripTime(cellDate).getTime();

                    if (cellTime === today) {
                        cell.classList.add('font-semibold');
                        cell.style.boxShadow = 'inset 0 0 0 1px rgba(0,0,0,0.05)';
                    }
                    if (selectedTime && cellTime === selectedTime) {
                        cell.classList.add('bg-blue-500', 'text-white', 'font-semibold');
                    }

                    cell.addEventListener('click', () => {
                        if (!activeInput) return;
                        activeInput.value = formatISO(cellDate);
                        hideCalendar();
                    });

                    datesGrid.appendChild(cell);
                }
            }

            function showCalendarFor(inputEl) {
                activeInput = inputEl;

                // Set viewDate sesuai nilai input (jika ada)
                if (activeInput.value) {
                    const parsed = new Date(activeInput.value);
                    if (!isNaN(parsed.getTime())) {
                        viewDate = new Date(parsed);
                    }
                }

                calendarPopup.classList.remove('hidden');
                calendarPopup.style.visibility = 'hidden';

                const rect = inputEl.getBoundingClientRect();
                const popupW = calendarPopup.offsetWidth || 320;
                const popupH = calendarPopup.offsetHeight || 360;

                let left = rect.left + window.scrollX;
                let top = rect.bottom + window.scrollY + 8;

                if (left + popupW > window.scrollX + window.innerWidth - 12) {
                    left = window.scrollX + window.innerWidth - popupW - 12;
                }
                if (left < 12 + window.scrollX) left = 12 + window.scrollX;

                if (top + popupH > window.scrollY + window.innerHeight - 12) {
                    const altTop = rect.top + window.scrollY - popupH - 8;
                    top = (altTop > 8 + window.scrollY) ? altTop : Math.max(8 + window.scrollY, window.scrollY +
                        window.innerHeight - popupH - 12);
                }

                calendarPopup.style.position = 'absolute';
                calendarPopup.style.left = left + 'px';
                calendarPopup.style.top = top + 'px';

                calendarPopup.style.visibility = 'visible';
                calendarPopup.classList.remove('hidden');

                renderCalendar();
            }

            function hideCalendar() {
                calendarPopup.classList.add('hidden');
                activeInput = null;
            }

            // Event: input & icon -> buka kalender
            [birthInput, joinInput].forEach(inp => {
                inp.addEventListener('click', () => showCalendarFor(inp));
                inp.addEventListener('focus', () => showCalendarFor(inp));
            });
            birthIcon.addEventListener('click', () => showCalendarFor(birthInput));
            joinIcon.addEventListener('click', () => showCalendarFor(joinInput));

            // Navigasi calendar
            prevBtn.addEventListener('click', () => {
                viewDate.setMonth(viewDate.getMonth() - 1);
                renderCalendar();
            });
            nextBtn.addEventListener('click', () => {
                viewDate.setMonth(viewDate.getMonth() + 1);
                renderCalendar();
            });
            yearSelect.addEventListener('change', (e) => {
                viewDate.setFullYear(Number(e.target.value));
                renderCalendar();
            });

            // Klik di luar untuk menutup
            document.addEventListener('click', (e) => {
                if (calendarPopup.classList.contains('hidden')) return;
                const t = e.target;
                if (t === birthInput || t === joinInput || t === birthIcon || t === joinIcon) return;
                if (!calendarPopup.contains(t)) hideCalendar();
            });

            // Re-posisi saat resize/scroll
            const repositionIfOpen = () => {
                if (!calendarPopup.classList.contains('hidden') && activeInput) showCalendarFor(activeInput);
            };
            window.addEventListener('resize', repositionIfOpen);
            window.addEventListener('scroll', repositionIfOpen, true);

            // Init
            initYear();
            renderCalendar();
        });
    </script>
@endsection

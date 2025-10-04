@extends('admin/layout')

@section('title', 'Add User')

@section('content')
    <div class="flex justify-center items-start py-[35px] min-h-screen bg-[#f9f9f9]">
        <div class="max-w-4xl w-full bg-white p-10 shadow-[0px_0px_4px_#00000040] rounded-[15px] relative">

            <h2 class="text-xl font-bold mb-8">Create New Account</h2>

            <form action="{{ route('admin.profile-admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @php
                    $inputClass = "flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full 
                                  bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] 
                                  text-base font-medium text-[#111111] border-0 outline-none";
                    $labelClass = 'block text-sm font-medium text-gray-700 mb-2';
                    $selectClass =
                        $inputClass .
                        ' appearance-none cursor-pointer bg-no-repeat bg-[position:right_1rem_center] bg-[length:12px_8px]';
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
                        <div class="relative">
                            <select name="division" class="{{ $selectClass }}"
                                style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23111111\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');">
                                <option value="">-- Select Division --</option>
                                <option value="Engineer Web">Engineer Web</option>
                                <option value="Analis">Analis</option>
                                <option value="Engineer Mobile">Engineer Mobile</option>
                                <option value="Content Creator">Content Creator</option>
                                <option value="Engineer IOS">Engineer IOS</option>
                                <option value="Copywriter">Copywriter</option>
                                <option value="UI / UX Designer">UI / UX Designer</option>
                                <option value="Tester">Tester</option>
                            </select>
                        </div>
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
                        <div class="relative">
                            <select name="employment_status" class="{{ $selectClass }}"
                                style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23111111\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');">
                                <option value="">-- Select Employment Status --</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="contract">Contract</option>
                                <option value="probation">Probation</option>
                            </select>
                        </div>
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
                        <div class="relative">
                            <select name="role" class="{{ $selectClass }}"
                                style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg width=\'12\' height=\'8\' viewBox=\'0 0 12 8\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3e%3cpath d=\'M1 1L6 6L11 1\' stroke=\'%23111111\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3e%3c/svg%3e');">
                                <option value="">-- Select Role --</option>
                                <option value="director">Director</option>
                                <option value="karyawan">Karyawan</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="col-span-2">
                        <label class="{{ $labelClass }}">Address</label>
                        <textarea name="address" rows="4"
                            class="w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] border-0 outline-none px-4 py-3 text-base font-medium text-[#111111] resize-none"></textarea>
                    </div>

                    <!-- Profile Image -->
                    <div class="col-span-2">
                        <label class="{{ $labelClass }}">Profile Image</label>
                        <input type="file" name="image" accept="image/*"
                            class="w-full h-[45px] bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] text-base font-medium text-[#111111] border-0 outline-none px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#111111] file:text-white hover:file:bg-[#333333] file:cursor-pointer cursor-pointer">
                    </div>
                </div>

                <button type="submit"
                    class="mt-8 w-full bg-[#111111] text-white py-3 rounded-[15px] shadow-[0px_0px_4px_#00000026] font-bold text-lg hover:bg-[#333333] transition-colors duration-200">
                    Save
                </button>
            </form>
        </div>
    </div>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-5 right-5 z-[10000] flex flex-col gap-3"></div>

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

    <style>
        /* Custom dropdown styling */
        select {
            transition: all 0.2s ease;
        }

        select:hover {
            background-color: #f3f3f3;
        }

        select:focus {
            background-color: #ffffff;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.15);
        }

        select::-ms-expand {
            display: none;
        }

        select option {
            padding: 10px;
            background-color: #ffffff;
            color: #111111;
        }

        select option:hover {
            background-color: #f9f9f9;
        }

        select option:checked {
            background-color: #111111;
            color: #ffffff;
        }

        select:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Toast Animations */
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .toast-enter {
            animation: slideInRight 0.3s ease-out forwards;
        }

        .toast-exit {
            animation: slideOutRight 0.3s ease-in forwards;
        }
    </style>

    {{-- Toast Notification Script --}}
    <script>
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            const icon = type === 'success' 
                ? '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>'
                : '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
            
            toast.className = `${bgColor} text-white px-5 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px] max-w-[400px] toast-enter`;
            toast.innerHTML = `
                ${icon}
                <span class="flex-1 text-sm font-medium">${message}</span>
                <button onclick="this.parentElement.remove()" class="ml-2 hover:opacity-80">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            
            container.appendChild(toast);
            
            setTimeout(() => {
                toast.classList.remove('toast-enter');
                toast.classList.add('toast-exit');
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        // Show success/error messages from session
        @if (session('success'))
            showToast('{{ session('success') }}', 'success');
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                showToast('{{ $error }}', 'error');
            @endforeach
        @endif
    </script>

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

            if (calendarPopup && calendarPopup.parentElement !== document.body) {
                document.body.appendChild(calendarPopup);
            }

            let viewDate = new Date();
            let activeInput = null;

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

            [birthInput, joinInput].forEach(inp => {
                inp.addEventListener('click', () => showCalendarFor(inp));
                inp.addEventListener('focus', () => showCalendarFor(inp));
            });
            birthIcon.addEventListener('click', () => showCalendarFor(birthInput));
            joinIcon.addEventListener('click', () => showCalendarFor(joinInput));

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

            document.addEventListener('click', (e) => {
                if (calendarPopup.classList.contains('hidden')) return;
                const t = e.target;
                if (t === birthInput || t === joinInput || t === birthIcon || t === joinIcon) return;
                if (!calendarPopup.contains(t)) hideCalendar();
            });

            const repositionIfOpen = () => {
                if (!calendarPopup.classList.contains('hidden') && activeInput) showCalendarFor(activeInput);
            };
            window.addEventListener('resize', repositionIfOpen);
            window.addEventListener('scroll', repositionIfOpen, true);

            initYear();
            renderCalendar();
        });
    </script>
@endsection
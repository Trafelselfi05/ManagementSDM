@extends('admin/layout')

@section('title', 'Detail User')

@section('content')
    <div class="flex justify-center items-start bg-[#f9f9f9]">
        <div
            class="max-w-4xl w-full bg-white p-10 shadow-[0px_0px_4px_#00000040] rounded-[15px] relative max-h-[calc(100vh-13em)] overflow-y-auto overflow-x-hidden">
            <form method="POST" action="{{ route('admin.user-detail.update', $user->id) }}" enctype="multipart/form-data"
                class="bg-white p-8 w-full mx-4">

                @csrf

                <div class="flex flex-col items-center gap-8 w-full">
                    <!-- Profile Header -->
                    <div class="flex flex-col gap-6 w-full">
                        <div class="flex flex-col gap-4">
                            <img class="w-32 h-32 object-cover rounded-full"
                                src="{{ $user->image ? asset($user->image) : 'https://c.animaapp.com/mf3roef4LjlRUB/img/ellipse-59.svg' }}"
                                alt="Profile Picture" />
                            <div class="flex flex-col items-center gap-2 text-center">
                                <input type="text"
                                    class="font-bold text-2xl text-[#111111] bg-transparent border-none outline-none w-full"
                                    value="{{ $user->name }}" id="profile-name" name="name">
                                <select name="division"
                                    class="appearance-none font-medium text-lg text-[#7d7d7d] bg-transparent border-none outline-none w-full pr-8 cursor-pointer"
                                    name="division">
                                    <option value="{{ $user->division }}">{{ $user->division }}</option>
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
                        <div class="flex items-center gap-4">
                            <button type="button"
                                class="w-40 h-10 bg-[#6fadc8] text-white font-semibold text-white rounded-[10px] text-center cursor-pointer border-none outline-none "
                                value="" id="profile-name" name="image" onclick="uploadPicture()"
                                placeholder="Upload Picture">Upload Picture
                            </button>
                            <button class="w-40 h-10 bg-neutral-100 text-[#7d7d7d] font-semibold text-base rounded-[10px]"
                                onclick="deletePicture()">
                                Delete Picture
                            </button>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                        <!-- Left Column -->
                        <div class="flex flex-col gap-5">
                            <!-- Email Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Email</div>
                                <input type="email"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->email }}" id="email" name="email">
                            </div>

                            <!-- NIK Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">NIK</div>
                                <input type="text"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->nik }}" id="nik" name="nik">
                            </div>

                            <!-- Status SDM Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Status SDM</div>
                                <select
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none appearance-none"
                                    id="status-sdm" name="employment_status">
                                    <option value="{{ $user->employment_status }}">{{ $user->employment_status }}</option>
                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                                    <option value="contract">contract</option>
                                    <option value="probation">probation</option>
                                </select>
                            </div>

                            <!-- Phone Number Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">No. HP</div>
                                <input type="tel"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->phone }}" id="phone" name="phone">
                            </div>

                            <!-- Join Date Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Tanggal masuk</div>
                                <input type="date"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->join_date }}" id="join-date" name="join_date">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="flex flex-col gap-5">
                            <!-- Password Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Password</div>
                                <input type="text"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="" id="password" name="password">
                            </div>

                            <!-- Telegram Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Link Telegram</div>
                                <input type="text"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->telegram_link }}" id="telegram" name="telegram_link">
                            </div>

                            <!-- Address Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Alamat</div>
                                <input type="text"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->address }}" id="address" name="address">
                            </div>

                            <!-- Birth Date Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Tanggal Lahir</div>
                                <input type="date"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->birth_date }}" id="birth-date" name="birth_date">
                            </div>

                            <!-- Education Field -->
                            <div class="flex flex-col gap-3">
                                <div class="font-medium text-base text-[#7d7d7d]">Pendidikan Terakhir</div>
                                <input type="text"
                                    class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none"
                                    value="{{ $user->last_education }}" id="last_education" name="last_education">
                            </div>
                        </div>
                    </div>

                    {{-- <!-- Address -->
                <div class="w-full">
                    <label class="font-medium text-base text-[#7d7d7d] ">Address</label>
                    <textarea name="address"
                        class="h-24 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 mt-3 font-medium text-base text-[#111111] border-none outline-none">{{ $user->address }}</textarea>
                </div> --}}

                    <!-- Save Button -->
                    <div class="flex justify-center w-full mt-4">
                        <button type="submit"
                            class="h-12 w-64 bg-[#111111] text-white font-bold text-xl rounded-[15px] shadow-[0px_0px_4px_#00000026]">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
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


    <script>
        // function uploadPicture() {
        //     const fileInput = document.createElement('input');
        //     fileInput.type = 'file';
        //     fileInput.accept = 'image/*';
        //     fileInput.onchange = (e) => {
        //         const file = e.target.files[0];
        //         if (file) {
        //             const reader = new FileReader();
        //             reader.onload = (event) => {
        //                 // Tampilkan di <img>
        //                 const img = document.querySelector('img[alt="Profile Picture"]');
        //                 if (img) img.src = event.target.result;

        //                 // Simpan base64 ke input hidden untuk dikirim ke server
        //                 let hiddenInput = document.querySelector('input[name="image"]');
        //                 if (!hiddenInput) {
        //                     hiddenInput = document.createElement('input');
        //                     hiddenInput.type = 'hidden';
        //                     hiddenInput.name = 'image';
        //                     document.querySelector('form').appendChild(hiddenInput);
        //                 }
        //                 hiddenInput.value = event.target.result; // Base64 image
        //             };
        //             reader.readAsDataURL(file);
        //         }
        //     };
        //     fileInput.click();
        // }

        function uploadPicture() {
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            fileInput.onchange = (e) => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        // Preview ke <img>
                        const img = document.querySelector('img[alt="Profile Picture"]');
                        if (img) img.src = event.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Tambahkan file ke form
                    let hiddenInput = document.querySelector('input[name="image"]');
                    if (!hiddenInput) {
                        hiddenInput = document.createElement('input');
                        hiddenInput.type = 'file';
                        hiddenInput.name = 'image';
                        hiddenInput.className = 'hidden';
                        hiddenInput.files = e.target.files; // simpan file asli
                        document.querySelector('form').appendChild(hiddenInput);
                    }
                }
            };
            fileInput.click();
        }



        function deletePicture() {
            document.querySelector('img[alt="Profile Picture"]').src =
                'https://c.animaapp.com/mf3roef4LjlRUB/img/ellipse-59.svg';
        }

        function saveProfile() {
            const profileData = {
                name: document.getElementById('profile-name').value,
                title: document.getElementById('profile-title').value,
                email: document.getElementById('email').value,
                nik: document.getElementById('nik').value,
                statusSDM: document.getElementById('status-sdm').value,
                phone: document.getElementById('phone').value,
                joinDate: document.getElementById('join-date').value,
                password: document.getElementById('password').value,
                telegram: document.getElementById('telegram').value,
                address: document.getElementById('address').value,
                birthDate: document.getElementById('birth-date').value,
                education: document.getElementById('education').value
            };
            console.log('Saving profile data:', profileData);
            alert('Profile berhasil disimpan!');
        }
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

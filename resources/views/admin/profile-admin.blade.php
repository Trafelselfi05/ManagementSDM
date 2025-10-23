@extends('admin/layout')

@section('title', 'Add User')

@section('content')
<div class="flex justify-center items-start bg-[#f9f9f9] max-h-screen px-4 md:py-8">
  <div
    class="w-full max-w-4xl bg-white p-6 md:p-10 shadow-[0px_0px_4px_#00000040] rounded-[15px] relative max-h-[calc(100vh-8em)] md:max-h-[calc(100vh-13em)] overflow-y-auto"
  >
    <h2 class="text-xl font-bold mb-8 text-center md:text-left">Create New Account</h2>

    <form action="{{ route('admin.profile-admin.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      @php
          $inputClass = "flex h-[45px] items-center gap-2.5 px-4 py-[11px] w-full 
                        bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] 
                        text-base font-medium text-[#111111] border-0 outline-none";
          $labelClass = 'block text-sm font-medium text-gray-700 mb-2';
          $selectClass = $inputClass . ' appearance-none cursor-pointer bg-no-repeat bg-[position:right_1rem_center] bg-[length:12px_8px]';
      @endphp

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
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

        <!-- Division -->
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

        <!-- Telegram -->
        <div>
          <label class="{{ $labelClass }}">Telegram Link</label>
          <input type="text" name="telegram_link" class="{{ $inputClass }}">
        </div>

        <!-- Employment Status -->
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

        <!-- Birth Date -->
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

        <!-- Join Date -->
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
            </select>
          </div>
        </div>

        <!-- Address -->
        <div class="col-span-1 md:col-span-2">
          <label class="{{ $labelClass }}">Address</label>
          <textarea name="address" rows="4"
            class="w-full bg-[#f9f9f9] rounded-[15px] shadow-[0px_0px_4px_#00000026] border-0 outline-none px-4 py-3 text-base font-medium text-[#111111] resize-none"></textarea>
        </div>

        <!-- Profile Image -->
        <div class="col-span-1 md:col-span-2">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const monthShortNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        const $calendarPopup = $('#calendarPopup');
        const $monthShortEl = $('#month-short');
        const $yearSelect = $('#year-select');
        const $prevBtn = $('#prev-btn');
        const $nextBtn = $('#next-btn');
        const $datesGrid = $('#dates-grid');

        const $birthInput = $('#birth-date');
        const $joinInput = $('#join-date');
        const $birthIcon = $('#birth-date-icon');
        const $joinIcon = $('#join-date-icon');

        if ($calendarPopup.length && $calendarPopup.parent()[0] !== document.body) {
            $calendarPopup.appendTo('body');
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
            $yearSelect.empty();
            const cur = new Date().getFullYear();
            for (let y = cur - 50; y <= cur + 50; y++) {
                const $opt = $('<option>', {
                    value: y,
                    text: y
                });
                $yearSelect.append($opt);
            }
        }

        function updateHeader() {
            $yearSelect.val(viewDate.getFullYear());
            $monthShortEl.text(monthShortNames[viewDate.getMonth()]);
        }

        function renderCalendar() {
            const year = viewDate.getFullYear();
            const month = viewDate.getMonth();
            updateHeader();
            $datesGrid.empty();

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                const $cell = $('<div>', {
                    class: 'w-10 h-10 rounded-full text-center text-sm text-gray-300'
                });
                $datesGrid.append($cell);
            }

            const today = stripTime(new Date()).getTime();
            const currentVal = activeInput && activeInput.value ? new Date(activeInput.value) : null;
            const selectedTime = currentVal ? stripTime(currentVal).getTime() : null;

            for (let d = 1; d <= daysInMonth; d++) {
                const $cell = $('<button>', {
                    type: 'button',
                    class: 'w-10 h-10 rounded-full text-center text-sm flex items-center justify-center focus:outline-none hover:bg-gray-100 transition',
                    text: d
                });

                const cellDate = new Date(year, month, d);
                const cellTime = stripTime(cellDate).getTime();

                if (cellTime === today) {
                    $cell.addClass('font-semibold');
                    $cell.css('box-shadow', 'inset 0 0 0 1px rgba(0,0,0,0.05)');
                }
                if (selectedTime && cellTime === selectedTime) {
                    $cell.addClass('bg-blue-500 text-white font-semibold');
                }

                $cell.on('click', function() {
                    if (!activeInput) return;
                    activeInput.value = formatISO(cellDate);
                    hideCalendar();
                });

                $datesGrid.append($cell);
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

            $calendarPopup.removeClass('hidden');
            $calendarPopup.css('visibility', 'hidden');

            const rect = inputEl.getBoundingClientRect();
            const popupW = $calendarPopup.outerWidth() || 320;
            const popupH = $calendarPopup.outerHeight() || 360;

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

            $calendarPopup.css({
                position: 'absolute',
                left: left + 'px',
                top: top + 'px',
                visibility: 'visible'
            });
            $calendarPopup.removeClass('hidden');

            renderCalendar();
        }

        function hideCalendar() {
            $calendarPopup.addClass('hidden');
            activeInput = null;
        }

        // Event binding for date inputs
        [$birthInput, $joinInput].forEach(function($inp) {
            $inp.on('click', function() {
                showCalendarFor(this);
            });
            $inp.on('focus', function() {
                showCalendarFor(this);
            });
        });

        $birthIcon.on('click', function() {
            showCalendarFor($birthInput[0]);
        });

        $joinIcon.on('click', function() {
            showCalendarFor($joinInput[0]);
        });

        // Calendar navigation
        $prevBtn.on('click', function() {
            viewDate.setMonth(viewDate.getMonth() - 1);
            renderCalendar();
        });

        $nextBtn.on('click', function() {
            viewDate.setMonth(viewDate.getMonth() + 1);
            renderCalendar();
        });

        $yearSelect.on('change', function(e) {
            viewDate.setFullYear(Number($(this).val()));
            renderCalendar();
        });

        // Click outside to close
        $(document).on('click', function(e) {
            if ($calendarPopup.hasClass('hidden')) return;
            const t = e.target;
            if (t === $birthInput[0] || t === $joinInput[0] || t === $birthIcon[0] || t === $joinIcon[0]) return;
            if (!$calendarPopup.is(e.target) && $calendarPopup.has(e.target).length === 0) {
                hideCalendar();
            }
        });

        // Reposition on resize/scroll
        const repositionIfOpen = function() {
            if (!$calendarPopup.hasClass('hidden') && activeInput) showCalendarFor(activeInput);
        };
        $(window).on('resize', repositionIfOpen);
        $(window).on('scroll', repositionIfOpen);

        // Init
        initYear();
        renderCalendar();
    });
</script>
@endsection
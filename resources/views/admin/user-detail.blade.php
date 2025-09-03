@extends('admin/layout')

@section('title', 'Profile Admin')
@section('content')
<div class="flex justify-center items-center min-h-screen py-8">
    <div class="bg-white rounded-[20px] shadow-[0px_0px_4px_#00000040] p-8 w-full max-w-4xl mx-4">
        <div class="flex flex-col items-center gap-8 w-full">
            <!-- Profile Header -->
            <div class="flex flex-col  gap-6 w-full">
                <div class="flex flex-col  gap-4">
                    <img class="w-32 h-32 object-cover rounded-full" src="https://c.animaapp.com/mf3roef4LjlRUB/img/ellipse-59.svg" alt="Profile Picture" />
                    <div class="flex flex-col items-center gap-2 text-center">
                        <input type="text" class="font-bold text-2xl text-[#111111] bg-transparent border-none outline-none  w-full" value="Name Example" id="profile-name">
                        <input type="text" class="font-medium text-lg text-[#7d7d7d] bg-transparent border-none outline-none  w-full" value="UI/UX Designer" id="profile-title">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="w-40 h-10 bg-[#6fadc8] text-white font-semibold text-base rounded-[10px]" onclick="uploadPicture()">
                        Upload Picture
                    </button>
                    <button class="w-40 h-10 bg-neutral-100 text-[#7d7d7d] font-semibold text-base rounded-[10px]" onclick="deletePicture()">
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
                        <input type="email" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="lorem@email.com" id="email">
                    </div>

                    <!-- NIK Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">NIK</div>
                        <input type="text" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="3326778899003" id="nik">
                    </div>

                    <!-- Status SDM Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">Status SDM</div>
                        <select class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none appearance-none" id="status-sdm">
                            <option value="Tetap" selected>Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Magang">Magang</option>
                        </select>
                    </div>

                    <!-- Phone Number Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">No. HP</div>
                        <input type="tel" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="0867744666778" id="phone">
                    </div>

                    <!-- Join Date Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">Tanggal masuk</div>
                        <input type="date" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="2021-01-18" id="join-date">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="flex flex-col gap-5">
                    <!-- Password Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">Password</div>
                        <input type="password" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="QQQ123" id="password">
                    </div>

                    <!-- Telegram Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">Link Telegram</div>
                        <input type="text" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="Loremipsum" id="telegram">
                    </div>

                    <!-- Address Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">Alamat</div>
                        <input type="text" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="Semarang, Jawa tengah" id="address">
                    </div>

                    <!-- Birth Date Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">Tanggal Lahir</div>
                        <input type="date" class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none" value="1999-01-01" id="birth-date">
                    </div>

                    <!-- Education Field -->
                    <div class="flex flex-col gap-3">
                        <div class="font-medium text-base text-[#7d7d7d]">Pendidikan Terakhir</div>
                        <select class="h-12 w-full bg-white rounded-[15px] shadow-[0px_0px_4px_#00000026] px-4 py-2 font-medium text-base text-[#111111] border-none outline-none appearance-none" id="education">
                            <option value="S1 Teknik Informatika" selected>S1 Teknik Informatika</option>
                            <option value="S2 Teknik Informatika">S2 Teknik Informatika</option>
                            <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                            <option value="SMA">SMA</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="flex justify-center w-full mt-4">
                <button class="h-12 w-64 bg-[#111111] text-white font-bold text-xl rounded-[15px] shadow-[0px_0px_4px_#00000026]" onclick="saveProfile()">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function uploadPicture() {
        // Create a file input element
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = 'image/*';
        
        // Handle file selection
        fileInput.onchange = (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    // Update profile picture
                    document.querySelector('img[alt="Profile Picture"]').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        };
        
        // Trigger file selection
        fileInput.click();
    }

    function deletePicture() {
        // Reset to default profile picture
        document.querySelector('img[alt="Profile Picture"]').src = 'https://c.animaapp.com/mf3roef4LjlRUB/img/ellipse-59.svg';
    }

    function saveProfile() {
        // Get all values from form fields
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

        // Here you would typically send this data to your server
        console.log('Saving profile data:', profileData);
        
        // Show success message (you can replace this with a more elegant notification)
        alert('Profile berhasil disimpan!');
    }
</script>
@endsection
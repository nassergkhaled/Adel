<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <link rel="icon" href="{{ asset('images\Group.png') }}" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'عادل') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/a9938c3b92.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-adel-bg font-Almarai">
    @include('layouts.navbar')
    <main>
        <div class="flex gap-5 justify-center items-start mt-6 h-[88vh]">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body mx-auto flex">
                    <h2 class="card-title text-center">اشتراك جديد</h2>

                    <form action="{{route('newOffice')}}" method="POST" class="flex flex-col space-y-3 mx-auto">
                        @csrf
                        <input type="text" name="office_name" class=" rounded-lg" placeholder="اسم المكتب">
                        <input type="text" name="location" class=" rounded-lg" placeholder="الموقع">
                        <input type="text" inputmode="numeric" name="office_phone" class=" rounded-lg" placeholder="رقم هاتف المكتب">
                        <input type="text" name="full_name" class=" rounded-lg" placeholder="الاسم الكامل">
                        <input type="text" inputmode="numeric" name="phone" class=" rounded-lg" placeholder="رقم الهاتف">
                        <input type="text" inputmode="numeric" name="ID" class=" rounded-lg" placeholder="رقم الهوية">
                        <input type="date" name="hiring_date" class=" rounded-lg" placeholder="تاريخ التعيين">
                        
                        <button type="submit" class="btn btn-primary">اشتراك</button>
                    </form>

                </div>
            </div>
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body mx-auto flex">
                    <h2 class="card-title text-center">انضمام الى مكتب</h2>
                    <form action="/" method="GET" class="flex flex-col space-y-3 mx-auto text-black">
                        <input type="text" name="join_code" class=" rounded-lg" placeholder="كود الانضمام">
                        <select name="role" id="roleSelect" class="rounded-lg">
                            <option value="" disabled selected>الوضيفة</option>
                            <option value="secretary">سكرتير</option>
                            <option value="lawyer">محامي</option>
                            <option value="client">موكل</option>
                        </select>
                        <input type="text" name="full_name" class="rounded-lg" placeholder="الاسم الكامل">
                        <input type="text" inputmode="numeric" name="phone_number" class="rounded-lg" placeholder="رقم الهاتف">
                        <input type="text" inputmode="numeric" name="id_number" class="rounded-lg" placeholder="رقم الهوية">
                        <!-- Lawyer specific fields -->
                        <input type="text" name="registration_no" id="registrationNo" class="rounded-lg" placeholder="رقم التسجيل" style="display:none;">
                        <input type="text" name="exp_years" id="expYears" class="rounded-lg" placeholder="سنوات الخبرة" style="display:none;">
                        <!-- Client specific fields -->
                        <input type="text" name="nationality" id="nationality" class="rounded-lg" placeholder="الجنسية" style="display:none;">
                        <input type="date" name="birth_date" id="birthDate" class="rounded-lg" placeholder="تاريخ الميلاد" style="display:none;">
                        <button type="submit" id="submitButton" class="btn btn-primary">انضمام</button>
                    </form>
                </div>
            </div>
            
            <script>
            document.getElementById('roleSelect').addEventListener('change', function() {
                var role = this.value;
                var formFields = document.querySelectorAll('.rounded-lg'); // Select all inputs
                var submitButton = document.getElementById('submitButton');
                
                if (role === "") {
                    // Hide all fields and disable the submit button if the default option is selected
                    formFields.forEach(function(field) {
                        field.style.display = 'none';
                    });
                    submitButton.disabled = true;
                } else {
                    // Show all fields and enable the submit button
                    formFields.forEach(function(field) {
                        field.style.display = 'block';
                    });
                    submitButton.disabled = false;
                    // Hide role-specific fields initially
                    document.getElementById('registrationNo').style.display = 'none';
                    document.getElementById('expYears').style.display = 'none';
                    document.getElementById('nationality').style.display = 'none';
                    document.getElementById('birthDate').style.display = 'none';
            
                    // Then show fields based on selected role
                    if (role === 'lawyer') {
                        document.getElementById('registrationNo').style.display = 'block';
                        document.getElementById('expYears').style.display = 'block';
                    } else if (role === 'client') {
                        document.getElementById('nationality').style.display = 'block';
                        document.getElementById('birthDate').style.display = 'block';
                    }
                }
            });
            </script>
            
        </div>


    </main>
</body>

</html>

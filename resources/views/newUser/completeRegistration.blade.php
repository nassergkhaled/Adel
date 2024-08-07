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
            @if (session()->has('msg'))
                <div role="alert"
                    class="alert alert-success w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ __(session()->get('msg')) }}</span>
                </div>
            @elseif (session()->has('ValError'))
                <div role="alert"
                    class="alert alert-warning w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ __(session()->get('ValError')) }}</span>
                </div>
            @elseif (session()->has('errMsg'))
                <div role="alert"
                    class="alert alert-error w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ __(session()->get('errMsg')) }}</span>
                </div>
            @endif
            @if (session()->has('msg'))
            <div role="alert"
                class="alert alert-success w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ __(session()->get('msg')) }}</span>
            </div>
        @elseif (session()->has('ValError'))
            <div role="alert"
                class="alert alert-warning w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>{{ __(session()->get('ValError')) }}</span>
            </div>
        @elseif (session()->has('errMsg'))
            <div role="alert"
                class="alert alert-error w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ __(session()->get('errMsg')) }}</span>
            </div>
        @endif

            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body mx-auto flex">
                    <h2 class="card-title text-center mb-3">اشتراك جديد</h2>

                    <form action="{{ route('newOffice') }}" method="POST" class=" mx-auto">
                        @csrf
                        <div class="p-4 border border-gray-200 rounded-lg relative flex flex-col space-y-3 mx-auto">
                            <h2
                                class="text-lg font-semibold bg-[#1d232a] rounded-md border border-white px-2 absolute -top-3 left-4">
                                معلومات المكتب</h2>
                            <div class="">
                                <input type="text" name="office_name" class="mt-2 text-black rounded-lg"
                                    placeholder="اسم المكتب">
                                <input type="text" name="location" class="mt-2 text-black  rounded-lg"
                                    placeholder="الموقع">
                                <input type="text" inputmode="numeric" name="office_phone"
                                    class="mt-2 text-black  rounded-lg" placeholder="رقم هاتف المكتب">
                            </div>

                        </div>
                        <div
                            class="p-4 mt-5 border border-gray-200 rounded-lg relative flex flex-col space-y-3 mx-auto">
                            <h2
                                class="text-lg font-semibold bg-[#1d232a] rounded-md border border-white px-2 absolute -top-3 left-4">
                                معلومات المدير</h2>
                            <div class="text-black">
                                <input type="text" name="manager_name" class="mt-2 text-black  rounded-lg"
                                    placeholder="الاسم الكامل">
                                <input type="text" inputmode="numeric" name="manager_phone"
                                    class="mt-2 text-black  rounded-lg" placeholder="رقم الهاتف">
                                <input type="text" inputmode="numeric" name="manager_id"
                                    class="mt-2 text-black  rounded-lg" placeholder="رقم الهوية">
                                <input type="date" name="hiring_date" class="mt-2 text-black rounded-lg"
                                    placeholder="تاريخ التعيين">
                            </div>
                        </div>

                        <button type="submit" class=" flex mx-auto btn btn-primary w-[90%] mt-3">اشتراك</button>
                    </form>
                    <p class="text-sm mx-auto w-[88%] mt-2 flex items-center">
                        * في حالة الاشتراك سيتم تسجيلك كـمدير و سيتم انشاء مكتب جديد خاص بك و بالموظفين في هذا المكتب
                    </p>

                </div>
            </div>
            <div class="flex flex-col space-y-5">
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body mx-auto flex">
                        <h2 class="card-title text-center mb-3">انضمام الى مكتب</h2>
                        <form action="/" method="GET" class="flex flex-col space-y-3 mx-auto text-black">
                            <input type="text" name="join_code" class=" rounded-lg" placeholder="كود الانضمام">
                            <select name="role" id="roleSelect" class="rounded-lg">
                                <option value="" disabled selected>الوضيفة</option>
                                <option value="secretary">سكرتير</option>
                                <option value="lawyer">محامي</option>
                                <option value="client">موكل</option>
                            </select>
                            <input type="text" name="full_name" class="rounded-lg" placeholder="الاسم الكامل">
                            <input type="text" inputmode="numeric" name="phone_number" class="rounded-lg"
                                placeholder="رقم الهاتف">
                            <input type="text" inputmode="numeric" name="id_number" class="rounded-lg"
                                placeholder="رقم الهوية">
                            <!-- Lawyer specific fields -->
                            <input type="text" name="registration_no" id="registrationNo" class="rounded-lg"
                                placeholder="رقم التسجيل" style="display:none;">
                            <input type="text" name="exp_years" id="expYears" class="rounded-lg"
                                placeholder="سنوات الخبرة" style="display:none;">
                            <!-- Client specific fields -->
                            <input type="text" name="nationality" id="nationality" class="rounded-lg"
                                placeholder="الجنسية" style="display:none;">
                            <input type="date" name="birth_date" id="birthDate" class="rounded-lg"
                                placeholder="تاريخ الميلاد" style="display:none;">
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

                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body mx-auto flex">
                        <h2 class="card-title text-center mb-3">تسجيل حساب كموكّل</h2>
                        <form action="{{ route('newClientUser') }}" method="POST"
                            class="flex flex-col space-y-3 mx-auto text-black">
                            @csrf
                            <input type="text" name="join_code" class=" rounded-lg" placeholder="كود الانضمام">
                            @error('join_code')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                            <p class="text-sm mx-auto w-[88%] mt-2 flex items-center text-gray-400">
                                * يرجى ادخال كود الانصمام المزود لك من قبل المكتب .
                            </p>
                            <button type="submit" id="submitButton" class="btn btn-primary">انضمام</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </main>
</body>

</html>

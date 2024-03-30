<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center py-5">

                <!-- Logo on the right -->
                <div class="flex items-center">
                    <img src="{{ asset('images\Group.png') }}" alt="">
                </div>

                <!-- Navigation buttons in the middle -->
                <div class="flex-grow flex items-center justify-center">
                    <a href="#"
                        class="text-[#BF9874] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">الرئيسية</a>
                    <a href="#"
                        class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">عنا</a>
                    <a href="#"
                        class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">خدماتنا</a>
                    <a href="#"
                        class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">شركاؤنا</a>
                </div>

                <!-- Buttons on the left with red background -->
                <div class="flex items-center">
                    <a href="{{route('login')}}" class="bg-[#BF9874] text-white px-4 py-2 rounded-md text-sm font-medium font-Almarai">تسجيل
                        الدخول</a>
                    <a href="#"
                        class="text-[#BF9874] px-3 py-2 rounded-md text-sm font-medium underline font-Almarai">إنشاءحساب</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative">
        <img src="{{ asset('images\Rectangle 5.jpg') }}" alt="photo" class="w-full h-auto sm:object-cover ">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent">

            <div class="text-rigth mt-[310px] mr-[200px]">
                <h1 class="text-white text-5xl font-bold my-5 font-Almarai">أصبحت برامج إدارة</h1>
                <h1 class="text-white text-5xl font-bold my-5font-Almarai">الممارسات القانونيـة سهلة</h1>
                <p class="text-[#AAAAAA] text-lg font-bold my-5 font-Almarai">قم بأتمتة شركتك وإانجاز المزيد من المهام في وقت أقل
                    بإستخدام ADEL</p>
                <button
                    class="text-white bg-[#BF9874] font-Almarai px-4 py-2 my-3 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-opacity-50">معرفة
                    المزيد</button>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center space-x-reverse space-x-6 h-[196px]">
        <!-- Statistic 1 -->
        <div class="text-center px-16">
            <div class="flex items-center text-6xl font-bold text-[#BF9874] ">
                <span class="text-black text-2xl font-bold px-3 font-Almarai">المحاكم</span>
                <span>1000</span>
            </div>
        </div>

        <!-- Statistic 2 -->
        <div class="text-center px-16">
            <div class="flex text-6xl text-[#BF9874] font-bold items-center">
                <span class="text-black text-2xl font-bold px-3 font-Almarai">شركائنا</span>
                <span>500</span>
            </div>
        </div>

        <!-- Statistic 3 -->
        <div class="text-center px-16">
            <div class="flex items-center text-6xl font-bold text-[#BF9874]"><span
                    class="text-black text-2xl font-bold px-3 font-Almarai">المحامين</span>100</div>
        </div>
    </div>

    {{-- About us dev ,amr qabaha --}}
    <div></div>

    {{-- Start of OUR FEATURES section --}}
    <div class="bg-gray-100 w-full h-[227px]">
        <!-- Title centered -->
        <div class="flex justify-center items-center ">
            <div class="text-[2.9rem] font-bold text-center font-Almarai">خدماتنـا</div>
        </div>

        <!-- Cards below the title -->
        <div class="flex justify-center items-center py-8">
            <div class="flex justify-between items-center  mx-auto space-x-reverse space-x-10">
                <!-- Card 1 -->
                <div
                    class="bg-white flex items-center px-[17px] py-[24px] rounded border border-[#E1E1E1] shadow w-[464px] h-[90px] ">
                    <div class="flex p-1 ">
                        <img src="{{ asset('images\Frame 1300.png') }}" alt="Icon" class="h-[70px] w-[71px]">
                    </div>

                    <div class="flex-grow">
                        <p class="text-black font-bold text-xl pr-4 font-Almarai">جدولة المواعيد</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white flex items-center px-[17px] py-[24px] rounded border border-[#E1E1E1] shadow w-[464px] h-[90px] ">
                    <div class="flex p-1 ">
                        <img src="{{ asset('images\Frame 1298.png') }}" alt="Icon" class="h-[70px] w-[71px]">
                    </div>

                    <div class="flex-grow">
                        <p class="text-black font-bold text-xl pr-4 font-Almarai">تتبع الوقت والفواتير </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white flex items-center px-[17px] py-[24px] rounded border border-[#E1E1E1] shadow w-[464px] h-[90px] ">
                    <div class="flex p-1 ">
                        <img src="{{ asset('images\Frame 1299.png') }}" alt="Icon" class="h-[70px] w-[71px]">
                    </div>

                    <div class="flex-grow">
                        <p class="text-black font-bold text-xl pr-4 font-Almarai"> إدارة الملفات القانونية </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of OUR FEATURES section --}}
<br>
<br>

<div class="flex justify-center items-center">
    <div class="w-[1440px] h-[285px] flex flex-col justify-center items-center py-4">
        <!-- Title centered -->
        <div class="text-[2.9rem] font-bold text-center font-Almarai pb-3">شركاؤنا</div>
        <!-- Partner logos -->
        <div>
            <img src="{{asset('images/partners.png')}}" alt="Partners Photo Here">
        </div>
    </div>
</div>




</body>

</html>

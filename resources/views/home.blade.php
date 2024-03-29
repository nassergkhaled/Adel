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
                    <a href="#" class="bg-[#BF9874] text-white px-4 py-2 rounded-md text-sm font-medium">تسجيل
                        الدخول</a>
                    <a href="#"
                        class="text-[#BF9874] px-3 py-2 rounded-md text-sm font-medium underline">إنشاءحساب</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative">
        <img src="{{ asset('images\Rectangle 5.jpg') }}" alt="photo" class="w-full h-auto">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent">

            <div class="text-rigth mt-[310px] mr-[200px]">
                <h1 class="text-white text-5xl font-bold my-5">أصبحت برامج إدارة</h1>
                <h1 class="text-white text-5xl font-bold my-5">الممارسات القانونيـة سهلة</h1>
                <p class="text-[#AAAAAA] text-lg font-bold my-5 ">قم بأتمتة شركتك وإانجاز المزيد من المهام في وقت أقل
                    بإستخدام ADEL</p>
                <button
                    class="text-white bg-[#BF9874] px-4 py-2 my-3 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-opacity-50">معرفة
                    المزيد</button>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center space-x-reverse space-x-6 gap-[200px] py-20">
        <!-- Statistic 1 -->
        <div class="items-center text-center px-16">
            <div class="flex items-center text-6xl font-bold text-[#BF9874] ">
                <span class="text-black text-2xl font-bold px-3">المحاكم</span>
                <span>1000</span>
            </div>
        </div>

        <!-- Statistic 2 -->
        <div class="text-center px-16">
            <div class="flex text-6xl text-[#BF9874] font-bold items-center">
                <span class="text-black text-2xl font-bold px-3">شركائنا</span>
                <span>500</span>
            </div>
        </div>

        <!-- Statistic 3 -->
        <div class="text-center px-16">
            <div class="flex items-center text-6xl font-bold text-[#BF9874]"><span
                    class="text-black text-2xl font-bold px-3">المحامين</span>100</div>
        </div>
    </div>


</body>

</html>

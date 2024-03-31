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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/98c9346143.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>

<body class="bg-gray-100 font-Almarai">
    <header>
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-center py-5">

                    <!-- Logo on the right -->
                    <div class="flex items-center">
                        <img src="{{ asset('images\Group.png') }}" alt="Adel Logo">
                    </div>

                    <!-- Navigation buttons in the middle -->
                    <div class="flex-grow flex items-center justify-center">
                        <a href="#main"
                            class="text-[#BF9874] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">الرئيسية</a>
                        <a href="#us"
                            class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">عنا</a>

                        {{--
                        <x-nav-link :href="'#' . $id='us'" :active="request()->is($id)">
                        عنا
                    </x-nav-link>
                    --}}

                        <a href="#ourServices"
                            class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">خدماتنا</a>
                        <a href="#partners"
                            class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">شركائنا</a>
                    </div>

                    <!-- Buttons on the left with red background -->
                    <div class="flex items-center">
                        <a href="{{ route('login') }}"
                            class="bg-[#BF9874] text-white px-4 py-2 rounded-md text-sm font-medium font-Almarai">تسجيل
                            الدخول</a>
                        <a href="{{ route('register') }}"
                            class="text-[#BF9874] px-3 py-2 rounded-md text-sm font-medium underline">إنشاء
                            حساب</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="relative w-full" id="main">
        <img src="{{ asset('images/Rectangle 5.jpg') }}" alt="photo" class="w-full h-auto sm:h-screen object-cover">

        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent flex items-center justify-start ">

            <div class="text-right p-4 sm:p-5 lg:mr-32 xl:mr-52 2xl:mr-45 lg:-mt-36">
                <h1
                    class="text-white sm:text-2xl md:text-5xl font-bold md:my-0 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-[65%] lg:leading-snug">
                    أصبحت برامج إدارة الممارسات القانونية سهلة</h1>
                <p
                    class="text-[#AAAAAA] text-base md:text-lg font-bold w-full sm:w-3/4 md:w-2/3 lg:w-full my-2 md:my-3">
                    قم بأتمتة شركتك وإنجاز المزيد من المهام في وقت أقل بإستخدام ADEL</p>
                <button
                    class="text-white bg-[#BF9874] px-2 py-2 mt-3 font-bold rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-opacity-50 transition ease-in-out duration-150">معرفة
                    المزيد</button>
            </div>
        </div>
    </div>



    <div class="flex flex-wrap justify-between items-center md:space-x-6 h-auto">
        <!-- Statistic 1 -->
        <div class="w-full md:w-auto text-center px-4 md:px-16 py-8 md:py-16">
            <div
                class="flex flex-col md:flex-row items-center justify-center md:text-6xl text-4xl font-bold text-[#BF9874] ">
                <span class="text-black text-xl md:text-2xl font-bold px-2 md:px-3 font-Almarai">المحاكم</span>
                <span>1000</span>
            </div>
        </div>
        <!-- Statistic 2 -->
        <div class="w-full md:w-auto text-center px-4 md:px-16 py-8 md:py-16">
            <div
                class="flex flex-col md:flex-row items-center justify-center md:text-6xl text-4xl text-[#BF9874] font-bold">
                <span class="text-black text-xl md:text-2xl font-bold px-2 md:px-3 font-Almarai">شركائنا</span>
                <span>500</span>
            </div>
        </div>
        <!-- Statistic 3 -->
        <div class="w-full md:w-auto text-center px-4 md:px-16 py-8 md:py-16">
            <div
                class="flex flex-col md:flex-row items-center justify-center md:text-6xl text-4xl font-bold text-[#BF9874]">
                <span class="text-black text-xl md:text-2xl font-bold px-2 md:px-3 font-Almarai">المحامين</span>
                <span>100</span>
            </div>
        </div>
    </div>



    {{-- About us dev ,amr qabaha --}}
    <div class="flex justify-between items-center space-x-reverse space-x-6 h-[636px] bg-[#EFEAE4] overflow-hidden lg:text-clip"
        id="us" style="scrollbar-width: none;">

        <div class="text-start w-[35%] h-[395px] ms-[10%] overflow-auto hi" style="scrollbar-width: none;">
            <h1 class="text-[#1C1C1C] text-[60px] ">عنا</h1>
            <p class="text-[#B4B4B4] text-[100%]"> إدارة الملفات القانونية: السماح بإنشاء ملفات لكل عميل بما في ذلك
                معلومات شخصية وخرائط شخصية وقانونية. يتم تنظيم الملفات بشكل هرمي، مع إمكانية إضافة التعليقات والوثائق
                المتعلقة. تتبع الوقت والفواتير:يوفر النظام واجهة سهلة لتسجيل ساعات العمل والقانون القانوني لكل محامي.
                اتخذ المحامون من إنشاء فواتير للخدمات الرائدة في الوقت والنشاط. إدارة المواعيد:يسمح النظام بجدولة
                المواعيد والمهام للمحامين فقط. يمكن تعيين التنبيهات والتذكيرات وعدم تفويت أي موعد مهم. إدارة المستندات:
                تتيح تخزين المستندات بشكل آمن ومنظم. يمكن مشاركة المستندات بسهولة بين أعضاء الفريق أو مع العملاء. تقارير
                تحليلية: تقدم التقارير تقارير دورية عن أداء المكتب وتحليلات مفصلة عن النتائج والدخل. تساعد هذه التحديد
                على تحديد المجالات التي تحتاج إلى تحديد القرار الصحيح. أمان:يوفر النظام مستويات بيانات عالية من الأمان
                وموثوقة ولكن المعلومات القانونية. تتميز بآليات النسخ الاحتياطي والتشفير لحماية البيانات من الفقدان أو
                كلمة المرور. باختصار، يهدف المشروع إلى توفير برامج متخصصة في إدارة مكاتب المحاماة لتقديم منصة شاملة
                ومتكاملة وفعالة للعمل المكتبي وتسهيل والتواصل مع العملاء بطريقة مؤسسية وآمنة.</p>

        </div>

        <div id="ourServices"></div>
        <div class="items-start h-full w-auto flex-none bye">
            <img src="{{ asset('images/img3.png') }}" alt="" class="mt-[23px] h-[612px] w-full">
        </div>
    </div>


    {{-- Start of OUR FEATURES section --}}
    <div class="bg-gray-100 w-full my-20 ">
        <!-- Title centered -->
        <div class="flex justify-center items-center text-[#1C1C1C]  pb-8">
            <div class="text-[2.9rem] font-bold text-center font-Almarai">خدماتنـا</div>
        </div>

        <!-- Cards below the title -->
        <div class="flex flex-wrap justify-center items-center gap-10 px-4 ">
            <!-- Card 1 -->
            <div class="bg-white flex items-center px-4 py-4 rounded border border-[#E1E1E1] shadow max-w-sm w-full">
                <div class="flex-shrink-0 p-1">
                    <img src="{{ asset('images/Frame 1300.png') }}" alt="Icon" class="h-16 w-16">
                </div>

                <div class="flex-grow">
                    <p class="text-black font-bold text-lg pr-4 font-Almarai">جدولة المواعيد</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white flex items-center px-4 py-4 rounded border border-[#E1E1E1] shadow max-w-sm w-full">
                <div class="flex-shrink-0 p-1">
                    <img src="{{ asset('images/Frame 1298.png') }}" alt="Icon" class="h-16 w-16">
                </div>

                <div class="flex-grow">
                    <p class="text-black font-bold text-lg pr-4 font-Almarai">تتبع الوقت والفواتير</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white flex items-center px-4 py-4 rounded border border-[#E1E1E1] shadow max-w-sm w-full">
                <div class="flex-shrink-0 p-1">
                    <img src="{{ asset('images/Frame 1299.png') }}" alt="Icon" class="h-16 w-16">
                </div>

                <div class="flex-grow">
                    <p class="text-black font-bold text-lg pr-4 font-Almarai">إدارة الملفات القانونية</p>
                </div>
            </div>
        </div>
    </div>
    {{-- End of OUR FEATURES section --}}


    {{-- Customer Feedbacks --}}
    <div class="flex justify-center items-start text-center space-x-reverse space-x-6 h-[636px] bg-[#EFEAE4]">


        {{-- Title --}}
        <div class="text-center mt-[7%]">
            <h1 class="text-3xl text-[#282828] font-bold md:text-[2.9rem lg:text-6xl ">ماذا يقول عملاؤنا ؟</h1>
            <br>
        </div>

        <div class=" absolute mt-16 left-72 text-6xl">
            <img src="{{ asset('images\quote-up.png') }}" alt="">
        </div>

    </div>
    {{-- End of Customer FeedBacks --}}


    <div class="flex justify-center items-center my-3" id="partners">
        <div class="w-[1440px] h-[285px] flex flex-col justify-center items-center py-4">
            <!-- Title centered -->
            <div class="text-[2.9rem] font-bold text-center font-Almarai pb-3 text-[#1C1C1C]">شركاؤنا</div>
            <!-- Partner logos -->
            <div>
                <img src="{{ asset('images/partners.png') }}" alt="Partners Photo Here">
            </div>
        </div>
    </div>



    <footer class="bg-[#433529] w-full h-[322px] items-center justify-center flex">
        <div class="flex flex-col w-[75%]">
            <div class="">

                <div class="flex flex-initial items-center justify-between">

                    <div class="flex flex-col leading-[3.5rem] justiy-start items-start">
                        <div class="size-fit">
                            <img src="{{ asset('images\Group.png') }}" alt="" class=" size-[65%] h-auto">
                        </div>
                        <p class="text-[#C0C2C9]">إدارة الملفات القانونية: وجود ملفات لكل عميل بما في ذلك المعلومات
                            الشخصية وخرائط الشخصية والقانونية.</p>
                    </div>

                    {{-- social media --}}
                    <div class=" justify-end items-end text-white" dir="ltr">
                        <a href="#" class=" text-lg me-6"> <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="#" class=" text-lg me-6"> <i class="fa-brands fa-x-twitter"></i> </a>
                        <a href="#" class=" text-lg me-6"> <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="#" class=" text-lg me-6"> <i class="fa fa-google-plus"
                                aria-hidden="true"></i> </a>
                    </div>

                </div>


            </div>
            <div class=" border-t border-[#C0C2C9] w-full"></div>
            <div class="">

                <div class="flex flex-initial items-center justify-between">

                    <div class="leading-[3.5rem] justiy-start items-start">

                        <a class="text-white" href="">الرئيسية</a>
                        <a class="ms-10" href="">عنا</a>
                        <a class="ms-10" href="">شركائنا</a>
                        <a class="ms-10" href="">خدماتنا</a>
                    </div>

                    {{-- social media --}}
                    <div class=" justify-end items-end font-Inter" dir="ltr">
                        <p>© CopyRight Adel 2024</p>
                    </div>

                </div>


            </div>
        </div>
    </footer>


</body>

</html>

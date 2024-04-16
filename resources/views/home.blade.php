<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth focus:scroll-auto">

<head>
    <link rel="icon" href="{{ asset('images\Group.png') }}" type="image/x-icon">

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
            <div class="lg:mx-5 sm:mx-20 max-[640px]:mx-5">
                <div class="max-w-7xl mx-auto">
                    <div
                        class="flex max-[640px]:justify-between sm:justify-between lg:justify-between items-center max-[640px]:py-2 py-5">

                        <!-- Logo on the right -->
                        <div class="flex h-auto max-[640px]:ms-0 max-[640px]:justify-start">
                            <a href="/">
                                <x-application-logo class="max-[640px]:w-[60%]" />
                            </a>
                        </div>

                        {{-- <div class="block lg:hidden">
                            <h1 class="text-[#7C8893] font-bold">عـــادل</h1>
                        </div> --}}

                        <!-- Toggle button for mobile -->
                        <div class="block lg:hidden">
                            <button id="mobile-menu-toggle"
                                class="text-[#BF9874] px-3 py-2 rounded-md text-lg font-medium hover:text-[#433529] transition-colors duration-200">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                            </button>
                        </div>




                        <!-- Navigation buttons -->
                        <div
                            class="sm:hidden max-[640px]:hidden lg:flex lg:items-center lg:justify-center lg:flex-grow">
                            <a href="#main" onclick="scrollToDiv(event, 'main')"
                                class="text-[#BF9874] px-3 py-2 rounded-md text-lg font-medium hover:text-[#433529] transition-colors duration-200">الرئيسية</a>
                            <a href="#us" onclick="scrollToDiv(event, 'us')"
                                class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-[#433529] transition-colors duration-200">عنا</a>
                            <a href="#ourServices" onclick="scrollToDiv(event, 'ourServices')"
                                class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-[#433529] transition-colors duration-200">خدماتنا</a>
                            <a href="#partners" onclick="scrollToDiv(event, 'partners')"
                                class="text-[#B9B4B4] px-3 py-2 rounded-md text-lg font-medium hover:text-[#433529] transition-colors duration-200">شركائنا</a>
                        </div>

                        <!-- Buttons for login and register -->
                        <div class="sm:hidden max-[640px]:hidden lg:flex lg:items-center">
                            @guest
                                <a href="{{ route('login') }}"
                                    class="bg-[#BF9874] text-white px-4 py-2 rounded-md text-sm font-medium font-Almarai hover:bg-[#433529]">{{ __('Log in') }}</a>
                                <a href="{{ route('register') }}"
                                    class="text-[#BF9874] px-3 py-2 rounded-md text-sm font-medium underline hover:text-[#433529]">{{ __('Register') }}</a>
                            @endguest
                            @auth
                                <a href="{{ route('dashboard') }}"
                                    class="bg-[#BF9874] text-white px-4 py-2 rounded-md text-sm font-medium font-Almarai hover:bg-[#433529]">{{ __('Dashboard') }}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">
                                        <a
                                            class="text-[#BF9874] px-3 py-2 rounded-md text-sm font-medium hover:underline hover:text-[#433529]">{{ __('Log Out') }}</a>
                                    </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <!-- Responsive menu for mobile -->
            <div class="hidden lg:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#main" onclick="scrollToDiv(event, 'main')"
                        class="block px-3 py-2 rounded-md text-base font-medium text-[#BF9874] hover:text-[#433529] transition-colors duration-200">الرئيسية</a>
                    <a href="#us" onclick="scrollToDiv(event, 'us')"
                        class="block px-3 py-2 rounded-md text-base font-medium text-[#B9B4B4] hover:text-[#433529] transition-colors duration-200">عنا</a>
                    <a href="#ourServices" onclick="scrollToDiv(event, 'ourServices')"
                        class="block px-3 py-2 rounded-md text-base font-medium text-[#B9B4B4] hover:text-[#433529] transition-colors duration-200">خدماتنا</a>
                    <a href="#partners" onclick="scrollToDiv(event, 'partners')"
                        class="block px-3 py-2 rounded-md text-base font-medium text-[#B9B4B4] hover:text-[#433529] transition-colors duration-200">شركائنا</a>
                </div>
                <div class="px-2 pt-2 pb-3 space-y-1">
                    @guest
                        <a href="{{ route('login') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-white bg-[#BF9874]">{{ __('Log in') }}</a>
                        <a href="{{ route('register') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-[#BF9874] underline">{{ __('Register') }}</a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-white bg-[#BF9874]">{{ __('Dashboard') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">
                                <a
                                    class="block px-3 py-2 rounded-md text-base font-medium text-[#BF9874] hover:underline">{{ __('Log Out') }}</a>
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

    </header>

    <div class="relative w-full" id="main">
        <img src="{{ asset('images/Rectangle 5.jpg') }}" alt="photo" class="w-full h-auto min-[1024px]:h-screen object-cover">

        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent flex items-center justify-start ">

            <div class="text-right p-4 sm:p-5 lg:mr-32 xl:mr-52 2xl:mr-45 lg:-mt-36">
                <h1
                    class="text-white sm:text-2xl md:text-5xl font-bold md:my-0 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-[65%] lg:leading-snug">
                    أصبحت برامج إدارة الممارسات القانونية سهلة</h1>
                <p
                    class="text-[#AAAAAA] text-base md:text-lg font-bold w-full sm:w-3/4 md:w-2/3 lg:w-full my-2 md:my-3">
                    قم بأتمتة شركتك وإنجاز المزيد من المهام في وقت أقل بإستخدام ADEL</p>
                <button
                    class="text-white bg-[#BF9874] px-2 py-2 mt-3 font-bold rounded hover:bg-[#433529] focus:outline-none focus:ring-2 focus:bg-[#433529] focus:ring-opacity-50 transition ease-in-out duration-150">معرفة
                    المزيد</button>
            </div>
        </div>
    </div>



    <div class="flex flex-wrap lg:justify-between sm:justify-center items-center md:space-x-6 h-auto">
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
    <div class="flex justify-between items-center space-x-reverse space-x-6 h-[636px] bg-[#EFEAE4] overflow-auto lg:text-clip"
        id="us" style="scrollbar-width: none;">

        <div class="text-start w-[40%] h-[395px] max-[750px]:h-[90%] mx-[10%] overflow-auto max-[1400px]:w-[90%]"
            style="scrollbar-width: none;">
            <h1 class="text-[#1C1C1C] text-[60px] font-bold ">عنا</h1>
            <p class="text-[#B4B4B4] text-[100%] max-[750px]:text-[90%]"> إدارة الملفات القانونية: السماح بإنشاء ملفات
                لكل عميل بما في ذلك
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

        <div class="items-start w-auto flex-none absolute h-auto end-0">
            <img src="{{ asset('images/img3.png') }}" alt="" class="mt-[23px] h-[612px] w-full">
        </div>
    </div>


    {{-- Start of OUR FEATURES section --}}

    <div class="bg-gray-100 w-full my-28 " id="ourServices">
        <!-- Title centered -->

        <div class="text-center mt-[0px] mb-10">
            <h1 class="text-3xl text-[#282828] font-bold md:text-[2.9rem] lg:text-6xl">خدماتنـا
            </h1>

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
    <div class="flex flex-col relative space-x-reverse space-x-6 h-auto bg-[#EFEAE4]">


        <img src="{{ asset('images\quote-up.png') }}" class=" absolute end-0 me-48 mt-16 max-[1100px]:hidden">
        <div class="start-0 bottom-0 absolute max-[1100px]:hidden">
            <img src="{{ asset('images\quote-down.png') }}" class="ms-48 mb-12">
        </div>



        <div class="w-auto justify-center items-center text-center py-3">
            {{-- Title --}}
            <div class="text-center mt-[0px]">
                <h1 class="text-3xl text-[#282828] font-bold md:text-[2.9rem] lg:text-6xl mt-32">ماذا يقول عملاؤنا ؟
                </h1>
                <br>
            </div>





            <div class="flex flex-wrap justify-center h-auto mb-52">
                <div>
                    <div class="flex flex-col items-center w-full h-auto justify-center relative">
                        <p class="absolute justify-center w-[85%] text-start text-lg text-[#7C8893]">يا لها من إقامة
                            رائعة!
                            إطلالات جبلية رائعة
                            وحديقة كبيرة بين أشجار الزيتون خاصة جدًا. المنزل نفسه بسيط ومصمم بشكل جميل.
                            يوجد بالجوار الكثير مما يمكن رؤيته والقيام به.</p>

                        <br>
                        <div class="w-auto h-[100%]">
                            <img src="{{ asset('images/speech.png') }}" alt=""
                                class="w-full h-full bg-cover bg-center bg-no-repeat">
                        </div>
                    </div>
                    <div>
                        <div class="chat chat-start justify-start">
                            <div class="chat-image avatar ms-8">
                                <div class="w-14 rounded-full">
                                    <img src="{{ asset('images/avatar.png') }}" />
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <h1 class="text-[#1C1C1C]">علا ابو خضر</h1>
                                <p class="ms-0 size-[40%] text-[80%]">زبون</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="flex flex-col items-center w-full h-auto justify-center relative">
                        <p class="absolute justify-center w-[85%] text-start text-lg text-[#7C8893]">يا لها من إقامة
                            رائعة!
                            إطلالات جبلية رائعة
                            وحديقة كبيرة بين أشجار الزيتون خاصة جدًا. المنزل نفسه بسيط ومصمم بشكل جميل.
                            يوجد بالجوار الكثير مما يمكن رؤيته والقيام به.</p>

                        <br>
                        <div class="w-auto h-[100%]">
                            <img src="{{ asset('images/speech.png') }}" alt=""
                                class="w-full h-full bg-cover bg-center bg-no-repeat">
                        </div>
                    </div>
                    <div>
                        <div class="chat chat-start justify-start">
                            <div class="chat-image avatar ms-8">
                                <div class="w-14 rounded-full">
                                    <img src="{{ asset('images/avatar.png') }}" />
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <h1 class="text-[#1C1C1C]">علا ابو خضر</h1>
                                <p class="ms-0 size-[40%] text-[80%]">زبون</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div>
                    <div class="flex flex-col items-center w-full h-auto justify-center relative">
                        <p class="absolute justify-center w-[85%] text-start text-lg text-[#7C8893]">يا لها من إقامة
                            رائعة!
                            إطلالات جبلية رائعة
                            وحديقة كبيرة بين أشجار الزيتون خاصة جدًا. المنزل نفسه بسيط ومصمم بشكل جميل.
                            يوجد بالجوار الكثير مما يمكن رؤيته والقيام به.</p>

                        <br>
                        <div class="w-auto h-[100%]">
                            <img src="{{ asset('images/speech.png') }}" alt=""
                                class="w-full h-full bg-cover bg-center bg-no-repeat">
                        </div>
                    </div>
                    <div>
                        <div class="chat chat-start justify-start">
                            <div class="chat-image avatar ms-8">
                                <div class="w-14 rounded-full">
                                    <img src="{{ asset('images/avatar.png') }}" />
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <h1 class="text-[#1C1C1C]">علا ابو خضر</h1>
                                <p class="ms-0 size-[40%] text-[80%]">زبون</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="flex flex-col items-center w-full h-auto justify-center relative">
                        <p class="absolute justify-center w-[85%] text-start text-lg text-[#7C8893]">يا لها من إقامة
                            رائعة!
                            إطلالات جبلية رائعة
                            وحديقة كبيرة بين أشجار الزيتون خاصة جدًا. المنزل نفسه بسيط ومصمم بشكل جميل.
                            يوجد بالجوار الكثير مما يمكن رؤيته والقيام به.</p>

                        <br>
                        <div class="w-auto h-[100%]">
                            <img src="{{ asset('images/speech.png') }}" alt=""
                                class="w-full h-full bg-cover bg-center bg-no-repeat">
                        </div>
                    </div>
                    <div>
                        <div class="chat chat-start justify-start">
                            <div class="chat-image avatar ms-8">
                                <div class="w-14 rounded-full">
                                    <img src="{{ asset('images/avatar.png') }}" />
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <h1 class="text-[#1C1C1C]">علا ابو خضر</h1>
                                <p class="ms-0 size-[40%] text-[80%]">زبون</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- End of Customer FeedBacks --}}


    <div class="flex justify-center items-center my-3 py-28" id="partners">
        <div class="w-[1440px] h-[285px] flex flex-col justify-center items-center py-20">
            <!-- Title centered -->
            <div class="text-center mt-[0px]">
                <h1 class="text-3xl text-[#282828] font-bold md:text-[2.9rem lg:text-6xl mb-5">شركائنا</h1>
                <br>
            </div> <!-- Partner logos -->
            <div>
                <img src="{{ asset('images/partners.png') }}" alt="Partners Photo Here">
            </div>
        </div>
    </div>



    <footer class="bg-[#433529] w-full h-[322px] items-center justify-center flex">
        <div class="flex flex-col w-[75%] max-[720px]:w-[95%]">
            <div class="">

                <div class="flex max-[1173px]:flex-col md:flex-initial items-center justify-between">

                    <div
                        class="flex flex-col leading-[3.5rem] max-[942px]:leading-[2.5rem] justiy-start items-start max-[1173px]:justify-center max-[1173px]:items-center">
                        <div class="size-fit">
                            <img src="{{ asset('images\Group.png') }}" alt=""
                                class="max-[942px]:ms-4 size-[65%] h-auto max-[942px]:mb-2">
                        </div>
                        <p class="text-[#C0C2C9] max-[640px]:text-sm max-[640px]:leading-[2.5rem] md:text-[100%]">إدارة
                            الملفات القانونية: وجود ملفات لكل عميل بما في ذلك المعلومات
                            الشخصية وخرائط الشخصية والقانونية.</p>
                    </div>

                    {{-- social media --}}
                    <div class=" justify-end items-end text-white max-[1173px]:my-2" dir="ltr">
                        <a href="https://www.facebook.com" target="_blank" class=" text-lg me-6"> <i
                                class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://www.x.com" target="_blank" class=" text-lg me-6"> <i
                                class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.linkedin.com" target="_blank" class=" text-lg me-6"> <i
                                class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="https://www.google.com" target="_blank" class=" text-lg me-6"> <i
                                class="fa fa-google-plus" aria-hidden="true"></i> </a>
                    </div>
                </div>


            </div>
            <div class=" border-t border-[#C0C2C9] w-full"></div>
            <div class="">

                <div class="flex max-[720px]:flex-col md:flex-initial items-center justify-between">

                    <div class="leading-[3.5rem] justiy-start items-start">

                        <a class="text-white" href="#main" onclick="scrollToDiv(event, 'main')">الرئيسية</a>
                        <a class="ms-10" href="#us" onclick="scrollToDiv(event, 'us')">عنا</a>
                        <a class="ms-10" href="#ourServices" onclick="scrollToDiv(event, 'ourServices')">خدماتنا</a>
                        <a class="ms-10" href="#partners" onclick="scrollToDiv(event, 'partners')">شركائنا</a>
                    </div>

                    {{-- social media --}}
                    <div class=" justify-end items-end font-Inter" dir="ltr">
                        <p>&copy; CopyRight Adel 2024</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <button id="scrollTopBtn"
        class="hidden fixed bottom-5 border border-[#C0C2C9] right-5 bg-[#433529] hover:bg-[#BF9874] text-white font-bold px-2 py-1 md:py-3 md:px-4 rounded-full z-50 duration-300 ease-in-out transform hover:scale-110">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>

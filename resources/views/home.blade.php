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

<body class="bg-gray-100 font-Almarai">

    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center py-5">

                <!-- Logo on the right -->
                <div class="flex items-center">
                    <img src="{{ asset('images\Group.png') }}" alt="">
                </div>

                <!-- Navigation buttons in the middle -->
                <div class="flex-grow flex items-center justify-center">
                    <a href="#main"
                        class="text-[#BF9874] px-3 py-2 rounded-md text-lg font-medium hover:text-gray-600 transition-colors duration-200">الرئيسية</a>
                        <x-nav-link :href="'#' . $id='us'" :active="request()->is($id)">
                            عنا
                        </x-nav-link>


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
                    <a href="{{route('register')}}" class="text-[#BF9874] px-3 py-2 rounded-md text-sm font-medium underline">إنشاء
                        حساب</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative w-auto" id="main">
        <img src="{{ asset('images\Rectangle 5.jpg') }}" alt="photo" class="w-screen h-auto sm:object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent">
            <div class="text-right mt-[310px] mr-[200px]">
                <h1 class="text-white text-5xl font-bold my-5 w-[724px] leading-relaxed">أصبحت برامج إدارةالممارسات القانونيـة سهلة</h1>
                <p class="text-[#AAAAAA] text-lg font-bold my-5">قم بأتمتة شركتك وإانجاز المزيد من المهام في وقت أقل
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
    <div class="flex justify-between items-center space-x-reverse space-x-6 h-[636px] bg-[#EFEAE4]" id="us">

        <div class="text-start w-[35%] h-[395px] ms-[10%]">
            <h1 class="text-[#1C1C1C] text-[60px] ">عنا</h1>
            <p class="text-[#B4B4B4] text-[16px]"> إدارة الملفات القانونية: السماح بإنشاء ملفات لكل عميل بما في ذلك
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
        <div class="items-start h-full w-auto">
            <img src="{{ asset('images/img3.png') }}" alt="" class="mt-[23px] h-[612px] w-full">
        </div>

    </div>

    {{-- Start of OUR FEATURES section --}}
    <div class="bg-gray-100 w-full my-24">
        <!-- Title centered -->
        <div class="flex justify-center items-center text-[#1C1C1C] py-4 pb-8">
            <div class="text-[2.9rem] font-bold text-center font-Almarai">خدماتنـا</div>
        </div>

        <!-- Cards below the title -->
        <div class="flex flex-wrap justify-center items-center gap-4 px-4">
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

    <style>
        p.bubble {
            position: relative;
            width: 300px;
            text-align: center;
            line-height: 1.4em;
            margin: 40px auto;
            background-color: #fff;
            border: 8px solid #333;
            border-radius: 30px;
            font-family: sans-serif;
            padding: 20px;
            font-size: large;
        }

        p.thought {
            width: 300px;
            border-radius: 200px;
            padding: 30px;
        }

        p.bubble:before,
        p.bubble:after {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
        }

        p.speech:before {
            left: 30px;
            bottom: -50px;
            border: 25px solid;
            border-color: #333 transparent transparent #333;
        }

        p.speech:after {
            left: 38px;
            bottom: -30px;
            border: 15px solid;
            border-color: #fff transparent transparent #fff;
        }

        p.thought:before,
        p.thought:after {
            left: 10px;
            bottom: -30px;
            width: 40px;
            height: 40px;
            background-color: #fff;
            border: 8px solid #333;
            -webkit-border-radius: 28px;
            -moz-border-radius: 28px;
            border-radius: 28px;
        }

        p.thought:after {
            width: 20px;
            height: 20px;
            left: 5px;
            bottom: -40px;
            -webkit-border-radius: 18px;
            -moz-border-radius: 18px;
            border-radius: 18px;
        }
    </style>


    <div class="flex justify-center items-start text-center space-x-reverse space-x-6 h-[636px] bg-[#EFEAE4]">

        <div class="text-center mt-[3%]">
            <br>
            <h1 class="text-[60px] text-[#282828]">ماذا يقول عملاؤنا</h1>
            <br>
        </div>

    </div>


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



</body>
</html>

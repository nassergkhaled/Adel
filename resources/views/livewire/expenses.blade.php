<style>
    button .triangle {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 5px;
        vertical-align: middle;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid black;
    }
</style>

<div>
    <div class="text-3xl text-black mx-4 mb-4 font-bold ">
        <h1>نفقات :</h1>
    </div>
    <div class="flex justify-between text-center items-center mx-5 my-4">
        <div class ="flex gap-10 m-4">
            <div class="text-center py-2 cursor-pointer text-white font-bold text-sm bg-adel-Dark px-2 rounded-md">مفتوحة</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مفوترة</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">حميع الإدخالات</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مستورد</div>
        </div>
        <div class="flex gap-2 items-center text-center">
            <button id ="printButton" onclick="{window.print();}" title="Print Page">
                <i class="fas fa-print mr-2 mt-2 text-black"></i>
            </button>
            <button class="rounded-full bg-[#B0B3B8] text-white text-sm font-bold px-3 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-[#3A3B3C]">تعديل <span class="triangle bf-red-500 mr-1"></span></button>
            <button class="rounded-full text-adel-Dark text-sm font-bold border border-adel-Dark px-5 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-adel-Light-hover ">إستيراد دفعة</button>
            <button class="rounded-full bg-adel-Dark text-white text-sm font-bold px-5 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-adel-Dark-active ">طلب دفعة</button>
        </div>
    </div>

    <div class="flex items-center justify-center ">
        <table class="border-collapse w-full md:w-3/4 lg:w-full mx-4 border">
            <thead>
                <tr>
                    <th class="bg-gray-100 px-4 py-2" colspan="11">
                        <input type="text"
                            class="w-1/5 h-8 px-2 py-1 border text-xs justify-start flex border-none focus:ring-adel-Normal border-gray-300 rounded-md"
                            placeholder="تنقية النفقات حسب القضية...">
                    </th>
                </tr>
                <tr class="bg-white border-t border-b border-[#e1e1e1]">
                    <th class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </th>
                    <th class="px-4 py-2">
                        <button>التاريخ <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>النشاط<span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>العدد</button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المبلغ</button>
                    </th>
                    <th class="px-4 py-2">
                        <button>وصف</button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المجموع</button>
                    </th>
                    <th class="px-4 py-2">
                        <button>حالة الفاتورة</button>
                    </th>
                    <th class="px-4 py-2">
                        <button>حالة الدفع</button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المستخدم<span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>القضية</button>
                    </th>
                    <th class="px-4 py-2">
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr class="bg-white text-black text-sm items-center text-center h-12 border-b hover:bg-gray-200">
                    <td class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </td>
                    <td>Jun 30, 2024</td>
                    <td>قراءة ملف</td>
                    <td>5</td>
                    <td>110 ₪</td>
                    <td>تم إنهاء المهمة بنجاح</td>
                    <td>1205 ₪</td>
                    <td>تم الفتح</td>
                    <td><span class="text-xs bg-green-500 font-bold rounded-2xl text-white px-3 py-1">مدفوع</span></td>
                    <td>زهير مدموج</td>
                    <td>AJAX Co. Taxes</td>
                    <td>
                        <button><i class="fa-solid fa-pen-to-square"></i></button>
                    </td>
                </tr>

                <tr class="bg-white text-black text-sm items-center text-center h-12 border-b hover:bg-gray-200">
                    <td class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </td>
                    <td>Jun 30, 2024</td>
                    <td>قراءة ملف</td>
                    <td>20</td>
                    <td>500 ₪</td>
                    <td>تم إنهاء المهمة بنجاح</td>
                    <td>1205 ₪</td>
                    <td>تم الفتح</td>
                    <td><span class="text-xs bg-red-600 font-bold rounded-2xl text-white px-3 py-1">تأخــرت</span></td>
                    <td>مصعب صوافطة</td>
                    <td>Nescafeh Co. Taxes</td>
                    <td>
                        <button><i class="fa-solid fa-pen-to-square"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

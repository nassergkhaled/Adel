<style>
    th button {
        background: none;
        border: none;
        cursor: pointer;
        font-weight: bold;
        padding: 0;
        position: relative;
    }

    th button .triangle {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 5px;
        vertical-align: middle;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid black;
    }
    button .triangle {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 5px;
        vertical-align: middle;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid white;
    }
    th button[data-order="asc"] .triangle {
        border-top: 4px solid black;
        border-bottom: none;
    }

    th button[data-order="desc"] .triangle {
        border-top: none;
        border-bottom: 4px solid black;
    }
</style>

<div class="">
    <div class="text-3xl text-black mx-4 mb-4 font-bold ">
        <H1>الفواتيـر</H1>
    </div>


    <div class="flex items-center mx-4 w-auto p-5 rounded shadow-md border bg-white">
        <div class="flex flex-col items-center justify-center gap-3">
            <div class="relative">
                <span class="text-black text-sm">إجمالي المستحقات</span>
                <div
                    class="absolute top-0 left-0 rigth-full -ml-4 mt-1 w-3 h-3 flex items-center justify-center bg-[#323232] rounded-full cursor-pointer group">
                    <span class="text-white group-hover:text-white text-xs font-mono">i</span>
                    <div
                        class="hidden group-hover:block absolute top-0 left-0 right-full ml-2 mt-0.5 w-48 bg-white border text-black border-gray-300 rounded-lg shadow-lg p-2 text-xs">
                        <p>إجمالي الأرصدة الجزئية المتأخرة وغير المدفوعة والجزء المتبقي من الأرصدة الجزئية في الأشهر 12
                            الماضية.</p>
                    </div>
                </div>
            </div>
            <span class="text-black text-3xl">180780.00 ₪</span>
        </div>
        <div class="border-l border-gray-200 h-16 mr-8"></div>

        <div class="flex flex-col items-center justify-center mx-auto gap-1">
            <span class="text-xs bg-red-600 font-bold rounded-2xl text-white px-2 py-1">تأخــرت</span>
            <span class="text-black text-2xl">290.00 ₪</span>
        </div>
        <div class="flex flex-col items-center justify-center mx-auto gap-1">
            <span class="text-xs bg-orange-400 font-bold rounded-2xl text-white px-2 py-1">غير مدفوع</span>
            <span class="text-black text-2xl">500.00 ₪</span>
        </div>
        <div class="flex flex-col items-center justify-center mx-auto gap-1">
            <span class="text-xs bg-green-500 font-bold rounded-2xl text-white px-2 py-1">مدفوع</span>
            <span class="text-black text-2xl">10000.00 ₪</span>
        </div>
        <div class="flex flex-col items-center justify-center mx-auto gap-1">
            <span class="text-xs bg-blue-800 font-bold rounded-2xl text-white px-3 py-1">جزئي</span>
            <span class="text-black text-2xl">60.00 ₪</span>
        </div>
    </div>

    <div class="flex justify-between items-center mx-5 my-4">
        <div class="flex gap-10">
            <div class="text-center py-2 cursor-pointer text-white font-bold text-sm bg-adel-Dark px-2 rounded-md">الكل</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">غير مرسلة</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مرسلة</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مدفوع</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">جزئي</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">تأخرت</div>
        </div>
        <div class="flex gap-2">
            <button
                class="rounded-full bg-[#3A3B3C] text-white text-sm font-bold px-3 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-[#B0B3B8]">تعديل <span class="triangle bf-red-500 mr-1"></span></button>
            <button
                class="rounded-full bg-adel-Dark text-white text-sm font-bold px-5 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-adel-Dark-active ">أنشئ
                فاتورة</button>
        </div>
    </div>



    <div class="flex items-center justify-center ">
        <table class="border-collapse w-full md:w-3/4 lg:w-full mx-4 border">
            <thead>
                <tr>
                    <th class="bg-gray-100 px-4 py-2" colspan="11">
                        <input type="text"
                            class="w-1/5 h-8 px-2 py-1 border text-xs justify-start flex border-none focus:ring-adel-Normal border-gray-300 rounded-md"
                            placeholder="تنقية الفواتير حسب القضية،جهة إتصال الفاتورة...">
                    </th>
                </tr>
                <tr class="bg-white border-t border-b border-[#e1e1e1]">
                    <th class="px-4 py-2">
                        <button>الرقم <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>جهة الإتصال <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>القضية <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المجموع <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المدفوع <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المبلغ المستحق <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>خلال <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>تاريخ الإنشاء <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>الحالة <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>تم مشاهدتها <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                    <td>01001</td>
                    <td>زهير مدموج</td>
                    <td>Nescafeh Co. Taxes</td>
                    <td>110550 ₪</td>
                    <td>1000 ₪</td>
                    <td>-- ₪</td>
                    <td>Jun 29, 2024</td>
                    <td>Jun 14, 2024</td>
                    <td><span class="text-xs bg-green-500 font-bold rounded-2xl text-white px-3 py-1">مدفوع</span></td>
                    <td>Jun 14, 2024</td>
                    <td class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </td>
                </tr>
                <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                    <td>01002</td>
                    <td>عمرو قبها</td>
                    <td>AJAX Co. Taxes</td>
                    <td>20000 ₪</td>
                    <td>1542 ₪</td>
                    <td>-- ₪</td>
                    <td>Jun 30, 2024</td>
                    <td>Jun 10, 2023</td>
                    <td>
                        <span class="text-xs bg-red-600 font-bold rounded-2xl text-white px-3 py-1">تأخــرت</span>
                    </td>
                    <td>Jun 17, 2024</td>
                    <td class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

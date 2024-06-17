<div>
    <div class="text-3xl text-black mx-4 mb-4 font-bold ">
        <H1>الأموال المطلوبة</H1>
    </div>
    <div class="flex justify-between items-center mx-5 my-4">
        <div class="flex gap-10 m-4">
            <div class="text-center py-2 cursor-pointer text-white font-bold text-sm bg-adel-Dark px-2 rounded-md">الكل</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مرسلة</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مدفوع</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">جزئي</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مستحقات/ذمم</div>
        </div>
        <div class="flex gap-2 items-center">
            <button id="printButton" onclick="{window.print();}" title="Print Page">
                <i class="fas fa-print mr-2 text-black mt-2"></i>
            </button>
            <button
                class="rounded-full bg-adel-Dark text-white text-sm font-bold px-5 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-adel-Dark-active ">طلب دفعة</button>
        </div>
    </div>


    <div class="flex items-center justify-center ">
        <table class="border-collapse w-auto md:w-3/4 lg:w-full mx-4 border">
            <thead>
                <tr>
                    <th class="bg-gray-100 px-4 py-2" colspan="11">
                        <input type="text"
                            class="w-1/5 h-8 px-2 py-1 border text-xs text-black justify-start flex border-none focus:ring-adel-Normal border-gray-300 rounded-md"
                            placeholder="تنقية الفواتير حسب جهة إتصال الفاتورة...">
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
                        <button>الحساب<span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>موكلة إلى<span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المبلغ<span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المدفوع<span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>المبلغ المستحق<span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>تاريخ الإستحقاق <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>تاريخ الإرسال <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>تم مشاهدتها <span class="triangle"></span></button>
                    </th>
                    <th class="px-4 py-2">
                        <button>الحالة<span class="triangle"></span></button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                    <td>#0R001</td>
                    <td>زهير مدموج</td>
                    <td>موثوق</td>
                    <td>محامي رائد صالح</td>
                    <td>1000 ₪</td>
                    <td>-- ₪</td>
                    <td>250 ₪</td>
                    <td>Jun 14, 2024</td>
                    <td>Jun 14, 2024</td>
                    <td>تم فتح الطلب</td>
                    <td>تم الإرسال</td>

                </tr>
                <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                    <td>#0R005</td>
                    <td>عمرو قبها</td>
                    <td>شيكات شخصية</td>
                    <td>محامي محمد صالح</td>
                    <td>8546 ₪</td>
                    <td>-- ₪</td>
                    <td>400 ₪</td>
                    <td>Jun 30, 2024</td>
                    <td>Jun 10, 2024</td>
                    <td>تم فتح الطلب</td>
                    <td>تم الإرسال</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function printPage(){
        window.print();
    }
</script>

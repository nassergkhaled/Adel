<style>
.modal-box {
        width: 91.666667%;
        max-width: 60rem
            /* 512px */
        ;
    }

    .modal {
        /* align-items: center; */
        margin-left: auto;
        margin-right: auto;

    }
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
            <span class="text-xs bg-red-600 font-bold rounded-2xl text-white px-2 py-1">مستحقات/ذمم</span>
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
        <div class="flex flex-col items-center justify-center mx-auto gap-1">
            <span class="text-xs bg-black font-bold rounded-2xl text-white px-3 py-1">مسودة</span>
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
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مستحقات/ذمم</div>
        </div>
        <div class="flex gap-2">
            <button
                class="rounded-full bg-[#B0B3B8] text-white text-sm font-bold px-3 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-[#3A3B3C]">تعديل <span class="triangle bf-red-500 mr-1"></span></button>
            <button onclick="addEnvoice.showModal()"
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
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </th>
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
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                    <td class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </td>
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
                    <td class="">
                        <button><i class="fa-solid fa-paper-plane ml-1"></i></button>
                        <button><i class="fa-solid fa-trash-can  ml-1"></i></button>
                    </td>
                </tr>
                <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                    <td class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </td>
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
                    <td class="">
                        <button><i class="fa-solid fa-paper-plane ml-1"></i></button>
                        <button><i class="fa-solid fa-trash-can  ml-1"></i></button>
                    </td>
                </tr>
                <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                    <td class="px-4 py-2">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                    </td>
                    <td>01002</td>
                    <td>مصعب صالح</td>
                    <td>Chicken Co. Taxes</td>
                    <td>66000 ₪</td>
                    <td>5000 ₪</td>
                    <td>-- ₪</td>
                    <td>Jun 12, 2024</td>
                    <td>Jun 5, 2023</td>
                    <td>
                        <span class="text-xs bg-black font-bold rounded-2xl text-white px-3 py-1">مسودة</span>
                    </td>
                    <td>Jun 17, 2024</td>
                    <td class="">
                        <button><i class="fa-solid fa-dollar-sign ml-2"></i></button>
                        <button><i class="fa-solid fa-paper-plane ml-1"></i></button>
                        <button><i class="fa-solid fa-trash-can ml-1"></i></button>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <dialog id="addEnvoice" class="modal modal-middle sm:modal-middle" style="width: 90%;">
        <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
            <form method="dialog">
                <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
            </form>
            <h3 class="font-bold text-2xl text-center">{{ __('تفاصيل الفاتورة') }}</h3>
            <div class="my-5">
                <hr>
            </div>
            <form action="" method="POST">
                @csrf
            <div class="bg-gray-100 p-6 flex justify-center items-center w-auto border border-gray-200">
                <div class="flex w-1/2">
                    <div class="flex items-center gap-6">
                        <label for="label_select_invoice" class="font-bold text-black ">{{ __('الجهة المعنية:') }}</label>
                        <select id="form_select_invoice" name="form_select_invoice" value="{{ old('form_select_invoice') }}"
                            class=" py-2 pl-20 border rounded-md focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active">
                            <option value="hover:none" selected disabled>-- {{ __('اختر القضية/الموكل') }}</option>
                           {{--  <optgroup label="قضايا">
                                    <option value="case-{{ $case->id }}"
                                        {{ !old('TaskforMe') && old('form_select_invoice') == 'case-' . $case->id ? 'selected' : '' }}>
                                        {{ $case->title }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="موكلين">
                                @foreach ($data['lawyer']->clients as $client)
                                    <option value="client-{{ $client->user_id }}"
                                        {{ !old('TaskforMe') && old('form_select_invoice') == 'client-' . $client->id ? 'selected' : '' }}>
                                        {{ $client->full_name }}</option>
                                @endforeach --}}
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-6 flex justify-center">
                <div class="mb-4 w-1/2">
                    <!-- Separator line before Total Amount -->

                    <div class="flex justify-between items-center">
                        <span class="font-medium text-black">المبلغ كامل:</span>
                        <span class="font-bold text-3xl text-black">$000</span>
                    </div>
                    <div class="flex justify-end items-center my-2">
                        <span class="font-bold text-black -ml-5">-</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-black">المبلغ المدفوع:</span>
                        <span class="font-bold text-3xl text-green-600">$000</span>
                    </div>
                    <hr class="my-4 border-black ">
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-black">المبلغ المتبقي للدفع:</span>
                        <span class="font-bold text-3xl text-red-600">$000</span>
                    </div>
                </div>
            </div>


                <div class="flex justify-center w-full mt-3 border-b border-[#e1e1e1]"></div>
                <div class="modal-action mt-4">
                    <button type="submit" class="w-[20%] bg-[#3B5998] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#2d4373] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">
                        {{ __('Add') }}
                    </button>
                </div>
            </form>
        </div>
    </dialog>
</div>

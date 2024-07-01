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
</style>

<div>
    <div class="text-3xl text-black mx-4 mb-4 font-bold ">
        <H1>الأموال المطلوبة</H1>
    </div>
    <div class="flex justify-between items-center mx-5 my-4">
        <div class="flex gap-10 m-4">
            <div class="text-center py-2 cursor-pointer text-white font-bold text-sm bg-adel-Dark px-2 rounded-md">الكل
            </div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مرسلة</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مدفوع</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">جزئي</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مستحقات/ذمم</div>
        </div>
        <div class="flex gap-2 items-center">
            <button id="printButton" onclick="{window.print();}" title="Print Page">
                <i class="fas fa-print mr-2 text-black mt-2"></i>
            </button>

            <button type="button" onclick="addFundsReq.showModal()"
                class="rounded-full bg-adel-Dark text-white text-sm font-bold px-5 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-adel-Dark-active ">طلب
                دفعة</button>
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
                    <th class="px-5 py-2">
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data['requestedFunds'] as $requestedFund)
                    <tr class="bg-white text-black text-sm items-center text-center h-14 border-b hover:bg-gray-200">
                        <td>{{ $requestedFund->id }}</td>
                        @php
                            $legalCase = $requestedFund->legalCase;
                        @endphp
                        <td>{{ $legalCase->client->full_name }}</td>
                        <td>---</td>
                        <td>{{ $legalCase->lawyer->full_name }}</td>
                        <td>{{ number_format($requestedFund->requested_amount, 2) }} ₪</td>
                        <td>{{ number_format($requestedFund->paid_amount, 2) }} ₪</td>
                        <td>{{ $requestedFund->requested_amount - $requestedFund->paid_amount }} ₪</td>
                        <td>{{ $requestedFund->due_date }}</td>
                        <td>{{ $requestedFund->created_at ? $requestedFund->created_at->format('Y-m-d') : '' }}</td>
                        <td>---</td>
                        <td>تم الإرسال</td>
                        <td class="">
                            <button><i class="fa-regular fa-bell ml-1"></i></button>
                            <button><i class="fa-solid fa-pen-to-square ml-1"></i></button>
                            <button><i class="fa-solid fa-trash-can  ml-1"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <dialog id="addFundsReq" class="modal modal-middle sm:modal-middle" style="width:90%;">
        <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
            <form method="dialog">
                <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
            </form>
            <h3 class="font-bold text-2xl text-center">{{ __('طلب أموال') }}</h3>
            <div class="my-5">
                <hr>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <!-- First Column: Form Elements -->
                <div>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="flex items-center">
                                <label for="to_contact" class="w-1/4 text-right pr-2">{{ __('إلى الجهة :') }}</label>
                                <select id="to_contact" name="to_contact"
                                    class="w-3/4 p-2 border rounded-md focus:outline-none  focus:ring-2 focus:ring-offset-2 border-black focus:ring-adel-Normal-active">
                                    <option value="" disabled selected>{{ __('Select a case') }}</option>
                                    <option value="case1">{{ __('هنا يجب عرض أسماء الموكلين والقضاة ') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center">
                                <label for="form_funds_cost_label"
                                    class="w-1/4 text-right pr-2">{{ __('السعر :') }}</label>
                                <div class="relative w-3/4">
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center p-2 rounded-r-md border border-[#cacaca] bg-[#eaeaea]">
                                        <span class="text-black text-md px-1 ">$</span>
                                    </div>
                                    <input type="text" id="form_funds_cost" name="form_funds_cost"
                                        value="{{ old('form_funds_cost') }}"
                                        class="pl-8 p-2 w-full border lg:text-[85%] rounded-md border-black focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                </div>
                                @error('form_funds_cost')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center">
                                <label for="to_contact" class="w-1/4 text-right pr-2">{{ __('التاريخ:') }}</label>
                                <input type="date" id="form_date" name="form_date" value="{{ old('form_date') }}"
                                    class="p-2 w-3/4 lg:text-[85%] rounded-md border border-black focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                @error('form_date')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center mb-5">
                            <label for="form_select_bank" class="w-1/4 text-right pr-2">{{ __('إيداع في:') }}</label>
                            <select id="form_select_bank" name="form_select_bank"
                                class="w-3/4 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 border-black focus:ring-adel-Normal-active">
                                <option value="" disabled selected>{{ __('إختر حساب بنكي') }}</option>
                                <option value="case1">{{ __('بنك 1') }}</option>
                                <option value="case1">{{ __('بنك 2') }}</option>
                            </select>
                        </div>

                        <div class="flex items-center ">
                            <label for="form_email_message"
                                class="w-1/4 text-right pr-2">{{ __('رسالة الإيميل:') }}</label>
                            <textarea name="form_email_message"
                                class="textarea textarea-bordered focus:ring-2 focus:ring-adel-Normal-active placeholder:text-black bg-white w-3/4 border-black"
                                placeholder="أدخل الرسالة هنا..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col items-center justify-center -mt-4">
                    <div class="text-center text-sm">
                        <h6>هذا نموذج عن الايميل الذي سيتلقاه العملاء:</h6>
                    </div>
                    <img src="{{ asset('images\SAMPLE.png') }}" alt="Description of Image"
                        class="w-auto mt-2 h-72 border border-gray-300">
                </div>
            </div>
            <div class="flex justify-center w-full mt-3 border-b border-[#e1e1e1]"></div>
            <div class="modal-action ">
                <button type="submit"
                    class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('إرسال') }}</button>
            </div>
        </div>
    </dialog>

</div>

<script>
    function printPage() {
        window.print();
    }
</script>

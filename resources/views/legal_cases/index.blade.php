@section('page_name', 'القضايا')
@section('title', 'القضايا | ')
<x-app-layout>
    <div class="my-3 px-4 space-y-4">
        <div class="flex justify-between">
            <h1 class="text-xl flex items-center font-bold text-black">جميع القضايا</h1>
            <button type="button" onclick="my_modal_5.showModal()"
                class=" flex my-auto bg-[#BF9874] text-white px-8 py-2 rounded-md text-sm hover:bg-adel-Dark-hover">
                {{ __('Add') }}
            </button>
        </div>


        <hr>

        <button type="button"
            class=" flex my-auto bg-transparent border text-[#999999] px-7 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#E6E8EB] transition ease-in-out duration-150">
            <i class="fa-solid fa-filter mt-1 me-1"></i> {{ __('Filter') }}
        </button>

        <div class="w-full">
            <table class="table  border-[#E6E8EB] text-black shadow-md rounded-sm bg-white">
                <thead>
                    <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                        <th>اسم القضية</th>
                        <th>صاحب القضية</th>
                        <th>الحالة</th>
                        <th>تاريخ الفتح</th>
                        <th>تاريخ الاغلاق</th>
                        <th class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-start">
                    <tr class=" border-[#E6E8EB]">
                        <td>قضية سرقة</td>
                        <td>علا ابو خضر</td>
                        <td><span class=" bg-[#c1ebd7] px-2 py-1 rounded-md text-[#06A759]">مفتوحة</span></td>
                        <td>3/Mar/2024</td>
                        <td>3/Oct/2024</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>

                    <tr class=" border-[#E6E8EB]">
                        <td>قضية سرقة</td>
                        <td>علا ابو خضر</td>
                        <td><span class=" bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]">في الانتظار</span></td>
                        <td>3/Mar/2024</td>
                        <td>3/Oct/2024</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>

                    <tr class=" border-[#E6E8EB]">
                        <td>قضية سرقة</td>
                        <td>علا ابو خضر</td>
                        <td><span class=" bg-[#f9c6c6] px-2 py-1 rounded-md text-[#EA1B1B]">مغلقة</span></td>
                        <td>3/Mar/2024</td>
                        <td>3/Oct/2024</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>

                    <tr class=" border-[#E6E8EB]">
                        <td>قضية سرقة</td>
                        <td>علا ابو خضر</td>
                        <td><span class=" bg-[#c1ebd7] px-2 py-1 rounded-md text-[#06A759]">مفتوحة</span></td>
                        <td>3/Mar/2024</td>
                        <td>3/Oct/2024</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
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

    <dialog id="my_modal_5" class="modal modal-middle sm:modal-middle" style="width:90%;">
        <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
            <form method="dialog">
                <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
            </form>
            <h3 class="font-bold text-2xl text-center">{{ __('إضافة قضية') }}</h3>
            <div class="my-5">
                <hr>
            </div>

            <form action="{{route('legalCases.store')}}" method="POST">
                @csrf
                <div class="grid grid-flow-row gap-y-4">
                    <div class=" grid grid-flow-col gap-x-5">
                        <div>
                            <label for="case_name"
                                class="block text-sm font-medium text-gray-700">{{ __('اسم القضية') }}
                                <span class="text-red-500">*</span></label>
                            <input type="password" id="case_name" name="case_name" placeholder="{{ __('اسم القضية') }}"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        </div>
                        <div>
                            <label for="client_name"
                                class="block text-sm font-medium text-gray-700">{{ __('صاحب القضية') }}
                                <span class="text-red-500">*</span></label>
                            <input type="password" id="client_name" name="client_name"
                                placeholder="{{ __('صاحب القضية') }}"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        </div>
                    </div>
                    <div class="grid grid-flow-col gap-x-5">
                        <div>
                            <label for="case_status"
                                class="block text-sm font-medium text-gray-700">{{ __('حالة القضية') }}
                                <span class="text-red-500">*</span></label>
                            <select type="password" id="case_status" name="case_status"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                <option value="1">{{ __('مغلقة') }}</option>
                                <option value="2">{{ __('مفتوحة') }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="case_type"
                                class="block text-sm font-medium text-gray-700">{{ __('نوع القصية') }}
                                <span class="text-red-500">*</span></label>
                            <select type="password" id="case_type" name="case_type"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                <option value="1">{{ __('جنائية') }}</option>
                                <option value="2">{{ __('مدنية') }}</option>
                            </select>

                        </div>
                    </div>
                    <div class="grid grid-flow-col gap-x-5">
                        <div>
                            <label for="case_openDate"
                                class="block text-sm font-medium text-gray-700">{{ __('تاريخ الفتح') }}
                                <span class="text-red-500">*</span></label>
                            <input type="date" id="case_openDate" name="case_openDate"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        </div>
                        <div>
                            <label for="case_closeDate"
                                class="block text-sm font-medium text-gray-700">{{ __('تاريخ الاغلاق') }} <span
                                    class="text-red-500">*</span></label>
                            <input type="date" id="case_closeDate" name="case_closeDate"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        </div>
                    </div>
                    <div class="grid grid-flow-col gap-x-5">
                        <div>
                            <label for="case_description"
                                class="block text-sm font-medium text-gray-700">{{ __('وصف') }}
                                <span class="text-red-500">*</span></label>
                            <textarea type="password" id="case_description" name="case_description" rows="3"
                                class="mt-1 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300"></textarea>
                        </div>
                        <div>
                            <label for="case_notes"
                                class="block text-sm font-medium text-gray-700">{{ __('ملاحظات') }}</label>
                            <textarea type="password" id="case_notes" name="case_notes" rows="3"
                                class="mt-1 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300"></textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-action ">

                    <button type="submit"
                        class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Add') }}</button>

                </div>
            </form>
        </div>
    </dialog>
</x-app-layout>

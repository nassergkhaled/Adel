@section('page_name', 'الموكلين')
@section('title', 'الموكلين | ')
<x-app-layout>
    <div class="mt-4 mb-3 grid grid-cols-2 items-center">
        <div class="font-bold text-black text-2xl mr-5 ">
            <h1>جميع المـوكلين</h1>
        </div>
        <div class="ml-4 text-left">
            <button type="button" onclick="my_modal_add_client.showModal()"
                class="text-white bg-[#BF9874] px-10 py-2 rounded-md hover:bg-[#433529] focus:outline-none focus:ring-2 focus:bg-[#433529] focus:ring-opacity-50 transition ease-in-out duration-150">إضافة</button>
        </div>
{{--         @dd($clients);
 --}}        <dialog id="my_modal_add_client" class="modal modal-middle sm:modal-middle">
            <div class="modal-box bg-white" dir="rtl">

                <form method="dialog" dir="rtl">
                    <button type="submit"
                        class="btn btn-sm btn-circle text-xl btn-ghost absolute right-2 top-[1.37rem]">✕</button>
                </form>

                <h3 class="font-bold text-center text-black text-lg ms-5">إضافة مستخدم جديد</h3>
                <hr class="mt-5">
                <form action="{{route('clients.store')}}" method="POST">
                    @csrf

                    <div class="w-full bg-white rounded-lg h-auto flex flex-col justify-start">
                        <div class="mx-5 my-1">
                            <div class="grid grid-flow-col gap-4 my-5">

                                <div class="grid-cols-6">
                                    <label for="user_name" class="block text-sm font-medium text-gray-700">اسم
                                        المستخدم<span class="text-red-600 mr-1 text-lg">*</span></label>
                                    <input type="text" id="user_name" name="user_name" required
                                        placeholder="ادخل اسم المستخدم"
                                        class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                </div>


                                <div class="grid-cols-6">
                                    <label for="client_id_num" class="block text-sm font-medium text-gray-700">رقم
                                        الهوية<span class="text-red-600 mr-1 text-lg">*</span></label>
                                    <input type="text" id="client_id_num" name="client_id_num" required
                                        placeholder="ادخل رقم الهوية"
                                        class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                </div>

                            </div>

                            <div class="grid grid-flow-col gap-4">

                                <div class="grid-cols-6">
                                    <label for="phone"
                                        class="block text-sm font-medium text-gray-700">{{ __('Phone') }}<span class="text-red-600 mr-1 text-lg">*</span></label>
                                    <input type="text" inputmode="tel" id="phone" name="phone" required
                                        placeholder="ادخل {{ __('Phone') }}"
                                        class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                </div>
                            </div>

                            <div class="modal-action ">

                                <button type="submit"
                                    class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">إضافة</button>
                            </div>
                </form>
            </div>
        </dialog>
    </div>

    <hr class=" mr-4 ml-4 w-auto">

    <div class="flex justify-center items-center w-[96%] mt-14 mr-6">
        <table class=" w-full border-collapse shadow-md">
            <thead class="border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD] ">
                <tr>
                    <th class="w-1/5 py-2">اسم الموكل</th>
                    <th class="w-1/5 py-2">رقم الهوية</th>
                    <th class="w-1/5 py-2">رقم الهاتف</th>
                    <th class="w-1/5 py-2">عدد القضايا</th>
                    <th class="text-center w-[5%] py-2"><input type="checkbox"
                            class="focus:ring-transparent transition ease-in-out duration-100 text-adel-Normal-active hover:bg-adel-Light-active">
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white text-md ">
                <tr>
                    <td class="text-center py-2 text-black border-b">رؤى منعم</td>
                    <td class="text-center py-2 text-black border-b">123</td>
                    <td class="text-center py-2 text-black border-b" dir="ltr">+201140033128</td>
                    <td class="text-center py-2 text-black border-b">03</td>
                    <td class="text-center py-2 text-black border-b"><input type="checkbox"
                            class="focus:ring-transparent transition ease-in-out duration-100 text-adel-Normal-active hover:bg-adel-Light-active">
                    </td>
                </tr>

                <tr>
                    <td class="text-center py-2 text-black border-b">بسمه حافظ</td>
                    <td class="text-center py-2 text-black border-b">456</td>
                    <td class="text-center py-2 text-black border-b" dir="ltr">+201140045239</td>
                    <td class="text-center py-2 text-black border-b">02</td>
                    <td class="text-center py-2 text-black border-b"><input type="checkbox"
                            class="focus:ring-transparent transition ease-in-out duration-100 text-adel-Normal-active hover:bg-adel-Light-active">
                    </td>
                </tr>

                <tr>
                    <td class="text-center py-2 text-black border-b">رحمة شعبان</td>
                    <td class="text-center py-2 text-black border-b">789</td>
                    <td class="text-center py-2 text-black border-b" dir="ltr">+201007960235</td>
                    <td class="text-center py-2 text-black border-b">01</td>
                    <td class="text-center py-2 text-black border-b"><input type="checkbox"
                            class="focus:ring-transparent transition ease-in-out duration-100 text-adel-Normal-active hover:bg-adel-Light-active">
                    </td>
                </tr>

                <tr>
                    <td class="text-center py-2 text-black border-b">هادي ياسين</td>
                    <td class="text-center py-2 text-black border-b">908</td>
                    <td class="text-center py-2 text-black border-b" dir="ltr">+201140563239</td>
                    <td class="text-center py-2 text-black border-b">02</td>
                    <td class="text-center py-2  text-blackborder"><input type="checkbox"
                            class="focus:ring-transparent transition ease-in-out duration-100 text-adel-Normal-active hover:bg-adel-Light-active">
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


</x-app-layout>

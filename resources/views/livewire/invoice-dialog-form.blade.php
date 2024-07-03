<div>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="bg-gray-100 p-6 flex justify-center items-center w-auto border border-gray-200">
            <div class="flex w-1/2">
                @error('related_case')
                    <p class="text-sm text-red-500">
                        * {{ __($message) }}
                    </p>
                @enderror
                <div class="flex items-center gap-6">
                    <label for="label_select_invoice" class="font-bold text-black ">القضية المعنية:</label>
                    <select wire:change="selectCase($event.target.value)" id="related_case" name="related_case"
                        value="{{ old('related_case') }}"
                        class=" py-2 pl-20 border rounded-md focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active">
                        <option value="hover:none" selected disabled>-- {{ __('اختر القضية/الموكل') }}</option>
                        @foreach ($data['lawyer']->legalCases as $case)
                            <option value="{{ $case->id }}"
                                {{ old('related_case') == $case->id ? 'selected' : '' }}>
                                {{ $case->title }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="bg-gray-100 p-6 flex justify-center items-center w-auto ">

                <div class="flex items-center gap-6">
                    @error('due_date')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                    <label for="due_date" class=" text-start ps-2">{{ __('تاريخ الاستحقاق:') }}</label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"
                        class="p-2 lg:text-[85%] rounded-md border border-black focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">


                </div>
            </div>

            <div class="mb-4">
                <div class="flex items-center">

                </div>
            </div>
        </div>

        <div class="p-6 flex justify-center overflow-auto">
            <div class="mb-4 w-1/2">
                <!-- Separator line before Total Amount -->

                @php
                    $totalExpenses = 0;
                    $totalFunds = 0;
                @endphp

                @if ($this->expenses)
                    @if ($this->expenses->count())
                        <div class="">
                            <ul>
                                @foreach ($this->expenses as $expense)
                                    <li class="flex justify-between items-center">
                                        <span class="font-medium text-black">- {{ $expense->activity }}</span>
                                        <span
                                            class="font-bold text-lg text-black">{{ number_format($expense->total_amount, 2) }}</span>
                                    </li>
                                    @php
                                        $totalExpenses += $expense->total_amount;
                                    @endphp
                                @endforeach
                            </ul>
                        </div>
                        <div class="flex justify-end items-center">
                            <span class=" text-black">____________</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-black">مجموع النفقات:</span>
                            <span class="font-bold text-2xl text-black">{{ number_format($totalExpenses, 2) }}</span>
                        </div>
                        <hr class="my-4 border-black ">
                    @else
                        <div class="my-5">
                            <hr class="my-4 border-black ">
                            <p class="text-center">لا يوجد نفقات غير مسجلة</p>
                            <hr class="my-4 border-black ">
                        </div>
                    @endif

                @endif



                @if ($this->funds)
                    @if ($this->funds->count())
                        <div class="">
                            <ul>
                                @foreach ($this->funds as $fund)
                                    <li class="flex justify-between items-center">
                                        <span class="font-medium text-black">{{ $fund->pay_date }}</span>
                                        <span class="font-bold text-xl text-black">{{ $fund->paid_amount }}</span>
                                    </li>
                                    @php
                                        $totalFunds += $fund->paid_amount;
                                    @endphp
                                @endforeach

                            </ul>
                        </div>
                        <div class="flex justify-end items-center">
                            <span class=" text-black">____________</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-black">مجموع الدفعات:</span>
                            <span class="font-bold text-2xl text-green-600">{{ number_format($totalFunds, 2) }}</span>
                        </div>
                        <hr class="my-4 border-black ">
                    @else
                        <div class="my-5">
                            <hr class="my-4 border-black ">
                            <p class="text-center">لا يوجد دفعات غير مسجلة</p>
                            <hr class="my-4 border-black ">
                        </div>
                    @endif

                @endif



                <div class="flex justify-between items-center">
                    <span class="font-medium text-black">المبلغ المتبقي للدفع:</span>
                    <span
                        class="font-bold text-2xl text-red-600">{{ number_format($totalExpenses - $totalFunds, 2) }}</span>
                </div>
            </div>
        </div>


        <div class="flex justify-center w-full mt-3 border-b border-[#e1e1e1]"></div>
        <div class="modal-action mt-4">
            <button type="submit"
                class="w-[20%] bg-[#3B5998] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#2d4373] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">
                {{ __('Add') }}
            </button>
        </div>
    </form>
</div>

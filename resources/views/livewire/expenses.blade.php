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
        <h1>نفقات :</h1>
    </div>
    <div class="flex justify-between text-center items-center mx-5 my-4">
        <div class ="flex gap-10 m-4">
            <div class="text-center py-2 cursor-pointer text-white font-bold text-sm bg-adel-Dark px-2 rounded-md">مفتوحة
            </div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مفوترة</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">حميع الإدخالات</div>
            <div class="text-center py-2 cursor-pointer text-black font-bold text-sm">مستورد</div>
        </div>
        <div class="flex gap-2 items-center text-center">
            <button id ="printButton" title="Print Page">
                <i class="fas fa-print mr-2 mt-2 text-black"></i>
            </button>

            {{-- <button
                class="rounded-full bg-[#B0B3B8] text-white text-sm font-bold px-3 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-[#3A3B3C]">تعديل
                <span class="triangle bf-red-500 mr-1"></span>
            </button> --}}
            <div class="relative inline-block dropdown dropdown-hover dropdown-end">
                <button id="dropdownButton"
                    class="rounded-full bg-[#B0B3B8] text-white text-sm font-bold px-3 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-[#3A3B3C]">
                    تعديل
                    <span class="triangle bf-red-500 mr-1"></span>
                </button>
                <div id="dropdownMenu"
                    class="hidden absolute -right-11 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">حذف نفقة</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">إعادة تعيين
                        القضية</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">إعادة تعيين
                        المستخدم</a>
                </div>
            </div>

            <button type="button" onclick="addExpenss.showModal()"
                class="rounded-full bg-adel-Dark text-white text-sm font-bold px-5 py-2 focus:ring-transparent transition ease-in-out duration-200 hover:bg-adel-Dark-active ">إضافة
                نفقة</button>
        </div>
    </div>

    <div class="flex items-center justify-center">

        @if ($data['expenses'] && $data['expenses']->count())

            <table class="border-collapse w-full md:w-3/4 lg:w-full mx-4 border" id="printTable">
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

                    @foreach ($data['expenses'] as $expense)
                        <tr
                            class="bg-white text-black text-sm items-center text-center h-12 border-b hover:bg-gray-200">
                            <td class="px-4 py-2">
                                <input type="checkbox"
                                    class="form-checkbox h-4 w-4 text-adel-Dark focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active" />
                            </td>
                            <td>{{ $expense->date }}</td>
                            <td>{{ $expense->activity }}</td>
                            <td>{{ $expense->quantity }}</td>
                            <td>{{ $expense->amount }} ₪</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->total_amount }} ₪</td>
                            <td>---</td>
                            @php
                                $isPaid = $expense->is_paid;
                                $class;
                                if ($is_paid) {
                                    $class = 'bg-green-500';
                                } else {
                                    $class = 'bg-red-600';
                                }
                                $legalCase = $expense->legalCase;
                            @endphp
                            <td><span class="text-xs  font-bold rounded-2xl text-white px-3 py-1">مدفوع</span>
                            </td>
                            <td>{{ $legalCase->client->full_name }}</td>
                            <td>{{ $legalCase->title }}</td>
                            <td>
                                <button><i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <h1 class="text-center text-2xl text-black my-28">لا يوجد نفقات مضافة</h1>
        @endif

    </div>


    <dialog id="addExpenss" class="modal modal-middle sm:modal-middle" style="width:90%;">
        <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
            <form method="dialog">
                <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
            </form>
            <h3 class="font-bold text-2xl text-center">{{ __('إضافة نفقات') }}</h3>
            <div class="my-5">
                <hr>
            </div>

            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="case" class="w-1/4 text-right pr-2">{{ __('Case:') }}</label>
                        <select id="case" name="case"
                            class="w-3/4 p-2 border rounded-md focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active">
                            <option value="{{ old('case') }}" disabled selected>{{ __('Select a case') }}</option>
                            <option value="case1">{{ __('هنا يجب عرض قضايا المحامي') }}</option>
                            <optgroup label="قضايا">
                                @foreach ($data['lawyer']->legalCases as $case)
                                    <option value="{{ $case->id }}"
                                        {{ old('case') == $case->id ? 'selected' : '' }}>
                                        {{ $case->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    {{--  <div class="flex justify-end mt-2">
                        <button class="text-sm text-adel-Dark hover:text-adel-Dark-hover hover:underline">أضف قضية
                            جديدة</button>
                    </div> --}}
                    @error('case')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>


                <div class="flex items-center mb-5">
                    <label for="form_select_activity" class="w-1/4 text-right pr-2">{{ __('النشاط:') }}</label>
                    <select id="form_select_activity" name="form_select_activity"
                        class="w-2/4 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active">
                        <option value="" disabled selected>{{ __('اختر نوع النشاط') }}</option>
                        <option value="قراءة ملف">قراءة ملف</option>
                        <option value="زيارة طرف اخر">زيارة طرف اخر</option>
                    </select>
                    <div class="justify-end mr-4">
                        <button id="add_new_activity"
                            class="text-sm text-adel-Dark hover:text-adel-Dark-hover hover:underline">أضف نشاط
                            جديد</button>
                    </div>
                    @error('form_select_activity')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>

                {{--  <div class="flex items-center mb-5 ">
                    <label for="form_select_cost" class="w-1/4 text-right pr-2">{{ __('نوع التكلفة:') }}</label>
                    <select id="form_select_cost" name="form_select_cost"
                        class="w-3/4 p-2 border rounded-md focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active">
                        <option value="" disabled selected>{{ __('اختر نوع التكلفة') }}</option>
                        <option value="1">{{ __('تكلفة ثابتة') }}</option>
                    </select>
                    @error('form_select_cost')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div> --}}

                {{-- <div class="form-control w-52">
                    <input type="checkbox" class="toggle" checked style="background-color: #8f7257;"/>
                </div> --}}

                <div class="flex items-center mb-5 ">
                    <label for="form_description" class="w-1/4 text-right pr-2">{{ __('الوصف :') }}</label>
                    <textarea
                        class="textarea textarea-bordered focus:ring-2 focus:ring-adel-Normal-active placeholder:text-black bg-white w-3/4 border-black"
                        placeholder="أدخل الوصف هنا..." name="form_description"></textarea>
                    @error('form_description')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>

                <div class="bg-gray-100 p-6 flex justify-center items-center w-auto border border-gray-200">
                    <div class="flex flex-wrap gap-6">

                        <!-- Input Field 1 -->
                        <div class="relative">
                            <label for="input1"
                                class="absolute top-0 right-0 text-sm text-black ml-1 -mt-1">{{ __('التاريخ') }}</label>
                            <input type="date" id="form_date" name="form_date" value="{{ old('form_date') }}"
                                class="mt-5 p-2 w-60 lg:text-[85%] rounded-md border border-[#cacaca] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            @error('form_date')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <!-- Input Field 2 -->
                        <div class="relative">
                            <label for="form_cost"
                                class="absolute top-0 right-0 text-sm text-black ml-1 -mt-1">{{ __('السعر') }}</label>
                            <div class="relative mt-5">
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center p-2 rounded-r-md border border-[#cacaca] bg-[#eaeaea]">
                                    <span class="text-black text-md px-1 ">$</span>
                                </div>
                                <input type="text" id="form_cost" name="form_cost"
                                    value="{{ old('form_cost') }}"
                                    class="pl-8 p-2 w-full border lg:text-[85%] rounded-md border-[#cacaca] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            </div>
                            @error('form_cost')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <!-- Input Field 3 -->
                        <div class="relative">
                            <label for="form_quantity"
                                class="absolute top-0 right-0 text-sm text-black ml-1 -mt-1">{{ __('الكمية') }}</label>
                            <input type="text" id="form_quantity" value="{{ old('form_quantity') }}"
                                name="form_quantity"
                                class="mt-5 w-full p-2 border border-[#cacaca] rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        @error('form_quantity')
                            <p class="text-sm text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center w-full mt-3 border-b border-[#e1e1e1]"></div>
                <div class="modal-action ">
                    <button type="submit"
                        class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Add') }}</button>
                </div>
            </form>
        </div>
    </dialog>
</div>

<script>
    document.getElementById('dropdownButton').onclick = function() {
        var menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
        // menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    };

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('#dropdownButton')) {
            var dropdowns = document.getElementsByClassName('dropdown-menu');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    };
    document.getElementById('printButton').addEventListener('click', function() {
        var printContents = document.getElementById('printTable').outerHTML;
        var iframe = document.createElement('iframe');
        iframe.style.position = 'absolute';
        iframe.style.width = '0';
        iframe.style.height = '0';
        iframe.style.border = 'none';
        document.body.appendChild(iframe);

        var doc = iframe.contentWindow.document;
        doc.open();
        doc.write('<html><head><title>Print</title>');
        doc.write('<style>');
        doc.write('table { width: 100%; border-collapse: collapse; }');
        doc.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
        doc.write('th { background-color: #f2f2f2; }');
        doc.write('</style>');
        doc.write('</head><body>');
        doc.write(printContents);
        doc.write('</body></html>');
        doc.close();

        iframe.contentWindow.focus();
        iframe.contentWindow.print();

        document.body.removeChild(iframe);
    });

    const addActivityButton = document.querySelector('#add_new_activity');
    const activitySelect = document.getElementById('form_select_activity');

    addActivityButton.addEventListener('click', function() {
        // Create a new input element to capture user input
        const newActivityInput = document.createElement('input');
        newActivityInput.type = 'text';
        newActivityInput.placeholder = 'أدخل اسم النشاط الجديد'; // Placeholder text for new activity

        // Get the container element (assuming it's the parent of the button)
        const container = addActivityButton.parentElement;

        // Temporarily remove the button to avoid double-clicking issues
        container.removeChild(addActivityButton);

        // Display the input field and allow user input
        container.appendChild(newActivityInput);
        newActivityInput.focus(); // Focus on the input field for immediate typing

        newActivityInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') { // Handle Enter key press
                const newActivityValue = newActivityInput.value.trim();

                // Check if user entered a valid value
                if (newActivityValue) {
                    // Create a new option element with the entered value
                    const newOption = document.createElement('option');
                    newOption.text = newActivityValue;
                    newOption.value = newActivityValue;

                    // Add the new option to the select element
                    activitySelect.appendChild(newOption);

                    // Select the newly added option
                    newOption.selected = true;

                    // Remove the input field and display the button again
                    container.removeChild(newActivityInput);
                    container.appendChild(addActivityButton);
                } else {
                    alert('الرجاء إدخال اسم نشاط جديد.'); // Alert for empty input
                }
            }
        });
    });
</script>

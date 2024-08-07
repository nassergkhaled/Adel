@section('page_name', 'القضايا')
@section('title', 'القضايا | ')
@section('navbarSearchBar')
    <x-navbarSearchBar />
@endsection
<x-app-layout>
    @php
        $client = auth()->user()->client;
    @endphp
    <div class="my-3 px-4 space-y-4">

        <div class="flex justify-between">
            <h1 class="text-xl flex items-center font-bold text-black">جميع القضايا</h1>
            @if ($data['isLowyer'])
                <button type="button" onclick="addCase.showModal()"
                    class=" flex my-auto bg-[#BF9874] text-white px-8 py-2 rounded-md text-sm hover:bg-adel-Dark-hover">
                    {{ __('Add') }}
                </button>
            @endif
        </div>

        <hr>

        @if ($data['cases']->count() > 0)
            <button type="button"
                class=" flex my-auto bg-transparent border text-[#999999] px-7 py-[0.6rem] rounded-md text-sm  hover:text-adel-Normal-hover hover:shadow-lg hover:border-adel-Normal-hover transition ease-in-out duration-150">
                <i class="fa-solid fa-filter mt-1 me-1"></i> {{ __('Filter') }}
            </button>

            <div class="w-full">
                <table class="table  border-[#E6E8EB] text-black shadow-md rounded-sm bg-white">
                    <thead>
                        <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                            <th>اسم القضية</th>
                            @if ($client)
                                <th>اسم المحامي</th>
                            @else
                                <th>صاحب القضية</th>
                            @endif
                            <th>الحالة</th>
                            <th>تاريخ الفتح</th>
                            <th>تاريخ الاغلاق</th>
                            <th class="text-end"><input type="checkbox" id="" name=""
                                    class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-start" id="table_body">
                        @foreach ($data['cases'] as $case)
                            @php
                                $class;
                                switch ($case->status) {
                                    case 'Open':
                                        $class = 'bg-[#c1ebd7] px-2 py-1 rounded-md text-[#06A759]';
                                        break;
                                    case 'Closed':
                                        $class = 'bg-[#f9c6c6] px-2 py-1 rounded-md text-[#EA1B1B]';
                                        break;
                                    case 'Pending':
                                        $class = 'bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]';
                                        break;
                                    default:
                                        break;
                                }

                                if ($client) {
                                    $name = $case->lawyer->full_name;
                                } else {
                                    $name = $case->client->full_name;
                                }

                            @endphp

                            <tr class=" border-[#E6E8EB]">
                                <td><a class="hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150 underline underline-offset-4"
                                        href="{{ route('legalCases.show', $case->id) }}">{{ $case->title }}</a></td>

                                @if ($client)
                                    <td>{{ $name }}</td>
                                @else
                                    <td>{{ $name }}</td>
                                @endif
                                <td><span class="{{ $class }}">{{ __($case->status) }}</span></td>
                                <td>{{ $case->open_date }}</td>
                                <td>{{ $case->close_date }}</td>
                                <td class="text-end"><input type="checkbox" id="" name=""
                                        class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class=" p-5 pt-10 text-center text-black text-lg">{{ __('There are no cases registered yet.') }}</div>
        @endif

    </div>
    @if ($data['isLowyer'])

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

        <dialog id="addCase" class="modal modal-middle sm:modal-middle" style="width:90%;">
            <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
                <form method="dialog">
                    <button type="submit"
                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
                </form>
                <h3 class="font-bold text-2xl text-center">{{ __('إضافة قضية') }}</h3>
                <div class="my-5">
                    <hr>
                </div>

                <form action="{{ route('legalCases.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-flow-row gap-y-4">
                        <div class=" grid grid-flow-col gap-x-5">
                            <div>
                                <label for="case_name"
                                    class="block text-sm font-medium text-gray-700">{{ __('اسم القضية') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="text" id="case_name" name="case_name"
                                    placeholder="{{ __('اسم القضية') }}" value="{{ old('case_name') }}"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                @error('case_name')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label for="client_id"
                                    class="block text-sm font-medium text-gray-700">{{ __('صاحب القضية') }}
                                    <span class="text-red-500">*</span></label>
                                {{-- <input type="text" id="client_name" name="client_name"
                                placeholder="{{ __('صاحب القضية') }}"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            --}}
                                <select type="text" id="client_id" name="client_id"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                    <option disabled selected></option>

                                    @foreach ($data['clients'] as $client)
                                        <option value="{{ $client->id }}">{{ $client->full_name }} -
                                            {{ $client->phone_number }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="case_no"
                                    class="block text-sm font-medium text-gray-700">{{ __('رقم القضية') }}<span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="case_no"
                                    name="case_no" rows="3" value="{{ old('case_no') }}"
                                    class="mt-1 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                @error('case_no')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-flow-col gap-x-5">
                            <div>
                                <label for="case_status"
                                    class="block text-sm font-medium text-gray-700">{{ __('حالة القضية') }}
                                    <span class="text-red-500">*</span></label>
                                <select type="text" id="case_status" name="case_status"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                    <option disabled selected></option>
                                    <option value="Closed">{{ __('Closed') }}</option>
                                    <option value="Pending">{{ __('Pending') }}</option>
                                    <option value="Open">{{ __('Open') }}</option>
                                </select>
                                @error('case_status')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                            @php
                                $casesTypes = \app\Models\legalCase::pluck('type')->unique();
                            @endphp
                            <div>
                                <label for="case_type"
                                    class="block text-sm font-medium text-gray-700">{{ __('نوع القصية') }}
                                    <span class="text-red-500">*</span></label>
                                <select type="text" id="case_type" name="case_type" onchange="checkTypeValue(this)"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                    <option value="" selected>اختر نوع القضية</option>
                                    @foreach ($casesTypes as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('case_type')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror

                            </div>

                            <div id="wantedDiv" class="flex items-center pt-5 underline hover:text-adel-Dark-hover">
                                <button type="button" class="text-sm" onclick="addNewCaseType()">اضافة نوع
                                    جديد</button>


                            </div>
                        </div>
                        <script>
                            function addNewCaseType() {
                                const newInput = `
                                <label for="new_case_type"
                                    class="block text-sm font-medium text-gray-700">{{ __('اضافة نوع قضية جديد') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="text" id="new_case_type" name="case_type"
                                    value="{{ old('case_type') }}"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                    `;
                                let wantedDiv = document.getElementById('wantedDiv');
                                let case_type = document.getElementById('case_type');
                                case_type.value = '';
                                case_type.name = '';

                                wantedDiv.innerHTML = newInput;
                                wantedDiv.classList = '';
                                // document.getElementById('new_case_type').insertAdjacentHTML('beforeend', newInput);
                            }

                            function returnAddButton() {
                                const button = `<button type="button" class="text-sm" onclick="addNewCaseType()">اضافة نوع جديد</button>`;
                                let wantedDiv = document.getElementById('wantedDiv');
                                wantedDiv.innerHTML = button;
                                wantedDiv.classList = 'flex items-center pt-5 underline hover:text-adel-Dark-hover';
                                let case_type = document.getElementById('case_type');
                                case_type.name = 'case_type';
                            }

                            function checkTypeValue(option) {
                                if (option.value) {
                                    returnAddButton();
                                } else {
                                    addNewCaseType();
                                }
                            }
                        </script>
                        <div class="grid grid-flow-col gap-x-5">
                            <div>
                                <label for="case_openDate"
                                    class="block text-sm font-medium text-gray-700">{{ __('تاريخ الفتح') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="date" id="case_openDate" name="case_openDate"
                                    value="{{ old('case_openDate') }}"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                @error('case_openDate')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                            {{-- <div>
                                <label for="case_closeDate"
                                    class="block text-sm font-medium text-gray-700">{{ __('تاريخ الاغلاق') }} <span
                                        class="text-red-500">*</span></label>
                                <input type="date" id="case_closeDate" name="case_closeDate"
                                    value="{{ old('case_closeDate') }}"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                @error('case_closeDate')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div> --}}
                            <div>
                                <label for="fees_type"
                                    class="block text-sm font-medium text-gray-700">{{ __('الأتعاب') }}
                                    <span class="text-red-500">*</span></label>
                                <select type="text" id="fees_type" name="fees_type" rows="3"
                                    value="{{ old('fees_type') }}"
                                    class="mt-1 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                    <option value="static" selected>ثابت</option>
                                </select>
                                @error('fees_type')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label for="fees_amount"
                                    class="block text-sm font-medium text-gray-700">{{ __('مبلغ الأتعاب') }}<span
                                        class="text-red-500">*</span></label>
                                <input type="number" step="0.01" inputmode="numeric" id="fees_amount"
                                    name="fees_amount" rows="3" value="{{ old('fees_amount') }}"
                                    class="mt-1 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                @error('fees_amount')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-flow-col gap-x-5">
                            <div>
                                <label for="case_description"
                                    class="block text-sm font-medium text-gray-700">{{ __('وصف') }}
                                    <span class="text-red-500">*</span></label>
                                <textarea type="text" id="case_description" name="case_description" rows="3"
                                    value="{{ old('case_description') }}"
                                    class="mt-1 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300"></textarea>
                                @error('case_description')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label for="case_notes"
                                    class="block text-sm font-medium text-gray-700">{{ __('ملاحظات') }}</label>
                                <textarea type="text" id="case_notes" name="case_notes" rows="3" value="{{ old('case_notes') }}"
                                    class="mt-1 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300"></textarea>
                                @error('case_notes')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
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
    @endif

    <script>
        const legal_cases = @json($data['cases']);
    </script>
    <script src="{{ asset('js\search_bar\legalCase_index.js') }}"></script>
</x-app-layout>

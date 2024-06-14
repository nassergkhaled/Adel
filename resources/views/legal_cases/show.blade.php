@section('page_name', 'القضايا')
@section('title', 'القضايا | ')
<x-app-layout>
    <div class="overflow-scroll h-screen">
        <div class="flex m-5 justify-between items-center">
            <div class="text-black font-bold text-2xl tracking-wide">
                <h1>تفاصيل قضية <span>{{ $case->title }}</span></h1>
            </div>

            {{-- Back to Previous page button --}}
            <div>
                <button
                    class="flex items-center px-3 py-3 bg-white border border-[#E1E1E1] font-semibold rounded-lg  hover:bg-adel-Normal-hover focus:outline-none focus:ring-2 focus:ring-adel-Normal-active focus:ring-opacity-75"
                    onclick="window.location.href='{{ url()->previous() }}'">

                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.4451 6.60003H14.3996V8.39997H3.4451L8.27256 13.2274L7 14.5L0 7.5L7 0.5L8.27256 1.77256L3.4451 6.60003Z"
                            fill="black" />
                    </svg>
                </button>
            </div>
        </div>

        <div class=" m-5 space-y-6">

            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-2 tracking-wide">الوصف</h2>
                <p class="text-[#9B9B9B] text-sm">{{ $case->description }}</p>
            </div>


            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-4 tracking-wide">تفاصيل أخرى</h2>
                <div class=" flex justify-around items-center text-lg">

                    @php
                        $avatar = Auth::user()->avatar;
                        if ($avatar) {
                            $avatar = 'images/avatars/' . $avatar;

                            if (!file_exists($avatar)) {
                                $avatar = '/images/profile_avatar.png';
                            }
                        } else {
                            $avatar = '/images/profile_avatar.png';
                        }
                    @endphp
                    <div class="flex items-center space-x-2 gap-1">
                        <span class=" text-black ">صاحب القضية: </span>
                        <img src="{{ $avatar }}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                        <span class="text-black tracking-wide">{{ $case->client->full_name }}</span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div>
                            <span class="text-black">تاريخ الفتح والإغلاق :</span>
                            <span class="text-[#9B9B9B] text-md">{{ $case->open_date }}</span><span
                                class="font-bold px-1 text-adel-Dark">-</span><span>{{ $case->close_date }}</span>
                        </div>
                    </div>

                    @php
                        $class;
                        switch ($case->status) {
                            case 'Open':
                                $class = 'bg-[#c1ebd7] px-2 py-0 rounded-md text-[#06A759] tracking-wide';
                                break;
                            case 'Closed':
                                $class = 'bg-[#f9c6c6] px-2 py-0 rounded-md text-[#EA1B1B] tracking-wide';
                                break;
                            case 'Pending':
                                $class = 'bg-[#e9e2c0] px-2 py-0 rounded-md text-[#A78D06] tracking-wide';
                                break;
                            default:
                                break;
                        }

                        $name = $case->client->full_name;
                    @endphp
                    <div class="flex items-center gap-1 ">
                        <span class="text-black">حالة القضية :</span>
                        <span class="{{ $class }}">{{ __($case->status) }}</span>
                    </div>

                </div>
            </div>

            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-3 tracking-wide">الملاحظات</h2>
                <p class="text-[#9B9B9B] text-sm mb-2">{{ $case->notes }}</p>
            </div>
        </div>

        <div class="text-black m-5 font-bold text-2xl tracking-wide">
            <h1>الشهود</h1>
        </div>

        <div class="mx-5">
            <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                <thead>
                    <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                        <th>اسم الشاهد</th>
                        <th>رقم الهاتف</th>
                        <th>رقم الهوية</th>
                        <th>الموقع</th>
                        <th class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($case->witnesses as $witness)
                        <tr class=" border-[#E6E8EB]">
                            <td>{{ $witness->full_name }}</td>
                            <td>{{ data_get(json_decode($witness->contact_info), 'phone', 'N/A') }}</td>
                            <td>{{ $witness->ID_no }}</td>
                            <td>{{ data_get(json_decode($witness->contact_info), 'address', 'N/A') }}</td>
                            <td class="text-end"><input type="checkbox" id="" name=""
                                    class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="flex">
            <button type="button" onclick="addWitness.showModal()"
                class=" flex mr-5 mt-5 mb-1 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">إضافة
                شاهد</button>
            <button type="button"
                class=" flex mt-5 mb-1 mr-2 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">حذف
                شاهد</button>
        </div>

        <div class="text-black m-5 font-bold text-2xl tracking-wide">
            <h1>الجلسات</h1>
        </div>
        <div class="mx-5 mb-1">
            <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                <thead>
                    <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                        <th>الإسم</th>
                        <th>التاريخ</th>
                        <th>حالتها</th>
                        <th>الملفات المرفقة</th>
                        <th class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($case->sessions as $session)
                        <tr class=" border-[#E6E8EB]">
                            <td>{{ $session->id }}</td>
                            <td>{{ $session->date }}</td>
                            @php
                                $class;
                                switch ($session->status) {
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
                            @endphp
                            <td>
                                <span class="{{ $class }}">{{ __($session->status) }}</span>
                            </td>
                            <td>Null</td>
                            <td class="text-end"><input type="checkbox" id="" name=""
                                    class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <button type="button" onclick="addSession.showModal()"
            class=" flex mr-5 mt-4 mb-1 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">إضافة
            جلسة</button>
    </div>

    <style>
        .modal-box {
            width: 91.666667%;
            max-width: 40rem
                /* 512px */
            ;
        }

        .modal {
            /* align-items: center; */
            margin-left: auto;
            margin-right: auto;

        }
    </style>
    <dialog id="addWitness" class="modal modal-middle sm:modal-middle" style="width:90%;">
        <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
            <form method="dialog">
                <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
            </form>
            <h3 class="font-bold text-2xl text-center">{{ __('إضافة شاهد') }}</h3>
            <div class="my-5">
                <hr>
            </div>

            <form action="{{ route('witnesses.store') }}" method="POST">
                @csrf
                <input type="hidden" name="case_id" value="{{ $case->id }}">
                <div class="grid grid-flow-row gap-y-5">
                    <div class="grid grid-flow-col gap-x-1">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="witness_name" class="text-sm font-medium text-gray-700">{{ __('اسم الشاهد') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('witness_name')
                            <p class="text-sm text-center text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="witness_name" name="witness_name"
                                placeholder="{{ __('اسم الشاهد') }}" value="{{ old('witness_name') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>

                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="id_number" class="text-sm font-medium text-gray-700">{{ __('رقم الهوية') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('id_number')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="id_number" name="id_number" inputmode="numeric"
                                placeholder="{{ __('رقم الهوية') }}" value="{{ old('id_number') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>

                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="phone" class="text-sm font-medium text-gray-700">{{ __('رقم الهاتف') }}
                                <span class="text-red-500">*</span></label>

                        </div>
                        @error('phone')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="tel" id="phone" name="phone" inputmode="tel" dir="rtl"
                                placeholder="{{ __('رقم الهاتف') }}" value="{{ old('phone') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="address" class="text-sm font-medium text-gray-700">{{ __('العنوان') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('address')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="address" name="address" placeholder="{{ __('العنوان') }}"
                                value="{{ old('address') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="relationship" class="text-sm font-medium text-gray-700">{{ __('العلاقة') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('relationship')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="relationship" name="relationship"
                                placeholder="{{ __('العلاقة') }}" value="{{ old('relationship') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="oath_availability"
                                class="text-sm font-medium text-gray-700">{{ __('امكانية الحنث باليمين') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('oath_availability')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11 grid grid-flow-col">
                            <div>
                                <input type="radio" name="oath_availability" id="1" value="1"
                                    class="peer hidden" @checked(old('oath_availability') === '1') />
                                <label for="1"
                                    class=" cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-adel-Normal peer-checked:font-bold peer-checked:text-white w-full border-adel-Light-hover transition-all ease-in-out duration-100 hover:bg-adel-Light-hover px-8 border">نعم</label>
                            </div>
                            <div>
                                <input type="radio" name="oath_availability" id="2" value="0"
                                    class="peer hidden" @checked(old('oath_availability') === '0') />
                                <label for="2"
                                    class=" cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-adel-Normal peer-checked:font-bold peer-checked:text-white w-full border-adel-Light-hover transition-all ease-in-out duration-100 hover:bg-adel-Light-hover px-8 border">لا</label>
                            </div>





                        </div>
                    </div>



                    <div class="modal-action ">

                        <button type="submit"
                            class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-border-adel-Normal transition-colors duration-300">{{ __('Add') }}</button>

                    </div>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="addSession" class="modal modal-middle sm:modal-middle" style="width:90%;">
        <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
            <form method="dialog">
                <button type="submit"
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
            </form>
            <h3 class="font-bold text-2xl text-center">{{ __('إضافة جلسة') }}</h3>
            <div class="my-5">
                <hr>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="grid grid-flow-row gap-y-4">

                    <div>
                        <label for="session_name"
                            class="block text-sm font-medium text-gray-700">{{ __('اسم الجلسة') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="session_name" name="session_name"
                            placeholder="{{ __('اسم الشاهد') }}" value="{{ old('session_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('session_name')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                    {{--
                    
                    <div>
                        <label for="case_name" class="block text-sm font-medium text-gray-700">{{ __('اسم القضية') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="case_name" name="case_name" placeholder="{{ __('اسم القضية') }}"
                            value="{{ old('case_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('case_name')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="case_name" class="block text-sm font-medium text-gray-700">{{ __('اسم القضية') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="case_name" name="case_name" placeholder="{{ __('اسم القضية') }}"
                            value="{{ old('case_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('case_name')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="case_name" class="block text-sm font-medium text-gray-700">{{ __('اسم القضية') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="case_name" name="case_name" placeholder="{{ __('اسم القضية') }}"
                            value="{{ old('case_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('case_name')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="case_name" class="block text-sm font-medium text-gray-700">{{ __('اسم القضية') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="case_name" name="case_name" placeholder="{{ __('اسم القضية') }}"
                            value="{{ old('case_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('case_name')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="case_name" class="block text-sm font-medium text-gray-700">{{ __('اسم القضية') }}
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="case_name" name="case_name" placeholder="{{ __('اسم القضية') }}"
                            value="{{ old('case_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('case_name')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div> --}}

                    <div class="modal-action ">

                        <button type="submit"
                            class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-border-adel-Normal transition-colors duration-300">{{ __('Add') }}</button>

                    </div>
                </div>
            </form>
        </div>
    </dialog>
</x-app-layout>

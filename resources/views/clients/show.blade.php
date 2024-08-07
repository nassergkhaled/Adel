@section('page_name', 'الموكلين')
@section('title', 'الموكلين | ')
@section('navbarSearchBar')
    <x-navbarSearchBar />
@endsection
@php
    $client = $data['client'];
@endphp
<x-app-layout>
    <div class="overflow-scroll h-screen">
        <div class="flex m-5 justify-between items-center">
            <div class="text-black font-bold text-2xl tracking-wide">
                <h1>تفاصيل الموكّل <span>{{ $client->full_name }}</span></h1>
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

            <div class="bg-white px-5 rounded-md w-full flex justify-between py-5 items-center">
                <h2 class="text-2xl font-semibold text-black mb-2 tracking-wide">كود التسجيل</h2>
                <p class="text-2xl font-semibold bg-[#c1ebd7] px-5 py-2 rounded-md text-[#06A759] tracking-wide">
                    {{ optional($client)->signupToken ?? __('The client is already registered.') }} </p>
                <p></p>
            </div>


            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-4 tracking-wide">تفاصيل أخرى</h2>
                <div class=" flex justify-around items-center text-lg">

                    @php
                        $user = $client->user;
                        if ($user) {
                            $avatar = $user->avatar;
                            if ($avatar) {
                                $avatar = 'images/avatars/' . $avatar;

                                if (!file_exists($avatar)) {
                                    $avatar = '/images/profile_avatar.png';
                                }
                            } else {
                                $avatar = '/images/profile_avatar.png';
                            }
                        } else {
                            $avatar = '/images/profile_avatar.png';
                        }
                    @endphp
                    <div class="flex items-center space-x-2 gap-1">
                        <span class=" text-black ">الاسم الكامل: </span>
                        <img src="{{ $avatar }}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                        <span class="text-black tracking-wide">{{ $client->full_name }}</span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div>
                            <span class="text-black">رقم الهوية :</span>
                            <span
                                class="bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]">{{ $client->id_number }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 ">
                        <span class="text-black">رقم الهاتف :</span>
                        <span
                            class="bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]">{{ $client->phone_number }}</span>
                    </div>

                </div>
            </div>

            <div class="bg-white p-5 rounded-md w-full">


                <div class="flex justify-between mb-2">
                    <h2 class="text-2xl font-semibold text-black mb-3 tracking-wide">القضايا</h2>
                    @if (auth()->user()->role == "Lawyer")
                        <button type="button" onclick="addCase.showModal()"
                            class=" flex my-auto bg-[#BF9874] text-white px-8 py-2 rounded-md text-sm hover:bg-adel-Light-hover hover:text-adel-Dark hover:border border-adel-Dark transition-all ease-in-out duration-150">
                            {{ __('Add') }}
                        </button>




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
                                                        <option value="{{ $client->id }}" selected>{{ $client->full_name }} -
                                                            {{ $client->phone_number }}</option>
                                                </select>
                                                @error('client_id')
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
                                            <div>
                                                <label for="case_type"
                                                    class="block text-sm font-medium text-gray-700">{{ __('نوع القصية') }}
                                                    <span class="text-red-500">*</span></label>
                                                <select type="text" id="case_type" name="case_type"
                                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                                    <option disabled selected></option>
                                                    <option value="1">{{ __('جنائية') }}</option>
                                                    <option value="2">{{ __('مدنية') }}</option>
                                                </select>
                                                @error('case_type')
                                                    <p class="text-sm text-red-500">
                                                        * {{ __($message) }}
                                                    </p>
                                                @enderror
                
                                            </div>
                                        </div>
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
                                            <div>
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
                                            class="w-[20%] mx-auto text-center  focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 border border-transparent my-auto bg-[#BF9874] text-white px-8 py-2 rounded-md text-sm hover:bg-adel-Light-hover hover:text-adel-Dark hover:border-adel-Dark transition-all ease-in-out duration-150">{{ __('Add') }}</button>
                                    </div>
                                </form>
                            </div>
                        </dialog>
                    @endif

                </div>
                @if ($client->legalCases->count())
                    <div class="w-full px-14">
                        <table class="table  border-[#E6E8EB] text-black shadow-md rounded-sm bg-white">
                            <thead>
                                <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                                    <th>اسم القضية</th>
                                    <th>الحالة</th>
                                    <th>تاريخ الفتح</th>
                                    <th>تاريخ الاغلاق</th>

                                </tr>
                            </thead>
                            <tbody class="text-start" id="table_body">
                                @foreach ($client->legalCases as $case)
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

                                    @endphp

                                    <tr class=" border-[#E6E8EB]">
                                        <td class=" text-lg underline "><a
                                                class="hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150"
                                                href="{{ route('legalCases.show', $case->id) }}">{{ $case->title }}</a>
                                        </td>
                                        <td class=" text-lg"><span
                                                class="{{ $class }}">{{ __($case->status) }}</span></td>
                                        <td class=" text-lg">{{ $case->open_date }}</td>
                                        <td class=" text-lg">{{ $case->close_date }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <hr>
                    <h1 class="text-black text-2xl text-center w-full my-2">لا يوجد قضايا مسجلة لغاية الآن</h1>
                    <hr>
                @endif
            </div>

        </div>

        <script>
            const client_cases = (@json($client).legal_cases);
        </script>
        <script src="{{ asset('js\search_bar\client_show.js') }}"></script>

</x-app-layout>

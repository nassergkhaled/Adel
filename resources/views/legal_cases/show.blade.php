@section('page_name', 'القضايا')
@section('title', 'القضايا | ')
<x-app-layout>
    @php
        $lawyer = auth()->user()->lawyer;
    @endphp
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
                <div class="text-black text-lg mx-5 px-5 rounded-lg border">
                    <p>{{ $case->description }}</p>
                </div>
            </div>


            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-4 tracking-wide">تفاصيل أخرى</h2>
                <div class=" flex justify-around items-center text-lg">

                    @php
                        $user = $case->client->user;
                        if ($user && $user->avatar) {
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
                        @if ($lawyer)
                            <a class="text-black hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150 flex"
                                href="{{ route('clients.show', $case->client->id) }}">
                                <img src="{{ $avatar }}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                                &nbsp;
                                <span class=" tracking-wide underline underline-offset-auto">
                                    {{ $case->client->full_name }}</span>
                            </a>
                        @else
                            <img src="{{ $avatar }}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                            <span class=" tracking-wide text-black">
                                {{ $case->client->full_name }}</span>
                        @endif
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
                <div class="text-black text-lg mx-5 px-5 rounded-lg border">

                    <p>{{ $case->notes }}</p>
                </div>
            </div>

            <div class="text-black m-5 font-bold text-2xl tracking-wide">
                <h1>الشهود</h1>
            </div>

            <div class="mx-5">
                @if ($case->witnesses->count())
                    <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                        <thead>
                            <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                                <th>اسم الشاهد</th>
                                <th>اسم الجلسة</th>
                                <th>رقم الهاتف</th>
                                <th>رقم الهوية</th>
                                <th>الموقع</th>
                                <th class="text-end"><input type="checkbox" id="" name=""
                                        class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($case->witnesses->unique() as $witness)
                                <tr class=" border-[#E6E8EB]">
                                    <td>{{ $witness->full_name }}</td>
                                    <td>
                                        @php
                                            $witnessSessions = $witness->CaseSessionWitness
                                                ->where('legal_case_id', $case->id)
                                                ->map(function ($item) {
                                                    return $item->case_session_id
                                                        ? $item->session->session_name
                                                        : 'الجلسة الأساسية';
                                                })
                                                ->implode(', ');
                                        @endphp
                                        {{ $witnessSessions }}
                                    </td>
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
                @else
                    <hr>
                    <h1 class="text-black text-2xl text-center w-full my-2">لا يوجد شهود</h1>
                    <hr>
                @endif
            </div>
            @if ($lawyer)
                <div class="flex">
                    <button type="button" onclick="addWitness.showModal()"
                        class=" flex mr-5 mt-5 mb-1 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">إضافة
                        شاهد</button>
                    <button type="button"
                        class=" flex mt-5 mb-1 mr-2 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">حذف
                        شاهد</button>
                </div>
            @endif

            <div class="text-black m-5 font-bold text-2xl tracking-wide">
                <h1>الجلسات</h1>
            </div>
            <div class="mx-5 mb-1">
                @if ($case->sessions->count())
                    <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                        <thead>
                            <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                                <th>اسم الجلسة</th>
                                <th>حالة الجلسة</th>
                                <th>تاريخ الجلسة</th>
                                <th>إسم القاضي</th>
                                <th>المكان</th>
                                <th>الملفات</th>
                                <th class="text-end"><input type="checkbox" id="" name=""
                                        class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($case->sessions as $session)
                                <tr class=" border-[#E6E8EB]">
                                    <td><a class=" underline rounded-lg hover:bg-adel-light p-2"
                                            href="{{ route('Sessions.show', $session->id) }}">{{ $session->session_name }}</a>
                                    </td>
                                    @php
                                        $class;
                                        switch ($session->session_status) {
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

                                        $session_Date = \Carbon\Carbon::parse($session->session_Date);
                                        $formattedDate = $session_Date->format('d/m/Y - h:i');
                                        $amPm = $session_Date->format('A') === 'AM' ? 'ص' : 'م';
                                    @endphp
                                    <td>
                                        <span class="">{{ __($session->session_status) }}</span>
                                    </td>
                                    <td dir="">{{ $formattedDate . $amPm }}</td>
                                    <td>{{ $session->Judge_name }}</td>
                                    <td>{{ $session->session_location }}</td>
                                    @php
                                        $file = $session->file;
                                        $filePath = public_path('files') . '/' . $file;
                                        $fileUrl = asset('files') . '/' . $file;

                                        if ($file) {
                                            if (file_exists($filePath)) {
                                                $element =
                                                    '<a href="' .
                                                    $fileUrl .
                                                    '" target="_blank" rel=""><i class="fa-solid fa-file-pdf text-xl"></i></a>';
                                            } else {
                                                $element = '<span class="text-red-500">ملف محذوف</span>';
                                            }
                                        } else {
                                            $element = 'لا يوجد ملف';
                                        }
                                    @endphp
                                    <td>{!! $element !!}</td>

                                    <td class="text-end"><input type="checkbox" id="" name=""
                                            class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <hr>
                    <h1 class="text-black text-2xl text-center w-full my-2">لا يوجد جلسات</h1>
                    <hr>
                @endif
            </div>
            @if ($lawyer)
                <button type="button" onclick="addSession.showModal()"
                    class=" flex mr-5 mt-4 mb-1 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">إضافة
                    جلسة</button>
            @endif
        </div>

        @if ($lawyer)
            <x-add-witness-dialog :case="$case" :session="null" />

            {{-- ADD CASE-SESSION DIALOG/FORM START HERE --}}

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

                    <form action="{{ route('Sessions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-y-4">
                            <input type="hidden" name="case_id" value="{{ $case->id }}">
                            <div>
                                <label for="session_name" class="block text-sm font-medium text-gray-700">
                                    {{ __('اسم الجلسة') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="session_name" name="session_name"
                                    placeholder="أدخل اسم الجلسة" value="{{ old('session_name') }}"
                                    class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active transition-colors duration-300">
                                @error('session_name')
                                    <p class="text-sm text-red-500 text-center">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-x-5">
                                <div>
                                    <label for="session_status" class="block text-sm font-medium text-gray-700">
                                        حالة الجلسة <span class="text-red-500">*</span>
                                    </label>
                                    <select id="session_status" name="session_status"
                                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active transition-colors duration-300">
                                        <option disabled selected></option>
                                        <option value="Scheduled">مجدولة</option>
                                        <option value="Finished">منتهية</option>
                                        <option value="Postponed">مؤجلة</option>
                                    </select>
                                    @error('session_status')
                                        <p class="text-sm text-red-500">
                                            * {{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="session_Date" class="block text-sm font-medium text-gray-700">
                                        تاريخ الجلسة <span class="text-red-500">*</span>
                                    </label>
                                    <input type="datetime-local" id="session_Date" name="session_Date"
                                        value="{{ old('session_Date') }}"
                                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active transition-colors duration-300">
                                    @error('session_Date')
                                        <p class="text-sm text-red-500">
                                            * {{ __($message) }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-x-5">
                                <div>
                                    <label for="Judge_name" class="block text-sm font-medium text-gray-700">
                                        إسم القاضي <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="Judge_name" name="Judge_name"
                                        placeholder="أدخل اسم القاضي" value="{{ old('Judge_name') }}"
                                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active transition-colors duration-300">
                                    @error('Judge_name')
                                        <p class="text-sm text-red-500 text-center">
                                            * {{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="session_location" class="block text-sm font-medium text-gray-700">
                                        المكان <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="session_location" name="session_location"
                                        placeholder="المحكمة ورقم القاعة" value="{{ old('session_location') }}"
                                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-Normal-active transition-colors duration-300">
                                    @error('session_location')
                                        <p class="text-sm text-red-500 text-center">
                                            * {{ __($message) }}
                                        </p>
                                    @enderror
                                </div>
                            </div>


                            <div class="border-2 border-dashed border-adel-Dark rounded-lg p-4  flex justify-between">
                                <label class="">
                                    <span
                                        class=" flex my-auto bg-[#BF9874] text-white px-4 py-1 rounded-lg text-sm hover:bg-adel-Light-hover hover:text-adel-Dark hover:border-adel-Dark border border-transparent transition-all ease-in-out duration-150">
                                        اضغط لإرفاق ملف
                                    </span>
                                    <input type="file" onchange="loadFile(event)" name="file" id="file_input"
                                        accept=""
                                        class=" w-full text-sm text-slate-500
                                                file:mr-4 file:py-2 file:px-4 hidden
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                 file:bg-adel-Normal file:text-white
                                                 hover:file:bg-adel-Dark-hover
                                                file:transition file:ease-in-out file:duration-100
                                                " />
                                </label>
                                <span id="file-name"
                                    class="text-sm text-slate-900 flex items-center justify-center">لم يتم اختيار
                                    ملف</span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <button type="button" id="clearButton" hidden class=""
                                    onclick="clearFile(this)"><i
                                        class="fa-solid fa-eraser  rounded-full hover:bg-black hover:bg-opacity-5 p-1 text-adel-Dark hover:text-adel-Normal-hover transition-all duration-100 ease-in-out"></i></button>

                                @error('file')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>


                            <script>
                                var loadFile = function(event) {
                                    var input = event.target;
                                    var file = input.files[0];
                                    var type = file.type;
                                    var output = document.getElementById('preview_img');
                                    // output.src = URL.createObjectURL(event.target.files[0]);
                                    // output.onload = function() {
                                    //     URL.revokeObjectURL(output.src) // free memory
                                    // }
                                    const fileNameElement = document.getElementById('file-name');
                                    fileNameElement.textContent = file.name;
                                    document.getElementById('clearButton').hidden = false;


                                };
                                const clearFile = function(button) {
                                    document.getElementById('file_input').value = '';
                                    document.getElementById('file-name').innerHTML = "لم يتم اختيار ملف";
                                    button.hidden = true;

                                }
                            </script>

                            <div class="modal-action">
                                <button type="submit"
                                    class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-border-adel-Normal transition-colors duration-300">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
        @endif
</x-app-layout>

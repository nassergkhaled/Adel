@section('page_name', 'القضايا')
@section('title', 'القضايا | ')
<x-app-layout>
    @php
        $session = $data['session'];
        $legalCase = $session->lagalCase;
        $client = $legalCase->client;
        $avatar = $client->user->avatar ?? '/images/profile_avatar.png';
        $sessionDate = \Carbon\Carbon::parse($session->session_date)->format('d/m/Y - h:i A');
        $sessionStatusClass = match ($session->session_status) {
            'Scheduled' => 'bg-[#c1ebd7] px-2 py-0 rounded-md text-[#06A759] tracking-wide',
            'Finished' => 'bg-[#f9c6c6] px-2 py-0 rounded-md text-[#EA1B1B] tracking-wide',
            'Postponed' => 'bg-[#e9e2c0] px-2 py-0 rounded-md text-[#A78D06] tracking-wide',
            default => '',
        };
        $imLawyer = auth()->user()->lawyer;
    @endphp

    <div class="overflow-scroll h-screen">
        <div class="flex m-5 justify-between items-center">
            <div class="text-black font-bold text-2xl tracking-wide">
                <h1>تفاصيل جلسة <span>{{ $session->session_name }}</span></h1>
            </div>

            {{-- Back to Previous page button --}}
            <div>
                <button
                    class="flex items-center px-3 py-3 bg-white border border-[#E1E1E1] font-semibold rounded-lg hover:bg-adel-Normal-hover focus:outline-none focus:ring-2 focus:ring-adel-Normal-active focus:ring-opacity-75"
                    onclick="window.location.href='{{ url()->previous() }}'">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.4451 6.60003H14.3996V8.39997H3.4451L8.27256 13.2274L7 14.5L0 7.5L7 0.5L8.27256 1.77256L3.4451 6.60003Z"
                            fill="black" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="m-5 space-y-6">
            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-2 tracking-wide">الوصف</h2>
                <div class="text-black text-lg mx-5 px-5 rounded-lg border">
                    <p>{{ $session->description }}</p>
                </div>
            </div>

            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-4 tracking-wide">تفاصيل أخرى</h2>
                <div class="flex justify-around items-center text-lg">
                    <div class="flex items-center space-x-2 gap-1">
                        <span class="text-black">اسم القضيّة:</span>
                        <a class="text-black hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150 flex underline underline-offset-auto hover:no-underline"
                            href="{{ route('legalCases.show', $legalCase->id) }}">
                            <span class="tracking-wide ">
                                {{ $legalCase->title }}</span>
                        </a>
                    </div>
                    <div class="flex items-center space-x-2 gap-1">
                        <span class="text-black">صاحب القضية:</span>
                        @if ($imLawyer)
                            <a class="text-black hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150 flex"
                                href="{{ route('clients.show', $client->id) }}">
                                <img src="{{ $avatar }}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                                &nbsp;
                                <span class=" tracking-wide underline underline-offset-auto">
                                    {{ $client->full_name }}</span>
                            </a>
                        @else
                            <img src="{{ $avatar }}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                            <span class=" tracking-wide text-black">
                                {{ $client->full_name }}</span>
                        @endif
                    </div>
                    <div class="flex items-center space-x-4">
                        <div>
                            <span class="text-black">تاريخ الجلسة:</span>
                            <span class="text-[#9B9B9B] text-md">{{ $sessionDate }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="text-black">حالة الجلسة:</span>
                        <span class="{{ $sessionStatusClass }}">{{ __($session->session_status) }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-3 tracking-wide">موقع الجلسة</h2>
                <div class="text-black text-lg mx-5 px-5 rounded-lg border">
                    <p>{{ $session->session_location }}</p>
                </div>
            </div>

            <div class="text-black m-5 font-bold text-2xl tracking-wide">
                <h1>الشهود</h1>
            </div>
            <div class="mx-5">
                @if ($session->witnesses->isNotEmpty())
                    <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                        <thead>
                            <tr class="border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                                <th>اسم الشاهد</th>
                                <th>رقم الهاتف</th>
                                <th>رقم الهوية</th>
                                <th>الموقع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($session->witnesses as $witness)
                                <tr class="border-[#E6E8EB]">
                                    <td>{{ $witness->full_name }}</td>
                                    <td>{{ data_get(json_decode($witness->contact_info), 'phone', 'N/A') }}</td>
                                    <td>{{ $witness->ID_no }}</td>
                                    <td>{{ data_get(json_decode($witness->contact_info), 'address', 'N/A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <hr>
                    <h1 class="text-black text-2xl text-center w-full my-2">لا يوجد شهود في هذه الجلسة</h1>
                    <hr>
                @endif
            </div>
            @if ($imLawyer)
                <div class="flex">
                    <button type="button" onclick="addWitness.showModal()"
                        class=" flex mr-5 mt-5 mb-1 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">إضافة
                        شاهد</button>
                </div>
            @endif


            <div class="text-black m-5 font-bold text-2xl tracking-wide">
                <h1>الجلسات السابقة</h1>
            </div>
            <div class="mx-5 mb-1">
                @if ($data['prevSessions']->isNotEmpty())
                    <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                        <thead>
                            <tr class="border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                                <th>اسم الجلسة</th>
                                <th>حالة الجلسة</th>
                                <th>تاريخ الجلسة</th>
                                <th>إسم القاضي</th>
                                <th>المكان</th>
                                <th>الملفات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['prevSessions'] as $pastSession)
                                @php
                                    $formattedDate = \Carbon\Carbon::parse($pastSession->session_date)->format(
                                        'd/m/Y - h:i A',
                                    );
                                    $statusClass = match ($pastSession->session_status) {
                                        'Open' => 'bg-[#c1ebd7] px-2 py-1 rounded-md text-[#06A759]',
                                        'Closed' => 'bg-[#f9c6c6] px-2 py-1 rounded-md text-[#EA1B1B]',
                                        'Pending' => 'bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]',
                                        default => '',
                                    };
                                    $fileElement = $pastSession->file
                                        ? (file_exists(public_path('files/' . $pastSession->file))
                                            ? '<a href="' .
                                                asset('files/' . $pastSession->file) .
                                                '" target="_blank" rel=""><i class="fa-solid fa-file-pdf text-xl"></i></a>'
                                            : '<span class="text-red-500">ملف محذوف</span>')
                                        : 'لا يوجد ملف';
                                @endphp
                                <tr class="border-[#E6E8EB] hover:bg-gray-100 transition-all ease-in-out duration-75">
                                    <td><a class=" underline rounded-lg hover:bg-adel-light p-2"
                                            href="{{ route('Sessions.show', $pastSession->id) }}">{{ $pastSession->session_name }}</a>
                                    </td>
                                    <td><span
                                            class="{{ $statusClass }}">{{ __($pastSession->session_status) }}</span>
                                    </td>
                                    <td dir="">{{ $formattedDate }}</td>
                                    <td>{{ $pastSession->Judge_name }}</td>
                                    <td>{{ $pastSession->session_location }}</td>
                                    <td>{!! $fileElement !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <hr>
                    <h1 class="text-black text-2xl text-center w-full my-2">لا يوجد جلسات سابقة</h1>
                    <hr>
                @endif
            </div>


            <div class="text-black m-5 font-bold text-2xl tracking-wide">
                <h1>ملفات الجلسة</h1>
            </div>
            <div class="mx-5 mb-1">
                @if (false)
                    <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                        <thead>
                            <tr class="border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                                <th>اسم الجلسة</th>
                                <th>حالة الجلسة</th>
                                <th>تاريخ الجلسة</th>
                                <th>إسم القاضي</th>
                                <th>المكان</th>
                                <th>الملفات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['prevSessions'] as $pastSession)
                                @php
                                    $formattedDate = \Carbon\Carbon::parse($pastSession->session_date)->format(
                                        'd/m/Y - h:i A',
                                    );
                                    $statusClass = match ($pastSession->session_status) {
                                        'Open' => 'bg-[#c1ebd7] px-2 py-1 rounded-md text-[#06A759]',
                                        'Closed' => 'bg-[#f9c6c6] px-2 py-1 rounded-md text-[#EA1B1B]',
                                        'Pending' => 'bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]',
                                        default => '',
                                    };
                                    $fileElement = $pastSession->file
                                        ? (file_exists(public_path('files/' . $pastSession->file))
                                            ? '<a href="' .
                                                asset('files/' . $pastSession->file) .
                                                '" target="_blank" rel=""><i class="fa-solid fa-file-pdf text-xl"></i></a>'
                                            : '<span class="text-red-500">ملف محذوف</span>')
                                        : 'لا يوجد ملف';
                                @endphp
                                <tr class="border-[#E6E8EB] hover:bg-gray-100 transition-all ease-in-out duration-75">
                                    <td>{{ $pastSession->session_name }}</td>
                                    <td><span
                                            class="{{ $statusClass }}">{{ __($pastSession->session_status) }}</span>
                                    </td>
                                    <td dir="">{{ $formattedDate }}</td>
                                    <td>{{ $pastSession->judge_name }}</td>
                                    <td>{{ $pastSession->session_location }}</td>
                                    <td>{!! $fileElement !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <hr>
                    <h1 class="text-black text-2xl text-center w-full my-2">لا يوجد ملفات</h1>
                    <hr>
                @endif
            </div>
        </div>
    </div>
    @if ($imLawyer)
        <x-add-witness-dialog :case="$legalCase" :session="$session" />
    @endif
</x-app-layout>

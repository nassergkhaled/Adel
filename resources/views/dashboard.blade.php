@section('page_name', 'الرئيـسـية')
@section('title', 'الرئيسية | ')

<x-app-layout>
    @if (!$data['flag'])
        <div class="flex justify-center items-center mt-[20%]">
            <h1 class="text-black text-5xl border rounded-full p-7 border-adel-Normal-hover">لوحة بيانات
                {{ __(auth()->user()->role) }} لا زالت قيد التصميم !!</h1>
        </div>
    @else
        @php
            $open = $data['cases']->where('status', 'Open')->count();
            $closed = $data['cases']->where('status', 'Closed')->count();
            $pending = $data['cases']->where('status', 'Pending')->count();

            $today = date('Y-m-d');
            $upcomingCases = $data['cases']->where('open_date', '>=', $today)->sortBy('open_date')->take(7);
            $showClients = $data['clients']->take(7);
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 my-4 mx-4">

            <div class="bg-white rounded-md p-4 flex flex-col justify-center">
                <div class="flex items-center space-x-2">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" class="ml-2"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="30" height="30" rx="4" fill="#F5F0EA" />
                        <mask id="mask0_332_205" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="7" y="7"
                            width="16" height="16">
                            <rect x="7" y="7" width="16" height="16" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_332_205)">
                            <path
                                d="M7.66663 20.3337V18.467C7.66663 18.0892 7.76385 17.742 7.95829 17.4253C8.15274 17.1087 8.41107 16.867 8.73329 16.7003C9.42218 16.3559 10.1222 16.0975 10.8333 15.9253C11.5444 15.7531 12.2666 15.667 13 15.667C13.7333 15.667 14.4555 15.7531 15.1666 15.9253C15.8777 16.0975 16.5777 16.3559 17.2666 16.7003C17.5888 16.867 17.8472 17.1087 18.0416 17.4253C18.2361 17.742 18.3333 18.0892 18.3333 18.467V20.3337H7.66663ZM19.6666 20.3337V18.3337C19.6666 17.8448 19.5305 17.3753 19.2583 16.9253C18.9861 16.4753 18.6 16.0892 18.1 15.767C18.6666 15.8337 19.2 15.9475 19.7 16.1087C20.2 16.2698 20.6666 16.467 21.1 16.7003C21.5 16.9225 21.8055 17.1698 22.0166 17.442C22.2277 17.7142 22.3333 18.0114 22.3333 18.3337V20.3337H19.6666ZM13 15.0003C12.2666 15.0003 11.6388 14.7392 11.1166 14.217C10.5944 13.6948 10.3333 13.067 10.3333 12.3337C10.3333 11.6003 10.5944 10.9725 11.1166 10.4503C11.6388 9.9281 12.2666 9.66699 13 9.66699C13.7333 9.66699 14.3611 9.9281 14.8833 10.4503C15.4055 10.9725 15.6666 11.6003 15.6666 12.3337C15.6666 13.067 15.4055 13.6948 14.8833 14.217C14.3611 14.7392 13.7333 15.0003 13 15.0003ZM19.6666 12.3337C19.6666 13.067 19.4055 13.6948 18.8833 14.217C18.3611 14.7392 17.7333 15.0003 17 15.0003C16.8777 15.0003 16.7222 14.9864 16.5333 14.9587C16.3444 14.9309 16.1888 14.9003 16.0666 14.867C16.3666 14.5114 16.5972 14.117 16.7583 13.6837C16.9194 13.2503 17 12.8003 17 12.3337C17 11.867 16.9194 11.417 16.7583 10.9837C16.5972 10.5503 16.3666 10.1559 16.0666 9.80033C16.2222 9.74477 16.3777 9.70866 16.5333 9.69199C16.6888 9.67533 16.8444 9.66699 17 9.66699C17.7333 9.66699 18.3611 9.9281 18.8833 10.4503C19.4055 10.9725 19.6666 11.6003 19.6666 12.3337ZM8.99996 19.0003H17V18.467C17 18.3448 16.9694 18.2337 16.9083 18.1337C16.8472 18.0337 16.7666 17.9559 16.6666 17.9003C16.0666 17.6003 15.4611 17.3753 14.85 17.2253C14.2388 17.0753 13.6222 17.0003 13 17.0003C12.3777 17.0003 11.7611 17.0753 11.15 17.2253C10.5388 17.3753 9.93329 17.6003 9.33329 17.9003C9.23329 17.9559 9.15274 18.0337 9.09163 18.1337C9.03051 18.2337 8.99996 18.3448 8.99996 18.467V19.0003ZM13 13.667C13.3666 13.667 13.6805 13.5364 13.9416 13.2753C14.2027 13.0142 14.3333 12.7003 14.3333 12.3337C14.3333 11.967 14.2027 11.6531 13.9416 11.392C13.6805 11.1309 13.3666 11.0003 13 11.0003C12.6333 11.0003 12.3194 11.1309 12.0583 11.392C11.7972 11.6531 11.6666 11.967 11.6666 12.3337C11.6666 12.7003 11.7972 13.0142 12.0583 13.2753C12.3194 13.5364 12.6333 13.667 13 13.667Z"
                                fill="#BF9874" />
                        </g>
                    </svg>
                    <span class="text-[#9F9E9E]">عدد الموكلين </span>
                </div>
                <p class="text-xl mr-0 font-bold mt-3 text-black">{{ $data['clients']->count() }}</p>
            </div>


            <div class="bg-white rounded-md p-4 flex flex-col justify-center">
                <div class="flex items-center space-x-2">

                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" class="ml-2"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="30" height="30" rx="4" fill="#E4BF74" fill-opacity="0.25" />
                        <path
                            d="M15.6657 8.33301L15.6653 9.18501L18.999 10.2969L21.4207 9.48973L21.8423 10.7546L19.8213 11.4283L21.8848 17.1029C21.1569 17.8611 20.1331 18.333 18.999 18.333C17.865 18.333 16.8412 17.8611 16.1133 17.1029L18.1759 11.4283L15.6653 10.591V19.6663H18.3323V20.9997H11.6657V19.6663H14.3319V10.591L11.8213 11.4283L13.8848 17.1029C13.1569 17.8611 12.133 18.333 10.999 18.333C9.865 18.333 8.84119 17.8611 8.11328 17.1029L10.1759 11.4283L8.15575 10.7546L8.57739 9.48973L10.999 10.2969L14.3319 9.18501L14.3323 8.33301H15.6657ZM18.999 13.0681L18.0539 15.6663H19.9439L18.999 13.0681ZM10.999 13.0681L10.0539 15.6663H11.9439L10.999 13.0681Z"
                            fill="#E4BF74" />
                    </svg>

                    <span class="text-[#9F9E9E]">القضايا المنتظرة</span>
                </div>
                <p class="text-xl mr-1 font-bold mt-3 text-black">{{ $pending }}</p>
            </div>


            <div class="bg-white rounded-md p-4 flex flex-col justify-center">
                <div class="flex items-center space-x-2">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" class="ml-2"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="30" height="30" rx="4" fill="#74BF99" fill-opacity="0.25" />
                        <path
                            d="M15.6657 8.33301L15.6653 9.18501L18.999 10.2969L21.4207 9.48973L21.8423 10.7546L19.8213 11.4283L21.8848 17.1029C21.1569 17.8611 20.1331 18.333 18.999 18.333C17.865 18.333 16.8412 17.8611 16.1133 17.1029L18.1759 11.4283L15.6653 10.591V19.6663H18.3323V20.9997H11.6657V19.6663H14.3319V10.591L11.8213 11.4283L13.8848 17.1029C13.1569 17.8611 12.133 18.333 10.999 18.333C9.865 18.333 8.84119 17.8611 8.11328 17.1029L10.1759 11.4283L8.15575 10.7546L8.57739 9.48973L10.999 10.2969L14.3319 9.18501L14.3323 8.33301H15.6657ZM18.999 13.0681L18.0539 15.6663H19.9439L18.999 13.0681ZM10.999 13.0681L10.0539 15.6663H11.9439L10.999 13.0681Z"
                            fill="#74BF99" />
                    </svg>
                    <span class="text-[#9F9E9E]">القضايا المفتوحة</span>
                </div>
                <p class="text-xl mr-1 font-bold mt-3 text-black">{{ $open }}</p>
            </div>


            <div class="bg-white rounded-md p-4 flex flex-col justify-center">
                <div class="flex items-center space-x-2 ">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" class="ml-2"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="30" height="30" rx="4" fill="#EC1717" fill-opacity="0.25" />
                        <path
                            d="M15.6657 8.33301L15.6653 9.18501L18.999 10.2969L21.4207 9.48973L21.8423 10.7546L19.8213 11.4283L21.8848 17.1029C21.1569 17.8611 20.1331 18.333 18.999 18.333C17.865 18.333 16.8412 17.8611 16.1133 17.1029L18.1759 11.4283L15.6653 10.591V19.6663H18.3323V20.9997H11.6657V19.6663H14.3319V10.591L11.8213 11.4283L13.8848 17.1029C13.1569 17.8611 12.133 18.333 10.999 18.333C9.865 18.333 8.84119 17.8611 8.11328 17.1029L10.1759 11.4283L8.15575 10.7546L8.57739 9.48973L10.999 10.2969L14.3319 9.18501L14.3323 8.33301H15.6657ZM18.999 13.0681L18.0539 15.6663H19.9439L18.999 13.0681ZM10.999 13.0681L10.0539 15.6663H11.9439L10.999 13.0681Z"
                            fill="#EC1717" />
                    </svg>
                    <span class="text-[#9F9E9E] mr-8">القضايا المغلقة</span>
                </div>
                <p class="text-xl mr-1 font-bold mt-3 text-black">{{ $closed }}</p>
            </div>
        </div>



        <div class="grid grid-cols-3 gap-4 mx-4">
            <!-- First Card -->
            <div class="col-span-1 bg-white rounded-lg ">
                <div class="flex justify-between p-4">
                    <div class="text-black font-bold ">الموكلين</div>
                    <a href="{{ route('clients.index') }}" class=" underline text-adel-Normal ">عرض الكل</a>

                </div>
                <hr>
                <ul class="list-none p-3">

                    @if ($data['clients']->count())
                        @foreach ($data['clients'] as $client)
                            @php
                                //to print one case tite + number of other cases
                                $caseName = $client->legalCases->where('lawyer_id', Auth::id())->first()->title;
                                $casesCount = $client->legalCases->where('lawyer_id', Auth::id())->count() - 1;
                                $print = $caseName;
                                if ($casesCount > 0) {
                                    $print .= ' + ' . $casesCount;
                                }

                                if (!($client->user_id && $client->user->avatar)) {
                                    // $clientAvatar = '\images\profile_avatar.png';
                                    $clientAvatar = null;
                                } else {
                                    $clientAvatar = '/images/avatars/' . $client->user->avatar;
                                }

                            @endphp
                            <li class="flex justify-between items-center py-2">
                                <div class="flex items-center">

                                    @if ($clientAvatar)
                                        <div class="avatar w-12">
                                            <div class="rounded-full">
                                                <img alt="Tailwind CSS Navbar component" src="{{ $clientAvatar }}" />
                                            </div>
                                        </div>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                        </svg>
                                    @endif


                                    <span class="text-black  text-md">{{ $client->full_name }}</span>
                                </div>
                                <div class="text-left">
                                    <span>{{ $print }}</span>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="flex justify-between items-center px-2 py-1 ">
                            <div class="flex items-center mx-auto">
                                <span class="text-black mr-2 ">{{ __('There are no clients yet.') }}</span>
                            </div>
                        </li>

                    @endif

                </ul>

            </div>
            {{-- must be modified only for test and design !! --}}
            <!-- Second Card (Pie Chart) -->
            <div class="col-span-1 bg-white rounded-lg">
                <div class="rounded-lg overflow-hidden">
                    <div class="flex justify-between items-center mx-4 my-2 pb-0">
                        <div class="text-black font-bold">أنواع القضايا</div>
                        <select id="case_status" name="case_status"
                            class="w-28 border text-center lg:text-[90%] font-bold text-[#9F9E9E] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            <option value="1">شهري</option>
                            <option value="2">سنوي</option>
                            <option value="3">يومي</option>
                        </select>
                    </div>
                    <hr>
                </div>

                <div class="grid grid-cols-2 my-9">
                    <div class="p-4">
                        <canvas id="chartPie"></canvas>
                    </div>
                    <div class="flex justify-center items-center"> <!-- This container centers everything inside it -->
                        <div class=" p-4 leading-10 text-center"> <!-- Added text-center for text alignment within each flex item -->
                            {{-- <div class="text-black flex justify-center items-center my-2 space-x-4"> <!-- justify-center aligns children horizontally center -->
                                <span class="bg-[#F9F5F1] rounded-full w-4 h-4 ml-2"></span>
                                <p class="ml-2">القضايا الجنائية</p>
                                <p class="text-[#9F9E9E]">60%</p>
                            </div>

                            <div class="text-black flex justify-center items-center my-2 space-x-4">
                                <span class="bg-[#775635] rounded-full w-4 h-4 ml-2"></span>
                                <p class="ml-2">القضايا الحقوقية</p>
                                <p class="text-[#9F9E9E]">40%</p>
                            </div>

                            <div class="text-black flex justify-center items-center my-2 space-x-4">
                                <span class="bg-[#553818] rounded-full w-4 h-4 ml-2"></span>
                                <p class="ml-2">القضايا الإنهائية</p>
                                <p class="text-[#9F9E9E]">20%</p>
                            </div> --}}
                            <ul>
                                <li class="flex items-center space-x-4 text-black ">
                                    <span class="bg-[#F9F5F1] rounded-full w-4 h-4 ml-2"></span>
                                    <span>القضايا الجنائية</span>
                                    <span class="text-[#9F9E9E] font-bold">60%</span>
                                </li>
                                <li class="flex items-center space-x-4 text-black">
                                    <span class="bg-[#775635] rounded-full w-4 h-4 ml-2"></span>
                                    <span>القضايا الحقوقية</span>
                                    <span class="text-[#9F9E9E] font-bold">40%</span>
                                </li>
                                <li class="flex items-center space-x-4 text-black">
                                    <span class="bg-[#553818] rounded-full w-4 h-4 ml-2"></span>
                                    <span>القضايا الإنهائية</span>
                                    <span class="text-[#9F9E9E] font-bold">20%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const dataPie = {
                        labels: ["القضايا الإنهائية", "القضايا الحقوقية", "القضايا الجنائية"],
                        datasets: [{
                            label: "Number",
                            data: [230, 75, 100],
                            backgroundColor: [
                                "rgba(85, 56, 24, 1)",
                                "rgba(119, 86, 53, 1)",
                                "rgba(249, 245, 241, 1)"
                            ],
                            hoverOffset: 4
                        }]
                    };
                    const configPie = {
                        type: 'pie',
                        data: dataPie,
                        options: {
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            }
                        }
                    };
                    var chartPie = new Chart(document.getElementById("chartPie"), configPie);
                </script>
            </div>


            <!-- Third Card -->
            <div class="col-span-1 bg-white rounded-lg ">
                <div class="p-4 text-black font-bold">القضايا القادمة</div>
                <hr>
                <ul class="list-none mx-1 mt-2 ">
                    @if ($upcomingCases->count() > 0)
                        @foreach ($upcomingCases as $case)
                            <li class="flex justify-between items-center px-2 py-1 ">
                                <div class="flex items-center">

                                    {{-- <svg width="36" height="36" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20" r="20" fill="#F5F0EA" />
                                    <path
                                        d="M21.3378 14.48C21.5898 14.48 21.8044 14.5687 21.9818 14.746C22.1591 14.9233 22.2478 15.138 22.2478 15.39C22.2478 15.6327 22.1591 15.8427 21.9818 16.02C21.8044 16.1973 21.5898 16.286 21.3378 16.286C21.0951 16.286 20.8851 16.1973 20.7078 16.02C20.5304 15.8427 20.4418 15.6327 20.4418 15.39C20.4418 15.138 20.5304 14.9233 20.7078 14.746C20.8851 14.5687 21.0951 14.48 21.3378 14.48ZM23.4798 14.48C23.7318 14.48 23.9418 14.5687 24.1098 14.746C24.2871 14.9233 24.3758 15.138 24.3758 15.39C24.3758 15.642 24.2871 15.8567 24.1098 16.034C23.9418 16.202 23.7318 16.286 23.4798 16.286C23.2278 16.286 23.0131 16.1973 22.8358 16.02C22.6584 15.8427 22.5698 15.6327 22.5698 15.39C22.5698 15.138 22.6584 14.9233 22.8358 14.746C23.0131 14.5687 23.2278 14.48 23.4798 14.48ZM23.4798 23.944C23.1064 24.0467 22.7378 24.098 22.3738 24.098C21.3564 24.098 20.5398 23.7293 19.9238 22.992C19.4011 22.3573 19.1398 21.5873 19.1398 20.682C19.1398 19.646 19.4758 18.8247 20.1478 18.218C20.7264 17.6673 21.4778 17.392 22.4018 17.392C23.1204 17.392 23.7178 17.5647 24.1938 17.91C24.8844 18.3767 25.2298 19.0673 25.2298 19.982V23.664C25.2298 24.8307 24.8564 25.7313 24.1098 26.366C23.4004 27.0193 22.4484 27.346 21.2538 27.346H19.8678C18.6544 27.346 17.6931 27.024 16.9838 26.38C16.2558 25.7453 15.8918 24.84 15.8918 23.664V22.11L16.7598 21.41H17.5998V23.51C17.5998 24.3873 17.8191 25.0033 18.2578 25.358C18.7058 25.722 19.4711 25.904 20.5538 25.904C21.5151 25.904 22.2011 25.7827 22.6118 25.54C23.1158 25.2413 23.4051 24.7093 23.4798 23.944ZM23.5218 19.982C23.5218 19.646 23.4144 19.3613 23.1998 19.128C22.9758 18.9227 22.7051 18.82 22.3878 18.82C21.9211 18.82 21.5478 18.9833 21.2678 19.31C20.9784 19.646 20.8338 20.1127 20.8338 20.71C20.8338 21.3073 20.9924 21.7833 21.3098 22.138C21.6271 22.4927 22.0518 22.67 22.5838 22.67C22.8824 22.67 23.1951 22.614 23.5218 22.502V19.982Z"
                                        fill="#BF9874" />
                                </svg> --}}
                                    <h1 class="text-center rounded-full p-2 size-9 text-[#BF9874] bg-[#F5F0EA]">
                                        {{ mb_substr($case->title, 0, 1, 'UTF-8') }}</h1>
                                    <span class="text-black mr-2 ">{{ $case->title }}</span>
                                </div>
                                <div class="text-[#9F9E9E] font-bold text-sm">{{ $case->open_date }}</div>
                            </li>
                        @endforeach
                    @else
                        <li class="flex justify-between items-center px-2 py-1 ">
                            <div class="flex items-center mx-auto">
                                <span class="text-black mr-2 ">{{ __("There's no upcomming case yet.") }}</span>
                            </div>
                        </li>

                    @endif

                </ul>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-1 mx-4 my-4">
            <div class="col-span-1 bg-white rounded-lg ">
                <div class="flex justify-between items-center mx-4 my-2 pb-1">
                    <div class="text-black font-bold">نظـرة عامـة على الأربـاح</div>
                    <select id="timeframeSelect" name="timeframeSelect"
                        class="w-28 border text-center ml-2 lg:text-[90%] font-bold text-[#9F9E9E] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        <option value="monthly">شهري</option>
                        <option value="yearly">سنوي</option>
                        <option value="daily">يومي</option>
                    </select>
                </div>
                <hr>
                <div class="flex items-center mx-5 my-4 gap-2">
                    <h1 class="text-[#9F9E9E]">الأرباح الكليّة</h1>
                    <h1 class="text-black font-bold">4200$</h1>
                </div>
                <div class="h-72 w-full pb-3"> <!-- Ensure the container is full width -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <canvas id="profitChart"></canvas>
                    <script>
                        const ctx = document.getElementById('profitChart').getContext('2d');
                        const profitChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Default to monthly
                                datasets: [{
                                    label: 'Monthly Profit',
                                    data: [800, 190, 300, 500, 200, 300, 450, 520, 610, 700, 670, 530],
                                    backgroundColor: '#F6F6F3',
                                    borderColor: '#F6F6F3',
                                    borderWidth: 1,
                                    borderRadius: 6,
                                    borderSkipped: false,
                                    barThickness: 27,
                                    hoverBackgroundColor: '#BF9874',
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        display: false,
                                        beginAtZero: true,
                                        grid: {
                                            display: false
                                        }
                                    },
                                    x: {
                                        grid: {
                                            display: false
                                        },
                                        border: {
                                            display: false
                                        }
                                    }
                                },
                                /* onClick: (e) => {
                                    const activePoints = profitChart.getElementsAtEventForMode(e, 'nearest', {
                                        intersect: true
                                    }, true);
                                    if (activePoints.length > 0) {
                                        const { index } = activePoints[0];
                                        profitChart.data.datasets.forEach((dataset) => {
                                            dataset.backgroundColor = dataset.backgroundColor.map((color, colorIndex) =>
                                                colorIndex === index ? '#A52A2A' : '#F6F6F3');
                                        });
                                        profitChart.update();
                                    }
                                }, */
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return context.dataset.label + ': $' + context.raw;
                                            }
                                        }
                                    }
                                }
                            }
                        });

                        // Listening for changes on the select element
                        document.getElementById('timeframeSelect').addEventListener('change', function() {
                            const timeframe = this.value;
                            if (timeframe === 'daily') {
                                profitChart.data.labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']; // Example for daily
                                profitChart.data.datasets[0].label = 'Daily Profit';
                                profitChart.data.datasets[0].data = [30, 60, 90, 20, 50, 70, 40]; // Example data for daily
                            } else if (timeframe === 'monthly') {
                                profitChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                profitChart.data.datasets[0].label = 'Monthly Profit';
                                profitChart.data.datasets[0].data = [120, 190, 300, 500, 200, 300, 450, 520, 610, 700, 670, 530];
                            } else if (timeframe === 'yearly') {
                                profitChart.data.labels = ['2020', '2021', '2022']; // Example for yearly
                                profitChart.data.datasets[0].label = 'Yearly Profit';
                                profitChart.data.datasets[0].data = [4000, 4500, 5000]; // Example data for yearly
                            }
                            profitChart.update();
                        });
                    </script>

                </div>
            </div>
        </div>

    @endif
</x-app-layout>

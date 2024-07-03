@props(['data'])

@php
    $open = $data['cases']->where('status', 'Open')->count();
    $closed = $data['cases']->where('status', 'Closed')->count();
    $pending = $data['cases']->where('status', 'Pending')->count();

    $today = date('Y-m-d');
    $upcomingCases = $data['cases']->where('open_date', '>=', $today)->sortBy('open_date')->take(7);
@endphp

<div class="grid grid-cols-3 gap-4 mx-4">
    <div class="flex flex-col justify-between gap-3">

        <div class="bg-white rounded-md p-4 flex flex-col justify-center h-1/3">
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


        <div class="bg-white rounded-md p-4 flex flex-col justify-center h-1/3">
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


        <div class="bg-white rounded-md p-4 flex flex-col justify-center h-1/3">
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



    <!-- (Pie Chart) -->
    <div class="col-span-1 bg-white rounded-lg">
        <div class="rounded-lg overflow-hidden">
            <div class="flex justify-between items-center  ">
                <div class="text-black font-bold p-4">أنواع القضايا</div>
                {{-- <select id="case_status" name="case_status"
                    class="w-28 border text-center lg:text-[90%] font-bold text-[#9F9E9E] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    <option value="1">شهري</option>
                    <option value="2">سنوي</option>
                    <option value="3">يومي</option>
                </select> --}}
            </div>
            <hr>
        </div>

        @if ($data['cases']->count())

            <div class="grid grid-cols-2 my-9">
                <div class="p-4">
                    <canvas id="chartPie"></canvas>
                </div>
                <div class="flex justify-center items-center">
                    <!-- This container centers everything inside it -->
                    <div class=" p-4 leading-10 text-center">
                        <ul>
                            @php
                                $allTypes = $data['cases']->pluck('type');
                                $allCasestypes = $allTypes->unique();
                                $totalTypes = $allTypes->count();
                                $pieData = collect();
                                $pieLables = collect();
                                $colors = [
                                    '#3c2815',
                                    '#5a4128',
                                    '#c8c3b9',
                                    '#6e4b23',
                                    '#8c643c',
                                    '#ffffff',
                                    '#553828',
                                    '#785a3c',
                                    '#f0f0eb',
                                ];

                            @endphp
                            @foreach ($allCasestypes as $key => $type)
                                <li class="flex items-center space-x-4 text-black ">
                                    <span class="bg-[{{ $colors[$key % 9] }}] rounded-full w-4 h-4 ml-2"></span>
                                    <span>قضايا {{ $type }}</span>
                                    @php
                                        $typeCount = $allTypes
                                            ->filter(function ($item) use ($type) {
                                                return $item == $type;
                                            })
                                            ->count();
                                        $pieData->push($typeCount);
                                        $pieLables->push($type);

                                    @endphp
                                    <span
                                        class="text-black font-bold">{{ number_format(($typeCount / $totalTypes) * 100, 2) }}%</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const dataPie = {
                        labels: {!! $pieLables->toJson() !!},
                        datasets: [{
                            label: "Number",
                            data: {{ $pieData }},
                            backgroundColor: [
                                "#3c2815",
                                "#5a4128",
                                "#c8c3b9",
                                "#6e4b23",
                                "#8c643c",
                                "#ffffff",
                                "#553828",
                                "#785a3c",
                                "#f0f0eb"
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
        @else
            <li class="flex justify-between items-center px-2 py-1 ">
                <div class="flex justify-center mx-auto mt-3 min-h-60">
                    <span class="text-black mr-2 ">{{ __("There's no Legal Case added yet.") }}</span>
                </div>
            </li>
        @endif
    </div>


    <!-- Third Card -->
    <div class="col-span-1 bg-white rounded-lg ">
        <div class="p-4 text-black font-bold">القضايا القادمة</div>
        <hr>
        <ul class="list-none mx-1 mt-2 ">
            @if ($upcomingCases->count() > 0)
                @foreach ($upcomingCases as $case)
                    <li class="flex justify-between items-center px-2 py-1 ">
                        <a href="{{ route('legalCases.show', $case->id) }}" class="hover:underline">
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
                        </a>
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

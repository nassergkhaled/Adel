        @props(['data'])

        @php
            $open = $data['cases']->where('status', 'Open')->count();
            $closed = $data['cases']->where('status', 'Closed')->count();
            $pending = $data['cases']->where('status', 'Pending')->count();

        @endphp

        <div class=" flex ">
            <div class="grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mx-4 flex flex-col w-[30%]">
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
                        <span class="text-[#9F9E9E]">عدد الموكلين في المكتب </span>
                    </div>
                    <p class="text-xl mr-0 font-bold mt-3 text-black">{{ $data['clientsCount'] }}</p>
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

            <div class="min-h-[456px] mx-4">
                <!-- (Pie Chart) -->
                <div class="col-span-1 h-full bg-white rounded-lg">
                    <div class="rounded-lg overflow-hidden">
                        <div class="flex justify-between items-center  ">
                            <div class="text-black font-bold p-4">أنواع القضايا</div>
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
                                                <span
                                                    class="bg-[{{ $colors[$key % 9] }}] rounded-full w-4 h-4 ml-2"></span>
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
                                                    class="text-black font-bold">{{ ($typeCount / $totalTypes) * 100 }}%</span>
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
            </div>
            <div class="min-h-[456px] w-[25%] mx-4">
                <div class="h-full bg-white rounded-lg">
                    <div class="rounded-lg overflow-hidden">
                        <div class="flex justify-between items-center">
                            <div class="text-black font-bold p-4">الاشعارات</div>
                        </div>
                        <hr>
                    </div>
                    <div id="" class="">
                        <ul tabindex="0" class="" id="managerbellMenu">
                            <li class="text-center text-black mt-5">لا يوجد اشعارات</li>
                        </ul>
                    </div>
                </div>
            </div>
            <script src="{{ asset('js/app.js') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                    fetchMessages();
                });
            
                function fetchMessages() {
                    const id = {{ auth()->id() }};
                    const messagesRef = firebase.database().ref(`notifications/${id}`);
            
                    messagesRef.on('value', function(snapshot) {
                        const messages = snapshot.val();
                        if (messages) {
                            displayManagerNotifications(messages);
                        } else {
                            displayManagerNotifications({});
                        }
                    });
                }
            
                function displayManagerNotifications(messages) {
                    const notificationList = document.getElementById('managerbellMenu');
                    notificationList.innerHTML = ''; // Clear the list
            
                    if (Object.keys(messages).length === 0) {
                        const emptyNotification = `<li class="text-center text-black mt-5">لا يوجد اشعارات</li>`;
                        notificationList.innerHTML = emptyNotification;
                        return;
                    }
            
                    for (const key in messages) {
                        if (Object.prototype.hasOwnProperty.call(messages, key)) {
                            const msgObj = messages[key];
                            const timestamp = new Date(msgObj.timestamp);
                            const date = timestamp.toLocaleDateString();
                            const time = timestamp.toLocaleTimeString();
            
                            const notification = `
                                <li class="hover:bg-adel-Light-hover mx-2 p-2 my-2 text-black rounded-md min-h-20 h-fit cursor-pointer p-2">
                                    <div>
                                        <h1 class="text-lg">${msgObj.title}</h1>
                                        <p class="text-sm">${msgObj.body}</p>
                                        <div class="flex justify-end">
                                            <span class="text-[0.78rem] text-left" dir="ltr">${date} ${time}</span>
                                        </div>
                                    </div>
                                </li>
                            `;
                            const notificationElement = document.createElement('div');
                            notificationElement.innerHTML = notification.trim();
            
                            const firstNotification = notificationList.firstChild;
                            notificationList.insertBefore(notificationElement.firstChild, firstNotification);
                        }
                    }
                }
            </script>
            
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
                <div class="h-72 w-full pb-3">
                    <!-- Ensure the container is full width -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <canvas id="profitChart"></canvas>
                    <script>
                        const ctx = document.getElementById('profitChart').getContext('2d');
                        const profitChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                                    'Dec'
                                ], // Default to monthly
                                datasets: [{
                                    label: 'Monthly Profit',
                                    data: [800, 190, 300, 500, 200, 300, 450, 520, 610, 700, 670, 530],
                                    backgroundColor: [
                                        '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3',
                                        '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3'
                                    ],
                                    borderColor: [
                                        '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3',
                                        '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3', '#bf9874', '#F6F6F3'
                                    ],
                                    borderWidth: 1,
                                    borderRadius: 6,
                                    borderSkipped: false,
                                    barThickness: 27,
                                    hoverBackgroundColor: '#bf9874',
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
                                profitChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                                    'Nov', 'Dec'
                                ];
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

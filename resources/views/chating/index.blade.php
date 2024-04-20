@section('page_name', 'االدردشة')
@section('title', 'الدردشة | ')
<x-app-layout>
    <div class="flex  bg-white rounded-lg m-4">
        <!-- Right Card: User List -->
        <div class="w-1/4 border-l-2 overflow-y-auto">
            <div class="">
                <div class="flex justify-between p-2 mx-3 my-2">
                    <div class="text-black font-bold text-2xl ">الرسائل</div>
                </div>
                <hr>
                <!-- Each User Item -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full mr-2">
                        <div>
                            <h4 class="font-semibold">User Name</h4>
                            <p class="text-sm text-gray-600">Last message preview</p>
                        </div>
                    </div>
                    <span class="text-xs text-gray-500">12min</span>
                </div>
                <!-- Repeat the user item block for each user -->
            </div>
        </div>

        <!-- Left Card: Chat Area -->
        <div class="w-3/4 flex flex-col">
            <div class="flex justify-between p-2 my-2">
                <div class="text-black font-bold text-2xl mr-2 ">علي أحمد</div>
                <div class="flex gap-2 ml-2">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="34" height="34" rx="6" fill="#F5F0EA" />
                        <path
                            d="M22 14.2L27.2133 10.5507C27.4395 10.3924 27.7513 10.4474 27.9096 10.6736C27.9684 10.7576 28 10.8577 28 10.9603V23.0397C28 23.3158 27.7761 23.5397 27.5 23.5397C27.3974 23.5397 27.2973 23.5081 27.2133 23.4493L22 19.8V24C22 24.5523 21.5523 25 21 25H7C6.44772 25 6 24.5523 6 24V10C6 9.44772 6.44772 9 7 9H21C21.5523 9 22 9.44772 22 10V14.2ZM22 17.3587L26 20.1587V13.8413L22 16.6413V17.3587ZM8 11V23H20V11H8Z"
                            fill="#BF9874" />
                    </svg>

                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="34" height="34" rx="6" fill="#F5F0EA" />
                        <path
                            d="M26 21.42V24.9561C26 25.4811 25.5941 25.9167 25.0705 25.9537C24.6331 25.9846 24.2763 26 24 26C15.1634 26 8 18.8366 8 10C8 9.72371 8.01545 9.36687 8.04635 8.9295C8.08337 8.40588 8.51894 8 9.04386 8H12.5801C12.8368 8 13.0518 8.19442 13.0775 8.4498C13.1007 8.67907 13.1222 8.86314 13.1421 9.00202C13.3443 10.4147 13.7575 11.7594 14.3487 13.003C14.4436 13.2026 14.3817 13.4416 14.2018 13.5701L12.0436 15.1118C13.3575 18.1811 15.8189 20.6425 18.8882 21.9565L20.4271 19.8019C20.5572 19.6199 20.799 19.5573 21.001 19.6532C22.2446 20.2439 23.5891 20.6566 25.0016 20.8584C25.1396 20.8782 25.3225 20.8995 25.5502 20.9225C25.8056 20.9483 26 21.1633 26 21.42Z"
                            fill="#BF9874" />
                    </svg>

                </div>
            </div>
            <hr>
            <!-- Chat messages container -->
            <div class="flex-1 p-4 overflow-y-auto">
                <!-- Message Bubble from the other person -->
                <div class="flex items-end justify-start mb-4">
                    <div class="bg-[#BF9874] text-white rounded px-4 py-2">
                        <p>السلام عليكم</p>
                    </div>
                </div>
                <!-- Message Bubble from me -->
                <div class="flex items-end justify-end mb-4">
                    <div class="bg-[#9F9E9E] text-white rounded px-4 py-2">
                        <p>وعليكم السلام </p>
                    </div>
                </div>
                <!-- Repeat message bubbles as needed -->
                <div class="flex items-end justify-start mb-4">
                    <div class="bg-[#BF9874] text-white rounded px-4 py-2">
                        <p>السلام عليكم</p>
                    </div>
                </div>
                <!-- Message Bubble from me -->
                <div class="flex items-end justify-end mb-4">
                    <div class="bg-[#9F9E9E] text-white rounded px-4 py-2">
                        <p>وعليكم السلام </p>
                    </div>
                </div>
                <div class="flex items-end justify-start mb-4">
                    <div class="bg-[#BF9874] text-white rounded px-4 py-2">
                        <p>السلام عليكم</p>
                    </div>
                </div>
                <!-- Message Bubble from me -->
                <div class="flex items-end justify-end mb-4">
                    <div class="bg-[#9F9E9E] text-white rounded px-4 py-2">
                        <p>وعليكم السلام </p>
                    </div>
                </div>
                <div class="flex items-end justify-start mb-4">
                    <div class="bg-[#BF9874] text-white rounded px-4 py-2">
                        <p>السلام عليكم</p>
                    </div>
                </div>
                <!-- Message Bubble from me -->
                <div class="flex items-end justify-end mb-4">
                    <div class="bg-[#9F9E9E] text-white rounded px-4 py-2">
                        <p>وعليكم السلام </p>
                    </div>
                </div>
                <div class="flex items-end justify-start mb-4">
                    <div class="bg-[#BF9874] text-white rounded px-4 py-2">
                        <p>السلام عليكم</p>
                    </div>
                </div>
                <!-- Message Bubble from me -->
                <div class="flex items-end justify-end mb-4">
                    <div class="bg-[#9F9E9E] text-white rounded px-4 py-2">
                        <p>وعليكم السلام </p>
                    </div>
                </div>
            </div>
            <!-- Input area -->
            <div class="p-4">
                <input type="text" placeholder="Type a message..."
                    class="w-full p-2 border rounded focus:outline-none focus:ring">
            </div>
        </div>
    </div>



</x-app-layout>

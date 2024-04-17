<nav class="bg-white shadow-md py-2 w-full">
    <div class="px-5 mx-auto">
        <div class="flex justify-between">
            <!-- Logo and profile on the left -->
            <div class="flex w-[15%]">
                <!-- Logo -->
                <div>
                    <a href="#" class="flex items-start py-2 mr-5">
                        <img src="{{ asset('images\Group.png') }}" alt="Adel Logo"
                            class="flex h-14 filter-none grayscale hover:filter transition duration-200">
                    </a>
                </div>
            </div>
            <div class="flex justify-between w-[85%]">
                <div class=" flex items-center justify-start text-xl font-bold text-black">
                    @yield('page_name')
                </div>
                <div class=" relative flex items-center">
                    <!-- Search bar -->
                    <div class="absolute max-md:hidden inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <div class="max-md:hidden justify-center items-center me-8">
                        <div class="flex rounded-xl items-center">
                            <input type="text" class="bg-gray-100 px-10 py-2 w-60 rounded-xl border-none"
                                placeholder="ابحث">
                        </div>
                    </div>






                    <div class="flex items-center">

                        <div class="avatar w-12">
                            <div class="rounded-full">
                                <img alt="Tailwind CSS Navbar component"
                                    src="{{ asset('/images/profile_avatar.png') }}" />
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-col items-center text-start mb-2 ms-2">
                        <p class="text-start w-full text-[#151D48] font-Almarai">
                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</p>
                        <p class="text-start w-full text-sm text-[#737791]">ادمن</p>
                    </div>

                    <div class="flex items-start top-0 ms-2 justify-start text-start">




                        <div class="dropdown dropdown-hover dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-20 mt-2 rounded-full">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="mt-0 z-[1] p-2 shadow-lg transition ease-in-out duration-200 menu menu-sm dropdown-content border bg-slate-50 text-black rounded-box w-52 ">
                                <li class=" hover:bg-adel-Light-hover rounded-lg">
                                    <a class="justify-between" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                        {{-- <span class="badge">جديد</span> --}}
                                    </a>
                                </li>
                                <li class=" hover:bg-adel-Light-hover rounded-lg"><a>{{ __('Settings') }}</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li class="hover:bg-adel-Light-hover rounded-lg">
                                        <button type="submit">
                                            <a class="font-bold">{{ __('Log Out') }}</a>
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>












                    <div class="ms-5 size-12 bg-[#FFFAF1] rounded-lg flex justify-center items-center">
                        <div class="absolute flex text-red-600 text-7xl me-4 mb-6">∙</div>

                        <i class="text-[#FFA412]  text-3xl fa-regular fa-bell"></i>

                    </div>


                </div>


            </div>
        </div>
    </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li class=" hover:bg-gray-200 rounded-lg"><a href="#"
                    class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
            <li class=" hover:bg-gray-200 rounded-lg"><a href="#services"
                    class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
            <li class=" hover:bg-gray-200 rounded-lg"><a href="#about"
                    class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a>
            </li>
            <li class=" hover:bg-gray-200 rounded-lg"><a href="#contact"
                    class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact
                    Us</a></li>
        </ul>
    </div>
</nav>
<!-- Add your content here -->
<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>

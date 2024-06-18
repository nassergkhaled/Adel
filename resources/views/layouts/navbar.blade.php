<nav class="bg-white shadow-sm py-2 w-full">
    <div class="px-5 mx-auto">
        <div class="flex justify-between">
            <!-- Logo and profile on the left -->
            <div class="flex w-[15%]">
                <!-- Logo -->
                <div>
                    <a href="{{ route('dashboard') }}" class="flex items-start py-2 mr-5">
                        <img src="{{ asset('images\Group.png') }}" alt="Adel Logo"
                            class="flex h-14 filter-none grayscale hover:filter transition duration-200">
                    </a>
                </div>
            </div>
            <div class="flex justify-between w-[85%] items-center">
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
                    {{-- <button @click="darkMode=!darkMode" type="button" class=" py-1 px-3 h-[50%] transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer bg-zinc-200 dark:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-neutral-700 focus:ring-offset-2" role="switch" aria-checked="false">Dark</button> --}}






                    @php
                        $role = auth()->user()->role;
                        if ($role === null) {
                            $role = 'New  User';
                        }

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

                    <div class="flex items-center ms-10">

                        <div class="avatar w-12">
                            <div class="rounded-full">
                                <img alt="Tailwind CSS Navbar component" src="{{ $avatar }}" />
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-col items-center text-start mb-2 ms-2">
                        <p class="text-start w-full text-[#151D48] font-Almarai">
                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</p>

                        <p class="text-start w-full text-sm text-[#737791]">{{ __($role) }}</p>
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


                                <li class="hover:bg-adel-Light-hover rounded-lg">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">
                                            <a class="">{{ __('Log Out') }}</a>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>












                    <div id="bell"
                        class="ms-5 size-12 bg-[#FFFAF1] rounded-lg flex justify-center items-center border border-transparent transition-all ease-in-out duration-200 cursor-pointer hover:border-black">
                        <div class="absolute flex text-red-600 text-7xl me-4 mb-6">∙</div>

                        <i class="text-[#FFA412]  text-3xl fa-regular fa-bell"></i>
                        {{-- <svg viewBox="0 0 24 24" class="text-[#FFA412] size-9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M9.00195 17H5.60636C4.34793 17 3.71872 17 3.58633 16.9023C3.4376 16.7925 3.40126 16.7277 3.38515 16.5436C3.37082 16.3797 3.75646 15.7486 4.52776 14.4866C5.32411 13.1835 6.00031 11.2862 6.00031 8.6C6.00031 7.11479 6.63245 5.69041 7.75766 4.6402C8.88288 3.59 10.409 3 12.0003 3C13.5916 3 15.1177 3.59 16.2429 4.6402C17.3682 5.69041 18.0003 7.11479 18.0003 8.6C18.0003 11.2862 18.6765 13.1835 19.4729 14.4866C20.2441 15.7486 20.6298 16.3797 20.6155 16.5436C20.5994 16.7277 20.563 16.7925 20.4143 16.9023C20.2819 17 19.6527 17 18.3943 17H15.0003M9.00195 17L9.00031 18C9.00031 19.6569 10.3435 21 12.0003 21C13.6572 21 15.0003 19.6569 15.0003 18V17M9.00195 17H15.0003"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg> --}}

                    </div>
                    <div id="bellMenu"
                        class="hidden overflow-scroll no-scrollbar max-h-96 h-72 w-[50%] m-5 absolute end-0 top-16  mt-0 z-[1] p-2 shadow-lg transition ease-in-out duration-200 menu menu-sm dropdown-content border bg-slate-50 text-black rounded-box">
                        <ul tabindex="0" class="">
                            <li class=" hover:bg-adel-Light-hover rounded-md h-20 p-2">
                                Hello

                            </li>
                            <li class=" hover:bg-adel-Light-hover rounded-md h-20 p-2">
                                Hello

                            </li>
                            <li class=" hover:bg-adel-Light-hover rounded-md h-20 p-2">
                                Hello

                            </li>
                            <li class=" hover:bg-adel-Light-hover rounded-md h-20 p-2">
                                Hello

                            </li>
                            <li class=" hover:bg-adel-Light-hover rounded-md h-20 p-2">
                                Hello

                            </li>
                            <li class=" hover:bg-adel-Light-hover rounded-md h-20 p-2">
                                Hello

                            </li>
                            <li class=" hover:bg-adel-Light-hover rounded-md h-20 p-2">
                                Hello

                            </li>
                        </ul>
                    </div>
                    <script>
                        let ntfButton = document.querySelector('#bell');
                        let ntfMenu = document.querySelector('#bellMenu');

                        ntfButton.addEventListener('click', function() {
                            ntfMenu.classList.toggle('hidden');
                        });

                        ntfMenu.addEventListener("mouseleave", function() {
                            ntfMenu.classList.add('hidden');
                        });
                    </script>




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
{{-- <script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script> --}}

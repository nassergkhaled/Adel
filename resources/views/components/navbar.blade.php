<nav class="bg-white py-2 w-full fixed">
    <div class="px-5 mx-auto">
        <div class="flex justify-between py-2">
            <!-- Logo and profile on the left -->
            
            <div class="flex justify-between w-[85%] items-center">
                <div class=" flex items-center justify-start text-xl font-bold text-black">
                    @yield('page_name')
                </div>

                <div class=" relative flex items-center">
                    <!-- Search bar -->
                    @yield('navbarSearchBar')
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
</nav>

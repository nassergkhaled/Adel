<nav class="bg-white shadow-lg py-2">
    <div class="px-5 mx-auto">
        <div class="flex justify-between">
            <!-- Logo and profile on the left -->
            <div class="flex w-[15%]">
                <!-- Logo -->
                <div>
                    <a href="#" class="flex items-start py-2">
                        <img src="{{ asset('images\Group.png') }}" alt="Adel Logo"
                            class="flex h-14 filter-none grayscale hover:filter transition duration-200">
                    </a>
                </div>
            </div>
            <div class="flex justify-between w-[85%]">
                <div class=" flex items-center justify-start text-xl text-black">
                    الرئيسية
                </div>
                <div class="flex items-center">
                    <!-- Search bar -->
                    <div class="justify-center items-center me-8">
                        <div class="flex rounded-xl items-center">
                            <input type="text" class="bg-gray-100 px-4 py-2 w-60 rounded-xl border-none"
                                placeholder="ابحث">
                        </div>
                    </div>



                    <div class="flex">
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-20 mt-1 rounded-full">
                                    <img alt="Tailwind CSS Navbar component"
                                        src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                                <li>
                                    <a class="justify-between">
                                        {{ __('Profile') }}
                                        <span class="badge">جديد</span>
                                    </a>
                                </li>
                                <li><a>{{ __('Settings') }}</a></li>
                                <li><a>{{ __('Logout') }}</a></li>
                            </ul>
                        </div>

                        <div class="flex flex-col items-center text-start ms-2">
                            <p class="text-start w-full text-[#151D48] font-Almarai">علا ابو خضر</p>
                            <p class="text-start w-full text-[#737791]">ادمن</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li><a href="#" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
            <li><a href="#services"
                    class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
            <li><a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a>
            </li>
            <li><a href="#contact" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact
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

@php
    $user = auth()->user();
    $lawyer = $user->lawyer;
    $manager = $user->manager;
@endphp



<nav class="bg-white py-2 w-full fixed z-50 border border-x-0 border-t-0 border-adel-Light-active">
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

                    @if ($user->role !== 'Client')
                        <button type="button" onclick="ocr_scan.showModal()"
                            class=" rounded-full p-2 bg-transparent size-10 flex items-center justify-center border border-adel-Normal hover:bg-adel-Light-active cursor-pointer transition-all duration-100 ease-in-out">
                            <i class="fa-solid fa-file-contract text-xl text-adel-Normal"></i>
                        </button>
                        <x-ocr-dialog />
                    @endif
                    @php
                        $role = $user->role;
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
                                <img alt="avatar" src="{{ $avatar }}" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center text-start mb-2 ms-2">
                        <p class="text-start w-full text-[#151D48] font-Almarai">
                            {{ $user->first_name . ' ' . $user->last_name }}</p>

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
                                    <a class="justify-between w-full" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                        {{-- <span class="badge">جديد</span> --}}
                                    </a>
                                </li>
                                {{-- <li class=" hover:bg-adel-Light-hover rounded-lg"><a>{{ __('Settings') }}</a></li> --}}

                                {{-- Manager / Lawyer Mode --}}
                                @if ($manager)
                                    @if ($lawyer)
                                        @if ($user->role === 'Manager')
                                            <form method="POST" class="w-full"
                                                action="{{ route('switchToLawyerInterface') }}">

                                                <li class="hover:bg-adel-Light-hover rounded-lg">
                                                    @csrf
                                                    <button type="submit" class="w-full">
                                                        {{ __('Switch to Lawyer interface') }}
                                                    </button>
                                                </li>
                                            </form>
                                        @elseif($user->role === 'Lawyer')
                                            <form method="POST" class="w-full"
                                                action="{{ route('switchToManagerInterface') }}">

                                                <li class="hover:bg-adel-Light-hover rounded-lg">
                                                    @csrf
                                                    <button type="submit" class="w-full">
                                                        {{ __('Switch to Manager interface') }}
                                                    </button>
                                                </li>
                                            </form>
                                        @endif
                                    @else
                                        <form method="POST" class="w-full"
                                            action="{{ route('createManagerLawyerAccount') }}">

                                            <li class="hover:bg-adel-Light-hover rounded-lg">
                                                @csrf
                                                <button type="submit" class="w-full">
                                                    {{ __('Activate Lawyer interface') }}
                                                </button>
                                            </li>
                                        </form>
                                    @endif
                                @endif
                                <form method="POST" class="w-full" action="{{ route('logout') }}">

                                    <li class="hover:bg-adel-Light-hover rounded-lg">
                                        @csrf
                                        <button type="submit" class="w-full">
                                            {{ __('Log Out') }}
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div id="bell"
                        class="ms-5 size-12 bg-[#FFFAF1] rounded-lg flex justify-center items-center border border-transparent transition-all ease-in-out duration-200 cursor-pointer hover:border-black">
                        <div class="absolute flex text-red-600 text-7xl me-4 mb-6">∙</div>

                        <i class="text-[#FFA412]  text-3xl fa-regular fa-bell"></i>
                    </div>
                    <div id="bellMenu"
                        class=" hidden overflow-scroll no-scrollbar max-h-96 h-72 min-w-[80%] m-5 absolute end-0 top-16  mt-0 z-[1] p-2 shadow-lg transition ease-in-out duration-200 list-none dropdown-content border bg-slate-50 text-black rounded-box">
                        <ul tabindex="0" class="">
                            <li class="text-center mt-[50%]">لا يوجد اشعارات</li>
                        </ul>
                    </div>
                    <script src="{{ asset('js/app.js') }}"></script>
                    <script>
                        let ntfButton = document.querySelector('#bell');
                        let ntfMenu = document.querySelector('#bellMenu');

                        ntfButton.addEventListener('click', function() {
                            ntfMenu.classList.toggle('hidden');
                        });

                        ntfMenu.addEventListener("mouseleave", function() {
                            ntfMenu.classList.add('hidden');
                        });

                        var firebaseConfig = {
                            apiKey: "your-apiKey",
                            authDomain: "your-authDomain",
                            databaseURL: "{{ env('FIREBASE_DATABASE_URL') }}",
                            projectId: "your-projectId",
                            storageBucket: "your-storageBucket",
                            messagingSenderId: "your-messagingSenderId",
                            appId: "your-appId",
                        };

                        // Initialize Firebase
                        firebase.initializeApp(firebaseConfig);
                        fetchMessages();

                        function fetchMessages() {
                            const id = {{ auth()->id() }};
                            const messagesRef = firebase.database().ref(`notifications/${id}`);

                            // Fetch all messages
                            messagesRef.on('value', function(snapshot) {
                                const messages = snapshot.val();
                                if (messages) {
                                    displayNotifications(messages);
                                    console.log(messages);
                                }
                            });
                        }

                        fetchMessages();

                        // const displayNotifications = (messages) => {
                        //     const notificationList = document.getElementById('bellMenu');
                        //     notificationList.innerHTML = ''; // Clear the list

                        //     for (const key in messages) {
                        //         if (Object.prototype.hasOwnProperty.call(messages, key)) {
                        //             const msgObj = messages[key];
                        //             const notification = document.createElement('li');
                        //             notification.className = 'hover:bg-adel-Light-hover rounded-md h-20 p-2';
                        //             notification.innerHTML = msgObj.msg;
                        //             const firstNotification = notificationList.firstChild;
                        //             notificationList.insertBefore(notification, firstNotification);                                }
                        //     }
                        // }

                        const displayNotifications = (messages) => {
                            const notificationList = document.getElementById('bellMenu');
                            notificationList.innerHTML = ''; // Clear the list

                            for (const key in messages) {
                                if (Object.prototype.hasOwnProperty.call(messages, key)) {
                                    const msgObj = messages[key];
                                    const timestamp = new Date(msgObj.timestamp);
                                    const date = timestamp.toLocaleDateString();
                                    const time = timestamp.toLocaleTimeString();

                                    const notification = `
                                    <li class=" hover:bg-adel-Light-hover rounded-md min-h-20 h-fit cursor-pointer p-2 ">
                                        <div class="">
                                            <h1 class=" text-lg">${msgObj.title}</h1>
                                            <p class=" text-sm">${msgObj.body}</p>
                                            <div class="flex justify-end">
                                                <span class=" text-[0.78rem] text-left" dir="ltr">${date} ${time}</span>
                                            </div>
                                        </div>
                                    </li>
                                    `;
                                    const notificationElement = document.createElement('div');
                                    notificationElement.innerHTML = notification.trim();

                                    // Insert the new notification before the first existing notification
                                    const firstNotification = notificationList.firstChild;
                                    notificationList.insertBefore(notificationElement.firstChild, firstNotification);
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</nav>

@section('page_name', 'االدردشة')
@section('title', 'الدردشة | ')

<x-app-layout>

    @php
        $chatSessions = $data['chatSessions'];
        $clients = $data['clients'];
    @endphp
    <div class="flex antialiased text-gray-800 m-3 ">
        <div class="flex flex-row  h-[80vh] w-full overflow-x-hidden">
            <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0 rounded-md shadow-md">
                <div class="flex flex-row items-center justify-center h-12 w-full mb-4">

                    <div class="ml-2 font-bold text-2xl">الرسائل</div>
                </div>
                <div class="max-md:hidden justify-center items-center me-8">
                    <div class="flex rounded-xl items-center">
                        <input type="search" id="chatSearch"
                            class="bg-gray-100 dark:bg-gray-100 text-black dark:text-black px-5 py-2 w-60 rounded-xl border-none focus:ring-adel-Normal"
                            placeholder="ابحث" onfocus="this.select();">
                    </div>
                    {{-- <div id="chat_results"
                        class="absolute w-[89%] max-w-[14.2rem] mt-[0.1rem] bg-white border ms-1 border-gray-300 rounded-md hidden">
                        <ul class="max-h-60 overflow-auto transition ease-in-out duration-300">
                            <li class="p-2 cursor-pointer transition ease-in-out duration-100 hover:bg-gray-300">000000
                            </li>
                            <li class="p-2 cursor-pointer transition ease-in-out duration-100 hover:bg-gray-300">000000
                            </li>
                            <li class="p-2 cursor-pointer transition ease-in-out duration-100 hover:bg-gray-300">000000
                            </li>
                            <li class="p-2 cursor-pointer transition ease-in-out duration-100 hover:bg-gray-300">000000
                            </li>
                            <li class="p-2 cursor-pointer transition ease-in-out duration-100 hover:bg-gray-300">000000
                            </li>
                        </ul>
                    </div> --}}
                </div>



                <div x-data="{ isOpen: true }"
                    class="flex flex-col  mt-8 transition-all ease-in-out duration-200  min-h-[30%] overflow-hidden">
                    <div @click="isOpen = !isOpen"
                        class="flex flex-row items-center justify-between text-xs cursor-pointer">

                        <div class="flex">
                            <span x-bind:class="{ 'transform rotate-180': isOpen }"
                                class="flex items-center justify-center me-1 text-white h-4 w-4 rounded-full cursor-pointer"
                                id="newChatCount">
                                <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                                    transform="matrix(1, 0, 0, -1, 0, 0)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M8 20.695l7.997-11.39L24 20.695z"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="font-bold">المحادثات النشطة</span>
                        </div>

                        <span class="flex items-center justify-center bg-adel-Dark text-white h-4 w-4 rounded-full"
                            id="oldChatCount">{{ $chatSessions->count() }}</span>
                    </div>
                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-[-2%]"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-[-2%]"
                        class="flex flex-col space-y-1 mt-4 -mx-2 overflow-x-hidden" id='currentChat'>
                        @foreach ($chatSessions as $chatSession)
                            <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 gap-2 chat_item"
                                onclick="openChat(this)" id="{{ $chatSession->id }}">
                                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                    A
                                </div>
                                @php
                                    if ($chatSession->user1_id != auth()->id()) {
                                        $id = $chatSession->user1_id;
                                    } else {
                                        $id = $chatSession->user2_id;
                                    }
                                    $user = \App\Models\User::find($id);

                                @endphp
                                <div class="ml-2 text-sm font-semibold" id="user_name">
                                    {{ $user->first_name . ' ' . $user->last_name }}</div>
                            </button>
                        @endforeach

                        {{-- <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 gap-2">
                            <div class="flex items-center justify-center h-8 w-8 bg-gray-200 rounded-full">
                                M
                            </div>
                            <div class="ml-2 text-sm font-semibold">محمد حمد ال سويدان</div>
                            <div
                                class="flex items-center justify-center ml-auto text-xs text-white bg-red-500 h-4 w-4 rounded leading-none">
                                2
                            </div>
                        </button>
                        <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 gap-2">
                            <div class="flex items-center justify-center h-8 w-8 bg-orange-200 rounded-full">
                                A
                            </div>
                            <div class="ml-2 text-sm font-semibold">علي أحمد</div>
                        </button>
                        <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 gap-2">
                            <div class="flex items-center justify-center h-8 w-8 bg-pink-200 rounded-full">
                                K
                            </div>
                            <div class="ml-2 text-sm font-semibold">خلود ثروت التلهوني</div>
                        </button> --}}
                    </div>

                </div>
                <div x-data="{ isOpen: true }"
                    class="flex flex-col  mt-8 transition-all ease-in-out duration-200 overflow-hidden">
                    <div @click="isOpen = !isOpen"
                        class="flex flex-row items-center justify-between text-xs cursor-pointer">
                        <div class="flex">
                            <span x-bind:class="{ 'transform rotate-180': isOpen }"
                                class="flex items-center justify-center me-1 text-white h-4 w-4 rounded-full cursor-pointer"
                                id="newChatCount">
                                <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                                    transform="matrix(1, 0, 0, -1, 0, 0)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M8 20.695l7.997-11.39L24 20.695z"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="font-bold">محادثة جديدة</span>
                        </div>

                        <span class="flex items-center justify-center bg-adel-Dark text-white h-4 w-4 rounded-full"
                            id="newChatCount">{{ $clients->count() }}</span>

                    </div>
                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-[-2%]"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-[-2%]"
                        class="flex flex-col space-y-1 mt-4 -mx-2 overflow-x-hidden ">
                        @foreach ($clients as $client)
                            <button
                                class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 gap-2 transition-all duration-300 ease-in-out chat_item"
                                onclick="createSession(this)" data-phone="{{ $client->phone_number }}">
                                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                    {{ mb_substr($client->full_name, 0, 1, 'UTF-8') }}
                                </div>
                                <div class="ml-2 text-sm font-semibold" id="user_name">
                                    {{ $client->full_name }}</div>
                            </button>
                        @endforeach
                    </div>

                </div>
            </div>

            <script>
                // const currentSession = @json($chatSessions);
                // const newSession = @json($clients);
                // const all = @json(array_merge($chatSessions->toArray(), $clients->toArray()));
                // console.log(all);
                // const chat_results = document.querySelector("#chat_results");


                const chatSearch = document.querySelector("#chatSearch");
                const chat_items = document.querySelectorAll(".chat_item");

                function search() {
                    chat_items.forEach(item => {
                        const secondDiv = item.querySelector("div:nth-child(2)");
                        let searchString = chatSearch.value.toLowerCase();
                        if (!secondDiv.innerHTML.toLowerCase().includes(searchString)) {
                            item.classList.add('hidden');
                        } else {
                            item.classList.remove('hidden');
                        }
                    });
                }
                chatSearch.addEventListener('input', function() {
                    search();
                });
            </script>

            <div class="flex flex-col flex-auto h-full p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-white shadow-lg h-full p-4">
                    <div class="flex justify-between p-2 my-2">
                        <div class="text-black font-bold text-2xl mr-2 removeHidden" id="chatHeader" hidden></div>
                        <div
                            class="flex items-center justify-center text-black font-bold text-2xl mt-0 w-full removeElement">
                            {{ __('New Chat') }}
                        </div>
                    </div>
                    <hr>
                    <div class="my-1"></div>
                    <div class="flex flex-col h-full overflow-x-auto mb-4 scroll-smooth" id="chatScroll">
                        <div class="flex flex-col h-full">
                            <div
                                class="flex h-full w-full justify-center items-center shadow-md text-adel-Dark removeElement">
                                {{ __('Click on Any Chat to Open it') . ' ...' }}
                            </div>
                            <div class="grid grid-cols-12 gap-y-2" id="chatDev">

                                {{-- <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                    <div class="flex items-center justify-start flex-row-reverse gap-2">

                                        <div
                                            class="relative mr-3 text-sm text-white bg-[#9F9E9E] py-2 px-4 shadow rounded-xl">
                                            <div>
                                                حسناً
                                            </div>
                                            <div class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">
                                                Seen
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-start-1 col-end-8 px-3 rounded-lg">
                                    <div class="flex flex-row items-center gap-2">
                                        <div
                                            class="relative ml-3 text-sm text-white bg-[#BF9874] py-2 px-4 shadow rounded-xl">
                                            <div>
                                                مرحباً أحمد، موعد جلستك القادمة في السابع من أيار الساعة الحادية عشر
                                                صباحاً يرجى الحضور مبكرأ لإخبارك باخر المستجدات قبل موعد الجلسة
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                        {{-- <div class="ml-2">
                            <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                    </path>
                                </svg>
                            </button>
                        </div> --}}

                        <div class="flex-grow ml-4 removeHidden" hidden>
                            <div class="relative w-full">
                                <input type="text" placeholder="اكتب الرسالة" id="messageInput" disabled
                                    class="enableIt flex w-full border rounded-xl bg-[#F9FAFB] focus:outline-none focus:border-indigo-300 ps-4 pe-10 h-10" />
                                <button disabled
                                    class="enableIt absolute flex items-center justify-center h-full w-12 top-0 left-0 text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="ml-4 removeHidden" hidden>


                            <button class="flex  items-center hover:bg-gray-100 rounded-xl enableIt" id="sendButton"
                                disabled>
                                <div
                                    class="flex items-center justify-center h-11 w-11 bg-adel-Normal hover:bg-adel-Dark-hover rounded-full">
                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none"
                                        class="" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 12V7.5L9 6L15 4.5V0L0.75 6L15 12Z" fill="white" />
                                    </svg>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <audio id="messageSound" src="\tap-notification-180637.mp3" preload="auto"></audio>

    <script>
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');

        let session_id = null;
        let firstOpen = false; // to prevent multi class check in every chat open
        scrollToBottom();

        function openChat(chat) {
            session_id = chat.id;

            // console.log(session_id);
            if (!firstOpen) {
                console.log("im in");
                const enableIt = document.querySelectorAll('.enableIt'); // elements to enable after open chat
                const removeHidden = document.querySelectorAll(
                    '.removeHidden'); // elements to make it visable after open chat
                const removeElement = document.querySelectorAll('.removeElement'); // elements to remove it after open chat

                enableIt.forEach(element => {
                    element.removeAttribute('disabled');
                });

                removeHidden.forEach(element => {
                    element.removeAttribute('hidden');
                });

                removeElement.forEach(element => {
                    element.parentNode.removeChild(element);
                });
            }
            document.getElementById('chatDev').innerHTML = "";
            document.getElementById('chatHeader').innerHTML = chat.children[1].innerHTML;

            firstOpen = true;
            fetchMessages(session_id);

        }

        function createSession(client) {

            //to prevent create multi session by multi clicks
            client.removeAttribute('onclick');

            const api_token = "{{ $data['api_token'] }}";
            const client_phone = client.getAttribute('data-phone');
            let newSessioID;
            fetch(`/api/newClientSission`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        token: api_token,
                        phone: client_phone,
                    })
                }).then(response => response.json())
                .then(data => {
                    // console.log(data);
                    newSessioID = data;
                })
                .catch((error) => console.error('Error:', error));
            // console.log(api_token);

            const newChatCount = document.querySelector("#newChatCount");
            const oldChatCount = document.querySelector("#oldChatCount");
            const currentChat = document.querySelector("#currentChat");


            let newClient = client.cloneNode(true);
            newClient.removeAttribute('data-phone');
            newClient.setAttribute('onclick', 'openChat(this)');
            newClient.setAttribute('id', newSessioID);
            currentChat.insertBefore(newClient, currentChat.firstChild);
            openChat(newClient); // to open chat after create a sission



            client.style.opacity = 0;
            oldChatCount.innerHTML = parseInt(oldChatCount.textContent) + 1;
            newChatCount.innerHTML = parseInt(newChatCount.textContent) - 1;
            setTimeout(function() {
                client.parentNode.removeChild(client)
            }, 300);

        }

        document.getElementById('sendButton').addEventListener('click', function() {
            if (session_id)
                sendMessage();
            else
                console.log('open chat first');
        });

        document.getElementById('messageInput').addEventListener('keydown', function(event) {
            if (event.key === "Enter" && !event.shiftKey) { // Prevent sending on Shift+Enter
                event.preventDefault(); // Prevent default Enter behavior (like submitting a form)
                if (session_id)
                    sendMessage();
                else
                    console.log('open chat first');
            }
        });

        function sendMessage() {
            var inputField = document.querySelector('#messageInput');
            var messageText = inputField.value.trim();
            if (messageText) {
                fetch('/api/chat_messages', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            session_id: session_id,
                            sender_id: {{ auth()->id() }},
                            message_type: 'text',
                            message: messageText,
                            created_at: new Date().toISOString(),
                        })
                    })
                    .then(response => response.json())
                    // .then(message => console.log(message))
                    .catch(error => console.error('Error:', error));
                inputField.value = '';

                message = {
                    gg: {
                        content: messageText
                    }
                };
                // displayMessage(message);

            } else {
                console.log('No message to send.');
            }
        }

        function scrollToBottom() {
            var chatDiv = document.getElementById('chatScroll');
            chatDiv.scrollTop = chatDiv.scrollHeight;
        }


        function fetchMessages(session_id) {
            messagesRef = firebase.database().ref('chat_sessions/' + session_id + '/messages');
            messagesRef.on('child_added', function(snapshot) {
                var message = snapshot.val();
                displayMessage(message);
                // console.log("New message received:", message); // Debugging output
            });
        }

        function displayMessage(message) {
            var chatDiv = document.querySelector('#chatDev');
            if (message.sender_id == {{ auth()->id() }}) {
                chatDiv.innerHTML += `<div class="col-start-1 mt-1 col-end-8 px-3 rounded-lg">
                                    <div class="flex flex-row items-center gap-2">
                                        <div
                                            class="relative ml-3 text-sm text-white bg-[#BF9874] py-2 px-4 shadow rounded-xl">
                                            <div>
                                                ${message.content}
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
            } else {
                chatDiv.innerHTML += `<div class="col-start-6 col-end-13 p-3 rounded-lg">
                                    <div class="flex items-center justify-start flex-row-reverse gap-2">

                                        <div
                                            class="relative mr-3 text-sm text-white bg-[#9F9E9E] py-2 px-4 shadow rounded-xl">
                                            <div>
                                                ${message.content}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>`

            }
            // console.log("Message displayed:", message.content); // Debugging output
            scrollToBottom();
        }

        var firebaseConfig = {
            apiKey: "your-apiKey",
            authDomain: "your-authDomain",
            databaseURL: "https://msgs-8c8de-default-rtdb.firebaseio.com/",
            projectId: "your-projectId",
            storageBucket: "your-storageBucket",
            messagingSenderId: "your-messagingSenderId",
            appId: "your-appId",
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // var messagesRef = firebase.database().ref('chat_sessions/' + sission_id + '/messages');
        var audio = document.getElementById('messageSound');
    </script>



</x-app-layout>

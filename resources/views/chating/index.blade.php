@section('page_name', 'االدردشة')
@section('title', 'الدردشة | ')

<x-app-layout>

    <div class="flex antialiased text-gray-800 m-3 ">
        <div class="flex flex-row  h-[80vh] w-full overflow-x-hidden">
            <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0 rounded-md shadow-md">
                <div class="flex flex-row items-center justify-center h-12 w-full mb-4">

                    <div class="ml-2 font-bold text-2xl">الرسائل</div>
                </div>
                <div class="max-md:hidden justify-center items-center me-8">
                    <div class="flex rounded-xl items-center">
                        <input type="text" class="bg-gray-100 px-5 py-2 w-60 rounded-xl border-none" placeholder="ابحث">
                    </div>
                </div>
                <div class="flex flex-col  mt-8">
                    <div class="flex flex-row items-center justify-between text-xs">
                        <span class="font-bold">المحادثات النشطة</span>
                        <span
                            class="flex items-center justify-center bg-adel-Dark text-white h-4 w-4 rounded-full">-</span>
                    </div>
                    <div class="flex flex-col space-y-1 mt-4 -mx-2 h-[50vh] max-sm:[40vh] overflow-x-hidden ">
                        @foreach ($chats as $chat)
                            <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 gap-2"
                                onclick="openChat(this)" id="{{ $chat->id }}">
                                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                    A
                                </div>
                                @php
                                    if ($chat->user1_id != auth()->id()) {
                                        $id = $chat->user1_id;
                                    } else {
                                        $id = $chat->user2_id;
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
            </div>
            <div class="flex flex-col flex-auto h-full p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-white shadow-lg h-full p-4">
                    <div class="flex justify-between p-2 my-2">
                        <div class="text-black font-bold text-2xl mr-2 " id="chatHeader">علي أحمد</div>
                        <div>

                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col h-full overflow-x-auto mb-4 scroll-smooth" id="chatScroll">
                        <div class="flex flex-col h-full">
                            <div class="grid grid-cols-12 gap-y-2" id="chatDev">
                                <div class="col-start-6 col-end-13 p-3 rounded-lg">
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
                                </div>
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

                        <div class="flex-grow ml-4">
                            <div class="relative w-full">
                                <input type="text" placeholder="اكتب الرسالة" id="messageInput"
                                    class="flex w-full border rounded-xl bg-[#F9FAFB] focus:outline-none focus:border-indigo-300 ps-4 pe-10 h-10" />
                                <button
                                    class="absolute flex items-center justify-center h-full w-12 top-0 left-0 text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="ml-4">


                            <button class="flex  items-center hover:bg-gray-100 rounded-xl" id="sendButton">
                                <div
                                    class="flex items-center justify-center h-11 w-11 bg-adel-Normal hover:bg-adel-Dark-hover rounded-full">
                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" class=""
                                        xmlns="http://www.w3.org/2000/svg">
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

        let session_id;
        scrollToBottom();

        function openChat(chat) {
            session_id = chat.id;
            console.log(session_id);
            document.getElementById('chatDev').innerHTML = "";
            document.getElementById('chatHeader').innerHTML = chat.children[1].innerHTML;

            fetchMessages(session_id);

        }

        document.getElementById('sendButton').addEventListener('click', sendMessage);

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
                    .then(message => console.log(message))
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



        // let lastMessageId = null;
        // fetchMessages(sessionId);

        // setInterval(() => {
        //     fetchMessages(sessionId, lastMessageId);
        // }, 100);

        // function fetchMessages(sessionId, lastId) {
        //     let url = `/api/chat_messages/${sessionId}`;
        //     if (lastId) {
        //         url += `?last_id=${lastId}`;
        //     }
        //     fetch(url)
        //         .then(response => response.json())
        //         .then(messages => {
        //             console.log('Messages fetched:', messages);
        //             displayMessage(messages); // Function to display these messages on the page
        //         })
        //         .catch(error => console.error('Error fetching messages:', error));
        // }

        // function displayMessage(messages) {
        //     var chatDiv = document.querySelector('#chatDev');
        //     Object.values(messages).forEach(message => {
        //         chatDiv.innerHTML += `<div class="col-start-1 mt-1 col-end-8 px-3 rounded-lg">
    //                 <div class="flex flex-row items-center gap-2">
    //                     <div class="relative ml-3 text-sm text-white bg-[#BF9874] py-2 px-4 shadow rounded-xl">
    //                         <div>${message.content}</div>
    //                     </div>
    //                 </div>
    //             </div>`;
        //         console.log("Message displayed:", message.content);
        //         lastMessageId = message.id;
        //     });
        //     scrollToBottom();
        // }


        function scrollToBottom() {
            var chatDiv = document.getElementById('chatScroll');
            chatDiv.scrollTop = chatDiv.scrollHeight;
        }





        function fetchMessages(session_id) {
            messagesRef = firebase.database().ref('chat_sessions/' + session_id + '/messages');
            messagesRef.on('child_added', function(snapshot) {
                var message = snapshot.val();
                displayMessage(message);
                console.log("New message received:", message); // Debugging output
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
            console.log("Message displayed:", message.content); // Debugging output
            scrollToBottom();
        }



        // Add event listener to the send button
        document.getElementById('sendButton').addEventListener('click', sendMessage);
        document.getElementById('messageInput').addEventListener('keydown', function(event) {
            if (event.key === "Enter" && !event.shiftKey) { // Prevent sending on Shift+Enter
                event.preventDefault(); // Prevent default Enter behavior (like submitting a form)
                sendMessage(); // Call send message function
            }
        });

        var messagesRef = firebase.database().ref('chat_sessions/' + sission_id + '/messages');
        var audio = document.getElementById('messageSound');
    </script>



</x-app-layout>

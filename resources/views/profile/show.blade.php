@section('page_name', 'الملف الشخصي')
@section('title', 'الملف الشخصي | ')

<x-app-layout>

    <div class="w-full p-3 space-y-5">
        @if (session()->has('msg'))
            <div role="alert"
                class="alert alert-success w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ __(session()->get('msg')) }}</span>
            </div>
        @endif

        <div class="flex justify-end w-full">
            <button type="submit" id="submit_button" onclick="submit_form()"
                class="bg-[#BF9874] text-white px-8 py-2 rounded-md text-lg hover:bg-adel-Dark-hover disabled:bg-adel-Light-active">{{ __('Save') }}</button>

        </div>
        <div class="w-full bg-white rounded-lg h-auto py-3 px-2 flex justify-start items-center">
            <div class="flex">
                <div class="avatar">
                    @php
                        $avatar = Auth::user()->avatar;
                        if ($avatar) {
                            $avatar = '/images/avatars/' . $avatar;
                            if (!file_exists($avatar)) {
                                $avatar = '/images/profile_avatar.png';
                            }
                        } else {
                            $avatar = '/images/profile_avatar.png';
                        }
                    @endphp
                    <div class="w-20 rounded-full border-adel-Normal border-2 ">
                        <img src="{{ $avatar }}" />
                    </div>
                    <button type="button" class="ms-1" onclick="email_image.showModal()">
                        <i
                            class="fa-solid fa-pencil absolute bottom-0 end-0 bg-adel-Normal text-white rounded-full mb-2 p-1"></i>
                    </button>
                </div>

                <div class=" my-auto flex-col ms-2 items-center text-black font-bold">
                    <h1 class="text-3xl">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h1>
                    <h5>{{ auth()->user()->email }}</h5>
                </div>


            </div>


        </div>
        <div class="w-full bg-white rounded-lg h-auto flex flex-col justify-start text-black text-lg">
            <div class="mx-5 my-4">
                <h1 class="text-black text-start font-bold text-xl mb-4">{{ __('Profile Information') }}</h1>
                <form action="{{ route('updateBasicInfo') }}" method="post" id="form">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-flow-col gap-4 my-6">

                        <div class="grid-cols-6">
                            <label for="first_name"
                                class="block text-sm font-medium text-gray-700">{{ __('First name') }}</label>
                            <input type="text" id="first_name" name="first_name"
                                placeholder="ادخل {{ __('First name') }}" value="{{ auth()->user()->first_name }}"
                                class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            @error('first_name')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>
                        <div class="grid-cols-6">
                            <label for="last_name"
                                class="block text-sm font-medium text-gray-700">{{ __('Last name') }}</label>
                            <input type="text" id="last_name" name="last_name"
                                placeholder="ادخل {{ __('Last name') }}"value="{{ auth()->user()->last_name }}"
                                class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            @error('last_name')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-flow-col gap-4 my-6">

                        @php
                            // $role = auth()->user()->roles->first();
                            // switch ($role->role) {
                            //     case 'manager':
                            //         $phone = $role->office->manager->phone_number;
                            //         break;
                            //     case 'client':
                            //         $phone = $role->client->contact_info['phone'];
                            //         break;
                            //     case 'secretary':
                            //         $phone = $role->secretary->contact_info['phone'];
                            //         break;
                            //     case 'lawyer':
                            //         $phone = $role->lawyer->contact_info['phone'];
                            //         break;
                            //     default:
                            //         $phone = "";
                            //         break;
                            // }

                            $phone = Auth::user()->phone_number;
                            $address = Auth::user()->address;
                        @endphp

                        <div class="grid-cols-6">
                            <label for="phone"
                                class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                            <input type="text" inputmode="tel" id="phone" name="phone"
                                placeholder="ادخل {{ __('Phone') }}" value="{{ $phone }}"
                                class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            @error('phone')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>
                        <input type="hidden" value="{{ $phone }}" name="old_phone">
                        <div class="grid-cols-6">
                            <label for="address"
                                class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                            <input type="text" id="address" name="address" placeholder="ادخل {{ __('Address') }}"
                                value="{{ $address }}"
                                class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                            @error('address')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                    </div>
                    <input type="submit" class="hidden" id="btnSubmit">
                </form>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const form = document.getElementById('form');
                        const button = document.getElementById('submit_button');
                        button.disabled = true;

                        const inputs = form.querySelectorAll('input');

                        function enableButton() {
                            button.disabled = false;
                        }

                        inputs.forEach(function(input) {
                            input.addEventListener('input', enableButton);
                        });
                    });

                    function submit_form() {
                        const form = document.getElementById('form');
                        const btnSubmit = document.getElementById('btnSubmit');
                        btnSubmit.click();


                    }
                </script>


                <div class="my-6">
                    <button type="button" onclick="reset_password.showModal()"
                        class="bg-[#BF9874] text-white px-10 py-3 rounded-md text-sm hover:bg-adel-Dark-hover">{{ __('Reset Password') }}</button>
                </div>
            </div>
        </div>

        <style>
            .modal-box {
                width: 91.666667%;
                max-width: 40rem
                    /* 512px */
                ;
            }

            .modal {
                /* align-items: center; */
                margin-left: auto;
                margin-right: auto;

            }
        </style>

        <dialog id="reset_password" class="modal modal-middle sm:modal-middle">
            <div class="modal-box text-black bg-white text-lg">
                <form method="dialog">
                    <button type="submit"
                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
                </form>
                <h3 class="font-bold text-2xl text-center">{{ __('Reset Password') }}</h3>
                <div class="my-5">
                    <hr>
                </div>

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid grid-flow-row gap-y-4">
                        <div>
                            <label for="current_password"
                                class="block text-sm font-medium text-gray-700">{{ __('Current Password') }}
                                <span class="text-red-500">*</span></label>

                            <input type="password" id="current_password" name="current_password"
                                placeholder="{{ __('Current Password') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                            @error('current_password', 'updatePassword')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-700">{{ __('New Password') }}
                                <span class="text-red-500">*</span></label>

                            <input type="password" id="password" name="password"
                                placeholder="{{ __('New Password') }}"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                            @error('password', 'updatePassword')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700">{{ __('Confirm New Password') }}
                                <span class="text-red-500">*</span></label>

                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="{{ __('Confirm New Password') }}"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                            @error('password_confirmation', 'updatePassword')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-action ">

                        <button type="submit"
                            class="w-[30%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Update Password') }}</button>

                    </div>
                </form>
            </div>
        </dialog>



        <dialog id="email_image" class="modal modal-middle sm:modal-middle">
            <div class="modal-box text-black bg-white text-lg">
                <form method="dialog">
                    <button type="submit"
                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
                </form>
                <h3 class="font-bold text-2xl text-center">{{ __('Reset Password') }}</h3>
                <div class="my-5">
                    <hr>
                </div>

                <form action="{{ route('UpdateAvatarEmail') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-flow-row gap-y-4">

                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                                    src="{{ $avatar }}" alt="Current profile photo" />
                            </div>
                            <label class="block ">
                                <span
                                    class="text-white bg-adel-Normal ms-3 py-2 px-4 text-sm transition ease-in-out duration-100 rounded-full hover:bg-adel-Dark-hover">
                                    اختار صورة جديدة
                                </span>
                                <input type="file" onchange="loadFile(event)" name="Avatar"
                                    accept="image/png, image/gif, image/jpeg, image/jpg, image/svg"
                                    class=" w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4 hidden
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-adel-Normal file:text-white
                              hover:file:bg-adel-Dark-hover
                              file:transition file:ease-in-out file:duration-100
                            " />
                            </label>
                            @error('Avatar')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>


                        <script>
                            var loadFile = function(event) {
                                var input = event.target;
                                var file = input.files[0];
                                var type = file.type;
                                var output = document.getElementById('preview_img');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                }
                            };
                        </script>



                        <div>
                            <label for="Email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}
                                <span class="text-red-500">*</span></label>

                            <input type="text" id="Email" name="Email" inputmode="email"
                                placeholder="{{ __('Email') }}" value="{{ Auth::user()->email }}"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                            @error('Email')
                                <p class="text-sm text-red-500">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-action ">

                        <button type="submit"
                            class="w-[30%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Save') }}</button>

                    </div>
                </form>
            </div>
        </dialog>








    </div>
</x-app-layout>

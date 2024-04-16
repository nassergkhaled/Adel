@extends('test')
@section('content')
    <div class="w-full p-3 space-y-5">
        <div class="flex justify-end w-full">
            <button type="button"
                class="bg-[#BF9874] text-white px-8 py-2 rounded-md text-lg hover:bg-adel-Dark-hover">{{ __('Save') }}</button>

        </div>
        <div class="w-full bg-white rounded-lg h-auto py-3 px-2 flex justify-start items-center">
            <div class="flex">
                <div class="avatar">
                    <div class="w-20 rounded-full">
                        <img src="{{ asset('/images/profile_avatar.png') }}" />
                    </div>
                </div>

                <div class=" my-auto flex-col ms-2 items-center text-black font-bold">
                    <h1 class="text-3xl">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h1>
                    <h5>{{ auth()->user()->email }}</h5>
                </div>


            </div>


        </div>
        <div class="w-full bg-white rounded-lg h-auto flex flex-col justify-start">
            <div class="mx-5 my-4">
                <h1 class="text-black text-start font-bold text-xl mb-4">{{ __('Profile Information') }}</h1>

                <div class="grid grid-flow-col gap-4 my-6">

                    <div class="grid-cols-6">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">{{ __('First name') }}</label>
                        <input type="text" id="first_name" name="first_name" placeholder="ادخل {{ __('First name') }}"
                            class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    </div>
                    <div class="grid-cols-6">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">{{ __('Last name') }}</label>
                        <input type="text" id="last_name" name="last_name" placeholder="ادخل {{ __('Last name') }}"
                            class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    </div>

                </div>
                <div class="grid grid-flow-col gap-4 my-6">

                    <div class="grid-cols-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                        <input type="text" inputmode="tel" id="phone" name="phone" placeholder="ادخل {{ __('Phone') }}"
                            class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    </div>
                    <div class="grid-cols-6">
                        <label for="address" class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                        <input type="text" id="address" name="address" placeholder="ادخل {{ __('Address') }}"
                            class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    </div>

                </div>
                <div class="my-6">
                    <button type="button"
                class="bg-[#BF9874] text-white px-10 py-3 rounded-md text-sm hover:bg-adel-Dark-hover">{{ __('Reset Password') }}</button>
                </div>
            </div>
        </div>











    </div>
@endsection

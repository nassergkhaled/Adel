@section('title', 'Register | ')


<x-guest-layout>

    <!-- Right Pane -->
    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center font-Almarai">
        <div class="md:w-[80%] sm:w-full max-h-full lg:w-[60%] p-6">
            <div class="w-full justify-center items-center flex mb-10">
                <a href="/">
                    <x-application-logo />
                </a>
            </div>
            <h1 class="text-2xl font-bold font-Almarai mb-6 text-black text-center">{{ __('Register') }}</h1>
            <h1 class=" mb-10 text-[#B4B4B4] text-center">أدخل المعلومات التالية لانشاء حساب خاص بك</h1>

            <form form method="POST" action="{{ route('register') }}" class="space-y-4 max"
                dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                @csrf
                <div class="grid grid-rows-1 grid-flow-col gap-x-2">
                    <div>
                        <label for="first_name"
                            class="block text-sm font-medium text-gray-700">{{ __('First name') }}</label>
                        <input type="text" id="first_name" name="first_name" placeholder="{{ __('First name') }}"
                            value="{{ old('first_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('first_name')
                            <p class="text-sm text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name"
                            class="block text-sm font-medium text-gray-700">{{ __('Last name') }}</label>
                        <input type="text" id="last_name" name="last_name" placeholder="{{ __('Last name') }}"
                            value="{{ old('last_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('last_name')
                            <p class="text-sm text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="text" id="email" name="email" placeholder="{{ __('Email') }}"
                        value="{{ old('email') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('email')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                    @error('password')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="{{ __('Confirm Password') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('password_confirmation')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="agree" name="agree"
                        class="rounded border-gray-300 dark:border-[#433529] text-[#BF9874] shadow-sm focus:ring-[#BF9874]">
                    <label for="agree" class="ml-2 block text-sm text-gray-900"> &nbsp
                        {{ __('I agree to') }} <a href="#"
                            class="text-[#BF9874] hover:underline">{{ __('The terms and conditions') }}</a></label>
                </div>

                <div class="flex justify-center items-center gap-x-3">

                    <button type="submit"
                        class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Register') }}</button>
                    <a href="{{ url('auth/google') }}"
                        class="hover:bg-adel-Light-active rounded-full transition-all duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                            viewBox="0 0 48 48" class="p-1 ">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                            </path>
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                            </path>
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                        </svg></a>
                </div>
            </form>
            <div class="mt-4 text-sm text-gray-600 text-center">
                <p>{{ __('Already registered?') }} <a href="{{ route('login') }}"
                        class="text-[#BF9874] hover:underline">{{ __('Log in') }} </a></p>
            </div>
        </div>
    </div>

    <div class="sm:hidden lg:flex items-center justify-center flex-1 bg-white text-black">
        <div class="w-full h-full text-center overflow-hidden">
            <x-register-image />
        </div>
    </div>
</x-guest-layout>

@section('title', 'Login | ')

<x-guest-layout>
    <!-- Right Pane -->
    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center font-Almarai">
        <div class="md:w-[80%] sm:w-full max-h-full lg:w-[60%] p-6">
            <div class="w-full justify-center items-center flex mb-10">
                <a href="/">
                    <x-application-logo />
                </a>
            </div>
            <h1 class="text-xl font-bold font-Almarai mb-6 text-black text-center">تسجيل الدخول الى حسابك</h1>
            <h1 class=" mb-10 text-sm text-[#B4B4B4] text-center">أدخل بريدك الإلكتروني وكلمة المرور للوصول إلى حسابك
            </h1>


            <form form method="POST" action="{{ route('login') }}" class="space-y-4"
                dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                @csrf

                <div>
                    <label for="email"
                        class=" mb-2 block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="text" id="email" name="email" placeholder="ادخل {{ __('Email') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                <div>
                    <label for="password"
                        class="mb-2 block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                <div class="flex justify-between">
                    @if (Route::has('password.request'))
                        <div class="">
                            <a class=" text-sm text-[#333333]  hover:text-[#BF9874] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif

                    <div class="end-0">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 dark:border-[#433529] text-[#BF9874] shadow-sm focus:ring-[#BF9874]"
                                name="remember">
                            <span class="ms-2 text-sm text-[#433529] ">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-x-3">
                    <button type="submit"
                        class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-gray-800 focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Log in') }}</button>
                    <a href="{{ url('auth/google') }}" class="hover:bg-adel-Light-active rounded-full transition-all duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="40" height="40" viewBox="0 0 48 48" class="p-1 ">
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
            <div class="mt-4 text-sm text-[#433529] text-center">
                <p>ليس لديك حساب ؟ <a href="{{ route('register') }}"
                        class="text-[#BF9874] hover:underline">{{ __('Register') }} </a>
                </p>
            </div>
        </div>
    </div>

    <div class="sm:hidden lg:flex items-center justify-center flex-1 bg-white text-black">
        <div class="w-full h-full text-center overflow-hidden">
            <x-login-image />
        </div>
    </div>
</x-guest-layout>

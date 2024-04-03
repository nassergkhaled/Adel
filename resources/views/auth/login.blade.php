<x-guest-layout>
    <!-- Right Pane -->
    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center font-Almarai">
        <div class="md:w-[80%] sm:w-full max-h-full lg:w-[60%] p-6">
            <div class="w-full justify-center items-center flex mb-10">
                <a href="/">
                    <x-application-logo/>
                </a>
            </div>
            <h1 class="text-xl font-bold font-Almarai mb-6 text-black text-center">تسجيل الدخول الى حسابك</h1>
            <h1 class=" mb-10 text-sm text-[#B4B4B4] text-center">أدخل بريدك الإلكتروني وكلمة المرور للوصول إلى حسابك
            </h1>


            @error('email')
            {{$message}}
            @enderror 
            @error('password')
            {{$message}}
            @enderror
            <form form method="POST" action="{{ route('login') }}" class="space-y-4"
                dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                @csrf

                <div>
                    <label for="email"
                        class=" mb-2 block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="text" id="email" name="email" placeholder="ادخل {{ __('Email') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div>
                    <label for="password"
                        class="mb-2 block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
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
                                class="rounded border-gray-300 dark:border-gray-700 text-[#BF9874] shadow-sm focus:ring-[#BF9874]"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600 ">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>
                    <button type="submit"
                        class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-gray-800 focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Log in') }}</button>
                
            </form>
            <div class="mt-4 text-sm text-gray-600 text-center">
                <p>ليس لديك حساب ؟ <a href="{{ route('register') }}" class="text-[#BF9874] hover:underline">{{ __('Register') }} </a>
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

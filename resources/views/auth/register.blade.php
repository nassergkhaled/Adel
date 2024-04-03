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

            {{-- @error('first_name')
                {{ $message }}
            @enderror
            @error('last_name')
                {{ $message }}
            @enderror
            @error('email')
                {{ $message }}
            @enderror
            @error('password')
                {{ $message }}
            @enderror --}}
            <form form method="POST" action="{{ route('register') }}" class="space-y-4"
                dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                @csrf
                <div>
                    <label for="first_name"
                        class="block text-sm font-medium text-gray-700">{{ __('First name') }}</label>
                    <input type="text" id="first_name" name="first_name" placeholder="{{ __('First name') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">{{ __('Last name') }}</label>
                    <input type="text" id="last_name" name="last_name" placeholder="{{ __('Last name') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="text" id="email" name="email" placeholder="{{ __('Email') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="agree" name="agree"
                        class="h-4 w-4 text-gray-700 focus:ring-gray-300 border-gray-300 rounded transition duration-300">
                    <label for="agree" class="ml-2 block text-sm text-gray-900"> &nbsp
                        {{ __('I agree to the terms and conditions') }}</label>
                </div>

                <div>
                    <button type="button" onclick="my_modal_5.showModal()"
                        class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-gray-800 focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Register') }}</button>
                </div>
                <!-- Open the modal using ID.showModal() method -->
                <dialog id="my_modal_5" class="modal modal-middle sm:modal-middle">
                    <div class="modal-box bg-white" dir="rtl">
                        <form method="dialog" dir="rtl">
                            <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
                          </form>
                        <h3 class="font-bold text-lg ms-5">{{ __('Confirm Password') }}</h3>
                        <p class="py-4">يرجى تأكيد كلمة المرور لتسجيل مستخدم جديد</p>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="{{ __('Confirm Password') }}"
                                class="mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        </div>
                        <div class="modal-action">
                            
                                <button type="submit" class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-gray-800 focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Register') }}</button>
                            
                        </div>
                    </div>
                </dialog>


                
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

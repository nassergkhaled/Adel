@section('title','Office Registration  | ')

<x-guest-layout>
    <!-- Right Pane -->
    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center font-Almarai">
        <div class="md:w-[80%] sm:w-full max-h-full lg:w-[50%] p-6">
            <div class="w-full justify-center items-center flex mb-5">
                <a href="/">
                    <x-application-logo />
                </a>
            </div>
            <h1 class="text-2xl font-bold font-Almarai mb-6 text-black text-center">{{ __('Office subscription') }}</h1>
            <h1 class=" mb-10 text-[#B4B4B4] text-center">أدخل المعلومات التالية لانشاء حساب خاص في مكتبك</h1>

            <form form method="POST" action="{{ route('newOffice') }}" class="space-y-4 max"
                dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                @csrf
                {{-- Office Name field --}}
                    <div>
                        <label for="office_name"
                            class="block text-md mb-2 text-black">{{ __('Office name') }}</label>
                        <input type="text" id="office_name" name="office_name" placeholder="{{ __('Office name') }}"
                            value="{{ old('office_name') }}"
                            class="mt-1 p-2 w-full border lg:text-[85%] rounded-md placeholder-[#B4B4B4] border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        @error('office_name')
                            <p class="text-sm text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>
                    {{-- End of Office Name field --}}


                    {{-- Office Location field --}}
                <div>
                    <label for="location" class="block text-md mb-2 text-black">{{ __('office location') }}</label>
                    <input type="text" id="location" name="location" placeholder="{{ __('office location') }}"
                        value="{{ old('location') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md placeholder-[#B4B4B4] border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('location')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office Location field --}}


                    {{-- Office phone number field --}}
                <div>
                    <label for="office_phone" class="block text-md mb-2 text-black">{{ __('Office phone number') }}</label>
                    <input type="text" id="office_phone" name="office_phone" placeholder="{{ __('Office phone number') }}"
                        value="{{ old('Office phone number') }}" inputmode="tel"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md placeholder-[#B4B4B4] border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('office_phone')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office phone number field --}}

                {{-- Office Manager name field --}}
                <div>
                    <label for="manager_name" class="block text-md mb-2 text-black">{{ __('Manager name') }}</label>
                    <input type="text" id="manager_name" name="manager_name" placeholder="{{ __('Manager name') }}"
                        value="{{ old('Manager name') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md placeholder-[#B4B4B4] border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('manager_name')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office Manager name field --}}

                {{-- Office Manager name field --}}
                <div>
                    <label for="manager_phone" class="block text-md mb-2 text-black">{{ __('Phone') }}</label>
                    <input type="text" id="manager_phone" name="manager_phone" placeholder="059-772-950"
                        value="{{ old('Phone') }}"
                        class="placeholder-[#B4B4B4] mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('manager_phone')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office Manager name field --}}

                {{-- Office Manager ID number field --}}
                <div>
                    <label for="manager_id" class="block text-md mb-2 text-black">{{ __('ID number') }}</label>
                    <input type="text" id="manager_id" name="manager_id" placeholder="{{ __('ID number') }}"
                        value="{{ old('ID number') }}"
                        class="placeholder-[#B4B4B4] mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('manager_id')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office ID number field --}}


                <div>
                    <button type="submit"
                        class="w-full mt-2 bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Subscribe') }}</button>
                </div>
            </form>

           
        </div>
    </div>

    <div class="sm:hidden lg:flex items-center justify-center flex-1 bg-white text-black">
        <div class="w-full h-full text-center overflow-hidden">
            <x-office-subscription />
        </div>
    </div>
</x-guest-layout>

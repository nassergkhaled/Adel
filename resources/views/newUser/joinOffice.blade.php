@section('title', 'Office Registration | ')

<x-guest-layout>
    <!-- Right Pane -->
    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center font-Almarai">
        <div class="md:w-[80%] sm:w-full max-h-full lg:w-[50%] p-6">
            <div class="w-full justify-center items-center flex mb-5">
                <a href="/">
                    <x-application-logo />
                </a>
            </div>
            <h1 class="text-2xl font-bold font-Almarai mb-6 text-black text-center">{{ __('Join an office') }}</h1>
            <h1 class=" mb-10 text-[#B4B4B4] text-center">أدخل المعلومات التالية للإنضمام لمكتب محاماة</h1>

            <form form method="POST" action="{{ route('joinOfficeX') }}" class="space-y-4 max"
                dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                @csrf
                {{-- join code field --}}
                <div>
                    <label for="join_code" class="block text-md mb-2 text-black">{{ __('Join code') }}</label>
                    <input type="text" id="join_code" name="join_code" placeholder="{{ __('Join code') }}"
                        value="{{ old('join_code') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md placeholder-[#B4B4B4] border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('join_code')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of join code field --}}


                {{-- User type field --}}
                <div>
                    <label for="user_type" class="block text-md mb-2 text-black">{{ __('User type') }}</label>
                    <select type="text" id="user_type" name="user_type"
                        value="{{ old('office_location') }}" onclick="returnColor(this)"
                        class="mt-1 text-gray-400 p-2 w-full border lg:text-[85%] rounded-md placeholder-[#B4B4B4] border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                        <option selected disabled>{{ __('User type') }}</option>
                        <option value="Lawyer">{{ __('Lawyer') }}</option>
                        <option value="Secretary">{{ __('Secretary') }}</option>
                    </select>
                    <script>
                        function returnColor(select)
                        {
                            select.classList.remove('text-gray-400');
                            select.classList.add('text-black');
                        }
                    </script>
                    @error('user_type')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of User type field --}}


                {{-- Office phone number field --}}
                <div>
                    <label for="full_name" class="block text-md mb-2 text-black">{{ __('Full name') }}</label>
                    <input type="text" id="full_name" name="full_name" placeholder="{{ __('Full name') }}"
                        value="{{ old('Office phone number') }}"
                        class="mt-1 p-2 w-full border lg:text-[85%] rounded-md placeholder-[#B4B4B4] border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('full_name')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office phone number field --}}

                {{-- Office Manager name field --}}
                <div>
                    <label for="user_phone" class="block text-md mb-2 text-black">{{ __('Phone') }}</label>
                    <input type="text" id="user_phone" name="user_phone" placeholder="059-772-950"
                        value="{{ old('Phone') }}"
                        class="placeholder-[#B4B4B4] mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('user_phone')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office Manager name field --}}

                {{-- Office Manager ID number field --}}
                <div>
                    <label for="user_id_num" class="block text-md mb-2 text-black">{{ __('ID number') }}</label>
                    <input type="text" id="user_id_num" name="user_id_num" placeholder="{{ __('ID number') }}"
                        value="{{ old('ID number') }}"
                        class="placeholder-[#B4B4B4] mt-1 p-2 w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @error('user_id_num')
                        <p class="text-sm text-red-500">
                            * {{ __($message) }}
                        </p>
                    @enderror
                </div>
                {{-- End of Office ID number field --}}


                <div>
                    <button type="submit"
                        class="w-full mt-2 font-bold  bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">{{ __('Join office') }}</button>
                </div>
            </form>
            <div class="mt-4 text-sm text-gray-600 text-center">
                <p>{{ __("Don't work in an office?") }}&nbsp; <a href="{{ route('createOffice') }}"
                        class="text-[#BF9874] hover:underline">{{ __('Create a new office') }} </a></p>
            </div>
        </div>
    </div>

    <div class="sm:hidden lg:flex items-center justify-center flex-1 bg-white text-black">
        <div class="w-full h-full text-center overflow-hidden">
            <x-office-join />
        </div>
    </div>
</x-guest-layout>

@php
    $mainClass =
        'mt-1 p-2 w-full border lg:text-[75%] rounded-md focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300';
    if ($state == 'start') {
        $inputClass = $mainClass . ' border-[#E1E1E1]';
    } elseif ($witness === false) {
        $inputClass = $mainClass . ' border-red-500';
    } else {
        $inputClass = $mainClass . ' border-green-500';
    }
@endphp

<div>
    <div class="mx-5 my-1">
        <div class="grid grid-flow-col gap-x-2">
            <div class="col-span-10">
                <label for="witness_id_number" class="block text-sm font-medium text-gray-700">رقم
                    الهوية<span class="text-red-600 mr-1 text-lg">*</span></label>
                <input type="search" id="witness_id_number" wire:model="Witness_id_number" required
                    placeholder="ادخل رقم الهوية" value="{{ old('witness_id_number') }}" inputmode="numeric"
                    class="{{ $inputClass }}">
                @error('witness_id_number')
                    <p class="text-sm text-red-500">
                        * {{ __($message) }}
                    </p>
                @enderror
            </div>
            <div class="col-span-2 flex items-end">
                <button type="button" wire:click="existWitness"
                    class=" w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">فحص</button>

            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="flex justify-center items-center w-full">
        <span wire:loading class="loading loading-spinner loading-lg m-5 text-adel-Normal"></span>
    </div>
    @if ($state !== 'start')
        @if ($witness)
            <br>
            <form action="{{ route('witnesses.storeById',$witness->ID_no) }}" method="POST">
                @csrf
                <input type="hidden" name="case_id" value="{{ $case->id }}">
                <div class="grid grid-flow-row gap-y-5">

                    <div class="grid grid-flow-col gap-x-1">
                        <div class="flex justify-center items-center row-span-1 col-span-4">
                            <label for="session_id" class="text-sm font-medium text-gray-700">{{ __('الجلسة') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('session_id')
                            <p class="text-sm text-center text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11 w-full col-span-8">
                            <select type="text" id="session_id" name="session_id" value="{{ old('session_id') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                <option value="" selected>لا يوجد</option>

                                @foreach ($case->sessions as $session)
                                    <option value="{{ $session->id }}">{{ $session->session_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <hr>


                    <div class="grid grid-flow-col gap-x-1">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="witness_name" class="text-sm font-medium text-gray-700">{{ __('اسم الشاهد') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('witness_name')
                            <p class="text-sm text-center text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input id="witness_name" value="{{ $witness->full_name }}" disabled
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>

                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="id_number" class="text-sm font-medium text-gray-700">{{ __('رقم الهوية') }}
                                <span class="text-red-500">*</span></label>
                        </div>

                        <div class=" row-span-11">
                            <input id="id_number" value="{{ $witness->ID_no }}" disabled name="id_number"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">


                        </div>

                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="phone" class="text-sm font-medium text-gray-700">{{ __('رقم الهاتف') }}
                                <span class="text-red-500">*</span></label>

                        </div>
                        <div class=" row-span-11">
                            <input id="phone"
                                value="{{ data_get(json_decode($witness->contact_info), 'phone', 'N/A') }}" disabled
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="address" class="text-sm font-medium text-gray-700">{{ __('العنوان') }}
                                <span class="text-red-500">*</span></label>
                        </div>

                        <div class=" row-span-11">
                            <input id="address"
                                value="{{ data_get(json_decode($witness->contact_info), 'address', 'N/A') }}" disabled
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>
                    <hr class="my-1">

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="relationship" class="text-sm font-medium text-gray-700">{{ __('العلاقة') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('relationship')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="relationship" name="relationship"
                                placeholder="{{ __('العلاقة') }}" value="{{ old('relationship') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="oath_availability"
                                class="text-sm font-medium text-gray-700">{{ __('امكانية الحنث باليمين') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('oath_availability')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11 grid grid-flow-col">
                            <div>
                                <input type="radio" name="oath_availability" id="1" value="1"
                                    class="peer hidden" @checked(old('oath_availability') === '1') />
                                <label for="1"
                                    class=" cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-adel-Normal peer-checked:font-bold peer-checked:text-white w-full border-adel-Light-hover transition-all ease-in-out duration-100 hover:bg-adel-Light-hover px-8 border">نعم</label>
                            </div>
                            <div>
                                <input type="radio" name="oath_availability" id="2" value="0"
                                    class="peer hidden" @checked(old('oath_availability') === '0') />
                                <label for="2"
                                    class=" cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-adel-Normal peer-checked:font-bold peer-checked:text-white w-full border-adel-Light-hover transition-all ease-in-out duration-100 hover:bg-adel-Light-hover px-8 border">لا</label>
                            </div>
                        </div>
                    </div>


                    <div class="modal-action ">

                        <button type="submit"
                            class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-border-adel-Normal transition-colors duration-300">{{ __('Add') }}</button>

                    </div>
                </div>
            </form>
        @else
            <br>
            <form action="{{ route('witnesses.store') }}" method="POST">
                @csrf
                <input type="hidden" name="case_id" value="{{ $case->id }}">
                <div class="grid grid-flow-row gap-y-5">

                    <div class="grid grid-flow-col gap-x-1">
                        <div class="flex justify-center items-center row-span-1 col-span-4">
                            <label for="session_id" class="text-sm font-medium text-gray-700">{{ __('الجلسة') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('session_id')
                            <p class="text-sm text-center text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11 w-full col-span-8">
                            <select type="text" id="session_id" name="session_id"
                                value="{{ old('session_id') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                <option value="" selected>لا يوجد</option>

                                @foreach ($case->sessions as $session)
                                    <option value="{{ $session->id }}">{{ $session->session_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <hr>


                    <div class="grid grid-flow-col gap-x-1">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="witness_name"
                                class="text-sm font-medium text-gray-700">{{ __('اسم الشاهد') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('witness_name')
                            <p class="text-sm text-center text-red-500">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="witness_name" name="witness_name"
                                placeholder="{{ __('اسم الشاهد') }}" value="{{ old('witness_name') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>

                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="id_number" class="text-sm font-medium text-gray-700">{{ __('رقم الهوية') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('id_number')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="id_number" name="id_number" inputmode="numeric" value="{{$Witness_id_number}}"
                                placeholder="{{ __('رقم الهوية') }}" value="{{ old('id_number') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>

                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="phone" class="text-sm font-medium text-gray-700">{{ __('رقم الهاتف') }}
                                <span class="text-red-500">*</span></label>

                        </div>
                        @error('phone')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="tel" id="phone" name="phone" inputmode="tel" dir="rtl"
                                placeholder="{{ __('رقم الهاتف') }}" value="{{ old('phone') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="address" class="text-sm font-medium text-gray-700">{{ __('العنوان') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('address')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="address" name="address" placeholder="{{ __('العنوان') }}"
                                value="{{ old('address') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="relationship" class="text-sm font-medium text-gray-700">{{ __('العلاقة') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('relationship')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11">
                            <input type="text" id="relationship" name="relationship"
                                placeholder="{{ __('العلاقة') }}" value="{{ old('relationship') }}"
                                class="w-full border lg:text-[85%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                        </div>
                    </div>

                    <div class="grid grid-flow-col gap-x-2">
                        <div class="flex justify-center items-center row-span-1">
                            <label for="oath_availability"
                                class="text-sm font-medium text-gray-700">{{ __('امكانية الحنث باليمين') }}
                                <span class="text-red-500">*</span></label>
                        </div>
                        @error('oath_availability')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                        <div class=" row-span-11 grid grid-flow-col">
                            <div>
                                <input type="radio" name="oath_availability" id="1" value="1"
                                    class="peer hidden" @checked(old('oath_availability') === '1') />
                                <label for="1"
                                    class=" cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-adel-Normal peer-checked:font-bold peer-checked:text-white w-full border-adel-Light-hover transition-all ease-in-out duration-100 hover:bg-adel-Light-hover px-8 border">نعم</label>
                            </div>
                            <div>
                                <input type="radio" name="oath_availability" id="2" value="0"
                                    class="peer hidden" @checked(old('oath_availability') === '0') />
                                <label for="2"
                                    class=" cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-adel-Normal peer-checked:font-bold peer-checked:text-white w-full border-adel-Light-hover transition-all ease-in-out duration-100 hover:bg-adel-Light-hover px-8 border">لا</label>
                            </div>
                        </div>
                    </div>


                    <div class="modal-action ">

                        <button type="submit"
                            class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adel-border-adel-Normal transition-colors duration-300">{{ __('Add') }}</button>

                    </div>
                </div>
            </form>
        @endif

    @endif

</div>

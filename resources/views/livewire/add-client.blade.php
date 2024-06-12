@php
    $mainClass =
        'mt-1 p-2 w-full border lg:text-[75%] rounded-md focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300';
    if ($client == 'start') {
        $inputClass = $mainClass . ' border-[#E1E1E1]';
    } elseif ($client === false) {
        $inputClass = $mainClass . ' border-red-500';
    } else {
        $inputClass = $mainClass . ' border-green-500';
    }
@endphp


<div>
    <div class="mx-5 my-1">
        <div class="grid grid-flow-col gap-x-2">
            <div class="col-span-10">
                <label for="client_id_num" class="block text-sm font-medium text-gray-700">رقم
                    الهوية<span class="text-red-600 mr-1 text-lg">*</span></label>
                <input type="search" id="client_id_num" wire:model="clientId" required placeholder="ادخل رقم الهوية"
                    value="{{ old('client_id_num') }}" inputmode="numeric" class="{{ $inputClass }}">
                @error('client_id_num')
                    <p class="text-sm text-red-500">
                        * {{ __($message) }}
                    </p>
                @enderror
            </div>
            <div class="col-span-2 flex items-end">
                <button type="button" wire:click="existClient" onclick="loading"
                    class=" w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">فحص</button>

            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="flex justify-center items-center w-full">
        <span wire:loading class="loading loading-spinner loading-lg m-5 text-adel-Normal"></span>
    </div>
    @if ($client !== 'start')

        @if ($client === false)
            <form action="{{ route('clients.store') }}" method="POST" wire:loading.remove>
                @csrf

                <div class="w-full bg-white rounded-lg h-auto flex flex-col justify-start">
                    <div class="mx-5 my-1">
                        <div class="w-full text-center text-red-800 my-5 text-sm">{{ __('Client does not exist, you can add his information below') }}</div>

                        <div class="grid grid-flow-col gap-4 my-5">

                            <div class="grid-cols-6">
                                <label for="user_name" class="block text-sm font-medium text-gray-700">اسم
                                    المستخدم<span class="text-red-600 mr-1 text-lg">*</span></label>
                                <input type="text" id="user_name" name="user_name" required
                                    placeholder="ادخل اسم المستخدم" value="{{ old('user_name') }}"
                                    class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                @error('user_name')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>


                            <div class="grid-cols-6">
                                <label for="client_id_num" class="block text-sm font-medium text-gray-700">رقم
                                    الهوية<span class="text-red-600 mr-1 text-lg">*</span></label>
                                <input type="text" id="client_id_num" name="client_id_num" required
                                    wire:model="clientId" placeholder="ادخل رقم الهوية"
                                    value="{{ old('client_id_num') }}"
                                    class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                @error('client_id_num')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>

                        </div>

                        <div class="grid grid-flow-col gap-4">

                            <div class="grid-cols-6">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700">{{ __('Phone') }}<span
                                        class="text-red-600 mr-1 text-lg">*</span></label>
                                <input type="text" inputmode="tel" id="phone" name="phone" required
                                    placeholder="ادخل {{ __('Phone') }}" value="{{ old('phone') }}"
                                    class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                @error('phone')
                                    <p class="text-sm text-red-500">
                                        * {{ __($message) }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-action ">
                            <button type="submit"
                                class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">إضافة</button>
                        </div>
            </form>
        @else
            <form action="{{ route('clients.storeById', $client->id_number) }}" method="POST" wire:loading.remove>
                @csrf

                <div class="w-full bg-white rounded-lg h-auto flex flex-col justify-start">
                    <div class="mx-5 my-1">
                        <div class="w-full text-center text-green-800 my-5 text-sm">{{ __('The client already exists, click to add him') }}</div>
                        <div class="grid grid-flow-col gap-4 my-5">

                            <div class="grid-cols-6">
                                <label for="user_name" class="block text-sm font-medium text-gray-700">اسم
                                    المستخدم<span class="text-red-600 mr-1 text-lg">*</span></label>
                                <div
                                    class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                    {{ $this->client->full_name }}
                                </div>
                            </div>


                            <div class="grid-cols-6">
                                <label for="client_id_num" class="block text-sm font-medium text-gray-700">رقم
                                    الهوية<span class="text-red-600 mr-1 text-lg">*</span></label>
                                <div
                                    class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                    {{ $this->client->id_number }}
                                </div>
                            </div>

                        </div>

                        <div class="grid grid-flow-col gap-4">

                            <div class="grid-cols-6">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700">{{ __('Phone') }}<span
                                        class="text-red-600 mr-1 text-lg">*</span></label>
                                <div
                                    class="mt-1 p-2 w-full border lg:text-[75%] rounded-md border-[#E1E1E1] focus:border-[#E1E1E1] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 focus:text-black text-black transition-colors duration-300">
                                    {{ $this->client->phone_number }}
                                </div>
                            </div>
                        </div>

                        <div class="modal-action ">
                            <button type="submit"
                                class="w-full bg-[#BF9874] text-white p-2 rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">إضافة</button>
                        </div>
            </form>
        @endif
    @endif

</div>
<script>
    function loading() {
        const form = document.getElementById("form");
        form.parentElement.removeChild(form);
        form.innerHTML = "";
    }
</script>

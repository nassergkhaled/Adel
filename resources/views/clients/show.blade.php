@section('page_name', 'الموكلين')
@section('title', 'الموكلين | ')
@php
    $client = $data['client'];
@endphp
<x-app-layout>
    <div class="overflow-scroll h-screen">
        <div class="flex m-5 justify-between items-center">
            <div class="text-black font-bold text-2xl tracking-wide">
                <h1>تفاصيل الموكّل <span>{{ $client->full_name }}</span></h1>
            </div>

            {{-- Back to Previous page button --}}
            <div>
                <button
                    class="flex items-center px-3 py-3 bg-white border border-[#E1E1E1] font-semibold rounded-lg  hover:bg-adel-Normal-hover focus:outline-none focus:ring-2 focus:ring-adel-Normal-active focus:ring-opacity-75"
                    onclick="window.location.href='{{ url()->previous() }}'">

                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.4451 6.60003H14.3996V8.39997H3.4451L8.27256 13.2274L7 14.5L0 7.5L7 0.5L8.27256 1.77256L3.4451 6.60003Z"
                            fill="black" />
                    </svg>
                </button>
            </div>
        </div>

        <div class=" m-5 space-y-6">

            <div class="bg-white px-5 rounded-md w-full flex justify-between py-5 items-center">
                <h2 class="text-2xl font-semibold text-black mb-2 tracking-wide">كود التسجيل</h2>
                <p
                    class="text-2xl font-semibold mb-2 pe-5 bg-[#c1ebd7] px-2 py-2 rounded-md text-[#06A759] tracking-wide">
                    {{ $client->signupToken }}</p>
                <p></p>
            </div>


            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-4 tracking-wide">تفاصيل أخرى</h2>
                <div class=" flex justify-around items-center text-lg">

                    @php
                        $user = $client->user;
                        if ($user) {
                            $avatar = $user->avatar;
                            if ($avatar) {
                                $avatar = 'images/avatars/' . $avatar;

                                if (!file_exists($avatar)) {
                                    $avatar = '/images/profile_avatar.png';
                                }
                            } else {
                                $avatar = '/images/profile_avatar.png';
                            }
                        } else {
                            $avatar = '/images/profile_avatar.png';
                        }
                    @endphp
                    <div class="flex items-center space-x-2 gap-1">
                        <span class=" text-black ">الاسم الكامل: </span>
                        <img src="{{ $avatar }}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                        <span class="text-black tracking-wide">{{ $client->full_name }}</span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div>
                            <span class="text-black">رقم الهوية :</span>
                            <span class="bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]">{{ $client->id_number }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 ">
                        <span class="text-black">رقم الهاتف :</span>
                        <span
                            class="bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]">{{ $client->phone_number }}</span>
                    </div>

                </div>
            </div>

            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-3 tracking-wide">الملاحظات</h2>
                <p class="text-[#9B9B9B] text-sm mb-2"></p>
            </div>
        </div>

</x-app-layout>

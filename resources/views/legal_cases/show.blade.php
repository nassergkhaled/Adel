@section('page_name', 'القضايا')
@section('title', 'القضايا | ')
<x-app-layout>
    <div class="overflow-scroll h-screen">
        <div class="flex m-5 justify-between items-center">
            <div class="text-black font-bold text-2xl tracking-wide">
                <h1>تفاصيل قضية <span>ال{{ $case->title }}</span></h1>
            </div>

            <div>
                <button
                    class="flex items-center px-3 py-3 bg-white border border-[#E1E1E1] font-semibold rounded-lg  hover:bg-adel-Normal-hover focus:outline-none focus:ring-2 focus:ring-adel-Normal-active focus:ring-opacity-75">

                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.4451 6.60003H14.3996V8.39997H3.4451L8.27256 13.2274L7 14.5L0 7.5L7 0.5L8.27256 1.77256L3.4451 6.60003Z"
                            fill="black" />
                    </svg>
                </button>
            </div>
        </div>

        <div class=" m-5 space-y-6">

            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-2 tracking-wide">الوصف</h2>
                <p class="text-[#9B9B9B] text-sm">{{$case->description}}</p>
            </div>


            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-4 tracking-wide">تفاصيل أخرى</h2>
                <div class=" flex justify-around items-center text-lg">

                    @php
                        $avatar = Auth::user()->avatar;
                        if ($avatar) {
                            $avatar = 'images/avatars/'. $avatar;

                            if (!file_exists($avatar)) {
                                $avatar = '/images/profile_avatar.png';
                            }

                            

                        } else {
                            $avatar = '/images/profile_avatar.png';
                        }
                    @endphp
                    <div class="flex items-center space-x-2 gap-1">
                        <span class=" text-black ">صاحب القضية: </span>
                        <img src="{{$avatar}}" alt="Owner Icon" class="w-8 h-8 rounded-full">
                        <span class="text-black tracking-wide">{{$case->client->full_name}}</span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div>
                            <span class="text-black">تاريخ الفتح والإغلاق :</span>
                            <span class="text-[#9B9B9B] text-md">{{$case->open_date}}</span><span class="font-bold px-1 text-adel-Dark">-</span><span>{{$case->close_date}}</span>
                        </div>
                    </div>

                    @php
                    $class;
                    switch ($case->status) {
                        case 'Open':
                            $class = 'bg-[#c1ebd7] px-2 py-0 rounded-md text-[#06A759] tracking-wide';
                            break;
                        case 'Closed':
                            $class = 'bg-[#f9c6c6] px-2 py-0 rounded-md text-[#EA1B1B] tracking-wide';
                            break;
                        case 'Pending':
                            $class = 'bg-[#e9e2c0] px-2 py-0 rounded-md text-[#A78D06] tracking-wide';
                            break;
                        default:
                            break;
                    }

                    $name = $case->client->full_name;
                @endphp
                    <div class="flex items-center gap-1 ">
                        <span class="text-black">حالة القضية :</span>
                        <span class="{{ $class }}">{{ __($case->status) }}</span>
                    </div>

                </div>
            </div>

            <div class="bg-white p-5 rounded-md w-full">
                <h2 class="text-2xl font-semibold text-black mb-3 tracking-wide">الملاحظات</h2>
                <p class="text-[#9B9B9B] text-sm mb-2">{{$case->notes}}</p>
            </div>
        </div>

        <div class="text-black m-5 font-bold text-2xl tracking-wide">
            <h1>الشهود</h1>
        </div>

        <div class="mx-5">
            <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                <thead>
                    <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                        <th>اسم الشاهد</th>
                        <th>رقم الهاتف</th>
                        <th>رقم الهوية</th>
                        <th>الموقع</th>
                        <th class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class=" border-[#E6E8EB]">
                        <td>لانا أحمد</td>
                        <td>059687954</td>
                        <td>2134567</td>
                        <td>زواتا الشارع المفرق الثانى...</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>
                    <tr class=" border-[#E6E8EB]">
                        <td>لانا أحمد</td>
                        <td>059687954</td>
                        <td>2134567</td>
                        <td>زواتا الشارع المفرق الثانى...</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>
                    <tr class=" border-[#E6E8EB]">
                        <td>لانا أحمد</td>
                        <td>059687954</td>
                        <td>2134567</td>
                        <td>زواتا الشارع المفرق الثانى...</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex">
            <button type="button"
                class=" flex mr-5 mt-5 mb-1 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">إضافة
                شاهد</button>
            <button type="button"
                class=" flex mt-5 mb-1 mr-2 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">حذف
                شاهد</button>
        </div>

        <div class="text-black m-5 font-bold text-2xl tracking-wide">
            <h1>الجلسات</h1>
        </div>
        <div class="mx-5 mb-1">
            <table class="table border-[#E6E8EB] text-black rounded-sm bg-white">
                <thead>
                    <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                        <th>الإسم</th>
                        <th>التاريخ</th>
                        <th>حالتها</th>
                        <th>الملفات المرفقة</th>
                        <th class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class=" border-[#E6E8EB]">
                        <td>جلسة السرقة</td>
                        <td>3/Oct/2024</td>
                        <td><span
                                class="bg-[#f2bfbd] px-3 py-1 rounded-md text-[#EA1B1B] font-bold tracking-wide">منتهية</span>
                        </td>
                        <td>Null</td>
                        <td class="text-end"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="button"
            class=" flex mr-5 mt-4 mb-1 bg-transparent border text-[#BF9874] px-2 py-[0.6rem] rounded-md text-sm hover:bg-adel-Normal-hover hover:text-white hover:shadow-lg hover: border-[#BF9874] transition ease-in-out duration-150">إضافة
            جلسة</button>
    </div>
</x-app-layout>

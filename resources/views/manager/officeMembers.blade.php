<x-app-layout>

    @if (!$data['acceptedRequests']->count())
        <div class="flex flex-col items-center justify-between text-black">
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <h1 class="text-2xl">{{ __('There are no members in the office yet.') }}</h1>
        </div>
    @else
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
            <table class="w-full border-collapse bg-white text-start text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr class="py-10 my-10">
                        <th scope="col" class="text-start px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="text-start px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('ID number') }}
                        </th>
                        <th scope="col" class="text-start px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('Phone number') }}
                        </th>
                        <th scope="col" class="text-start px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('Role') }}
                        </th>
                        {{-- <th scope="col" class="text-start px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('Request Date') }}</th> --}}
                        <th scope="col" class="text-center px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('الصلاحيات') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100 text-black">
                    @foreach ($data['acceptedRequests'] as $user)
                        <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 text-start px-6 py-4 font-normal ">
                                @php
                                    $avatar = $user->avatar;
                                    if ($avatar) {
                                        $avatar = 'images/avatars/' . $avatar;

                                        if (!file_exists($avatar)) {
                                            $avatar = '/images/profile_avatar.png';
                                        }
                                    } else {
                                        $avatar = '/images/profile_avatar.png';
                                    }
                                @endphp
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full rounded-full object-cover object-center"
                                        src="{{ $avatar }}" alt="avatar" />
                                </div>
                                <div class="text-md">
                                    <div class="font-medium text-black text-[1.1rem]">{{ $user->full_name }}</div>
                                    <div class="text-adel-Dark-active font-Almarai text-[0.9rem]">{{ $user->email }}
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4 text-[0.92rem]">{{ $user->id_number }} </td>
                            <td class="px-6 py-4 text-[0.92rem]">{{ $user->phone_number }}</td>
                            <td class="px-6 py-4 text-[0.92rem]">{{ __("$user->role") }}</td>
                            {{-- <td class="px-6 py-4 text-[0.92rem]">{{ $user->updated_at->format('Y-m-d') }}</td> --}}
                            <td class="px-6 py-4 text-[0.92rem]">
                                <div class=" flex justify-center gap-x-5">
                                    @if ($user->access)
                                        <form action="{{ route('updateMemberAccess', $user->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="action" value="0">
                                            <button type="submit"
                                                class="btn btn-outline btn-primary rounded-xl btn-sm px-8">تعليق
                                                الصلاحيات</button>
                                        </form>
                                    @else
                                        <form action="{{ route('updateMemberAccess', $user->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="action" value="1">
                                            <button type="submit"
                                                class="btn btn-outline btn-success rounded-xl btn-sm px-8">اعادة
                                                الصلاحيلات</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    @endif

</x-app-layout>

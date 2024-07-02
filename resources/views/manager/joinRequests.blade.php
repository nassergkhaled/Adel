<x-app-layout>

    @if (!$data['bendingRequests']->count())
        <div class="flex flex-col items-center justify-between text-black">
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <div class="">&nbsp;</div>
            <h1 class="text-2xl">{{ __('There are no pending join requests.') }}</h1>
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
                        <th scope="col" class="text-start px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('Request Date') }}</th>
                        <th scope="col" class="text-center px-6 py-4 font-medium text-lg text-gray-900">
                            {{ __('Accept/Reject') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100 text-black">
                    @foreach ($data['bendingRequests'] as $user)
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
                                    {{-- <span
                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span> --}}
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
                            <td class="px-6 py-4 text-[0.92rem]">{{ $user->updated_at->format('Y-m-d') }}</td>
                            {{-- <td class="px-6 py-4 text-[0.92rem]">
                            <div class="flex gap-2">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                    Design
                                </span>
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600">
                                    Product
                                </span>
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                                    Develop
                                </span>
                            </div>
                        </td> --}}
                            <td class="px-6 py-4 text-[0.92rem]">
                                {{-- <div class="flex justify-end gap-4">
                                <a x-data="{ tooltip: 'Delete' }" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                                <a x-data="{ tooltip: 'Edite' }" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                            </div> --}}
                                <div class=" flex justify-center gap-x-5">
                                    <form action="{{ route('joinRequests.update', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="1">
                                        <button type="submit"
                                            class="btn btn-outline btn-success rounded-xl btn-sm px-8">قبول</button>
                                    </form>
                                    <form action="{{ route('joinRequests.update', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="0">
                                        <button type="submit"
                                            class="btn btn-outline btn-error rounded-xl btn-sm px-8">رفض</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    @endif

</x-app-layout>

@section('page_name', 'المهام')
@section('title', 'المهام | ')
<x-app-layout>

    <div class="my-3 px-4 space-y-4">

        <div class="flex justify-between">
            <h1 class="text-xl flex items-center font-bold text-black">جميع المهام</h1>
            <button type="button" onclick="addTask.showModal()"
                class=" flex my-auto bg-adel-Normal text-adel-bg border border-adel-Normal px-8 py-2 rounded-md text-sm hover:bg-transparent hover:text-adel-Normal transition-all ease-in-out duration-100">
                {{ __('Add') }}
            </button>

        </div>

        <hr>
        <div class=" flex justify-start items-end gap-x-5">
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text text-black">مسنودة الى</span>
                </div>
                <select class="select select-bordered bg-transparent border text-[1rem] border-gray-400 text-black">
                    <option class="text-[1rem]" value="" selected>لي / انا</option>
                    <option class="text-[1rem]" value="">جميع اعضاء المكتب</option>
                    <option class="text-[1rem]" value="">اخرى</option>
                </select>
            </label>

            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text text-black">حالة المهام</span>
                </div>
                <select class="select select-bordered bg-transparent border text-[1rem] border-gray-400 text-black">
                    <option class="text-[1rem]" value="">الكل</option>
                    <option class="text-[1rem]" value="" selected>غير مكتملة</option>
                    <option class="text-[1rem]" value="">مكتملة</option>
                </select>
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text text-black">القضية / العميل</span>
                </div>
                <select class="select select-bordered bg-transparent border text-[1rem] border-gray-400 text-black">
                    <optgroup label="قضايا">
                        <option class="text-[1rem]" value="" selected>قضية 1</option>
                    </optgroup>
                    <optgroup label="موكلين">
                        <option class="text-[1rem]" value="">موكل 1</option>
                    </optgroup>
                </select>
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text text-black">حسب التاريخ</span>
                </div>
                <select class="select select-bordered bg-transparent border text-[1rem] border-gray-400 text-black"
                    onchange="chooseDate(this)">
                    <option class="text-[1rem]" value="">جميع الأوقات</option>
                    <option class="text-[1rem]" value="">اخر 7 ايام</option>
                    <option class="text-[1rem]" value="">اخر 30 ايام</option>
                    <option class="text-[1rem]" value="">اخر 90 ايام</option>
                    <option class="text-[1rem]" value="">العام الحالي</option>
                    <option class="text-[1rem]" value="date">تاريخ معين</option>
                </select>
            </label>

            <button class="btn btn-outline btn-success">تطبيق الفلاتر</button>
            <button class="btn btn-outline">حذف الفلاتر</button>
        </div>
        <div class=" justify-center gap-3 hidden" id="dateSelect_div">
            <label class="form-control">
                <div class="label">
                    <span class="label-text text-black">من تاريخ :</span>
                </div>
                <input type="date" class="rounded-lg bg-transparent text-black border border-gray-400"
                    name="data_from" id="">
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text text-black">الى تاريخ :</span>
                </div>
                <input type="date" class="rounded-lg bg-transparent text-black border border-gray-400" name="data_to"
                    id="">
            </label>
        </div>
        <script>
            const chooseDate = function(item) {
                if (item.value === 'date') {
                    const dateSelect_div = document.getElementById('dateSelect_div');
                    dateSelect_div.classList.remove('hidden');
                    dateSelect_div.classList.add('flex');
                } else {
                    const dateSelect_div = document.getElementById('dateSelect_div');
                    dateSelect_div.classList.add('hidden');
                    dateSelect_div.classList.remove('flex');
                }
            };
        </script>

        <hr class="py-2">
        <div class="w-full">
            <table class="table border-[#E6E8EB] text-black shadow-md rounded-sm bg-white">
                <thead>
                    <tr class=" border-[#E6E8EB] text-[#999999] text-[15px] bg-[#DDDDDDDD]">
                        <th class="text-start"><input type="checkbox" id="" name=""
                                class="rounded-sm border-[#E1E1E1] text-adel-Normal focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                        </th>
                        <th>عنوان المهمة</th>
                        <th>الأولوية</th>
                        <th>لغاية تاريخ</th>
                        <th>القضية/الموكل</th>
                        <th>مسنودة لِـ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-start" id="table_body">

                    @foreach ($data['tasks_created'] as $task)
                        <tr class=" border-[#E6E8EB]">

                            <td class="text-start"><input type="checkbox" id="task-{{ $task->id }}"
                                    name="selectTask"
                                    class="rounded-sm border-[#E1E1E1] text-adel-Normal focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                            </td>
                            <td>{{ $task->title }}</td>
                            <td><span class="{{ $task->priority['class'] }} ">{{ __($task->priority['name']) }}</span>
                            </td>
                            <td>{{ $task->due_date }}</td>
                            <td>{{ $task->case_id ? $task->legalCase->title : $task->client->full_name ?? 'N/A' }}</td>

                            <td>{{ $task->assignedTo->first() ? $task->assignedTo->first()->full_name : ($task->case_id ? 'جميع اعضاء القضية' : 'لي فقط') }}
                            </td>
                            <td>
                                <div class="flex justify-start gap-x-4">
                                    <button><i class="fa-regular fa-trash-can"></i></button>
                                    <button><i class="fa-solid fa-pen"></i></button>
                                    <button><i class="fa-regular fa-bell"></i></button>
                                </div>

                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>

    <style>
        .modal-box {
            width: 91.666667%;
            max-width: 40rem
                /* 512px */
            ;
        }

        .modal {
            /* align-items: center; */
            margin-left: auto;
            margin-right: auto;

        }
    </style>
    <dialog id="addTask" class="modal modal-middle sm:modal-middle" style="width:90%;">
        <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
            <form method="dialog">
                <button type="submit"
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
            </form>
            <h3 class="font-bold text-2xl text-center">{{ __('مهمة جديدة') }}</h3>
            <div class="my-5">
                <hr class="border-gray-300">
            </div>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="grid grid-flow-row gap-y-5">
                    <div class="grid grid-flow-col gap-x-1 items-center">
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="client_case_id"
                                class="text-sm font-medium text-gray-700">{{ __('القضية/الموكل') }}
                                <span class="text-red-500">*</span>
                            </label>
                            @error('client_case_id')
                                <p class="text-sm text-red-500 text-start">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-8">
                            <select id="client_case_id" name="client_case_id" value="{{ old('client_case_id') }}"
                                class="w-full border rounded-md border-gray-300 focus:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-300">

                                <option value="" selected>-- {{ __('اختر القضية/الموكل') }}</option>
                                <optgroup label="قضايا">
                                    @foreach ($data['lawyer']->legalCases as $case)
                                        <option value="case-{{ $case->id }}"
                                            {{ !old('TaskforMe') && old('client_case_id') == 'case-' . $case->id ? 'selected' : '' }}>
                                            {{ $case->title }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="موكلين">
                                    @foreach ($data['lawyer']->clients as $client)
                                        <option value="client-{{ $client->id }}"
                                            {{ !old('TaskforMe') && old('client_case_id') == 'client-' . $client->id ? 'selected' : '' }}>
                                            {{ $client->full_name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label cursor-pointer mx-auto flex items-center">
                            <input type="checkbox" name="TaskforMe" class="checkbox border-gray-300"
                                @checked(old('TaskforMe'))>
                            <span
                                class="label-text ms-2  text-gray-700">{{ __('هذه المهمة ليست مرتبطة بقضية أو موكّل') }}</span>
                        </label>
                        @error('TaskforMe')
                            <p class="text-sm text-red-500 text-center">
                                * {{ __($message) }}
                            </p>
                        @enderror
                    </div>


                    <hr class="border-gray-300">

                    <div class="grid grid-flow-col gap-x-1 items-center">
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="task_title"
                                class="text-sm font-medium text-gray-700">{{ __('عنوان المهمة') }}
                                <span class="text-red-500">*</span>
                            </label>
                            @error('task_title')
                                <p class="text-sm text-red-500 text-start">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-8">
                            <input type="text" id="task_title" name="task_title"
                                placeholder="{{ __('عنوان المهمة') }}" value="{{ old('task_title') }}"
                                class="w-full border text-lg rounded-md border-gray-300 focus:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-300">
                        </div>

                    </div>


                    <div class="grid grid-flow-col gap-x-1 items-center">
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="due_date" class="text-sm font-medium text-gray-700">{{ __('لغاية تاريخ') }}
                                <span class="text-red-500">*</span>
                            </label>
                            @error('due_date')
                                <p class="text-sm text-red-500 text-start">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-8">
                            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"
                                class="w-full border rounded-md border-gray-300 focus:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-300">
                        </div>

                    </div>


                    <div class="grid grid-flow-col gap-x-1 items-center">
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="priority" class="text-sm font-medium text-gray-700">{{ __('الأولوية') }}
                                <span class="text-red-500">*</span>
                            </label>
                            @error('priority')
                                <p class="text-sm text-red-500 text-start">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-8">
                            <select id="priority" name="priority"
                                class="w-full border rounded-md border-gray-300 focus:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-300">
                                <option value="" disabled selected></option>
                                <option value="1" @selected(old('priority') == 1)>{{ __('High') }}</option>
                                <option value="2" @selected(old('priority') == 2)>{{ __('Medium') }}</option>
                                <option value="3" @selected(old('priority') == 3)>{{ __('Low') }}</option>
                            </select>
                        </div>

                    </div>


                    <div class="grid grid-flow-col gap-x-1 items-center">
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="description" class="text-sm font-medium text-gray-700">{{ __('الوصف') }}
                                <span class="text-red-500">*</span>
                            </label>
                            @error('description')
                                <p class="text-sm text-red-500 text-start">
                                    * {{ __($message) }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-8">
                            <textarea id="description" name="description" placeholder="{{ __('الوصف') }}"
                                class="w-full border rounded-md border-gray-300 focus:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-300">{{ old('description') }}</textarea>
                        </div>

                    </div>


                    <div class="form-control">
                        <label class="label cursor-pointer mx-auto flex items-center">
                            <input type="checkbox" name="Reminder" class="checkbox border-gray-300"
                                @checked(old('Reminder'))>
                            <span class="label-text ms-2  text-gray-700">{{ __('تلقي تنبيه بشأن هذه المهمة') }}</span>
                        </label>
                    </div>
                    @error('Reminder')
                        <p class="text-sm text-red-500 text-center">
                            * {{ __($message) }}
                        </p>
                    @enderror

                    <div class="modal-action">
                        <button type="submit"
                            class="w-[20%] bg-[#BF9874] mx-auto text-sm text-white py-3 text-center rounded-md hover:bg-[#433529] focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-300">
                            {{ __('Add') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>

</x-app-layout>

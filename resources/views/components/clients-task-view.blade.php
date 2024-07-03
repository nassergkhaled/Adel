    @props(['data', 'request'])

    @php
        if (!$request) {
            $request = [
                'AssignedTo' => 'All',
                'TaskStatus' => '',
                'Case_Client' => '',
                'duration' => '',
                'data_from' => '',
                'data_to' => '',
            ];
        }

    @endphp
    <div class="my-3 px-4 space-y-4">

        <div class="flex justify-between">
            <h1 class="text-xl flex items-center font-bold text-black">جميع المهام</h1>

        </div>
        <hr>

        {{-- filters --}}
        <form action="{{ route('tasks.index') }}" method="GET">
            <input type="hidden" name="AssignedTo" value="">
            <div class=" flex justify-start items-end gap-x-5">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-black">حالة المهام</span>
                    </div>
                    <select class="select select-bordered bg-transparent border text-[1rem] border-gray-400 text-black"
                        name="TaskStatus">
                        <option class="text-[1rem]" value="All"
                            {{ old('TaskStatus', $request['TaskStatus']) == 'All' ? 'selected' : '' }}>الكل</option>
                        <option class="text-[1rem]" value="Incomplete"
                            {{ old('TaskStatus', $request['TaskStatus']) == 'Incomplete' ? 'selected' : '' }}>غير مكتملة
                        </option>
                        <option class="text-[1rem]" value="Completed"
                            {{ old('TaskStatus', $request['TaskStatus']) == 'Completed' ? 'selected' : '' }}>مكتملة
                        </option>
                    </select>
                </label>

                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-black">حسب التاريخ</span>
                    </div>
                    <select class="select select-bordered bg-transparent border text-[1rem] border-gray-400 text-black"
                        name="duration" onchange="chooseDate(this)">
                        <option class="text-[1rem]" value="AllTime"
                            {{ old('duration', $request['duration']) == 'AllTime' ? 'selected' : '' }}>جميع الأوقات
                        </option>
                        <option class="text-[1rem]" value="Last7"
                            {{ old('duration', $request['duration']) == 'Last7' ? 'selected' : '' }}>اخر 7 ايام
                        </option>
                        <option class="text-[1rem]" value="Last30"
                            {{ old('duration', $request['duration']) == 'Last30' ? 'selected' : '' }}>اخر 30 ايام
                        </option>
                        <option class="text-[1rem]" value="Last90"
                            {{ old('duration', $request['duration']) == 'Last90' ? 'selected' : '' }}>اخر 90 ايام
                        </option>
                        <option class="text-[1rem]" value="LastYear"
                            {{ old('duration', $request['duration']) == 'LastYear' ? 'selected' : '' }}>العام الحالي
                        </option>
                        <option class="text-[1rem]" value="date"
                            {{ old('duration', $request['duration']) == 'date' ? 'selected' : '' }}>تاريخ معين</option>
                    </select>
                </label>

                <button type="submit" class="btn btn-outline btn-success">تطبيق الفلاتر</button>
                <button type="reset" class="btn btn-outline">حذف الفلاتر</button>
            </div>
            <div class=" justify-center gap-3 {{ old('duration', $request['duration']) == 'date' ? 'flex' : 'hidden' }}"
                id="dateSelect_div">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text text-black">من تاريخ :</span>
                    </div>
                    <input type="date" class="rounded-lg bg-transparent text-black border border-gray-400"
                        name="data_from" id="" value="{{ old('data_from', $request['data_from'] ?? '') }}">
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text text-black">الى تاريخ :</span>
                    </div>
                    <input type="date" class="rounded-lg bg-transparent text-black border border-gray-400"
                        name="data_to" id="" value="{{ old('data_to', $request['data_to']) ?? '' }}">
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
        </form>

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
                        <th>الوصف</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-start" id="table_body">

                    @foreach ($data['tasks'] as $task)
                        <tr class=" border-[#E6E8EB]">

                            <td class="text-start"><input type="checkbox" id="task-{{ $task->id }}"
                                    name="selectTask"
                                    class="rounded-sm border-[#E1E1E1] text-adel-Normal focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                            </td>
                            <td>{{ $task->title }}</td>
                            <td><span class="{{ $task->priority['class'] }} ">{{ __($task->priority['name']) }}</span>
                            </td>
                            <td>{{ $task->due_date }}</td>
                            <td>{{ $task->relatedCase_id ? $task->legalCase->title : ($task->relatedClient_id ? $task->clientUser->full_name : 'N/A') }}
                            </td>
                            <td>
                                <div class="tooltip" data-tip="{{ $task->description }}">
                                    <button><i class=" text-lg fa-solid fa-circle-info"></i></button>
                                </div>
                            </td>

                            <td>
                                <div class="tooltip" data-tip="اضغط لتأكيد إنجاز المهمة">

                                    <button><i class="text-lg fa-regular fa-circle-check"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>

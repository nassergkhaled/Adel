@section('page_name', 'الرئيـسـية')
@section('title', 'الرئيسية | ')

<x-app-layout>
    @if ($data['role'] === 'Lawyer')
        <x-lawyer-dashboard :data="$data" />
    @elseif ($data['role'] === 'Manager')
        <x-manager-dashboard :data="$data" />
    @elseif ($data['role'] === 'Client')
        <x-client-dashboard :data="$data" />
    @else
        <div class="flex justify-center items-center mt-[20%]">
            <h1 class="text-black text-5xl border rounded-full p-7 border-adel-Normal-hover">لوحة بيانات
                {{ __(auth()->user()->role) }} لا زالت قيد التصميم !!</h1>
        </div>
    @endif
</x-app-layout>

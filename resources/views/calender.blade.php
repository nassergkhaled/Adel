@section('page_name', 'التقويم')
@section('title', 'التقويم | ')

<x-app-layout>


    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    {{-- <script src='fullcalendar/dist/index.global.js'></script> --}}
    <script src="{{asset('js/full_calendar.js')}}"></script>


    <div class="h-[96vh] m-2  bg-white rounded-lg p-4" id='calendar' data-id="{{Auth::id()}}" dir="rtl"></div>

</x-app-layout>

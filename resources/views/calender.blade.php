@section('page_name', 'التقويم')
@section('title', 'التقويم | ')

<x-app-layout>
    
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ar',
                timeZone: 'UTC',
                events: '/tasks',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'اليوم',
                    month: 'شهر',
                    week: 'أسبوع',
                    day: 'يوم',
                    list: 'قائمة'
                },
                viewDidMount: function() {
                    applyTailwindClasses();
                }
            });
            calendar.render();
        });

        function applyTailwindClasses() {
            document.querySelectorAll('.fc-button').forEach(function(button) {
                // Clear all existing class names (excluding `.fc-button`)
                button.className = '';

                // Apply TailwindCSS classes
                button.classList.add(
                    'bg-adel-Dark',
                    'text-white',
                    'hover:bg-adel-Normal',
                    'px-4',
                    'py-2',
                    'rounded-lg',
                    'focus:outline-none',
                    'focus:ring-2',
                    'focus:ring-blue-300',
                    'mx-1'
                );
            });
        }
    </script>

    <div class="h-[96vh] m-2  bg-white rounded-lg p-4" id='calendar'></div>
</x-app-layout>

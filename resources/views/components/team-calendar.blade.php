<div id="team-calendar"></div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('team-calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                @foreach ($tasks as $task)
                {
                    title: '{{ $task->name }}',
                    start: '{{ $task->start_date }}',
                    end: '{{ $task->end_date }}',
                    color: '#3788d8'
                },
                @endforeach
                @foreach ($milestones as $milestone)
                {
                    title: '{{ $milestone->name }}',
                    start: '{{ $milestone->due_date }}',
                    allDay: true,
                    color: '#e67e22'
                },
                @endforeach
            ]
        });
        calendar.render();
    });
</script>
@endpush

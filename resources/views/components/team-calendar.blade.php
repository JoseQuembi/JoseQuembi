<!-- components.team-calendar -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
    <div id="team-calendar"></div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('team-calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: @json($tasks->concat($milestones)),
            eventClick: function(info) {
                alert('Event: ' + info.event.title);
            }
        });
        calendar.render();
    });
</script>
@endpush

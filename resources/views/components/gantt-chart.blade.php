<!-- components.gantt-chart -->
<div id="gantt-chart" class="w-full h-96 bg-white dark:bg-gray-800 rounded-lg shadow-md"></div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        gantt.config.date_format = "%Y-%m-%d %H:%i";
        gantt.init("gantt-chart");
        gantt.parse({
            data: @json($ganttData)
        });
    });
</script>
@endpush

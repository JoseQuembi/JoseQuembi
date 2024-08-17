<div id="gantt-chart"></div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        gantt.init("gantt-chart");
        gantt.parse({
            data: @json($ganttData)
        });
    });
</script>
@endpush

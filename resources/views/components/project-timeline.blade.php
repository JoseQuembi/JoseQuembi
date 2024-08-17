<div class="project-timeline">
    @foreach ($timelineData as $item)
        <div class="timeline-item">
            <div class="timeline-content">
                <h3>{{ $item['content'] }}</h3>
                <p>{{ $item['start'] }} - {{ $item['end'] ?? 'N/A' }}</p>
            </div>
        </div>
    @endforeach
</div>

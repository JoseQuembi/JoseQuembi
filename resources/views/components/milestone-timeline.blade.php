<div class="milestone-timeline">
    @foreach ($milestones as $milestone)
        <div class="milestone-item">
            <h4>{{ $milestone->name }}</h4>
            <p>Data Prevista: {{ $milestone->due_date->format('d/m/Y') }}</p>
            <p>Status: {{ $milestone->status }}</p>
        </div>
    @endforeach
</div>

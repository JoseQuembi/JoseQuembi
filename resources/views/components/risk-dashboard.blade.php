<div class="risk-dashboard">
    @foreach ($risks as $risk)
        <div class="risk-item">
            <h4>{{ $risk->name }}</h4>
            <p>Probabilidade: {{ $risk->probability }}</p>
            <p>Impacto: {{ $risk->impact }}</p>
            <p>Status: {{ $risk->status }}</p>
        </div>
    @endforeach
</div>

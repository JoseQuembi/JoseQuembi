<div class="issue-log">
    @foreach ($issues as $issue)
        <div class="issue-item">
            <h4>{{ $issue->title }}</h4>
            <p>Descrição: {{ $issue->description }}</p>
            <p>Status: {{ $issue->status }}</p>
            <p>Prioridade: {{ $issue->priority }}</p>
        </div>
    @endforeach
</div>

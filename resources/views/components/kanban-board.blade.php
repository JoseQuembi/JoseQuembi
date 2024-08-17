<div class="kanban-board">
    @foreach ($kanbanData as $status => $tasks)
        <div class="kanban-column">
            <h3>{{ ucfirst($status) }}</h3>
            @foreach ($tasks as $task)
                <div class="kanban-card">
                    <h4>{{ $task['title'] }}</h4>
                    <p>{{ $task['description'] }}</p>
                    <span>Assignee: {{ $task['assignee'] }}</span>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

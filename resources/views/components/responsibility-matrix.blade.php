<table class="responsibility-matrix">
    <thead>
        <tr>
            <th>Tarefa</th>
            @foreach ($teamMembers as $member)
                <th>{{ $member->name }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($project->tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                @foreach ($teamMembers as $member)
                    <td>
                        @if ($task->isResponsible($member))
                            R
                        @elseif ($task->isAccountable($member))
                            A
                        @elseif ($task->isConsulted($member))
                            C
                        @elseif ($task->isInformed($member))
                            I
                        @else
                            -
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

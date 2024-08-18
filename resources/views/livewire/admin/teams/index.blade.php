<div>
    <h2 class="text-2xl font-semibold mb-4">Teams</h2>

    <div class="mb-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Search teams..." class="w-full px-4 py-2 border rounded-md">
    </div>

    <table class="w-full border-collapse border">
        <thead>
            <tr>
                <th class="border p-2">Name</th>
                <th class="border p-2">Project</th>
                <th class="border p-2">Members Count</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td class="border p-2">{{ $team->name }}</td>
                    <td class="border p-2">{{ $team->project->name }}</td>
                    <td class="border p-2">{{ $team->members->count() }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.teams.show', $team) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('admin.teams.edit', $team) }}" class="text-green-600 hover:underline ml-2">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $teams->links() }}
    </div>
</div>

<div>
    <h2 class="text-2xl font-semibold mb-4">Risks</h2>

    <div class="mb-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Search risks..." class="w-full px-4 py-2 border rounded-md">
    </div>

    <table class="w-full border-collapse border">
        <thead>
            <tr>
                <th class="border p-2">Name</th>
                <th class="border p-2">Project</th>
                <th class="border p-2">Probability</th>
                <th class="border p-2">Impact</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($risks as $risk)
                <tr>
                    <td class="border p-2">{{ $risk->name }}</td>
                    <td class="border p-2">{{ $risk->project->name }}</td>
                    <td class="border p-2">{{ $risk->probability }}</td>
                    <td class="border p-2">{{ $risk->impact }}</td>
                    <td class="border p-2">{{ $risk->status }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.risks.show', $risk) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('admin.risks.edit', $risk) }}" class="text-green-600 hover:underline ml-2">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $risks->links() }}
    </div>
</div>

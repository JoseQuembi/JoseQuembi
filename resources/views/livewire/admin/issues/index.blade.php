<div>
    <h2 class="text-2xl font-semibold mb-4">Issues</h2>

    <div class="mb-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Search issues..." class="w-full px-4 py-2 border rounded-md">
    </div>

    <table class="w-full border-collapse border">
        <thead>
            <tr>
                <th class="border p-2">Title</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Priority</th>
                <th class="border p-2">Due Date</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td class="border p-2">{{ $issue->title }}</td>
                    <td class="border p-2">{{ $issue->status }}</td>
                    <td class="border p-2">{{ $issue->priority }}</td>
                    <td class="border p-2">{{ Ajuda::dataCurta($issue->due_date) }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.issues.show', $issue) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('admin.issues.edit', $issue) }}" class="text-green-600 hover:underline ml-2">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $issues->links() }}
    </div>
</div>

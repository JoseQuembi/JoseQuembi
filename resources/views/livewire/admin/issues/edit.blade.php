<div>
    <h2 class="text-2xl font-semibold mb-4">Edit Issue</h2>

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="title" class="block mb-2">Title</label>
            <input type="text" id="title" wire:model="issue.title" class="w-full px-4 py-2 border rounded-md">
            @error('issue.title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Description</label>
            <textarea id="description" wire:model="issue.description" class="w-full px-4 py-2 border rounded-md"></textarea>
            @error('issue.description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block mb-2">Status</label>
            <select id="status" wire:model="issue.status" class="w-full px-4 py-2 border rounded-md">
                <option value="open">Open</option>
                <option value="in_progress">In Progress</option>
                <option value="closed">Closed</option>
            </select>
            @error('issue.status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="priority" class="block mb-2">Priority</label>
            <select id="priority" wire:model="issue.priority" class="w-full px-4 py-2 border rounded-md">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            @error('issue.priority') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="due_date" class="block mb-2">Due Date</label>
            <input type="date" id="due_date" wire:model="issue.due_date" class="w-full px-4 py-2 border rounded-md">
            @error('issue.due_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="project_id" class="block mb-2">Project</label>
            <select id="project_id" wire:model="issue.project_id" class="w-full px-4 py-2 border rounded-md">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('issue.project_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="assigned_to" class="block mb-2">Assigned To</label>
            <select id="assigned_to" wire:model="issue.assigned_to" class="w-full px-4 py-2 border rounded-md">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('issue.assigned_to') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update Issue</button>
    </form>
</div>

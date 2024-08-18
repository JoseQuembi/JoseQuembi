<div>
    <h2 class="text-2xl font-semibold mb-4">Create New Issue</h2>

    <form wire:submit.prevent="create">
        <div class="mb-4">
            <label for="title" class="block mb-2">Title</label>
            <input type="text" id="title" wire:model="title" class="w-full px-4 py-2 border rounded-md">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Description</label>
            <textarea id="description" wire:model="description" class="w-full px-4 py-2 border rounded-md"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block mb-2">Status</label>
            <select id="status" wire:model="status" class="w-full px-4 py-2 border rounded-md">
                <option value="">Select Status</option>
                <option value="open">Open</option>
                <option value="in_progress">In Progress</option>
                <option value="closed">Closed</option>
            </select>
            @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="priority" class="block mb-2">Priority</label>
            <select id="priority" wire:model="priority" class="w-full px-4 py-2 border rounded-md">
                <option value="">Select Priority</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            @error('priority') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="due_date" class="block mb-2">Due Date</label>
            <input type="date" id="due_date" wire:model="due_date" class="w-full px-4 py-2 border rounded-md">
            @error('due_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="project_id" class="block mb-2">Project</label>
            <select id="project_id" wire:model="project_id" class="w-full px-4 py-2 border rounded-md">
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="assigned_to" class="block mb-2">Assigned To</label>
            <select id="assigned_to" wire:model="assigned_to" class="w-full px-4 py-2 border rounded-md">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('assigned_to') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Issue</button>
    </form>
</div>

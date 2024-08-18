<div>
    <h2 class="text-2xl font-semibold mb-4">Edit Team</h2>

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="name" class="block mb-2">Team Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded-md">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="project_id" class="block mb-2">Project</label>
            <select id="project_id" wire:model="project_id" class="w-full px-4 py-2 border rounded-md">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">Team Members</label>
            @foreach($users as $user)
                <label class="inline-flex items-center mt-3">
                    <input type="checkbox" wire:model="selectedMembers" value="{{ $user->id }}" class="form-checkbox h-5 w-5 text-gray-600">
                    <span class="ml-2 text-gray-700">{{ $user->name }}</span>
                </label>
            @endforeach
            @error('selectedMembers') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update Team</button>
    </form>
</div>

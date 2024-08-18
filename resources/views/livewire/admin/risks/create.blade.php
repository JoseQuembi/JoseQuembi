<div>
    <h2 class="text-2xl font-semibold mb-4">Create New Risk</h2>

    <form wire:submit.prevent="create">
        <div class="mb-4">
            <label for="name" class="block mb-2">Risk Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded-md">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Description</label>
            <textarea id="description" wire:model="description" class="w-full px-4 py-2 border rounded-md"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="probability" class="block mb-2">Probability (%)</label>
            <input type="number" id="probability" wire:model="probability" min="0" max="100" class="w-full px-4 py-2 border rounded-md">
            @error('probability') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="impact" class="block mb-2">Impact (%)</label>
            <input type="number" id="impact" wire:model="impact" min="0" max="100" class="w-full px-4 py-2 border rounded-md">
            @error('impact') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block mb-2">Status</label>
            <select id="status" wire:model="status" class="w-full px-4 py-2 border rounded-md">
                <option value="">Select Status</option>
                <option value="identified">Identified</option>
                <option value="analyzed">Analyzed</option>
                <option value="mitigated">Mitigated</option>
                <option value="closed">Closed</option>
            </select>
            @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="mitigation_plan" class="block mb-2">Mitigation Plan</label>
            <textarea id="mitigation_plan" wire:model="mitigation_plan" class="w-full px-4 py-2 border rounded-md"></textarea>
            @error('mitigation_plan') <span class="text-red-500">{{ $message }}</span> @enderror
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
            <label for="owner_id" class="block mb-2">Risk Owner</label>
            <select id="owner_id" wire:model="owner_id" class="w-full px-4 py-2 border rounded-md">
                <option value="">Select Owner</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('owner_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Risk</button>
    </form>
</div>

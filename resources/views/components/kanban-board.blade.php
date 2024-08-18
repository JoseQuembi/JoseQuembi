<!-- components.kanban-board -->
<div x-data="kanbanBoard()" class="flex flex-col sm:flex-row gap-4 overflow-x-auto pb-4">
    @foreach (['pending', 'in_progress', 'completed'] as $status)
        <div class="flex-1 min-w-[250px]">
            <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">{{ ucfirst(str_replace('_', ' ', $status)) }}</h3>
            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 space-y-2"
                 @dragover.prevent
                 @drop.prevent="handleDrop($event, '{{ $status }}')">
                @foreach ($tasks->where('status', $status) as $task)
                    <div class="bg-white dark:bg-gray-800 rounded shadow p-3"
                         draggable="true"
                         @dragstart="handleDragStart($event, {{ json_encode($task) }})"
                         x-data="{ task: {{ json_encode($task) }} }">
                        <h4 class="text-md font-medium text-gray-900 dark:text-white">{{ $task->name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $task->description }}</p>
                        <span class="text-xs text-gray-500 dark:text-gray-300 mt-2 block">Assignee: {{ $task->assigned_to ? $users->find($task->assigned_to)->name : 'Unassigned' }}</span>
                        <span class="text-xs text-gray-500 dark:text-gray-300 mt-1 block">Priority: {{ ucfirst($task->priority) }}</span>
                        <div class="mt-2 flex justify-between">
                            <button @click="editTask(task)" class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button @click="deleteTask(task.id)" class="text-red-500 hover:text-red-700">Delete</button>
                        </div>
                    </div>
                @endforeach
                <button @click="addTask('{{ $status }}')" class="w-full mt-2 bg-blue-500 text-white rounded p-2 hover:bg-blue-600">
                    Add Task
                </button>
            </div>
        </div>
    @endforeach

    <!-- Task Edit Modal -->
    <div x-show="showEditModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Task</h3>
                <div class="mt-2 px-7 py-3">
                    <input x-model="editingTask.name" class="mb-2 w-full px-3 py-2 border rounded" placeholder="Name">
                    <textarea x-model="editingTask.description" class="mb-2 w-full px-3 py-2 border rounded" placeholder="Description"></textarea>
                    <input x-model="editingTask.start_date" type="date" class="mb-2 w-full px-3 py-2 border rounded">
                    <input x-model="editingTask.end_date" type="date" class="mb-2 w-full px-3 py-2 border rounded">
                    <select x-model="editingTask.assigned_to" class="mb-2 w-full px-3 py-2 border rounded">
                        <option value="">Select Assignee</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <select x-model="editingTask.priority" class="mb-2 w-full px-3 py-2 border rounded">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="items-center px-4 py-3">
                    <button @click="updateTask()" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Save
                    </button>
                    <button @click="showEditModal = false" class="ml-3 px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function kanbanBoard() {
        return {
            draggedTask: null,
            showEditModal: false,
            editingTask: {},

            handleDragStart(event, task) {
                this.draggedTask = task;
                event.dataTransfer.setData('text/plain', task.id);
            },

            handleDrop(event, newStatus) {
                let taskId = event.dataTransfer.getData('text/plain');
                this.$wire.updateTaskStatus(taskId, newStatus);
            },

            addTask(status) {
                this.editingTask = { status: status };
                this.showEditModal = true;
            },

            editTask(task) {
                this.editingTask = { ...task };
                this.showEditModal = true;
            },

            updateTask() {
                if (this.editingTask.id) {
                    this.$wire.updateTask(this.editingTask);
                } else {
                    this.$wire.addTask(this.editingTask);
                }
                this.showEditModal = false;
            },

            deleteTask(taskId) {
                if (confirm('Are you sure you want to delete this task?')) {
                    this.$wire.deleteTask(taskId);
                }
            }
        }
    }
    </script>
@endpush

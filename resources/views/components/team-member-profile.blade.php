<!-- components.team-member-profile -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 flex items-center space-x-4">
    <img class="w-16 h-16 rounded-full object-cover" src="{{ $member->user->profile_image }}" alt="{{ $member->user->name }}">
    <div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $member->user->name }}</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $member->user->roles->first()->name }}</p>
        <p class="text-sm text-gray-600 dark:text-gray-400">Email: {{ $member->user->email }}</p>
    </div>
</div>

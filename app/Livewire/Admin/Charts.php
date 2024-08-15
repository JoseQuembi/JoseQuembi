<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

class Charts extends Component
{
    #[Layout('layouts.dashboard')]
    public $projectTimeframe = 'month';
    public $taskTimeframe = 'week';
    public $userActivityTimeframe = 'month';

    public function updateProjectTimeframe($timeframe)
    {
        $this->projectTimeframe = $timeframe;
    }

    public function updateTaskTimeframe($timeframe)
    {
        $this->taskTimeframe = $timeframe;
    }

    public function updateUserActivityTimeframe($timeframe)
    {
        $this->userActivityTimeframe = $timeframe;
    }

    private function getProjectData()
    {
        $days = $this->projectTimeframe === 'month' ? 30 : 7;
        return Project::selectRaw('COUNT(*) as count, DATE(created_at) as date')
            ->where('created_at', '>=', Carbon::now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => Carbon::parse($item->date)->format('d/m'),
                    'count' => $item->count,
                ];
            });
    }

    private function getTaskData()
    {
        $days = $this->taskTimeframe === 'month' ? 30 : 7;
        return Task::selectRaw('COUNT(*) as count, status')
            ->where('created_at', '>=', Carbon::now()->subDays($days))
            ->groupBy('status')
            ->get();
    }

    private function getUserActivityData()
    {
        $days = $this->userActivityTimeframe === 'month' ? 30 : 7;
        $startDate = Carbon::now()->subDays($days);

        return User::withCount(['projects' => function ($query) use ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }])
            ->withCount(['tasks' => function ($query) use ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }])
            ->orderByDesc('projects_count')
            ->orderByDesc('tasks_count')
            ->take(10)
            ->get();
    }

    public function render()
    {
        $projectData = $this->getProjectData();
        $taskData = $this->getTaskData();
        $userActivityData = $this->getUserActivityData();

        return view('livewire.admin.charts', [
            'projectData' => $projectData,
            'taskData' => $taskData,
            'userActivityData' => $userActivityData,
        ]);
    }
}

<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Budget;
use Carbon\Carbon;

class Dashboard extends Component
{
    #[Layout('layouts.dashboard')]
    public $timeframe = 'week';
    public $chartData = [];

    public function mount()
    {
        $this->updateChartData();
    }

    public function updateTimeframe($timeframe)
    {
        $this->timeframe = $timeframe;
        $this->updateChartData();
    }

    private function updateChartData()
    {
        $days = $this->timeframe === 'week' ? 7 : 30;
        $labels = [];
        $projectData = [];
        $taskData = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::now()->subDays($i)->format('d/m');
            $projectData[] = Project::whereDate('created_at', $date)->count();
            $taskData[] = Task::whereDate('created_at', $date)->count();
        }

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Projetos',
                    'data' => $projectData,
                    'borderColor' => '#4CAF50',
                    'backgroundColor' => 'rgba(76, 175, 80, 0.1)',
                ],
                [
                    'label' => 'Tarefas',
                    'data' => $taskData,
                    'borderColor' => '#2196F3',
                    'backgroundColor' => 'rgba(33, 150, 243, 0.1)',
                ],
            ],
        ];

        $this->dispatch('chartUpdated', $this->chartData);
    }

    public function render()
    {
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $totalTasks = Task::count();
        $totalBudget = Budget::sum('amount');
        $recentProjects = Project::with('user')->latest()->take(5)->get();
        $upcomingTasks = Task::with('project')->where('due_date', '>=', now())->orderBy('due_date')->take(5)->get();

        return view('livewire.admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalProjects' => $totalProjects,
            'totalTasks' => $totalTasks,
            'totalBudget' => $totalBudget,
            'recentProjects' => $recentProjects,
            'upcomingTasks' => $upcomingTasks,
        ]);
    }
}

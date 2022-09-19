<?php

namespace App\Http\Livewire;

use App\Helpers\Status;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;

class Application extends Component
{
    public $searchDate;

    public $type = null;
    use WithPagination;
    public $perPage = 20;
    protected $paginationTheme = "bootstrap";


    public function render()
    {
        $users = User::all();
        $all = Task::query()->count();
        $new = Task::query()->where('status', Status::NEW)->count();
        $process = Task::query()->where('status', Status::PROCESS)->count();
        $accepted = Task::query()->where('status', Status::ACCEPTED)->count();
        $rejected = Task::query()->where('status', Status::REJECTED)->count();

        $query = Task::query()->where('step_id', '>=', 4);

        $query->when($this->created_at != "", function ($q) {
            return $q
                ->whereDay('created_at', date($this->searchDate))
                ->whereMonth('created_at', date($this->searchDate))
                ->whereYear('created_at', date($this->searchDate));
        });

        $applications = $query->orderBy('id', 'desc')->paginate($this->perPage);
        return view('livewire.application', compact('users', 'applications', 'all', 'new', 'process', 'accepted', 'rejected'));
    }
}

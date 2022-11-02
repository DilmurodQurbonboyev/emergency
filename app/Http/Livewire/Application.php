<?php

namespace App\Http\Livewire;

use App\Models\Appeal;
use Livewire\Component;
use Livewire\WithPagination;

class Application extends Component
{
    use WithPagination;

    public $perPage = 20;
    protected $paginationTheme = "bootstrap";

    public $filter_id;
    public $filter_title;
    public $filter_parent_id;
    public $filter_category;
    public $filter_fullname;
    public $filter_email;
    public $filter_status;
    public $filter_user;
    public $filter_appeal_type;

    public function render()
    {
        $query = Appeal::query();

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_fullname != "", function ($q) {
            return $q->where('fullname', 'like', '%' . $this->filter_fullname . '%');
        });

        $query->when($this->filter_email != "", function ($q) {
            return $q->where('email', 'like', '%' . $this->filter_email . '%');
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });

        $query->when($this->filter_appeal_type != "", function ($q) {
            return $q->where('appeal_type', $this->filter_appeal_type);
        });

        $applications = $query->orderBy('id', 'desc')->paginate($this->perPage);
        return view('livewire.application', compact('applications'));
    }
}

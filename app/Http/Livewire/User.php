<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserData;
use Livewire\WithPagination;


class User extends Component
{

    use WithPagination;

    public $searchId,
        $searchUsername,
        $searchFullname,
        $searchAuthority;

    public $perPage = 20;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $query = \App\Models\User::query();

        $query->when($this->searchId != "", function ($q) {
            return $q->where('id', $this->searchId);
        });

        $query->when($this->searchUsername != "", function ($q) {
            return $q->where('name', 'like', '%' . $this->searchUsername . '%');
        });

        $query->when(true, function ($q) {
            $q->whereHas('userdata', function($userData) {
                $userData->where('full_name', 'like', '%' . $this->searchFullname . '%');
            });
        });

        $users = $query->paginate($this->perPage);
        return view('livewire.user', compact('users'));
    }
}

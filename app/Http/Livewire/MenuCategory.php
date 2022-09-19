<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class MenuCategory extends Component
{
    public $searchId, $searchTitle, $searchUser, $searchStatus;
    public $perPage = 20;
    protected $paginationTheme = "bootstrap";



    use WithPagination;

    public function render()
    {
        $users = User::all();
        $query = \App\Models\MenusCategory::query()->select(['id', 'status', 'creator_id']);

        $query->when($this->searchId != "", function ($q) {
            return $q->where('id', $this->searchId);
        });

        $query->when($this->searchTitle != "", function ($q) {
            return $q->whereHas('menus_category_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->searchTitle . '%');
            });
        });

        $query->when($this->searchStatus != "", function ($q) {
            return $q->where('status', $this->searchStatus);
        });


        $query->when($this->searchUser != "", function ($q) {
            return $q->where('creator_id', $this->searchUser);
        });

        $menusCategories = $query->with('translations')->paginate($this->perPage);
        return view('livewire.menu-category', compact('menusCategories', 'users'));
    }
}

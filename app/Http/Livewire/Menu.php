<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MenusCategory;
use Illuminate\Database\Eloquent\Builder;


class Menu extends Component
{
    public $filter_id;
    public $filter_title;
    public $filter_parent_id;
    public $filter_category;
    public $filter_link;
    public $filter_status;
    public $filter_user;
    public $filter_link_type;

    use WithPagination;

    public $perPage = 20;
    protected $paginationTheme = "bootstrap";


    public function render()
    {
        $users = User::all();
        $parentMenus = \App\Models\Menu::query()->get();
        $menusCategories = MenusCategory::query()->with('menus_category_translation')->get();
        $query = \App\Models\Menu::query()->select([
            'id',
            'link',
            'link_type',
            'menus_category_id',
            'parent_id',
            'status',
            'creator_id'
        ]);

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_category != "", function ($q) {
            return $q->where('menus_category_id', $this->filter_category);
        });

        $query->when($this->filter_link_type != "", function ($q) {
            return $q->where('link_type', $this->filter_link_type);
        });


        $query->when($this->filter_parent_id != "", function ($q) {
            return $q->where('parent_id', $this->filter_parent_id);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('menus_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->filter_title . '%');
            });
        });

        $query->when($this->filter_link != "", function ($q) {
            return $q->where('link', 'like', '%' . $this->filter_link . '%');
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });


        $query->when($this->filter_user != "", function ($q) {
            return $q->where('creator_id', $this->filter_user);
        });

        $menus = $query->paginate($this->perPage);
        return view('livewire.menu', compact('menus', 'users', 'parentMenus', 'menusCategories'));
    }
}

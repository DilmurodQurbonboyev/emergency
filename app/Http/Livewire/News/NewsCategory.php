<?php

namespace App\Http\Livewire\News;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ListCategory;
use Illuminate\Database\Eloquent\Builder;

class NewsCategory extends Component
{
    use WithPagination;

    public $perPage = 20;
    protected $paginationTheme = "bootstrap";


    public $filter_id,
        $filter_title,
        $filter_parent_id,
        $filter_slug,
        $filter_status,
        $filter_user;


    public function render()
    {
        $users = User::all();

        $query = ListCategory::query()->where('list_type_id', 1);

        $newsParent = ListCategory::query()->where('list_type_id', 1)->get();

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_parent_id != "", function ($q) {
            return $q->where('parent_id', $this->filter_parent_id);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('lists_category_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->filter_title . '%');
            });
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });

        $query->when($this->filter_slug != "", function ($q) {
            return $q->where('slug', 'like', '%' . $this->filter_slug . '%');
        });

        $query->when($this->filter_user != "", function ($q) {
            return $q->where('creator_id', $this->filter_user);
        });

        $news = $query->paginate($this->perPage);

        return view('livewire.news.news-category', compact('users', 'newsParent', 'news'));
    }
}

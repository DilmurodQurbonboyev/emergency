<?php

namespace App\View\Components\Frontend;

use App\Models\Lists;
use App\Models\ListCategory;
use Illuminate\View\Component;

class News extends Component
{
    public $categories;
    public $news;
    public $lastItem;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lastItem = Lists::query()
            ->where('list_type_id', 1)
            ->where('lists_category_id', 1)
            ->where('status', 2)
            ->latest()
            ->first();

        $this->categories = ListCategory::query()
            ->where('list_type_id', 1)
            ->where('parent_id', '!=', null)
            ->where('status', 2)
            ->with('lists')
            ->get();

        $this->news = Lists::query()
            ->where('list_type_id', 1)
            ->where('lists_category_id', 1)
            ->where('status', 2)
            ->orderBy('date', 'desc')
            ->orderBy('order')
            ->orderBy('id', 'desc')
            ->skip(1)
            ->take(4)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.news');
    }
}

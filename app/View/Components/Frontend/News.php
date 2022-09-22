<?php

namespace App\View\Components\Frontend;

use App\Models\Lists;
use App\Models\ListCategory;
use Illuminate\View\Component;

class News extends Component
{
    public $news;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->news = Lists::query()
            ->join('lists_translations', 'lists.id', '=', 'lists_translations.lists_id')
            ->join('list_categories', 'lists.lists_category_id', '=', 'list_categories.id')
            ->join('list_category_translations', 'list_categories.id', '=', 'list_category_translations.list_category_id')
            ->where('lists_translations.title', '!=', null)
            ->where('lists_translations.locale', '=', app()->getLocale())
            ->where('list_category_translations.title', '!=', null)
            ->where('list_category_translations.locale', '=', app()->getLocale())
            ->where('lists.list_type_id', 1)
            ->where('lists.lists_category_id', 1)
            ->where('lists.status', 2)
            ->orderBy('lists.date', 'desc')
            ->orderBy('lists.order')
            ->take(5)
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

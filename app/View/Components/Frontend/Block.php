<?php

namespace App\View\Components\Frontend;

use App\Models\ListCategory;
use App\Models\Lists;
use Illuminate\View\Component;

class Block extends Component
{
    public $blocks;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->blocks = Lists::query()
            ->select([
                'lists.id',
                'lists_translations.title',
                'lists_translations.description',
                'lists.anons_image',
                'lists.slug',
                'lists.date',
            ])
            ->join('lists_translations', 'lists.id', '=', 'lists_translations.lists_id')
            ->where('lists_translations.title', '!=', null)
            ->where('lists_translations.locale', '=', app()->getLocale())
            ->where('lists.list_type_id', 1)
            ->where('lists.lists_category_id', 4)
            ->where('lists.status', 2)
            ->orderBy('lists.date', 'desc')
            ->orderBy('lists.order')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.block');
    }
}

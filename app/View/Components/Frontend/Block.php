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
            ->where('list_type_id', 1)
            ->where('lists_category_id', 4)
            ->where('status', 2)
            ->orderBy('date', 'desc')
            ->orderBy('order')
            ->orderBy('id', 'desc')
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

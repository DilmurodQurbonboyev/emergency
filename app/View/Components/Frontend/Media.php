<?php

namespace App\View\Components\Frontend;

use App\Models\Lists;
use Illuminate\View\Component;

class Media extends Component
{
    public $medias;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->medias = Lists::query()
            ->whereIn('list_type_id', [7, 8])
            ->whereIn('lists_category_id', [6, 7])
            ->where('status', 2)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.media');
    }
}

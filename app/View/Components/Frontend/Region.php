<?php

namespace App\View\Components\Frontend;

use App\Models\Management;
use Illuminate\View\Component;

class Region extends Component
{
    public $managements;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->managements = Management::query()
            ->where('list_type_id', 10)
            ->where('m_category_id', 1)
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
        return view('components.frontend.region');
    }
}

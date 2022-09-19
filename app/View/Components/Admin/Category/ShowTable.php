<?php

namespace App\View\Components\Admin\Category;

use Illuminate\View\Component;
use function view;

class ShowTable extends Component
{
    public $param;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($param, $route)
    {
        $this->param = $param;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.category.show-table');
    }
}

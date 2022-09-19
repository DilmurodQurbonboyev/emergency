<?php

namespace App\View\Components\Admin\Menu;

use Illuminate\View\Component;

class Trashes extends Component
{
    public $params;
    public $route;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($params, $route, $title)
    {
        $this->params = $params;
        $this->route = $route;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.menu.trashes');
    }
}

<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class BreadcrumbShow extends Component
{
    public $id;
    public $show;
    public $breadcrumb;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcrumb, $id = null, $show = null)
    {
        $this->show = $show;
        $this->id = $id;
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.breadcrumb-show');
    }
}

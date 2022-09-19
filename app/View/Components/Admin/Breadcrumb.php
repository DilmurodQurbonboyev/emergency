<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $id;
    public $title;
    public $breadcrumb;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $breadcrumb, $id = null)
    {
        $this->title = $title;
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
        return view('components.admin.breadcrumb');
    }
}

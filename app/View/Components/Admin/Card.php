<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Card extends Component
{
    public $icon;
    public $title;
    public $value;
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon, $title, $url, $value)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->url = $url;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.card');
    }
}

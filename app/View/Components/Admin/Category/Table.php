<?php

namespace App\View\Components\Admin\Category;

use Illuminate\View\Component;

class Table extends Component
{
    public $params;
    public $categories;
    public $users;
    public $route;

    public function __construct($params, $categories, $users, $route)
    {
        $this->params = $params;
        $this->categories = $categories;
        $this->users = $users;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.admin.category.table');
    }
}

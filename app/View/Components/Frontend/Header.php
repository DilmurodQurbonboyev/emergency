<?php

namespace App\View\Components\Frontend;

use App\Models\Menu;
use Illuminate\View\Component;

class Header extends Component
{
    public $top_menu;
    public $top_menu_tree;

    public function __construct()
    {
        $this->top_menu = Menu::query()
            ->select(['id', 'link', 'link_type', 'parent_id'])
            ->where('menus_category_id', 1)
            ->where('status', 2)
            ->orderBy('order')
            ->orderBy('id')
            ->with(
                [
                    'translations' => function ($query) {
                        $query->where('locale', app()->getLocale());
                    }
                ]
            )
            ->get();

        $this->top_menu_tree = Menu::buildTree($this->top_menu->toArray());
    }

    public function render()
    {
        return view('components.frontend.header');
    }
}

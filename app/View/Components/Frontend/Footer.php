<?php

namespace App\View\Components\Frontend;

use App\Models\Contact;
use App\Models\Lists;
use App\Models\Menu;
use Illuminate\View\Component;

class Footer extends Component
{
    public $top_menu;
    public $top_menu_tree;
    public $socials;
    public $contact;


    /**
     * Create a new component instance.
     *
     * @return void
     */
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

        $this->socials = Lists::query()
            ->where('list_type_id', 6)
            ->where('lists_category_id', 5)
            ->where('status', 2)
            ->get();

        $this->contact = Contact::query()
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.footer');
    }
}

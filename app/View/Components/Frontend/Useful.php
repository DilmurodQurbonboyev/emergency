<?php

namespace App\View\Components\Frontend;

use App\Models\Lists;
use Illuminate\View\Component;

class Useful extends Component
{
    public $usefuls;

    public function __construct()
    {
        $this->usefuls = Lists::query()
            ->select([
                'lists.link_type',
                'lists_translations.title',
                'lists.date',
                'lists.image',
                'lists.link'
            ])
            ->join('lists_translations', 'lists.id', '=', 'lists_translations.lists_id')
            ->where('lists_translations.title', '!=', null)
            ->where('lists_translations.locale', '=', app()->getLocale())
            ->where('list_type_id', 6)
            ->where('lists_category_id', 3)
            ->orderBy('lists.date', 'desc')
            ->orderBy('lists.order')
            ->get();
    }

    public function render()
    {
        return view('components.frontend.useful');
    }
}

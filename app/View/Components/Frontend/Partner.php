<?php

namespace App\View\Components\Frontend;

use App\Models\Lists;
use Illuminate\View\Component;

class Partner extends Component
{
    public $partners;

    public function __construct()
    {
        $this->partners = Lists::query()
            ->where('list_type_id', 6)
            ->where('lists_category_id', 2)
            ->orderBy('date', 'desc')
            ->orderBy('order')
            ->orderBy('id', 'desc')
            ->with(
                [
                    'translations' => function ($query) {
                        $query->where('locale', app()->getLocale());
                    }
                ]
            )
            ->get();
    }

    public function render()
    {
        return view('components.frontend.partner');
    }
}

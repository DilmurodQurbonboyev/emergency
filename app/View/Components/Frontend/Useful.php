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
            ->where('list_type_id', 6)
            ->where('lists_category_id', 3)
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
        return view('components.frontend.useful');
    }
}

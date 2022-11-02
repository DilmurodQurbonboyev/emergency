<?php

namespace App\View\Components\Frontend;

use App\Models\Stat;
use Illuminate\View\Component;

class Service extends Component
{
    public $stats;

    public function __construct()
    {
        $this->stats = Stat::query()
            ->select([
                'stats.id',
                'stats.count',
                'stats.image',
                'stats.year',
                'stat_translations.title as title',
            ])
            ->join('stat_translations', 'stats.id', '=', 'stat_translations.stat_id')
            ->where('stat_translations.title', '!=', null)
            ->where('stat_translations.locale', '=', app()->getLocale())
            ->where('stats.year', now()->format('Y'))
            ->get();
    }

    public function render()
    {
        return view('components.frontend.service');
    }
}

<?php

namespace App\Observers;

use App\Models\Management;
use App\Models\SiteLog;
use App\Services\SiteLogService;
use Illuminate\Support\Facades\Request;

class ManagementObserver
{
    private $siteLogService;

    public function __construct(SiteLogService $siteLogService)
    {
        $this->siteLogService = $siteLogService;
    }
    /**
     * Handle the Management "created" event.
     *
     * @param  \App\Models\Management  $management
     * @return void
     */
    public function created(Management $management): void
    {
        $this->siteLogService->save($management, 'created');
    }

    /**
     * Handle the Management "updated" event.
     *
     * @param  \App\Models\Management  $management
     * @return void
     */
    public function updated(Management $management): void
    {
        $this->siteLogService->save($management, 'updated');
    }

    /**
     * Handle the Management "deleted" event.
     *
     * @param  \App\Models\Management  $management
     * @return void
     */
    public function deleted(Management $management): void
    {
        $this->siteLogService->save($management, 'deleted');
    }

    /**
     * Handle the Management "restored" event.
     *
     * @param  \App\Models\Management  $management
     * @return void
     */
    public function restored(Management $management): void
    {
        $this->siteLogService->save($management, 'restored');
    }

    /**
     * Handle the Management "force deleted" event.
     *
     * @param  \App\Models\Management  $management
     * @return void
     */
    public function forceDeleted(Management $management): void
    {
        $this->siteLogService->save($management, 'forceDeleted');
    }
}

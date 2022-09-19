<?php

namespace App\Observers;

use App\Models\Lists;
use App\Models\SiteLog;
use App\Services\SiteLogService;
use Illuminate\Support\Facades\Request;

class ListsObserver
{
    private $siteLogService;

    public function __construct(SiteLogService $siteLogService)
    {
        $this->siteLogService = $siteLogService;
    }


    /**
     * Handle the Lists "created" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function created(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'created');
    }

    /**
     * Handle the Lists "updated" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function updated(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'updated');
    }

    /**
     * Handle the Lists "deleted" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function deleted(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'deleted');
    }

    /**
     * Handle the Lists "restored" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function restored(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'restored');
    }

    /**
     * Handle the Lists "force deleted" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function forceDeleted(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'forceDeleted');
    }
}

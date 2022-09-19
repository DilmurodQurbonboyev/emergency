<?php

namespace App\Observers;

use App\Models\MCategory;
use App\Models\SiteLog;
use App\Services\SiteLogService;
use Illuminate\Support\Facades\Request;

class MCategoryObserver
{
    private $siteLogService;

    public function __construct(SiteLogService $siteLogService)
    {
        $this->siteLogService = $siteLogService;
    }

    /**
     * Handle the MCategory "created" event.
     *
     * @param \App\Models\MCategory $mCategory
     * @return void
     */
    public function created(MCategory $mCategory): void
    {
        $this->siteLogService->save($mCategory, 'created');
    }

    /**
     * Handle the MCategory "updated" event.
     *
     * @param \App\Models\MCategory $mCategory
     * @return void
     */
    public function updated(MCategory $mCategory): void
    {
        $this->siteLogService->save($mCategory, 'updated');
    }

    /**
     * Handle the MCategory "deleted" event.
     *
     * @param \App\Models\MCategory $mCategory
     * @return void
     */
    public function deleted(MCategory $mCategory): void
    {
        $this->siteLogService->save($mCategory, 'deleted');
    }

    /**
     * Handle the MCategory "restored" event.
     *
     * @param \App\Models\MCategory $mCategory
     * @return void
     */
    public function restored(MCategory $mCategory)
    {
        $this->siteLogService->save($mCategory, 'restored');
    }

    /**
     * Handle the MCategory "force deleted" event.
     *
     * @param \App\Models\MCategory $mCategory
     * @return void
     */
    public function forceDeleted(MCategory $mCategory): void
    {
        $this->siteLogService->save($mCategory, 'forceDeleted');
    }
}

<?php

namespace App\Observers;

use App\Models\ListCategory;
use App\Models\SiteLog;
use App\Services\SiteLogService;
use Illuminate\Support\Facades\Request;

class ListCategoryObserver
{
    private $siteLogService;

    public function __construct(SiteLogService $siteLogService)
    {
        $this->siteLogService = $siteLogService;
    }

    /**
     * Handle the ListCategory "created" event.
     *
     * @param \App\Models\ListCategory $listCategory
     * @return void
     */
    public function created(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'created');
    }

    /**
     * Handle the ListCategory "updated" event.
     *
     * @param \App\Models\ListCategory $listCategory
     * @return void
     */
    public function updated(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'updated');
    }

    /**
     * Handle the ListCategory "deleted" event.
     *
     * @param \App\Models\ListCategory $listCategory
     * @return void
     */
    public function deleted(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'deleted');
    }

    /**
     * Handle the ListCategory "restored" event.
     *
     * @param \App\Models\ListCategory $listCategory
     * @return void
     */
    public function restored(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'restored');
    }

    /**
     * Handle the ListCategory "force deleted" event.
     *
     * @param \App\Models\ListCategory $listCategory
     * @return void
     */
    public function forceDeleted(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'forceDeleted');
    }
}

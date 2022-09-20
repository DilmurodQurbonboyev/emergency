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

    public function created(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'created');
    }

    public function updated(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'updated');
    }

    public function deleted(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'deleted');
    }

    public function restored(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'restored');
    }

    public function forceDeleted(ListCategory $listCategory): void
    {
        $this->siteLogService->save($listCategory, 'forceDeleted');
    }
}

<?php

namespace App\Observers;

use App\Models\Lists;
use App\Services\SiteLogService;
use Illuminate\Http\Request;

class ListsObserver
{
    private $siteLogService;

    public function __construct(SiteLogService $siteLogService)
    {
        $this->siteLogService = $siteLogService;
    }

    public function created(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'created');
    }

    public function updated(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'updated');
    }

    public function deleted(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'deleted');
    }

    public function restored(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'restored');
    }

    public function forceDeleted(Lists $lists): void
    {
        $this->siteLogService->save($lists, 'forceDeleted');
    }
}

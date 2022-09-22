<?php

namespace App\Providers;

use App\Models\Lists;
use App\Models\MCategory;
use App\Models\Management;
use App\Models\ListCategory;
use App\Observers\ListsObserver;
use App\Observers\MCategoryObserver;
use App\Observers\ManagementObserver;
use Illuminate\Auth\Events\Registered;
use App\Observers\ListCategoryObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot()
    {
        ListCategory::observe(ListCategoryObserver::class);
        Lists::observe(ListsObserver::class);
        MCategory::observe(MCategoryObserver::class);
        Management::observe(ManagementObserver::class);
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}

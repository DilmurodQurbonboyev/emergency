<?php

namespace App\Providers;

use App\Models\ListCategory;
use App\Models\Lists;
use App\Models\Management;
use App\Models\MCategory;
use App\Observers\ListCategoryObserver;
use App\Observers\ListsObserver;
use App\Observers\ManagementObserver;
use App\Observers\MCategoryObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        ListCategory::observe(ListCategoryObserver::class);
        Lists::observe(ListsObserver::class);
        MCategory::observe(MCategoryObserver::class);
        Management::observe(ManagementObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Authority;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = array(
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class
    );

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function () {

            $authority = session()->get('current_authority');

            $admins = Authority::query()
                ->select('id', 'code')
                ->whereIn('id', [1, 2])
                ->get();

            foreach ($admins as $admin) {
                if ($authority->code == $admin->code) {
                    return true;
                }
            }
        });
    }
}

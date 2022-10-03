<?php

namespace App\Providers;
use App\Models\Banner;
use App\Models\Blog;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Banner' => 'App\Policies\BannerPolicy',
        'App\Models\Blog' => 'App\Policies\BlogPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Student' => 'App\Policies\StudentPolicy',
        'App\Models\Level' => 'App\Policies\LevelPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

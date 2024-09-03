<?php

namespace App\Providers;

use App\Repositories\Contracts\DistrictRepositoryInterface;
use App\Repositories\Contracts\ProvinceRepositoryInterface;
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\WardRepositoryInterface;
use App\Repositories\DistrictRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\WardRepository;
use App\Services\Contracts\DistrictServiceInterface;
use App\Services\Contracts\ProvinceServiceInterface;
use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\Contracts\WardServiceInterface;
use App\Services\DistrictService;
use App\Services\ProvinceService;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\WardService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->singleton(ProvinceRepositoryInterface::class, ProvinceRepository::class);
        $this->app->bind(ProvinceServiceInterface::class, ProvinceService::class);

        $this->app->singleton(DistrictRepositoryInterface::class, DistrictRepository::class);
        $this->app->bind(DistrictServiceInterface::class, DistrictService::class);

        $this->app->singleton(WardRepositoryInterface::class, WardRepository::class);
        $this->app->bind(WardServiceInterface::class, WardService::class);

        $this->app->singleton(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

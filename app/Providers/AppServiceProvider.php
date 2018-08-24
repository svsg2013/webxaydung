<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Cates\CateRepositoryInterface::class,
            \App\Repositories\Cates\CateEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\News\NewsRepositoryInterface::class,
            \App\Repositories\News\NewsEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Tags\TagsRepositoryInterface::class,
            \App\Repositories\Tags\TagsEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Users\UsersRepositoryInterface::class,
            \App\Repositories\Users\UsersEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CateProd\CateProdRepositoryInterface::class,
            \App\Repositories\CateProd\CateProdEloquentRepository::class
        );
        $this->app->singleton(
          \App\Repositories\Prods\ProdsRepositoryInterface::class,
          \App\Repositories\Prods\ProdsEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Slider\SliderRepositoryInterface::class,
            \App\Repositories\Slider\SliderEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Partners\PartnerRepositoryInterface::class,
            \App\Repositories\Partners\PartnerEloquentRepository::class
        );
        $this->app->singleton(
          \App\Repositories\Fur\FurnitureRepositoryInterface::class,
          \App\Repositories\Fur\FurnitureEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CateFur\CateFurRepositoryInterface::class,
            \App\Repositories\CateFur\CateFurEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CateTtPhongThuy\CateTtPhongthuyRepositoryInterface::class,
            \App\Repositories\CateTtPhongThuy\CateTtPhongthuyEloquentRepository::class
        );        $this->app->singleton(
            \App\Repositories\Fengshui\FengshuiRepositoryInterface::class,
            \App\Repositories\Fengshui\FengshuiEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\BaTu\BatuRepositoryInterface::class,
            \App\Repositories\BaTu\BatuEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\TuDu\TuduRepositoryInterface::class,
            \App\Repositories\TuDu\TuduEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CateBDS\CateBDSRepositoryInterface::class,
            \App\Repositories\CateBDS\CateBDSEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\NewsBDS\NewsBDSRepositoryInterface::class,
            \App\Repositories\NewsBDS\NewsBDSEloquentRepository::class
        );
    }
}

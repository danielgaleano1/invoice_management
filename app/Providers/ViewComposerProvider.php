<?php

namespace App\Providers;

use App\Http\View\Composers\CachedCitiesList;
use App\Http\View\Composers\CachedCollaboratorsList;
use App\Http\View\Composers\CachedClientsList;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'client/__form_create', CachedCitiesList::class
        );

        View::composer(
            'client/__form', CachedCitiesList::class
        );
        
        View::composer(
            'invoice/__form', CachedCollaboratorsList::class
        );

        View::composer(
            'invoice/__form', CachedClientsList::class
        );
    }
}

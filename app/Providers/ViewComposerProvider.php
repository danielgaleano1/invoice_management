<?php

namespace App\Providers;

use App\Http\View\Composers\CachedCitiesList;
use App\Http\View\Composers\CachedCollaboratorsList;
use App\Http\View\Composers\CachedClientsList;
use App\Http\View\Composers\CachedDocumentTypesList;
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
            'client/__form', CachedCitiesList::class
        );

        View::composer(
            'client/__form', CachedDocumentTypesList::class
        );
        
        View::composer(
            'invoice/__form', CachedCollaboratorsList::class
        );

        View::composer(
            'invoice/__form', CachedClientsList::class
        );
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ClocherComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeListClocher();

    }

    public function composeListClocher()
    {
        view()->composer(['intention.form', 'intention.index', 'intention.ajax', 'intention.addintention','filterIntention.index', 'filterIntention.form', 'accueil.recherche', 'intention.editform', 'accueil.addintention', 'accueil.export'], 'App\Http\ViewComposers\ListClocherComposer');
    }
}

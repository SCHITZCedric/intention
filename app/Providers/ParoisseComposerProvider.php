<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ParoisseComposerProvider extends ServiceProvider
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
        $this->composeListParoisse();
    }

    public function composeListParoisse()
    {
      view()->composer(['clocher.form', 'celebrant.form', 'utilisateur.adduser', 'utilisateur.edituser'], 'App\Http\ViewComposers\ListParoisseComposer');
    }
}

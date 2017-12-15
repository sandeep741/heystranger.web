<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormMacroServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {

        require base_path() . '/resources/macros/macro-select.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}

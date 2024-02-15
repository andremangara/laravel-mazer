<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('dateformat', function ($request) {
            return "<?php echo date('d-m-Y', strtotime($request)); ?>";
        });

        Blade::directive("money", function ($amount) {
            return "<?php echo '$' . number_format($amount, 2); ?>";
        });
    }
}

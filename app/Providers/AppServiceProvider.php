<?php

namespace App\Providers;

use App\Dato;
use App\Red;

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
        \Schema::defaultStringLength(191);

        $telefono   = Dato::where('tipo', 'telefono')->first();
        $telefono2  = Dato::where('tipo', 'telefono2')->first();
        $direccion  = Dato::where('tipo', 'direccion')->first();
        $facebook   = Red::where('nombre', 'facebook')->first();
        $youtube    = Red::where('nombre', 'youtube')->first();
        $email      = Dato::where('tipo', 'email')->first();

        view()->share([
            'telefono'   => $telefono,
            'telefono2'  => $telefono2,
            'direccion'  => $direccion,
            'email'      => $email,
            'facebook'   => $facebook,
            'youtube'    => $youtube,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

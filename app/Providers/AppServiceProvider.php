<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logo;
use App\Contacto;
use App\Social;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $redes = Social::all();
        $principal = Logo::find(1);
        $favicon = Logo::find(2);
        $korban = Logo::find(3);
        $korban1 = Logo::find(4);
        $korban2 = Logo::find(5);
        $direccion = Contacto::find(1);
        $telefono = Contacto::find(2);
        $email = Contacto::find(3);

        return view()->share(compact('principal', 'favicon', 'korban', 'korban1', 'korban2', 'direccion', 'telefono', 'email', 'redes'));
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

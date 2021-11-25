<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Exceptions\ParamMissingException;
use Illuminate\Http\Request;

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
        Paginator::useBootstrap();
        $this->macroFunction();
    }

    public function macroFunction(){
        Request::macro('require', function ($name, $required = true) {
            if ($this->has($name))
                return $this->$name;
            if ($required) {
                throw new ParamMissingException('Parameter Missing::' . $name);
            }
            return '';
        });
    }
}

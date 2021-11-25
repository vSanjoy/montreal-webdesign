<?php
/*****************************************************/
# Page/Class name   : ApiTokenMiddleware
# Purpose           : Restriction for users
/*****************************************************/
namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use App;
use Hash;
use Response;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Language section
        if ( $request->query('lang') ) {
            $requestLanguage  = $request->query('lang');
            if (!$requestLanguage) {
                $requestLanguage =  App::getLocale();
            }
            App::setLocale($requestLanguage);
        }
        return $next($request);
    }
}

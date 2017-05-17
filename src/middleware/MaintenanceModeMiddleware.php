<?php

namespace Mahmud\MaintenanceMode\Middleware;

use Closure;
use Illuminate\Http\Request;

class MaintenanceModeMiddleware
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
        //@Todo set APP_STATUS and UP_TIME in .env
        if($this->isDownForMaintenance() && ! $this->isDevMode($request)){
            if($request->get('mode', '') == 'dev'){
                //@Todo set cookie expire time in config
                return $next($request)->withCookie(cookie('mode', 'dev', 1));
            }else{
                abort(503);
            }
        }
        return $next($request);
    }

    private function isDownForMaintenance(){
        return env('APP_STATUS', 'up') == 'down';
    }

    private function isDevMode(Request $request){
        return $request->cookie('mode') == 'dev';
    }
}

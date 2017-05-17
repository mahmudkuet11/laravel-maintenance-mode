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
                return $this->maintenanceModeResponse($request);
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

    private function maintenanceModeResponse(Request $request){
        //@Todo set status code and json error message from config
        if($request->wantsJson()){
            return response()->json(['error' => 'Application down for maintenance'], 515);
        }
        //@Todo set view file and status code from config
        return response()->view('maintenance-mode::maintenance-mode', [], 515);
    }
}

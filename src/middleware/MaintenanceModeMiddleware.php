<?php

namespace Mahmud\MaintenanceMode\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mahmud\MaintenanceMode\Config;

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
        if($this->isDownForMaintenance() && ! $this->isDevMode($request)){
            if($request->get('mode', '') == 'dev'){
                return $next($request)->withCookie(cookie('mode', 'dev', Config::getCookieExpMinute()));
            }else{
                return $this->maintenanceModeResponse($request);
            }
        }
        return $next($request);
    }

    private function isDownForMaintenance(){
        return Config::getAppStatus() == 'down';
    }

    private function isDevMode(Request $request){
        return $request->cookie('mode') == 'dev';
    }

    private function maintenanceModeResponse(Request $request){
        if($request->wantsJson()){
            return response()->json(['error' => Config::getAppDownMessage()], Config::getDownStatusCode());
        }
        return response()->view(Config::getView(), [], Config::getDownStatusCode());
    }
}

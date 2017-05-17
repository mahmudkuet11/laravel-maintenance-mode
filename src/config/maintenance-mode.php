<?php

return [
    'app_status'        =>  env('APP_STATUS', 'up'),
    'up_time'           =>  env('UP_TIME', \Carbon\Carbon::tomorrow()),
    'cookie_exp_min'    =>  1,
    'down_status_code'  =>  503,
    'app_down_msg'      =>  'Application is down for maintenance',
    'view'              =>  'maintenance-mode::maintenance-mode',
];
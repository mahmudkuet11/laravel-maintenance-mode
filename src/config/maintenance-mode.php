<?php

return [
    /*
    |--------------------------------------------------------------------------------
    | Application Status
    |--------------------------------------------------------------------------------
    |
    | This is the status of your app. Possible value are: down | up . When you start
    | maintenance work, you should set the status to down. You can also set the
    | status from .env file. Just set "APP_STATUS=down" in your environment.
    */
    'app_status'        =>  env('APP_STATUS', 'up'),

    /*
    |----------------------------------------------------------------------------
    | Application Up Time
    |----------------------------------------------------------------------------
    |
    | You should set time when your application will be up. You can set up time
    | from .env file by setting UP_TIME='YYYY-MM-DD hh:mm:ss' in this format.
    */
    'up_time'           =>  env('UP_TIME', '2020-01-01 00:00:00'),

    /*
    |----------------------------------------------------------------------------
    | Dev mode expiration time
    |----------------------------------------------------------------------------
    |
    | Dev mode will be expired after specified minutes. After being expired user
    | should visit the site with mode=dev query param to start dev session again.
    */
    'cookie_exp_min'    =>  1,

    /*
    |----------------------------------------------------------------------------
    | App Down Status Code
    |----------------------------------------------------------------------------
    |
    | This status code will be send with the header when you app is down.
    */
    'down_status_code'  =>  503,

   /*
   |----------------------------------------------------------------------------
   | App Down Message
   |----------------------------------------------------------------------------
   |
   | This message will be sent as a response when client sent AJAX request to
   | the app. Response will be in JSON format where key is 'error' and
   | value is the message.
   */
    'app_down_msg'      =>  'Application is down for maintenance',

    /*
   |----------------------------------------------------------------------------
   | Maintenance Mode view
   |----------------------------------------------------------------------------
   |
   | This view is returned when your application is down. You can set a custom
   | view by specifying the view path here. i.e. admin.custom_view
   */
    'view'              =>  'maintenance-mode::maintenance-mode',
];
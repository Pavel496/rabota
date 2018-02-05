<?php

return [

    /*
     * All models that use the GetsCleanedUp interface in these directories will be cleaned.
     */
    'directories' => [
        app_path(''),
    ],

    /*
     * All models in this array that use the GetsCleanedUp interface will be cleaned.
     */
    'models' => [
        App\Resume::class,
    ],

];

<?php

/**
 * Define services aliases and service providers
 * that will be loaded On application start.
 *
 */

return [

    'ServiceLocators' => [
        //
    ],

    'ServiceProviders' => [
        \Middleware\Csrf::class,
    ],

];

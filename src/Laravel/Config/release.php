<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel-Release Configuration
    |--------------------------------------------------------------------------
    */
    
    /*
    |--------------------------------------------------------------------------
    | Scripts
    |--------------------------------------------------------------------------
    |
    | List of classes to be executed during a release run.
    |
    | Example: App\Release\CreateVersion::Class
    |
    */
   
    'scripts' => [
        stekel\LaravelRelease\Scripts\Yarn::class,
        stekel\LaravelRelease\Scripts\ComposerDump::class,
    ],
];

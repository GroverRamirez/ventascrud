<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disco de sistema de archivos predeterminado
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el disco de sistema de archivos predeterminado que debe
    | ser utilizado por el framework. El disco "local", así como una variedad de discos
    | basados en la nube, están disponibles para el almacenamiento de archivos de tu aplicación.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Discos de sistema de archivos
    |--------------------------------------------------------------------------
    |
    | A continuación puedes configurar tantos discos de sistema de archivos como sea necesario,
    | e incluso puedes configurar múltiples discos para el mismo driver. Aquí se configuran
    | ejemplos para la mayoría de los drivers de almacenamiento soportados como referencia.
    |
    | Drivers soportados: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Enlaces simbólicos
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar los enlaces simbólicos que se crearán cuando se ejecute el
    | comando Artisan `storage:link`. Las claves del array deben ser las ubicaciones de los
    | enlaces y los valores deben ser sus destinos.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

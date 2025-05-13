<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nombre de la aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor es el nombre de tu aplicación, que se usará cuando el framework
    | necesite colocar el nombre de la aplicación en una notificación u otros
    | elementos de la interfaz donde se deba mostrar el nombre de la aplicación.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Entorno de la aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor determina el "entorno" en el que tu aplicación se está ejecutando
    | actualmente. Esto puede determinar cómo prefieres configurar varios servicios
    | que utiliza la aplicación. Establece esto en tu archivo ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de depuración de la aplicación
    |--------------------------------------------------------------------------
    |
    | Cuando tu aplicación está en modo de depuración, se mostrarán mensajes de error
    | detallados con trazas de pila en cada error que ocurra dentro de tu aplicación.
    | Si está deshabilitado, se mostrará una página de error genérica simple.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de la aplicación
    |--------------------------------------------------------------------------
    |
    | Esta URL es utilizada por la consola para generar correctamente URLs cuando se
    | utiliza la herramienta de línea de comandos Artisan. Debes establecer esto en la
    | raíz de la aplicación para que esté disponible dentro de los comandos de Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Zona horaria de la aplicación
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar la zona horaria predeterminada para tu aplicación, que
    | será utilizada por las funciones de fecha y hora de PHP. La zona horaria está
    | establecida en "UTC" por defecto ya que es adecuada para la mayoría de los casos.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Configuración de idioma de la aplicación
    |--------------------------------------------------------------------------
    |
    | El idioma de la aplicación determina el idioma predeterminado que será utilizado
    | por los métodos de traducción/localización de Laravel. Esta opción puede ser
    | establecida a cualquier idioma para el cual planees tener archivos de traducción.
    |
    */

    'locale' => 'es',

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Clave de encriptación
    |--------------------------------------------------------------------------
    |
    | Esta clave es utilizada por los servicios de encriptación de Laravel y debe ser
    | establecida a una cadena aleatoria de 32 caracteres para asegurar que todos los
    | valores encriptados sean seguros. Debes hacer esto antes de desplegar la aplicación.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Driver de modo mantenimiento
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración determinan el driver utilizado para determinar y
    | gestionar el estado de "modo mantenimiento" de Laravel. El driver "cache" permitirá
    | que el modo mantenimiento sea controlado en múltiples máquinas.
    |
    | Drivers soportados: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];

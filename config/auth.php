<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Autenticación por defecto
    |--------------------------------------------------------------------------
    |
    | Esta opción define el "guard" de autenticación y el "broker" de restablecimiento
    | de contraseñas predeterminados para tu aplicación. Puedes cambiar estos valores
    | según sea necesario, pero son un buen punto de partida para la mayoría de aplicaciones.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Guards de autenticación
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir cada guard de autenticación para tu aplicación.
    | Por defecto, se ha definido una configuración que utiliza almacenamiento
    | de sesión y el proveedor de usuarios Eloquent.
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios, que define
    | cómo se recuperan los usuarios de tu base de datos u otro sistema de almacenamiento.
    | Normalmente se utiliza Eloquent.
    |
    | Soportados: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Proveedores de usuarios
    |--------------------------------------------------------------------------
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios, que define
    | cómo se recuperan los usuarios de tu base de datos u otro sistema de almacenamiento.
    | Normalmente se utiliza Eloquent.
    |
    | Si tienes varias tablas o modelos de usuarios, puedes configurar múltiples
    | proveedores para representar cada modelo/tabla. Estos proveedores pueden ser
    | asignados a cualquier guard de autenticación adicional que hayas definido.
    |
    | Soportados: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Restablecimiento de contraseñas
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración especifican el comportamiento de la funcionalidad
    | de restablecimiento de contraseñas de Laravel, incluyendo la tabla utilizada para
    | almacenar los tokens y el proveedor de usuarios que se invoca para recuperar usuarios.
    |
    | El tiempo de expiración es el número de minutos que cada token de restablecimiento
    | será considerado válido. Esta característica de seguridad mantiene los tokens con
    | una vida corta para que tengan menos tiempo de ser adivinados. Puedes cambiar esto
    | según sea necesario.
    |
    | La opción de "throttle" es el número de segundos que un usuario debe esperar antes
    | de generar más tokens de restablecimiento de contraseña. Esto previene que el usuario
    | genere rápidamente una gran cantidad de tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tiempo de espera para confirmación de contraseña
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir la cantidad de segundos antes de que expire la ventana de
    | confirmación de contraseña y se le pida al usuario que vuelva a ingresar su contraseña
    | en la pantalla de confirmación. Por defecto, el tiempo de espera es de tres horas.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];

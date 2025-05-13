<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mailer predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el mailer predeterminado que se utiliza para enviar todos los
    | mensajes de correo electrónico, a menos que se especifique otro mailer explícitamente
    | al enviar el mensaje. Todos los mailers adicionales pueden configurarse dentro del
    | array "mailers". Se proporcionan ejemplos de cada tipo de mailer.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Configuración de mailers
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar todos los mailers utilizados por tu aplicación junto con
    | sus respectivas configuraciones. Se han configurado varios ejemplos para ti y eres
    | libre de agregar los tuyos según lo requiera tu aplicación.
    |
    | Laravel soporta una variedad de drivers de "transporte" de correo que pueden ser
    | utilizados al enviar un correo electrónico. Puedes especificar cuál estás usando
    | para tus mailers a continuación. También puedes agregar mailers adicionales si es necesario.
    |
    | Soportados: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Dirección global "From"
    |--------------------------------------------------------------------------
    |
    | Puedes hacer que todos los correos enviados por tu aplicación se envíen desde
    | la misma dirección. Aquí puedes especificar un nombre y dirección que se utilizarán
    | globalmente para todos los correos enviados por tu aplicación.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];

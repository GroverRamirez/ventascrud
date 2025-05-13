<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Controlador de Sesión Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción determina el controlador de sesión predeterminado que se utiliza para
    | las solicitudes entrantes. Laravel soporta una variedad de opciones de almacenamiento para
    | persistir los datos de la sesión. El almacenamiento en base de datos es una excelente opción predeterminada.
    |
    | Soportado: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Tiempo de Vida de la Sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el número de minutos que deseas que la sesión
    | permanezca inactiva antes de que expire. Si quieres que expire
    | inmediatamente cuando se cierre el navegador, puedes
    | indicarlo a través de la opción de configuración expire_on_close.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Encriptación de Sesión
    |--------------------------------------------------------------------------
    |
    | Esta opción te permite especificar fácilmente que todos los datos de tu sesión
    | deben ser encriptados antes de ser almacenados. Toda la encriptación se realiza
    | automáticamente por Laravel y puedes usar la sesión normalmente.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Ubicación de Archivos de Sesión
    |--------------------------------------------------------------------------
    |
    | Al utilizar el controlador de sesión "file", los archivos de sesión se colocan
    | en el disco. La ubicación de almacenamiento predeterminada se define aquí; sin embargo,
    | eres libre de proporcionar otra ubicación donde deben almacenarse.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Conexión de Base de Datos para Sesiones
    |--------------------------------------------------------------------------
    |
    | Al usar los controladores de sesión "database" o "redis", puedes especificar una
    | conexión que debe usarse para gestionar estas sesiones. Esto debe
    | corresponder a una conexión en tus opciones de configuración de base de datos.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabla de Base de Datos para Sesiones
    |--------------------------------------------------------------------------
    |
    | Al usar el controlador de sesión "database", puedes especificar la tabla que
    | se usará para almacenar las sesiones. Por supuesto, se define un valor predeterminado
    | sensato para ti; sin embargo, eres libre de cambiarlo a otra tabla.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Almacén de Caché para Sesiones
    |--------------------------------------------------------------------------
    |
    | Al usar uno de los backends de sesión basados en caché del framework, puedes
    | definir el almacén de caché que debe usarse para almacenar los datos de la sesión
    | entre solicitudes. Esto debe coincidir con uno de tus almacenes de caché definidos.
    |
    | Afecta a: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Lotería de Limpieza de Sesiones
    |--------------------------------------------------------------------------
    |
    | Algunos controladores de sesión deben limpiar manualmente su ubicación de almacenamiento para
    | deshacerse de las sesiones antiguas del almacenamiento. Aquí están las probabilidades de que
    | esto suceda en una solicitud determinada. Por defecto, las probabilidades son 2 de cada 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nombre de la Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes cambiar el nombre de la cookie de sesión que crea el
    | framework. Típicamente, no deberías necesitar cambiar este valor
    | ya que hacerlo no otorga una mejora de seguridad significativa.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Ruta de la Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | La ruta de la cookie de sesión determina la ruta para la cual la cookie
    | será considerada como disponible. Típicamente, esta será la ruta raíz de
    | tu aplicación, pero eres libre de cambiarla cuando sea necesario.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Dominio de la Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | Este valor determina el dominio y subdominios a los que la cookie de sesión
    | está disponible. Por defecto, la cookie estará disponible para el dominio
    | raíz y todos los subdominios. Típicamente, esto no debería cambiarse.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Solo HTTPS
    |--------------------------------------------------------------------------
    |
    | Al establecer esta opción como true, las cookies de sesión solo se enviarán
    | al servidor si el navegador tiene una conexión HTTPS. Esto evitará que
    | la cookie se envíe cuando no se pueda hacer de forma segura.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Acceso Solo HTTP
    |--------------------------------------------------------------------------
    |
    | Establecer este valor como true evitará que JavaScript acceda al
    | valor de la cookie y la cookie solo será accesible a través del
    | protocolo HTTP. Es poco probable que debas deshabilitar esta opción.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Cookies Same-Site
    |--------------------------------------------------------------------------
    |
    | Esta opción determina cómo se comportan tus cookies cuando ocurren solicitudes
    | entre sitios, y puede usarse para mitigar ataques CSRF. Por defecto,
    | estableceremos este valor como "lax" para permitir solicitudes seguras entre sitios.
    |
    | Ver: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Soportado: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Particionadas
    |--------------------------------------------------------------------------
    |
    | Establecer este valor como true vinculará la cookie al sitio de nivel superior para
    | un contexto entre sitios. Las cookies particionadas son aceptadas por el navegador
    | cuando están marcadas como "secure" y el atributo Same-Site está establecido como "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Ventas</title>
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <style>
        html, body { height: 100%; margin: 0; padding: 0; }
        body { min-height: 100vh; background: #0a0a0a; color: #edecec; font-family: 'Inter', 'Figtree', sans-serif; }
        .header { display: flex; justify-content: flex-end; padding: 2rem 3rem 0 0; }
        .header a { color: #edecec; border: 1px solid #edecec33; border-radius: 6px; padding: 0.5rem 1.5rem; margin-left: 1rem; text-decoration: none; font-weight: 500; transition: background 0.2s, color 0.2s; }
        .header a:hover { background: #edecec; color: #0a0a0a; }
        .container { display: flex; justify-content: center; align-items: center; height: 80vh; }
        .panel { background: #191400; color: #edecec; border-radius: 12px; box-shadow: 0 4px 32px #000a; display: flex; overflow: hidden; max-width: 700px; }
        .panel-left { padding: 2.5rem 2rem; display: flex; flex-direction: column; justify-content: center; min-width: 320px; }
        .panel-right { background: #1d0002; display: flex; align-items: center; justify-content: center; min-width: 320px; }
        .logo { font-size: 3rem; font-weight: bold; color: #ff4433; margin-bottom: 2rem; }
        .panel-left h2 { margin: 0 0 1rem 0; font-size: 1.3rem; font-weight: 600; }
        .panel-left p { margin: 0 0 1.5rem 0; color: #a1a09a; font-size: 1rem; }
        .panel-left ul { list-style: none; padding: 0; margin: 0 0 1.5rem 0; }
        .panel-left ul li { margin-bottom: 0.7rem; font-size: 1rem; }
        .panel-left ul li a { color: #ff4433; text-decoration: underline; }
        .panel-left button { background: #edecec; color: #0a0a0a; border: none; border-radius: 6px; padding: 0.7rem 1.5rem; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background 0.2s, color 0.2s; }
        .panel-left button:hover { background: #ff4433; color: #fff; }
        .laravel-logo { width: 260px; height: auto; }
        @media (max-width: 700px) {
            .container, .panel { flex-direction: column; height: auto; }
            .panel-right, .panel-left { min-width: unset; width: 100%; }
            .panel { max-width: 95vw; }
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="/login">Log in</a>
        <a href="/register">Register</a>
    </div>
    <div class="container">
        <div class="panel">
            <div class="panel-left">
                <div class="logo">Laravel</div>
                <h2>Let's get started</h2>
                <p>Laravel has an incredibly rich ecosystem.<br>We suggest starting with the following.</p>
                <ul>
                    <li>Read the <a href="https://laravel.com/docs">Documentation</a></li>
                    <li>Watch video tutorials at <a href="https://laracasts.com">Laracasts</a></li>
                </ul>
                <button onclick="window.open('https://cloud.laravel.com', '_blank')">Deploy now</button>
            </div>
            <div class="panel-right">
                <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" class="laravel-logo">
            </div>
        </div>
    </div>
</body>
</html>

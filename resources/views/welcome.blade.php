<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>univers3s</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body {
            background: #FDFDFC;
            color: #1b1b18;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            max-width: 350px;
            margin: 100px auto;
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
            padding: 2rem 1.5rem 1.5rem 1.5rem;
            text-align: center;
        }

        .card-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2rem;
            letter-spacing: 0.02em;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 2rem;
            background: #f53003;
            color: #fff;
            border: none;
            border-radius: 0.375rem;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #c41f00;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-title">univers3s</div>
        <a href="/admin" class="btn">connection</a>
    </div>
</body>

</html>
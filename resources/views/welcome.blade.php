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
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background: linear-gradient(135deg, #f9fafb, #f1f5f9, #e2e8f0);
        }

        .card {
            max-width: 420px;
            width: 100%;
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            padding: 2.5rem 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .card-logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.5rem auto;
            border-radius: 50%;
            background: #f53003;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 1.5rem;
            box-shadow: 0 4px 14px rgba(245, 48, 3, 0.4);
        }

        .card-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: #1b1b18;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #6b7280;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.85rem 2.2rem;
            background: #f53003;
            color: #fff;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.05rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.25s, transform 0.2s;
        }

        .btn:hover {
            background: #c41f00;
            transform: scale(1.03);
        }

        .btn svg {
            margin-left: 0.5rem;
            width: 18px;
            height: 18px;
            fill: currentColor;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-logo">U3</div>
        <div class="card-title">univers3s</div>
        <div class="card-subtitle">Bienvenue sur votre espace d’administration</div>
        <a href="/admin" class="btn">
            Connexion
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.293 4.293a1 1 0 011.414 0L19 9.586a2 2 0 010 2.828l-5.293 5.293a1 1 0 01-1.414-1.414L16.586 12H7a1 1 0 110-2h9.586l-4.293-4.293a1 1 0 010-1.414z"/>
            </svg>
        </a>
    </div>
</body>

</html>

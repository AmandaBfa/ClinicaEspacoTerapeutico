<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Espaço Terapêutico' }}</title>
    @vite('resources/css/app.css')

    <style>
        :root {
            --brand-orange: #f97316;
            /* orange-500 */
            --brand-blue: #3b82f6;
            /* blue-500 */
        }
    </style>

</head>

<body class="min-h-screen bg-white text-gray-900 font-sans">

    <main>
        <div class="bg-gradient-to-b from-orange-50/50 via-white to-blue-50/50 min-h-screen">
            {{ $slot }}
        </div>
    </main>

</body>

</html>

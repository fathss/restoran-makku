<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk - Makku Resto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-page"> <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-4 w-100">
        
        <div class="mb-4">
            <a href="/" class="brand-logo-login">
                Makku.
            </a>
        </div>

        <div class="login-card">
            {{ $slot }}
        </div>
        
        <div class="mt-4 text-muted small">
            &copy; 2025 Makku Resto
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
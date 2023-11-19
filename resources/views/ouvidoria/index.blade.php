<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ouvidoria</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
                <h1>Ouvidoria</h1>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="#" class="nav-link">FORMULÁRIOS</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">SIC</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">CARTA</a></li>
                </ul>
            </div>
            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="{{ asset('img/menu_white_36dp.svg') }}" alt=""></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="#" class="nav-link">FORMULÁRIOS</a></li>
                <li class="nav-item"><a href="#" class="nav-link">SIC</a></li>
                <li class="nav-item"><a href="#" class="nav-link">CARTA</a></li>
            </ul>
        </div>
    </header>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

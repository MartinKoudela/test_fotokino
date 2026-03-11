<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fotokino.eu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-800">

<header class="bg-white shadow-sm">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('index') }}" class="text-2xl font-bold text-red-600 tracking-tight">
            Fotokino.eu
        </a>
        <div class="flex items-center gap-5 text-gray-600">
            <a href="#" class="hover:text-red-600 transition"><i class="fas fa-search text-lg"></i></a>
            <a href="#" class="hover:text-red-600 transition"><i class="fas fa-user text-lg"></i></a>
            <a href="#" class="hover:text-red-600 transition relative">
                <i class="fas fa-shopping-cart text-lg"></i>
                <span
                    class="absolute -top-2 -right-3 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
            </a>
        </div>
    </div>

    <nav class="bg-red-600">
        <div class="max-w-6xl mx-auto px-4">
            <ul class="flex flex-wrap items-center gap-1">
                <li>
                    <a href="{{ route('photo-print') }}"
                       class="block px-4 py-3 text-sm font-medium text-white hover:bg-red-700 transition">
                        Tisk fotografií
                    </a>
                </li>
                <li>
                    <a href="{{ route('canvas-print') }}"
                       class="block px-4 py-3 text-sm font-medium text-white hover:bg-red-700 transition">
                        Tisk pláten
                    </a>
                </li>
                <li>
                    <a href="{{ route('bigformat-print') }}"
                       class="block px-4 py-3 text-sm font-medium text-white hover:bg-red-700 transition">
                        Velkoformátový tisk
                    </a>
                </li>
                <li>
                    <a href="{{ route('others-print') }}"
                       class="block px-4 py-3 text-sm font-medium text-white hover:bg-red-700 transition">
                        Tisk ostatní
                    </a>
                </li>
                <li>
                    <a href="{{ route('films-negatives') }}"
                       class="block px-4 py-3 text-sm font-medium text-white hover:bg-red-700 transition">
                        Film & negativy
                    </a>
                </li>
                <li>
                    <a href="{{ route('goods') }}"
                       class="block px-4 py-3 text-sm font-medium text-white hover:bg-red-700 transition">
                        Zboží
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                       class="block px-4 py-3 text-sm font-medium text-white hover:bg-red-700 transition">
                        Kontakt
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="flex-1 max-w-6xl mx-auto w-full px-4 py-8">
    {{ $slot }}
</main>

<footer class="bg-gray-800 text-gray-300">
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">
            <div>
                <p class="text-xl font-bold text-white mb-2">Fotokino.eu</p>
                <p class="text-sm">Náměstí Práce 1099, 760 01 Zlín</p>
            </div>
            <div>
                <p class="font-semibold text-white mb-2">Otevírací doba</p>
                <p class="text-sm">Po–Pá: 8:00 – 17:00</p>
            </div>
            <div>
                <p class="font-semibold text-white mb-2">Kontakt</p>
                <p class="text-sm">Tel: </p>
                <p class="text-sm">Email: </p>
            </div>
            <div class="flex gap-4 text-xl">
                <a href="#" class="hover:text-white transition"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-6 pt-4 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Fotokino.eu. Všechna práva vyhrazena.
        </div>
    </div>
</footer>

@livewireScripts
</body>
</html>

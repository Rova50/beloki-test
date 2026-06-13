<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beloki - Gestion de Stock</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-gray-50 text-gray-900 antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-indigo-500 selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex items-center justify-between py-10">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
                        <span class="text-2xl font-bold tracking-tight text-gray-900">Beloki</span>
                    </div>
                    @if (Route::has('login'))
                        <nav class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition">Tableau de Bord</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900 hover:text-indigo-600 transition">Connexion</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition">Inscription</a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class="mt-16">
                    <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                        <div>
                            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-6xl">
                                Gestion Intelligente de <span class="text-indigo-600">Produits & Stock</span>
                            </h1>
                            <p class="mt-6 text-lg leading-8 text-gray-600">
                                Optimisez votre inventaire, suivez vos clients et gérez vos produits avec une interface intuitive conçue pour l'efficacité. Beloki vous permet de garder un œil sur chaque mouvement de stock en temps réel.
                            </p>
                            <div class="mt-10 flex items-center gap-x-6">
                                <a href="{{ route('login') }}" class="rounded-md bg-indigo-600 px-6 py-3 text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition">Accéder au Panel Admin</a>
                                <a href="#" class="text-lg font-semibold leading-6 text-gray-900 group">En savoir plus <span class="inline-block transition-transform group-hover:translate-x-1" aria-hidden="true">→</span></a>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="absolute -inset-1 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 opacity-20 blur-2xl"></div>
                            <div class="relative grid grid-cols-2 gap-4">
                                <div class="space-y-4">
                                    <div class="rounded-xl bg-white p-6 shadow-xl ring-1 ring-gray-200">
                                        <div class="text-indigo-600 font-bold text-2xl">30+</div>
                                        <div class="text-gray-500 text-sm uppercase tracking-wider font-semibold">Produits</div>
                                    </div>
                                    <div class="rounded-xl bg-white p-6 shadow-xl ring-1 ring-gray-200">
                                        <div class="text-green-600 font-bold text-2xl">500+</div>
                                        <div class="text-gray-500 text-sm uppercase tracking-wider font-semibold">Articles en Stock</div>
                                    </div>
                                </div>
                                <div class="space-y-4 pt-8">
                                    <div class="rounded-xl bg-white p-6 shadow-xl ring-1 ring-gray-200">
                                        <div class="text-purple-600 font-bold text-2xl">50+</div>
                                        <div class="text-gray-500 text-sm uppercase tracking-wider font-semibold">Clients</div>
                                    </div>
                                    <div class="rounded-xl bg-white p-6 shadow-xl ring-1 ring-gray-200">
                                        <div class="text-orange-600 font-bold text-2xl">2</div>
                                        <div class="text-gray-500 text-sm uppercase tracking-wider font-semibold">Entrepôts</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="mt-32 border-t border-gray-200 py-12">
                    <p class="text-center text-sm leading-5 text-gray-500">
                        &copy; {{ date('Y') }} Beloki Management System. Tous droits réservés.
                    </p>
                </footer>
            </div>
        </div>
    </body>
</html>

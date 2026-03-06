<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', config('app.name', 'Biblioteca Digital'))</title>
    @vite('resources/css/app.css')
    @stack('styles')
    <style>
        .custom-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, .1), 0 10px 10px -5px rgba(0, 0, 0, .04);
        }

        .hover-lift {
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, .1);
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .menu-item {
            position: relative;
        }

        nav .menu-item.active {
            color: rgb(37, 99, 235);
            background-color: rgb(219, 234, 254);
        }

        nav .menu-item.active i {
            color: rgb(37, 99, 235);
        }

        aside .menu-item.active {
            color: rgb(37, 99, 235);
            background-color: rgb(219, 234, 254);
            border-left: 4px solid rgb(37, 99, 235);
            font-weight: 500;
        }

        aside .menu-item.active i {
            color: rgb(37, 99, 235);
        }
    </style>
</head>

<body class="bg-gray-50 h-screen flex flex-col overflow-hidden">
    <header class="sticky top-0 z-50 bg-white shadow-sm h-16 shrink-0">
        <div class="container mx-auto px-3 sm:px-4 lg:px-6 h-full">
            <div class="flex justify-between items-center h-full gap-4">
                <div class="flex items-center gap-3 shrink-0">
                    <button id="sidebar-toggle"
                        class="lg:hidden text-blue-800 hover:text-blue-600 focus:outline-none transition-colors"
                        aria-label="Toggle sidebar">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>

                    <div
                        class="w-10 h-10 rounded-xl bg-linear-to-br from-blue-600 to-blue-700 flex items-center justify-center shadow-md shrink-0">
                        <i class="fas fa-book-open text-white text-xl"></i>
                    </div>

                    <div class="hidden sm:block">
                        <h1 class="text-lg md:text-xl font-bold text-gray-800 leading-tight">
                            Mi<span class="text-blue-600">Biblioteca</span>
                        </h1>
                        <p class="text-xs text-gray-500 leading-none">Panel de usuario</p>
                    </div>
                </div>

                <nav class="hidden lg:block flex-1 max-w-2xl mx-6">
                    <ul class="flex justify-center items-center gap-1">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }} group flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg transition-all hover:bg-blue-100">
                                <i class="fas fa-home text-blue-600"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('libros.index') }}"
                                class="menu-item {{ request()->routeIs('libros.*') ? 'active' : '' }} group flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('libros.*') ? '' : 'text-gray-700 hover:bg-gray-100 hover:text-blue-600' }}">
                                <i class="fas fa-book text-gray-500 group-hover:text-blue-600"></i>
                                <span>Catálogo</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mis-prestamos"
                                class="menu-item group flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 rounded-lg transition-all hover:bg-gray-100 hover:text-blue-600">
                                <i class="fas fa-book-reader text-gray-500 group-hover:text-blue-600"></i>
                                <span>Mis préstamos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mi-perfil"
                                class="menu-item group flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 rounded-lg transition-all hover:bg-gray-100 hover:text-blue-600">
                                <i class="fas fa-user text-gray-500 group-hover:text-blue-600"></i>
                                <span>Mi perfil</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-3 shrink-0">
                    <div
                        class="hidden lg:flex items-center gap-3 px-3 py-2 bg-linear-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                        <div
                            class="w-8 h-8 rounded-full bg-linear-to-br from-blue-600 to-indigo-600 flex items-center justify-center shadow-sm">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div class="hidden xl:block">
                            <p class="font-semibold text-gray-800 text-sm leading-tight">
                                {{ auth()->user()->name ?? 'Usuario' }}
                            </p>
                            <p class="text-xs text-gray-500 leading-none">{{ auth()->user()->email ?? 'Correo no disponible' }}</p>
                        </div>
                    </div>

                    <a href="{{ route('logout') }}"
                        class="hidden lg:flex items-center justify-center w-10 h-10 rounded-lg hover:bg-red-50 text-gray-600 hover:text-red-600 transition-all"
                        title="Cerrar sesión">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1 bg-gray-50" style="height: calc(100vh - 64px);">
        <aside id="sidebar"
            class="bg-white w-64 sm:w-72 shadow-lg fixed lg:relative left-0 transform -translate-x-full lg:translate-x-0 z-30 transition-all duration-300 ease-in-out overflow-y-auto top-16 lg:top-0 lg:h-full"
            style="height: calc(100vh - 64px); max-height: calc(100vh - 64px);">
            <nav class="p-3 sm:p-4">
                <div class="mb-4 sm:mb-6">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 sm:px-4 mb-2">MENÚ
                    </h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }} flex items-center p-2 sm:p-3 rounded-xl font-medium text-sm sm:text-base">
                                <i class="fas fa-home w-5 sm:w-6 mr-2 sm:mr-3 shrink-0"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('libros.index') }}"
                                class="menu-item {{ request()->routeIs('libros.*') ? 'active' : '' }} flex items-center p-2 sm:p-3 rounded-xl transition-all duration-200 text-sm sm:text-base {{ request()->routeIs('libros.*') ? '' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 hover-lift' }}">
                                <i
                                    class="fas fa-book w-5 sm:w-6 mr-2 sm:mr-3 {{ request()->routeIs('libros.*') ? 'shrink-0' : 'text-gray-500 shrink-0' }}"></i>
                                <span>Catálogo de libros</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categorias.index') }}"
                                class="menu-item {{ request()->routeIs('categorias.*') ? 'active' : '' }} flex items-center p-2 sm:p-3 rounded-xl transition-all duration-200 text-sm sm:text-base {{ request()->routeIs('categorias.*') ? '' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 hover-lift' }}">
                                <i
                                    class="fas fa-tags w-5 sm:w-6 mr-2 sm:mr-3 {{ request()->routeIs('categorias.*') ? 'shrink-0' : 'text-gray-500 shrink-0' }}"></i>
                                <span>Categorías</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mb-4 sm:mb-6">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 sm:px-4 mb-2">MI CUENTA
                    </h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="#mis-prestamos"
                                class="menu-item flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                                <i class="fas fa-book-reader w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 shrink-0"></i>
                                <span>Mis préstamos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mis-favoritos"
                                class="menu-item flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                                <i class="fas fa-heart w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 shrink-0"></i>
                                <span>Favoritos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mi-perfil"
                                class="menu-item flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                                <i class="fas fa-user-cog w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 shrink-0"></i>
                                <span>Configurar perfil</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div
                    class="hidden sm:block mt-6 sm:mt-8 p-3 sm:p-5 bg-linear-to-br from-blue-600 to-blue-800 rounded-xl text-white custom-shadow">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div
                            class="w-8 sm:w-10 h-8 sm:h-10 rounded-full bg-white/20 flex items-center justify-center mr-2 sm:mr-3 backdrop-blur-sm shrink-0">
                            <i class="fas fa-lightbulb text-white text-sm sm:text-base"></i>
                        </div>
                        <h3 class="font-bold text-sm sm:text-base">Sugerencia</h3>
                    </div>
                    <p class="text-sm text-blue-100 leading-relaxed">
                        Explora nuevas categorías y guarda tus libros favoritos para encontrarlos más rápido.
                    </p>
                </div>

                <div class="mt-4 sm:mt-6 pt-3 sm:pt-4 border-t border-gray-200">
                    <a href="{{ route('logout') }}"
                        class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-red-50 hover:text-red-700 rounded-xl transition-all duration-200 text-sm sm:text-base">
                        <i class="fas fa-sign-out-alt w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 shrink-0"></i>
                        <span>Cerrar sesión</span>
                    </a>
                </div>
            </nav>
        </aside>

        <div id="overlay" class="fixed inset-0 bg-black/50 z-20 lg:hidden hidden transition-opacity duration-300">
        </div>

        <main
            class="flex-1 flex flex-col p-3 sm:p-4 md:p-8 overflow-auto transition-all duration-300 w-full h-full fade-in">
            @hasSection('page_header')
                <section class="mb-4 sm:mb-6">
                    @yield('page_header')
                </section>
            @endif

            <div class="flex-1">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            function toggleSidebar() {
                const isOpen = sidebar.classList.contains('translate-x-0');
                if (isOpen) {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                    overlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    overlay.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                }
            }

            function closeSidebarFn() {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            if (sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', closeSidebarFn);

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    overlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                }
            });

            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        closeSidebarFn();
                    }
                });
            });
        });
    </script>

    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital - Tu portal al conocimiento</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-50">
    <!-- Header con navegación -->
    <header class="sticky top-0 z-50 bg-white custom-shadow">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-700 flex items-center justify-center">
                        <i class="fas fa-book-open text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-blue-800">Biblioteca<span class="text-blue-500">Digital</span></h1>
                        <p class="text-xs text-gray-500">Tu portal al conocimiento</p>
                    </div>
                </div>

                <!-- Menú de navegación para escritorio -->
                <nav class="hidden md:block">
                    <ul class="flex space-x-8 items-center">
                        <li>
                            <a href="#inicio" class="text-blue-800 font-semibold hover:text-blue-600 transition-all border-b-2 border-blue-800 pb-1">
                                <i class="fas fa-home mr-2"></i>Inicio
                            </a>
                        </li>
                        <li>
                            <a href="#catalogo" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                                <i class="fas fa-book mr-2"></i>Catálogo
                            </a>
                        </li>
                        <li>
                            <a href="#servicios" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                                <i class="fas fa-concierge-bell mr-2"></i>Servicios
                            </a>
                        </li>
                        <li>
                            <a href="#eventos" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                                <i class="fas fa-calendar-alt mr-2"></i>Eventos
                            </a>
                        </li>
                        <li>
                            <a href="#contacto" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                                <i class="fas fa-envelope mr-2"></i>Contacto
                            </a>
                        </li>
                        <li>
                            <a href="#login" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg font-medium transition-all ml-4">
                                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Botón menú hamburguesa para móvil -->
                <button id="menu-toggle" class="md:hidden text-blue-800 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Menú móvil (oculto por defecto) -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-2">
                <ul class="space-y-3">
                    <li>
                        <a href="#inicio" class="block py-2 px-4 bg-blue-50 text-blue-800 font-semibold rounded-lg">
                            <i class="fas fa-home mr-3"></i>Inicio
                        </a>
                    </li>
                    <li>
                        <a href="#catalogo" class="block py-2 px-4 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-book mr-3"></i>Catálogo
                        </a>
                    </li>
                    <li>
                        <a href="#servicios" class="block py-2 px-4 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-concierge-bell mr-3"></i>Servicios
                        </a>
                    </li>
                    <li>
                        <a href="#eventos" class="block py-2 px-4 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-calendar-alt mr-3"></i>Eventos
                        </a>
                    </li>
                    <li>
                        <a href="#contacto" class="block py-2 px-4 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-envelope mr-3"></i>Contacto
                        </a>
                    </li>
                    <li class="pt-2 border-t border-gray-200">
                        <a href="#login" class="block py-3 px-4 bg-blue-700 text-white text-center rounded-lg font-medium">
                            <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Sección Hero -->
    <section id="hero" class="relative overflow-hidden">
        <!-- Imagen de fondo con overlay -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-blue-900 opacity-70"></div>
            <!-- Imagen de biblioteca libre de derechos (usando placeholder con color) -->
            <div class="h-full w-full bg-gradient-to-r from-blue-800 to-blue-600"></div>
        </div>

        <div class="container mx-auto px-4 py-16 md:py-24 relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Descubre un mundo de conocimiento</h2>
                <p class="text-xl md:text-2xl mb-8 opacity-90">Accede a miles de libros, recursos digitales y servicios culturales desde cualquier lugar.</p>

                <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6 mb-10">
                    <a href="#explorar" class="bg-white text-blue-800 hover:bg-blue-50 font-bold py-4 px-8 rounded-lg text-lg transition-all transform hover:-translate-y-1 pulse-animation">
                        <i class="fas fa-search mr-2"></i>Explorar Catálogo
                    </a>
                    <a href="#registro" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-800 font-bold py-4 px-8 rounded-lg text-lg transition-all">
                        <i class="fas fa-user-plus mr-2"></i>Registrarse Gratis
                    </a>
                </div>

                <!-- Estadísticas -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12">
                    <div class="bg-white bg-opacity-20 p-4 rounded-lg backdrop-blur-sm">
                        <div class="text-3xl font-bold">50,000+</div>
                        <div class="text-sm">Libros Disponibles</div>
                    </div>
                    <div class="bg-white bg-opacity-20 p-4 rounded-lg backdrop-blur-sm">
                        <div class="text-3xl font-bold">15,000+</div>
                        <div class="text-sm">Miembros Activos</div>
                    </div>
                    <div class="bg-white bg-opacity-20 p-4 rounded-lg backdrop-blur-sm">
                        <div class="text-3xl font-bold">200+</div>
                        <div class="text-sm">Eventos Anuales</div>
                    </div>
                    <div class="bg-white bg-opacity-20 p-4 rounded-lg backdrop-blur-sm">
                        <div class="text-3xl font-bold">24/7</div>
                        <div class="text-sm">Acceso Digital</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forma decorativa inferior -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Sección de servicios destacados -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Nuestros Servicios</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Ofrecemos una amplia gama de servicios para satisfacer las necesidades de lectores, investigadores y amantes del conocimiento.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Servicio 1 -->
                <article class="bg-white rounded-xl custom-shadow p-6 transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-6">
                        <i class="fas fa-book-reader text-blue-700 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-3">Préstamo de Libros</h3>
                    <p class="text-gray-600 mb-4">Accede a nuestro amplio catálogo físico y digital. Préstamos por 15 días con posibilidad de renovación.</p>
                    <a href="#prestamos" class="text-blue-700 font-medium flex items-center">
                        Más información <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </article>

                <!-- Servicio 2 -->
                <article class="bg-white rounded-xl custom-shadow p-6 transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mb-6">
                        <i class="fas fa-laptop text-green-700 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-3">Recursos Digitales</h3>
                    <p class="text-gray-600 mb-4">Biblioteca virtual con acceso a revistas académicas, libros electrónicos, bases de datos y más.</p>
                    <a href="#digital" class="text-blue-700 font-medium flex items-center">
                        Explorar recursos <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </article>

                <!-- Servicio 3 -->
                <article class="bg-white rounded-xl custom-shadow p-6 transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 rounded-full bg-purple-100 flex items-center justify-center mb-6">
                        <i class="fas fa-users text-purple-700 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-3">Actividades Culturales</h3>
                    <p class="text-gray-600 mb-4">Club de lectura, talleres de escritura, charlas con autores y actividades para todas las edades.</p>
                    <a href="#actividades" class="text-blue-700 font-medium flex items-center">
                        Ver calendario <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </article>
            </div>
        </div>
    </section>

    <!-- Sección de libros destacados -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Libros Destacados</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Descubre nuestras últimas adquisiciones y las obras más populares entre nuestros lectores.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Libro 1 -->
                <div class="bg-white rounded-xl custom-shadow overflow-hidden transition-all hover:-translate-y-2">
                    <!-- Imagen de libro libre de derechos (placeholder con color) -->
                    <div class="h-48 bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center">
                        <i class="fas fa-book text-white text-6xl opacity-80"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-blue-800 mb-2">Cien años de soledad</h3>
                        <p class="text-gray-600 text-sm mb-3">Gabriel García Márquez</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Realismo mágico</span>
                            <a href="#reservar" class="text-blue-700 hover:text-blue-800">
                                <i class="fas fa-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Libro 2 -->
                <div class="bg-white rounded-xl custom-shadow overflow-hidden transition-all hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center">
                        <i class="fas fa-book text-white text-6xl opacity-80"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-blue-800 mb-2">El Principito</h3>
                        <p class="text-gray-600 text-sm mb-3">Antoine de Saint-Exupéry</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Literatura infantil</span>
                            <a href="#reservar" class="text-blue-700 hover:text-blue-800">
                                <i class="fas fa-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Libro 3 -->
                <div class="bg-white rounded-xl custom-shadow overflow-hidden transition-all hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-r from-purple-500 to-purple-700 flex items-center justify-center">
                        <i class="fas fa-book text-white text-6xl opacity-80"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-blue-800 mb-2">1984</h3>
                        <p class="text-gray-600 text-sm mb-3">George Orwell</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Ciencia ficción</span>
                            <a href="#reservar" class="text-blue-700 hover:text-blue-800">
                                <i class="fas fa-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Libro 4 -->
                <div class="bg-white rounded-xl custom-shadow overflow-hidden transition-all hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-r from-yellow-500 to-yellow-700 flex items-center justify-center">
                        <i class="fas fa-book text-white text-6xl opacity-80"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-blue-800 mb-2">Don Quijote de la Mancha</h3>
                        <p class="text-gray-600 text-sm mb-3">Miguel de Cervantes</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Clásico español</span>
                            <a href="#reservar" class="text-blue-700 hover:text-blue-800">
                                <i class="fas fa-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="#catalogo" class="inline-flex items-center bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-8 rounded-lg transition-all">
                    <i class="fas fa-book-open mr-2"></i> Ver catálogo completo
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de testimonio -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Lo que dicen nuestros usuarios</h2>
                    <p class="text-gray-600">Descubre la experiencia de quienes ya forman parte de nuestra comunidad.</p>
                </div>

                <div class="bg-blue-50 rounded-2xl p-8 md:p-10 custom-shadow">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/4 mb-6 md:mb-0">
                            <div class="w-32 h-32 rounded-full bg-gradient-to-r from-blue-500 to-blue-700 flex items-center justify-center mx-auto">
                                <i class="fas fa-user text-white text-5xl"></i>
                            </div>
                        </div>
                        <div class="md:w-3/4 md:pl-10">
                            <div class="text-blue-800 mb-4">
                                <i class="fas fa-quote-left text-3xl opacity-50"></i>
                            </div>
                            <p class="text-lg md:text-xl text-gray-700 mb-6 italic">
                                "Como estudiante de literatura, la Biblioteca Digital ha sido un recurso invaluable para mi investigación. La variedad de libros electrónicos y la facilidad para reservar materiales físicos han transformado completamente mi forma de estudiar."
                            </p>
                            <div>
                                <h4 class="font-bold text-blue-800 text-lg">María González</h4>
                                <p class="text-gray-600">Estudiante de Literatura, Miembro desde 2021</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección CTA (Call to Action) -->
    <section class="py-16 bg-gradient-to-r from-blue-800 to-blue-600 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Listo para comenzar tu viaje literario?</h2>
                <p class="text-xl mb-10 opacity-90">Regístrate gratis y obtén acceso inmediato a miles de recursos digitales y todos los servicios de nuestra biblioteca.</p>

                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="#registro" class="bg-white text-blue-800 hover:bg-blue-50 font-bold py-4 px-10 rounded-lg text-lg transition-all transform hover:scale-105">
                        <i class="fas fa-user-plus mr-2"></i>Crear Cuenta Gratis
                    </a>
                    <a href="#tour" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-800 font-bold py-4 px-10 rounded-lg text-lg transition-all">
                        <i class="fas fa-play-circle mr-2"></i>Tour Virtual
                    </a>
                </div>

                <p class="mt-8 text-blue-200">
                    <i class="fas fa-info-circle mr-2"></i>Sin costos de membresía. Solo necesitas una identificación válida.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
                <!-- Columna 1: Información -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">Biblioteca<span class="text-blue-400">Digital</span></h2>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">Promoviendo la lectura, el conocimiento y la cultura desde 1995. Tu acceso gratuito al mundo de las ideas.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-blue-700 flex items-center justify-center transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-blue-500 flex items-center justify-center transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-pink-600 flex items-center justify-center transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-blue-400 flex items-center justify-center transition-all">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Columna 2: Enlaces rápidos -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-white">Enlaces Rápidos</h3>
                    <ul class="space-y-3">
                        <li><a href="#inicio" class="text-gray-400 hover:text-white transition-all"><i class="fas fa-chevron-right mr-2 text-blue-500 text-xs"></i>Inicio</a></li>
                        <li><a href="#catalogo" class="text-gray-400 hover:text-white transition-all"><i class="fas fa-chevron-right mr-2 text-blue-500 text-xs"></i>Catálogo en línea</a></li>
                        <li><a href="#servicios" class="text-gray-400 hover:text-white transition-all"><i class="fas fa-chevron-right mr-2 text-blue-500 text-xs"></i>Servicios</a></li>
                        <li><a href="#eventos" class="text-gray-400 hover:text-white transition-all"><i class="fas fa-chevron-right mr-2 text-blue-500 text-xs"></i>Calendario de eventos</a></li>
                        <li><a href="#contacto" class="text-gray-400 hover:text-white transition-all"><i class="fas fa-chevron-right mr-2 text-blue-500 text-xs"></i>Contacto</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Horarios -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-white">Horarios de Atención</h3>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex justify-between">
                            <span>Lunes a Viernes</span>
                            <span class="font-medium">8:00 - 20:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Sábados</span>
                            <span class="font-medium">9:00 - 18:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Domingos</span>
                            <span class="font-medium">10:00 - 14:00</span>
                        </li>
                    </ul>
                    <div class="mt-6 p-4 bg-gray-800 rounded-lg">
                        <p class="text-sm">
                            <i class="fas fa-globe mr-2 text-blue-500"></i>
                            <span class="font-medium">Acceso 24/7</span> a recursos digitales
                        </p>
                    </div>
                </div>

                <!-- Columna 4: Contacto -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-white">Contacto</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-500"></i>
                            <span class="text-gray-400">Av. Conocimiento 123, Ciudad Cultural, CP 28080</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-blue-500"></i>
                            <span class="text-gray-400">+34 912 345 678</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-blue-500"></i>
                            <span class="text-gray-400">info@bibliotecadigital.org</span>
                        </li>
                    </ul>
                    <div class="mt-6">
                        <a href="#newsletter" class="inline-flex items-center bg-blue-700 hover:bg-blue-800 text-white py-3 px-5 rounded-lg transition-all">
                            <i class="fas fa-newspaper mr-2"></i> Suscribirse al boletín
                        </a>
                    </div>
                </div>
            </div>

            <!-- Línea divisoria y copyright -->
            <div class="pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-500">
                    &copy; <span id="current-year">2023</span> Biblioteca Digital. Todos los derechos reservados.
                    <span class="block md:inline mt-2 md:mt-0 md:ml-4">
                        <a href="#privacidad" class="text-gray-500 hover:text-white transition-all mr-4">Política de privacidad</a> |
                        <a href="#terminos" class="text-gray-500 hover:text-white transition-all ml-4">Términos de uso</a>
                    </span>
                </p>
                <p class="text-gray-600 text-sm mt-4">
                    <i class="fas fa-book-reader mr-1"></i> Hecho con pasión por la lectura y el conocimiento
                </p>
            </div>
        </div>
    </footer>

    <!-- Script para funcionalidad del menú hamburguesa -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos del menú móvil
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            // Alternar menú móvil
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');

                // Cambiar ícono del botón
                const icon = menuToggle.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });

            // Cerrar menú al hacer clic en un enlace (solo en móviles)
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 768) {
                        mobileMenu.classList.add('hidden');
                        menuToggle.querySelector('i').classList.remove('fa-times');
                        menuToggle.querySelector('i').classList.add('fa-bars');
                    }
                });
            });

            // Actualizar año en el footer
            document.getElementById('current-year').textContent = new Date().getFullYear();

            // Efecto de scroll suave para enlaces internos
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');

                    // Solo aplica a enlaces internos que no sean #login
                    if (href !== '#login' && href.startsWith('#')) {
                        e.preventDefault();

                        const targetId = href.substring(1);
                        const targetElement = document.getElementById(targetId);

                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop - 80,
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });

            // Efecto de scroll para header
            window.addEventListener('scroll', function() {
                const header = document.querySelector('header');
                if (window.scrollY > 100) {
                    header.classList.add('shadow-lg');
                } else {
                    header.classList.remove('shadow-lg');
                }
            });
        });
    </script>
</body>
</html>

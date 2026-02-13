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
      box-shadow: 0 10px 25px -5px rgba(0,0,0,.1), 0 10px 10px -5px rgba(0,0,0,.04);
    }
    .hover-lift {
      transition: transform .2s ease, box-shadow .2s ease;
    }
    .hover-lift:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 30px -5px rgba(0,0,0,.1);
    }
    .glow {
      box-shadow: 0 0 15px rgba(37,99,235,.4);
    }
  </style>
</head>

<body class="bg-gray-50 h-screen flex flex-col overflow-hidden">
  <!-- Header con estilo Biblioteca Digital -->
  <header class="sticky top-0 z-50 bg-white shadow-sm h-16 flex-shrink-0">
    <div class="container mx-auto px-3 sm:px-4 lg:px-6 h-full">
      <div class="flex justify-between items-center h-full gap-4">

        <!-- Logo y título -->
        <div class="flex items-center gap-3 flex-shrink-0">
          <button id="sidebar-toggle" class="lg:hidden text-blue-800 hover:text-blue-600 focus:outline-none transition-colors" aria-label="Toggle sidebar">
            <i class="fas fa-bars text-2xl"></i>
          </button>

          <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center shadow-md flex-shrink-0">
            <i class="fas fa-book-open text-white text-xl"></i>
          </div>

          <div class="hidden sm:block">
            <h1 class="text-lg md:text-xl font-bold text-gray-800 leading-tight">
              Admin<span class="text-blue-600">Biblioteca</span>
            </h1>
            <p class="text-xs text-gray-500 leading-none">Sistema de gestión</p>
          </div>
        </div>

        <!-- Menú principal escritorio -->
        <nav class="hidden lg:block flex-1 max-w-2xl mx-6">
          <ul class="flex justify-center items-center gap-1">
            <li>
              <a href="#inicio" class="group flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-lg transition-all hover:bg-blue-100">
                <i class="fas fa-home text-blue-600"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#libros" class="group flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 rounded-lg transition-all hover:bg-gray-100 hover:text-blue-600">
                <i class="fas fa-book text-gray-500 group-hover:text-blue-600"></i>
                <span>Libros</span>
              </a>
            </li>
            <li>
              <a href="#usuarios" class="group flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 rounded-lg transition-all hover:bg-gray-100 hover:text-blue-600">
                <i class="fas fa-users text-gray-500 group-hover:text-blue-600"></i>
                <span>Usuarios</span>
              </a>
            </li>
            <li>
              <a href="#prestamos" class="group flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 rounded-lg transition-all hover:bg-gray-100 hover:text-blue-600">
                <i class="fas fa-exchange-alt text-gray-500 group-hover:text-blue-600"></i>
                <span>Préstamos</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- Perfil de usuario -->
        <div class="flex items-center gap-3 flex-shrink-0">
          <!-- Notificaciones (desktop) -->
          <button class="hidden lg:flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition-colors relative" title="Notificaciones">
            <i class="fas fa-bell text-gray-600 text-lg"></i>
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
          </button>

          <!-- Usuario (desktop) -->
          <div class="hidden lg:flex items-center gap-3 px-3 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center shadow-sm">
              <i class="fas fa-user text-white text-sm"></i>
            </div>
            <div class="hidden xl:block">
              <p class="font-semibold text-gray-800 text-sm leading-tight">Administrador</p>
              <p class="text-xs text-gray-500 leading-none">admin@biblioteca.org</p>
            </div>
          </div>

          <!-- Logout -->
          <a href="#logout" class="hidden lg:flex items-center justify-center w-10 h-10 rounded-lg hover:bg-red-50 text-gray-600 hover:text-red-600 transition-all" title="Cerrar sesión">
            <i class="fas fa-sign-out-alt text-lg"></i>
          </a>
        </div>

      </div>
    </div>
  </header>

  <!-- Contenedor principal -->
  <div class="flex flex-1 bg-gray-50" style="height: calc(100vh - 64px);">
    <!-- Sidebar -->
    <aside id="sidebar"
      class="bg-white w-64 sm:w-72 shadow-lg fixed lg:relative left-0 transform -translate-x-full lg:translate-x-0 z-30 transition-all duration-300 ease-in-out overflow-y-auto top-16 lg:top-0 lg:h-full"
      style="height: calc(100vh - 64px); max-height: calc(100vh - 64px);">
      <!-- Perfil compacto -->
      <nav class="p-3 sm:p-4">
        <div class="mb-4 sm:mb-6">
          <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 sm:px-4 mb-2">PRINCIPAL</h3>
          <ul class="space-y-1">
            <li>
              <a href="#inicio" class="flex items-center p-2 sm:p-3 text-blue-700 bg-blue-50 rounded-xl font-medium border-l-4 border-blue-700 text-sm sm:text-base">
                <i class="fas fa-home w-5 sm:w-6 mr-2 sm:mr-3 text-blue-700 flex-shrink-0"></i> <span>Dashboard</span>
                <span class="ml-auto bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded-full flex-shrink-0">5</span>
              </a>
            </li>
            <li>
              <a href="#libros" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                <i class="fas fa-book w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i> <span>Libros</span>
              </a>
            </li>
            <li>
              <a href="#usuarios" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                <i class="fas fa-users w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i> <span>Usuarios</span>
              </a>
            </li>
            <li>
              <a href="#prestamos" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                <i class="fas fa-exchange-alt w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i> <span>Préstamos</span>
              </a>
            </li>
            <li>
              <a href="#categorias" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                <i class="fas fa-tags w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i> <span>Categorías</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="mb-4 sm:mb-6">
          <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider px-3 sm:px-4 mb-2">GESTIÓN</h3>
          <ul class="space-y-1">
            <li>
              <a href="#reportes" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                <i class="fas fa-chart-bar w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i> <span>Reportes</span>
              </a>
            </li>
            <li>
              <a href="#multas" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                <i class="fas fa-coins w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i> <span>Multas</span>
                <span class="ml-auto bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full flex-shrink-0">3</span>
              </a>
            </li>
            <li>
              <a href="#configuracion" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all duration-200 hover-lift text-sm sm:text-base">
                <i class="fas fa-cog w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i> <span>Configuración</span>
              </a>
            </li>
          </ul>
        </div>

        <!-- Tarjeta de estadísticas -->
        <div class="hidden sm:block mt-6 sm:mt-8 p-3 sm:p-5 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl text-white custom-shadow">
          <div class="flex items-center mb-3 sm:mb-4">
            <div class="w-8 sm:w-10 h-8 sm:h-10 rounded-full bg-white/20 flex items-center justify-center mr-2 sm:mr-3 backdrop-blur-sm flex-shrink-0">
              <i class="fas fa-chart-line text-white text-sm sm:text-base"></i>
            </div>
            <h3 class="font-bold text-sm sm:text-base">Estadísticas</h3>
          </div>

          <div class="space-y-2 sm:space-y-3">
            <div class="flex justify-between items-center text-sm">
              <span class="text-blue-100">Libros activos</span>
              <span class="font-bold text-white">1,245</span>
            </div>
            <div class="w-full bg-blue-900/50 rounded-full h-2">
              <div class="bg-white h-2 rounded-full" style="width: 75%"></div>
            </div>

            <div class="flex justify-between items-center mt-2 text-sm">
              <span class="text-blue-100">Préstamos hoy</span>
              <span class="font-bold text-white">23</span>
            </div>
            <div class="w-full bg-blue-900/50 rounded-full h-2">
              <div class="bg-white h-2 rounded-full" style="width: 45%"></div>
            </div>

            <div class="flex justify-between items-center mt-2 text-sm">
              <span class="text-blue-100">Usuarios nuevos</span>
              <span class="font-bold text-white">+12</span>
            </div>
          </div>

          <a href="#ver-todas" class="mt-3 sm:mt-4 block text-center text-xs sm:text-sm bg-white/10 hover:bg-white/20 rounded-lg py-2 transition-colors">
            Ver detalles completos
          </a>
        </div>

        <div class="mt-4 sm:mt-6 pt-3 sm:pt-4 border-t border-gray-200">
          <a href="#logout" class="flex items-center p-2 sm:p-3 text-gray-700 hover:bg-red-50 hover:text-red-700 rounded-xl transition-all duration-200 text-sm sm:text-base">
            <i class="fas fa-sign-out-alt w-5 sm:w-6 mr-2 sm:mr-3 text-gray-500 flex-shrink-0"></i>
            <span>Cerrar Sesión</span>
          </a>
        </div>
      </nav>
    </aside>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-20 lg:hidden hidden transition-opacity duration-300"></div>

    <!-- Contenido principal -->
    <main class="flex-1 flex flex-col p-3 sm:p-4 md:p-8 overflow-auto transition-all duration-300 w-full h-full">
        <div class="flex-1">
            @yield('content')
        </div>

    </main>
  </div>

  <!-- Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Fecha (dd/mm/yyyy)
      const today = new Date();
      const dd = String(today.getDate()).padStart(2, '0');
      const mm = String(today.getMonth() + 1).padStart(2, '0');
      const yyyy = today.getFullYear();
      const todayPill = document.getElementById('today-pill');
      if (todayPill) todayPill.innerHTML = '<i class="fas fa-calendar-alt mr-1"></i> ' + dd + '/' + mm + '/' + yyyy;

      // Año footer
      const year = document.getElementById('year');
      if (year) year.textContent = yyyy;

      // Sidebar toggle
      const sidebarToggle = document.getElementById('sidebar-toggle');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');

      function toggleSidebar() {
        const isOpen = sidebar.classList.contains('translate-x-0');
        if (isOpen) {
          // Cerrar
          sidebar.classList.add('-translate-x-full');
          sidebar.classList.remove('translate-x-0');
          overlay.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        } else {
          // Abrir
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

      // Resize fix
      window.addEventListener('resize', function () {
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
    });
  </script>

  @vite('resources/js/app.js')
  @stack('scripts')
</body>
</html>

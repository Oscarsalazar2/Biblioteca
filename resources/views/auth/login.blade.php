@extends("layouts.app")

@section("title", "Iniciar Sesión")

@section('content')
  <!-- Header con navegación -->
  <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">
    <div class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 rounded-lg bg-blue-700 flex items-center justify-center custom-shadow1">
            <i class="fas fa-book-open text-white text-xl"></i>
          </div>
          <div>
            <h1 class="text-xl font-bold text-blue-800">Biblioteca<span class="text-blue-500">Digital</span></h1>
            <p class="text-xs text-gray-500">Tu portal al conocimiento</p>
          </div>
        </div>

        <!-- Menú de navegación -->
        <nav class="hidden md:block">
          <ul class="flex space-x-8 items-center">
            <li>
              <a href="{{ route('welcome') }}" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                <i class="fas fa-home mr-2"></i>Inicio
              </a>
            </li>
            <li>
              <a href="{{ route('registro') }}" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg font-medium transition-all ml-4 glow">
                <i class="fas fa-user-plus mr-2"></i>Registrarse
              </a>
            </li>
          </ul>
        </nav>

        <!-- Botón menú hamburguesa para móvil -->
        <button id="menu-toggle" class="md:hidden text-blue-800 focus:outline-none" aria-label="Abrir menú">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>

      <!-- Menú móvil -->
      <div id="mobile-menu" class="hidden md:hidden mt-4 pb-2">
        <ul class="space-y-3">
          <li>
            <a href="{{ route('welcome') }}" class="block py-2 px-4 hover:bg-gray-100 rounded-lg">
              <i class="fas fa-home mr-3"></i>Inicio
            </a>
          </li>
          <li class="pt-2 border-t border-gray-200">
            <a href="{{ route('registro') }}" class="block py-3 px-4 bg-blue-700 text-white text-center rounded-lg font-medium glow">
              <i class="fas fa-user-plus mr-2"></i>Registrarse
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <!-- Contenido principal de login -->
  <main class="container mx-auto px-4 py-8 md:py-16">
    <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <!-- Sección ilustrativa -->
        <div class="hidden lg:block">
          <div class="relative">
            <!-- Libro animado -->
            <div class="page-flip custom-shadow1 rounded-2xl overflow-hidden">
              <div class="book-background h-125 rounded-2xl flex flex-col justify-center items-center p-10 text-white text-center">
                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center mb-6 backdrop-blur-sm">
                  <i class="fas fa-book-reader text-white text-4xl"></i>
                </div>
                <h2 class="text-3xl font-bold mb-4">Bienvenido de vuelta</h2>
                <p class="text-lg mb-8 opacity-90">
                  Accede a tu cuenta para continuar explorando nuestro vasto catálogo digital y servicios exclusivos.
                </p>

                <!-- Elementos visuales decorativos -->
                <div class="flex space-x-4 mt-8">
                  <div class="bg-white/20 p-4 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-book text-2xl mb-2"></i>
                    <p class="text-sm">50,000+ libros</p>
                  </div>
                  <div class="bg-white/20 p-4 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-headphones text-2xl mb-2"></i>
                    <p class="text-sm">Audiolibros</p>
                  </div>
                  <div class="bg-white/20 p-4 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-graduation-cap text-2xl mb-2"></i>
                    <p class="text-sm">Cursos online</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Elementos decorativos flotantes -->
            <div class="absolute -top-6 -right-6 w-16 h-16 rounded-full bg-yellow-400 flex items-center justify-center custom-shadow1">
              <i class="fas fa-bookmark text-yellow-800 text-2xl"></i>
            </div>
            <div class="absolute -bottom-6 -left-6 w-20 h-20 rounded-full bg-blue-500 flex items-center justify-center custom-shadow1">
              <i class="fas fa-user-check text-white text-3xl"></i>
            </div>
          </div>

          <!-- Estadísticas rápidas -->
          <div class="mt-10 grid grid-cols-3 gap-4">
            <div class="bg-white custom-shadow1 p-4 rounded-xl text-center">
              <div class="text-2xl font-bold text-blue-800">15,000+</div>
              <div class="text-sm text-gray-600">Usuarios activos</div>
            </div>
            <div class="bg-white custom-shadow1  p-4 rounded-xl text-center">
              <div class="text-2xl font-bold text-blue-800">98%</div>
              <div class="text-sm text-gray-600">Satisfacción</div>
            </div>
            <div class="bg-white custom-shadow1 p-4 rounded-xl text-center">
              <div class="text-2xl font-bold text-blue-800">24/7</div>
              <div class="text-sm text-gray-600">Soporte</div>
            </div>
          </div>
        </div>

        <!-- Formulario de login -->
        <div class="bg-white custom-shadow1 rounded-2xl p-8 md:p-10">
          <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-100 mb-6">
              <i class="fas fa-key text-blue-700 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-blue-800 mb-2">Iniciar Sesión</h2>
            <p class="text-gray-600">Ingresa tus credenciales para acceder a tu cuenta</p>
          </div>

          <form action="{{ route('login.submit') }}" method="POST" id="loginForm" class="space-y-6">
            @csrf

            <!-- Mensajes de error y éxito -->
            @if ($errors->any())
              <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                  @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            @if (session('success'))
              <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                <p class="text-sm">{{ session('success') }}</p>
              </div>
            @endif

            <!-- Campo de email -->
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-envelope mr-2 text-blue-600"></i>Correo Electrónico
              </label>
              <div class="relative">
                <input
                  type="email"
                  id="email"
                  name="email"
                  required
                  value="{{ old('email') }}"
                  placeholder="usuario@ejemplo.com"
                  class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus-effect transition-all"
                >
                <div class="absolute left-4 top-3.5 text-gray-400">
                  <i class="fas fa-user-circle"></i>
                </div>
              </div>
              <p class="text-xs text-gray-500 mt-2">Ingresa el correo con el que te registraste</p>
            </div>

            <!-- Campo de contraseña -->
            <div>
              <div class="flex justify-between items-center mb-2">
                <label for="password" class="block text-sm font-medium text-gray-700">
                  <i class="fas fa-lock mr-2 text-blue-600"></i>Contraseña
                </label>
                <a href="#olvide" class="text-sm text-blue-600 hover:text-blue-800 transition-colors">
                  ¿Olvidaste tu contraseña?
                </a>
              </div>
              <div class="relative">
                <input
                  type="password"
                  id="password"
                  name="password"
                  required
                  placeholder="••••••••"
                  class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus-effect transition-all"
                >
                <div class="absolute left-4 top-3.5 text-gray-400">
                  <i class="fas fa-key"></i>
                </div>
                <button type="button" id="togglePassword" class="absolute right-4 top-3.5 text-gray-400 hover:text-blue-600">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
              <div class="flex items-center mt-4">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 rounded">
                <label for="remember" class="ml-2 text-sm text-gray-700">Recordar mi sesión</label>
              </div>
            </div>

            <!-- Botón de envío -->
            <button
              type="submit"
              class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-4 px-4 rounded-lg transition-all transform hover:-translate-y-1 pulse-animation1 glow1"
            >
              <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
            </button>

            <!-- Separador -->
            <div class="relative my-6">
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
              </div>
              <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500">O continuar con</span>
              </div>
            </div>

            <!-- Botones de login social -->
            <div class="grid grid-cols-2 gap-4">
              <button type="button" class="flex items-center justify-center py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-all">
                <i class="fab fa-google text-red-500 mr-3"></i>
                <span>Google</span>
              </button>
              <button type="button" class="flex items-center justify-center py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-all">
                <i class="fab fa-facebook text-blue-600 mr-3"></i>
                <span>Facebook</span>
              </button>
            </div>

            <!-- Enlace a registro -->
            <div class="text-center pt-6 border-t border-gray-200">
              <p class="text-gray-600">
                ¿No tienes una cuenta?
                <a href="{{ route('registro') }}" class="text-blue-700 font-medium hover:text-blue-800 transition-colors">
                  Regístrate gratis
                </a>
              </p>
              <p class="text-sm text-gray-500 mt-2">
                Al registrarte obtienes acceso inmediato a miles de recursos digitales
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  @include("partials.auth.footer")
@endsection

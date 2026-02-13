  @extends("layouts.app")

@section('title', 'Biblioteca Digital - Tu portal al conocimiento')
@section('content')
  <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">
    <div class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 rounded-lg bg-blue-700 flex items-center justify-center custom-shadow">
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
              <a href="{{ route('login') }}" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg font-medium transition-all ml-4 glow">
                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
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
            <a href="{{ route('login') }}" class="block py-3 px-4 bg-blue-700 text-white text-center rounded-lg font-medium glow">
              <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <!-- Contenido principal de registro -->
  <main class="container mx-auto px-4 py-8 md:py-16">
    <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <!-- Sección ilustrativa -->
        <div class="hidden lg:block">
          <div class="relative">
            <!-- Libro animado -->
            <div class="page-flip custom-shadow rounded-2xl overflow-hidden">
              <div class="book-background h-125 rounded-2xl flex flex-col justify-center items-center p-10 text-white text-center">
                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center mb-6 backdrop-blur-sm">
                  <i class="fas fa-user-plus text-white text-4xl"></i>
                </div>
                <h2 class="text-3xl font-bold mb-4">Únete a nuestra comunidad</h2>
                <p class="text-lg mb-8 opacity-90">
                  Más de 15,000 lectores ya disfrutan de acceso ilimitado a miles de libros y recursos digitales.
                </p>

                <!-- Beneficios de registro -->
                <div class="space-y-4 mt-8">
                  <div class="flex items-center bg-white/10 p-3 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-check-circle text-green-300 mr-3"></i>
                    <span>Acceso gratuito a 50,000+ libros</span>
                  </div>
                  <div class="flex items-center bg-white/10 p-3 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-check-circle text-green-300 mr-3"></i>
                    <span>Préstamos físicos y digitales</span>
                  </div>
                  <div class="flex items-center bg-white/10 p-3 rounded-lg backdrop-blur-sm">
                    <i class="fas fa-check-circle text-green-300 mr-3"></i>
                    <span>Eventos y clubes de lectura exclusivos</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Elementos decorativos flotantes -->
            <div class="absolute -top-6 -right-6 w-16 h-16 rounded-full bg-green-500 flex items-center justify-center custom-shadow">
              <i class="fas fa-gift text-white text-2xl"></i>
            </div>
            <div class="absolute -bottom-6 -left-6 w-20 h-20 rounded-full bg-blue-500 flex items-center justify-center custom-shadow">
              <i class="fas fa-users text-white text-3xl"></i>
            </div>
          </div>

          <!-- Testimonios rápidos -->
          <div class="mt-10 bg-white custom-shadow p-6 rounded-xl">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                <i class="fas fa-user-graduate text-blue-700"></i>
              </div>
              <div>
                <h4 class="font-bold text-blue-800">Ximena Amador</h4>
                <p class="text-sm text-gray-600">Estudiante de Ing. Sistemas</p>
              </div>
            </div>
            <p class="text-gray-600 italic">
              "Registrarme fue lo mejor que pude hacer. La biblioteca digital ha transformado completamente mi forma de estudiar."
            </p>
          </div>
        </div>

        <!-- Formulario de registro -->
        <div class="bg-white custom-shadow rounded-2xl p-8 md:p-10">
          <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-100 mb-6">
              <i class="fas fa-user-plus text-blue-700 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-blue-800 mb-2">Crear Cuenta</h2>
            <p class="text-gray-600">Completa el formulario para comenzar tu viaje literario</p>

            <!-- Barra de progreso (opcional) -->
            <div class="mt-4">
              <div class="flex justify-between mb-1">
                <span class="text-sm font-medium text-blue-700">Completado: <span id="progress-percentage">0%</span></span>
                <span class="text-sm font-medium text-gray-500">Paso 1 de 3</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div id="progress-bar" class="bg-blue-600 h-2.5 rounded-full progress-bar" style="width: 33%"></div>
              </div>
            </div>
          </div>

          <form action="{{ route('registro.submit') }}" method="POST" id="registerForm" class="space-y-6">
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

            <!-- Información Personal -->
            <div>
              <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                <i class="fas fa-user-circle mr-2"></i> Información Personal
              </h3>

              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                  Nombre Completo
                </label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  required
                  placeholder="Tu nombre completo"
                  value="{{ old('name') }}"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus-effect transition-all"
                >
                @error('name')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- Información de Contacto -->
            <div>
              <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                <i class="fas fa-envelope mr-2"></i> Información de Contacto
              </h3>

              <div class="space-y-4">
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Correo Electrónico
                  </label>
                  <div class="relative">
                    <input
                      type="email"
                      id="email"
                      name="email"
                      required
                      placeholder="usuario@ejemplo.com"
                      value="{{ old('email') }}"
                      class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus-effect transition-all"
                    >
                    <div class="absolute left-4 top-3.5 text-gray-400">
                      <i class="fas fa-envelope"></i>
                    </div>
                  </div>
                  @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Seguridad -->
            <div>
              <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                <i class="fas fa-lock mr-2"></i> Seguridad
              </h3>

              <div class="space-y-4">
                <div>
                  <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Contraseña
                  </label>
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
                  <div id="password-strength" class="mt-2">
                    <div class="flex space-x-1">
                      <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                      <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                      <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                      <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">La contraseña debe tener al menos 8 caracteres</p>
                  </div>
                  @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                  @enderror
                </div>

                <div>
                  <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Confirmar Contraseña
                  </label>
                  <div class="relative">
                    <input
                      type="password"
                      id="password_confirmation"
                      name="password_confirmation"
                      required
                      placeholder="••••••••"
                      class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus-effect transition-all"
                    >
                    <div class="absolute left-4 top-3.5 text-gray-400">
                      <i class="fas fa-key"></i>
                    </div>
                  </div>
                  <p id="password-match" class="text-xs mt-1"></p>
                </div>
              </div>
            </div>

            <!-- Preferencias -->
            <div>
              <div class="space-y-3">
                <div class="flex items-start">
                  <input type="checkbox" id="newsletter" name="newsletter" class="h-4 w-4 mt-1 text-blue-600 rounded" checked>
                  <label for="newsletter" class="ml-2 text-sm text-gray-700">
                    Quiero recibir el boletín semanal con novedades literarias y eventos
                  </label>
                </div>

                <div class="flex items-start">
                  <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 mt-1 text-blue-600 rounded">
                  <label for="terms" class="ml-2 text-sm text-gray-700">
                    Acepto los
                    <a href="#terminos" class="text-blue-600 hover:text-blue-800">Términos de Uso</a>
                    y la
                    <a href="#privacidad" class="text-blue-600 hover:text-blue-800">Política de Privacidad</a>
                  </label>
                </div>
              </div>
            </div>

            <!-- Botón de registro -->
            <button
              type="submit"
              id="registerBtn"
              class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-4 rounded-lg transition-all transform hover:-translate-y-1 pulse-animation glow"
            >
              <i class="fas fa-user-plus mr-2"></i>Crear Cuenta Gratis
            </button>

            <!-- Separador -->
            <div class="relative my-6">
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
              </div>
              <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500">O regístrate con</span>
              </div>
            </div>

            <!-- Botones de registro social -->
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

            <!-- Enlace a login -->
            <div class="text-center pt-6 border-t border-gray-200">
              <p class="text-gray-600">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="text-blue-700 font-medium hover:text-blue-800 transition-colors">
                  Inicia sesión aquí
                </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Sección de beneficios -->
  <section class="py-12 bg-linear-to-r from-blue-50 to-indigo-50">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-bold text-center text-blue-800 mb-10">Beneficios al registrarte hoy</h3>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center">
          <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-bolt text-blue-700 text-2xl"></i>
          </div>
          <h4 class="font-bold text-blue-800 mb-2">Acceso inmediato</h4>
          <p class="text-gray-600 text-sm">Comienza a explorar nuestra biblioteca digital al instante</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-gift text-green-700 text-2xl"></i>
          </div>
          <h4 class="font-bold text-blue-800 mb-2">Bienvenida especial</h4>
          <p class="text-gray-600 text-sm">Obtén 3 préstamos extra en tu primer mes como regalo</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 rounded-full bg-purple-100 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-star text-purple-700 text-2xl"></i>
          </div>
          <h4 class="font-bold text-blue-800 mb-2">Recomendaciones personalizadas</h4>
          <p class="text-gray-600 text-sm">Recibe sugerencias de libros basadas en tus intereses</p>
        </div>
      </div>
    </div>
  </section>
  </section>
  @include("partials.auth.footer")
@endsection

@push('scripts')
<script>
  // Toggle para mostrar/ocultar contraseña
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  const passwordIcon = togglePassword.querySelector('i');

  togglePassword.addEventListener('click', function() {
    // Cambiar el tipo de input
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Cambiar el ícono
    if (type === 'text') {
      passwordIcon.classList.remove('fa-eye');
      passwordIcon.classList.add('fa-eye-slash');
    } else {
      passwordIcon.classList.remove('fa-eye-slash');
      passwordIcon.classList.add('fa-eye');
    }
  });

  // Verificar coincidencia de contraseñas
  const passwordConfirmation = document.getElementById('password_confirmation');
  const passwordMatch = document.getElementById('password-match');

  passwordConfirmation.addEventListener('input', function() {
    if (passwordConfirmation.value === '') {
      passwordMatch.textContent = '';
    } else if (passwordInput.value === passwordConfirmation.value) {
      passwordMatch.textContent = '✓ Las contraseñas coinciden';
      passwordMatch.className = 'text-xs mt-1 text-green-600';
    } else {
      passwordMatch.textContent = '✗ Las contraseñas no coinciden';
      passwordMatch.className = 'text-xs mt-1 text-red-600';
    }
  });

  // Menú móvil toggle
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
    });
  }

  // Validación de fortaleza de contraseña
  passwordInput.addEventListener('input', function() {
    const password = passwordInput.value;
    const strengthBars = document.querySelectorAll('#password-strength .h-1');

    let strength = 0;
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[@$!%*?&#]/)) strength++;

    strengthBars.forEach((bar, index) => {
      bar.classList.remove('bg-gray-200', 'bg-red-500', 'bg-yellow-500', 'bg-green-500');
      if (index < strength) {
        if (strength <= 1) {
          bar.classList.add('bg-red-500');
        } else if (strength <= 2) {
          bar.classList.add('bg-yellow-500');
        } else {
          bar.classList.add('bg-green-500');
        }
      } else {
        bar.classList.add('bg-gray-200');
      }
    });
  });

  // Actualizar barra de progreso del formulario
  const formInputs = document.querySelectorAll('#registerForm input[required]');
  const progressBar = document.getElementById('progress-bar');
  const progressPercentage = document.getElementById('progress-percentage');

  formInputs.forEach(input => {
    input.addEventListener('input', updateProgress);
  });

  function updateProgress() {
    let filledInputs = 0;
    formInputs.forEach(input => {
      if (input.value.trim() !== '' && (input.type !== 'checkbox' || input.checked)) {
        filledInputs++;
      }
    });

    const percentage = Math.round((filledInputs / formInputs.length) * 100);
    progressBar.style.width = percentage + '%';
    progressPercentage.textContent = percentage + '%';
  }
</script>
@endpush

    // Año actual en el footer
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Alternar visibilidad de contraseña
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const icon = this.querySelector('i');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });

    // Manejo del formulario
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      // Validación básica
      if (!email || !password) {
        alert('Por favor, completa todos los campos');
        return;
      }

      // Simulación de inicio de sesión exitoso
      const submitBtn = this.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;

      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Iniciando sesión...';
      submitBtn.disabled = true;

      // Simular petición al servidor
      setTimeout(() => {
        alert('¡Inicio de sesión exitoso! Redirigiendo...');
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;

        // En un caso real, aquí redirigirías al dashboard
        // window.location.href = 'dashboard.html';
      }, 1500);
    });

    // Menú hamburguesa
    document.getElementById('menu-toggle').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      if (mobileMenu) {
        mobileMenu.classList.toggle('hidden');
      }
    });

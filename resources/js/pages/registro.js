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
    
    // Validación de fortaleza de contraseña
    document.getElementById('password').addEventListener('input', function() {
      const password = this.value;
      const strengthBars = document.querySelectorAll('#password-strength div div');
      const strengthText = document.querySelector('#password-strength p');
      
      // Reset bars
      strengthBars.forEach(bar => {
        bar.className = 'h-1 w-1/4 rounded';
      });
      
      if (password.length === 0) {
        strengthBars.forEach(bar => bar.classList.add('bg-gray-200'));
        strengthText.textContent = 'La contraseña debe tener al menos 8 caracteres';
        strengthText.className = 'text-xs text-gray-500 mt-1';
        return;
      }
      
      let strength = 0;
      
      // Longitud
      if (password.length >= 8) strength++;
      // Mayúsculas
      if (/[A-Z]/.test(password)) strength++;
      // Números
      if (/[0-9]/.test(password)) strength++;
      // Caracteres especiales
      if (/[^A-Za-z0-9]/.test(password)) strength++;
      
      // Colores según fortaleza
      const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500'];
      const messages = [
        'Contraseña débil',
        'Contraseña aceptable',
        'Contraseña buena',
        'Contraseña fuerte'
      ];
      
      for (let i = 0; i < strength; i++) {
        strengthBars[i].classList.add(colors[strength - 1]);
      }
      
      strengthText.textContent = messages[strength - 1] || 'Contraseña muy débil';
      strengthText.className = `text-xs ${strength >= 3 ? 'text-green-600' : 'text-red-600'} font-medium mt-1`;
      
      // Actualizar progreso
      updateProgress();
    });
    
    // Validación de coincidencia de contraseñas
    document.getElementById('confirm-password').addEventListener('input', function() {
      const password = document.getElementById('password').value;
      const confirmPassword = this.value;
      const matchText = document.getElementById('password-match');
      
      if (confirmPassword.length === 0) {
        matchText.textContent = '';
        return;
      }
      
      if (password === confirmPassword) {
        matchText.textContent = '✓ Las contraseñas coinciden';
        matchText.className = 'text-xs text-green-600 mt-1';
      } else {
        matchText.textContent = '✗ Las contraseñas no coinciden';
        matchText.className = 'text-xs text-red-600 mt-1';
      }
      
      updateProgress();
    });
    
    // Actualizar barra de progreso
    function updateProgress() {
      const fields = [
        document.getElementById('nombre'),
        document.getElementById('apellido'),
        document.getElementById('email'),
        document.getElementById('password'),
        document.getElementById('confirm-password'),
        document.getElementById('terms')
      ];
      
      let completed = 0;
      fields.forEach(field => {
        if (field) {
          if (field.type === 'checkbox') {
            if (field.checked) completed++;
          } else {
            if (field.value.length > 0) completed++;
          }
        }
      });
      
      const percentage = Math.round((completed / fields.length) * 100);
      const progressBar = document.getElementById('progress-bar');
      const progressText = document.getElementById('progress-percentage');
      
      progressBar.style.width = `${percentage}%`;
      progressText.textContent = `${percentage}%`;
      
      // Cambiar paso según progreso
      const stepText = document.querySelector('#progress-bar + div span:last-child');
      let step = 1;
      if (percentage > 33 && percentage < 66) step = 2;
      if (percentage >= 66) step = 3;
      stepText.textContent = `Paso ${step} de 3`;
    }
    
    // Actualizar progreso cuando se llenan campos
    document.querySelectorAll('input').forEach(input => {
      input.addEventListener('input', updateProgress);
      if (input.type === 'checkbox') {
        input.addEventListener('change', updateProgress);
      }
    });
    
    // Manejo del formulario
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Validaciones
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm-password').value;
      const terms = document.getElementById('terms').checked;
      
      if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden');
        return;
      }
      
      if (password.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres');
        return;
      }
      
      if (!terms) {
        alert('Debes aceptar los términos y condiciones');
        return;
      }
      
      // Simulación de registro exitoso
      const registerBtn = document.getElementById('registerBtn');
      const originalText = registerBtn.innerHTML;
      
      registerBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creando cuenta...';
      registerBtn.disabled = true;
      registerBtn.classList.remove('hover:-translate-y-1');
      
      // Simular petición al servidor
      setTimeout(() => {
        alert('¡Registro exitoso! Te hemos enviado un correo de confirmación.');
        registerBtn.innerHTML = originalText;
        registerBtn.disabled = false;
        registerBtn.classList.add('hover:-translate-y-1');
        
        // En un caso real, aquí redirigirías al dashboard o login
        // window.location.href = 'dashboard.html';
      }, 2000);
    });

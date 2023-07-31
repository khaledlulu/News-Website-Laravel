// <!-- Place this JavaScript code inside a <script> tag or a separate .js file -->


    // var passwordInput = document.getElementById('password');
    // const togglePassword = document.querySelector('.toggle-password');

    // togglePassword.addEventListener('click', function () {
    //     if (passwordInput.type === 'password') {
    //         passwordInput.type = 'text'; // Show password
    //         togglePassword.classList.remove('fa-eye');
    //         togglePassword.classList.add('fa-eye-slash');
    //     } else {
    //         passwordInput.type = 'password'; // Hide password
    //         togglePassword.classList.remove('fa-eye-slash');
    //         togglePassword.classList.add('fa-eye');
    //     }
    // });

    const togglePasswordIcons = document.querySelectorAll('.toggle-password');

    togglePasswordIcons.forEach(icon => {
        icon.addEventListener('click', function () {
            const targetInputId = this.dataset.target;
            const targetInput = document.getElementById(targetInputId);

            if (targetInput.type === 'password') {
                targetInput.type = 'text'; // Show password
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                targetInput.type = 'password'; // Hide password
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });

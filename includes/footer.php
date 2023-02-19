<script>
    const username = document.querySelector("#username");
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");

    username.addEventListener('keyup', () => {
        const alerta = document.querySelector('.alerta');
        if (username.value === "") {
            if (!alerta) {
                mensaje("El usuario es obligatorio", "#username")
            }
        } else {
            alerta.remove();
        }
    });

    email.addEventListener('keyup', () => {
        const alerta = document.querySelector('.alerta');
        if (email.value === "") {
            if (!alerta) {
                mensaje("El correo es obligatorio", "#email")
            }
        } else {
            alerta.remove();
        }
    });

    password.addEventListener('keyup', () => {
        const alerta = document.querySelector('.alerta');
        if (password.value === "") {
            if (!alerta) {
                mensaje("La contraseña es obligatoria", "#password")
            }
        } else {
            alerta.remove();
        }
    });

    function mensaje(alerta, selector) {
        const error = document.createElement('p');
        error.classList.add("alerta", "bg-red-500", "p-2", "my-1", "text-center", "text-white", "rounded");
        error.textContent = alerta;
        const input = document.querySelector(selector);
        input.parentNode.insertBefore(error, input.nextSibling)
    }
</script>
</body>

</html>
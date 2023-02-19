<?php
require_once 'config/db.php';

$errors = [];
$ptnEmail = "/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/";
$ptnPassword = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
$username = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    if (!$username || !$email || !$password || !$password_confirmation) {
        $errors[] = "Todos los campos son obligatorios";
    } else {

        if (strlen($username) > 20) {
            $errors[] = "El usuario no debe tener mas de 20 caracteres";
        }
        if (!preg_match($ptnEmail, $email)) {
            $errors[] = "El formato del correo es incorrecto";
        }
        if (!preg_match($ptnPassword, $password)) {
            $errors[] = "La contraseña debe contener al menos una mayúscula, un número y un caracter especial";
        } else {
            $q = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $q->bind_param('s', $email);
            $q->execute();
            $r = $q->get_result();

            $rows = $r->num_rows;

            if ($rows > 0) {
                $errors[] = "El usuario ya esta registrado";
            } else {
                if ($password_confirmation === $password) {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                } else {
                    $errors[] = "Las contraseñas no coinciden";
                }
            }
        }

        if (empty($errors)) {

            $q = $conn->prepare("INSERT INTO users(username,email,password)VALUES(?,?,?)");
            $q->bind_param('sss', $username, $email, $hashedPassword);
            if ($q->execute()) {
                echo '<div class="shadow-lg transition hover:bg-emerald-600 bg-emerald-500 p-2 text-center text-white rounded md:w-1/3" style="margin:10px auto!important;" role="alert">
                <p class="">¡Tu cuenta ha sido creada con éxito! 
                <a href="login.php" class="font-semibold hover:underline">inicia sesión</a></p>
              </div>';
            }
        }
    }
}

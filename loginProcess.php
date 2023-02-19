<?php
require_once 'config/db.php';

$errors = [];
$ptnEmail = "/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/";


$email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$email || !$password) {
        $errors[] = "Todos los campos son obligatorios";
    } else {

        if (!preg_match($ptnEmail, $email)) {
            $errors[] = "El formato del correo es incorrecto";
        }
    }

    if (empty($errors)) {

        $q = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
        $q->bind_param('s', $email);
        $q->execute();
        $r = $q->get_result();

        $rows = $r->num_rows;
        // var_dump($r);

        if ($rows > 0) {
            $f = $r->fetch_assoc();


            $checkPass = password_verify($password, $f['password']);

            if (!$checkPass) {
                $errors[] = "La contraseña es incorrecta";
            }

            session_start();

            $_SESSION['id'] = $f['id'];
            $_SESSION['username'] = $f['username'];
            $_SESSION['email'] = $f['email'];
            // $_SESSION['rol'] = $f['rol'];
            $_SESSION['login'] = true;

            header('location:dashboard.php');
        } else {
            $errors[] = "El usuario no existe";
        }
    }
}

<?php
require_once 'config/db.php';
require_once 'config/functions.php';

$errors = [];
$ptnEmail = "/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/";

$email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    if (!$email || !$password) {
        $errors[] = "Todos los campos son obligatorios";
    } else {
        if (!preg_match($ptnEmail, $email)) {
            $errors[] = "El formato del correo es incorrecto";
        }
    }

    if (empty($errors)) {

        $q = $conn->prepare("SELECT id, is_admin, username, email, password FROM users WHERE email = ?");
        $q->bind_param('s', $email);
        $q->execute();
        $r = $q->get_result();

        $rows = $r->num_rows;

        if ($rows > 0) {
            $f = $r->fetch_assoc();

            $checkPass = password_verify($password, $f['password']);

            if ($checkPass) {
                session_start();

                $_SESSION['id'] = $f['id'];
                $_SESSION['username'] = $f['username'];
                $_SESSION['email'] = $f['email'];
                $_SESSION['is_admin'] = $f['is_admin'];
                $_SESSION['login'] = true;

                header('location:dashboard.php');
            } else {
                $errors[] = "Error de autenticación";
            }
        } else {
            $errors[] = "Error de autenticación";
        }
    }
}

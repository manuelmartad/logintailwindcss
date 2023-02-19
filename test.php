<?php

require_once 'config/db.php';

$hash = password_hash('natalia', PASSWORD_BCRYPT);
$q = $conn->query("INSERT INTO users(username,email,password)VALUES('admin','admin@correo.com', '$hash')");

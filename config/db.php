<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "login-tailwindcss";

$conn = new mysqli($server, $user, $password, $database);

// Check connection
if ($conn->connect_errno) {
  header('location:error.html');
}

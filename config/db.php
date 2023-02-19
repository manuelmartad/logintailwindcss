<?php

$conn = new mysqli("localhost", "root", "root", "login-tailwindcss");

// Check connection
if ($conn->connect_errno) {
  header('location:../error.html');
}

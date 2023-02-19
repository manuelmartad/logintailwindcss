<?php

$conn = new mysqli("localhost", "root", "", "login-tailwindcss");

// Check connection
if ($conn->connect_errno) {
  header('location:../error.html');
}

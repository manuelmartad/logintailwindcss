<?php
session_start();
require_once 'config/db.php';
include 'includes/header.php';

if (!$_SESSION['login']) {
    header('location:index.php');
}

$q = $conn->query("SELECT * FROM users");

?>

<div class="md:w-1/3 mx-auto">
    <div class="shadow-xl w-full mx-2 mt-3 rounded bg-slate-50">
        <div class="p-5 flex justify-center flex-col items-center">
            <h1 class="font-semibold">Bienvenido:</h1>
            <span class="font-bold animate-bounce text-6xl mt-5 capitalize">
                <?php echo $_SESSION['username']; ?>
            </span>
            <a href="logout.php" class="mt-5 text-gray-600 cursor-pointer hover:animate-pulse hover:font-bold transition">Cerrar sesión</a>
        </div>
    </div>
</div>
<?php if ($_SESSION['is_admin'] === 1) {
    include 'admin.php';
} ?>
<?php include 'includes/footer.php' ?>
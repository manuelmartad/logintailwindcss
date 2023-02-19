<?php
session_start();
include 'includes/header.php';

if (!$_SESSION['login']) {
    header('location:index.php');
}

?>

<div class="md:w-1/3 mx-auto">
    <div class="shadow-xl w-full mx-2 mt-3 rounded bg-gray-100">
        <div class="p-5 flex justify-center flex-col items-center">
            <h1 class="font-semibold">Bienvenido:</h1>
            <span class="font-bold animate-bounce text-6xl mt-5 capitalize">
                <?php echo $_SESSION['username'] ?>
            </span>
            <a href="logout.php" class="mt-5 text-gray-600 cursor-pointer hover:underline hover:animate-pulse hover:font-bold transition">Cerrar sesión</a>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<?php
session_start();
include 'includes/header.php';
require 'config/functions.php';

if (isset($_SESSION['login'])) {
    header('location:dashboard.php');
}

$file = 'loginProcess.php';
if (file_exists($file)) {
    include $file;
} else {
    header('location:error.html');
}

?>
<div class="md:flex justify-center items-center gap-10 md:mt-20 md:px-20">
    <div class="p-10">
        <img src="assets/img/bg.svg" alt="" style="min-width:300px; max-width:500px;">
        </p>
    </div>


    <div class="shadow-xl md:mx-2 mt-3 rounded-xl bg-white" style="min-width: 360px;">

        <div class="p-5">
            <?php foreach ($errors as $error) :
                alertMessage($error);
            endforeach ?>
            <form method="POST" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-5">
                    <?php inputComponent('email', 'email', 'text', $email, 'Correo electrónico') ?>
                </div>

                <div class="mb-5">
                    <?php inputComponent('password', 'password', 'password', null, 'Contraseña') ?>
                </div>

                <div class="flex flex-col items-center gap-5">
                    <?php buttonSubmitComponent('Iniciar sesión') ?>

                    <a href="forgot.html" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
                    <hr class="border border-1 border-gray-200 w-full">
                    <a href="create.php" class="px-4 mt-3 py-4 font-semibold text-sm bg-green-500 text-white rounded-md shadow-sm hover:bg-green-600 cursor-pointer outline-none transition ease-in-out duration-500" style="font-size: 20px;">Crear cuenta nueva</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
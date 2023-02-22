<?php
session_start();
include 'includes/header.php';

if (isset($_SESSION['login'])) {
  header('location:dashboard.php');
}

$file = 'register.php';
if (file_exists($file)) {
  include $file;
} else {
  header('location:error.html');
}
?>

<div class="md:flex justify-center items-center gap-10 md:mt-20 px-20">
  <div class="p-10">
    <img src="assets/img/bg.svg" alt="" style="min-width:300px; max-width:500px;">

  </div>

  <div class="shadow-xl rounded-xl bg-white" style="max-width: 400px; min-width:350px;">
    <div class="p-5">
      <?php foreach ($errors as $error) :
        alertMessage($error);
      endforeach ?>
      <form method="POST" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-4">
          <?php inputComponent('username', 'username', 'text', $username, 'Nombre de usuario') ?>
        </div>

        <div class="mb-4">
          <?php inputComponent('email', 'email', 'email', $email, 'Correo electrónico') ?>
        </div>

        <div class="mb-4">
          <?php inputComponent('password', 'password', 'password', null, 'Contraseña') ?>
        </div>

        <div class="mb-4">
          <?php inputComponent('password_confirmation', 'password_confirmation', 'password', null, 'Confirmar contraseña') ?>
        </div>

        <div class="flex flex-col justify-center items-center gap-5">
          <?php buttonSubmitComponent('Registrate') ?>
          <a href="index.php" class="text-blue-600 hover:underline">¿Ya tienes una cuenta?</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>
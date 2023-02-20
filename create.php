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
          <input required class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="username" name="username" type="text" value="<?php echo $username ?>" placeholder="Nombre de usuario" />
        </div>

        <div class="mb-4">
          <input required class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="email" name="email" type="email" value="<?php echo $email ?>" placeholder="Correo electrónico" />
        </div>

        <div class="mb-4">
          <input required class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="password" name="password" type="password" placeholder="Contraseña" />
        </div>

        <div class="mb-4">
          <input required class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar contraseña" />
        </div>

        <div class="flex flex-col justify-center items-center gap-5">
          <input type="submit" value="Registrate" class="px-4 mt-3 py-4 w-full font-semibold text-sm bg-violet-500 text-white rounded-md shadow-sm hover:bg-violet-600 cursor-pointer outline-none transition ease-in-out duration-500" style="font-size: 20px;" />
          <a href="index.php" class="text-blue-600 hover:underline">¿Ya tienes una cuenta?</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>
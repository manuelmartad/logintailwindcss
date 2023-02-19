<?php
session_start();
include 'includes/header.php';

$file = 'register.php';
if (file_exists($file)) {
  include $file;
} else {
  header('location:error.html');
}
?>

<div class="md:w-1/3 mx-auto">
  <?php foreach ($errors as $error) : ?>
    <div class="shadow-lg transition hover:bg-red-600 bg-red-500 p-2 my-2 text-center text-white rounded ml-2 w-full" role="alert">
      <p class=""><?php echo $error ?></p>
    </div>
  <?php endforeach ?>
  <div class="shadow-xl w-full mx-2 mt-3 rounded bg-gray-100">
    <div class="p-5">
      <form method="POST">
        <div class="mb-3">
          <p class="font-semibold mb-2 capitalize text-gray-600">usuario</p>
          <input required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="username" name="username" type="text" value="<?php echo $username ?>" placeholder="Johndoe" />
        </div>

        <div class="mb-3">
          <p class="font-semibold mb-2 capitalize text-gray-600">correo</p>
          <input required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="email" name="email" type="email" value="<?php echo $email ?>" placeholder="johndoe@gmail.com" />
        </div>

        <div class="mb-3">
          <p class="font-semibold mb-2 capitalize text-gray-600">contraseña</p>
          <input required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="password" name="password" type="password" placeholder="*******" />
        </div>

        <div class="mb-3">
          <p class="font-semibold mb-2 capitalize text-gray-600">repite tu contraseña</p>
          <input required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-indigo-200 focus:shadow-outline" id="password_confirmation" name="password_confirmation" type="password" placeholder="*******" />
        </div>

        <input type="submit" value="Registrate" class="px-4 mt-3 py-3 w-full font-semibold text-sm bg-violet-500 text-white rounded-md shadow-sm hover:bg-violet-600 cursor-pointer outline-none hover:outline-violet-600 uppercase transition ease-in-out duration-500" />
      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>
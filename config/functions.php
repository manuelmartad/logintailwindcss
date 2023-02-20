<?php

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function alertMessage($message)
{
    echo '<div class="shadow-lg transition hover:bg-red-600 bg-red-500 p-2 mb-2 mt-0 text-center text-white rounded w-full" role="alert">
         <p class="">' . $message . '</p>
         </div>';
}

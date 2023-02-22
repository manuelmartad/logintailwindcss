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



function inputComponent($id, $name, $type, $value = null, $placeholder)
{
    echo '<input required class="shadow appearance-none border 
    rounded w-full py-4 px-3 text-gray-700 leading-tight 
    focus:outline-indigo-200 focus:shadow-outline" id="' . $id . '" 
    name="' . $name . '" type="' . $type . '" value="' . $value . '" 
    placeholder="' . $placeholder . '" />';
}

function buttonSubmitComponent($value)
{
    echo '<input type="submit" value="' . $value . '" 
    class="px-4 mt-3 py-4 w-full font-semibold text-sm bg-violet-500 
    text-white rounded-md shadow-sm hover:bg-violet-600 cursor-pointer 
    outline-none transition ease-in-out duration-500" style="font-size: 20px;" />';
}

<?php
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}
function url($path)
{
    return Base_Url."index.php?page=".$path;
    die();
}
function redirect($path)
{
    header("Location: " . Base_Url . "index.php?page=" . $path);
    die();
}
function get_session($session)
{
    return $_SESSION[$session] ?? false;
}
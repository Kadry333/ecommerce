<?php 
function sanitize($input)
{
    return trim(htmlspecialchars($_POST["$input"]));
}
function check_empty($input)
{
    if(empty($input))
    {
        return true;
    }
    return false;
}
function minlen($input,$len)
{
    if(strlen($input)<$len)
    {
        return true;
    }
    return false;
}
function maxlen($input,$len)
{
    if(strlen($input)>$len)
    {
        return true;
    }
    return false;
}
function number($input)
{
    return !is_numeric($input);
}
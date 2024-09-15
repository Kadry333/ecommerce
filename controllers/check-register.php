<?php
require_once Root_Path."src/validations.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = sanitize("name");
    $email = sanitize("email");
    $password = sanitize("password");
    
    if(check_empty($name))
    {
        $errors["name"]= "name is required";
    }
    else if(minlen($name,3))
    {
        $errors["name"] = "name must be bigger that 3 chars";
    }
    else if(maxlen($name,50))
    {
        $errors["name"] = "name must be smaller that 30 chars";
    } 
    if(check_empty($email)) {
        $errors["email"] = "Email is required";
    }
    $sql = "SELECT `email` FROM `user` WHERE `email` = '$email'";
    $res = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($res);

    
    if($num_rows>=1)
    {
        $errors["email"] = "Email Already Exists";
    }
    
    if(empty($password))
    {
        $errors["password"]="password is required";
    }
    else if(minlen($password,3))
    {
        $errors["password"] = "password must be bigger that 8 chars";
    }
    else if(maxlen($password,30))
    {
        $errors["password"] = "password must be smaller that 30 chars";
    } 
    if(!empty($errors))
    {
        $_SESSION["errors"] = $errors;
    }
    else{
        //$password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`name`,`email`,`password`)
        VALUES ('$name','$email','$password')";
        if(mysqli_query($conn,$sql))
        {
            $_SESSION['auth']=[
                "name"=>$name,
                "email"=>$email
            ];
            $_SESSION['register'] = "Registred Successfully";
            
        }
    }
    redirect("register");

}
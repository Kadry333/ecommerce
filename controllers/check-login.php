<?php

$email = $_POST['email'];
$pass = $_POST['password'];
$sql = "SELECT * from `user` WHERE `email` = '$email'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
    if($row)
    {
        $name = $row['name'];
        $_SESSION['login']=$name;
        $_SESSION['auth'] =[
            "id"=>$row['id'],
            "name"=>$row['name'],
            "email"=>$row['email']
        ];
        redirect("home");
        die();
    }

$_SESSION['login'] = "not";
redirect("login");

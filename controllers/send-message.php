<?php
require_once Root_Path."src/validations.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = sanitize("name");
    $email = sanitize("email");
    $subject = sanitize("subject");
    $message = sanitize("message");
    if(check_empty($name))
    {
        $errors["name"]= "name is required";
    }
    else if(minlen($name,3))
    {
        $errors["name"] = "name must be bigger that 3 chars";
    }
    else if(maxlen($name,30))
    {
        $errors["name"] = "name must be smaller that 30 chars";
    } 
    if(check_empty($email)) {
        $errors["email"] = "Email is required";
    }
    
    if(empty($subject))
    {
        $errors["subject"]="subject is required";
    }
    else if(minlen($subject,3))
    {
        $errors["subject"] = "subject must be bigger that 3 chars";
    }
    else if(maxlen($subject,30))
    {
        $errors["subject"] = "subject must be smaller that 30 chars";
    } 
    if(empty($message))
    {
        $errors["message"]="message is required";
    }
    else if(minlen($message,10))
    {
        $errors["message"] = "message must be bigger that 10 chars";
    }
    else if(maxlen($message,200))
    {
        $errors["message"] = "message must be smaller that 200 chars";
    } 
    if(!empty($errors))
    {
        $_SESSION["errors"] = $errors;
    }
    else{
        $sql = "INSERT INTO `contact` (`name`,`email`,`subject`,`message`)
        VALUES ('$name','$email','$subject','$message')";
        if(mysqli_query($conn,$sql))
        {
            $_SESSION['success'] = "your message has been sent successfully";
        }
    }
    redirect("contact");
}
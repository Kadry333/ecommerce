<?php
require_once Root_Path."src/validations.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = sanitize("name");
    $email = sanitize("email");
    $address = sanitize("address");
    $phone = sanitize("phone");
    $info = sanitize("info");

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
    
    if(empty($address))
    {
        $errors["address"]="address is required";
    }
    else if(minlen($address,3))
    {
        $errors["address"] = "address must be bigger that 3 chars";
    }
    else if(maxlen($address,100))
    {
        $errors["address"] = "address must be smaller that 100 chars";
    } 
    if(empty($phone))
    {
        $errors["phone"]="phone is required";
    }
    else if(number($phone))
    {
        $errors["phone"] = "Enter a valid Phone Numebr";
    }
  
    if(!empty($errors))
    {
        $_SESSION["errors"] = $errors;
    }
    else{
        $total = 0;
        foreach (get_session("card") as $key => $value) {
            $total += $value['price'];
        }
        $id = $_SESSION['auth']['id'];
        $sql = "INSERT INTO `orders` (`name`,`email`,`address`,`info`,`phone`,`user_id`,`total_price`)
        VALUES ('$name','$email','$address','$info','$phone','$id','$total')";
        $res = mysqli_query($conn,$sql);
        if($res)
        {
            $order_id = mysqli_insert_id($conn);
            foreach(get_session("card") as $key => $value)
            {
                $quantity = $value['quantity'];
                $sql = "INSERT INTO `order_products` (`order_id`,`product_id`,`quantity`)
                VALUES ('$order_id','$key','$quantity')";
                mysqli_query($conn,$sql);
            }
           $_SESSION['success'] = "your order has been saved successfully";
           unset($_SESSION['card']);
           redirect("shop");
        }
    }
    redirect("checkout");
}
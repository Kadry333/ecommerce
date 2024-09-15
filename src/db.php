<?php
$conn = mysqli_connect("localhost","root","","zay-store");
$sql = "CREATE TABLE IF NOT EXISTS `products`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `price` INT NOT NULL,
    `rating` SMALLINT NOT NULL,
    `review` SMALLINT NOT NULL,
    `description` TEXT NOT NULL,
    `image` VARCHAR(100),
    `category_id` INT NOT NULL,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
)";
mysqli_query($conn,$sql);
$sql = "SELECT COUNT(*) AS count FROM `products`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['count'] == 0) {
    // Insert data into products table if it's empty
    $sql = "INSERT INTO `products`(`title`, `price`, `rating`, `review`, `description`, `image`, `category_id`)
    VALUES 
    ('Gym Weight', 240, 3, 24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.', '01.jpg', 3),
    ('Cloud Nike Shoes', 480, 4, 48, 'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.', '02.jpg', 2),
    ('Summer Addides Shoes', 360, 5, 74, 'Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.', '03.jpg', 1)";
    mysqli_query($conn, $sql);
}
$brand_sql = "CREATE TABLE IF NOT EXISTS `brand`(`id` INT PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(100) NOT NULL,`image` VARCHAR(100) NOT NULL)";
$res = mysqli_query($conn,$brand_sql);
$brand_count_sql = "SELECT COUNT(*) AS count FROM `brand`";
$res = mysqli_query($conn,$brand_count_sql);
$row = mysqli_fetch_assoc($res);
if($row['count']==0)
{
    $brand_sql = "INSERT INTO `brand` (`name`,`image`) Values
    ('levi','01.jpg'),('adidas','02.jpg'),('nike','03.jpg'),('hm','04.jpg')";
    mysqli_query($conn,$brand_sql);
}
$cont_sql = "CREATE TABLE IF NOT EXISTS `contact`(`id` INT PRIMARY KEY AUTO_INCREMENT,
`email` VARCHAR(150) NOT NULL,`subject` VARCHAR(100) NOT NULL,`message` VARCHAR(500) NOT NULL)";
$cont_res = mysqli_query($conn,$cont_sql);
$user_sql = "CREATE TABLE IF NOT EXISTS `user`(`id` INT PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL,`email` VARCHAR(150) NOT NULL UNIQUE,`password` VARCHAR(20) Not NULL)";
mysqli_query($conn,$user_sql);
$order_sql = "CREATE TABLE IF NOT EXISTS `orders`(
`id` INT PRIMARY KEY AUTO_INCREMENT,
`email` VARCHAR(150) NOT NULL,
`name` VARCHAR(100) NOT NULL,
`info` VARCHAR(500) NOT NULL,
`address` VARCHAR(500) NOT NULL,
`created_at` TIMESTAMP DEFAULT(now()) NOT NULL,
`phone` VARCHAR(15) NOT NULL,
`total_price` FLOAT NOT NULL,
`status` ENUM('pending','processing','shipped','delivered')DEFAULT ('pending') NOT NULL,
`user_id` INT NOT NULL,
FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
)";
mysqli_query($conn,$order_sql);
$order_products_sql = "CREATE TABLE IF NOT EXISTS `order_products`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `order_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`),
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)

    )";
    mysqli_query($conn,$order_products_sql);
?>
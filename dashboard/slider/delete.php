<?php
$conn = mysqli_connect("localhost", "root", "", "zay-store");
$id = $_GET['id'];
$sql = "DELETE FROM `slider` WHERE `id` = '$id'";
mysqli_query($conn,$sql);
header("Location:http://localhost:8000/index.php?page=dashboard");
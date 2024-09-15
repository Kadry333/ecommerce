<?php
$conn = mysqli_connect("localhost","root","","zay-store");
function getall($table)
{
 global $conn;
 $sql = "SELECT * FROM `$table`";
 return mysqli_query($conn,$sql);
}
function getrow($table,$id)
{
    global $conn;
    $sql = "SELECT * FROM `$table` WHERE `id` = '$id'";
    $res = mysqli_query($conn,$sql);
    return  mysqli_fetch_assoc($res);
   
}
function check($sql)
{
    global $conn;
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res))
    {
        return true;
    }
    else{return false;}
}
function inner_join($table1,$table2,$col1,$col2,$str)
{
    global $conn;
    $sql = "SELECT * FROM `$table1` INNER JOIN `$table2` ON `$table1`.`$col1` = `$table2`.`$col2` $str";
    return mysqli_query($conn,$sql);
}
function select_last_name($table)
{
    global $conn;
$sql = "SELECT `name` FROM `$table` ORDER BY `id` DESC LIMIT 1";
$res =  mysqli_query($conn,$sql);
 return mysqli_fetch_assoc($res);
}
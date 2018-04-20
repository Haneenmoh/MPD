<?php
/*this page to insert new register from app to database */
$connect=mysqli_connect("localhost", "root", "mpd123", "mpd");

$cName=$_POST["userName"];
$cURL=$_POST["userURL"];
$cPhone=$_POST["userPhone"];
$cEmail=$_POST["userEmail"];
$cPass=$_POST["userPass"];


mysqli_query($connect,"INSERT INTO user(first_name,last_name,Department,Email,Role,Phone,userURL) VALUES('$cName','$cPass','','$cEmail','user','$cPhone','$cURL')");

?>

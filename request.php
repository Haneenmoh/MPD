<?php
/*this code to insert request from app to database  */
$connect=mysqli_connect("localhost", "root", "mpd123", "mpd");

$cName=$_POST["userName"];
$cID= $_POST["userID"];
$cURL=$_POST["userURL"];
$cPhone=$_POST["public"];
$cEmail=$_POST["private"];


mysqli_query($connect,"INSERT INTO request(userName,userID,userURL,public,private) VALUES('$cName','$cID','$cURL','$cPhone','$cEmail')");

?>

<?php
$connect = mysqli_connect("localhost", "root", "mpd123", "mpd");
if(isset($_POST["first_name"], $_POST["last_name"],$_POST["Role"],$_POST["Department"],$_POST["Email"]))
{
 $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
 $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
 $Role = mysqli_real_escape_string($connect, $_POST["Role"]);
 $Department = mysqli_real_escape_string($connect, $_POST["Department"]);
  $Email = mysqli_real_escape_string($connect, $_POST["Email"]);
 $query = "INSERT INTO user(first_name, last_name , Role , Department ,Email) VALUES('$first_name', '$last_name' , '$Role' ,'$Department','$Email')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>


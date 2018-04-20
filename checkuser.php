<?php
/*this page to check if username and password is correct or not for users account in mob app */
$connect=mysqli_connect("localhost", "root", "mpd123", "mpd");

$cName=$_POST["username"];
$cpassword= $_POST["password"];

$sql=mysqli_query($connect,"Select * from user where first_name = '$cName' and last_name='$cpassword'and Role='user'");

if(mysqli_num_rows($sql) > 0) {
echo "login_ok";
}
else{
	echo " login_error";
}

?>

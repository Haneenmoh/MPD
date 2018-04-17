
<?php
//error password
if(isset($_GET['error'])==true){
	echo'<font color="#ff0000"><p>Invalid Username or Passwor</P></font>';
	
}
?>
<?php
session_start();

$db_username="root";
$db_password="mpd123";
$db_name="mpd";
$table_name="adminuser";
$host="localhost";


$con= mysqli_connect($host,$db_username,$db_password);
mysqli_select_db($con,$db_name);
$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM $table_name WHERE username='$username' AND password='$password'";
$result=mysqli_query($con,$query);
$numrows=mysqli_num_rows($result);

if($numrows==1){
	$_SESSION['logged in']=true;
	$_SESSION['username']=$username;
	$array=mysqli_fetch_assoc($result);
	$id=$array['id'];
	$_SESSION['id']=$id;
	header("Location: test1.php");
	
}else{
	header("location:login.php?error=1");
	echo "error";

}
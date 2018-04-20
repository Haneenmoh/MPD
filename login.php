
<?php

$host= "localhost";
$user = "root";
$pass = "mpd123";
$db ="mpd";

$con=mysqli_connect($host, $user , $pass);
mysqli_select_db($con,$db);
if(isset ($_POST['username'])){
$username= $_POST['username'];
$password=$_POST["password"];
$sql = " Select * FROM adminuser WHERE username = '".$username."' AND password='".$password."' LIMIT 1";
$res= mysql_query($sql);
if (mysql_num_rows($res) == 1) {
	echo "YOU have success";
	exit();
	
} else {
	
	echo "invalid user";
	exit();
}
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title>MPD</title>
<style>
   *{margin:0px;padding:0px;}
  body{
    background-image: url("ocean.jpg");
  background-repeat: no-repeat;
  background-size:100%;
  
  }  
  .container {
    width:500px;
    height:400px;
    background-color:#000;	
    margin:0px auto;
    text-align:center;
    margin-top:150px;
    border-radius:5px;
	opacity:.7;
  }
  
  .container img{
     width:130px;
	 height:130px;
	 border-radius:500px;
	 background:#fff;
	 padding:15px;
	 margin-top:-60px;
	 margin-bottom:30px;
  }
  input{
  width:300px;
  height:45px;
  font-size:17px;
  margin-bottom:30px;padding-left:30px;
  background:#fff;
  border:none;
  }
  .Login{ border:none;
  padding:10px 40px;
  background:#2ecc71;
  border-radius:3px;
  coursor:pointer;
  border-bottom:5px solid #27AE60;
  margin-bottom:20px;
  font-size: 25px;
  font-family: "Times New Roman", Times, serif;
  }
  .right {
    position:relative;
    right: 3px;
    width: 300px;
    padding: 10px;
}
.left{
    position: absolute;
    left: 1000px;
    top: 8px;
    z-index: -1;
	
}


</style>

<!-- create form with 2 input and submit button to fill it and check if correct from checklogin1 page if true we can login if not , it will return error -->
<body>
   
<div class="container">
<img src="logo.jpg" alt="founder">

       <form method="Post" action="checklogin1.php">
	<div class="form-input">
          <input type="text" name="username" placeholder="اسم الدخول">
	 </div>
	 <div class="form-input">
	 <input type="password" name="password" placeholder="كلمة المرور">
     </div>
           <div class="inp"><input type="submit" name="submit" value="دخول"></div>
	
	
    </form>
<?php
//error password
if(isset($_GET['error'])==true){
	echo'<font color="#ff0000"><p>Invalid Username or Passwor</P></font>';
	
}
?>

</div>

</body>
</html>
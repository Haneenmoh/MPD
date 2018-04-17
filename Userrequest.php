<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		   <head>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

       <title>MPD</title>
	   <!-- this page is last page in web it show all request from users and we can delete or acceot request -->
<style>
  *{margin:0px;padding:0px;}
  body{
    background: url("Disk.PNG") no-repeat;
  background-size:cover;
   
  }  
  .container {
    width:1535px;
    height:600px;

    margin:10px auto;
    text-align:center;
    margin-top:100px;
    border-radius:5px;
	
  }
  
   .container img{
     width:130px;
	 height:130px;
	 border-radius:500px;
	 background:#fff;
	 padding:10px;
	 margin-top:-60px;
	 margin-bottom:30px;
	 float: right;
  }

  .cont nav{
	  background: #b3ebff;
	  float: right;
	  width: 1270px;
	  height:30px;
	  margin-right: 117;
  }
  
  .cont nav ul{
	  margin: 0;
	  padding: 0;
	  list-style: none;
	  
  }
   .cont nav li{
	  float: left;
	  margin-left: 150px;
	  padding-top:5px;
  }
  .cont nav a{
	  color: black;
	  text-decoration: none;
	  text-transform: uppercase; 
  }
  
  .cont nav a:hover{
	  color: blue;
	 
  }
    body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1270px;
   padding:15px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
</style>


<body>
<form>
<div class="container">
  <div class="cont"> 

<nav>
<img src="logo.jpg" size="5" alt="logo" class="logo">
	<ul>
<li><a href="Test1.php">Home</a></li>
<li><a href="Employee.php">Accepted Requests</a></li>
<li><a href="MAP.php">Map</a></li>
<li><a href="Userrequest.php">Requests</a></li>
</ul>
</nav>
</div>
<!-- create table and show requested from user -->
 <div class="container box">
   <h1 align="center">Pending Requested</h1>
   <br />
   <div class="table-responsive">
   <br />
   
    <br />
    <div id="alert_message"></div>
   
    <table id="user_data" class="table table-bordered table-striped">

		      <thead class="tabm">
			  
		        <tr>
				
		           <th>Comapny Name</th>
		          <th>Location</th>
		          <th>Propuse Sensor</th>
				  <th>Public</th>
				  <th>Private</th>
		         <th>Action</th>
                          
		        </tr>
			
		      </thead>
			  
		      <tbody>
			 
			
		        <tr>
			<!-- use php code to show data in table with create button to acceot or dlete it -->	
				 <?php
$con = mysqli_connect("localhost", "root" , "mpd123","mpd");
if (!$con){
	die("can not connect:" .mysql_error());
}
mysqli_select_db($con,"mpd");

$sql = "SELECT * FROM request";
$myData= mysqli_query($con,$sql);
while($record = mysqli_fetch_array($myData)){
	  ?> 
	<tr>
	
	   <td>  <?php echo $record['userName']?> </td>
	    <td>  <?php echo $record['userID']?> </td>
	   <td>  <?php echo $record['userURL']?> </td>
	   <td>  <?php echo $record['public']?> </td>
	   	   <td>  <?php echo $record['private']?> </td>
		<td>
		<a  Onclick="return confirm('Are you Sure To Accept')" href="?idx=<?php echo $record['id'] ?>" class="btn btn-warning"> Accpet</a>  
		<a  Onclick="return confirm('Are you Sure To Delete')" href="?idd=<?php echo $record['id'] ?>" class="btn btn-danger"> Delete</a>
		</td>
			 
		         
</tr>
<!-- each button have ID if press accept it will call the below php code -->
<?php
}
    
	    if(isset($_GET['idx'])){
			$idx=$_GET['idx'];
			$sql = "
			INSERT INTO employee (id, userName, userID, userURL,public,private)  
SELECT id, userName, userID, userURL , public ,private
  FROM `request`
 WHERE `id` = '$idx'";
 	$query = "delete from request where id='$idx'";

			$result= mysqli_query($con,$sql);
		$result= mysqli_query($con,$query);
			if($result){
					?>
				<script>
				alert("Success");
				window.location.href='userrequest.php';
				</script>
				<?php
			}
			else{
				?>
				<script>
				alert("fail to accept");
				window.location.href='userrequest.php';
				</script>
				<?php
				
			}
			
		}
	   
		   ?> 
		   <!-- the below code for delete button -->
<?php

    
	    if(isset($_GET['idd'])){
			$idd=$_GET['idd'];
			$sql = "delete from request where id='$idd'";
			$result= mysqli_query($con,$sql);
		
			if($result){
					?>
				<script>
				alert("Success");
				window.location.href='userrequest.php';
				</script>
				<?php
			}
			else{
				?>
				<script>
				alert("fail to delete");
				window.location.href='userrequest.php';
				</script>
				<?php
				
			}
			
		}
	   
		   ?> 
		        </tr>
		      
		      </tbody>
	  </center>

		    </table>
   </div>
  </div>
    </form>
</div>

</body>
</html>

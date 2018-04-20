
  <?php
$con = mysqli_connect("localhost", "root" , "mpd123","mpd");
if (!$con){
	die("can not connect:" .mysql_error());
}
mysqli_select_db($con,"mpd");
$sql = "SELECT * FROM employee";
$myData= mysqli_query($con,$sql);
$res = mysqli_fetch_array($myData);


// this code block contains some test stuff
$id = $res['id'];
$userName = $res['userName'];
$userID = $res['userID'];
$userURL = $res['userURL'];
$public = $res['public'];
$public = $res['private'];
$Status = $res['Status'];
$sql1 = "
			INSERT INTO donerequest(id, userName, userID, userURL,public,private)  
SELECT id, userName, userID, userURL , public ,private
  FROM `employee`
 WHERE `Status` = 'Done'";
 	$query = "delete from employee where Status='Done'";

$result1= mysqli_query($con,$sql1);
$result2= mysqli_query($con,$query);
?>

<script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },10000);
</script>
</html>
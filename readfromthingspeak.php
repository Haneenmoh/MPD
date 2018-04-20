
<?php
$con = mysqli_connect("localhost", "root" , "mpd123","mpd");
if (!$con){
	die("can not connect:" .mysql_error());
}
mysqli_select_db($con,"mpd");

$content =     file_get_contents("https://api.thingspeak.com/channels/472485/fields/1/last");

$result  = json_decode($content);

print_r( $result );

$sql = "UPDATE sensor SET Parameter='$result'";

			$result= mysqli_query($con,$sql);

?>
<!-- this page to read data from thingspeak server and insert to sensor table -->
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

</body>

<!-- using script to reload page -->
<script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },10000);
</script>
</html>

<?php
/*insert data from register page to user table in database
get data in insert it in database using query */

$connect=mysqli_connect("localhost", "root", "mpd123", "mpd");

$cName=$_POST["cname1"];
$cURL=$_POST["cloc1"];
$cuser=$_POST["cname2"];
$cURL1=$_POST["cloc2"];
mysqli_query($connect,"UPDATE employee SET Status='Done'");


?>

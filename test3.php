<?php
header('Content-Type: application/json');
$conn=mysqli_connect("localhost","root","mpd123","mpd");
$q= mysqli_query($conn,"select * from employee");
$json=array();
while($data=mysqli_fetch_assoc($q))
array_push($json, array('name'=>$data['userName'],
'location'=>$data['userID']));
echo json_encode(array('users'=>$json));


?>
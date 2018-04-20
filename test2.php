<?php
header('Content-Type: application/json');
$conn=mysqli_connect("localhost","root","mpd123","mpd");
$q= mysqli_query($conn,"select * from sensor");
$json=array();
while($data=mysqli_fetch_assoc($q))
array_push($json, array('lat'=>$data['lat'],
'lng'=>$data['lng'],
'param'=>$data['Parameter']));
echo json_encode(array('users'=>$json));


?>
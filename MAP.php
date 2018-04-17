
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
	   <!-- Set Page Style -->
<style>
   #map {
        height: 60%;
		width:60%;
		margin-left:80px;
		
      }
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
   .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  

}

	  
	  .switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}


input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

  

</style>


<body>
<form>
<div class="container">
  <div class="cont"> 

<nav>
<img src="logo.jpg" size="5" alt="logo" class="logo">
	<ul>
<li><a href="test1.php">Home</a></li>
<li><a href="Employee.php">Accepted Requests</a></li>
<li><a href="MAP.php">Map</a></li>
<li><a href="Userrequest.php">Requests</a></li>
</ul>
</nav>
</div>
<!-- create new table to get sensor data from sensor table and put it in map to show data-->
 <div class="container box">
   <h1 align="center">Sensors</h1>
 
   <div class="table-responsive">
   <br />
    <br />
       <table id="user_data" class="table table-bordered table-striped">

		      <thead class="tabm">
			  
		        <tr>
				
		           <th>Sensor Name</th>
				   <th>Address</th>
  		           <th>Action</th>
                          
		        </tr>
			
		      </thead>
			  
		      <tbody>
			 
			
		        <tr>
<!-- read data using php code and fetch data in map page table -->				
				 <?php
$con = mysqli_connect("localhost", "root" , "mpd123","mpd");
if (!$con){
	die("can not connect:" .mysql_error());
}
mysqli_select_db($con,"mpd");

$sql = "SELECT * FROM sensor";
$myData= mysqli_query($con,$sql);
while($record = mysqli_fetch_array($myData)){
	  ?> 
	<tr>
	
	   <td>  <?php echo $record['Sensor']?> </td>
      <td>  <?php echo $record['address']?> </td>
		<td>
		<label class="switch">
  <input type="checkbox" checked="malek();" id="moh" >
  <span class="slider round"></span>
</label>
		</td>
			 
		         
</tr>
//google map url
<tr>
 <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXKmclYODGy9q1lJ3USHO6McMpU06IQDA&callback=initMap">
    </script>
</tr>
<?php
			}
  ?> 
  <?php
$con = mysqli_connect("localhost", "root" , "mpd123","mpd");
if (!$con){
	die("can not connect:" .mysql_error());
}
mysqli_select_db($con,"mpd");
$sql = "SELECT * FROM sensor";
$myData= mysqli_query($con,$sql);
$res = mysqli_fetch_array($myData);


// this code block contains some test stuff
$lat_d = $res['lat'];
$long_d = $res['lng'];
$param = $res['Parameter'];

// mimic a result array from MySQL
$result = array(array('latitude'=>$lat_d,'longitude'=>$long_d));

?>
		        </tr>
		      
		      </tbody>
	  </center>

		    </table>
			   <div id="map"></div>
 
    <script>

      // In the following example, markers appear when the user clicks on the map.
      // The markers are stored in an array.
      // The user can then click an option to hide, show or delete the markers.
      var map;
      var markers = [];
	  
	  var lat1 = parseFloat(<?php echo $res['lat']; ?>)
	  var long1 = parseFloat(<?php echo $res['lng']; ?>)

      function initMap() {
	  document.getElementById("moh").checked = true
        var haightAshbury = {lat: lat1, lng: long1};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: haightAshbury,
          mapTypeId: 'terrain'
		  
		  
		  
	
        });

        

        // Adds a marker at the center of the map.
        addMarker(haightAshbury);
      }

      // Adds a marker to the map and push to the array.
      function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
		  
        });
	
		
		var q = "Sensor Value : " + String(<?php echo $res['Parameter']; ?>)
		
		var contentString = q;
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
 
    google.maps.event.addListener(marker,"click", function() {
        infowindow.open(map,marker);
    });
		       
        markers.push(marker);
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }
  
	  
	  
	  
 $('#moh').click(function(){
    if($(this).is(':checked')){
       
	   showMarkers();
    } else {
    clearMarkers();
    
    }
});


  
	</script>

 
   </div>


</div>


</body>
</html>

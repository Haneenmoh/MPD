
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
	<!-- set style -->  
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
<!--Show bar tool in web-->
<nav>
<img src="logo.jpg" size="5" alt="logo" class="logo">
	<ul>
<li><a href="Test1.php">Home</a></li>
<li><a href="employee.php">Accepted Requests</a></li>
<li><a href="map.php">Map</a></li>
<li><a href="userrequest.php">Requests</a></li>
</ul>
</nav>
</div>
  <div class="container box">
   <h1 align="center">Accepted Requests</h1>
 
   <div class="table-responsive">
   <br />
<!--create new table and read data from mysql-->
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
	   <th>Comapny Name</th>
	  <th>Location</th>
      <th>Propuse Sensor</th>
	  <th>Public</th>
	  <th>Private</th>
	  <th>Pending Status</th>
      <th>Employee</th>      
    
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>
<!-- get data using script from database using many pages in employee folder  -->
<!-- here we use jquery to fetch page and update page to edit data if we need  -->

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"empolyee/fetch3.php",
     type:"POST"
    }
   });
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"empolyee/update3.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  

 });
</script>


</div>

    </form>


</div>

</body>
</html>
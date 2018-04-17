
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
	   <!-- this is the first page in web , using to show all users in table, we can modified and delete and insert all user-->
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
<li><a href="employee.php">Accepted Requests</a></li>
<li><a href="map.php">Map</a></li>
<li><a href="userrequest.php">Requests</a></li>
</ul>
</nav>
</div>
<!-- create table with header-->
  <div class="container box">
   <h1 align="center">Employee</h1>
 
   <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
	  <th>ID</th>
       <th>Username</th>
       <th>Password</th>
	   <th>Role</th>
       <th>Department</th>
	   <th>Email</th>
       <th>Phone</th>
       <th></th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>
<!-- user script to call pages from table folder to fetch data in table by below script -->
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
     url:"table/fetch.php",
     type:"POST"
    }
   });
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"table/update.php",
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
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data0"></td>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
    html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
	  var id = $('#data0').text();
   var first_name = $('#data1').text();
   var last_name = $('#data2').text();
   var Role = $('#data3').text();
   var Department = $('#data4').text();
   var Email = $('#data5').text();
   if(first_name != '' && last_name != '')
   {
    $.ajax({
     url:"table/insert.php",
     method:"POST",
     data:{first_name:first_name, last_name:last_name,Role:Role,Department:Department,Email:Email },
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
   else
   {
    alert("Both Fields is required");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"table/delete.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>


</div>

    </form>


</div>

</body>
</html>
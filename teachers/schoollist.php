<!DOCTYPE html>

<?php
	include('dbconnector.php');
	
	$db_helper = new DBController();
	session_start();
	if(!isset($_SESSION['login_user'])){
		header("Location:/beecreative.asia/login");
	}
	
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
      <title>School Info</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
       <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/dataTables.bootstrap.min" rel="stylesheet" />
<title></title>


<link rel="stylesheet" type="text/css" href="animate.css" >
<style type="text/css">

.list{
	
	display: inline;
	clear: none;
}
.school2{
	margin-left: 10%;
	margin-top: 1%;
}
.btn-default{
	height: 80px !important;
	width: 200px !important;
	cursor: pointer;
}
</style>
</head>

<body>
<div class="container">
<?php include_once('navigation.php');?>
<div class="container">
<div class="jumbotron">
	<h1>School Delivey Infos</h1>
	<p>This page contains the information of number of BC classes delivered in all schools.</p>
</div>
	
</div>

 
<center>	   
<div class="animated fadeInUp">
<div class="school">
	  
	  <?php
	
	  $query = "SELECT * FROM School_MasterList";
	  $result = $db_helper->runQuery($query);
	  
	  $count = 0;
	  foreach($result as $schoolData)
	  { $count++;?>
		<div class="list">
		  	<a class="btn-group" href="schoolinfo.php?schoolid=<?php echo $schoolData['SchoolID'];?>">
				<button class="btn btn-default"><?php echo $schoolData['SchoolName'];?></button>
			</a>
		</div>
		<?php 
		if(($count % 5)==0) echo"<br><br>";
	  
		
	}?>	 </div>  </div></center><br><br>

<?php include_once('footer.php');?>
</div>
              
</body>
</html>
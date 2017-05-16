<!DOCTYPE html>

<?php
	include('dbconnector.php');
	
	$db_helper = new DBController();
	
	session_start();
	if(!isset($_SESSION['login_user'])){
		header("Location:/beecreative.asia/login");
	}

	
	$schoolId = $_GET['schoolid'];
	
	$query="SELECT SchoolName FROM School_MasterList WHERE SchoolID=$schoolId";
	$r=mysql_query($query);
	
	
	$row=mysql_fetch_array($r);
	    
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
      <title><?php echo $row['SchoolName'];?></title>
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
<body>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="animate.css" >
<link rel="stylesheet" type="text/css" href="schoolinfo.css" >
<style type="text/css">

.schooldata{
    position: absolute;
    left:53%;
    top:40%;     
          

}


</style>





</head>

<body>

<?php include_once('navigation.php');?>

<div class="container" style="margin-top: 80px;">
<div class="schooldata">
<div class="animated bounceIn">

<?php

	$schoolId = $_GET['schoolid'];
	
	$query="SELECT SchoolName, Location, PrincipalName, PrincipalPhone,
		 	Geolocation FROM School_MasterList WHERE SchoolID=$schoolId";
	$r=mysql_query($query);
	
	
	$row=mysql_fetch_array($r);
	     echo "School Name:".$row['SchoolName']."<br /><br />"; 
         echo "Location:"." <span class='l'>".$row['Location']."</span><br /><br />"; 
		 echo "Principal:"." <span class='p'>".$row['PrincipalName']."</span><br />"; 
		  echo "Principal Number:"." <span class='p'> ".$row['PrincipalPhone']."</span>"; 
		  if($row['Geolocation']!=""){
		  $yourAddress=$row['Geolocation'];}
		  else{
		  $yourAddress=$row['SchoolName'];}
		 
		mysql_close();
	
	?>
	<br>
	<a href="schoollist.php" class="btn-group" style="padding-top: 20px;">
		<button class="btn btn-default">Return</button>
	</a>
	</div></div>
<iframe class="mapIframe" width="50%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $yourAddress; ?>&output=embed"></iframe>
</div>

<?php include_once('footer.php');?>

</body>
</html>
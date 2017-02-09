<?php
	include('dbconnector.php');
	
	$db_helper = new DBController();
	
session_start();
?>
<!DOCTYPE html>
<html>
<head> <title>Clusters-BeeCreative</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
      <title></title>
         <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
       <link href="shrink.css" rel="stylesheet" />
       <link href="fonts/css/font-awesome.css" rel="stylesheet" />
       <link href="css/agency.css" rel="stylesheet">

<style type="text/css">
  .form-inline{
  color:white; 

  }

</style>
 

</head>
<body> 
<?php include_once('navigationbar.php'); ?>

<center>
	<div style="width:70%;">
		
			<br><br><br>
			<p class="page-header" style="font-size: 18px;"><b>Clusters are a group of 6 - 8 classes that result in a coherent learning experience? Each cluster is organized to explore a specific topic or focus area of the curriculum in depth while also building interdisciplinary skills. </b></p>
		
	</div>
</center>

<?php		  
  $query = "SELECT * FROM ClusterMaster";
		 $result = $db_helper->runQuery($query);
		    foreach($result as $cluster){ 
				if($cluster['IsActive']){
		 ?>
		 <div class="container">
		 <div class="jumbotron">
		 	<h2><?php echo $cluster['ClusterName'];?></h2>
					<?php echo $cluster['TagLine']; ?>
		<a href="printCluster.php?cmid=<?php echo $cluster['CMID'];?>"> <button class="btn btn-info">Read More</button></a>
		 </div></div>
			<?php }}?>
        <?php include_once('footer.php'); ?>
      <script src="js/jquery.js"></script>
<script src="shrink.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
	include('dbconnector.php');
	
	$db_helper = new DBController();
	
?>
<!DOCTYPE html>
<html>
<head> <title>Clusters</title>
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
  .cluster-img {
    height:500px; 
    width:350px;
    margin-bottom: 20px;
    margin-left: 10px;
    margin-right: 10px; 
  }

</style>
 

</head>
<body> 
<?php include_once('navigationbar.php'); ?>

<div>
  <center>
		   <br><br>
		   <h3 class="page-header" style="width: 70%;">Cluster</h3>
       <div class="ClusterInfo" style="width: 60%;">
         <p>
           Clusters are a group of 6 - 8 classes that result in a coherent learning experience? Each cluster is organized to explore a specific topic or focus area of the curriculum in depth while also building interdisciplinary skills.
         </p>
        </div>
  </center>
</div>
<div class="container">
		<div class="row">
<?php		  

  $query = "SELECT * FROM ClusterMaster";
		 $result = $db_helper->runQuery($query);
		    foreach($result as $cluster)
        { 
          if($cluster['IsActive'])
          {
              //GET THE FILE NAME
			      $filename = "cluster".$cluster['CMID'];
              //echo $filename."<br>";
            $filename = glob("clusters/cluster_photos/$filename.*");
            //print_r( $filename );
?>
		 
<div class="col-md-4">
		<a href="printCluster.php?cmid=<?php echo $cluster['CMID'];?>"> 
      <img class="cluster-img" src="<?php echo $filename[0];?>" style="" />
    </a>
</div>
<?php }}?>
		</div>
</div>

		 			
  <?php include_once('footer.php'); ?>
  <script src="js/jquery.js"></script>
  <script src="shrink.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/agency.min.js"></script>

</body>
</html>

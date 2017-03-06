
<!DOCTYPE html>
<?php
	include('dbconnector.php');
	
	$db_helper = new DBController();
	
	session_start();
	if(!isset($_SESSION['login_user'])){
		header("Location: /beecreative.asia/login");}
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
      <title>Content</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
       <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/dataTables.bootstrap.min" rel="stylesheet" />

</style>

</head>

<body>
<?php include_once('navigation.php');?>
<div class="container">
	<div class="container">
		<div class="jumbotron">
			<h1>School Delivey Infos</h1>
			<p>This page contains the information of number of BC classes delivered in all schools.</p>
		</div>
		
	</div>
	<div class="container">
		<table id="content" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th>Name of Content</th>
					<th>Times Delivered</th> 
	  			</tr>
	  		</thead>
	  		<tbody>
			  <?php 
			    $query = "SELECT * FROM Content_MasterList";
				$result = $db_helper->runQuery($query);
				foreach($result as $content){ 
				$name=$content['ContentName']; $id=$content['ContentID'];$count=0;
				$q1= "SELECT * FROM SchoolDelivery";
				$r1=$db_helper->runQuery($q1);
				foreach($r1 as $l){
					if($l['ContentID']==$id)
						$count++; 
				}
	            if($count>0){ ?>
	            <tr>   		   
			   		<td><?php echo $name; ?></td>
			   		<td><?php echo $count; ?></td>
				</tr>

			   	<?php }}?> 		  	 
			</tbody>			  
		</table>
	</div>
	
		<script type="text/javascript">
	      $(document).ready(
	        function() {
	          $('#content').DataTable();
	      });

	    </script>          
</div>
<?php include_once('footer.php');?>
</body>
</html>
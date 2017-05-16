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
      <title>Teacher Delivery</title>
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
</head>

<body>
<div class="container">
<?php include_once('navigation.php');?>

<div class='container'>
	<div class="jumbotron">
		<h1>BC Teachers' Delivery Info</h1>
		<p>This page contains the information of BC Teachers delivery.</p>
	</div>
</div>
 
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>	
		<tr>
    		<th>Name</th>
			<th>As Lead</th> 
		    <th>As Support</th>
			<th>Total</th>
  		</tr>
  	</thead>
  	<tbody>
  		<?php 
        	$query = "SELECT * FROM Teacher_MasterList";
		 	$result = $db_helper->runQuery($query);
		   	foreach($result as $teachername){
			   $id=$teachername['TeacherID']; 
		?>
  		<tr>
			<td> 
				<a href="teacherDeliveryReport.php?teacherid=<?php echo $teachername['TeacherID'];?>"><?php echo $teachername['FirstName']?></a> 
			</td> 
        	<td>
	        	<?php 
					$support=0;
				    $lead=0;
				    $q1= "SELECT * FROM SchoolDelivery";
				    $r1=$db_helper->runQuery($q1);
				    foreach($r1 as $l){
						if($l['LeadTeacherID']==$id){$lead++;   }
					    if($l['SupportTeacherID']==$id){$support++;   }
					   
				   	}
				    echo $lead
			    ?>
		    </td>
 		    <td>
		    	<?php echo $support;?>
		    </td>
		 	<td>
             	<?php echo $support+$lead; ?>
            </td> 		 
		   
  		</tr>
		<?php } ?>
	</tbody>
</table>	   

<?php include_once('footer.php');?>
</div>
</body>
</html>

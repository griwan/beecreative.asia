<?php
	include('dbconnector.php');

	$db_helper = new DBController();

	$query = "SELECT * FROM Teacher_MasterList";
	$teacher = $db_helper->runQuery($query);
	session_start();
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
 <link href="shrink.css" rel="stylesheet" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
      <title>Our Teachers</title>
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
 <body>
 <?php include_once ('navigationbar.php') ?>
	<div class="container" style="margin-top:115px;"><?php
		foreach($teacher as $teacherData)
		{
			if(!empty($teacherData['Bio'])){
	?>
 
		<label><b><h2><?php echo $teacherData['FirstName']." ".$teacherData['BichakoName'].
				" ".$teacherData['LastName']?></h2></label></b><br>

		<p>
			<?php echo $teacherData['Bio'];?>
		</p>
	
    <hr>

	<?php
		}
		}
	?>
</div>
 <?php include_once('footer.php'); ?>
<script src="js/jquery.js"></script>
<script src="shrink.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
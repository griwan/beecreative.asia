<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
    	header("Location: /beecreative.asia/login");
  	}
?>

<!DOCTYPE html>
<html>

<head>
<title>Teacher's Contact</title>


<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scaled=1">   
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
	<meta charset="utf-8">

</head>
<body>
<?php include_once('navigation.php');?>
<div class="container">

	<h1 class="page-header" style="padding-top: 20px">
		Page Coming Soon!
	</h1>


<?php include_once('footer.php');?>
</div>
</body>
</html>
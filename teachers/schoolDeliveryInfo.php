
<?php
  
  include('dbconnector.php');
	
	$db_helper = new DBController();

  $query = "SELECT * FROM SchoolDelivery";
  $delivery = $db_helper->runQuery($query);

  $query = "SELECT * FROM School_MasterList";
  $schoolList = $db_helper->runQuery($query);
  
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("Location: /beecreative.asia/login");
  }
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
      <title>School Delivery</title>
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
<title>School Delivery Infos</title>


</head>

<body>

<?php include_once('navigation.php');?>

<div class="container">

<div class="jumbotron">
	<h1>School Delivey Infos</h1>
	<p>This page contains the information of number of BC classes delivered in all schools.</p>
</div>
	
</div>

<div class="container">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th scope="col">School Name</th>
      <th scope="col">No. of Sessions</th>
    </tr></thead>
	<tbody>
    <?php foreach($schoolList as $schoolData){

      $count = 0;
      foreach ($delivery as $deliveryData)
      {
        if($deliveryData['SchoolID'] == $schoolData['SchoolID'])
          $count++;
      }

    ?>

    <tr>
      <td align="center">
        <a href="schooldetailreport.php?schoolid=<?php echo $schoolData['SchoolID'];?>"><?php echo $schoolData['SchoolName']?></a>
      </td>
      <td align="center">
      <?php echo $count;?>
      </td>
    </tr>
    <?php }?>

  </tbody>
</table>
</div>
<?php include_once('footer.php');?>
</body>
</html>
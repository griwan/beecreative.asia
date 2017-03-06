<!DOCTYPE html>

<?php
	include('dbconnector.php');
	
	session_start();
	if(!isset($_SESSION['login_user']))
	{
		header("Location: /beecreative.asia/login");
	}
	
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scaled=1">
      <title>School Detailed Report</title>
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
<div class="container">
<?php
	include ('keyValuePairer.php');

	//create object for DBController class
	$db_helper = new DBController();

	$schoolID = $_GET['schoolid'];
	//$schoolID = "000001";

	//query to select all form school_masterlist wher schoolID = recieved id from get
	$query = "SELECT * FROM School_MasterList WHERE SchoolID = $schoolID";
	//run the query
	$school = $db_helper->runQuery($query);

	//query to select all form teacher_masterlist
	$query = "SELECT * FROM Teacher_MasterList";
	//run the query
	$teacher = $db_helper->runQuery($query);

	//query to select all from schoolDelivery
	$query = "SELECT * FROM SchoolDelivery WHERE SchoolID = $schoolID";
	//run query
	$delivery = $db_helper->runQuery($query);

	//query to select all from contentMaster
	$query = "SELECT * FROM Content_MasterList";
	//run query
	$content = $db_helper->runQuery($query);

	//get school name
	$schoolName="";
	foreach($school as $schoolData)
	{
		$schoolName = $schoolData['SchoolName'];
		break;
	}

	//variables used to store data in table
	$contentName = $lead = $support = "";
	$count = 0;

	//create an array for storing array of objects
	$keyPair=array();
	
	//set object count to 0 initially
	$objectCount = 0;

	//main foreach that loops through each data
	foreach($delivery as $deliveryData){

		//Search for content name
		foreach($content as $contentData)
		{
			if($deliveryData['ContentID'] == $contentData['ContentID'])
			{
				$contentName = $contentData['ContentName'];
				break;
			}
		}
				
		//Search for lead teacher name
		foreach($teacher as $teacherData)
		{
			if($deliveryData['LeadTeacherID'] == $teacherData['TeacherID'])
			{
				$lead = $teacherData['FirstName'];
				break;
			}
		}

		//Search for support teacher name
		foreach($teacher as $teacherData)
		{
			if($deliveryData['SupportTeacherID'] == $teacherData['TeacherID'])
			{
				$support = $teacherData['FirstName'];
				break;
			}
		}

		//create object of Keypairer class and store content name,
		//lead teacher name and support teacher name in it
		//not the keyPair object is an array
		$keyPair[] = new Keypairer($contentName, $lead, $support);

		//count the number of objects created
		$objectCount++;
	}

	//Searchin loop starts from here
	for($objIndex = 0; $objIndex < $objectCount; $objIndex++)
	{
		//The initial value of the key pair should be 1
		$keyPair[$objIndex]->found();
		//Only use the object whose check value is false
		if(!$keyPair[$objIndex]->getChecked())
		{
			//If the check value is false, run looop from $objIndex to $objectCount	
			for($searchIndex = $objIndex+1; $searchIndex < $objectCount; $searchIndex++)
			{
				//if the two objects are of the same key type
				if($keyPair[$objIndex]->search() == $keyPair[$searchIndex]->search())
				{
					//set the check flag of the later object to true
					$keyPair[$searchIndex]->setChecked();
					//increase the count of the primary object
					$keyPair[$objIndex]->found();
				}
			}
		}
	}

	$sum = 0;

?>
<center>
	<h1 class="page-header" style="padding-top: 20px"><?php echo $schoolName." "?>Delivery Report</h1>
</center>
<div class="container">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead><tr>
			<th>Content Name</th>
			<th>Lead Teacher</th>
			<th>Support Teacher</th>
			<th>Number of Sessions</th>
		</tr></thead>
	<tbody>
		<?php 
			for($i=0; $i<$objectCount; $i++)
			{
				if(!$keyPair[$i]->getChecked()){
		?>
			<tr>
				<td><?php echo $keyPair[$i]->getContent();?></td>
				<td><?php echo $keyPair[$i]->getLead();?></td>
				<td><?php echo $keyPair[$i]->getSupport();?></td>
				<td><?php echo $keyPair[$i]->getCount(); $sum+=$keyPair[$i]->getCount();?></td>
			</tr>

		<?php
				}
			}
			unset($keyPair);
		?></tbody>
		

	</table>
	<center>
		<a class="btn-group" href="schoolDeliveryInfo.php" style="padding-bottom: 10px;">
			<button type="button" class="btn btn-default">Return</button>
		</a>
	</center>
</div>

<?php include_once('footer.php');?>
</div>
</body>
</html>
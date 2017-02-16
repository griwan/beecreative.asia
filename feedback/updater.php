<?php

	include("dbconnector.php");
	$db_handler = new DBController();

	$date = $_POST['deliveryDate'];
	$leadTeacher = $_POST['leadTeacher'];
	$supportTeacher = $_POST['supportTeacher'];
	$school = $_POST['school'];
	$class  = array($_POST['class0'], $_POST['class1'], 
		$_POST['class2'], $_POST['class3']);
	$content = array($_POST['contentList0'], $_POST['contentList1'], 
		$_POST['contentList2'], $_POST['contentList3']);
	$rate = array($_POST['rate0'], $_POST['rate1'], 
		$_POST['rate2'], $_POST['rate3']);
	$text = array($_POST['text0'], $_POST['text1'], 
		$_POST['text2'], $_POST['text3']);
	$i = 0;


	while( !empty($class[$i]) ){
	$query = "INSERT INTO SchoolDelivery(ContentID, LeadTeacherID, SupportTeacherID, SchoolID, SchoolClassID, DeliveryDate)
	VALUES ('$content[$i]', '$leadTeacher', '$supportTeacher', '$school', '$class[$i]', '$date')";
	$db_handler->goQuery($query);
	

	$query = "SELECT SchoolDeliveryID FROM SchoolDelivery ORDER BY SchoolDeliveryID DESC LIMIT 1";
	$result = $db_handler->goQuery($query);
	$result = mysql_fetch_array($result);
	//echo $result["SchoolDeliveryID"];

	$query = "INSERT INTO ContentFeedback(SchoolDeliveryID,  ContentRating, comments)
	VALUES($result[SchoolDeliveryID], '$rate[$i]', '$text[$i]')";
	$db_handler->goQuery($query);
	$i++;
}

/*
	echo $leadTeacher."<br>" ; 
	echo $supportTeacher."<br>"; 
	echo $school."<br>"; 
	echo $class[0]."<br>"; 
	echo $content[0]."<br>";
	echo $rate[0]."<br>"; 
	echo $text[0]."<br>"; 

*/
	

?>
<html>
<head>
	<title>Updating...</title>
	<style>
	input{
			margin: 10px;
			margin-left: 500px;
			padding: 10px;
			width: 200px;
			font-size: 20px;
			background-color: #4CAF50;
			display: inline-block;
			color: #ffffff;
		}
		input:hover {
    		background-color: #45a049;
		}
		label{
			margin:20px;
			margin-left: 250px;
			font-size: 50px;
		}
	</style>
</head>
<body>
	<label>
		Feedback Submitted Successfully!<br/>
	</label>
	<form action="index.php">
		<input type="submit" name="return" value="return">
	</form>
</body>
</html>
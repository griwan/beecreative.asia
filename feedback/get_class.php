<?php
	require_once("dbconnector.php");

	$db_handler = new DBController();

	if( !empty($_POST["school_id"]) ){

		$id = $_POST['school_id'];
		$query = "INSERT INTO test(var) VALUES($id)";
		$result = $db_handler->goQuery($query);

		$query = "SELECT * FROM SchoolClass WHERE SchoolID= '".$_POST["school_id"]."'";

		//echo $query;
		$result = $db_handler->runQuery($query); 
?>

	<option value="">Select Class</option>

<?php
	foreach($result as $schoolClass){
?>

	<option value="<?php echo $schoolClass["SchoolClassID"];?>">
		<?php echo $schoolClass["Class"];?> 
	</option>
<?php
	}
}
?>

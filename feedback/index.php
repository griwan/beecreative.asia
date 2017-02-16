<?php

	require_once("dbconnector.php");
	$db_handler = new DBController();
	$classID = "class-list";

?>

<html>
<head>
	<title>BC Feedback</title>
	
	<script src="jquery.js" type="text/javascript"></script>
	<script type="text/javascript">
	
		function getState(val){
			$.ajax({
				type: "POST",
				url: "get_class.php",
				data: 'school_id='+val,
				success: function(data){
					$("#class-list0").html(data);
					$("#class-list1").html(data);
					$("#class-list2").html(data);
					$("#class-list3").html(data);
				}
			});
		}
	
	</script>

	<style type="text/css">
		label{
			width: 40px;
			font-size: 20px;
			margin: 10px;
			padding: 40px;
		}

		select{
			font-size: 20px;
			margin: 10px;
			margin-left: 20px;
			padding: 5px;
		}

		.date{
			font-size: 20px;
			margin: 10px;
			margin-left: 20px;
			padding: 5px;
		}

		table{
			border-collapse: collapse;
		}

		th{
			font-size: 25px;
			border-color: #098900;
			padding: 15px;
		}
		.feedback{
			padding-left: 250px;
			padding-right: 250px;
		}

		textarea{
			width: 600px;
			height: 80px;
			font-size: 15px;
			border: 0px;
			padding: 10px;
		}

		.button{
			margin: 10px;
			margin-left: 500px;
			padding: 10px;
			width: 200px;
			font-size: 20px;
			background-color: #4CAF50;
			display: inline-block;
			color: #ffffff;
		}
		.button:hover{
    		background-color: #45a049;
		}
	</style>

</head>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea', statusbar: false, menubar: false, toolbar: false });</script>

<h1 style="margin:2%">BC Feedback FORM</h1>

<body>
<form method="post" action="updater.php">
	<div>
		
		<label>Date of Delivery: </label><input type="date" class="date" name="deliveryDate"><label>Format: (mm/dd/yyyy)</label> <br>
		<label>Lead Teacher:</label> 
		<select name="leadTeacher">
			<option>Select Teacher: </option>

			<?php
				$query = "SELECT * FROM Teacher_MasterList";
				$result = $db_handler->runQuery($query);

				foreach($result as $leadTeacher){
			?>
				<option value="<?php echo $leadTeacher["TeacherID"] ;?>">
					<?php echo $leadTeacher["FirstName"] . " " . $leadTeacher["LastName"]; }?>
				</option>
		</select><br/>

		<label>Support Teacher: </label>
		<select name="supportTeacher">
			<option>Select Teacher: </option>

			<?php
				$query = "SELECT * FROM Teacher_MasterList";
				$result = $db_handler->runQuery($query);
			
				foreach($result as $supportTeacher){
			?>

			<option value="<?php echo $supportTeacher["TeacherID"]?>">
				<?php echo $supportTeacher["FirstName"] . " " . $supportTeacher["LastName"]; }?>
			</option>

		</select><br>

		<label>School: </label>
			<select name="school" id="school-list" onChange="getState(this.value);">
				<option value="">Select School</option>

				<?php
					$query = "SELECT * FROM School_MasterList";
					$result = $db_handler->runQuery($query);
					foreach ($result as $school) {
				?>
				<option value="<?php echo $school["SchoolID"];?>">
					<?php echo $school["SchoolName"]; }?>
				</option>

			</select>
	</div>

	<div>
		<table border="1">
			<tr>
				<th>Class</th>
				<th>Content</th>
				<th>Rating</th>
				<th class="feedback">Feedback</th>
			</tr>
			<?php for($i=0; $i<4; $i++){?>
			<tr>
				<td>
					<select name="<?php echo "class".$i?>" id="<?php echo $classID.$i?>">
						<option value="">Select Class</option>
					</select>
				</td>

				<td>
					<select name="<?php echo "contentList".$i?>">
						<option value="">Select Content</option>

						<?php 
							$query = "SELECT * FROM Content_MasterList";
							$result = $db_handler->runQuery($query);

							foreach($result as $content){
						?>
						<option value="<?php echo $content["ContentID"];?>">
							<?php echo $content["ContentName"]; }?>
						</option>
					</select>
				</td>

				<td>
					<select name="<?php echo "rate".$i;?>">
						<option value="">Rate</option>
						<?php
							for($rate = 1; $rate<=5; $rate++){
						?>
						<option value="<?php echo $rate;?>">
							<?php echo $rate; }?>
						</option>
					</select>
				</td>

				<td>
					<textarea name="<?php echo "text".$i?>"></textarea>
				</td>

			</tr>
			<?php }?>
		</table>
		<input type="submit" class="button">
	</div>
</form>
</body>
</html>
<?php

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'BC_DATABASE');

	try{
	   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}

	catch(Exception $e)
	{
		echo "Error occured coneecting to th database, contact the administrator! <br>";
	}

?>
<?php

	class DBController{

		private $dbhost = "localhost";
		private $user = "root";
		private $key = "";
		private $database = "BC_DATABASE";

		function __construct(){
			$conn = $this->connectDB();
			if(!empty($conn))
				$this->selectDB($conn);
		}

		function connectDB()
		{
			$conn = mysql_connect($this->dbhost, $this->user, $this->key);
			return $conn;
		}

		function selectDB($conn)
		{
			mysql_select_db($this->database, $conn);
		}

		function runQuery($query)
		{
			$result = mysql_query($query);
			while($row = mysql_fetch_assoc($result)){
				$resultset[] = $row;
			}

			if( !empty($resultset))
				return $resultset;
		}

		function numRows($query) {
			$result  = mysql_query($query);
			$rowcount = mysql_num_rows($result);
			return $rowcount;	
		}

		function goQuery($query){
			$result = mysql_query($query);
			if(!empty($result))
				return $result;
			else
				return 0;
		}

	}

?>
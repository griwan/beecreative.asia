<?php

	class DBController{

		private $dbhost = "";
		private $user = "";
		private $key = "";
		private $database = "";

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

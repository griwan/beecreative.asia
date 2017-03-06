<?php
	class TeacherKeyPair{

		//private variables initially set to empty, 0 and false
		private $school = "";
		private $content = "";
		private $pairCount = 0;
		private $checked = false;

		//constructor to initialise and get the required values
		function __construct($school, $content){
			$this->school = $school;
			$this->content = $content;
			$this->checked = false; 
		}

		//function to return a string of school name and content name
		function search(){
			return $this->school.$this->content;
		}

		//function to set the checked flag's state to true
		function setChecked(){
			$this->checked = true;
		}

		//function to increment the delivery count by 1
		function found(){
			$this->pairCount++;
		}

		//funciton to return the name of school
		function getSchool(){
			return $this->school;
		}

		//funciton to return the name of content
		function getContent(){
			return $this->content;
		}

		//function to return the value of checked flag
		function getChecked(){
			return $this->checked;
		}

		//function to return the value of deliveryCount
		function getDeliveryCount(){
			return $this->pairCount;
		}

	}
?>
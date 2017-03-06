
<?php
	//Keypairer class to pair content name, lead teacher name and support teacher name
	//checked is initially assigned false so that the same object doesn't get scanned again
	class Keypairer{
		private $content = "";
		private $lead = "";
		private $support = "";
		private $pairCount = 0;
		public $checked = false;

		//constructor gets the values of content, lead and support
		function __construct($content, $lead, $support){
			$this->content = $content;
			$this->lead = $lead;
			$this->support = $support;
			$this->checked = false;
		}

		//function to return a string for comparing
		function search(){
			return $this->content.$this->lead.$this->support;
		}

		//function set checked to true
		function setChecked(){
			$this->checked = true;
		}

		//function to increase the pair count
		function found(){
			$this->pairCount++;
		}

		//function to return value of checked
		function getChecked(){
			return $this->checked;
		}

		//function to return the value of content
		function getContent(){
			return $this->content;
		}

		//function to return the value of lead
		function getLead(){
			return $this->lead;
		}

		//function to get the value of support
		function getSupport(){
			return $this->support;
		}

		//function to retrn the value of pariCount
		function getCount(){
			return $this->pairCount;
		}
	}

?>
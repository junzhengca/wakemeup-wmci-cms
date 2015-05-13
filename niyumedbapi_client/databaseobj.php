<?php
	class NiyumeDb {
		public $dbobject;
		public function __construct($host,$username,$password,$name){
			$this->dbobject = new mysqli($host,$username,$password,$name);
			if($this->dbobject->connect_errno){
				exit;
			}
		}
		public function prepstmt($stmt){
			return $this->dbobject->prepare($stmt);
		}
		
		public function selectstmt($stmt){
			$relt = $this->dbobject->query($stmt);
			if($relt->num_rows == 0){
				return false;	
			} else {
				$reltarr = $relt->fetch_array(MYSQLI_ASSOC);
				return $reltarr;
			}
		}
		
		public function selectstmt_all($stmt){
			$relt = $this->dbobject->query($stmt);
			if($relt->num_rows == 0){
				return false;	
			} else {
				$rows = array();
				while($row = $relt->fetch_array(MYSQLI_ASSOC))
				{
					array_push($rows,$row);
				}
				return $rows;
			}
		}
	}
?>
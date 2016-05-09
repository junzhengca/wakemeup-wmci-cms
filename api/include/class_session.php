<?php
	class Session {
		public $title;
		public $speaker;
		public $description;
		public $availability;
		function __construct($title,$speaker,$description,$availability){
			$this->title = $title;
			$this->speaker = $speaker;
			$this->description = $description;
			$this->availability = explode(",",$availability);
		}
	}
?>
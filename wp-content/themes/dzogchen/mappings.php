<?php
	/**
		I need to be able to get associate some information with page id
		for example page id=1337, which is front page, then give me appropriate image
	*/
	class PageMapping {
		public function PageMapping($data){
			$suffix = ($data["suffix"] != NULL) ? $data["suffix"] : "png";	
			$name = $data["name"];
			$this->image = $name . "." . $suffix;
		}
		public function getImage(){
			return $this->image;
		}	
	}
	$pageMappings = array(
		5 => new PageMapping(array("name" => "first-page-main-image")),
		1324 => new PageMapping(array("name" => "first-page-main-image"))
	);
	
?>

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
		// in edit of pages in wp-admin, there is the ID of the page in href, so one can find the id there.
		5 => new PageMapping(array("name" => "first-page-main-image")),
		1324 => new PageMapping(array("name" => "masters", "suffix" => "jpg")),
		71 => new PageMapping(array("name" => "community", "suffix" => "jpg")),
		1329 => new PageMapping(array("name" => "teaching", "suffix" => "jpg"))
	);
	
?>

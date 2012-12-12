<?php
	/**
		I need to be able to get associate some information with page id
		for example page id=1337, which is front page, then give me appropriate image
	*/
	class PageMapping {
		public function PageMapping($data){
			$suffix = ($data["suffix"] != NULL) ? $data["suffix"] : "png";	
			$name = $data["name"];
			$this->clazz = ($data["clazz"] != NULL) ? $data["clazz"] : $name;
			$this->image = $name . "." . $suffix;
		}
		public function getImage(){
			return $this->image;
		}	
		public function getClass(){
			return $this->clazz;
		}
	}

	// in edit of pages in wp-admin, there is the ID of the page in href, so one can find the id there.
	$pageMappings = array(
		409 => new PageMapping(array("name" => "first-page-main-image", "suffix" => "png")),		
		83 => new PageMapping(array("name" => "asia-onlus", "suffix" => "jpg", "clazz" => "community")),
		11 => new PageMapping(array("name" => "lineage-of-masters", "suffix" => "jpg", "clazz" => "masters")),		
		9 => new PageMapping(array("name" => "chogyal-namkhai-norbu", "suffix" => "jpg", "clazz" => "masters")),
		363 => new PageMapping(array("name" => "community-czech", "suffix" => "jpg", "clazz" => "community")),
		73 => new PageMapping(array("name" => "community-membership", "suffix" => "jpg", "clazz" => "community")),
		552 => new PageMapping(array("name" => "community-wolrd", "suffix" => "jpg", "clazz" => "community")),
		49 => new PageMapping(array("name" => "how-to-start-dzogchen", "suffix" => "jpg", "clazz" => "teaching")),
		
		77 => new PageMapping(array("name" => "losar", "suffix" => "jpg", "clazz" => "community")),
		964 => new PageMapping(array("name" => "phendeling", "suffix" => "jpg", "clazz" => "community")),
		41 => new PageMapping(array("name" => "santimahasangha", "suffix" => "jpg", "clazz" => "teaching")),
		53 => new PageMapping(array("name" => "texts", "suffix" => "jpg", "clazz" => "teaching")),
		1329 => new PageMapping(array("name" => "what-is-dzogchen", "suffix" => "jpg", "clazz" => "teaching")),
		45 => new PageMapping(array("name" => "yantra", "suffix" => "jpg", "clazz" => "teaching")),
		1372 => new PageMapping(array("name" => "kunkyabling", "suffix" => "jpg", "clazz" => "community")),
		89 => new PageMapping(array("name" => "phendeling", "suffix" => "jpg", "clazz" => "community")),
		13 => new PageMapping(array("name" => "yeshi-namkhai", "suffix" => "jpg", "clazz" => "masters")),
		"default" => new PageMapping(array("name" => "texts", "suffix" => "jpg", "clazz" => "teaching"))
	);

?>

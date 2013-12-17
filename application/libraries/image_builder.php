<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_Builder
{
  protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
	}

	public function composite( $selections )
	{			
		$files = array();
		$files[0] = FCPATH."img/thumbnails/300/2_".$selections[0].".jpg";
		$files[1] = FCPATH."img/thumbnails/300/0_".$selections[1].".jpg";
		$files[2] = FCPATH."img/thumbnails/300/1_".$selections[2].".jpg";
		$files[3] = FCPATH."img/thumbnails/300/4_".$selections[3].".jpg";

		$save_name 		= implode( "-", $selections ).".jpg";
		$save_location 	= FCPATH."output/images/".$save_name;
		$http_location 	= base_url()."output/images/".$save_name;

		$response = (object) "response";

		if( file_exists($save_location) ){
			$response->status 	= "success";
			$response->url 		= $http_location;
		}else{
			$composite 	= imagecreatetruecolor( 600, 600 );

			foreach ($files as $key => $filename) {
				$offsetx = 0; $offsety = 0;

				if($key == 1 || $key == 3) 		$offsetx = 300;
				if($key>1) 			$offsety = 300;

				$img 		= imagecreatefromjpeg( $filename );

				imagecopyresampled( $composite, $img, $offsetx, $offsety, 0, 0, 300, 300, 300, 300 );
				imagedestroy( $img );
			}

			$result = imagejpeg($composite, $save_location);

			//save image to folder
			if($result){
				$response->status 	= "success";
				$response->url 		= $http_location;
			} else {
				$response->status 	= "failed";
				$response->error 	= "failed to save image";
			}

			//kill composite
			imagedestroy($composite);
		}

		return $response;
	}	

}

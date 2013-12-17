<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Encoder extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		echo "Call the combine method to concatenate your videos.";
	}

	public function testimage($_selections){
		$selections = explode("-", $_selections);
		$this->load->library("image_builder");

		$file_path = $this->image_builder->composite($selections);

		//header('Content-Type: image/jpg');
		echo "<img src='".$file_path."' />";
	}

	public function testcombine($_selections){
		$selections = explode("-", $_selections);

		$this->load->library("image_builder");

		$mp4 = $this->concatByExtension( $selections, "mp4" );
		$webm = $this->concatByExtension( $selections, "webm" );
		$img = $this->image_builder->composite($selections);

		$res = (object) "response";
		$res->status = ($mp4->status == "success" && $webm->status == "success" && $image->status == "success") ? "success" : "error";

		$res->mp4 	= $mp4;
		$res->webm 	= $webm;
		$res->img 	= $img;

		echo json_encode($res);
	}

	public function combine(){
		$this->load->library("image_builder");

		$post = $this->input->post();
		$selections = json_decode($post["selections"]);

		$mp4 = $this->concatByExtension( $selections, "mp4" );
		$webm = $this->concatByExtension( $selections, "webm" );
		$img = $this->image_builder->composite($selections);

		$res = (object) "response";
		$res->status = ($mp4->status == "success" && $webm->status == "success" && $img->status == "success") ? "success" : "error";

		$res->mp4 	= $mp4;
		$res->webm 	= $webm;
		$res->image = $img;

		echo json_encode($res);
 	}

	public function concatByExtension($selections, $ext = "mp4"){
		$files = array();

		//write the file names to txt file
		$files[0] = "'".base_url().$ext."/intro.".$ext."'";
		$files[1] = "'".base_url().$ext."/2_".$selections[0].".".$ext."'";
		$files[2] = "'".base_url().$ext."/0_".$selections[1].".".$ext."'";
		$files[3] = "'".base_url().$ext."/1_".$selections[2].".".$ext."'";
		$files[4] = "'".base_url().$ext."/4_".$selections[3].".".$ext."'";
		$files[5] = "'".base_url().$ext."/outro.".$ext."'";

		$sources 	= "file ".implode("\nfile ", $files);
		$filelist 	= FCPATH."filelist.txt";
		$savefile 	= file_put_contents($filelist, $sources);

		//build the ffmpeg command and exec
		$outputfilename 		= implode("-", $selections).".".$ext;
		$audio 					= FCPATH.$ext."/audio.".$ext;
		$tmppath 				= FCPATH."tmp/".$outputfilename;
		$outputpath 			= FCPATH."output/".$outputfilename;
		$output_http_location 	= base_url()."output/".$outputfilename;

		$response = (object) "response";

		//check if this combo already exists. if not build it.
		if( file_exists($outputpath) ){
			$response->status = "success";
			$response->video = $output_http_location;
		} else {
			$command = "ffmpeg -f concat -i ".$filelist." -c copy ".$tmppath;
			exec($command, $output, $result);			

			if($result === 0){		
				//if success on concat, add the audio.	
				$command = "ffmpeg -i ".$audio." -i ".$tmppath." -c copy -map 0:a:0 -map 1:v:0 ".$outputpath;
				exec($command, $output, $result);

				if($result === 0){
					$response->status = "success";
					$response->video = $output_http_location;
				}else{
					$response->status = "failed";
					$response->error = "failed to write final output file : ". $result;
				}

				//remove the tmp file
				unlink($tmppath);
			}else{
				$response->status = "failed";
				$response->error = "failed to write tmp file : ". $result;
			}	
		}

		return $response;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
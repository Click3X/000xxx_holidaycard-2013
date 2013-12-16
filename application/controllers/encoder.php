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

	public function combine(){
		$post = $this->input->post();
		$selections = json_decode($post["selections"]);

		$files = array();

		//write the file names to txt file
		$files[0] = "'".base_url()."mp4/intro.mp4'";
		$files[1] = "'".base_url()."mp4/2_".$selections[0].".mp4'";
		$files[2] = "'".base_url()."mp4/0_".$selections[1].".mp4'";
		$files[3] = "'".base_url()."mp4/1_".$selections[2].".mp4'";
		$files[4] = "'".base_url()."mp4/4_".$selections[3].".mp4'";
		$files[5] = "'".base_url()."mp4/outro.mp4'";

		$sources 	= "file ".implode("\nfile ", $files);
		$filelist 	= FCPATH."filelist.txt";
		$savefile 	= file_put_contents($filelist, $sources);

		//build the ffmpeg command and exec
		$outputfilename 		= implode("-", $selections).".mp4";
		$audio 					= FCPATH."mp4/audio.mp4";
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

		echo json_encode($response);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
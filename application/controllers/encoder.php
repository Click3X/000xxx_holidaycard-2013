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

	public function combine($two = "0",$zero = "0",$one = "0",$four = "0"){
		$files = array();

		//write the file names to txt file
		$files[0] = "'".base_url()."mp4/2_".$two.".mp4'";
		$files[1] = "'".base_url()."mp4/0_".$zero.".mp4'";
		$files[2] = "'".base_url()."mp4/1_".$one.".mp4'";
		$files[3] = "'".base_url()."mp4/4_".$four.".mp4'";

		$sources = "file ".implode("\nfile ", $files);
		$filelist = FCPATH."filelist.txt";
		$savefile = file_put_contents($filelist, $sources);

		//build the ffmpeg command and exec
		$outputfile_previx = $two.$zero.$one.$four;
		$outputfilename = $outputfile_previx."_".time()."_.mp4";
		$outputpath = FCPATH."output/".$outputfilename;
		$output_http_location = base_url()."output/".$outputfilename;

		$command = "ffmpeg -f concat -i ".$filelist." -c copy ".$outputpath;
		exec($command, $output, $result);

		//build the response
		$response = (object) "response";

		if($result === 0){
			$response->status = "success";
			$response->video = $output_http_location;
		}else{
			$response->status = "failed";
			$response->error = $result;
		}

		echo json_encode($response);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
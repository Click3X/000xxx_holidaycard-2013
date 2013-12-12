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
	}

	public function combine($two = "0",$zero = "0",$one = "0",$four = "0"){
		$files = array();

		$files[0] = base_url()."mp4/2_".$two.".mp4";
		$files[1] = base_url()."mp4/0_".$zero.".mp4";
		$files[2] = base_url()."mp4/1_".$one.".mp4";
		$files[3] = base_url()."mp4/4_".$four.".mp4";

		$sources = implode("|", $files);
		$command = "ffmpeg -f concat:'".$sources."' -c copy ".FCPATH."/outputs/combined_".time()."_.mp4 -loglevel debug";
		echo $command;

		//exec("ffmpeg -f concat:'".$sources."' -c copy ".FCPATH."/outputs/combined_".time()."_.mp4 -loglevel debug", $output, $result);
		//echo $result ;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
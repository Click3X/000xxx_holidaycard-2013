<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twitter extends CI_Controller {

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
		echo "Call share to post a tweet";
	}

	public function share($_status, $_link)
	{		
		$link = base_url(). "home/video". urldecode($_link);

		header( 'Location: https://twitter.com/intent/tweet?source=webclient&text='.$_status  ) ;
	}

	public function getbitly($long_url){
		$ch = curl_init();
	 
	    curl_setopt($ch, CURLOPT_URL, "https://api-ssl.bitly.com/v3/shorten?access_token=".BITLY_TOKEN."&longUrl=".$long_url );
	    curl_setopt($ch, CURLOPT_REFERER, base_url());
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	 
	    $output = curl_exec($ch);
	    $output = json_decode($output);
		$output	= $output->data->url;
	 
	    curl_close($ch);

	    return $output;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


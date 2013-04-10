<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		
		
		function isIphone($user_agent=NULL) {
			if(!isset($user_agent)) {
				$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
			}
			return (strpos($user_agent, 'iPhone') !== FALSE);
		}
		function isAndroid($user_agent=NULL) {
			if(!isset($user_agent)) {
				$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
			}
			return (strpos($user_agent, 'Android') !== FALSE);
		}

		if($this->isIphone()) {
			$this->load->view('iphone_common');
		}elseif($this->isAndroid()) {
			$this->load->view('android_common');
		}else{
			$this->load->view('desktop_common');
		}
		
		
		$data['debug'] = $_SERVER['HTTP_USER_AGENT'];
		
		
		$this->load->view('welcome_message',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
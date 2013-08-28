<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{

		$this->load->model('Contact_model','contact');


		if ($this->input->cookie('email')){
			/* Logged In User */
			$data['email'] = $this->input->cookie('email');
		}else{
			$data['email'] = '';
		}

		if ($this->input->post('spam') == "2")
		{
			$this->load->library('email');
			if ($this->input->cookie('name')){
				$this->email->subject('Member Message: '.$this->input->post('subject'));
				$name = $this->input->cookie('name');
			}else{
				$name = "Website Guest";
				$this->email->subject('Guest Message: '.$this->input->post('subject'));
			}
			$this->email->from($this->input->post('email'), $name);
			$this->email->to('support@syndicatestream.com');
			$this->email->bcc('syndicatestream@insidenothing.com');
			$this->email->message($this->input->post('body'));
			$this->email->send();
			$data['feedback'] = "<b style='color:red;'>Message Sent...</b>";
			$data['feedback2'] = "<b style='color:red;'>Message Sent...</b>";
		}else{
			$data['feedback'] = "Spam Control: What is 1 + 1?";
			$data['feedback2'] = "Send Message";
		}
		
		$data['subject'] = $this->input->post('subject');
		$data['body'] = $this->input->post('body');
		
		$this->load->library('Menu','menu');
		$this->menu->load_common('contact_view',$data);

	}







}


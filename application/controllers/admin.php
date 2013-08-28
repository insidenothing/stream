<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index($id='')
	{
		//$this->output->enable_profiler(TRUE);
		$this->load->model('admin_model','admin');
		$data['list'] = $this->admin->get_list();
		//$data['blogs'] = $this->admin->get_pages('blogs','blog');
		//$data['wire'] = $this->admin->get_pages('wire','wire');
		//$data['ipos'] = $this->admin->get_ipos();
		
		
		if ($id != ''){ 
			/* form prefill */
			$data['name'] 		= $this->admin->get_data($id,'name');
			$data['symbol'] 	= $this->admin->get_data($id,'symbol');
			$data['managers'] 	= $this->admin->get_data($id,'managers');
			$data['catagory'] 	= $this->admin->get_data($id,'catagory');
			$data['shares'] 	= $this->admin->get_data($id,'shares');
			$data['price'] 		= $this->admin->get_data($id,'price');
			$data['updates'] 	= $this->admin->get_data($id,'updates');
		
		}else{
			$data['name'] 		= '';
			$data['symbol'] 	= '';
			$data['managers'] 	= '';
			$data['catagory'] 	= '';
			$data['shares'] 	= '';
			$data['price'] 		= '';
			$data['updates'] 	= '';
		
		}
		
		$this->load->library('Menu','menu');
		$this->menu->load_common('admin_view',$data);
	}
}


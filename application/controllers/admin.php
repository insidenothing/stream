<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index($id='')
	{
		$results='';
		//$this->output->enable_profiler(TRUE);
		$this->load->model('admin_model','admin');
		
		//$data['blogs'] = $this->admin->get_pages('blogs','blog');
		//$data['wire'] = $this->admin->get_pages('wire','wire');
		//$data['ipos'] = $this->admin->get_ipos();
		
		/* here we will handle the updates ajax style */
		if ($this->input->post('name') && $this->input->post('query_type') == 'update'){
			$results .= $this->admin->set_data($id,'name',$this->input->post('name'));
		}
		if ($this->input->post('symbol') && $this->input->post('query_type') == 'update'){
			$results .= $this->admin->set_data($id,'symbol',$this->input->post('symbol'));
		}
		if ($this->input->post('managers') && $this->input->post('query_type') == 'update'){
			$results .= $this->admin->set_data($id,'managers',$this->input->post('managers'));
		}
		if ($this->input->post('catagory') && $this->input->post('query_type') == 'update'){
			$results .= $this->admin->set_data($id,'catagory',$this->input->post('catagory'));
		}
		if ($this->input->post('shares') && $this->input->post('query_type') == 'update'){
			$results .= $this->admin->set_data($id,'shares',$this->input->post('shares'));
		}
		if ($this->input->post('price') && $this->input->post('query_type') == 'update'){
			$results .= $this->admin->set_data($id,'price',$this->input->post('price'));
		}
		if ($this->input->post('updates') && $this->input->post('query_type') == 'update'){
			$results .= $this->admin->set_data($id,'updates',$this->input->post('updates'));
		}
		
		
		if ($this->input->post('query_type') == 'insert'){
			$results .= $this->admin->insert_data($this->input->post('name'),$this->input->post('symbol'),$this->input->post('managers'),$this->input->post('catagory'),$this->input->post('shares'),$this->input->post('price'),$this->input->post('updates'));
		}
		if ($this->input->post('query_type') == 'delete'){
			$results .= $this->admin->delete_data($id);
		}
		
		
		
		
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
		$data['list'] = $this->admin->get_list();
		$data['results'] = $results;
		$this->load->library('Menu','menu');
		$this->menu->load_common('admin_view',$data);
	}
}


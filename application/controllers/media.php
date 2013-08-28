<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {

	public function index($id='')
	{
		$results='';
		//$this->output->enable_profiler(TRUE);
		$this->load->model('media_model','media');
		
		//$data['blogs'] = $this->admin->get_pages('blogs','blog');
		//$data['wire'] = $this->admin->get_pages('wire','wire');
		//$data['ipos'] = $this->admin->get_ipos();
		
		/* here we will handle the updates ajax style */
		if ($this->input->post('name') && $this->input->post('query_type') == 'update'){
			$results .= $this->media->set_data($id,'name',$this->input->post('name'));
		}
		if ($this->input->post('link') && $this->input->post('query_type') == 'update'){
			$results .= $this->media->set_data($id,'link',$this->input->post('link'));
		}
		
		
		if ($this->input->post('query_type') == 'insert' && $this->input->post('name') != '' && $this->input->post('link') != ''){
			$results .= $this->media->insert_data($this->input->post('name'),$this->input->post('link'));
		}
		if ($this->input->post('query_type') == 'delete'){
			$results .= $this->media->delete_data($id);
		}
		
		
		
		
		if ($id != ''){ 
			/* form prefill */
			$data['name'] 		= $this->admin->get_data($id,'name');
			$data['link'] 		= $this->admin->get_data($id,'link');
			
		
		}else{
			$data['name'] 	= '';
			$data['link'] 	= '';
			
		
		}
		$data['list'] = $this->media->get_list();
		$data['results'] = $results;
		$this->load->library('Menu','menu');
		$this->menu->load_common('media_view',$data);
	}
}


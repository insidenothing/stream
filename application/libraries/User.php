<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User {

	var $CI;
	var $id;
	var $name;
	var $email;
	var $level;
	var $newsletter;
	
	

	public function set_user_id($id)
	{
		$this->id = $id;
	}
	    
	public function set_name($name)
	{
		$this->name = $name;
	}
	 
	public function set_email($email)
	{
		$this->email = $email;
	}
	 
	public function set_level($level)
	{
		$this->level = $level;
	}
	public function set_newsletter($newsletter)
	{
		$this->newsletter = $newsletter;
	}
	public function set_premium($premium)
	{
		$this->premium = $premium;
	}
	public function set_cookies()
    {
		$CI =& get_instance();
		$CI->load->helper('cookie');
    	$CI->input->set_cookie('id', $this->id, '86500', '', '/', '', FALSE);
    	$CI->input->set_cookie('name', $this->name, '86500', '', '/', '', FALSE);
    	$CI->input->set_cookie('email', $this->email, '86500', '', '/', '', FALSE);
    	$CI->input->set_cookie('level', $this->level, '86500', '', '/', '', FALSE); 
       	$CI->input->set_cookie('newsletter', $this->newsletter, '86500', '', '/', '', FALSE); 
       	$CI->input->set_cookie('premium', $this->premium, '86500', '', '/', '', FALSE);
    }
    

    public function delete_cookies()
    {
    	$CI =& get_instance();
    	$CI->load->helper('cookie');
    	delete_cookie('user_id');
    	delete_cookie('name');
    	delete_cookie('email');
    	delete_cookie('level');
    	delete_cookie('newsletter');
    	delete_cookie('premium');
    }
    
    
    
    public function get_email()
    {
    	$CI =& get_instance();
    	$CI->load->database();
    	$query = $CI->db->query("SELECT email from users where id = '".$this->id."'");
    	$row = $query->row();
    	$email = $row->email;
    	$query->free_result();
    	return $email;
    }
    
}

/* End of file User.php */
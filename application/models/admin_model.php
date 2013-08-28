<?php
class Admin_model extends CI_Model {


	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}


	
	function get_list()
	{
		$query = $this->db->query("SELECT * from ipo_calendar order by updated_datetime DESC");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$rows .= '<li>'.$row->name.' ('.$row->symbol.') '.date('l \t\h\e jS \o\f F Y',strtotime($row->published_date)).' [edit] [delete]</li>';
			}
		}
		return $rows;
	}

	
}
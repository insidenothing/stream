<?php
class Admin_model extends CI_Model {


	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}


	
	function get_list()
	{
		$rows = '<table width="100%" bgcolor="#ffffff">';
		$query = $this->db->query("SELECT * from ipo_calendar order by updated_datetime DESC");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$rows .= '<tr><td>'.$row->name.'</td><td>'.$row->symbol.'</td><td>'.date('l \t\h\e jS \o\f F Y',strtotime($row->published_date)).'</td><td>[edit]</td><td>[delete]</td></tr>';
			}
		}
		$rows .= '</table>';
		return $rows;
	}

	
}
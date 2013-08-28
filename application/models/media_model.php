<?php
class Media_model extends CI_Model {


	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}


	
	function get_list()
	{
		$rows = '<table width="100%" bgcolor="#ffffff">';
		$query = $this->db->query("SELECT * from media order by updated_datetime DESC");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$rows .= '<tr><td>'.date('l \t\h\e jS \o\f F Y \a\t h:i:s A',strtotime($row->updated_datetime)).'</td><td><a href="'.$row->link.'">'.$row->name.'</a></td></tr>';
			}
		}
		$rows .= '</table>';
		return $rows;
	}

	function insert_data($name,$symbol,$managers,$catagory,$shares,$price,$updates)
	{
		$name = addslashes($name);
		$symbol = addslashes($symbol);
		$managers = addslashes($managers);
		$catagory = addslashes($catagory);
		$shares = addslashes($shares);
		$price = addslashes($price);
		$updates = addslashes($updates);
		$this->db->query("insert into media (name,symbol,managers,catagory,shares,price,updates,published_date,updated_datetime) values ('$name','$symbol','$managers','$catagory','$shares','$price','$updates',NOW(),NOW() )");
		return "$name added.";	
	}
	function set_data($id,$field,$content)
	{
		$content = addslashes($content);
		$query = $this->db->query("select $field from media where id = '$id'");
		$row=$query->row_array();
		$old = $row[$field];
		if ($content != $old){
			$query = $this->db->query("UPDATE media set $field = '$content', updated_datetime = NOW() where id = '$id'");
			return $field.' updated from '.$old.' to '.$content.'
';		
		}
	}
	
	function get_data($id,$field)
	{
		$query = $this->db->query("select $field from media where id = '$id'");
		if ($query->num_rows() > 0)
		{
			$row=$query->row_array();
			return stripslashes($row[$field]);
		}
		
	}
	
}
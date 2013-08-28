<?php
class Media_model extends CI_Model {


	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}


	
	function get_public()
	{
		$rows = '<table>';
		$query = $this->db->query("SELECT * from media order by updated_datetime DESC");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$rows .= '<tr><td><a href="'.$row->link.'" title="'.date('l \t\h\e jS \o\f F Y \a\t h:i:s A',strtotime($row->updated_datetime)).'" target="_Blank">'.$row->name.'</a></td></tr>';
			}
		}
		$rows .= '</table>';
		return $rows;
	}
	
	function get_list()
	{
		$rows = '<table width="90%" bgcolor="#ffffff">';
		$query = $this->db->query("SELECT * from media order by updated_datetime DESC");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$rows .= '<tr><td>'.date('l \t\h\e jS \o\f F Y \a\t h:i:s A',strtotime($row->updated_datetime)).'</td><td><a href="'.$row->link.'">'.$row->name.'</a></td><td><a href="/media/index/'.$row->id.'">[edit]</a></td></tr>';
			}
		}
		$rows .= '</table>';
		return $rows;
	}

	function insert_data($name,$link)
	{
		$name = addslashes($name);
		$link = addslashes($link);
		$this->db->query("insert into media (name,link,updated_datetime) values ('$name','$link',NOW() )");
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
<?php 
class Schedule_model extends CI_Model {


	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function ifBlank($str)
	{
		if ($str == '' | $str == "0000-00-00" | $str == '0.00')
		{
			return 'n/a';
		}else{
			return $str;
		}
	}
	
	
	function set_ipo_data($field,$symbol,$value)
	{
		$query = $this->db->query("update ipo_calendar set $field = '$value' where symbol = '$symbol'");
		return "Updated $field, ";
	}
	
	
	function get_ipo_data($field,$symbol)
	{
		$query = $this->db->query("SELECT $field from ipo_calendar where symbol = '$symbol'");
		$row = $query->row_array();
		$query->free_result();
		return $row[$field];
	}
	
	
	
	function new_item()
	{
		$query = $this->db->query("insert into ipo_calendar (symbol) values ('NEW')");
		return "NEW";
	}
	
	function row_color_premium($i){
		$bg1 = "#FFFFFF"; // color one
		$bg2 = "#FCFCFC"; // color two
		if ( $i%2 ) {
			return $bg1;
		} else {
			return $bg2;
		}
	}
	
	function row_color($i){
		$bg1 = "#FFFFFF"; // color one
		$bg2 = "#FCFCFC"; // color two
		if ( $i%2 ) {
			return $bg1;
		} else {
			return $bg2;
		}
	}
	function get_list($date)
	{
		$rows='';
		$symbol='';




		if ($symbol=='')
		{
			$query = $this->db->query("SELECT * from ipo_calendar where updated_datetime like '$date%' order by updated_datetime DESC");
		}else{
			$query = $this->db->query("SELECT * from ipo_calendar where symbol = '$symbol'");
		}
		
		
		if ($query->num_rows() > 0)
		{
			$i=0;
			foreach ($query->result() as $row)
			{
				if (strlen($row->premium_report) > 50)
				{
					$premium = '<br>Premium&nbsp;Report';
					$bgcolor = $this->row_color_premium($i);
					$color = "000000";
				}else{
					$premium = '<br>In&nbsp;Progress';
					$bgcolor = $this->row_color($i);
					$color = "999999";
				}
				
				
				
				$i++;
				$rows = '
			<tr>
				<td style="width:20.0%;background:#ddddff;padding:0in 0in 0in 0in" width="20%">
					<p class="MsoNormal">
						<b>
							<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">'.$row->symbol.'</span>
						</b>
					</p>
				</td>
				<td style="width:12.0%;background:#ddddff;padding:0in 0in 0in 0in" width="12%">
					<p class="MsoNormal">
						<b>
							<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">'.$row->catagory.'</span>
						</b>
					</p>
				</td>
				<td style="width:10.0%;background:#ddddff;padding:0in 0in 0in 0in" width="10%">
					<p class="MsoNormal">
						<b>
							<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Priced at '.$row->price.'</span>
						</b>
					</p>
				</td>
				<td style="width:5.0%;background:#ddddff;padding:0in 0in 0in 0in" width="5%">
					<p class="MsoNormal">
						<b>
							<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">'.$row->shares.'M</span>
						</b>
					</p>
				</td>
				<td style="width:30.0%;background:#ddddff;padding:0in 0in 0in 0in" width="30%">
					<p class="MsoNormal">
						<b>
							<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">'.$row->managers.'</span>
						</b>
					</p>
				</td>
				<td style="width:23.0%;background:#ddddff;padding:0in 0in 0in 0in" width="23%">
					<p class="MsoNormal">
						<b>
							<span style="font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">'.date('l \t\h\e jS \o\f F Y',strtotime($row->published_date)).'</span>
						</b>
					</p>
				</td>
			</tr>
				';
			
			$rows .= '
			<tr>
				<td colspan="6" style="background:white;padding:0in 0in 0in 0in">
					<p class="MsoNormal" style="text-align:center" align="center">
						<span style="font-size:10.5pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;color:#999999">'.$row->updates.'</span>
					</p>
				</td>
			</tr>
			';
			
				
				
				
			}
		}
		return $rows;
	}
	
	
	function get_home_list()
	{
		$rows='';
		$query = $this->db->query("SELECT * from ipo_calendar order by published_date DESC");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$rows .= "<tr>
					<td>".$row->symbol."</td>
					<td>".$row->published."</td>
					<td><a href='http://fiddlersway.com/ipo/index/".$row->symbol."'>View</td>
				</tr>";
			}
		}
	
		return $rows;
	}
	
	function get_premium($symbol)
	{
		$query = $this->db->query("SELECT premium_report from ipo_calendar where symbol = '$symbol'");
		$row = $query->row();
		$query->free_result();
		if ($row->premium_report == '')
		{
			return "Premium Content Not Yet Released, Check Back Soon";
		}
		$row = $query->row();
		$query->free_result();
		return $row->premium_report;
	}
	
	
}
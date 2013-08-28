
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function index($year,$month,$day)
	{
		$this->load->model('schedule_model','schedule');
		$date = "$year-$month-$day";

		if ($this->input->cookie('premium') == 'yes')
		{
			/* live data */
			$date=$date;
		}else{
			/* one weeks ago data */
			$date=date('Y-m-d',strtotime($date) - 604800);
		}

		
		
		$data['list'] = $this->schedule->get_list($date);
		$data['date'] = date('l \t\h\e jS \o\f F Y',strtotime($date));

		$this->load->library('Menu','menu');
		$this->menu->load_common('schedule_view',$data);

	}
}
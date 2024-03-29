
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function index($year,$month,$day)
	{
		$this->load->model('schedule_model','schedule');
		$date = "$year-$month-$day";

		/* do not allow future dates */
		if (strtotime($date) > strtotime(date('Y-m-d'))){
			$date = date('Y-m-d');
		}
		
		
		if ($this->input->cookie('premium') == 'yes')
		{
			/* live data */
			$date=$date;
			$data['updates']='Live Updates';
			
		}else{
			/* one weeks ago data */
			$date=date('Y-m-d',strtotime($date) - 604800);
			$data['updates']='Updates Delayed One Week';
		}

		$this->load->model('calendar_model','calendar');
		$data['calendarA'] = $this->calendar->calendar();
		$data['calendarB'] = $this->calendar->calendar(1);
		
		$data['list'] = $this->schedule->get_list($date);
		$data['date'] = date('l \t\h\e jS \o\f F Y',strtotime($date));

		$this->load->library('Menu','menu');
		$this->menu->load_common('schedule_view',$data);

	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function index($year,$month,$day)
	{
		$this->load->model('schedule_model','schedule');
		$date = "$year-$month-$day";
		/* most recent blog posting */

		$data['list'] = $this->schedule->get_list($date);
		$data['date'] = date('l \the jS \of F Y',strtotime($date));

		$this->load->library('Menu','menu');
		$this->menu->load_common('schedule_view',$data);

	}
}
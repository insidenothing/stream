
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function index($year,$month,$day)
	{
		$this->load->model('schedule_model','schedule');
		$date = "$year-$month-$day";
		/* most recent blog posting */

		$data['list'] = $this->schedule->get_list($date);

		$this->load->library('Menu','menu');
		$this->menu->load_plain('schedule_view',$data);

	}
}
<?php
class Calendar_model extends CI_Model {


	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function fillblock($block, $difference, $month, $year, $user, $end){ // cal1, cal2, cal3
		$content='';
		$day = $block - $difference;
		if ($day < 10){ $day = "0".$day; }
		$date1 = $year."-".$month."-".$day;
		//$end = date('t'); // the end of the month
		if ($day >= "1" && $day <= $end){ // limit low to the first, limit high to the end of the month
		$date2 = date('Y-m-d');
		if ($date1 == $date2){
		$content .= "<div style='background-color:#ffff00; font-weight:bold;text-decoration: underline overline;'>";
		}
		if ($day == date('d') && $month == date('m') && $year == date('Y')){
			$content .= "<a style='color:#990000;text-decoration:underline overline; font-weight:bolder;' href='?date=$year-$month-$day'>$day</a>";
		} else {
			$content .= "<a style='color:#000000;text-decoration:none;' href='?date=$year-$month-$day'>$day</a>";
		}
		//$content .= "</div>";
			return $content;
		} else {
			return ;
		}
	}
	function calendar(){
		ob_start();
		if (isset($_COOKIE['name'])){
			$user=$_COOKIE['name'];
		}else{
			$user = "Guest";
		}
		$day = date('d',mktime(0, 0, 0, date("m"), date("d"),  date("Y")));
		$month = date('m',mktime(0, 0, 0, date("m"), date("d"),  date("Y")));
		$year = date('Y',mktime(0, 0, 0, date("m"), date("d"),  date("Y")));
		$difference = date('w',mktime(0,0,0,$month,1,$year));
		//---------------( compile array )----------------------------------
		$block = array(
						'lastmonth' => date('F',mktime(0,0,0,$month,$day,$year)),
						'month' => date('F',mktime(0,0,0,$month+1,$day,$year)),
						'nextmonth' => date('F',mktime(0,0,0,$month+2,$day,$year)),
						'1' => $this->fillblock('1', $difference, $month, $year,$user,date('t')),
						'2' => $this->fillblock('2', $difference, $month, $year,$user,date('t')),
						'3' => $this->fillblock('3', $difference, $month, $year,$user,date('t')),
						'4' => $this->fillblock('4', $difference, $month, $year,$user,date('t')),
						'5' => $this->fillblock('5', $difference, $month, $year,$user,date('t')),
						'6' => $this->fillblock('6', $difference, $month, $year,$user,date('t')),
						'7' => $this->fillblock('7', $difference, $month, $year,$user,date('t')),
						'8' => $this->fillblock('8', $difference, $month, $year,$user,date('t')),
						'9' => $this->fillblock('9', $difference, $month, $year,$user,date('t')),
						'10' => $this->fillblock('10', $difference, $month, $year,$user,date('t')),
						'11' => $this->fillblock('11', $difference, $month, $year,$user,date('t')),
						'12' => $this->fillblock('12', $difference, $month, $year,$user,date('t')),
						'13' => $this->fillblock('13', $difference, $month, $year,$user,date('t')),
						'14' => $this->fillblock('14', $difference, $month, $year,$user,date('t')),
						'15' => $this->fillblock('15', $difference, $month, $year,$user,date('t')),
						'16' => $this->fillblock('16', $difference, $month, $year,$user,date('t')),
						'17' => $this->fillblock('17', $difference, $month, $year,$user,date('t')),
						'18' => $this->fillblock('18', $difference, $month, $year,$user,date('t')),
						'19' => $this->fillblock('19', $difference, $month, $year,$user,date('t')),
						'20' => $this->fillblock('20', $difference, $month, $year,$user,date('t')),
						'21' => $this->fillblock('21', $difference, $month, $year,$user,date('t')),
						'22' => $this->fillblock('22', $difference, $month, $year,$user,date('t')),
						'23' => $this->fillblock('23', $difference, $month, $year,$user,date('t')),
						'24' => $this->fillblock('24', $difference, $month, $year,$user,date('t')),
						'25' => $this->fillblock('25', $difference, $month, $year,$user,date('t')),
						'26' => $this->fillblock('26', $difference, $month, $year,$user,date('t')),
						'27' => $this->fillblock('27', $difference, $month, $year,$user,date('t')),
						'28' => $this->fillblock('28', $difference, $month, $year,$user,date('t')),
						'29' => $this->fillblock('29', $difference, $month, $year,$user,date('t')),
						'30' => $this->fillblock('30', $difference, $month, $year,$user,date('t')),
						'31' => $this->fillblock('31', $difference, $month, $year,$user,date('t')),
						'32' => $this->fillblock('32', $difference, $month, $year,$user,date('t')),
						'33' => $this->fillblock('33', $difference, $month, $year,$user,date('t')),
						'34' => $this->fillblock('34', $difference, $month, $year,$user,date('t')),
						'35' => $this->fillblock('35', $difference, $month, $year,$user,date('t')),
						'36' => $this->fillblock('36', $difference, $month, $year,$user,date('t')),
						'37' => $this->fillblock('37', $difference, $month, $year,$user,date('t')),
						'38' => $this->fillblock('38', $difference, $month, $year,$user,date('t')),
						'39' => $this->fillblock('39', $difference, $month, $year,$user,date('t')),
						'40' => $this->fillblock('40', $difference, $month, $year,$user,date('t')),
						'41' => $this->fillblock('41', $difference, $month, $year,$user,date('t')),
						'42' => $this->fillblock('42', $difference, $month, $year,$user,date('t')),
						);
		//---------------( write html )----------------------------------
		?>
		<style>
		.weekday {background-color:#99CCFF;}
		.weekend {background-color:#999999;}
		.today {background-color:#FFFFFF;}

		</style>
		<table width="10px" cellpadding="2" style="border-collapse:collapse" border="1" bgcolor="#FFFFFF">
			<tr>
				<td colspan="7" class="weekend">
						<strong><?=date("F Y");?></strong></div></td>
				</td>
			</tr>
			<tr>
				<td align="center" bgcolor="#CC9900">Su</td>
				<td align="center" bgcolor="#FFCC00">Mo</td>
				<td align="center" bgcolor="#FFCC00">Tu</td>
				<td align="center" bgcolor="#FFCC00">We</td>
				<td align="center" bgcolor="#FFCC00">Th</td>
				<td align="center" bgcolor="#FFCC00">Fr</td>
				<td align="center" bgcolor="#CC9900">Sa</td>
			</tr>
			<tr>
				<td valign="top" class="weekend"><?PHP echo $block['1'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['2'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['3'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['4'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['5'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['6'];?></td>
				<td valign="top" class="weekend"><?PHP echo $block['7'];?></td>
			</tr>
			<tr>
				<td valign="top" class="weekend"><?PHP echo $block['8'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['9'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['10'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['11'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['12'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['13'];?></td>
				<td valign="top" class="weekend"><?PHP echo $block['14'];?></td>
			</tr>
			<tr>
				<td valign="top" class="weekend"><?PHP echo $block['15'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['16'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['17'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['18'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['19'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['20'];?></td>
				<td valign="top" class="weekend"><?PHP echo $block['21'];?></td>
			</tr>
			<tr>
				<td valign="top" class="weekend"><?PHP echo $block['22'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['23'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['24'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['25'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['26'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['27'];?></td>
				<td valign="top" class="weekend"><?PHP echo $block['28'];?></td>
			</tr>
			<tr>
				<td valign="top" class="weekend"><?PHP echo $block['29'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['30'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['31'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['32'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['33'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['34'];?></td>
				<td valign="top" class="weekend"><?PHP echo $block['35'];?></td>
			</tr>
		<?PHP
		//--------( if a day exists in block 36 to 42 we must display this row )-----------------
		if ($block['36']){
		?>
			<tr>
				<td valign="top" class="weekend"><?PHP echo $block['36'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['37'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['38'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['39'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['40'];?></td>
				<td valign="top" class="weekday"><?PHP echo $block['41'];?></td>
				<td valign="top" class="weekend"><?PHP echo $block['42'];?></td>
			</tr>
		<?PHP } ?>
		</table>

		<?PHP 
		$buffer = ob_get_clean();
		return $buffer;
	}
}
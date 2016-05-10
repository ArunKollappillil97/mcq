<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Time_calculator
* By Tasfir Hossaion Suman
* Purpose : Calculate Time Minuites and Second
*/

class Time_calculator 
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function add_time($first_time=NULL, $secon_time=NULL){

		$time = explode(':', $first_time);

		$hour = $time[0];
		$minute = $time[1];
		$second = $time[2];

		$only_second = filter_var($second, FILTER_SANITIZE_NUMBER_INT);
		$amPM = preg_replace('/\d/', '', $second );

		$total_second 	= $hour * ($minute * $second ); 
		$total_minute 	= ($hour * 60) + $minute; 
		$total_hour 	= $total_minute / 60;


		$minute = ($total_second/60);
		
		$time = $hour.":".$minute.":". $only_second.$amPM;
		return $total_hour ;
	}

	public function add_date_time($first_date_time){
		$first_date_time = explode(":", $first_date_time);

		return time();
	}
}
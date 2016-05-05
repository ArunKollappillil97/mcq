<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* author : Tasfir Hosssain Suman 
* Its made for User Dashboard
*/
class My_account extends CI_Controller
{
	
	// function __construct()
	// {
	// 	# code...
	// }

	public function index(){
		$this->load->view('my_account/index');
	}
	
}
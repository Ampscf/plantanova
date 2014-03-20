<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	function __construct() {
	   parent::__construct();
	}

	public function index()
	{
		$this->load->helper(array('form'));
		$template['template'] = "login_view.php";
		$this->load->view('main',$template);
	}
	
}

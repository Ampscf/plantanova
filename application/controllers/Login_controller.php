<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function index()
	{
		$data['template'] = "login_view.php";
		$this->load->helper(array('form'));
		$this->load->view('main',$data);
	}
}

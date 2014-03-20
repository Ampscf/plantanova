<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class oli extends CI_Controller {

	public function index()
	{
		$data['template'] = "loged.php";
		$this->load->view('main',$data);
	}
}
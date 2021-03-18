<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_sealogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('c_seadashboard','refresh');
		} else {
			$this->load->helper(array('form'));
			$this->load->view('v_sealogin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('c_sealogin','refresh');
	}

}

/* End of file C_sealogin.php */
/* Location: ./application/controllers/C_sealogin.php */
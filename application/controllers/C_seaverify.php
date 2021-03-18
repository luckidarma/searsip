<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_seaverify extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sealogin', '', TRUE);
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username_admin', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password_admin', 'Password', 'trim|required|min_length[5]|max_length[12]|callback_check_database');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('v_sealogin');
		} else 
		{
			redirect('c_seadashboard','refresh');	
		}
	}

	function check_database($password)
	{
		$username = $this->input->post('username_admin');
		$result	  = $this->m_sealogin->admin_login($username, $password);

		if ($result) {
			$sess_array = array();
			foreach ($result as $list) {
				$sess_array = array (
					'username_admin' => $list->username_admin,
					'password_admin' => $list->password_admin,
					'nama_admin'	 => $list->nama_admin,
				);

				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;			
		} else {
			$this->form_validation->set_message('check_database', '<b><font color="#ff7f7f">Username atau Password Salah !!!</font><b>');
			return FALSE;
		}
	}

}

/* End of file C_seaverify.php */
/* Location: ./application/controllers/C_seaverify.php */